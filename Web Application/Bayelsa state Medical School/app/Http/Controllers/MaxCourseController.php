<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\MaxCourseModel;
use DB;
class MaxCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new MaxCourseModel();
	
	 $data['query'] = $rst->getAll();
	 
	 
	 
	 
	 $data['program'] = DB::table('programs')
		  ->select('programs.*') 
		  ->get();
		  
		  
		  
		  //dd($data['query']);
		  
		   
		    return view('maxCourse.index', array('query'=>$data['query'],'program'=>$data['program']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		 
	  
	  $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		  
		   $data['program'] = DB::table('programs')
		  ->select('programs.*') 
		  ->get();
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
	  
	   return view('maxCourse.insert', array('level'=>$data['level'],'semester'=>$data['semester'],'program'=>$data['program']));
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
		$program=$dataArray[0]['term'];
		$semester=$dataArray[0]['cls'];
		$level=$dataArray[0]['dpt'];
		 
		 
		
		 $created_at =now();
		$data=array(
		'prgId' => $dataArray[0]['term'], 
	 'semId' => $dataArray[0]['cls'], 
	 'levId' => $dataArray[0]['dpt'],
	'maxiCourse' =>$dataArray[0]['optionA'], 
	
	'created_at'=>$created_at );
	
		 	
			 
		$rst= new MaxCourseModel();
		 $tm = $rst->queryByFaculty($department,$semester,$level,$program);
		 
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
		 
		$rst= new MaxCourseModel();
		   $data['query'] = $rst->queryByid('maxi_courses',$id);
		   
		   
		   
		  
		  
		  $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		  $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		  
		  $data['program'] = DB::table('programs')
		  ->select('programs.*') 
		  ->get();
	  
	  /*
	  $data['fct'] = DB::table('faculties')
		  ->select('faculties.*')
		  ->where('falId',$id) 
		  ->get();*/
	      
		   if (!empty($data['query']))
		   {
			    
			  
			   
	return view('maxCourse.update', array('query'=>$data['query'],'level'=>$data['level'],'semester'=>$data['semester'],'program'=>$data['program']));
	  
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
	 'program' => $dataArray[0]['term'], 
	'semester' => $dataArray[0]['cls'], 
	'maxiCourse' =>$dataArray[0]['optionA'],
	'level' =>$dataArray[0]['dpt'] ,
	'maxId'=> $dataArray[0]['id']);
	 
	 
	 
		
		 //dd($request->all());	
			$rst= new MaxCourseModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new MaxCourseModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function searchDepartment(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('program');
			
			 $st= new MaxCourseModel();
         
			 $data['query'] = $st->getSchoolByDepartment($search);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new MaxCourseModel();
       
		 
			 $data['query'] = $st->delete_table('maxi_courses',$schId);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroyDepartment(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new MaxCourseModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('maxi_courses',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
