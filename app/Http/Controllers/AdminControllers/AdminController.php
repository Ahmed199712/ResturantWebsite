<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Intervention\Image\Facades\Image;
use Validator;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $admins = Admin::where('type' , 0)->latest()->get();

        return view('admin.admins.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all() , [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'phone' => 'required|min:10',
            'address' => 'required'
        ],[]);

        if( $validate->passes() )
        {
            $admin = new Admin;

            if( $request->avatar )
            {
                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/avatars/' . $request->avatar->hashName());

                $admin->avatar = 'uploads/avatars/' . $request->avatar->hashName();
            }
            

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->phone = $request->phone;
            $admin->address = $request->address;
            $admin->save();
            return response()->json($admin);


        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        
    public function show(Request $request)
    {
        $id = $request->id;
        $admin = Admin::findOrFail($id);

        return response()->json($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
        $id = $request->id;
        $user = Admin::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->userID;

        $validate = Validator::make($request->all() , [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'confirmed',
            'phone' => 'required|min:10',
            'address' => 'required'
        ],[]);

        if( $validate->passes() )
        {
            $admin = Admin::findOrFail($id);

            if( $request->avatar )
            {
                if( $admin->avatar != 'uploads/avatars/default.png' )
                {
                    unlink($admin->avatar);
                }

                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/avatars/' . $request->avatar->hashName());

                $admin->avatar = 'uploads/avatars/' . $request->avatar->hashName();
            }
            

            $admin->name = $request->name;
            $admin->email = $request->email;
            if( !empty($admin->password) )
            {
                $admin->password = bcrypt($request->password);
            }
            $admin->phone = $request->phone;
            $admin->address = $request->address;
            $admin->save();
            return response()->json($admin);


        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $admin = Admin::findOrFail($id);
        $admin->delete();

        if( $admin->avatar != 'uploads/avatars/default.png' )
        {
            unlink($admin->avatar);
        }

        return response()->json($admin);
    }

    public function getAll()
    {
        $admins = Admin::where('type' , 0)->latest()->get();

        return view('admin.admins.allData' , compact('admins'));
    }
}
