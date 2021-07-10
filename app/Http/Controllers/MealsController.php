<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Food;
use App\Category;


class MealsController extends Controller
{
    public function index()
    {
    	$settings = Setting::first()->get();
    	$meals = Food::latest()->paginate(6);
    	$categories = Category::all();

    	return view('meals.index' , compact('categories','settings','meals'));
    }

    public function show($id)
    {
    	$settings = Setting::first()->get();
    	$food = Food::findOrFail($id);
    	$categories = Category::all();

    	return view('meals.show' , compact('categories','food','settings'));
    }

    public function category($id)
    {
    	$categoryName = Food::where('category_id' , $id)->get();
    	$settings = Setting::first()->get();
    	$categories = Category::all();

    	$categoryNameInvidiual = Category::find($id);
    	
    	return view('meals.category' , compact('categoryNameInvidiual','categories','settings','categoryName'));
    }
}
