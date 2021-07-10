<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;


class PagesController extends Controller
{
    public function about()
    {
    	$settings = Setting::first()->get();
        $categories = Category::all();

    	return view('pages.about' , compact('settings','categories'));
    }

    public function contact()
    {

    	$settings = Setting::first()->get();
        $categories = Category::all();

    	return view('pages.contact' , compact('settings','categories'));
    }

    public function services()
    {
    	$settings = Setting::first()->get();
        $categories = Category::all();
    	
    	return view('pages.services' , compact('settings','categories'));
    }
}
