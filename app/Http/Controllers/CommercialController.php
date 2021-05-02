<?php

namespace App\Http\Controllers;

use App\Mail\RegisterConfirm;
use App\Mail\OrderSuccessful;
use App\Models\category;
use App\Models\comment;
use App\Models\country;
use App\Models\customer;
use App\Models\order;
use App\Models\orderdetails;
use App\Models\product;
use App\Models\slider;
use Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

include_once('app/Format/format.php');

class CommercialController extends Controller
{
    public function __construct()
    {
        $fm = new Format();
        $category = category::all();
        $product_featured = product::where('type', 1)->where('status', 1)->get();
        view()->share('category', $category);
        view()->share('product_featured', $product_featured);
        view()->share('fm', $fm);
    }

    public function index()
    {
        $new_product = product::where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        $slider = slider::where('status', 1)->orderBy('id', 'desc')->get();
        return view('user.index', compact('new_product', 'slider'));
    }

    public function receiveOrder(Request $request, $id)
    {
        $order = order::find($id);
        if ($order == null) {
            $orders = order::where('customer_id', $request->session()->get('customer')->id)->get();
            return redirect()->route('order')->with('orders', $orders);
        } else if (
            $order->customer_id == $request->session()->get('customer')->id
            && $order->status == 1
        ) {
            $order->status = 2;
            $order->save();
            Mail::to($order)->send(new OrderSuccessful($order));
            $orders = order::where('customer_id', $request->session()->get('customer')->id)->get();
            return redirect()->route('order')->with('orders', $orders);
        }
        $orders = order::where('customer_id', $request->session()->get('customer')->id)->get();
        return redirect()->route('order')->with('orders', $orders);
    }

    public function details($id)
    {
        $product = product::find($id);
        if ($product == null || $product->status == 0) {
            return view(404.403);
        }
        $comment = comment::where('product_id', $id)->get();
        return view('user.details', compact('product', 'comment'));
    }

    public function productbycat($id)
    {
        $category = category::find($id);
        if ($category == null) {
            return view(404.403);
        }
        $product = $category->products;
        return view('user.productbycat', compact('category', 'product'));
    }

    public function orderdetail($id)
    {
        $orders = order::find($id);
        if ($orders == null) {
            return view(404.403);
        }
        $order = orderdetails::where('order_id', $id)->get();
        $products = [];
        foreach ($order as $item) {
            $product = product::where('id', $item->order_id);
            array_push($products, $product);
        }
        return view('user.orderdetail', compact('order', 'products'));
    }

    public function search(Request $request)
    {
        $product = product::where('status', 1)->where('productName', 'like', '%' . $request->keyword . '%')->get();
        return view('user.search', compact('product'));
    }

    public function login()
    {
        $countries = country::all();
        return view('user.login', compact('countries'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        return redirect()->route('login');
    }

    public function customerlogin(Request $request)
    {
        $customer = customer::all();
        foreach ($customer as $value) {
            if (
                $request->email == $value->email && md5($request->password) == $value->password
                && $value->is_activated == 1
            ) {
                $request->session()->put('customer', $value);
                return redirect()->route('index');
            }
        }
        $request->session()->put('message', 'Đăng nhập thất bại');
        return redirect()->back();
    }

    public function register(Request $request)
    {
        $checkcustomer = customer::where('email', $request->email)->first();
        if ($checkcustomer != null && $checkcustomer->is_activated == 1) {
            $request->session()->flash('register', 'Tài khoản email này đã được sử dụng để đăng ký');
            return redirect()->route('login');
        } else if ($checkcustomer != null && $checkcustomer->is_activated == 0) {
            $checkcustomer->name = $request->name;
            $checkcustomer->city = $request->city;
            $checkcustomer->zipcode = $request->zipcode;
            $checkcustomer->address = $request->address;
            $checkcustomer->phone = $request->phone;
            $checkcustomer->password = md5($request->password);
            $checkcustomer->country_id = $request->country;
            $checkcustomer->remember_token = md5(time());
            $checkcustomer->save();
            Mail::to($checkcustomer)->send(new RegisterConfirm($checkcustomer));
            $request->session()->flash('register', 'Đăng ký thành công vui lòng kiểm tra email để kích hoạt');
            return redirect()->route('login');
        }
        $customer = new customer();
        $customer->name = $request->name;
        $customer->city = $request->city;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = md5($request->password);
        $customer->country_id = $request->country;
        $customer->remember_token = md5(time());
        $customer->save();
        Mail::to($customer)->send(new RegisterConfirm($customer));
        $request->session()->flash('register', 'Đăng ký thành công vui lòng kiểm tra email để kích hoạt');
        return redirect()->route('login');
    }

    public function activate($token, Request $request)
    {
        $customer = customer::where('remember_token', $token)->first();
        if ($customer == null) {
            $request->session()->flash('register', 'Mã xác nhận email không hợp lệ');
            return redirect()->route('login');
        }
        $customer->remember_token = null;
        $customer->is_activated = 1;
        $customer->save();
        $request->session()->flash('register', 'Tài khoản đã được kích hoạt vui lòng đăng nhập');
        return redirect()->route('login');
    }

    public function profile()
    {
        $countries = country::all();
        return view('user.profile', compact('countries'));
    }

    public function order(Request $request)
    {
        $orders = order::where('customer_id', $request->session()->get('customer')->id)->get();
        return view('user.order', compact('orders'));
    }

    public function payment()
    {
        return view('user.payment');
    }

    public function offlinepayment()
    {
        return view('user.offlinepayment');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function changepassword()
    {
        return view('user.changepassword');
    }

    public function changingpassworduser(Request $request)
    {
        if ($request->session()->get('customer')->password != md5($request->oldpass)) {
            $request->session()->flash('message', "Mật khẩu cũ của bạn không chính xác");
            return redirect()->back();
        } else if ($request->newpass != $request->confirmpass) {
            $request->session()->flash('message', "Xác nhận mật khẩu mới của bạn không trùng");
            return redirect()->back();
        } else {
            $customer = customer::find($request->session()->get('customer')->id);
            $customer->password = md5($request->newpass);
            $customer->save();
            $request->session()->put('customer', $customer);
            $request->session()->flash('message', "Đổi mật khẩu thành công");
            return redirect()->back();
        }
    }

    public function topbrand()
    {
        $slider = slider::where('status', 1)->orderBy('id', 'desc')->get();
        return view('user.topbrands', compact('slider'));
    }

    public function products()
    {
        $slider = slider::where('status', 1)->orderBy('id', 'desc')->get();
        return view('user.products', compact('slider'));
    }

    public function updatecustomer(Request $request)
    {
        $id = $request->session()->get('customer')->id;
        $customer = customer::find($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->zipcode = $request->zipcode;
        $customer->phone = $request->phone;
        $customer->city = $request->city;
        $customer->country_id = $request->country;
        $customer->save();
        $request->session()->put('customer', $customer);
        $request->session()->flash('message', 'Cập nhật tài khoản thành công');
        return redirect()->back();
    }
}
