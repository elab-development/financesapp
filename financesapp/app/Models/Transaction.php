<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    
    protected $fillable = [
        'user_id',

        'wallet_id',
        'category_id',

        'type',
        'amount',
        'date',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'date',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wallet() {
        return $this->belongsTo(Wallet::class, 'wallet_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}
