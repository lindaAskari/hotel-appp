<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5'
        ]);

        Category::create([
            'title' => $request->title
        ]);

        return redirect()->route('category.index');
    }

    public function index(){
        $categories = Category::all();

        return view('categories.index' , compact('categories'));
    }
    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category){
        $request->validate([
            'title' => 'required|min:5'
        ]);

        $category->update([
            'title' => $request->title
        ]);

        return redirect()->route('category.index');
    }
    public function destroy(Category $category){
       
        $category->delete();

        return redirect()->route('category.index');

    }

}
