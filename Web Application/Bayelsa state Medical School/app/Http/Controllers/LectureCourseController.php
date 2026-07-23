<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use DB;
use View;
use Validator;

use App\LectureCourseModel;
class LectureCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new LectureCourseModel();
	
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
		   
		  
		return view('lecture course.index', array('query'=>$data['query'],'faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester']));
	  
  
	
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
	  
	   return view('lecture course.insert', array('level'=>$data['level'],'faculty'=>$data['faculty'],'semester'=>$data['semester']));
	 //return view('department.insert',$data);
	 
    }
	
	public function searchProgramCourse(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('faculty');
			$dptId=$request->input('department');
			 $st= new LectureCourseModel();
         
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
		$lcrId=$dataArray[0]['prgId']; 
		 
		 $time_stamps =now();
		
		 
		$data=array( 
	     
	 'lcrId' => $dataArray[0]['prgId'], 
	  'created_at' => $time_stamps,
	  
	'cosId' =>$dataArray[0]['cosId']  );
	
		 	
			 
		$rst= new LectureCourseModel();
		 $tm = $rst->queryByFaculty($cosId,$lcrId);
		 
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
		 $id=$dataArray[0]['lecId'];
	
	 $lcrId=$dataArray[0]['courseMode'];
	  $cosId=$dataArray[0]['cosId'];
	  
	  $time_stamps =now();
	 
	$data=array(
		'lcrId' => $dataArray[0]['courseMode'],  
	 'lecId' => $dataArray[0]['lecId'],
	  'cosId' => $dataArray[0]['cosId'],
	 'updated_at' => $time_stamps);
	 
	  
		
		 //dd($request->all());	
			$rst= new LectureCourseModel();
	      
		  
		  $tm = $rst->queryByFaculty($cosId,$lcrId);
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   
		   return json_encode('Succcess');
		   
		   
		}
		
		}
	}
	
	
	
	
	
	
	public function inserViewCourse(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 
		
		 
		$lcrId=$dataArray[0]['prgId']; 
		 
		 $time_stamps =now();
		
		 
		$data=array('lcrId' => $lcrId);
	
		 	
			 
		$rst= new LectureCourseModel();
		 $tm = $rst->queryByCheck($lcrId);
		 
		    
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			  
			   $data['query'] = $rst->getAddProgramCourse($lcrId);
			   
			  
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
			
			 $st= new LectureCourseModel();
         
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
			
			 $st= new LectureCourseModel();
         
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
			
			
			 $data['lect'] = DB::table('lecturers')
		->distinct()
		//->join('courses','courses.cosId','=','lectures.cosId') 
		// ->join('lecturers','lecturers.lcrId','=','lectures.lcrId')
		  
		  ->join('departments','departments.dptId','=','lecturers.dptId')
		  ->join('faculties','faculties.falId','=','departments.falId') 
		     ->join('courses','courses.dptId','=','departments.dptId')
		   ->join('levels','levels.levId','=','courses.levId') 
		
		  
		  ->select('lecturers.fName','lecturers.surname','lecturers.title', 'lecturers.lcrId')
			
		   
		    
		 ->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId)
		 
		->get(); 
		
		
			 $st= new LectureCourseModel();
         
			 $data['query'] = $st->getByCourseSemester($search,$levId,$dptId,$semId);
			 
			 
		 return json_encode(array('query'=>$data['query'],'lect'=>$data['lect'])); 
           // return json_encode($data['query']);
		  
	
		}
	}
	public function searchCourseLevel(Request $request)
	{
	if($request->ajax())
		{
		 
			$levId=$request->input('levId');
			$search=$request->input('falId');
			$dptId=$request->input('dptId');
			
			
			 $data['lect'] = DB::table('lectures')
		->distinct()
		->join('courses','courses.cosId','=','lectures.cosId') 
		 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId')
		  
		  ->join('departments','departments.dptId','=','lecturers.dptId')
		  ->join('faculties','faculties.falId','=','departments.falId') 
		         
		   ->join('levels','levels.levId','=','courses.levId') 
		
		  
		  ->select('lecturers.fName','lecturers.surname','lecturers.title', 'lecturers.lcrId')
		  
		   
		    
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId)
		->get(); 
		
			
			
			 $st= new LectureCourseModel();
         
			 $data['query'] = $st->getByCourseLevel($search,$levId,$dptId);
			 
			 return json_encode(array('query'=>$data['query'],'lect'=>$data['lect'])); 
		 
            //return json_encode($data['query']);
		  
	
		}
	}
	 
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new LectureCourseModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			  
			   $lcrId=$request->input('lcrId');
			 
			
			 $st= new LectureCourseModel();
       
		 
			 $data['query'] = $st->delete_table('lectures',$schId);
			   if(!empty($data['query']))
		  {
			  if(!empty($prgId))
			   {
			 $data['query'] = $st->getAddProgramCourse($lcrId);
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
		 	  $st= new LectureCourseModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('lectures',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
