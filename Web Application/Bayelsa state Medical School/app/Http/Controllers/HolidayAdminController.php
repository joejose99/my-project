<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
 use View;
  use Illuminate\Database\Eloquent\Model;

 use DB;
use Illuminate\Support\Facades\Auth;
class HolidayAdminController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
		
		 
		 $tm = DB::table('holidays')->count();
		 
		$data['query'] = DB::table('holidays')
		  ->select('holidays.*') 
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

	     return view('holiday admin.index', array('query'=>$data['query'],'countries'=>$data['countries']));
		
	 	//return view('blog.index');
		
		
	 }
	 
	 
	 
	  public function get_insert()
    {
        
		 
	   
	  $data['query'] = DB::table('countries')
		  ->select('countries.*') 
		  ->Orderby('id','Asc')
		  ->get();
		   
		  
	   
	   return view('holiday admin.insert', array('query'=>$data['query']));
	 //return view('department.insert',$data);
	 
    }
	
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			// $dataArray=[];
		
		 
		 $holiday=$request->input('holiday');
		 $countryId=$request->input('countryId');
		 $year=$request->input('year');
		 $status='Enable';
		
		//$dataArray = json_decode($content, true);
		  
	  
		$data=array(
		'details' => $holiday,
		'status' => $status,
		'year' => $year,
		'countryId'=>$countryId);
	 	
		/* VALIDATING IF DATA EXIT IN THE TABLE */	
		  $tm = DB::table('holidays')->where('details',$holiday)->count();
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
			 
			/* SAVED DATA BLOG TO DATABASE TABLE */
	      
		  $id= DB::table('holidays')->insertGetId($data);
		   
		    
		    
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	public function getShow($id)
	{
		 $data['query'] = DB::table('holidays')
		 ->join('countries','countries.id','=','holidays.countryId') 
		  ->select('holidays.*','countries.value') 
		  ->Orderby('id','Asc')
		  ->where('holidays.id',$id)
		  ->get();
		  
		   $data['countries'] = DB::table('countries')
		  ->select('countries.*')  
		  ->get();
		  
		   
		  
		 return view('holiday admin.edit', array('query'=>$data['query'],'countries'=>$data['countries']));
 }
 
 public function edit(Request $request, $id)
	{
		
		if($request->ajax())
		{
		  
		
		
		$countryId=$request->input('countryId');
		 
		 $blog=$request->input('holiday');
		 $status=$request->input('status');
		 $year=$request->input('year');
		 
	
	/* UPDATING BLOG DATABASE */
	 
	 DB::table('holidays')->where('id',$id)->update([
		   'details' =>$blog,
		    'year' =>$year,
		   'countryId' =>$countryId,
		 'status' =>$status ,]);
	 
	   
	 
	 return json_encode('Succcess');
	 
	
	}
	
    }
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('menu');
			
			 
			
			$data['query'] = DB::table('countries')
			 ->join('holidays','holidays.countryId','=','countries.id') 
		  ->select('holidays.*') 
		  
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
			 
			
			$data['query']= DB::table('holidays')->where('id',$schId)->delete();
			
			  
			   if(!empty($data['query']))
		  {
			 $data['query'] = DB::table('holidays')
		  ->select('holidays.*') 
		  ->Orderby('id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	
	public function destroyBlog(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	   
        
		$ctr=0;
			   $numb=count($dataArray);
			   
			     $data['query']= DB::table('holidays')->whereIn('id',$dataArray)->delete();
			   /*
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		  $data['query']= DB::table('blogs')->where('id',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }*/
		
		 
			  
			  if(!empty($data['query']))
		 {
			 $data['query'] = DB::table('holidays')
		  ->select('holidays.*') 
		  ->Orderby('id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
