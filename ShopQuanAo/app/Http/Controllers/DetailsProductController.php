<?php

namespace App\Http\Controllers;

use App\Models\DetailsProducts;
use App\Models\DetailsTypeProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsDetailsProduct = DetailsProducts::paginate(10);
        return view('details_product.list')->with(['lsDetail'=>$lsDetailsProduct]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsProducts = Product::all();
        return view('details_product.add')->with(['lsProducts'=>$lsProducts]);
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
           'color' => 'required',
            'amount' => 'required'
        ]);

        $details_product = new DetailsProducts();

        $details_product->products_id = $request->ma_sp;
        $details_product->size = $request->size;
        $details_product->color = $request->color;
        $details_product->amount = $request->amount;

        $details_product->save();

        return redirect('/details_product')->with(['create_success'=>'Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = DetailsProducts::find($id);
        return view('details_product.show')->with(['details'=>$details]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lsProducts = Product::all();
        $details_products = DetailsProducts::find($id);
        return view('details_product.edit')->with(['details'=>$details_products,'lsProducts'=>$lsProducts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $details_product = DetailsProducts::find($id);

         $details_product->products_id = $request->ma_sp;
         $details_product->size = $request->size;
         $details_product->color = $request->color;
         $details_product->amount = $request->amount;

         $details_product->save();

         return redirect('/details_product')->with(['edit_success'=>'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details_product = DetailsProducts::find($id);

        $details_product->delete();

        return redirect('/details_product')->with(['delete_success'=>'Xóa thành công']);
    }
}
