<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'external_id',
        'amount',
        'month',
        'year',
        'months_count',
        'status',
        'proof_path',
        'checkout_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
