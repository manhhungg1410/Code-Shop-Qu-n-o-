<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsTypeProduct extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo('App\Models\TypeProduct','type_products_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product','details_type_products_id');
    }




}
