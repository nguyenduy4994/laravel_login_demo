<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['name', 'address', 'phone', 'total_quanlity', 'total_price'];

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('price', 'quantity');;
    }
}
