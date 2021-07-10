<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Intervention\Image\Facades\Image;


class SettingController extends Controller
{
    
	public function index()
	{
		$settings = Setting::first()->get();


		return view('admin.settings.index' , compact('settings'));
	}

	public function update(Request $request)
	{
		$settings = Setting::first()->get();

		$this->validate($request , [
			'name' => 'required',
			'email' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'desc' => 'required'
		]);

		 if( $request->logo )
            {
            	if( $settings->first()->website_logo != 'uploads/website/logo.png' ){
            		unlink($settings->first()->website_logo);
            	}
            	
                Image::make($request->logo)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/website/' . $request->logo->hashName());

                $settings->first()->website_logo = 'uploads/website/' . $request->logo->hashName();
            }

		$settings->first()->website_name = $request->name;
		$settings->first()->website_email = $request->email;
		$settings->first()->website_phone = $request->phone;
		$settings->first()->website_address = $request->address;
		$settings->first()->website_desc = $request->desc;
		$settings->first()->save();

		session()->flash('success' , trans('backend.setting_saved'));

		return redirect()->back();
		
	}

	public function stopComments(){
		$settings = Setting::first()->get();


		if( $settings->first()->stop_comments == 0 ){
			$settings->first()->stop_comments = 1;
			$settings->first()->save();

			session()->flash('success' , trans('backend.stopcomments'));

			return redirect()->back();

		}else{
			$settings->first()->stop_comments = 0;
			$settings->first()->save();

			session()->flash('success' , trans('backend.opencomments'));

			return redirect()->back();
		}
	}

	public function stopRegisters()
	{
		$settings = Setting::first()->get();


		if( $settings->first()->stop_register == 0 ){
			$settings->first()->stop_register = 1;
			$settings->first()->save();

			session()->flash('success' , trans('backend.stopregisters'));

			return redirect()->back();

		}else{
			$settings->first()->stop_register = 0;
			$settings->first()->save();

			session()->flash('success' , trans('backend.openregisters'));

			return redirect()->back();
		}
	}


	public function stopWebsite()
	{
		$settings = Setting::first()->get();


		if( $settings->first()->stop_website == 0 ){
			$settings->first()->stop_website = 1;
			$settings->first()->save();

			session()->flash('success' , trans('backend.stopwebsite'));

			return redirect()->back();

		}else{
			$settings->first()->stop_website = 0;
			$settings->first()->save();

			session()->flash('success' , trans('backend.openwebsite'));

			return redirect()->back();
		}
	}

}
