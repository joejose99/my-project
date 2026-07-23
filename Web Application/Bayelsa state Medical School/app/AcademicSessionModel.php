<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use DB;
class AcademicSessionModel extends Model
{
   protected $tables='academic_sessions';
    
	protected $fillable=['acdId','academic_session', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		/*
		   $rst= new AcademicSessionModel() ;
		  $query=$rst->orderBy('acdId','ASC')->paginate(10); 
		  
		  
		 /* 
		 return $query = DB::table('faculties')
		  ->join('lecturers','lecturers.lcrId','=','faculties.lcrId') 
		 ->select('faculties.*')
		  ->select('faculties.*','lecturers.*')
		->paginate(10);
		*/
		/* 
		 $ctr= DB::table('faculties')
		    ->join('positions','positions.falId','=','faculties.falId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			 ->select('faculties.*','lecturers.*') 
		->count();
		
		
		 
	  $query= DB::table('academic_sessions') 
			
			 ->select('faculties.*','lecturers.*') 
		  
		  ->paginate(10);
		 
		 */
			
			 
			
		// ->get();
		 
		 return $query = DB::table('academic_sessions') 
			
			 ->select('academic_sessions.*') 
			  ->paginate(10);
		 
	}
	
	public function getAllNoPaginate()
	{
		 
		
		 return $query = DB::table('academic_sessions') 
			
			 ->select('academic_sessions.*') 
			 ->get();
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new AcademicSessionModel();
		 
		    //return $query=$rst->where('acdId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		/*
		 return $query = DB::table('faculties')
		 ->join('lecturers','lecturers.lcrId','=','faculties.lcrId') 
		   ->select('faculties.*','lecturers.*')
		->where('faculties.falId',$id) 
		->get(); */
		
		return $query = DB::table('academic_sessions') 
			
			 ->select('academic_sessions.*') 
		->where('academic_sessions.acdId',$id) 
		->get();
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	 
		
		 $rst= new AcademicSessionModel();
		 
		 
		 return $query = DB::table('academic_sessions')->insert($data);
		  
	 
	
	}
	
	public function editData($data,$id)
	{
		 
	
		  $query=DB::table('academic_sessions')->where('acdId',$id)->update([
		   'academic_session' =>$data['academic_session'], 
		 'updated_at' =>$data['created_at'] 
		 ]);
		 
		   
		  return $query;
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new AcademicSessionModel();
		  
		  
		 //$query= $rst->where('acdId',$schId)->delete();
		$query= DB::table('academic_sessions')->where('acdId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new AcademicSessionModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		//$query= $rst->where('acdId',$dataArray[$ctr])->delete();
		       
				$query= DB::table('academic_sessions')->where('acdId',$dataArray[$ctr])->delete();
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
		/*
		 return $query = DB::table('faculties')
		 ->join('lecturers','lecturers.lcrId','=','faculties.lcrId') 
		   ->select('faculties.*','lecturers.*')
		->where('faculties.faculty','like',"%$search%")
		 ->Orderby('faculty','Asc')
		->get(); 
		*/
		
		return $query = DB::table('academic_sessions')
		    
			
			 ->select('academic_sessions.*') 
		->where('academic_sessions.academic_session','like',"%$search%")
		 ->Orderby('acdId','Asc')
		->get();
		 
		
	}
	
	
	
	public function  getAcademicSession()
	{ 
		
		return $query = DB::table('academic_sessions')
		    
			
			 ->select('academic_sessions.*') 
		 
		 ->Orderby('acdId','Desc')
		->get();
		 
		
	}
	
	
	public function queryByFaculty($faculty)
	{  
	      
		return $query  = DB::table('academic_sessions')->where('academic_session',$faculty)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
