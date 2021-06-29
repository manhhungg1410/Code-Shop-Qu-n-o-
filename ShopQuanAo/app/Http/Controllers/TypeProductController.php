<?php

namespace App\Http\Controllers;

use App\Models\TypeProduct;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsType = TypeProduct::paginate(5);
        return view('type_products.list')->with(['lsType'=>$lsType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_products.add');
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
           'type'=>'required'
        ]);

        $type_product = new TypeProduct();

        $type_product->name_type = $request->type;

        $type_product->save();

        return redirect('/type_product')->with(['add_success'=>'Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = TypeProduct::find($id);
        return view('type_products.show')->with(['type'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = TypeProduct::find($id);
        return view('type_products.edit')->with(['type'=>$type]);
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
        $type = TypeProduct::find($id);
        $type->name_type = $request->type;

        $type->save();
        return redirect('/type_product')->with(['edit_success'=>'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = TypeProduct::find($id);
        $type->delete();

        return redirect('/type_product')->with(['delete_success'=>'Xóa thành công']);
    }
}
