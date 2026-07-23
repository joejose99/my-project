<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class CourseModel extends Model
{
    
   protected $table='courses';
	protected $fillable=['course','cosId','	courseId','dptId','levId','semId','courseUnint','courseDetatils', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('courses')
		    ->select('courses.*')
		    ->Orderby('courseId','Asc')
		  
		->paginate(10);
		// ->get();
		 
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new FeesModel() ;
		  /*$query=$rst->orderBy('falId','ASC')->get();
		   
		 
		return $query;
		*/
		
		 /*
		 return $query = DB::table('fees')
		   ->join('levels','levels.levId','=','fees.levId') 
		    ->join('programs','programs.prgId','=','fees.prgId') 
		   ->select('fees.*','levels.level','levels.levId','programs.program','programs.prgId'
		    )
			*/
			return $query = DB::table('courses')
		    ->select('courses.*')
		    ->Orderby('courseId','Asc')
		->get(); 
		
		
	}
	
	
	public function queryByid($table,$id)
	{
		  
		   //return $query=$rst->where('falId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		
		return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId') 
		    ->join('courses','courses.dptId','=','departments.dptId') 
			->join('levels','levels.levId','=','courses.levId') 
			->join('semesters','semesters.semId','=','courses.semId') 
		   ->select('courses.*','faculties.*', 'departments.*','semesters.*','levels.*')
		->where('courses.courseId',$id) 
		->get(); 
		
		/*
		return $query = DB::table('courses')
		    ->select('courses.*')
		    
		->where('courses.cosId',$id) 
		 ->Orderby('courseId','Asc')
		 */
		
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	 
		
		 $rst= new CourseModel();
		 
		 
		 $query = DB::table('courses')->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
	}
	
	public function editData($data,$id)
	{
		 $time_stamps =now();
	
		 return $query=DB::table('courses')->where('courseId',$id)->update([
		  'levId' => $data['levId'],
		  'semId' => $data['semId'],
		   'course' => $data['course'],
		    'courseType' => $data['courseType'],
		 'courseDetails' =>$data['courseDetails'],
		 'courseUnit' =>$data['courseUnit'],
		 'updated_at' =>$time_stamps,
		 'dptId' =>$data['dptId'], 
		 ]);
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new CourseModel();
		 
		  
		 
		 
		 $query= $rst->where('courseId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new CourseModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('courseId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
			return $query = DB::table('courses')
		    
		   ->select('courses.*')	
		->where('courses.cosId','like',"%$search%")
		 ->Orderby('courseId','desc')
		->get(); 
		
		 
		
	}
	
	public function  getSchoolByFaculty($search)
	{
		return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId') 
		    ->join('courses','courses.dptId','=','departments.dptId') 
		   ->select('courses.*' )
		->where('faculties.falId',$search)
		 
		->get(); 
		
		 
		
	}
	
	public function  getSchoolByDepartment($search,$dptId)
	{
		return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId') 
		    ->join('courses','courses.dptId','=','departments.dptId') 
		   ->select('courses.*' )
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->get(); 
		
		 
		
	}
	
	
	public function  getByCourseLevel($search,$levId,$dptId)
	{
		return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId') 
		    ->join('courses','courses.dptId','=','departments.dptId') 
			->join('levels','levels.levId','=','courses.levId') 
		   ->select('courses.*' )
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId)
		->get(); 
		
		 
		
	}
	
	
	
	public function  getByCourseSemester($search,$levId,$dptId,$semId)
	{
		return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId') 
		    ->join('courses','courses.dptId','=','departments.dptId') 
			->join('levels','levels.levId','=','courses.levId') 
			->join('semesters','semesters.semId','=','courses.semId') 
		   ->select('courses.*' )
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId)
		->where('semesters.semId',$semId)
		->get(); 
		
		 
		
	}
	
	public function queryByFaculty($cosId)
	{  
	      
		return $query  = DB::table('courses')
		 ->where('cosId',$cosId) 
		->count();
		//return $query  = terms::where('term',$term)->count();
		
	}

}
