<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Xendit\Xendit;
use Xendit\Invoice;

class XenditController extends Controller
{
    public function __construct()
    {
        Xendit::setApiKey(env('XENDIT_SECRET_KEY'));
    }

    public function createInvoice(Request $request)
    {
        $user = auth()->user();
        $externalId = 'inv-' . time() . '-' . $user->id;
        
        $params = [
            'external_id' => $externalId,
            'payer_email' => $user->email,
            'description' => 'Pembayaran Langganan BroNet - ' . $request->months_count . ' Bulan',
            'amount' => $request->amount,
            'customer' => [
                'given_names' => $user->name,
                'mobile_number' => $user->phone,
            ],
            'success_redirect_url' => route('subscription.show'),
            'failure_redirect_url' => route('subscription.show'),
            'currency' => 'IDR',
        ];

        try {
            $invoice = Invoice::create($params);
            
            // Create local payment record
            Payment::create([
                'user_id' => $user->id,
                'external_id' => $externalId,
                'amount' => $request->amount,
                'months_count' => $request->months_count,
                'status' => 'pending',
                'checkout_url' => $invoice['invoice_url'],
            ]);

            return redirect($invoice['invoice_url']);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal membuat invoice Xendit: ' . $e->getMessage()]);
        }
    }

    public function handleWebhook(Request $request)
    {
        // Simple verification for development, in production use Xendit token verification
        $status = $request->status;
        $externalId = $request->external_id;

        if ($status === 'PAID') {
            $payment = Payment::where('external_id', $externalId)->first();
            
            if ($payment && $payment->status !== 'approved') {
                $payment->update(['status' => 'approved']);
                
                $user = $payment->user;
                $monthsToAdd = $payment->months_count;

                $currentActiveUntil = $user->active_until && $user->active_until->isFuture() 
                    ? $user->active_until 
                    : now();
                
                $newActiveUntil = $currentActiveUntil->addMonths($monthsToAdd);

                $user->update([
                    'is_subscribed' => true,
                    'active_until' => $newActiveUntil,
                    'status' => 'active'
                ]);
            }
        }

        return response()->json(['status' => 'OK']);
    }
}
