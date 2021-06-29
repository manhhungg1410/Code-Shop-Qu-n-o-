<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function details(){
        return $this->belongsTo('App\Models\DetailsTypeProduct','details_type_products_id');
    }

    public function details_products(){
        return $this->hasMany('App\Models\DetailsProducts','products_id');
    }

    public function product_images(){
        return $this->hasMany('App\Models\ProductImages','products_images_id');
    }
}
