<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request){
        if($request->session()->get('customer')==null){
            $request->session()->flash('message', 'Vui lòng đăng nhập trước khi comment');
            return redirect()->back();
        }
        $comment=new comment();
        $comment->customer_id=$request->session()->get('customer')->id;
        $comment->product_id=$request->product_id;
        $comment->body=$request->body;
        $comment->save();
        return redirect()->back();
    }
}
