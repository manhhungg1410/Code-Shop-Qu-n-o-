<?php

namespace App\Http\Controllers;

use App\Models\DetailsTypeProduct;
use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsProducts = Product::paginate(5);
        return view('products.list')->with(['lsProducts'=>$lsProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsDetails = DetailsTypeProduct::all();
        return view('products.add')->with(['lsDetails'=>$lsDetails]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'id'=>'required|unique:products',
            'name'=>'required',
            'price_old'=>'required',
            'sale_off'=>'required',
            'description'=>'required|min:10'
        ]);

        $products = new Product();
        $products->id = $request->id;
        $products->name_product = $request->name;
        if ($request->cover != null){
            $name = $request->cover->getClientOriginalExtension();
            $name = time(). "." .$name;
            $request->cover->move(public_path('upload'),$name);
            $path = 'upload/' .$name;
            $products->cover = $path;
        }
        $products->price_old = $request->price_old;
        $products->sale_off = $request->sale_off;
        $products->details_type_products_id = $request->type;
        $products->description = $request->description;

        $products->save();

        return redirect('/products')->with(['success'=>'Thêm mới sản phẩm thành công']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $lsProducts = Product::find($id)->details_products;
          dd($lsProducts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lsDetails = DetailsTypeProduct::all();
        $product = Product::find($id);
        return view('products.edit')->with(['product'=>$product,'lsDetails'=>$lsDetails]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Ma_SP)
    {
        $products = Product::find($Ma_SP);
        $products->id = $request->id;
        $products->name_product = $request->name;
        if ($request->cover != null){
            $name = $request->cover->getClientOriginalExtension();
            $name = time(). "." .$name;
            $request->cover->move(public_path('upload'),$name);
            $path = 'upload/' .$name;
            $products->cover = $path;
        }
        $products->price_old = $request->price_old;
        $products->sale_off = $request->sale_off;
        $products->details_type_products_id = $request->type;
        $products->description = $request->description;

        $products->save();

        return redirect('/products')->with(['edit_success'=>"Sửa thành công"]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $products = Product::find($id);
         $products->delete();

         return redirect()->back()->with(['delete_sucess'=>'Xoá thành công']);
    }
}
