<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ProgramModel extends Model
{
   
   
   protected $table='programs';
	protected $fillable=['dptId','falId','honour','program','department','details','option','option1', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('programs')
		  ->join('positions','positions.prgId','=','programs.prgId')
		  ->join('lecturers','lecturers.lcrId','=','positions.lcrId')
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   
		   ->select('programs.*','departments.department','departments.dptId','lecturers.fName','lecturers.surname','lecturers.title','lecturers.lcrId','faculties.faculty','faculties.falId')
		   	 
		  //  ->select('programs.*','departments.department','departments.dptId','lecturers.fName','lecturers.surname','lecturers.title','lecturers.lcrId')
		->paginate(10);
		// ->get();
		 
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new ProgramModel() ;
		  /*$query=$rst->orderBy('falId','ASC')->get();
		   
		 
		return $query;
		*/
		
		return $query = DB::table('programs')
		   ->join('positions','positions.prgId','=','programs.prgId')
		  ->join('lecturers','lecturers.lcrId','=','positions.lcrId')
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   ->select('programs.*','departments.department','departments.dptId','lecturers.fName','lecturers.surname','lecturers.title','lecturers.lcrId','faculties.faculty','faculties.falId')
		 
		->get(); 
		
		
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new ProgramModel();
		 
		   //return $query=$rst->where('falId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		
		 return $query = DB::table('programs')
		  ->join('positions','positions.prgId','=','programs.prgId')
		  ->join('lecturers','lecturers.lcrId','=','positions.lcrId')
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   ->select('programs.*','departments.department','departments.dptId','lecturers.fName','lecturers.surname','lecturers.title','lecturers.lcrId','faculties.faculty','faculties.falId')
		->where('programs.prgId',$id) 
		->get(); 
		  	 		 
		   
	}
	public function insertData($data,$lcr)
	{
		
	 
		
		 $rst= new ProgramModel();
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
		 
		
		
		 
		 
		 $query =$this->save(); 
		 
		 $query = DB::table('programs')->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
		 */
		 
		 
		 
		 $insertedId= DB::table('programs')->insertGetId($data);
		 
		  $position='Program Leader';
		 
		 $now =now();
		 
		 if(trim($lcr) =='Select')
		 {
			 
		 
		 
	 
	 
	 $query1 = DB::table('lecturers')->where('fName','=','NA')->get();
	 
	  $lcrId =trim($query1[0]->lcrId);
	  
		 $data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	 'position' =>$position,
	'prgId'=> $insertedId,
	'lcrId'=> $lcrId,
	'created_at' =>$now ,
	'updated_at' =>$now  );
		  
		   DB::table('positions')->insert($data);
		 return $insertedId; 
	}		 
		 
		 
		 
		 
		 
		 else
		  
		 {
			 
		 
		 $data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'prgId' => $insertedId,
	'position' =>$position,
	'created_at' =>$now ,
	'updated_at' =>$now ,
	'lcrId' => $lcr);
	DB::table('positions')->insert($data);
		 return $insertedId; 
	}
	
		 
		 
	}
	
	public function editData($data,$id)
	{
		 $time_stamps =now();
	
		  $query=DB::table('programs')->where('prgId',$id)->update([
		  'honour' => $data['honour'],
		  // 'lcrId' => $data['lcrId'],
		    'dptId' => $data['dptId'],
		 'program' =>$data['program'],
		'updated_at' =>$time_stamps ,
		 'details' =>$data['details'], 
		 ]);
		 
		 if($data['lcrId'] !='Select')
		 {
		  DB::table('positions')->where('prgId',$id)->update([
		   'lcrId' =>$data['lcrId'],
		  'updated_at' =>$time_stamps, 
		 ]);
		 
		  
	}
		return $query;
	
	}
	
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new ProgramModel();
		 
		  
		 
		 
		 $query= $rst->where('prgId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new ProgramModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('prgId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
		 return $query = DB::table('programs')
		 ->join('positions','positions.prgId','=','programs.prgId')
		  ->join('lecturers','lecturers.lcrId','=','positions.lcrId')
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   ->select('programs.*','departments.department','departments.dptId','lecturers.fName','lecturers.surname','lecturers.title','lecturers.lcrId','faculties.faculty','faculties.falId')
		->where('programs.program','like',"%$search%")
		 ->Orderby('program','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByDepartment($search)
	{
		 return $query = DB::table('departments')
		  ->join('faculties','faculties.falId','=','departments.falId') 
		   ->select('departments.department','departments.dptId','faculties.faculty','faculties.falId')
		->where('departments.falId',$search)
		 ->Orderby('department','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByFalDepartment($falId,$dptId)
	{
		 return $query = DB::table('programs')
		   ->join('positions','positions.prgId','=','programs.prgId')
		  ->join('lecturers','lecturers.lcrId','=','positions.lcrId')
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   ->select('programs.*','departments.department','departments.dptId','lecturers.fName','lecturers.surname','lecturers.title','lecturers.lcrId')
		 
		->where('faculties.falId',$falId)
		 ->where('departments.dptId',$dptId)
		// ->Orderby('department','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByFal($falId)
	{
		 return $query = DB::table('programs')
		   ->join('positions','positions.prgId','=','programs.prgId')
		  ->join('lecturers','lecturers.lcrId','=','positions.lcrId')
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   ->select('programs.*','departments.department','departments.dptId','lecturers.fName','lecturers.surname','lecturers.title','lecturers.lcrId')
		 
		->where('faculties.falId',$falId) 
		// ->Orderby('department','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function queryByFaculty($department)
	{  
	      
		return $query  = DB::table('programs')->where('program',$department)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
