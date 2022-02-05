<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Session;
Use Model;
use App\UsersModel;

class DashboardController extends Controller
{	
	public function __construct(){

		$this->middleware('guest');

	}
	public function index()
	{
		return view('dashboard');
	}
	public function logout()
	{
		Session::flush(); 
		return Redirect('/');
	}

	public function save_user(Request $request)
	{
		$check_email = DB::table('users')
		->where('email', '=', $request->email)
		->where('deleted_at', '=', NULL)
		->exists(); 

	if ($check_email >= 1) 
	{
		return response()->json(['status' => 'email_exist']);
	} 

	else 
	{
		$user = new UsersModel();
		$user->first_name=$request->fname;
		$user->last_name = $request->sname;
		$user->email = $request->email;
		$user->password = md5($request->password);
		$user->save();
		if ($user) 
		{
			return response()->json(['status' => 'success']);

		} 
		else 
		{
			return response()->json(['status' => 'error']);
		}
	}
}



	



}
