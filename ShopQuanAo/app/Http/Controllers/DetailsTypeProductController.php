<?php

namespace App\Http\Controllers;

use App\Models\DetailsTypeProduct;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class DetailsTypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsDetails_Type = DetailsTypeProduct::paginate(10);
        return view('details_type_products.list')->with(['lsDetail'=>$lsDetails_Type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsType = TypeProduct::all();
        return view('details_type_products.add')->with(['lsType'=>$lsType]);
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

        $details_type = new DetailsTypeProduct();

        $details_type->type_products_id = $request->type;
        $details_type->details_name_type = $request->name_details;
        if ($request->cover != null){
            $name = $request->cover->getClientOriginalExtension();
            $name = time(). "." .$name;
            $request->cover->move(public_path('upload'),$name);
            $path = 'upload/' .$name;
            $details_type->cover_details_type = $path;
        }
        $details_type->status = $request->status;

        $details_type->save();

        return redirect('/details_type_products')->with(['create_success'=>'Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = DetailsTypeProduct::find($id);
        return view('details_type_products.show')->with(['details'=>$details]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $lsType = TypeProduct::all();
          $details = DetailsTypeProduct::find($id);
          return view('details_type_products.edit')->with(['details'=>$details,'lsType'=>$lsType]);
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
         $details = DetailsTypeProduct::find($id);

         $details->type_products_id = $request->type;
         $details->details_name_type = $request->name_details;
        if ($request->cover != null){
            $name = $request->cover->getClientOriginalExtension();
            $name = time(). "." .$name;
            $request->cover->move(public_path('upload'),$name);
            $path = 'upload/' .$name;
            $details->cover_details_type = $path;
        }
        $details->status = $request->status;

         $details->save();

         return redirect('/details_type_products')->with(['edit_success'=>'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details = DetailsTypeProduct::find($id);

        $details->delete();

        return redirect()->back()->with(['delete_success'=>'Xóa thành công']);
    }
}
