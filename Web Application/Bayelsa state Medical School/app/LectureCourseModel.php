<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use DB;
class LectureCourseModel extends Model
{
  protected $table='lectures';
	protected $fillable=['lcrId','course','cosId','	courseId','dptId','levId','semId','courseUnint','courseDetatils', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
	 
		return $query = DB::table('courses')
	        ->distinct()
			->join('lectures','lectures.cosId','=','courses.cosId') 
			 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId') 
		  ->select('courses.*','lecturers.*','lectures.lecId')
			  
		 ->paginate(10);
		  		 
		
		  /*
		return $query = DB::table('faculties')
		   
			->join('departments','departments.falId','=','faculties.falId')
			
			->join('courses','courses.dptId','=','departments.dptId')  
			->join('lecturers','lecturers.dptId','=','departments.dptId') 
			
			->join('lectures','lectures.lcrId','=','lecturers.lcrId') 
			 ->distinct() 
			 ->groupby('lectures.lcrId')
		 ->paginate(10);
		  		 	 
		 
		 */ 
		  
		// ->get();
		 
		 
		return $query;
	}
	
	
	
	
	
	public function getAddProgramCourse($lcrId)
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('courses')
		    
		    ->join('lectures','lectures.cosId','=','courses.cosId') 
			 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId') 
		  // ->select('program_course.*','courses.*' )
		  ->select('courses.*','lecturers.fName','lecturers.surname','lecturers.title','lectures.lecId' )
		
		
		 ->where('lecturers.lcrId',$lcrId)
		 
		
		 ->get();
		 
		 
		 
		  
		// ->get();
		 
		 
		return $query;
	}
	
	
	
	
	public function getAllNoPaginate()
	{
		 return $query = DB::table('courses')
		   
			
			->join('lectures','lectures.cosId','=','courses.cosId') 
			 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId') 
		   
		 ->get();
		 
		 
		 
		  
		// ->get();
		 
		 
		return $query;
	}
	
	
	
	
	public function  getSchoolByFaculty($search)
	{
		return $query = DB::table('lectures')
		 
		->join('courses','courses.cosId','=','lectures.cosId') 
		 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId')
		  
		  ->join('departments','departments.dptId','=','lecturers.dptId')
		  ->join('faculties','faculties.falId','=','departments.falId') 
		         
		   
		  
		  ->select('courses.*','lecturers.fName','lecturers.surname','lecturers.title','lectures.lecId' )
		
		   
		 ->where('faculties.falId',$search)
		 ->distinct()
		 
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByDepartment($search,$dptId)
	{
		return $query = DB::table('lectures')
		
		->join('courses','courses.cosId','=','lectures.cosId') 
		 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId')
		  
		  ->join('departments','departments.dptId','=','lecturers.dptId')
		  ->join('faculties','faculties.falId','=','departments.falId') 
		         
		   
		  
		  ->select('courses.*','lecturers.fName','lecturers.surname','lecturers.title','lectures.lecId' )
		
		   
		 ->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->get(); 
		
		 
		
	}
	
	
	public function  getByCourseLevel($search,$levId,$dptId)
	{
		   return $query = DB::table('lectures')
		 
		->join('courses','courses.cosId','=','lectures.cosId') 
		 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId')
		  
		  ->join('departments','departments.dptId','=','lecturers.dptId')
		  ->join('faculties','faculties.falId','=','departments.falId') 
		         
		   ->join('levels','levels.levId','=','courses.levId') 
		
		  
		  ->select('courses.*','lecturers.fName','lecturers.surname','lecturers.title','lectures.lecId' )
		  
		   
		    
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId)
		->get(); 
		
		 
		
	}
	
	
	
	public function  getByCourseSemester($search,$levId,$dptId,$semId)
	{
		 return $query = DB::table('lectures')
		 
		->join('courses','courses.cosId','=','lectures.cosId') 
		 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId')
		  
		  ->join('departments','departments.dptId','=','lecturers.dptId')
		  ->join('faculties','faculties.falId','=','departments.falId') 
		         
		   ->join('levels','levels.levId','=','courses.levId') 
		
		  
		  ->select('courses.*','lecturers.fName','lecturers.surname','lecturers.title','lecturers.lcrId','lectures.lecId' )
		  
		   
		    
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		->where('levels.levId',$levId) 
		->where('lectures.lcrId',$semId)
		->get(); 
		
		 
		
	}
	
	
	
	public function  getSchoolByLike($search)
	{
			 return $query = DB::table('lectures')
		 
		->join('courses','courses.cosId','=','lectures.cosId') 
		 ->join('lecturers','lecturers.lcrId','=','lectures.lcrId')
		  
		  ->join('departments','departments.dptId','=','lecturers.dptId')
		  ->join('faculties','faculties.falId','=','departments.falId') 
		         
		   ->join('levels','levels.levId','=','courses.levId') 
		
		  
		  ->select('courses.*','lecturers.fName','lecturers.surname','lecturers.title','lectures.lecId' )
		->where('lecturers.fName','like',"%$search%")
		 ->Orderby('lecId','desc')
		->get(); 
		
		 
		
	}
	
	
	
	
	
	public function queryByFac_Dpt_Program($search,$dptId)
	{ 
	return $query = DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId')
		    ->join('lecturers','lecturers.dptId','=','departments.dptId')
			 
			 
		   ->select('lecturers.*' )
		->where('faculties.falId',$search)
		->where('departments.dptId',$dptId)
		
		/*->where('levels.levId',$levId)
		->where('semesters.semId',$semId)
		->get(); */
		 ->get();
	
	 
	}
	
	public function insertData($data)
	{
		
	 
		
		 $rst= new LectureCourseModel();
		 
		 
		 $query = DB::table('lectures')->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
	}
	
	public function queryByFaculty($cosId,$lcrId)
	{  
	      
		return $query  = DB::table('lectures')
		 ->where('cosId',$cosId ) 
		 ->where('lcrId',$lcrId ) 
		->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
	
	public function queryByCheck($lcrId)
	{  
	      
		return $query  = DB::table('lectures')
		 ->where('lcrId',$lcrId)  
		->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
	
	public function delete_table($tables,$schId)
	{
		 $rst= new LectureCourseModel();
		 
		  
		 
		 
		 $query= $rst->where('lecId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new LectureCourseModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('lecId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	
	public function editData($data,$id)
	{
		 $time_stamps =now();
	
		 return $query=DB::table('lectures')->where('lecId',$id)->update([
		  'lcrId' => $data['lcrId'], 
		 'updated_at' =>$data['updated_at'],
		   
		 ]);
		 
	}
}