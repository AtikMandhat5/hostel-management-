<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\UsersModel;
use DB;
use Session;

class UsersController extends Controller
{
	public function __construct(){

		$this->middleware('guest');

	}
	
	public function index(Request $request)			
	{	$data['users']= DB::table('users')
		->leftjoin('hostelized','hostelized.id','=','users.hostelized')
		->leftjoin('role','role.id','=','users.role')
		->leftjoin('status','status.id','=','users.status')
		->where('users.deleted_at', '=', NULL)
		->select('users.*','role.role_name','status.status_value','hostelized.hostelized_value')->get();
	   
	    return view('users.index')->with($data);
	}
	public function add_user(Request $request)
	{	
		$data['role']= DB::table('role')->get();
		$data['hostelized']= DB::table('hostelized')->get();
		$data['status']= DB::table('status')->get();

		return view('users.add_user')->with($data);
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
		$user->role=$request->role;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->enrollment= $request->enrollment;
		$user->branch=$request->branch;
		$user->hostelized = $request->hostelized;
		$user->s_mobile = $request->smobile;
		$user->p_mobile = $request->pmobile;	
		$user->room_no = $request->roomno;
		$user->status = $request->status;
		$user->created_by=Session::get('login_id');
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

	public function edit_user($id)
	{			
		$data['edit_form'] = DB::table('users')
		->select('*')
		->where('id',$id)
		->first();

		$data['role']= DB::table('role')
		->select('*')
		->get();

		$data['hostelized']= DB::table('hostelized')
		->select('*')
		->get();
		
		$data['status']= DB::table('status')
		->select('*')->get();
		
		return view('users.edit_user')->with($data);
	}

	public function update_user(Request $request)
	{ 

		$id = $request->id;
		$role = $request->role;
		$name=$request->name;
		$email = $request->email;
		$enrollment = $request->enrollment;
		$branch = $request->branch;
		$hostelized=$request->hostelized;
		$smobile = $request->smobile;
		$pmobile = $request->pmobile;
		$roomno = $request->roomno;
		$status=$request->status;
		$up_by =Session::get('login_id');

		$update = DB::table('users')
		->where('id',$id)
		->update([
			'role'=>$role,       
			'name'=>$name,     
			'email'=>$email,
			'enrollment'=>$enrollment,
			'branch'=>$branch,
			'hostelized'=>$hostelized,
			's_mobile'=>$smobile,
			'p_mobile'=>$pmobile,
			'room_no'=>$roomno,
			'status'=>$status,
			'updated_by'=>$up_by,
		]);

			if($update)
		{
			return response()->json(['status' => 'success']);
		}
		else{
			return response()->json(['status' => 'error']);
		}     
	}

	 public function delete_user(Request $request) {
       $id = $request->id;
		
		  DB::table('users')
		->where('id',$id)
		->update([
			'deleted_at'=>date('Y-m-d H:i:s')
		]);


    }
}
