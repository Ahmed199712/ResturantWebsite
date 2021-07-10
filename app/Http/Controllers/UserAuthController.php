<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Setting;
use App\User;
use App\Comment;
use App\Category;
use App\Food;
use App\Order;

class UserAuthController extends Controller
{
    
	public function index()
	{
		$sliders = Slider::latest()->get();
		$settings = Setting::first()->get();

		$users = User::all();
		$foods = Food::all();
		$orders = Order::all();
		$comments = Comment::all();

		$latestFoods = Food::latest()->paginate(6);

		$categories = Category::all();

		return view('welcome' , compact('categories','latestFoods','sliders','settings','users','foods','orders','comments'));
	}

}
