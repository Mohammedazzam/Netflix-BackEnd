<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function __construct()
    {

    }

    public function index(){

        $movies = Movie::paginate(5);
//        $Movies = Movie::WhereMovieNot(['super_admin','admin','user'])->whenSearch(request()->search)->paginate(5);

        return view('dashboard.movies.index',compact('movies'));

    }//end of index


    public function create(){

        $movie = Movie::create([]);

        return view('dashboard.movies.create',compact('movie'));

    }//end of createF

    public function store(Request $request){

        return $request->all();

    }//end of store


    public function edit(Movie $movie)
    {
        return view('dashboard.movies.edit', compact('movie'));

    }//end of edit

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required|unique:movies,name,' . $movie->id,
            'permissions' => 'required|array|min:1',

        ]);

        $movie->update($request->all());
        $movie->syncPermissions($request->permissions);

        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.movies.index');

    }//end of update


    public function destroy(Movie $movie){

        $movie->delete();
        session()->flash('success','Data deleted successfully');
        return redirect()->route('dashboard.movies.index');

    }//end of destroy


}//end of controller
