<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsImages = ProductImages::paginate(10);
        return view('product_images.list')->with(['lsImages'=>$lsImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsProducts = Product::all();
        return view('product_images.add')->with(['lsProducts'=>$lsProducts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = new ProductImages();

        $images->products_images_id = $request->ma_sp;
        if ($request->cover != null){
            $name = $request->cover->getClientOriginalExtension();
            $name = time(). "." .$name;
            $request->cover->move(public_path('upload'),$name);
            $path = 'upload/' .$name;
            $images->images = $path;
        }

        $images->save();

        return redirect('/product_images')->with(['create_success'=>'Thêm mới thành công']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
         $images = ProductImages::find($id);
         return view('product_images.edit')->with(['images'=>$images,'lsProducts'=>$lsProducts]);
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
        $images = ProductImages::find($id);

        $images->products_images_id = $request->ma_sp;
        if ($request->cover != null){
            $name = $request->cover->getClientOriginalExtension();
            $name = time(). "." .$name;
            $request->cover->move(public_path('upload'),$name);
            $path = 'upload/' .$name;
            $images->images = $path;
        }

        $images->save();

        return redirect('/product_images')->with(['edit_success'=>'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = ProductImages::find($id);

        $images->delete();

        return redirect('/product_images')->with(['delete_success'=>'Xóa thành công']);
    }
}
