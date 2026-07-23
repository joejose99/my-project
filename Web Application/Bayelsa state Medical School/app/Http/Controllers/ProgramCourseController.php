<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use DB;
use View;
use Validator;

use App\ProgramCourseModel;
class ProgramCourseController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new ProgramCourseModel();
	
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
		   
		  
		return view('program course.index', array('query'=>$data['query'],'faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester']));
	  
  
	
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
	  
	   return view('program course.insert', array('level'=>$data['level'],'faculty'=>$data['faculty'],'semester'=>$data['semester']));
	 //return view('department.insert',$data);
	 
    }
	
	public function searchProgramCourse(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('faculty');
			$dptId=$request->input('department');
			 $st= new ProgramCourseModel();
         
			 $data['query'] = $st->queryByFac_Dpt_Program($search,$dptId);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 
		
		$cosId=$dataArray[0]['cosId'];
		$courseMode=$dataArray[0]['courseMode'];
		$prgId=$dataArray[0]['prgId']; 
		 
		 $time_stamps =now();
		
		 
		$data=array( 
	  'courseMode' => $dataArray[0]['courseMode'],
	    
	 'prgId' => $dataArray[0]['prgId'], 
	  'created_at' => $time_stamps,
	  
	'cosId' =>$dataArray[0]['cosId']  );
	
		 	
			 
		$rst= new ProgramCourseModel();
		 $tm = $rst->queryByFaculty($cosId,$prgId);
		 
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
	
	
	
	
	
	public function edit(Request $request,$id)
	{
		 
		  if($request->ajax())
		{
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		 $id=$dataArray[0]['prcId'];
	
	  $time_stamps =now();
	 
	$data=array(
		'courseMode' => $dataArray[0]['courseMode'],  
	 'prcId' => $dataArray[0]['prcId'],
	 'updated_at' => $time_stamps);
	 
	  
		
		 //dd($request->all());	
			$rst= new ProgramCourseModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	
	public function inserViewCourse(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 
		
		 
		$prgId=$dataArray[0]['prgId']; 
		 
		 $time_stamps =now();
		
		 
		$data=array( 'prgId' => $dataArray[0]['prgId']);
	
		 	
			 
		$rst= new ProgramCourseModel();
		 $tm = $rst->queryByCheck($prgId);
		 
		    
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			  
			   $data['query'] = $rst->getAddProgramCourse($prgId);
			   
			  
			 return json_encode($data['query']);
			 
			 
			   
			    
		  }
		  else	 
			{ 
			
	      
		    
		   
		   return json_encode('Data Not Exiting');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	
	
	public function searchFaculty(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('falId');
			
			 $st= new ProgramCourseModel();
         
			 $data['query'] = $st->getSchoolByFaculty($search);
			 
			 
			 $data['rstDpt'] = DB::table('departments')
		  ->select('departments.*') 
		  ->where('falId',$search) 
		   ->where('departments.department','<>','NA')
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
			
			 $st= new ProgramCourseModel();
         
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
			 $st= new ProgramCourseModel();
         
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
			 $st= new ProgramCourseModel();
         
			 $data['query'] = $st->getByCourseLevel($search,$levId,$dptId);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	 
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new ProgramCourseModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			  
			   $prgId=$request->input('prgId');
			 
			
			 $st= new ProgramCourseModel();
       
		 
			 $data['query'] = $st->delete_table('program_course',$schId);
			   if(!empty($data['query']))
		  {
			  if(!empty($prgId))
			   {
			 $data['query'] = $st->getAddProgramCourse($prgId);
		  }
		  else
		  {
			  $data['query'] = $st->getAllNoPaginate();
		 }
		  
		  
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
		 	  $st= new ProgramCourseModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('program_course',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
