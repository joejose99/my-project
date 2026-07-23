<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Validator;

use App\AcademicSessionModel;

class AcademicSessionController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new AcademicSessionModel();
	 $data['query'] = $rst->getAll();
	 
	 
	 
	 
	   
		  
		  //dd($data['query']);
		  
		   
		    return view('academic session.index', array('query'=>$data['query']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		   
	  
	  
		  
		  return view('academic session.insert');
	  
	  
	 //return view('faculty.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 
		  
		  
		 //$lcr =$dataArray[0]['cls'];
		 
		
		$faculty=$dataArray[0]['optionA'];
		
		 
		 
		 
		 $time_stamps=now();
		$data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'academic_session' =>$dataArray[0]['optionA'], 
	'created_at' =>$time_stamps );
	
		 	
			 
		$rst= new AcademicSessionModel();
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
		 
		$rst= new AcademicSessionModel();
		   $data['query'] = $rst->queryByid('academic_sessions',$id);
		  /* 
		   $data['lecturer'] = DB::table('lecturers')
		  ->select('lecturers.*') 
		  ->get();
		  */
		  
		  
		  
		  
		   if (!empty($data['query']))
		   {
			   
			   
			    return view('academic session.update', array('query'=>$data['query']));
	  
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
		 
		$time_stamps =now();
		$dataArray = json_decode($content, true);
	
	 
	$falId= $dataArray[0]['id'];
	
	/*
	
	 if(trim($lcr) != 'Select')
		 {
			 
			  
			 
		$countss = DB::table('lecturers')
		    
		 ->join('departments','departments.dptId','=','lecturers.dptId') 
		  ->join('faculties','faculties.falId','=','departments.falId') 
		  ->select('departments.*','lecturers.*','faculties.faculty','faculties.falId')
		
		->where('departments.falId',$falId)
		->where('lecturers.lcrId',$lcr)
		 ->where('lecturers.fName' ,'<>','NA')
		 ->Orderby('department','Asc')
		->count(); 
		 
		} 
		
		if($countss ==0)
		{
			return json_encode('Lectueres Is not in this Faculty!!!');
			return false;
		} 
		
		*/
		
		
	 
	 $contents=trim($dataArray[0]['optionA']);
	  
	 
	 
	 $data=array(
	  'academic_session' =>$dataArray[0]['optionA'], 
	'created_at' =>$time_stamps  , 
	'acdId'=> $dataArray[0]['id']);
	 
	 
	
	 //dd($strPos);
		
		
		//dd(substr($contents,8,2));
		
		
		
			$rst= new AcademicSessionModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new AcademicSessionModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new AcademicSessionModel();
       
		 
			 $data['query'] = $st->delete_table('academic_sessions',$schId);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroyLecturer(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new AcademicSessionModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('academic_sessions',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
