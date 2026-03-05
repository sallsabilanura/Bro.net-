<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $payments = $user->payments()->latest()->get();

        return view('subscription.show', [
            'user' => $user,
            'payments' => $payments
        ]);
    }

    public function pay()
    {
        return view('subscription.pay');
    }

    public function storePayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer',
            'months_count' => 'required|integer|min:1',
            'proof' => 'nullable|image|max:2048',
        ]);

        $payment = new Payment();
        $payment->user_id = auth()->id();
        $payment->amount = $request->amount;
        $payment->months_count = $request->months_count;
        $payment->month = date('F'); // For records
        $payment->year = date('Y');
        $payment->status = 'pending';

        if ($request->hasFile('proof')) {
            $path = $request->file('proof')->store('payments', 'public');
            $payment->proof_path = $path;
        }

        $payment->save();

        return redirect()->route('subscription.show')->with('status', 'Konfirmasi pembayaran berhasil dikirim. Silakan tunggu persetujuan admin.');
    }
}
