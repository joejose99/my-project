<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class StudentModel extends Model
{
   protected $table='students';
	protected $fillable=['stdId','prgId','surname','address','fname','midName','mobileNo','email','dateOfBirth','state','LGA','nextOfKin','nextOfKinMobile','	nextOfKinAddress','updated_at','created_at'];
	
	  //protected $primaryKey="BUA19111";
	 //public $incrementing =false;
	
	
	
	public function getAll()
	{
		  $rst= new StudentModel() ;
		  $query=$rst->orderBy('stdId','ASC')->paginate(5);
		   
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new StudentModel() ;
		  $query=$rst->orderBy('stdId','ASC')->get();
		   
		 
		return $query;
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new StudentModel();
		 
		 //return $query=lecturers::where('lcrId',$id)->get();
		  return $query=$rst->where('stdId',$id)->get();
		   		  	 		 
		   
	}
	public function insertData($table,$data)
	{
		
	 
		
		 $rst= new StudentModel();
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
		 
		 $query = DB::table($table)->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
	}
	
	public function editData($table,$data,$id,$ids)
	{
		 
	 
		 
		 $query = DB::table($table)->where($ids,$id)->update($data);
		 //$insertedId=$rst->id;
		 return $query; 
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new StudentModel();
		 
		  
		 
		 
		 $query= $rst->where('studentId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new StudentModel();
		 $ctr=0;
			   $numb=count($dataArray);
			   /*
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('studentId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			 */
			 
			 $query= $rst->whereIn('studentId',$dataArray)->delete();
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
		 return $query = DB::table('students')
		 ->select('students.*')
		->where('fName','like',"%$search%")
		 ->Orderby('fName','Asc')
		->get(); 
	}
	
	public function  getStudentByLike($search)
	{
		 return $query = DB::table('students')
		 ->select('students.*')
		->where('stdId','like',"%$search%")
		 ->Orderby('fName','Asc')
		->get(); 
	}
	
	public function queryByFaculty($department)
	{  
	      
		return $query  = DB::table('programs')->where('program',$department)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
 
 public function queryStudentIdCheck($stdId)
	{  
	      
		return $query  = DB::table('students')->where('stdId',$stdId)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
	
	 
}
