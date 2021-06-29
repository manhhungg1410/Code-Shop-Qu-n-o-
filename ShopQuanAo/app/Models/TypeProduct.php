<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;

    public function details(){
        return $this->hasMany('App\Models\DetailsTypeProduct','type_products_id');
    }
}
