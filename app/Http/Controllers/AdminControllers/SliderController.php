<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use Validator;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin.sliders.index' , compact('sliders'));
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif'
        ],[]);

       if( $validate->passes() )
        {
            $slider = new Slider;


             if( $request->image )
            {
                Image::make($request->image)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/sliders/' . $request->image->hashName());

                $slider->image = 'uploads/sliders/' . $request->image->hashName();
            }

            $slider->name = $request->name;
            $slider->desc = $request->desc;
            $slider->save();
            
            return response()->json($slider);


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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $slider = Slider::findOrFail($id);
        $slider->delete();

        if( $slider->image != 'uploads/sliders/default.gif' )
        {
            unlink($slider->image);
        }

        return response()->json($slider);
    }

    public function getAll()
    {
        $sliders = Slider::latest()->get();

        return view('admin.sliders.getAll' , compact('sliders'));
    }
}
