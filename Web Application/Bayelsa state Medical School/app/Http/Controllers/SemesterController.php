<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\SemesterModel;
use DB;

class SemesterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new SemesterModel();
	 $data['query'] = $rst->getAll();
	 
	 
	 
	  
		  
		  
		  
		  //dd($data['query']);
		  
		   
		    return view('semester.index', array('query'=>$data['query']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		 
	  
	   
	  
	 return view('semester.insert');
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			// $dataArray=[];
		
		$faculty = $request->input('semester');
		 
		
		//$dataArray = json_decode($content, true);
		  
		 
		 
		$time_stamps =now();
		 
		$data=array(
	 'semester' =>  $request->input('semester'),
	 'created_at' =>  $time_stamps);
	
		 	
			 
		$rst= new SemesterModel();
		 $tm = $rst->queryByFaculty($faculty);
		 
		   // dd($tm);
		  $cnt= $tm;
		   
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
		 
		$rst= new SemesterModel();
		   $data['query'] = $rst->queryByid('semesters',$id);
		   
		    
		  
		   if (!empty($data['query']))
		   {
			    
			  /*   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->school ;
	          echo'<br>'; 
        
		       endforeach; */ 
			   
			    return view('semester.update', array('query'=>$data['query']));
	  
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
		 $semester = $dataArray[0]['optionA'];
		 
		
		 
	
	 
	 $data=array(
	 'semester' =>$dataArray[0]['optionA'],
	 'semId'=> $dataArray[0]['id']);
	 
	 
	 
		
		 //dd($request->all());	
			$rst= new SemesterModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new SemesterModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new SemesterModel();
       
		 
			 $data['query'] = $st->delete_table('semesters',$schId);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroySemester(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new SemesterModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('semesters',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
