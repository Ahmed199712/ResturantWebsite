<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;
use App\Category;
use Validator;
use Intervention\Image\Facades\Image;

class FoodController extends Controller
{

    public function index()
    {
        $foods = Food::latest()->get();

        return view('admin.foods.index' , compact('foods'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
         $validate = Validator::make($request->all() , [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|max:8',
            'discount' => 'max:8',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'desc' => 'required|min:10',
            'discount' => 'required'
        ],[]);

        if( $validate->passes() )
        {
            $food = new Food;

            if( $request->image )
            {
                Image::make($request->image)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/foods/' . $request->image->hashName());

                $food->image = 'uploads/foods/' . $request->image->hashName();
            }
            

            $food->name = $request->name;
            $food->desc = $request->desc;
            $food->price = $request->price;
            $food->discount = $request->discount;
            $food->category_id = $request->category_id;
            $food->save();
            return response()->json($food);
        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

  
    public function show(Request $request)
    {
        $id = $request->id;
        $food = Food::find($id);

        return response()->json($food);
    }

  
    public function edit(Request $request)
    {
        $id = $request->id;
        $food = Food::findOrFail($id);

        return response()->json($food);
    }


    public function update(Request $request)
    {

        $id = $request->foodID;
        
        $validate = Validator::make($request->all() , [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|max:8',
            'discount' => 'max:8',
            'desc' => 'required|min:10',
            'discount' => 'required'
        ],[]);

        if( $validate->passes() )
        {
            $food = Food::findOrFail($id);

            if( $request->image )
            {   
                unlink($food->image);

                Image::make($request->image)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/foods/' . $request->image->hashName());

                $food->image = 'uploads/foods/' . $request->image->hashName();
            }
            

            $food->name = $request->name;
            $food->desc = $request->desc;
            $food->price = $request->price;
            $food->discount = $request->discount;
            $food->category_id = $request->category_id;
            $food->save();

            return response()->json($food);

        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }


    }

  
    public function destroy(Request $request)
    {
        $id = $request->id;
        $food = Food::find($id);

        unlink($food->image);

        $food->delete();

        return response()->json($food);
    }

    public function getAll()
    {
        $foods = Food::latest()->get();

        return view('admin.foods.allData' , compact('foods'));
    }

    public function getAllCategories()
    {
        $categories = Category::all();

        return view('admin.foods.allCategories' , compact('categories'));
    }

    // Get Category Name ...
    public function getCategoryName(Request $request)
    {
        $id = $request->id;


        $food = Food::find($id);
        $categoryName = $food->category->name;


        return view('admin.foods.getCategoryName' , compact('categoryName'));

    }


    // Get Selected Category ..
    public function getCategorySelected(Request $request)
    {
        $id = $request->id;

        $food = Food::findOrFail($id);

        $categories = Category::all();


        return view('admin.foods.allCategoriesSelected' , compact('food','categories'));
    
    }
}
