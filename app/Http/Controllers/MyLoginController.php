<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;

class MyLoginController extends Controller
{
    
	public function index()
	{
		$settings = Setting::first()->get();
		$categories = Category::all();

		return view('login' , compact('settings' , 'categories'));
	}

	public function doLogin()
	{
		if( auth()->guard('web')->attempt(['email'=>request('email') , 'password' => request('password')]) )
		{	
			session()->flash('success' , trans('backend.login_successfully'));
			return redirect('/');
		}else{
			session()->flash('errorLogin' , trans('backend.errorLogin'));
			return redirect()->back();
		}
	}


	public function logout()
	{
		auth()->guard('web')->logout();

		session()->flash('success' , trans('backend.logout_successfully'));

		return redirect('/');
	}


}
