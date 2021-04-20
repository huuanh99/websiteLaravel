<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CommercialController::class, 'index'])->name('index');
Route::get('/details/{id}', [CommercialController::class, 'details'])->name('details');
Route::get('/productbycat/{id}', [CommercialController::class, 'productbycat'])->name('productbycat');
Route::get('/login', [CommercialController::class, 'login'])->name('login');
Route::get('/profile', [CommercialController::class, 'profile'])->name('profile');
Route::get('/order', [CommercialController::class, 'order'])->name('order');
Route::get('/logout', [CommercialController::class, 'logout'])->name('logout');
Route::get('/cart', [CommercialController::class, 'cart'])->name('cart');
Route::get('/contact', [CommercialController::class, 'contact'])->name('contact');
Route::get('/topbrand', [CommercialController::class, 'topbrand'])->name('topbrand');
Route::get('/products', [CommercialController::class, 'products'])->name('products');
Route::get('/payment', [CommercialController::class, 'payment'])->name('payment');
Route::get('/deletecart/{id}', [CartController::class, 'deletecart'])->name('deletecart');
Route::get('/offlinepayment', [CommercialController::class, 'offlinepayment'])->name('offlinepayment');
Route::get('/orderdetail/{id}', [CommercialController::class, 'orderdetail'])->name('orderdetail');

Route::post('/updatecustomer', [CommercialController::class, 'updatecustomer'])->name('updatecustomer');
Route::post('/customerlogin', [CommercialController::class, 'customerlogin'])->name('customerlogin');
Route::post('/search', [CommercialController::class, 'search'])->name('search');
Route::post('/addtocart', [CartController::class, 'addtocart'])->name('addtocart');
Route::post('/insertOrder', [CartController::class, 'insertOrder'])->name('insertOrder');
Route::post('/updatecart', [CartController::class, 'updatecart'])->name('updatecart');

Route::prefix('admin')->group(function () {
  Route::get('', [AdminController::class,'index'])->name('adminindex');
  Route::get('/changepassword', [AdminController::class,'changepassword'])->name('changepassword');
  Route::get('/inbox', [AdminController::class,'inbox'])->name('inbox');
  Route::get('/handleOrder/{id}', [AdminController::class, 'handleOrder'])->name('handleOrder');
  Route::get('/receiveOrder/{id}', [CommercialController::class, 'receiveOrder'])->name('receiveOrder');

  Route::get('/catlist', [AdminController::class,'catlist'])->name('catlist');
  Route::get('/brandlist', [AdminController::class,'brandlist'])->name('brandlist');
  Route::get('/productlist', [AdminController::class,'productlist'])->name('productlist');

  Route::get('/catadd', [AdminController::class,'catadd'])->name('catadd');
  Route::get('/brandadd', [AdminController::class,'brandadd'])->name('brandadd');
  Route::get('/productadd', [AdminController::class,'productadd'])->name('productadd');

  Route::get('/catedit/{id}', [AdminController::class,'catedit'])->name('catedit');
  Route::get('/brandedit/{id}', [AdminController::class,'brandedit'])->name('brandedit');
  Route::get('/productedit/{id}', [AdminController::class,'productedit'])->name('productedit');

  Route::get('/catdelete/{id}', [AdminController::class,'catdelete'])->name('catdelete');
  Route::get('/brandDelete/{id}', [AdminController::class,'brandDelete'])->name('brandDelete');
  Route::get('/productdelete/{id}', [AdminController::class,'productelete'])->name('productdelete');

  Route::get('/adminlogout', [AdminController::class,'adminlogout'])->name('adminlogout');
  Route::post('/login', [AdminController::class,'login'])->name('adminlogin');    

  Route::post('/editcategory', [AdminController::class,'editcategory'])->name('editcategory');
  Route::post('/editbrand', [AdminController::class,'editbrand'])->name('editbrand');
  Route::post('/editproduct', [AdminController::class,'editproduct'])->name('editproduct');

  Route::post('/addcategory', [AdminController::class,'addcategory'])->name('addcategory');    
  Route::post('/addbrand', [AdminController::class,'addbrand'])->name('addbrand');    
  Route::post('/addproduct', [AdminController::class,'addproduct'])->name('addproduct');    

  Route::post('/changingPassword', [AdminController::class,'changingPassword'])->name('changingPassword');    

});


