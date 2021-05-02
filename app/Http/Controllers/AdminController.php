<?php

namespace App\Http\Controllers;

use App\Mail\AdminEmailConfirm;
use App\Models\admin;
use App\Models\brand;
use App\Models\category;
use App\Models\comment;
use App\Models\customer;
use App\Models\import;
use App\Models\order;
use App\Models\orderdetails;
use App\Models\product;
use App\Models\slider;
use Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

include_once('app/Format/format.php');
class AdminController extends Controller
{
    public function __construct()
    {
        $fm = new Format();
        view()->share('fm', $fm);
    }
    public function loginview()
    {
        return view('admin.other.login');
    }

    public function index()
    {
        return view('admin.other.index');
    }

    public function changingPassword(Request $request)
    {
        $oldpass = md5($request->oldpass);
        if ($request->session()->get('admin')->adminPass != md5($request->oldpass)) {
            $request->session()->flash('message', 'Mật khẩu bạn nhập không đúng vui lòng nhập lại');
        }else if($request->newpass!=$request->confirmpass){
            $request->session()->flash('message', 'Mật khẩu xác nhận không trùng');
        } else {
            $admin = admin::find($request->session()->get('admin')->id);
            $admin->adminPass = md5($request->newpass);
            $admin->save();
            $request->session()->flash('message', 'Bạn đã đổi mật khẩu thành công');
        }
        return view('admin.other.changepassword');
    }

    public function login(Request $request)
    {
        $admin = admin::all();
        $check = false;
        foreach ($admin as $value) {
            if (
                $request->adminEmail == $value->adminEmail &&
                $value->adminPass == md5($request->adminPass)
                && $value->status == 1 && $value->is_activated==1
            ) {
                $request->session()->put('admin', $value);
                $check = true;
            }
        }
        if ($check == false) {
            $request->session()->flash('message', 'Đăng nhập thất bại');
        }
        return redirect()->route('adminindex');
    }

    public function adminlogout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect()->route('adminindex');
    }

    public function changepassword()
    {
        return view('admin.other.changepassword');
    }

    public function profile()
    {
        return view('admin.other.profile');
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
        return view('admin.other.inbox', compact('order'));
    }

    public function catlist()
    {
        $category = category::orderBy('id', 'desc')->get();
        return view('admin.category.catlist', compact('category'));
    }

    public function userlist()
    {
        $users = customer::orderBy('id', 'desc')->get();
        return view('admin.user.userlist', compact('users'));
    }

    public function adminlist()
    {
        $admins = admin::where('status', 1)->orderBy('level', 'desc')->get();
        return view('admin.admin.adminlist', compact('admins'));
    }

    public function brandlist()
    {
        $brand = brand::orderBy('id', 'desc')->get();
        return view('admin.brand.brandlist', compact('brand'));
    }

    public function productlist()
    {
        $products = product::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.product.productlist', compact('products'));
    }

    public function importlist()
    {
        $products = product::where('status', 1)->orderBy('id', 'desc')->get();
        $orders=order::where('status', 2)->orderBy('id', 'desc')->get();
        $imports=import::all();
        $income=0;
        foreach($orders as $order){
            $income+=$order->total;
        }
        $outcome=0;
        foreach($imports as $import){
            $outcome+=$import->price*$import->quantity;
        }
        return view('admin.import.importlist', compact('products','income','outcome'));
    }

    public function sliderlist()
    {
        $sliders = slider::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.slider.sliderlist', compact('sliders'));
    }

    public function ordersuccess()
    {
        $orders = order::where('status', 2)->orderBy('id', 'desc')->get();
        return view('admin.order.ordersuccess', compact('orders'));
    }

    public function adminorderdetail($id)
    {
        $order = order::find($id);
        $orderdetails = $order->orderdetails;
        return view('admin.order.orderdetail', compact('order', 'orderdetails'));
    }

    public function importdetail($id)
    {
        $imports = import::where('product_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.import.importdetail', compact('imports'));
    }

    public function commentlist($id)
    {
        $comments = comment::where('product_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.comment.commentlist', compact('comments'));
    }

    public function commentproduct()
    {
        $products = product::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.comment.commentproduct', compact('products'));
    }

    public function productrestore()
    {
        $products = product::where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.product.productrestore', compact('products'));
    }

    public function adminrestore()
    {
        $admins = admin::where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.admin.adminrestore', compact('admins'));
    }


    public function sliderestore()
    {
        $sliders = slider::where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.slider.sliderestore', compact('sliders'));
    }

    public function catadd()
    {
        return view('admin.category.catadd');
    }

    public function adminadd()
    {
        return view('admin.admin.adminadd');
    }

    public function brandadd()
    {
        return view('admin.brand.brandadd');
    }

    public function productadd()
    {
        $category = category::orderBy('id', 'desc')->get();
        $brand = brand::orderBy('id', 'desc')->get();
        return view('admin.product.productadd', compact('category', 'brand'));
    }

    public function importadd($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return view(404.404);
        }
        return view('admin.import.importadd', compact('product'));
    }

    public function slideradd()
    {
        return view('admin.slider.slideradd');
    }

    public function catedit($id)
    {
        $cat = category::find($id);
        if ($cat == null) {
            return view(404.404);
        }
        return view('admin.category.catedit', compact('cat'));
    }

    public function brandedit($id)
    {
        $brand = brand::find($id);
        if ($brand == null) {
            return view(404.404);
        }
        return view('admin.brand.brandedit', compact('brand'));
    }

    public function importedit($id)
    {
        $import = import::find($id);
        if ($import == null) {
            return view(404.404);
        }
        return view('admin.import.importedit', compact('import'));
    }

    public function productedit($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return view(404.404);
        }
        $category = category::orderBy('id', 'desc')->get();
        $brand = brand::orderBy('id', 'desc')->get();
        return view('admin.product.productedit', compact('product', 'category', 'brand'));
    }

    public function slideredit($id)
    {
        $slider = slider::find($id);
        if ($slider == null) {
            return view(404.404);
        }
        return view('admin.slider.slideredit', compact('slider'));
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

    public function sliderdelete($id)
    {
        $slider = slider::find($id);
        if ($slider == null) {
            return view(404.404);
        }
        unlink("uploads/" . $slider->image);
        $slider->delete();
        return redirect()->route('sliderestore');
    }

    public function admindelete(Request $request, $id)
    {
        if ($request->session()->get('admin')->level == 0) {
            $request->session()->flash('message', 'Bạn không có đủ quyền để xóa vĩnh viễn tài khoản này');
            return redirect()->back();
        }
        $admin = admin::find($id);
        if ($admin == null) {
            return view(404.404);
        }
        $admin->delete();
        $request->session()->flash('message', 'Xóa vĩnh viễn tài khoản thành công');
        return redirect()->back();
    }

    public function deletecomment($id)
    {
        $comment = comment::find($id);
        if ($comment == null) {
            return view(404.404);
        }
        $comment->delete();
        return redirect()->back();
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

    public function softdelete($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return view(404.404);
        }
        $product->status = 0;
        $product->save();
        return redirect()->route('productlist');
    }
    public function adminsoftdelete(Request $request, $id)
    {
        if ($request->session()->get('admin')->level == 0) {
            $request->session()->flash('message', 'Bạn không có đủ quyền để xóa tài khoản này');
            return redirect()->back();
        }
        $admin = admin::find($id);
        if ($admin == null) {
            return view(404.404);
        } else if ($admin->level == 1) {
            $request->session()->flash('message', 'Tài khoản admin chính không thể bị xóa');
            return redirect()->back();
        }
        $admin->status = 0;
        $admin->save();
        $request->session()->flash('message', 'Xóa tài khoản thành công');
        return redirect()->back();
    }

    public function softsliderdelete($id)
    {
        $slider = slider::find($id);
        if ($slider == null) {
            return view(404.404);
        }
        $slider->status = 0;
        $slider->save();
        return redirect()->route('sliderlist');
    }

    public function restoreproduct($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return view(404.404);
        }
        $product->status = 1;
        $product->save();
        return redirect()->route('productrestore');
    }

    public function restoreadmin(Request $request, $id)
    {
        if ($request->session()->get('admin')->level == 0) {
            $request->session()->flash('message', 'Bạn không có đủ quyền để khôi phục tài khoản này');
            return redirect()->back();
        }
        $admin = admin::find($id);
        if ($admin == null) {
            return view(404.404);
        }
        $admin->status = 1;
        $admin->save();
        $request->session()->flash('message', 'Khôi phục tài khoản thành công');
        return redirect()->back();
    }

    public function restoreslider($id)
    {
        $slider = slider::find($id);
        if ($slider == null) {
            return view(404.404);
        }
        $slider->status = 1;
        $slider->save();
        return redirect()->route('sliderestore');
    }

    public function productdelete($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return view(404.404);
        }
        unlink("uploads/" . $product->image);
        $product->delete();
        return redirect()->route('productrestore');
    }

    public function editcategory(Request $request)
    {
        $cat = category::find($request->catId);
        $cat->catName = $request->catName;
        $cat->save();
        $request->session()->flash('message', 'Update Category Succesfully');
        return redirect()->route('catedit', ['id' => $cat->id]);
    }

    public function editimport(Request $request)
    {
        $import = import::find($request->import_id);
        $product = $import->product;
        $product->quantity -= $import->quantity;
        $product->quantity += $request->quantity;
        if ($product->quantity < 1) {
            $request->session()->flash('message', 'Không thể update do số lượng hàng tồn 
                kho sau khi thay đổi nhỏ hơn 0');
            return redirect()->route('importedit', ['id' => $import->id]);
        }
        $product->save();
        $import->quantity = $request->quantity;
        $import->price = $request->price;
        $import->note = $request->note;
        $import->save();
        $request->session()->flash('message', 'Update Import Succesfully');
        return redirect()->route('importedit', ['id' => $import->id]);
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
        if ($request->oldprice != 0 && $request->oldprice <= $request->price) {
            $request->session()->flash('message', 'Giá cũ phải lớn hơn giá mới');
            return redirect()->back();
        }
        $product = product::find($request->productId);
        $product->productName = $request->productName;
        $product->quantity = $request->quantity;
        $product->catId = $request->category;
        $product->brandId = $request->brand;
        $product->product_desc = $request->product_desc;
        $product->price = $request->price;
        $product->oldprice = $request->oldprice;
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

    public function editslider(Request $request)
    {
        $slider = slider::find($request->sliderId);
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
                unlink("uploads/" . $slider->image);
                $slider->image = $unique_image;
                $slider->save();
                $request->session()->flash('message', 'Update Slider Succesfully');
                return redirect()->back();
            }
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

    public function addadmin(Request $request)
    {
        $checkadmin=admin::where('adminEmail',$request->adminEmail)->first();
        if ($checkadmin != null && $checkadmin->is_activated == 1) {
            $request->session()->flash('message', 'Tài khoản email này đã được sử dụng để đăng ký');
            return redirect()->route('adminadd');
        }else if ($checkadmin != null && $checkadmin->is_activated == 0) {
            $checkadmin->adminName = $request->adminName;
            $checkadmin->adminPass = md5($request->adminPass);
            $checkadmin->save();
            Mail::to($checkadmin->adminEmail)->send(new AdminEmailConfirm($checkadmin));
            $request->session()->flash('message', 'Đăng ký thành công vui lòng kiểm tra email để kích hoạt');
            return redirect()->route('adminadd');
        }
        $admin = new admin();
        $admin->adminName = $request->adminName;
        $admin->adminEmail = $request->adminEmail;
        $admin->adminPass = md5($request->adminPass);
        $admin->remember_token = md5(time());
        $admin->save();
        Mail::to($admin->adminEmail)->send(new AdminEmailConfirm($admin));
        $request->session()->flash('message', 'Đăng ký thành công vui lòng kiểm tra email để kích hoạt');
        return redirect()->route('adminadd');
    }

    public function adminactivate(Request $request,$token){
        $admin = admin::where('remember_token', $token)->first();
        if ($admin == null) {
            $request->session()->flash('message', 'Mã xác nhận email không hợp lệ');
            return redirect()->route('adminadd');
        }
        $admin->remember_token = null;
        $admin->is_activated = 1;
        $admin->save();
        $request->session()->flash('message', 'Tài khoản đã được kích hoạt vui lòng đăng nhập');
        return redirect()->route('adminadd');
    }

    public function updateadmin(Request $request)
    {
        $id=$request->session()->get('admin')->id;
        $admin = admin::find($id);
        $admin->adminName = $request->adminName;
        $admin->adminEmail = $request->adminEmail;
        $admin->save();
        $request->session()->put('admin', $admin);
        $request->session()->flash('message', 'Update Admin Succesfully');
        return redirect()->back();
    }

    public function addbrand(Request $request)
    {
        $brand = new brand();
        $brand->brandName = $request->brandName;
        $brand->save();
        $request->session()->flash('message', 'Insert Brand Succesfully');
        return view('admin.brandadd');
    }

    public function addimport(Request $request)
    {
        $import = new import();
        $import->product_id = $request->product_id;
        $import->quantity = $request->quantity;
        $import->price = $request->price;
        $import->note = $request->note;
        $import->save();
        $product = product::find($request->product_id);
        $product->quantity += $request->quantity;
        $product->save();
        $request->session()->flash('message', 'Nhập hàng thành công');
        return redirect()->route('importadd', ['id' => $request->product_id]);
    }

    public function addproduct(Request $request)
    {
        if ($request->oldprice <= $request->price) {
            $request->session()->flash('message', 'Giá cũ phải lớn hơn giá mới');
            return redirect()->back();
        }
        $product = new product();
        $product->productName = $request->productName;
        $product->quantity = $request->quantity;
        $product->catId = $request->category;
        $product->brandId = $request->brand;
        $product->product_desc = $request->product_desc;
        $product->price = $request->price;
        $product->oldprice = $request->oldprice;
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
            return redirect()->route('productadd');
        }
    }

    public function addslider(Request $request)
    {
        $slider = new slider();
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
            $slider->image = $unique_image;
            $slider->save();
            $request->session()->flash('message', 'Insert slider Succesfully');
            return redirect()->back();
        }
    }
}
