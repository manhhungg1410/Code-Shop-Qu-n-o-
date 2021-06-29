<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsProducts extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsTo('App\Models\Product','products_id');
    }
}
