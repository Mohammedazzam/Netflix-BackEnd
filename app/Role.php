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



//scopes هذه وظيفتها بتجيب كل الرول ما عدا رول معينة---------------------------
    public function scopeWhereRoleNot($query , $role_name){

//        return $query->where('name','!=',$role_name);
        return $query->whereNotIn('name',(array)$role_name); //هذه لو كان هنالك أكثر من رول بدي استثنيها


    }//end of scopeWhereRoleNot

}//end of model
