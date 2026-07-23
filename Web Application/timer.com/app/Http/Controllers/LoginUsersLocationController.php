<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use View;

  use DB;
  
  use Validator;
  use App\LoginUsersModel;
class LoginUsersLocationController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
		
	$rst= new LoginUsersModel();
	  $data['query'] = $rst->getAll();
	  
	   // $data['query'];   
	 	
	 
    return view('location.login_users.index',array('query'=>$data['query']));	 
}
public function login_details_pupup(Request $request)
	{
		if($request->ajax())
		{
			$usr_Id=$request->input('stdId');
			$rst= new LoginUsersModel();
			$data['query'] = $rst->get_login_details($usr_Id);
			return json_encode($data['query']);
		}
	}
	
	public function login_details_refresh(Request $request)
	{
		if($request->ajax())
		{
			 
			$rst= new LoginUsersModel();
			$data['query'] = $rst->getAllNoPagination();
			return json_encode($data['query']);
		}
	}



}