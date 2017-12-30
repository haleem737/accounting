<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'full_name',
        'co_name',
        'tel',
        'mobile',
        'email',
    ];


    public function orders(){
        return $this->hasMany('App\Order');
    }
    
    public function invoices(){
        return $this->hasMany('App\Invoice');
    }
    
    public function rec_vouchers(){
        return $this->hasMany('App\Rec_voucher');
    }
        
}