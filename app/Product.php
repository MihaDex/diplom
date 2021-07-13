<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','description','price','categorie_id'];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}
