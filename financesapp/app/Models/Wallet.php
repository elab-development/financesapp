<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;
    protected $table = 'wallets';

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


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'wallet_id');
    }

    public function transferFrom() {
        return $this->hasMany(Transfer::class, 'wallet_fromid');
    }

    public function transferTo() {
        return $this->hasMany(Transfer::class, 'wallet_toid');
    }

}
