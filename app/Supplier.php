<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'tel',
        'mobile',
        'email',
    ];

    public function pay_vouchers(){
        return $this->hasMany('App\Pay_voucher');
    }
    
}
