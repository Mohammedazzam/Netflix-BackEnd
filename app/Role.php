<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{

    //scopes ----------------------------------------
    public function scopeWhenSearch($query, $search){

        return $query->when($search, function ($q) use ($search){

            return $q->where('name','like',"%search%");

        });

    }//end of scopeWhenSearch

}//end of model
