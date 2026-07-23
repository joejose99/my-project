<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class ProgramCourseModel extends Model
{
  protected $table='program_course';
	protected $fillable=['prcId','courseMode','course','cosId','	courseId','dptId','levId','semId','courseUnint','courseDetatils', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			  
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
		    ->join('courses','courses.cosId','=','program_course.cosId') 
			 
		   ->select('program_course.*','courses.cosId','courses.course','courses.courseUnit','courses.courseDetails','programs.program' )
		/*->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId)
		->where('semesters.semId',$semId)
		->get(); */
		 ->paginate(10);
		 
		 
		 
		  
		// ->get();
		 
		 
		return $query;
	}
	
	
	
	
	
	public function getAddProgramCourse($prgId)
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			  
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
		    ->join('courses','courses.cosId','=','program_course.cosId') 
			 
		  // ->select('program_course.*','courses.*' )
		  ->select('program_course.*','courses.cosId','courses.course','courses.courseUnit','courses.courseDetails','courses.courseId','programs.program' )
		
		
		 ->where('program_course.prgId',$prgId)
		//->where('courses.cosId',$prgId)
		
		 ->get();
		 
		 
		 
		  
		// ->get();
		 
		 
		return $query;
	}
	
	
	
	
	public function getAllNoPaginate()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			  
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
		    ->join('courses','courses.cosId','=','program_course.cosId') 
			 
		  // ->select('program_course.*','courses.*' )
		  ->select('program_course.*','courses.cosId','courses.course','courses.courseUnit','courses.courseDetails','courses.courseId','programs.program')
		
		
		 //->where('program_course.prgId',$prgId)
		//->where('courses.cosId',$prgId)
		
		 ->get();
		 
		 
		 
		  
		// ->get();
		 
		 
		return $query;
	}
	
	
	
	
	public function  getSchoolByFaculty($search)
	{
		return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			  
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
		    ->join('courses','courses.cosId','=','program_course.cosId') 
			 
		  // ->select('program_course.*','courses.*' )
		  ->select('program_course.*','courses.course','courses.courseUnit','courses.courseDetails','programs.program' )
		->where('faculties.falId',$search)
		//->where('program_course.prcId','1')
		
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByDepartment($search,$dptId)
	{
		return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			  
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
		    ->join('courses','courses.cosId','=','program_course.cosId') 
			 
		  // ->select('program_course.*','courses.*' )
		  ->select('program_course.*','courses.course','courses.courseUnit','courses.courseDetails','programs.program' )
		 ->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->get(); 
		
		 
		
	}
	
	
	public function  getByCourseLevel($search,$levId,$dptId)
	{
		return $query = DB::table('faculties')
		    ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			  
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
		    ->join('courses','courses.cosId','=','program_course.cosId') 
			
			->join('levels','levels.levId','=','courses.levId') 
		   ->select('program_course.*','courses.course','courses.courseUnit','courses.courseDetails','programs.program' )
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId)
		->get(); 
		
		 
		
	}
	
	
	
	public function  getByCourseSemester($search,$levId,$dptId,$semId)
	{
		return $query = DB::table('faculties')
		    ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			  
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
		    ->join('courses','courses.cosId','=','program_course.cosId') 
			
			->join('levels','levels.levId','=','courses.levId') 
			->join('semesters','semesters.semId','=','courses.semId') 
		   ->select('program_course.*','courses.course','courses.courseUnit','courses.courseDetails','programs.program' )
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId)
		->where('semesters.semId',$semId)
		->get(); 
		
		 
		
	}
	
	
	
	public function  getSchoolByLike($search)
	{
			return $query = DB::table('faculties')
		    ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			  
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
		    ->join('courses','courses.cosId','=','program_course.cosId') 
		 
		  // ->select('program_course.*','courses.*' )
		  ->select('program_course.*','courses.course','courses.courseUnit','courses.courseDetails','programs.program' )
		->where('program_course.cosId','like',"%$search%")
		 ->Orderby('prcId','desc')
		->get(); 
		
		 
		
	}
	
	
	
	
	
	public function queryByFac_Dpt_Program($search,$dptId)
	{ 
	return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId')
		    ->join('programs','programs.dptId','=','departments.dptId')
			 
			 
		   ->select('programs.program','programs.prgId' )
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		/*->where('levels.levId',$levId)
		->where('semesters.semId',$semId)
		->get(); */
		 ->get();
	
	 
	}
	
	public function insertData($data)
	{
		
	 
		
		 $rst= new ProgramCourseModel();
		 
		 
		 $query = DB::table('program_course')->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
	}
	
	public function queryByFaculty($cosId,$prgId)
	{  
	      
		return $query  = DB::table('program_course')
		 ->where('cosId',$cosId ) 
		 ->where('prgId',$prgId ) 
		->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
	
	public function queryByCheck($prgId)
	{  
	      
		return $query  = DB::table('program_course')
		 ->where('prgId',$prgId) 
		->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
	
	public function delete_table($tables,$schId)
	{
		 $rst= new ProgramCourseModel();
		 
		  
		 
		 
		 $query= $rst->where('prcId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new ProgramCourseModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('prcId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	
	public function editData($data,$id)
	{
		 $time_stamps =now();
	
		 return $query=DB::table('program_course')->where('prcId',$id)->update([
		  'courseMode' => $data['courseMode'], 
		 'updated_at' =>$data['updated_at'],
		   
		 ]);
		 
	}
}
