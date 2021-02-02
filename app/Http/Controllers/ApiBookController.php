<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::get();
       return BookResource::collection($books);
    }

    public function show($id)
    {
        $books = Book::findOrFail($id);
        return new BookResource($books);
    }

    public function store(Request $request)
    {
        // validation

        $validator = Validator::make($request->all() , [
            'name' => 'required | string | min:5 | max:255',
            'desc' => 'required | string | min:10',
            'image' => 'required | image | mimes:jpg,png| max:512',
            'category_id' => 'required | integer | exists:categories,id'
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        // upload 

        $path= Storage::putFile('books' , $request->file('image'));

        // store in database
        Book::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $path,
            'category_id'=> $request->category_id
        ]);
        $message = "book created auccessfully";
        return response()->json($message);
    }


    
    public function update($id , Request $request)
    {
        // validation
        $validator = Validator::make($request->all() , [
            'name' => 'required | string | min:5 | max:255',
            'desc' => 'required | string | min:10',
            'image' => 'nullable | image | mimes:jpg,png| max:512',
            'category_id' => 'required | integer | exists:categories,id'
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        $book = Book::findOrfail($id);
        $path = $book->image;

        if($request->hasFile('image'))
        {
            Storage::delete($path);

            $path = Storage::putFile('books' , $request->file('image'));
        }
        //update database
        $book->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $path,
            'category_id'=> $request->category_id
        ]);

        $message = "book is updated";
        return response()->json($message);
    }

    public function delete($id)
    {
        $book = Book::findOrfail($id);
        $path = $book->image;
        Storage::delete($path);
        $book->delete();

        $message = "book was deleted";
        return response()->json($message); 
    }

}
