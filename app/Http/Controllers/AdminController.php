<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pendingUsers = User::where('role', 'customer')->where('status', 'pending')->latest()->get();
        $activeUsers = User::where('role', 'customer')->where('status', 'active')->latest()->get();
        return view('admin.index', compact('pendingUsers', 'activeUsers'));
    }

    public function approve(Request $request, User $user)
    {
        $request->validate([
            'package_price' => 'required|integer|min:0',
        ]);

        // Generate Customer ID (BN-XXXX)
        $lastId = User::whereNotNull('customer_id')->count() + 1;
        $customerId = 'BN-' . str_pad($lastId, 3, '0', STR_PAD_LEFT);

        $user->update([
            'status' => 'active',
            'customer_id' => $customerId,
            'package_price' => $request->package_price,
            'is_subscribed' => true,
            'active_until' => now()->addMonth(), // Set initial 1 month active
        ]);

        return redirect()->back()->with('status', 'User approved successfully. ID: ' . $customerId);
    }

    public function reject(User $user)
    {
        $user->update(['status' => 'rejected']);
        return redirect()->back()->with('status', 'User rejected.');
    }

    public function updatePrice(Request $request, User $user)
    {
        $request->validate(['package_price' => 'required|integer|min:0']);
        $user->update(['package_price' => $request->package_price]);
        return redirect()->back()->with('status', 'Package price updated.');
    }

    public function toggleSubscription(User $user)
    {
        $user->update([
            'is_subscribed' => !$user->is_subscribed
        ]);

        return redirect()->back()->with('status', 'User subscription updated.');
    }

    public function payments()
    {
        $payments = Payment::with('user')->latest()->get();
        return view('admin.payments', compact('payments'));
    }

    public function approvePayment(Payment $payment)
    {
        $payment->update(['status' => 'approved']);
        
        $user = $payment->user;
        $monthsToAdd = $payment->months_count;

        // Calculate new active_until date
        $currentActiveUntil = $user->active_until && $user->active_until->isFuture() 
            ? $user->active_until 
            : now();
        
        $newActiveUntil = $currentActiveUntil->addMonths($monthsToAdd);

        $user->update([
            'is_subscribed' => true,
            'active_until' => $newActiveUntil,
            'status' => 'active'
        ]);

        return redirect()->back()->with('status', 'Pembayaran disetujui. Masa aktif diperpanjang hingga ' . $newActiveUntil->format('d M Y'));
    }

    public function rejectPayment(Payment $payment)
    {
        $payment->update(['status' => 'rejected']);
        return redirect()->back()->with('status', 'Pembayaran ditolak.');
    }
}
