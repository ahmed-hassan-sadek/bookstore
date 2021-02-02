<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id' , 'desc')->paginate(3);
        return view('books.index', [
            'books' => $books
        ]);
    }

    public function show($id)
    {
        // $books= Book::where("id" , "=" , $id)->first();
        $book = Book::findOrfail($id);
        return view('books.show', [
            'book' => $book
        ]);
    }

    public function search($word)
    {
        // $books= Book::where("id" , "=" , $id)->first();
        $search = Book::where("name" , "like" ,"%$word%")
        ->get();
        return view('books.search', [
            'search' => $search,
            'word' => $word
        ]);
    }

    public function create()
    {
        $category = Category::select('id' , 'name')->get();
        return view('books.create' , [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required | string | min:5 | max:255',
            'desc' => 'required | string | min:10',
            'image' => 'required | image | mimes:jpg,png| max:512',
            'category_id' => 'required | integer | exists:categories,id'
        ]);

        // upload 

        $path= Storage::putFile('books' , $request->file('image'));

        // store in database
        Book::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $path,
            'category_id'=> $request->category_id
        ]);

        return redirect(url('/books'));
    }


    public function edit($id)
    {
        $edit = Book::findOrfail($id);
        $category = Category::select('id' , 'name')->get();
        return view('books.edit',[
            'edit' => $edit,
            'category' => $category
        ]);
    }


    public function update($id , Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required | string | min:5 | max:255',
            'desc' => 'required | string | min:10',
            'image' => 'nullable | image | mimes:jpg,png| max:512',
            'category_id' => 'required | integer | exists:categories,id'
        ]);
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
        return redirect(url("/books/show/{$id}"));
    }


    public function delete($id)
    {
        $book = Book::findOrfail($id);
        $path = $book->image;
        Storage::delete($path);
        $book->delete();

        return redirect(url("/books"));
    }
}
