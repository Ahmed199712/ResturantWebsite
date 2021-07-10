<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    
	public function store(Request $request)
	{

		$this->validate($request , [
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'subject' => 'required',
			'message' => 'required'
		]);


		$message = new Message;
		$message->name = $request->name;
		$message->email = $request->email;
		$message->phone = $request->phone;
		$message->subject = $request->subject;
		$message->message = $request->message;
		$message->save();

		session()->flash('success' , trans('backend.send_successfully'));

		return redirect()->back();


	}


	

}
