<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use DB;
Use Session;
Use Model;
Use App\CheckinoutModel;

class Checkinout extends Controller
{


	public function __construct() {

		$this->middleware('guest');

	}
	
	public function index(Request $request)			
	{

		$data['checkinout']= DB::table('checkinout')
		->leftjoin('users','users.id','=','checkinout.user_id')
		->where('checkinout.deleted_at', '=',NULL)
		->select('users.enrollment','users.name','users.s_mobile','users.room_no','checkinout.*')->get();
	   

		// $data['chinout']= DB::table('checkinout')
		// ->leftjoin('users as us','us.id','=','chinout.action_by')
		// ->select('us.name')->get();

		return view('checkinout.index')->with($data);
	}

	public function get_detail(Request $request)
	{
		$data['users']= DB::table('users')->where('id',$request->enrollment)->get();
		return $data;

		// $hmtl['name']=$data->name;
		// $html['branch']=$data->branch;
		// $html['roomno']=$data->room_no;	

		// echo $html['name'];
		// echo $html['branch'];
		// echo $html['roomno'];
		// print_r($data);die;
		
	}

	
	public function add_checkinout()
	{	
		$data['admin']= DB::table('users')->where('role','1')->get();
		$data['student']= DB::table('users')->where('role','2')->get();
		$data['security']= DB::table('users')->where('role','3')->get();
		
		return view('checkinout.add_checkinout')->with($data);
	}

	public function save_checkinout(Request $request)
	{   
		
		// $date= $request->outtime;
		$out_time= date('Y-m-d h:i:s',strtotime($request->outtime));

		// $in_time = date('Y-m-d H:i:s', strtotime($request->intime));
		
		// $action_time = date('Y-m-d H:i:s', strtotime($request->action_time));

		// $out_time = date('Y-m-d H:i:s', strtotime($request->out_ap_time));
		// $in_time = date('Y-m-d H:i:s', strtotime($request->in_ap_time));


		$check = new CheckinoutModel();
		$check->user_id = $request->enrollment;
		$check->out_time = $out_time;
		$check->in_time = $request->intime;
		$check->reason = $request->reason;

		$check->action_time=$request->action_time;
		$check->action_by = $request->action_by;

		$check->achual_out_by =$request->out_ap_by;
		$check->achual_out_timedate =$request->out_ap_time;
		$check->achual_in_by = $request->ch_in_by;
		$check->achual_in_timedate = $request->in_ap_time;
		
		$check->created_by=Session::get('login_id');
		$check->save();
		if ($check) 
		{
			return response()->json(['status'=>'success']);
		} 
		else 
		{
			return response()->json(['status'=>'error']);
		}
	}
	
	public function edit_checkinout($id)
	{	
		$data['checkinout'] = DB::table('checkinout')
		->select('*')//->DATE_FORMAT('out_time', '%Y-%m-%dT%H:%i') 
		->where('id',$id)
		->first();
		// $out_time= date('d-m-y h:i:s',strtotime($data['checkinout']->out_time));
		

		$data['user']= DB::table('users')
		->select('*')->where('role', '=','2')
		->get();
		$data['admin']= DB::table('users')
		->select('*')->where('role', '=','1')
		->get();
		$data['security']= DB::table('users')
		->select('*')->where('role', '=','3')
		->get();

		return view('checkinout.edit_checkinout')->with($data);
	}

	public function update_checkinout(Request $request)
	{ 
		$si_no = $request->id;
		$user_id = $request->enrollment;
		$outtime = $request->outtime;
		$intime = $request->intime;
		$action_by = $request->action_by;
		$action_time = $request->action_time;
		$out_ap_by = $request->out_ap_by;
		$out_ap_time = $request->out_ap_time;
		$in_ap_by = $request->in_ap_by;
		$in_ap_time = $request->in_ap_time;
		$reason = $request->reason;		
		// $status;
		$update = DB::table('checkinout')
		->where('id',$si_no)
		->update([
			'user_id'=>$user_id,
			'out_time'=>$outtime,
			'in_time'=>$intime,
			'action_time'=>$action_time,
			'action_by'=>$action_by,
			'achual_out_timedate'=>$out_ap_time,
			'achual_out_by'=>$out_ap_by,
			'achual_in_timedate'=>$in_ap_time,
			'achual_in_by'=>$in_ap_by,
			// 'status'=>$status,
			'updated_by'=>Session::get('login_id')
		]);
		if($update)
		{
			return response()->json(['status' => 'success']);
		}
		else{
			return response()->json(['status' => 'error']);
		}     
	}

	public function delete_checkinout(Request $request) 
	{
		$id = $request->id;
		DB::table('checkinout')
		->where('id',$id)
		->update([
			'deleted_by'=>Session::get('login_id'),
			'deleted_at'=>date('Y-m-d H:i:s')
		]);
	} 
}