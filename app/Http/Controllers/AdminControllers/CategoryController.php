<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.index' , compact('categories'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {


        $validate = Validator::make($request->all() , [
            'name' => 'required|unique:categories'
        ],[]);

        if( $validate->passes() )
        {
            $category = new Category;
            $category->name = $request->name;
            $category->save();
            return response()->json($category);
        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }

        
    }


    public function show($id)
    {
        //
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);

        return response()->json($category);
    }


    public function update(Request $request)
    {
        
        $id = $request->catID;

        $validate = Validator::make($request->all() , [
            'name' => 'required|unique:categories,name,' . $id
        ],[]);


        
        if( $validate->passes() )
        {
            $category = Category::findOrFail($id);

            $category->name = $request->name;
            $category->save();

            return response()->json($category);


        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }

    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);

        $category->delete();

        return response()->json($category);
    }

    public function getAll()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.allData' , compact('categories'));
    }
}
