<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){

        $categories = Category::paginate();
        return view('dashboard.categories.index',compact('categories'));

    }//end of index


    public function create(){

        return view('dashboard.categories.create');

    }//end of createF

    public function store(Request $request){
        $request->validate([
           'name' => 'required|unique:categories,name',

        ]);

        Category::create($request->all());
        session()->flash('success','data added successfully');
        return redirect()->route('dashboard.categories.index');

    }//end of store


    public function edit(Category $category){
        return view('dashboard.categories.edit',compact('category'));
    }//end of edit

    public function update(){

    }//end of update


    public function destroy(){

    }//end of destroy


}//end of controller
