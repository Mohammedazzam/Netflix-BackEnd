<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name'];


    //attributes-----------

    public function getNameAttribute($value){

        return ucfirst($value);

    }//end of getNameAttribute هذه لجعل أول حرف كابتل


}//end of model
