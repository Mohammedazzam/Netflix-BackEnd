<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $users = User::WhereRoleNot('super_admin')->paginate(5); //هذه بمعنى أنني بدي الكل ما عدا السوبر ادمين حتى ما أعدل فيه
//        $users = User::WhereRole('super_admin')->paginate(5);

        return view('dashboard.users.index',compact('users'));

    }//end of index


    public function create(){

        $roles = Role::whereRoleNot(['super_admin', 'admin'])->get();
        return view('dashboard.users.create', compact('roles'));

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'role_id' => 'required|numeric',
        ]);

        $request->merge(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());
        $user->attachRole($request->role_id);
//        $user->attachRoles(['admin',$request->role_id]); //ما زبطت

        session()->flash('success', 'Data added successfully');
        return redirect()->route('dashboard.users.index');

    }//end of store


    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));

    }//end of edit

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id,
            'permissions' => 'required|array|min:1',

        ]);

        $user->update($request->all());
        $user->syncPermissions($request->permissions);

        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.Users.index');

    }//end of update


    public function destroy(User $user){

        $user->delete();
        session()->flash('success','Data deleted successfully');
        return redirect()->route('dashboard.users.index');

    }//end of destroy


}//end of controller
