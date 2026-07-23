<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Validator;
use App\ProgramModel;
use DB;
class ProgramController extends Controller
{
    
	
	
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new ProgramModel();
	
	 $data['query'] = $rst->getAll();
 	 
	 $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		  
		  
		  //dd($data['query']);
		  
		   
		    return view('program.index', array('query'=>$data['query'],'faculty'=>$data['faculty']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		 
	   
	  $data['lecturer'] = DB::table('lecturers')
		  ->select('lecturers.*') 
		  ->get();
		  
		  
		   $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
	  
	   return view('program.insert', array('faculty'=>$data['faculty'],'lecturer'=>$data['lecturer']));
	 //return view('department.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 $lcr =$dataArray[0]['cls'];
		
		$department=$dataArray[0]['optionA'];
		 
		$time_stamps =now();
		 
		$data=array(
		'honour' => $dataArray[0]['term'],  
		'dptId' => $dataArray[0]['department'], 
	// 'lcrId' => $dataArray[0]['cls'], 
	'program' =>$dataArray[0]['optionA'],
	'created_at' =>$time_stamps,
	'details' =>$dataArray[0]['optionB'] );
	
		 	
			 
		$rst= new ProgramModel();
		 $tm = $rst->queryByFaculty($department);
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
	      
		   $data['query'] = $rst->insertData($data, $lcr);
		   
		   
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	public function show($id)
	{
		 
		$rst= new ProgramModel();
		   $data['query'] = $rst->queryByid('programs',$id);
		   
		   
		  
		   $data['lecturer'] = DB::table('lecturers')
		    ->join('departments','departments.dptId','=','lecturers.dptId') 
			->join('programs','programs.dptId','=','departments.dptId') 
			 ->join('faculties','faculties.falId','=','departments.falId') 
			 ->select('lecturers.*') 
		  ->where('programs.prgId',$id)
		  ->get();
		  
		  $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
	  
	  /*
	  $data['fct'] = DB::table('faculties')
		  ->select('faculties.*')
		  ->where('falId',$id) 
		  ->get();*/
	      
		   if (!empty($data['query']))
		   {
			    
			  
			   
		return view('program.update', array('query'=>$data['query'],'faculty'=>$data['faculty'],'lecturer'=>$data['lecturer']));
	  
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
	
	 
	 $data=array(
	 'honour' => $dataArray[0]['term'], 
	 //'falId' => $dataArray[0]['faculty'],
	 'dptId' => $dataArray[0]['department'],  
	 'lcrId' => $dataArray[0]['cls'], 
	'program' =>$dataArray[0]['optionA'],
	'details' =>$dataArray[0]['optionB'] ,
	'prgId'=> $dataArray[0]['id']);
	 
	 
	  
		
		 //dd($request->all());	
			$rst= new ProgramModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		   
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new ProgramModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function searchProgram(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('faculty');
			 $st= new ProgramModel();
         
			 $data['query'] = $st->getSchoolByDepartment($search);
			 
			  
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	public function search_fal_dpt(Request $request)
	{
	if($request->ajax())
		{
		 
			$falId=$request->input('faculty');
			$dptId=$request->input('department');
			 $st= new ProgramModel();
         
			 $data['query'] = $st->getSchoolByFalDepartment($falId,$dptId);
			 
			  
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	public function search_fal(Request $request)
	{
	if($request->ajax())
		{
		 
			$falId=$request->input('faculty');
			 
			 $st= new ProgramModel();
         
			 $data['query'] = $st->getSchoolByFal($falId);
			 
			  $data['department'] = DB::table('departments')
			   ->distinct()
		  ->select('departments.*') 
		  ->where('departments.falId',$falId)
		    ->where('departments.department' ,'<>','NA')  
		  
		  ->get();
		  
			
			   return json_encode(array('query'=>$data['query'],'department'=>$data['department']));
		 
            //return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new ProgramModel();
       
		 
			 $data['query'] = $st->delete_table('programs',$schId);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroyProgram(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new ProgramModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('programs',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
