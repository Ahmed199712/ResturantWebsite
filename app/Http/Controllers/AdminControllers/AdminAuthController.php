<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Food;
use App\User;
use App\Admin;
use App\Comment;
use App\Message;
use App\Order;

class AdminAuthController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $foods = Food::all();
        $users = User::all();
        $admins = Admin::all();
        $comments = Comment::all();
        $orders = Order::all();
        $messages = Message::all();

        

        return view('admin.index' , compact('orders','messages','categories','comments','foods','users','admins','comments','messages'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {

        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if( auth()->guard('admin')->attempt(['email' => request('email') , 'password' => request('password')]) )
        {
            return redirect('admin');
        }else{
            session()->flash('errorLogin','Email Or Password Incorrect !');

            return redirect()->back();
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect('admin/login');
    }
}
