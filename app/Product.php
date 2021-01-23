<?php

namespace App;

use Freshbitsweb\LaravelCartManager\Traits\Cartable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
   // use Cartable;

    protected $fillable = ['name', 'price', 'image', 'description','category_id']; 

    
    public function category()

    {
        return $this->belongsTo(Category::class);
    }


}
