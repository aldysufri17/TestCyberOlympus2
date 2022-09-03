<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    public function customer()
    {
        return $this->belongsTo('App\customer', 'customer_id');
    }
    public function detail()
    {
        return $this->hasMany('App\Detail', 'order_id');
    }
}
