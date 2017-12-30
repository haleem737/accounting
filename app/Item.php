<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'description',
        'paper',
        'size',
        'colors',
        'copies',
        'serial',
        'pack',
        'qty',
        'price',
        'cost',
        'order_id',
        'customer_id',
    ];
}
