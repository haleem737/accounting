<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay_voucher extends Model
{
    protected $fillable = [
        'amount',
        'being_for',
        'pay_method',
        'supplier_id',
    ];
}
