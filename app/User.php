<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //attributes هذه خاصة لتكبير الحرف الأول للكلمة -------------------------------

    public function getNameAttribute($value){

        return ucfirst($value);
    }

    //scopes---------------بدي اجيب اليوزرز الي معهم رول معينة-----------------------
    public function scopeWhereRole($query, $role_name)
    {
        return $query->whereHas('roles',function ($q) use ($role_name){  //الناس الي عندها رولز اعمل لها فانكشن وهذه الفانكشن بتاخد كويري

            return $q->whereIn('name',(array)$role_name);

        });


    }//enf of scopeWhereRole


    public function scopeWhereRoleNot($query,$role_name){

        return $query->whereHas('roles',function ($q) use ($role_name){  //الناس الي عندها رولز اعمل لها فانكشن وهذه الفانكشن بتاخد كويري

            return $q->whereNotIn('name',(array)$role_name);

        });

    }//enf of scopeWhereRoleNot

}//end of model
