<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'currency',
        'initial_state',
        'current_state',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'initial_state' => 'decimal:2',
        'current_state' => 'decimal:2'
    ];

    
    //public function user() : User {}



}
