<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\LevelModel;
use DB;
class LevelController extends Controller
{
     
public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new LevelModel();
	 $data['query'] = $rst->getAll();
	 
	 
	 
	  
		  
		  
		  
		  //dd($data['query']);
		  
		   
		    return view('level.index', array('query'=>$data['query']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		 
	  
	  $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
	  
	 return view('level.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			// $dataArray=[];
		
		$faculty = $request->input('level');
		 
		
		//$dataArray = json_decode($content, true);
		  
		 
		 
		$time_stamps =now();
		 
		$data=array(
	 'level' =>  $request->input('level'),
	   'created_at' =>  $time_stamps);
	
		 	
			 
		$rst= new LevelModel();
		 $cnt = $rst->queryByFaculty($faculty);
		 
		   // dd($tm);,		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
	      
		   $data['query'] = $rst->insertData($data);
		   
		   
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	public function show($id)
	{
		 
		$rst= new LevelModel();
		   $data['query'] = $rst->queryByid('levels',$id);
		   
		    
		  
		   if (!empty($data['query']))
		   {
			    
			  /*   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->school ;
	          echo'<br>'; 
        
		       endforeach; */ 
			   
			    return view('level.update', array('query'=>$data['query']));
	  
		       //return view('faculty.update',$data);
		   }
	}

	public function edit(Request $request, $id)
	{
		//echo 'update';
		if($request->ajax())
		{
		 $dataArray=[];
		
		
		 $content = $request->input('dataArray');
		$dataArray = json_decode($content, true);
		 $level = $dataArray[0]['optionA'];
		 
		
		 
	
	 
	 $data=array(
	 'level' =>$dataArray[0]['optionA'],
	 'levId'=> $dataArray[0]['id']);
	 
	 
	 
		
		 //dd($request->all());	
			$rst= new LevelModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new LevelModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new LevelModel();
       
		 
			 $data['query'] = $st->delete_table('levels',$schId);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroyLevel(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new LevelModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('levels',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
