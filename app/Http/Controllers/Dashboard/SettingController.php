<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function social_login(){

        return view('dashboard.settings.social_login');

    }//enf of social_login


    public function social_links(){

        return view('dashboard.settings.social_links');

    }//enf of social_links


    public function store(Request $request){

        setting($request->all())->save();

        session()->flash('success',('Data Added Successfully'));
        return redirect()->back();

    }

}//end of controller
