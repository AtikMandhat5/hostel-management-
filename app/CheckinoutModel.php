<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckinoutModel extends Model
{
	protected $table = "checkinout";
	protected  $fillable = ['id', 'user_id', 'out_time', 'in_time', 'reason', 'action_time', 'action_by', 'achual_out_by', 'achual_out_timedate', 'achual_in_by', 'achual_in_timedate', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by' ];

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


