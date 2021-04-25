<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\brand;
use App\Models\category;
use App\Models\customer;
use App\Models\order;
use App\Models\orderdetails;
use App\Models\product;
use Format;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

include_once('app/Format/format.php');
class AdminController extends Controller
{
    public function __construct()
    {
        $fm = new Format();
        view()->share('fm', $fm);
    }

    public function index(Request $request)
    {
        if ($request->session()->get('adminlogin')) {
            return view('admin.index');
        }
        return view('admin.login');
    }

    public function changingPassword(Request $request)
    {
        $oldpass = md5($request->oldpass);
        if ($request->session()->get('admin')->adminPass == $oldpass) {
            $admin = admin::find($request->session()->get('admin')->id);
            $admin->adminPass = md5($request->newpass);
            $admin->save();
            $request->session()->flash('message', 'Bạn đã đổi mật khẩu thành công');
        } else {
            $request->session()->flash('message', 'Mật khẩu bạn nhập không đúng vui lòng nhập lại');
        }
        return view('admin.changepassword');
    }

    public function login(Request $request)
    {
        $admin = admin::all();
        $check = false;
        foreach ($admin as $value) {
            if ($request->adminUser == $value->adminUser && $value->adminPass == md5($request->adminPass)) {
                $request->session()->put('adminlogin', true);
                $request->session()->put('adminName', $value->adminName);
                $request->session()->put('admin', $value);
                $check = true;
            }
        }
        if ($check == false) {
            $request->session()->flash('message', 'Tên đăng nhập hoặc mật khẩu sai');
            echo "FAIL";
        }
        return redirect()->route('adminindex');
    }

    public function adminlogout(Request $request)
    {
        $request->session()->forget('adminlogin');
        $request->session()->forget('adminName');
        return redirect()->route('adminindex');
    }

    public function changepassword()
    {
        return view('admin.changepassword');
    }

    public function handleOrder($id)
    {
        $order = order::find($id);
        $order->status = 1;
        $order->save();
        return redirect()->route('inbox');
    }

    public function inbox()
    {
        $order = order::where('status', '<>', 2)->get();
        return view('admin.inbox', compact('order'));
    }

    public function catlist()
    {
        $category = category::orderBy('id', 'desc')->get();
        return view('admin.catlist', compact('category'));
    }

    public function brandlist()
    {
        $brand = brand::orderBy('id', 'desc')->get();
        return view('admin.brandlist', compact('brand'));
    }

    public function productlist()
    {
        $products = product::orderBy('id', 'desc')->get();
        return view('admin.productlist', compact('products'));
    }

    public function catadd()
    {
        return view('admin.catadd');
    }

    public function brandadd()
    {
        return view('admin.brandadd');
    }

    public function productadd()
    {
        $category = category::orderBy('id', 'desc')->get();
        $brand = brand::orderBy('id', 'desc')->get();
        return view('admin.productadd', compact('category', 'brand'));
    }

    public function catedit($id)
    {
        $cat = category::find($id);
        if ($cat == null) {
            return view(404.404);
        }
        return view('admin.catedit', compact('cat'));
    }

    public function brandedit($id)
    {
        $brand = brand::find($id);
        if ($brand == null) {
            return view(404.404);
        }
        return view('admin.brandedit', compact('brand'));
    }

    public function productedit($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return view(404.404);
        }
        $category = category::orderBy('id', 'desc')->get();
        $brand = brand::orderBy('id', 'desc')->get();
        return view('admin.productedit', compact('product', 'category', 'brand'));
    }

    public function catdelete($id)
    {
        $cat = category::find($id);
        if ($cat == null) {
            return view(404.404);
        }
        $cat->delete();
        return redirect()->route('catlist');
    }

    public function brandDelete($id)
    {
        $brand = brand::find($id);
        if ($brand == null) {
            return view(404.404);
        }
        $brand->delete();
        return redirect()->route('brandlist');
    }

    public function productelete($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return view(404.404);
        }
        unlink("uploads/" . $product->image);
        $product->delete();
        return redirect()->route('productlist');
    }

    public function editcategory(Request $request)
    {
        $cat = category::find($request->catId);
        $cat->catName = $request->catName;
        $cat->save();
        $request->session()->flash('message', 'Update Category Succesfully');
        return redirect()->route('catedit', ['id' => $cat->id]);
    }

    public function editbrand(Request $request)
    {
        $brand = brand::find($request->brandId);
        $brand->brandName = $request->brandName;
        $brand->save();
        $request->session()->flash('message', 'Update Brand Succesfully');
        return redirect()->route('brandedit', ['id' => $brand->id]);
    }

    public function editproduct(Request $request)
    {
        $product = product::find($request->productId);
        $product->productName = $request->productName;
        $product->quantity = $request->quantity;
        $product->catId = $request->category;
        $product->brandId = $request->brand;
        $product->product_desc = $request->product_desc;
        $product->price = $request->price;
        $product->type = $request->type;
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        if (!empty($file_name)) {
            if (in_array($file_ext, $permited) == false) {
                $request->session()->flash('message', 'Bạn chỉ có thể upload ảnh JPG, JPEG, PNG, GIF');
                return redirect()->back();
            } else {
                $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                $uploaded_image = "uploads/$unique_image";
                move_uploaded_file($file_temp, $uploaded_image);
                unlink("uploads/" . $product->image);
                $product->image = $unique_image;
                $product->save();
                $request->session()->flash('message', 'Update Product Succesfully');
                return redirect()->back();
            }
        } else {
            $product->save();
            $request->session()->flash('message', 'Update Product Succesfully');
            return redirect()->back();
        }
    }

    public function addcategory(Request $request)
    {
        $cat = new category();
        $cat->catName = $request->catName;
        $cat->save();
        $request->session()->flash('message', 'Insert Category Succesfully');
        return view('admin.catadd');
    }

    public function addbrand(Request $request)
    {
        $brand = new brand();
        $brand->brandName = $request->brandName;
        $brand->save();
        $request->session()->flash('message', 'Insert Brand Succesfully');
        return view('admin.brandadd');
    }

    public function addproduct(Request $request)
    {
        $product = new product();
        $product->productName = $request->productName;
        $product->quantity = $request->quantity;
        $product->catId = $request->category;
        $product->brandId = $request->brand;
        $product->product_desc = $request->product_desc;
        $product->price = $request->price;
        $product->type = $request->type;
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        if (in_array($file_ext, $permited) == false) {
            $request->session()->flash('message', 'Bạn chỉ có thể upload ảnh JPG, JPEG, PNG, GIF');
            return redirect()->back();
        } else {
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "uploads/$unique_image";
            move_uploaded_file($file_temp, $uploaded_image);
            $product->image = $unique_image;
            $product->save();
            $request->session()->flash('message', 'Insert Product Succesfully');
            return view('admin.brandadd');
        }
    }
}
