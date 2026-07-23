<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WorldClockController extends Controller
{
    public function index()
    {
		
		$date=now();
		//$date->setTimezone(new DateTimeZone('America/New York'));
		
		//dd($date->format("Y-m-d H:i:s"));
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		
		//dd($data['query']);
	 	//return view('world clock.index');
		
		  return view('world clock.index', array('country'=>$data['country'],'query'=>$data['query']));
		
		
	 }
	 
	 
	  public function insert(Request $request)
	{
	if($request->ajax())
		{
			
		//$search=$request->input('countryId');
		
		//dd($search);
		
		 
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		  
		
		 
		  $city=$dataArray[0]['city'];
		  
		  $countryId =$dataArray[0]['countryId'];
		$time_stamps =now();
		 
		$data=array(
		'utc_value' => $dataArray[0]['utcValue'], 
		'utc_select' => $dataArray[0]['utcSelect'],
		'status' =>$dataArray[0]['status'],
	   'countryId' => $dataArray[0]['countryId'], 
	'state' =>$dataArray[0]['city'],
	'time_zone' =>$dataArray[0]['time_zone'],
	'created_at' =>$time_stamps );
	
		 	
			
			
			
			 
		 
		 $tm = DB::table('states_regions')->where('state',$city)->where('countryId',$countryId)->count();
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
				 DB::table('states_regions')->where('countryId',$countryId)->update([
		   'status' =>$dataArray[0]['status'],  
		 ]);
		 
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
			//dd($lcr);
	      
		   DB::table('states_regions')->insertGetId($data);
		   
		  
		   //return json_encode('Data Successfully Saved');
             $data['query'] = DB::table('countries')
	
			->join('states_regions','states_regions.countryId','=','countries.id') 
			
		     ->select('countries.value','states_regions.*') 
			 ->where('states_regions.status' ,'=','1')
			 ->where('states_regions.time_zone' ,'<>','')
			 //->where('states_regions.countryId' ,'=',$countryId)
		 
		 ->Orderby('value','Asc')
		->get();
			 
		  
		 
		 
            return json_encode($data['query']);	
		 
		   }
			
		 
		
		
		
		
		
			
			
		}
			
	}
	
	
	 
	 public function getUTCTime(Request $request)
	{
	if($request->ajax())
		{
			
		$search=$request->input('countryId');
			
			$data['query'] = DB::table('countries')
	
			->join('states_regions','states_regions.countryId','=','countries.id') 
			
		     ->select('countries.value','states_regions.*') 
			// ->where('states_regions.status' ,'=','1')
			 ->where('states_regions.time_zone' ,'<>','')
			 ->where('states_regions.countryId' ,'=',$search)
		 
		 ->Orderby('value','Asc')
		->get();
			 
		 
		  
		//$rst= new BlogViewController();
		//$data['query1'] =$rst->index();
		
		 return json_encode($data['query']);	
		 
           // return json_encode(array('query1'=>$data['query1'],'query'=>$data['query']));	
		}
			
	}
	
	 
	 
	 
			
	 public function getTime(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('status');
			
			$data['query'] = DB::table('countries')
	
			->join('states_regions','states_regions.countryId','=','countries.id') 
			
		     ->select('countries.value','states_regions.*') 
			 ->where('states_regions.status' ,'=','1')
			 ->where('states_regions.time_zone' ,'<>','')
		 
		 ->Orderby('value','Asc')
		->get();
			 
		 
		 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	 
	 
	 
	 
	
	
	public function getShow($id)
	{  
	
	 
	
  
	
	
	// dd(id);
	 
	      $id=(int)$id;
		$data['query'] = DB::table('countries')
	
			->join('states_regions','states_regions.countryId','=','countries.id') 
			
		     ->select('countries.value','states_regions.*') 
			 //->where('states_regions.status' ,'=','1')
			 ->where('states_regions.time_zone' ,'<>','')
			  ->where('states_regions.id' ,'=',$id)
			  ->get();
			  
			// dd(count($data['query']));
			  $data['id']=$id;
			  //dd($data['query'][0]->countryId);
			  
			  /* GET LIST OF CITY WITHIN THE SELECTED COUNTRY */
			   
			  $countryId =$data['query'][0]->countryId;
			  
			  // dd($countryId);
			  
			  $data['city'] = DB::table('countries')
	
			->join('states_regions','states_regions.countryId','=','countries.id') 
			
		     ->select('countries.value','states_regions.*') 
			  
			  // ->where('states_regions.id' ,'<>',$id)
			 ->where('states_regions.time_zone' ,'<>','')
			 ->where('states_regions.countryId' ,'=',$countryId)
			 
			 
			 
		 
		 ->Orderby('value','Asc')
		->get();
		
		$rst= new BlogViewController();
		$data['query1'] =$rst->index();
		
		
		
		 
		 
		//return $query  = terms::where('term',$term)->count();
return view('world clock.view', array('query'=>$data['query'],'city'=>$data['city'],'id'=>$data['id'],'query1'=>$data['query1'] ));
		
	}
	
	
	 
}
