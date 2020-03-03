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

    }//end of create

    public function update(){

    }//end of update


    public function destroy(){

    }//end of destroy


}//end of controller
