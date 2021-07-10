<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;


class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::latest()->get();

        return view('admin.messages.index' , compact('messages'));
    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $message = Message::findOrFail($id);

        $message->status = 1;
        $message->save();

        return view('admin.messages.show' , compact('message'));
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        
        session()->flash('success' , trans('backend.deleted_successfully'));

        return redirect()->route('message.index');

    }
}
