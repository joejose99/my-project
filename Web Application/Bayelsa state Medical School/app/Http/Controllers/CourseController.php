<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use DB;
use View;
use Validator;

use App\CourseModel;
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new CourseModel();
	
	 $data['query'] = $rst->getAll();
	 
	 
	 
	 
	 $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		  
		  $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		   
		  
		return view('course.index', array('query'=>$data['query'],'faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		 
	  
	  
		  
		  
		   $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		  
		  $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
	  
	   return view('course.insert', array('level'=>$data['level'],'faculty'=>$data['faculty'],'semester'=>$data['semester']));
	 //return view('department.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 
		
		$cosId=$dataArray[0]['optionA'];
		$course=$dataArray[0]['optionB'];
		$courseUnit=$dataArray[0]['optionC'];
		$courseDetails=$dataArray[0]['txtOptionB'];
		$courseType=$dataArray[0]['courseType'];
		
		$semId=$dataArray[0]['semester'];
		//$falId=$dataArray[0]['faculty'];
		 
		$dptId=$dataArray[0]['dpt'];
		 
		 $time_stamps =now();
		
		 
		$data=array(
		'semId' => $dataArray[0]['semester'],  
	 'levId' => $dataArray[0]['level'],
	  'dptId' => $dataArray[0]['dpt'],
	    'courseType' => $dataArray[0]['courseType'],
	 'courseDetails' => $dataArray[0]['txtOptionB'],
	  'course' => $dataArray[0]['optionB'],
	  'courseUnit' => $dataArray[0]['optionC'],
	  'created_at' => $time_stamps,
	  
	'cosId' =>$dataArray[0]['optionA']  );
	
		 	
			 
		$rst= new CourseModel();
		 $tm = $rst->queryByFaculty($cosId);
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
	      
		   $data['query'] = $rst->insertData($data,$cosId);
		   
		   
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	public function show($id)
	{
		 
		 
		 
		$rst= new CourseModel();
		   $data['query'] = $rst->queryByid('courses',$id);
		   
		   
		   $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		  
		  $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
	  
	  
	  
	  
	      
		  
		   if (!empty($data['query']))
		   {
			    
			  
			   
	return view('course.update', array('query'=>$data['query'],'level'=>$data['level'],'semester'=>$data['semester'],'faculty'=>$data['faculty']));
	  
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
	
	  $time_stamps =now();
	 
	$data=array(
		'semId' => $dataArray[0]['semester'],  
	 'levId' => $dataArray[0]['level'],
	  'dptId' => $dataArray[0]['dpt'],
	    
		 'courseType' => $dataArray[0]['txtCourse'], 
	 'courseDetails' => $dataArray[0]['txtOptionB'],
	  'course' => $dataArray[0]['optionB'],
	  'courseUnit' => $dataArray[0]['optionC'],
	  'created_at' => $time_stamps,
	  
	'cosId' =>$dataArray[0]['optionA']  );
	 
	 
	
	
		
		 //dd($request->all());	
			$rst= new CourseModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new CourseModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function searchFaculty(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('falId');
			
			 $st= new CourseModel();
         
			 $data['query'] = $st->getSchoolByFaculty($search);
			 
			 
			 $data['rstDpt'] = DB::table('departments')
		  ->select('departments.*') 
		  ->where('falId',$search) 
		  ->get();
		 
            return json_encode( array('query'=>$data['query'],'rstDpt'=>$data['rstDpt']));
		  
	
		}
	}
	
	
	public function searchDepartment(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('falId');
			$dptId=$request->input('dptId');
			
			 $st= new CourseModel();
         
			 $data['query'] = $st->getSchoolByDepartment($search,$dptId);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	public function searchCourseSemester(Request $request)
	{
	if($request->ajax())
		{
		 
			$levId=$request->input('levId');
			$search=$request->input('falId');
			$dptId=$request->input('dptId');
			$semId=$request->input('semId');
			 $st= new CourseModel();
         
			 $data['query'] = $st->getByCourseSemester($search,$levId,$dptId,$semId);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	public function searchCourseLevel(Request $request)
	{
	if($request->ajax())
		{
		 
			$levId=$request->input('levId');
			$search=$request->input('falId');
			$dptId=$request->input('dptId');
			 $st= new CourseModel();
         
			 $data['query'] = $st->getByCourseLevel($search,$levId,$dptId);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	  
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new CourseModel();
       
		 
			 $data['query'] = $st->delete_table('courses',$schId);
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
		 	  $st= new CourseModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('courses',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
