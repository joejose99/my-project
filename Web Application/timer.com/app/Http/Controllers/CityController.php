<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CheckRoleModel;
use Validator;
 use View;
  use Illuminate\Database\Eloquent\Model;

 use DB;
class CityController extends Controller
{
	
	 public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
		
		$date=now();
		//$date->setTimezone(new DateTimeZone('America/New York'));
		
		//dd($date->format("Y-m-d H:i:s"));
		
		$tm = DB::table('states_regions')->count();
		 
		$data['query'] = DB::table('states_regions')
		  ->select('states_regions.*') 
		  ->Orderby('id','Asc')
		  //->get();
		   ->paginate(10);
		   
		   
		   $data['countries'] = DB::table('countries')
		  ->select('countries.*') 
		  ->Orderby('id','Asc')
		  ->get();
		  
		  //dd($data['query']);
		  /*
		   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->details ;
	          echo'<br>'; 
        
		       endforeach;
			   */

	     return view('world clock admin.index', array('query'=>$data['query'],'countries'=>$data['countries']));
		
		
		
		
	 	//return view('world clock admin.index');
		
		
	 }
	 
	 
	  public function get_insert()
    {
        
		 
	   
	  $data['country'] = DB::table('countries')
		  ->select('countries.*') 
		  ->Orderby('value','Asc')
		  ->get();
		   
		  
		    
	  
	  
	   return view('world clock admin.insert', array('country'=>$data['country']));
	 //return view('department.insert',$data);
	 
    }
	
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
			 
			  $chk = new CheckRoleModel();
			 $role=$chk->index();
			 
		 
			if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	json_encode($message);
		 } 
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 $lcr =$dataArray[0]['cls'];
		
		$department=$dataArray[0]['optionA'];
		  $city=$dataArray[0]['optionA'];
		  
		  $countryId =$dataArray[0]['cls'];
		$time_stamps =now();
		 
		$data=array(
		'utc_value' => $dataArray[0]['term'], 
		'utc_select' => $dataArray[0]['utc_select'],
		'status' =>$dataArray[0]['optionD'],
	   'countryId' => $dataArray[0]['cls'], 
	'state' =>$dataArray[0]['optionA'],
	'time_zone' =>$dataArray[0]['timezone'],
	'created_at' =>$time_stamps,
	'details' =>$dataArray[0]['optionB'] );
	
		 	
			
			
			
			 
		 
		 $tm = DB::table('states_regions')->where('state',$city)->where('countryId',$countryId)->count();
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
			//dd($lcr);
	      
		   DB::table('states_regions')->insertGetId($data);
		   
		   
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	
	
	
	public function getShow($id)
	{
		 $data['query'] = DB::table('states_regions')
		 ->join('countries','countries.id','=','states_regions.countryId') 
		  ->select('states_regions.*','countries.value') 
		  ->Orderby('id','Asc')
		  ->where('states_regions.id',$id)
		  ->get();
		  
		   $data['countries'] = DB::table('countries')
		  ->select('countries.*')  
		  ->get();
		  
		   
		  
		 return view('world clock admin.edit', array('query'=>$data['query'],'countries'=>$data['countries']));
 }
 
 public function edit(Request $request, $id)
	{
		
		if($request->ajax())
		{
		  
		
		
		$chk = new CheckRoleModel();
			 $role=$chk->index();
			 
		 
			if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	json_encode($message);
		 } 
		 
		//$countryId=$request->input('countryId');
		 
		// $blog=$request->input('holiday');
		// $status=$request->input('status');
		
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 $lcr =$dataArray[0]['cls'];
		
		$department=$dataArray[0]['optionA'];
		  $city=$dataArray[0]['optionA'];
		  
		  $countryId =$dataArray[0]['cls'];
		$time_stamps =now();
		 
		$data=array(
		'utc_value' => $dataArray[0]['term'], 
		'utc_select' => $dataArray[0]['utc_select'],
		'status' =>$dataArray[0]['optionD'],
	   'countryId' => $dataArray[0]['cls'], 
	'state' =>$dataArray[0]['optionA'],
	'time_zone' =>$dataArray[0]['timezone'],
	'created_at' =>$time_stamps,
	'details' =>$dataArray[0]['optionB'] );
		
		 
	
	/* UPDATING BLOG DATABASE */
	 
	 DB::table('states_regions')->where('id',$id)->update($data);
	 
	/* 
	 [
		   'details' =>$blog,
		   'countryId' =>$countryId,
		 'status' =>$status ,]*/
	 
	   
	 
	 return json_encode('Succcess');
	 
	
	}
	
    }
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('menu');
			
			 
			
			$data['query'] = DB::table('countries')
			 ->join('states_regions','states_regions.countryId','=','countries.id') 
		  ->select('states_regions.*') 
		  
		  ->where('countries.id',$search)
			 ->get();
			 
			  
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	  
	
	 
	
	 
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			 $chk = new CheckRoleModel();
			 $role=$chk->index();
			 
		 
			if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	json_encode($message);
		 } 
			
			$data['query']= DB::table('states_regions')->where('id',$schId)->delete();
			
			  
			   if(!empty($data['query']))
		  {
			 $data['query'] = DB::table('states_regions')
		  ->select('states_regions.*') 
		  ->Orderby('id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	
	
	
	
	
	
	
	
	
	
	
	
	public function destroyDepartment(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
			 
			$chk = new CheckRoleModel();
			 $role=$chk->index();
			 
		 
			if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	json_encode($message);
		 } 
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	   
        
		
		 
			 $data['query'] = $st->delete_table_colunms('states_regions',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = DB::table('states_regions')
		  ->select('states_regions.*') 
		  ->Orderby('id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}


	
}
