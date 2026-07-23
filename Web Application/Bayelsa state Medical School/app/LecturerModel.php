<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class LecturerModel extends Model
{
    //
	protected $table='lecturers';
	protected $fillable=['lcrId','surname','address','fname','midName','mobileNo','email','dateOfBirth','state','LGA','nextOfKin','nextOfKinMobile','	nextOfKinAddress','updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		  $rst= new LecturerModel() ;
		  $query=$rst->orderBy('lcrId','ASC')
		   ->where('lecturers.fName' ,'<>','NA')
		   ->paginate(5);
		   
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new LecturerModel() ;
		  $query=$rst->orderBy('lcrId','ASC')
		  
		   ->where('lecturers.fName' ,'<>','NA')
		   ->get();
		   
		 
		return $query;
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new LecturerModel();
		 
		 //return $query=lecturers::where('lcrId',$id)->get();
		  return $query=$rst->where('lcrId',$id) 
		  ->where('lecturers.fName' ,'<>','NA')->get();
		  
		  
		  
		  
		// return $query= DB::Select('Select * from school where schId=',$id);	
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	 
		
		 $rst= new LecturerModel();
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
		 
		 $query = DB::table('lecturers')->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
	}
	
	public function editData($data,$id)
	{
		 
	
		 return $query=DB::table('lecturers')->where('lcrId',$id)->update([
		  'state' => $data['state'],
		   'dptId' => $data['dptId'],
		 'LGA' => $data['LGA'],
		 'fName' =>$data['fName'],
		 'surname' =>$data['surname'],
	     'midName' => $data['midName'], 
		 'address' =>$data['address'],
		 'mobileNo' =>$data['mobileNo'],
		 'email' =>$data['email'],
		 'updated_at'=> $data['updated_at'],
		 'dateOfBirth'=> $data['dateOfBirth'], 
	'nextOfKin'=> $data['nextOfKin'],
	'nextOfKinMobile'=> $data['nextOfKinMobile'],
	'nextOfKinAddress'=> $data['nextOfKinAddress'],
		 
		 ]);
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new LecturerModel();
		 
		  
		 
		 
		 $query= $rst->where('lcrId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new LecturerModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('lcrId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
		 return $query = DB::table('lecturers')
		 ->select('lecturers.*')
		->where('fName','like',"%$search%")
		 ->Orderby('fName','Asc')
		->get(); 
	}
	
	
	
	public function  getSchoolByDepartment($falId)
	{
		 return $query = DB::table('departments')
		    
		 ->join('lecturers','lecturers.dptId','=','departments.dptId') 
		  ->join('faculties','faculties.falId','=','departments.falId') 
		  ->select('departments.*','lecturers.*','faculties.faculty','faculties.falId')
		->where('departments.falId',$falId)
		 ->where('lecturers.fName' ,'<>','NA')
		 ->Orderby('department','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByFalDepartment($falId,$dptId)
	{
		 return $query = DB::table('departments')
		   ->join('lecturers','lecturers.dptId','=','departments.dptId') 
		  ->join('faculties','faculties.falId','=','departments.falId') 
		   ->select('departments.*','lecturers.*','faculties.faculty','faculties.falId')
		  ->where('lecturers.fName' ,'<>','NA')
		->where('faculties.falId',$falId)
		 ->where('departments.dptId',$dptId)
		// ->Orderby('department','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByFalDepartmentPrg($falId,$dptId,$prgId)
	{
		 return $query = DB::table('departments')
		   ->join('lecturers','lecturers.dptId','=','departments.dptId') 
		    ->join('programs','programs.dptId','=','departments.dptId') 
		  ->join('faculties','faculties.falId','=','departments.falId') 
		   ->select('departments.*','lecturers.*','faculties.faculty','faculties.falId')
		  ->where('lecturers.fName' ,'<>','NA')
		->where('faculties.falId',$falId)
		 ->where('departments.dptId',$dptId)
		  ->where('programs.prgId',$prgId)
		// ->Orderby('department','Asc')
		->get(); 
		
		 
		
	}
}
