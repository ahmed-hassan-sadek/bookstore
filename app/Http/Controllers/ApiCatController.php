<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CatResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiCatController extends Controller
{
    public function index()
    {
        $cats = Category::get();
       return CatResource::collection($cats);
    }

    public function show($id)
    {
        $cats = Category::findOrFail($id);
        return new CatResource($cats);
    }

    public function store(Request $request)
    {
        // validation

        $validator = Validator::make($request->all() , [
            'name' => 'required | string | min:5 | max:255',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors();
            return response()->json($errors);
        }


        // store in database
        Category::create([
            'name' => $request->name,

        ]);
        $message = "Category created auccessfully";
        return response()->json($message);
    }


    
    public function update($id , Request $request)
    {
        // validation
        $validator = Validator::make($request->all() , [
            'name' => 'required | string | min:5 | max:255',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        $category = Category::findOrfail($id);

        //update database
        $category->update([
            'name' => $request->name
        ]);

        $message = "Category is updated";
        return response()->json($message);
    }

    public function delete($id)
    {
        $cats = Category::findOrfail($id);
        $cats->delete();

        $message = "Category was deleted";
        return response()->json($message); 
    }
}
