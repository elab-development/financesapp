<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'parent_id', //u slucaju pod/nad kategorija
        'active',
    ];


    protected $casts = [
        'active' => 'boolean',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class, 'category_id');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

}
