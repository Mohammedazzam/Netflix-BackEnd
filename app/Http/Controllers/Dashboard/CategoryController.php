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

    public function update(){

    }//end of update


    public function destroy(){

    }//end of destroy


}//end of controller
