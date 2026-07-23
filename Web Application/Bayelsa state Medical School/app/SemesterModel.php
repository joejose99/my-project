<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class SemesterModel extends Model
{
   protected $table='semesters';
	protected $fillable=['semId','semester', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('semesters')
		   ->select('semesters.*')
		   
		->paginate(10);
		// ->get();
		 
		 
		 
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new SemesterModel() ;
		  /*$query=$rst->orderBy('falId','ASC')->get();
		   
		 
		return $query;
		*/
		
		return $query = DB::table('semesters')
		    ->select('semesters.*')
		 
		->get(); 
		
		
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new SemesterModel();
		 
		   //return $query=$rst->where('falId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		
		
		 return $query = DB::table('semesters')
		  ->select('semesters.*')
		->where('semesters.semId',$id) 
		->get(); 
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	 
		
		 $rst= new SemesterModel();
		 /*
		 $this->state =$data['state'];
		$this->LGA =$data['LGA'];
		 
		$this->fName =$data['fName'];
		$this->surname =$data['surname'];
		$this->midName =$data['midName'];
		$this->address =$data['address'];
		$this->mobileNo =$data['mobileNo'];
		$this->email =$data['email'];
		$this->dateOfBirth =$data['dateOfBirth'];
		$this->nextOfKin =$data['nextOfKin'];
		$this->nextOfKinMobile =$data['nextOfKinMobile'];
		$this->nextOfKinAddress =$data['nextOfKinAddress'];
		 
		
		
		 
		 
		 $query =$this->save(); */
		 
		 $query = DB::table('semesters')->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
	}
	
	public function editData($data,$id)
	{
		 
	$time_stamps =now();
	
		 return $query=DB::table('semesters')->where('semId',$id)->update([
		    'semester' =>$data['semester'], 
			'updated_at' =>$time_stamps,  
		 ]);
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new SemesterModel();
		 
		  
		 
		 
		 $query= $rst->where('semId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new SemesterModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('semId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
		 return $query = DB::table('semesters')
		    ->select('semesters.*')
		->where('semesters.semester','like',"%$search%")
		 ->Orderby('semester','Asc')
		->get(); 
		
		 
		
	}
	
	public function queryByFaculty($faculty)
	{  
	      
		return $query  = DB::table('semesters')->where('semester',$faculty)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
