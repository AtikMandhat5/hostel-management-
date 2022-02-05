<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
	protected $table = "users";
	protected  $fillable = ['id', 'role', 'hostelized', 'enrollment', 'branch', 'name', 'email', 'password', 's_mobile', 'p_mobile', 'status','room_no','date_time', 'created_at', 'created_by', 'updated_at', 'updated_by','deleted_by'];

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
    	'email_verified_at'=> 'datetime',
    ];

    protected $dates=['deleted_at'];   
}

