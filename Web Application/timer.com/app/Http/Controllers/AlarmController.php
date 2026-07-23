<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
 use Illuminate\Support\Facades\Auth;

use Validator;
 use Session;
// use App\BlogViewController;

class AlarmController extends Controller
{
    
    
   
      public function index()
    {
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
	 	return view('alarm.alarm',array('query'=>$data['query']));
		
		
	 }
	 public function checkRole()
	 {
	    
	     $role =  Auth::user()->role;
		 
		 if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	$message;
		 }
		 else
		 {
		     return $message='No';
		 }
		 
	 }
	 public function getShow($id)
    {
		$str =explode("_",$id);
		
		$time=$str[0]." ".$str[1];
		
		$numbPos= strpos($str[0],":");
		
		$explode = explode(":",$str[0]);
		 $hrs=$explode[0]." ".$str[1];
		 $min=$explode[1];
		  
		  //dd($explode[1]);
		
		//dd($str[1]);
		
		$numbstr =substr($str[0],0,$numbPos);
		 
		$items =array();
		 
		$ctr=0;
		
		if($str[1]=="AM")
		{
			
		while($ctr < 60)
		{
			if($ctr <10)
			{
			$items[]= $numbstr.":0".$ctr." "."AM";
			}
			else
			{
				$items[]= $numbstr.":".$ctr." "."AM";
			}
			$ctr++;
		}

		} 
		
		 
		if($str[1]=="PM")
		{
			
		while($ctr < 60)
		{
			if($ctr <10)
			{
			$items[]= $numbstr.":0".$ctr." "."PM";
			}
			else
			{
				$items[]= $numbstr.":".$ctr." "."PM";
			}
			$ctr++;
		}

		} 
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		 
		 //dd($data['query']);
		
		$data = array('items'=> $items,'tm'=>$time,'hr'=>$hrs,'min'=>$min,'query'=>$data['query'] );
		
		 
		 //$data['items']=$itmes;
	 	return view('alarm.view-alarm', $data ) ;
	 }
	 
	 
	 
	  public function setInsertAlarm(Request $request)
	{
     
     
	  if($request->ajax())
		{ 
		    
		    
		     
		  
		$strtm= $request->input('time');
	
		
		 $explode = explode(":",$strtm);
		 $strMin=explode(" ",$explode[1]);
		 
		 $min =$strMin[0];
		  $hrs=$explode[0]." ".$strMin[1];
		 
		  
		  $data = array('tm'=>$strtm,'hrs'=>$hrs,'min'=>$min );
		  
		  //dd($data,	$strtm);
	 	
		
		return json_encode($data);
		}
	 }
	 
	 
	 
	 
	 public function setAlarmTime(Request $request)
	{
      
	 if($request->ajax())
		{
		 
		
		 $role =  Auth::user()->role;
		 
		 if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return json_encode($message);
		 }
		 
		 $strtm= $request->input('time');
		 
		  
		  $str =explode("_",$strtm);
		
		$time=$str[0]." ".$str[1];
		
		$numbPos= strpos($str[0],":");
		
		$explode = explode(":",$str[0]);
		 $hrs=$explode[0]." ".$str[1];
		 $min=$explode[1];
		  
		   
		
		$numbstr =substr($str[0],0,$numbPos);
		 
		$items =array();
		 
		$ctr=0;
		
		if($str[1] =="AM")
		{
		while($ctr < 60)
		{
			if($ctr <10)
			{
			$items[]= $numbstr.":0".$ctr." "."AM";
			}
			else
			{
				$items[]= $numbstr.":".$ctr." "."AM";
			}
			$ctr++;
		}
 		 }
		 
	if($str[1] =="PM")
	{
		while($ctr < 60)
		{
			if($ctr <10)
			{
			$items[]= $numbstr.":0".$ctr." "."PM";
			}
			else
			{
				$items[]= $numbstr.":".$ctr." "."PM";
			}
			$ctr++;
		}
 	} 
		 
		 
		
		$data = array('items'=> $items,'tm'=>$time,'hr'=>$hrs,'min'=>$min );
		 
		  // dd('im here');
	 	 
		 return json_encode($data);
		}
	 }
}
