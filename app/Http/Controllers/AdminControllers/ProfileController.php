<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
    	$admin = auth()->guard('admin')->user();

    	return view('admin.profile.index' , compact('admin'));
    }

    public function update(Request $request)
    {
    	$id = auth()->guard('admin')->user()->id;

    	$this->validate($request , [
    		'name' => 'required',
    		'email' => 'required',
            'password' => 'confirmed'
    	]);

    	$profile = Admin::findOrFail($id);

    	if( $request->avatar )
    	{
            if( $profile->avatar != 'uploads/avatars/default.png' )
            {
                unlink($profile->avatar);
            }

            Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/avatars/' . $request->avatar->hashName());

            $profile->avatar = 'uploads/avatars/' . $request->avatar->hashName();
    	}

    	$profile->name = $request->name;
    	$profile->email = $request->email;

    	if( !empty($request->password) )
    	{
    		$profile->password = bcrypt($request->password);
    	}

    	$profile->save();

        session()->flash('success' , trans('backend.updated_successfully') );

        return redirect()->back();


    }
}
