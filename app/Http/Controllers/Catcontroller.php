<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Catcontroller extends Controller
{
    public function index()
    {
        $categoryies = Category::orderBy('id' , 'desc')->paginate(3);
        return view('category.index', [
            'categoryies' => $categoryies
        ]);
    }


    public function show($id)
    {
        $category = Category::findOrfail($id);
        return view('category.show', [
            'category' => $category
        ]);
    }

    public function search($word)
    {
        $search = Category::where("name" , "like" ,"%$word%")
        ->get();
        return view('category.search', [
            'search' => $search,
            'word' => $word
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required | string | min:5 | max:255',

        ]);


        // store in database
        Category::create([
            'name' => $request->name
        ]);

        return redirect(url('/category'));
    }

    public function edit($id)
    {
        $edit = Category::findOrfail($id);
        return view('category.edit',[
            'edit' => $edit
        ]);
    }

    public function update($id , Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required | string | min:5 | max:255',
        ]);
        $category = Category::findOrfail($id);

        //update database
        $category->update([
            'name' => $request->name
        ]);
        return redirect(url("/category/show/{$id}"));
    }

    public function delete($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();

        return redirect(url("/category"));
    }

}
