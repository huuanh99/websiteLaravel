<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
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

//Commercial
Route::get('/', [CommercialController::class, 'index'])->name('index');
Route::get('/details/{id}', [CommercialController::class, 'details'])
  ->name('details');
Route::get('/productbycat/{id}', [CommercialController::class, 'productbycat'])
  ->name('productbycat');
Route::get('/login', [CommercialController::class, 'login'])->name('login');
Route::get('/profile', [CommercialController::class, 'profile'])
  ->middleware('login')->name('profile');
Route::get('/order', [CommercialController::class, 'order'])
  ->middleware('login')->name('order');
Route::get('/logout', [CommercialController::class, 'logout'])->name('logout');
Route::get('/cart', [CommercialController::class, 'cart'])->name('cart');
Route::get('/changepassword', [CommercialController::class, 'changepassword'])
  ->middleware('login')->name('changepassworduser');
Route::get('/receiveOrder/{id}', [CommercialController::class, 'receiveOrder'])
  ->name('receiveOrder');
Route::get('/topbrand', [CommercialController::class, 'topbrand'])->name('topbrand');
Route::get('/products', [CommercialController::class, 'products'])->name('products');
Route::get('/payment', [CommercialController::class, 'payment'])
  ->middleware('login')->name('payment');
Route::get('/deletecart/{id}', [CartController::class, 'deletecart'])->name('deletecart');
Route::get('/offlinepayment', [CommercialController::class, 'offlinepayment'])
  ->middleware('login')->name('offlinepayment');
Route::get('/orderdetail/{id}', [CommercialController::class, 'orderdetail'])
  ->name('orderdetail');
Route::get('/useractivation/{token}', [CommercialController::class, 'activate'])
  ->name('activate');

Route::post('/updatecustomer', [CommercialController::class, 'updatecustomer'])->name('updatecustomer');
Route::post('/customerlogin', [CommercialController::class, 'customerlogin'])->name('customerlogin');
Route::post('/search', [CommercialController::class, 'search'])->name('search');
Route::post('/addtocart', [CartController::class, 'addtocart'])->name('addtocart');
Route::post('/insertOrder', [CartController::class, 'insertOrder'])->name('insertOrder');
Route::post('/updatecart', [CartController::class, 'updatecart'])->name('updatecart');
Route::post('/register', [CommercialController::class, 'register'])->name('register');
Route::post('/changingpassworduser', [CommercialController::class, 'changingpassworduser'])->name('changingpassworduser');

//ADMIN
Route::get('/loginadmin', [AdminController::class, 'loginview'])->name('loginview');
Route::post('/login', [AdminController::class, 'login'])->name('adminlogin');
Route::get('/adminactivation/{token}', [AdminController::class, 'adminactivate'])
  ->name('adminactivate');
Route::prefix('admin')->middleware('adminlogin')->group(function () {
  Route::get('', [AdminController::class, 'index'])->name('adminindex');
  Route::get('/changepassword', [AdminController::class, 'changepassword'])->name('changepassword');
  Route::get('/profile', [AdminController::class, 'profile'])->name('adminprofile');
  Route::get('/inbox', [AdminController::class, 'inbox'])->name('inbox');
  Route::get('/handleOrder/{id}', [AdminController::class, 'handleOrder'])->name('handleOrder');

  Route::get('/catlist', [AdminController::class, 'catlist'])->name('catlist');
  Route::get('/brandlist', [AdminController::class, 'brandlist'])->name('brandlist');
  Route::get('/productlist', [AdminController::class, 'productlist'])->name('productlist');
  Route::get('/commentproduct', [AdminController::class, 'commentproduct'])->name('commentproduct');
  Route::get('/commentlist/{id}', [AdminController::class, 'commentlist'])->name('commentlist');
  Route::get('/ordersuccess', [AdminController::class, 'ordersuccess'])->name('ordersuccess');
  Route::get('/sliderlist', [AdminController::class, 'sliderlist'])->name('sliderlist');
  Route::get('/importlist', [AdminController::class, 'importlist'])->name('importlist');
  Route::get('/userlist', [AdminController::class, 'userlist'])->name('userlist');
  Route::get('/adminlist', [AdminController::class, 'adminlist'])->name('adminlist');

  Route::get('/adminorderdetail/{id}', [AdminController::class, 'adminorderdetail'])->name('adminorderdetail');
  Route::get('/importdetail/{id}', [AdminController::class, 'importdetail'])->name('importdetail');

  Route::get('/productrestore', [AdminController::class, 'productrestore'])->name('productrestore');
  Route::get('/sliderestore', [AdminController::class, 'sliderestore'])->name('sliderestore');
  Route::get('/adminrestore', [AdminController::class, 'adminrestore'])->name('adminrestore');

  Route::get('/catadd', [AdminController::class, 'catadd'])->name('catadd');
  Route::get('/brandadd', [AdminController::class, 'brandadd'])->name('brandadd');
  Route::get('/productadd', [AdminController::class, 'productadd'])->name('productadd');
  Route::get('/slideradd', [AdminController::class, 'slideradd'])->name('slideradd');
  Route::get('/importadd/{id}', [AdminController::class, 'importadd'])->name('importadd');
  Route::get('/adminadd', [AdminController::class, 'adminadd'])->name('adminadd');

  Route::get('/catedit/{id}', [AdminController::class, 'catedit'])->name('catedit');
  Route::get('/brandedit/{id}', [AdminController::class, 'brandedit'])->name('brandedit');
  Route::get('/productedit/{id}', [AdminController::class, 'productedit'])->name('productedit');
  Route::get('/slideredit/{id}', [AdminController::class, 'slideredit'])->name('slideredit');
  Route::get('/importedit/{id}', [AdminController::class, 'importedit'])->name('importedit');

  Route::get('/catdelete/{id}', [AdminController::class, 'catdelete'])->name('catdelete');
  Route::get('/brandDelete/{id}', [AdminController::class, 'brandDelete'])->name('brandDelete');
  Route::get('/productdelete/{id}', [AdminController::class, 'productdelete'])->name('productdelete');
  Route::get('/deletecomment/{id}', [AdminController::class, 'deletecomment'])->name('deletecomment');
  Route::get('/sliderdelete/{id}', [AdminController::class, 'sliderdelete'])->name('sliderdelete');
  Route::get('/admindelete/{id}', [AdminController::class, 'admindelete'])->name('admindelete');

  Route::get('/softdelete/{id}', [AdminController::class, 'softdelete'])->name('softdelete');
  Route::get('/adminsoftdelete/{id}', [AdminController::class, 'adminsoftdelete'])->name('adminsoftdelete');
  Route::get('/softsliderdelete/{id}', [AdminController::class, 'softsliderdelete'])->name('softsliderdelete');

  Route::get('/restoreadmin/{id}', [AdminController::class, 'restoreadmin'])->name('restoreadmin');
  Route::get('/restoreproduct/{id}', [AdminController::class, 'restoreproduct'])->name('restoreproduct');
  Route::get('/restoreslider/{id}', [AdminController::class, 'restoreslider'])->name('restoreslider');

  Route::get('/adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');

  Route::post('/editcategory', [AdminController::class, 'editcategory'])->name('editcategory');
  Route::post('/editbrand', [AdminController::class, 'editbrand'])->name('editbrand');
  Route::post('/editproduct', [AdminController::class, 'editproduct'])->name('editproduct');
  Route::post('/editslider', [AdminController::class, 'editslider'])->name('editslider');
  Route::post('/editimport', [AdminController::class, 'editimport'])->name('editimport');

  Route::post('/addcategory', [AdminController::class, 'addcategory'])->name('addcategory');
  Route::post('/addbrand', [AdminController::class, 'addbrand'])->name('addbrand');
  Route::post('/addproduct', [AdminController::class, 'addproduct'])->name('addproduct');
  Route::post('/addslider', [AdminController::class, 'addslider'])->name('addslider');
  Route::post('/addimport', [AdminController::class, 'addimport'])->name('addimport');
  Route::post('/addadmin', [AdminController::class, 'addadmin'])->name('addadmin');

  Route::post('/updateadmin', [AdminController::class, 'updateadmin'])->name('updateadmin');

  Route::post('/changingPassword', [AdminController::class, 'changingPassword'])->name('changingPassword');
});

//Comment
Route::post('/comment', [CommentController::class, 'comment'])->name('comment');
