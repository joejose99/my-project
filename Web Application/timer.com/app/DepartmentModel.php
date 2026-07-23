<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class DepartmentModel extends Model
{
	 
	 //protected $table1='positions';
    protected $table=['departments','positions'];
	protected $fillable=['dptId','falId','department','details','option','option1', 'updated_at','created_at','lcrId'];
	
	
	  
	
	
	public function getAll()
	{
		  
		  $rst= new DepartmentModel() ;
	  return $query = DB::table('departments')
		     ->join('positions','positions.dptId','=','departments.dptId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			  
			 ->select('departments.*','lecturers.lcrId','lecturers.fName','lecturers.surname','lecturers.midName','lecturers.title') 
			 ->where('departments.department' ,'<>','NA')
		  
		  ->paginate(10);
		 
		 
			
			 
			
		// ->get();
		 
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new DepartmentModel() ;
		  /*$query=$rst->orderBy('falId','ASC')->get();
		   
		 
		return $query;
		*/
		/*
		return $query = DB::table('faculties')
		 ->join('lecturers','lecturers.lcrId','=','faculties.lcrId') 
		   ->select('faculties.*','lecturers.*')
		 
		->get(); 
		*/
		
		return $query = DB::table('departments')
		     ->join('positions','positions.dptId','=','departments.dptId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			 ->select('departments.*','lecturers.lcrId','lecturers.fName','lecturers.surname','lecturers.midName','lecturers.title') 
			 ->where('departments.department' ,'<>','NA')
		  
				->get();
	}

	
	
	public function queryByid($table,$id)
	{
		$rst= new DepartmentModel();
		 
		 
		
		return $query = DB::table('departments')
		
		 ->join('faculties','faculties.falId','=','departments.falId') 
		     ->join('positions','positions.dptId','=','departments.dptId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			 ->select('departments.*','faculties.falId','faculties.faculty','lecturers.lcrId','lecturers.fName','lecturers.surname','lecturers.midName','lecturers.title') 
			 ->where('departments.department' ,'<>','NA')
		  
		->where('departments.dptId',$id) 
		->get();
		  	 		 
		   
	}
	public function insertData($data, $lcr)
	{
		
	 
		
		 $rst= new DepartmentModel();
		 
		 
		  
		  $insertedId= DB::table('departments')->insertGetId($data);
		 
		  $position='Head of Department';
		 
		 $now =now();
		 
		 if(trim($lcr) =='Select')
		 {
			 
		 
		 
	 
	 
	 $query1 = DB::table('lecturers')->where('fName','=','NA')->get();
	 
	  $lcrId =trim($query1[0]->lcrId);
	  
		 $data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	 'position' =>$position,
	'dptId'=> $insertedId,
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
	'dptId' => $insertedId,
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
		 
	 $updated_at= now();
		  $query=DB::table('departments')->where('dptId',$id)->update([
		   'department' =>$data['department'],
		 'details' =>$data['details'], 
		 'updated_at' =>$updated_at, 
		 ]);
		 
		  if($data['lcrId'] !='Select')
		 {
		  DB::table('positions')->where('dptId',$id)->update([
		   'lcrId' =>$data['lcrId'],
		  'updated_at' =>$updated_at, 
		 ]);
		 
		 }
		  return $query;
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		
		 $rst= new DepartmentModel();
		 
		 $query= DB::table('departments')->where('dptId',$schId)->delete();
		 //$query= $rst->where('dptId',$schId)->delete();
		 return $query;
	 	 
		 
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new DepartmentModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 
		 		//$query= $rst->where('dptId',$dataArray[$ctr])->delete();
		        $query= DB::table('departments')->where('dptId',$dataArray[$ctr])->delete();
				
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
		
		return $query = DB::table('departments')
		   ->join('positions','positions.dptId','=','departments.dptId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			->select('departments.*','lecturers.lcrId','lecturers.fName','lecturers.surname','lecturers.midName','lecturers.title') 
			 ->where('departments.department' ,'<>','NA')
		->where('departments.department','like',"%$search%")
		 ->Orderby('department','Asc')
		->get();
		 
		
	}
	
	public function getSchoolByDepartment($search)
	{ 
	return $query = DB::table('departments')
	
			->join('positions','positions.dptId','=','departments.dptId') 
			
		    ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			 ->select('departments.*','lecturers.lcrId','lecturers.fName','lecturers.surname','lecturers.midName','lecturers.title') 
			 ->where('departments.department' ,'<>','NA')
		->where('departments.falId','=',$search)
		 ->Orderby('department','Asc')
		->get();
	}
	
	
	public function queryByFaculty($department)
	{  
	      
		return $query  = DB::table('departments')->where('department',$department)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
	
	
	public function queryByFac($failId)
	{  
	      
		return $query  = DB::table('departments')
		->distinct()
		->where('falId',$failId)
		->get();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
