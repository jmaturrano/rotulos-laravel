<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku', 'barcode', 'description', 'unitmed', 'department', 'section'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
