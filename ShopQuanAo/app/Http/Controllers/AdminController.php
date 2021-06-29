<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function signup(){
        return view('admin.sign_up');
    }

    public function check_signup(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
            'phone' => 'required | max:10'
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password == $request->cf_password)
        {
            $admin->password = Hash::make($request->password);
        }
        else{
            return redirect('/admin_signup')->with(['fail'=>'Confirm password is not true']);
        }
        $admin->phone = $request->phone;

        $admin->save();

        return redirect('/admin')->with(['create_success'=>'Successfully create a new account']);
    }

    public function sign_in(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required | min:8'
        ]);

        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email'=>$email,'password'=>$password]))
        {
            return redirect('/admin_home');
        }
        else return redirect()->back()->with(['fail_login'=>'Password or Email is not true']);
    }

    public function index(){
        return view('admin.admin_layout');
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin');
    }
}
