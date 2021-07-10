<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Setting;
use App\Category;

class OrderController extends Controller
{
    
	public function store(Request $request , $id)
	{
		$foodId = $id;	
		$userId = auth()->guard('web')->user()->id;

		$order = new Order;
		$order->active = 0;
		$order->user_id =  $userId;
		$order->food_id = $foodId;
		$order->save();

		session()->flash('success' , 'Your Order Sent Successfully...');

		return redirect()->back();
	}

	public function index()
	{	
		$categories = Category::all();
		$settings = Setting::first()->get();
		$myorders = Order::where('user_id' , auth()->guard('web')->user()->id )->get();

		return view('myorders.index' , compact('settings','categories','myorders'));
	}


	public function show($id)
	{
		$order = Order::findOrFail($id);
		$categories = Category::all();
		$settings = Setting::first()->get();

		return view('myorders.show' , compact('order','categories','settings'));
	}

	public function destroy($id)
	{
		$order = Order::findOrFail($id);
		$categories = Category::all();
		$settings = Setting::first()->get();

		$order->delete();

		session()->flash('success' , trans('backend.created_successfully'));

		return redirect()->route('user.myorder');
	}

}
