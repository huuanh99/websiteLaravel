<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\customer;
use App\Models\order;
use App\Models\orderdetails;
use App\Models\product;
use Format;
use Illuminate\Http\Request;

include_once('app/Format/format.php');

class CommercialController extends Controller
{
    public function __construct()
    {
        $fm = new Format();
        $category = category::all();
        $slider_featured = product::where('type', 1)->get();
        view()->share('category', $category);
        view()->share('slider_featured', $slider_featured);
        view()->share('fm', $fm);
    }

    public function index()
    {
        $new_product = product::orderBy('id', 'desc')->limit(4)->get();
        return view('index', compact('new_product'));
    }

    public function receiveOrder(Request $request,$id){
        $order=order::find($id);
        $order->status=2;
        $order->save();
        $orders=order::where('customer_id',$request->session()->get('customer')->id)->get();
        return redirect()->route('order')->with('orders',$orders);
    }

    public function details($id)
    {
        $product = product::find($id);
        return view('details', compact('product'));
    }

    public function productbycat($id)
    {
        $category = category::find($id);
        $product = $category->products;
        return view('productbycat', compact('category', 'product'));
    }

    public function orderdetail($id)
    {
        $order=orderdetails::where('order_id',$id)->get();
        $products=[];
        foreach($order as $item){
            $product=product::where('id',$item->order_id);
            array_push($products,$product);
        }
        return view('orderdetail', compact('order','products'));
    }

    public function search(Request $request)
    {
        $product = product::where('productName', 'like', '%' . $request->keyword . '%')->get();
        return view('search', compact('product'));
    }

    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        return view('login');
    }

    public function customerlogin(Request $request)
    {
        $customer=customer::all();
        foreach($customer as $value){
            if($request->email==$value->email&&md5($request->password)==$value->password){
                $request->session()->put('customer', $value);
                return redirect()->route('index');
            }
        }
        $request->session()->put('message', 'Tên tài khoản hoặc mật khẩu của bạn chưa đúng');
        return redirect()->back();
    }

    public function profile()
    {
        return view('profile');
    }

    public function order(Request $request)
    {
        $orders=order::where('customer_id',$request->session()->get('customer')->id)->get();
        return view('order',compact('orders'));
    }

    public function payment()
    {
        return view('payment');
    }

    public function offlinepayment()
    {
        return view('offlinepayment');
    }

    public function cart()
    {
        return view('cart');
    }

    public function contact()
    {
        return view('contact');
    }

    public function topbrand()
    {
        return view('topbrands');
    }

    public function products()
    {
        return view('products');
    }

    public function updatecustomer(Request $request)
    {
        $id=$request->session()->get('customer')->id;
        $customer=customer::find($id);
        $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->zipcode=$request->zipcode;
        $customer->phone=$request->phone;
        $customer->email=$request->email;
        $customer->save();
        $request->session()->put('customer', $customer);
        $request->session()->put('message', 'Cập nhật tài khoản thành công');
        return redirect()->back();
    }

    
}
