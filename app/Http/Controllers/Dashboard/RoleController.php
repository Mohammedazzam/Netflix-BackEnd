<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index(){

        $roles = Role::WhereRoleNot('super_admin')->whenSearch(request()->search)->paginate(5);
        return view('dashboard.roles.index',compact('roles'));

    }//end of index


    public function create(){

        return view('dashboard.roles.create');

    }//end of createF

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',

        ]);

        Role::create($request->all());
        session()->flash('success','data added successfully');
        return redirect()->route('dashboard.roles.index');

    }//end of store


    public function edit(Role $role)
    {
        return view('dashboard.roles.edit', compact('role'));

    }//end of edit

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.roles.index');

    }//end of update


    public function destroy(Role $role){

        $role->delete();
        session()->flash('success','Data deleted successfully');
        return redirect()->route('dashboard.roles.index');

    }//end of destroy


}//end of Controller
