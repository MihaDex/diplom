<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = ['name','description','price','img'];

    public $timestamps = false;

}