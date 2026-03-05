<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriptionController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class , 'index'])->name('admin.index');
    Route::post('/admin/user/{user}/approve', [AdminController::class , 'approve'])->name('admin.user.approve');
    Route::post('/admin/user/{user}/reject', [AdminController::class , 'reject'])->name('admin.user.reject');
    Route::post('/admin/user/{user}/update-price', [AdminController::class , 'updatePrice'])->name('admin.user.update-price');
    Route::get('/admin/payments', [AdminController::class , 'payments'])->name('admin.payments.index');
    Route::post('/admin/payments/{payment}/approve', [AdminController::class , 'approvePayment'])->name('admin.payments.approve');
    Route::post('/admin/payments/{payment}/reject', [AdminController::class , 'rejectPayment'])->name('admin.payments.reject');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/subscription', [SubscriptionController::class, 'show'])->name('subscription.show');
    Route::get('/subscription/pay', [SubscriptionController::class, 'pay'])->name('subscription.pay');
    Route::post('/subscription/pay', [SubscriptionController::class, 'storePayment'])->name('subscription.store-payment');
});

require __DIR__ . '/auth.php';
