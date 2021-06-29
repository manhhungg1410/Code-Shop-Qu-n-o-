<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\GuestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Frontend

    //Admin Login
Route::get('/admin',[AdminController::class,'login'])->name('login');
Route::get('/admin_signup',[AdminController::class,'signup'])->name('sign_up');
Route::post('/check_signup',[AdminController::class,'check_signup'])->name('check_signup');
Route::post('/checkLogin_admin',[AdminController::class,'sign_in'])->name('checkLogin_admin');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');

    //Admin home page
Route::middleware([\App\Http\Middleware\CheckLogin::class])->group(function(){
    Route::get('/admin_home',[AdminController::class,'index'])->name('admin_home');
    Route::resource('/products',\App\Http\Controllers\ProductController::class);
    Route::resource('/type_product',\App\Http\Controllers\TypeProductController::class);
    Route::resource('/details_type_products',\App\Http\Controllers\DetailsTypeProductController::class);
    Route::resource('/details_product',\App\Http\Controllers\DetailsProductController::class);
    Route::resource('/product_images',\App\Http\Controllers\ProductImagesController::class);
});

    //Test code
//Route::get('/test',[DemoController::class,'test'])->name('demo');

    //Frontend_Guest
Auth::routes(['verify'=>true]);
Route::get('/login_guest',[\App\Http\Controllers\GuestController::class,'login'])->name('login_guest');
Route::post('/check_register',[GuestController::class,'check_register'])->name('check_register');
Route::post('/check_login',[GuestController::class,'check_login'])->name('check_login');
Route::get('/logout_guest',[GuestController::class,'logout_guests'])->name('logout_guests');
       Route::middleware([\App\Http\Middleware\CheckGuests::class])->group(function(){
Route::get('/details_guest',[GuestController::class,'details_guest'])->name('details_guest');
Route::get('/edit_guest/{id}',[GuestController::class,'edit_guest'])->name('edit_guest');
Route::post('/update_guest/{id}',[GuestController::class,'update_guest'])->name('update_guest');
Route::get('/change_password/{id}',[GuestController::class,'change_password'])->name('change_password');
Route::post('/confirm_password/{id}',[GuestController::class,'confirm_password'])->name('confirm_password');
});
       // Show Products
//Route::get('/{id}',[\App\Http\Controllers\ShowProductsController::class,'show'])->name('show_products');
Route::get('/',[\App\Http\Controllers\FrontEndController::class,'index'])->name('home_page');
Route::get('/products_{id}',[\App\Http\Controllers\FrontEndController::class,'products'])->name('products');
Route::get('/show_details_{id}',[\App\Http\Controllers\FrontEndController::class,'show_details'])->name('show_details');
