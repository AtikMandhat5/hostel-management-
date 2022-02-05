<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
Use DB;
Use Session;
Use Model;
Use App\UsersModel;


class LoginController extends Controller
{

	public function index()
	{
		return view('login');
	}


	public function login(Request $request) 
	{
		$users = DB::table('users')->select('*')
		->where('email','=',$request->email)
		->where('password','=',md5(trim($request->password)))
		// ->where('deleted_at','=',NULL)
		->first();

		if(!empty($users)) 
		{
			Session::put('login_id', $users->id);
			Session::put('login_name', $users->name);
			Session::put('login_enrollment', $users->enrollment);
			Session::put('login_email', $users->email);
			return response()->json(['status' => 'success']);
		} 
		else {
			return response()->json(['status' => 'error']);
		}
	}
		
}
