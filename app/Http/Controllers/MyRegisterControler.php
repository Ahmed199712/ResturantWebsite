<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\User;
use Intervention\Image\Facades\Image;

class MyRegisterControler extends Controller
{
    
	public function index()
	{
		$settings = Setting::first()->get();
		$categories = Category::all();

		return view('register', compact('settings','categories'));
	}

	public function doRegister(Request $request)
	{
		$this->validate($request , [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed',
			'phone' => 'required',
			'address' => 'required',
			'avatar' => 'image|mimes:jpg,jpeg,png,gif'
		]);


		$user = new User;
		
		if( $request->avatar ){
			Image::make($request->avatar)->resize(null, 200, function ($constraint) {
		    $constraint->aspectRatio();
			})->save('uploads/avatars/' . $request->avatar->hashName());
			$user->avatar = 'uploads/avatars/' . $request->avatar->hashName();
		}

		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->save();

		auth()->guard('web')->login($user);

		session()->flash('success' , trans('backend.register_successfully'));

		return redirect('/');

	}

}
