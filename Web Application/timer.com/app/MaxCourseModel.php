<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class MaxCourseModel extends Model
{
   

 
 
   protected $table='maxi_courses';
	protected $fillable=['maxiCourse','maxId','levId','semId','prgId', 'updated_at','created_at'];
	
	public $timestamps =true;
	  
	
	
	public function getAll()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('maxi_courses')
		  ->join('semesters','semesters.semId','=','maxi_courses.semId') 
		  ->join('levels','levels.levId','=','maxi_courses.levId') 
		    ->join('programs','programs.prgId','=','maxi_courses.prgId') 
		   ->select('maxi_courses.*','semesters.semester','semesters.semId','levels.level','levels.levId','programs.program','programs.prgId'
		    )
		    ->Orderby('level','Asc')
		  
		->paginate(10);
		// ->get();
		 
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new MaxCourseModel() ;
		  /*$query=$rst->orderBy('falId','ASC')->get();
		   
		 
		return $query;
		*/
		
		 return $query = DB::table('maxi_courses')
		  ->join('semesters','semesters.semId','=','maxi_courses.semId') 
		  ->join('levels','levels.levId','=','maxi_courses.levId') 
		    ->join('programs','programs.prgId','=','maxi_courses.prgId') 
		  ->select('maxi_courses.*','semesters.semester','semesters.semId','levels.level','levels.levId','programs.program','programs.prgId')
		  ->Orderby('level','Asc')
		->get(); 
		
		
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new MaxCourseModel();
		 
		   //return $query=$rst->where('falId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		
		 return $query = DB::table('maxi_courses')
		  ->join('semesters','semesters.semId','=','maxi_courses.semId') 
		  ->join('levels','levels.levId','=','maxi_courses.levId') 
		    ->join('programs','programs.prgId','=','maxi_courses.prgId') 
		  ->select('maxi_courses.*','semesters.semester','semesters.semId','levels.level','levels.levId','programs.program','programs.prgId')
	
		->where('maxi_courses.maxId',$id) 
		 ->Orderby('level','Asc')
		->get(); 
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	 
		
		 $rst= new MaxCourseModel();
		 
		 
		 $query = DB::table('maxi_courses')->insert($data);
		 $insertedId=$rst->id;
		 
		 return $query; 
	}
	
	public function editData($data,$id)
	{
		 
	
		 return $query=DB::table('maxi_courses')->where('maxId',$id)->update([
		  'levId' => $data['level'],
		   'semId' => $data['semester'],
		 'maxiCourse' =>$data['maxiCourse'],
		 'prgId' =>$data['program'], 
		 ]);
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new MaxCourseModel();
		 
		  
		 
		 
		 $query= $rst->where('maxId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new MaxCourseModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('maxId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
		  return $query = DB::table('maxi_courses')
		  ->join('semesters','semesters.semId','=','maxi_courses.semId') 
		  ->join('levels','levels.levId','=','maxi_courses.levId') 
		    ->join('programs','programs.prgId','=','maxi_courses.prgId') 
		  ->select('maxi_courses.*','semesters.semester','semesters.semId','levels.level','levels.levId','programs.program','programs.prgId')
	
		->where('programs.program','like',"%$search%")
		 ->Orderby('level','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByDepartment($search)
	{
		 return $query = DB::table('maxi_courses')
		  ->join('semesters','semesters.semId','=','maxi_courses.semId') 
		  ->join('levels','levels.levId','=','maxi_courses.levId') 
		    ->join('programs','programs.prgId','=','maxi_courses.prgId') 
		  ->select('maxi_courses.*','semesters.semester','semesters.semId','levels.level','levels.levId','programs.program','programs.prgId')
	
		->where('programs.prgId',$search)
		 ->Orderby('level','Asc')
		->get(); 
		
		 
		
	}
	
	public function queryByFaculty($department,$semester,$level,$program)
	{  
	      
		return $query  = DB::table('maxi_courses')
		->where('maxiCourse',$department)
		->where('levId',$level)
		->where('semId',$semester)
		->where('prgId',$program)
		->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}



