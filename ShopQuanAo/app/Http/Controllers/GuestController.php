<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use App\Models\TypeProduct;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;


class GuestController extends Controller
{
    public function login()
    {
        $lsTypeProducts = TypeProduct::all();
        return view('Guest.login_guest')->with(['lsTypeProducts' => $lsTypeProducts]);
    }

    public function check_register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthDay' => 'required',
            'address' => 'required',
            'phone' => 'max:11',
            'email' => 'required | email | unique:guests',
            'password' => 'required | min:8',
            'cf_password' => 'required | min:8',
            'check' => 'required'
        ]);

        $check = new Guest();

        $check->first_name = $request->first_name;
        $check->last_name = $request->last_name;
        $check->gender = $request->gender;
        $check->birthday = $request->birthDay;
        $check->address = $request->address;
        $check->phone = $request->phone;
        $check->email = $request->email;
        if ($request->password == $request->cf_password) {
            $check->password = Hash::make($request->password);
        } else {
            return redirect('/login_guest')->with(['cf_ps' => 'Nhập lại mật khẩu khâu đúng']);
        }

        $check->save();

        return redirect('/login_guest')->with(['success' => 'Đăng ký thành công']);

    }

    public function check_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::guard('guests')->attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        } else {
            return redirect('/login_guest')->with(['login_fail' => 'Đăng nhập không thành công! Vui lòng nhập lại email hoặc mật khẩu']);
        }

    }

    public function logout_guests()
    {
        Auth::guard('guests')->logout();
        return redirect('/');
    }

    public function details_guest()
    {
        $lsTypeProducts = TypeProduct::all();
        return view('Guest.detail_gues')->with(['lsTypeProducts' => $lsTypeProducts]);
    }

    public function edit_guest($id)
    {
        $guests = Guest::find($id);
        $lsTypeProducts = TypeProduct::all();
        return view('Guest.edit_guest')->with(['guests' => $guests, 'lsTypeProducts' => $lsTypeProducts]);
    }

    public function update_guest(Request $request, $id)
    {
        $guests = Guest::find($id);

        $guests->first_name = $request->first_name;
        $guests->last_name = $request->last_name;
        $guests->gender = $request->gender;
        $guests->birthday = $request->birthDay;
        $guests->address = $request->address;
        $guests->phone = $request->phone;

        $guests->save();

        return redirect('/details_guest')->with(['success' => 'Sửa thông tin thành công']);
    }

    public function change_password()
    {
        $lsTypeProducts = TypeProduct::all();
        return view('Guest.change_password')->with(['lsTypeProducts' => $lsTypeProducts]);
    }

    public function confirm_password(Request $request, $id)
    {
        $guests = Guest::find($id);
        $request->validate([
          'old_password' => 'required|min:8',
           'new_password' =>  'required|min:8|different:old_password',
           'cf_password' => 'required|min:8'
       ]);

        if(Hash::check($request->old_password,$guests->password)){
            if($request->new_password == $request->cf_password) {
                $guests->password = Hash::make($request->new_password);
                $guests->save();
                return redirect('/details_guest')->with(['success'=>'Cập nhật mật khẩu thành công']);
            }
            else{
                return redirect()->back()->with(['cf_ps'=>'Nhập lại mật khẩu không đúng, xin mới bạn nhập lại']);
            }
        }
        else{
            return redirect()->back()->with(['error'=>'Mật khẩu cũ không chính xác, xin mời bạn nhập lại']);
        }

    }
}
