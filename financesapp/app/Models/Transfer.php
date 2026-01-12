<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'user_id',
        'wallet_id',
        'amount',
        'date',
        'description',

    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'date',
    ];
}
