<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'price', 'slug',
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
