<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\order;
use App\Models\orderdetails;
use App\Models\product;
use Format;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderNotification;

include_once('app/Format/format.php');

class CartController extends Controller
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

    public function addtocart(Request $request)
    {
        $id = $request->id;
        $product = product::find($id);
        if ($request->session()->get('cart') == null) {
            $product->totalquantity = $product->quantity;
            $product->quantity = $request->quantity;
            $cart = [];
            array_push($cart, $product);
            $request->session()->put('cart', $cart);
            $request->session()->put('subtotal', $product->price * $request->quantity);
        } else {
            $cart = $request->session()->get('cart');
            $check = false;
            foreach ($cart as $cartItem) {
                if ($cartItem->id == $id) {
                    $totalquantity = $cartItem->quantity + $request->quantity;
                    if ($totalquantity > $cartItem->totalquantity) {
                        $cartItem->quantity = $cartItem->totalquantity;
                    } else {
                        $cartItem->quantity += $request->quantity;
                    }
                    $check = true;
                }
            }
            if ($check == false) {
                $product->totalquantity = $product->quantity;
                $product->quantity = $request->quantity;
                array_push($cart, $product);
            }
            $request->session()->put('cart', $cart);
            $subtotal = $request->session()->get('subtotal');
            $subtotal += $product->price * $request->quantity;
            $request->session()->put('subtotal', $subtotal);
        }
        $request->session()->put('count', count($request->session()->get('cart')));
        return view('user.cart');
    }

    public function updatecart(Request $request)
    {
        $id = $request->id;
        $cart = $request->session()->get('cart');
        $subtotal = 0;
        foreach ($cart as $cartItem) {
            if ($cartItem->id == $id) {
                $cartItem->quantity = $request->quantity;
            }
            $subtotal += $cartItem->price * $cartItem->quantity;
        }
        $request->session()->put('cart', $cart);
        $request->session()->put('subtotal', $subtotal);
        return view('user.cart');
    }

    public function deletecart(Request $request, $id)
    {
        $cart = $request->session()->get('cart');
        $subtotal = $request->session()->get('subtotal');
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]->id == $id) {
                $subtotal -= $cart[$i]->price * $cart[$i]->quantity;
                array_splice($cart, $i, 1);
            }
        }
        $request->session()->put('cart', $cart);
        $request->session()->put('subtotal', $subtotal);
        $request->session()->put('count', count($request->session()->get('cart')));
        return view('user.cart');
    }

    public function insertOrder(Request $request)
    {
        $order = new order();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->zipcode = $request->zipcode;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->total = $request->session()->get('subtotal') * 0.95;
        $order->customer_id = $request->session()->get('customer')->id;
        $order->save();
        $order_id = $order->id;
        $cart = $request->session()->get('cart');
        foreach ($cart as $item) {
            $orderdetail = new orderdetails();
            $orderdetail->order_id = $order_id;
            $orderdetail->product_id = $item->id;
            $orderdetail->quantity = $item->quantity;
            $orderdetail->save();
            $product=product::find($item->id);
            $product->quantity-=$item->quantity;
            $product->save();
        }
        $request->session()->forget('cart');
        $request->session()->forget('subtotal');
        $request->session()->forget('count');
        Mail::to($order)->send(new OrderNotification($order));
        $request->session()->flash('message', "Bạn hãy vào email để kiểm tra thông tin đặt hàng");
        return view('user.cart');
    }
}
