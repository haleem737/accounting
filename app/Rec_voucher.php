<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rec_voucher extends Model
{
    protected $fillable = [
        'amount',
        'being_for',
        'pay_method',
        'order_id',
        'customer_id',
    ];
}
