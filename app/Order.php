<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id','user_id','address','pos','category','product_name','amount','price',
    ];
}
