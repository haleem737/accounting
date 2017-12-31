<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_status',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    
    public function items(){
        return $this->hasMany('App\Item');
    }
    
    public function rec_vouchers(){
        return $this->hasMany('App\Rec_voucher');
    }
    
    public function invoice(){
        return $this->hasone('App\Invoice');
    }
    
}
