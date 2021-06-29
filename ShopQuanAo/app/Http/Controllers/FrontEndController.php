<?php

namespace App\Http\Controllers;

use App\Models\DetailsProducts;
use App\Models\DetailsTypeProduct;
use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $lsDetailsType = DetailsTypeProduct::where('status','=','1')
            ->take(6)->get();
        $lsProducts_topfeatured = Product::orderBy('created_at','asc')
            ->take(8)->get();
        $lsProducts_bestseller = Product::where('sale_off','>','0')
            ->take(4)->get();
        $lsTypeProducts = TypeProduct::all();
        return view('content_pages.home_page')->with(['lsTypeProducts'=>$lsTypeProducts,'lsDetailsType'=>$lsDetailsType
            ,'lsProducts_topfeatured'=>$lsProducts_topfeatured,'lsProducts_bestseller'=>$lsProducts_bestseller ]);
    }

    public function products($id){
        $lsTypeProducts = TypeProduct::all();
   //     $lsDetailTypeProducts = DetailsTypeProduct::find($id);
        /*
         * Tim tung id cua Details Type Products
         */

        /*
         * Dua ra danh sach san pham voi tung id
         */
        $list = Product::where('details_type_products_id','=',$id)->paginate(6);
      //  $list = DetailsTypeProduct::paginate(6);
      //  dd($list);
  //      dd($lsDetailTypeProducts);
        return view('show_products.show_products')->with(['list'=>$list,'lsTypeProducts' => $lsTypeProducts]);
    }

    public function show_details($id){
        $lsTypeProducts = TypeProduct::all();
        $products = Product::find($id);
        $details = DetailsProducts::orderBy('size')
            ->where('products_id','=',$id)
            ->distinct()->get('size');
       // dd($details);
        $same_products = Product::where('details_type_products_id','=',$id);
        return view('show_products.show_details')->with(['lsTypeProducts'=>$lsTypeProducts,'details'=>$products,'size'=>$details]);
    }

}
