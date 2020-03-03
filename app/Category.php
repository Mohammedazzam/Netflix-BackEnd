<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name'];


    //attributes-------------------------------

    public function getNameAttribute($value){

        return ucfirst($value);

    }//end of getNameAttribute هذه لجعل أول حرف كابتل


    //scopes --------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

}//end of model
