<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    protected $table = 'transfers';
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'amount',
        'date',
        'description',
        'wallet_fromid',
        'wallet_toid',
        'currency',
        'comission',

    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'date',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function walletFrom() {
        return $this->belongsTo(Wallet::class, 'wallet_fromid');
    }

    public function walletTo() {
        return $this->belongsTo(Wallet::class, 'wallet_toid');
    }
}
