<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Validator;

use App\FacultyModel;

class FacultyController extends Controller
{
  
   public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new FacultyModel();
	 $data['query'] = $rst->getAll();
	 
	 
	 
	 
	 $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		  
		  
		  //dd($data['query']);
		  
		   
		    return view('faculty.index', array('query'=>$data['query'],'faculty'=>$data['faculty']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		   
	  
	  $data['lecturer'] = DB::table('lecturers')
		    //->join('positions','positions.lcrId','=','lecturers.lcrId') 
			 //->join('faculties','faculties.falId','=','positions.falId') 
			 ->select('lecturers.*') 
		  
		  ->get();
		  
		  return view('faculty.insert', array('lecturer'=>$data['lecturer']));
	  
	  
	 //return view('faculty.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 
		  
		  
		 $lcr =$dataArray[0]['cls'];
		 
		
		$faculty=$dataArray[0]['optionA'];
		
		$contents=$dataArray[0]['optionA'];
	 $strPos =strpos($dataArray[0]['optionA']," ");
	
	 //dd($strPos);
	 $strPos2 =$strPos+1;
	
	
	
	
	
	
	
	 if(trim($strPos) != false)
	 {
		 $str1=substr($contents,$strPos,2);
 		 $str2 =substr($contents,0,2);
		 
		
		  $str3=trim($str2).trim($str1);
		  // dd($str3.' Within the first statement');
		   
	 //dd(strtoupper($str3));
	 }
	 else
	 {
	 $str3 =substr($contents,0,3);
	  
	  
	 }
		 
		 
		 $time_stamps=now();
		$data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'faculty' =>$dataArray[0]['optionA'],
	'details' =>$dataArray[0]['optionB'],
	'abbreviate'=>strtoupper($str3),
	'created_at' =>$time_stamps );
	
		 	
			 
		$rst= new FacultyModel();
		 $tm = $rst->queryByFaculty($faculty);
		 
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
		 
		$rst= new FacultyModel();
		   $data['query'] = $rst->queryByid('faculties',$id);
		  /* 
		   $data['lecturer'] = DB::table('lecturers')
		  ->select('lecturers.*') 
		  ->get();
		  */
		  
		  
		  $data['lecturer'] = DB::table('lecturers')
		    ->join('departments','departments.dptId','=','lecturers.dptId') 
			 ->join('faculties','faculties.falId','=','departments.falId') 
			 ->select('lecturers.*') 
		  ->where('faculties.falId',$id)
		  ->get();
		  
		   if (!empty($data['query']))
		   {
			    
			  /*   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->school ;
	          echo'<br>'; 
        
		       endforeach; */ 
			   
			    return view('faculty.update', array('query'=>$data['query'],'lecturer'=>$data['lecturer']));
	  
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
	
	$lcr=$dataArray[0]['cls']; 
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
	 $strPos =strpos($contents," ");

	 if($strPos != false)
	 {
		 $str1=substr($contents,$strPos,2);
		 $str2 =substr($contents,0,2);
		 
		  $str3=trim($str2).trim($str1);
	 //dd(strtoupper($str3));
	 }
	 else
	 {
	 $str3 =substr($contents,0,3);
	  
	 }
	 
	 
	 
	 
	 $data=array(
	 'lcrId' => $dataArray[0]['cls'], 
	'faculty' =>$dataArray[0]['optionA'],
	'details' =>$dataArray[0]['optionB'] ,
	'created_at' =>$time_stamps  ,
	'abbreviate' =>strtoupper($str3)  ,
	'falId'=> $dataArray[0]['id']);
	 
	 
	
	 //dd($strPos);
		
		
		//dd(substr($contents,8,2));
		
		
		
			$rst= new FacultyModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new FacultyModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new FacultyModel();
       
		 
			 $data['query'] = $st->delete_table('faculies',$schId);
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
		 	  $st= new FacultyModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('faculties',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
