<?php

namespace App;
use Illuminate\Pagination\Paginator;
 use Illuminate\Database\Eloquent\Model;
 use Exception;
 use DB;


class LoginUsersModel extends Model
{
    //
	
	public function getAll()
	{
		  
		   $todayDate = date("Y-m-d");
	 
	// $strTime = date("d-m-Y",strtotime($todayDate));
	  
		  
		 	  $query1 = DB::table('activeusers')
			  ->select('usr_id')
		->distinct()
		  
		 ->get();
  
   
		$ctr1= count($query1);
		 
 		  $data = [];
for ($i = 0; $i < $ctr1; $i++) {
	$ctr = $query1[$i]->usr_id;
     $data[] = DB::table('activeusers')
         ->where('usr_id',$ctr)->max('act_Id');
        
        //->get();
		 
}
// var_dump($data);
	  
	 
		 return $query = DB::table('activeusers')
		
		 ->join('userslogin','activeusers.usr_id','=','userslogin.usr_Id')
		 ->select('activeusers.*','userslogin.fname')
		 
		//->Orderby('activeusers.act_Id','Asc')
		->whereIn('activeusers.act_Id',$data)
		  ->whereDate('activeusers.login_time',$todayDate)
		   -> distinct()
		 //->get();
		  ->paginate(10);  
		 
		  
		 
	}
	public function get_login_details($usr_Id)
	{
		
		   $todayDate = date("Y-m-d");
		return $query = DB::table('activeusers')
		
		 ->join('userslogin','activeusers.usr_id','=','userslogin.usr_Id')
		 ->select('activeusers.*','userslogin.fname')
		 
		 ->Orderby('activeusers.act_Id','Desc')
		->where('activeusers.usr_id',$usr_Id)
		  ->whereDate('activeusers.login_time',$todayDate)
		   
		 
		 ->get();  
	}
	
	
	public function getAllNoPagination()
	{
		 $todayDate = date("Y-m-d");
	 
	// $strTime = date("d-m-Y",strtotime($todayDate));
	  
		  
		 	  $query1 = DB::table('activeusers')
			  ->select('usr_id')
		->distinct()
		  
		 ->get();
  
   
		$ctr1= count($query1);
		 
 		  $data = [];
for ($i = 0; $i < $ctr1; $i++) {
	$ctr = $query1[$i]->usr_id;
     $data[] = DB::table('activeusers')
         ->where('usr_id',$ctr)->max('act_Id');
        
        //->get();
		 
}
// var_dump($data);
	  
	 
		 return $query = DB::table('activeusers')
		
		 ->join('userslogin','activeusers.usr_id','=','userslogin.usr_Id')
		 ->select('activeusers.*','userslogin.fname')
		 
		//->Orderby('activeusers.act_Id','Asc')
		->whereIn('activeusers.act_Id',$data)
		  ->whereDate('activeusers.login_time',$todayDate)
		   -> distinct()
		 //->get();
		  ->paginate(10);  
		
	}
}
