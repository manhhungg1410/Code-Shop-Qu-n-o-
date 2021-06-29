<?php

namespace App\Http\Controllers;

use App\Models\DetailsTypeProduct;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function test(){
     $lsType = TypeProduct::all();
 //    dd($lsType);
     return view('TestCode.list')->with(['lsType'=>$lsType]);
    }
}
