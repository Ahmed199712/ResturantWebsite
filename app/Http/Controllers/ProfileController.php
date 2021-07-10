<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    
	public function index()
	{
		$settings = Setting::first()->get();
		$categories = Category::all();
		$user = auth()->guard('web')->user();

		return view('profiles.index' , compact('settings','categories','user'));
	}

	public function update(Request $request )
	{
		$id = auth()->guard('web')->user()->id;

		$this->validate($request , [
			'name' => 'required',
			'email' => 'required|email|unique:users,email,' . $id,
			'password' => 'confirmed',
			'phone' => 'required',
			'address' => 'required'
		]);

		$user = User::findOrFail($id);

			if( $request->avatar )
            {
                if( $user->avatar != 'uploads/avatars/default.png' )
                {
                    unlink($user->avatar);
                }

                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/avatars/' . $request->avatar->hashName());

                $user->avatar = 'uploads/avatars/' . $request->avatar->hashName();
            }


		$user->name = $request->name;

		if(!empty($request->password)){
			$user->password = bcrypt($request->password);
		}
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->save();

		session()->flash('success' , trans('backend.updated_successfully'));

		return redirect()->back();

	}

}
