<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productstoorder extends Model
{
    public $timestamps = false;

    public function products()
        {
            return $this->belongsTo('App\Product','product_id');
        }
}