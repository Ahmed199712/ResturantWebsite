<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Intervention\Image\Facades\Image;
use Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index' , compact('users'));
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $validate = Validator::make($request->all() , [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'discount' => 'max:8',
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'phone' => 'required|min:10',
            'address' => 'required'
        ],[]);

        if( $validate->passes() )
        {
            $user = new User;

            if( $request->avatar )
            {
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
            return response()->json($user);


        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

    
    public function show(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    
    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    
    public function update(Request $request)
    {
        $id = $request->userID;

        $validate = Validator::make($request->all() , [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'confirmed',
            'discount' => 'max:8',
            'phone' => 'required|min:10',
            'address' => 'required'
        ],[]);

        if( $validate->passes() )
        {
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
            $user->email = $request->email;
            if( !empty($user->password) )
            {
                $user->password = bcrypt($request->password);
            }
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return response()->json($user);


        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

   
    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        $user->delete();

        if( $user->avatar != 'uploads/avatars/default.png' )
        {
            unlink($user->avatar);
        }

        return response()->json($user);
    }

    public function getAll()
    {
        $users = User::latest()->get();

        return view('admin.users.allData' , compact('users'));
    }
}
