<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
}
