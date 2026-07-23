<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class FacultyModel extends Model
{
	protected $tables='positions';
    protected $table='faculties';
	protected $fillable=['falId','faculty','details','option','option1', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
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
		
		*/
		 
	  $query= DB::table('faculties')
		    ->join('positions','positions.falId','=','faculties.falId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			 ->select('faculties.*','lecturers.*') 
		  
		  ->paginate(10);
		 
		 
			
			 
			
		// ->get();
		 
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new FacultyModel() ;
		  /*$query=$rst->orderBy('falId','ASC')->get();
		   
		 
		return $query;
		*/
		/*
		return $query = DB::table('faculties')
		 ->join('lecturers','lecturers.lcrId','=','faculties.lcrId') 
		   ->select('faculties.*','lecturers.*')
		 
		->get(); 
		*/
		
		return $query = DB::table('faculties')
		    ->join('positions','positions.falId','=','faculties.falId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			 ->select('faculties.*','lecturers.*') 
		
		->get();
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new FacultyModel();
		 
		   //return $query=$rst->where('falId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		/*
		 return $query = DB::table('faculties')
		 ->join('lecturers','lecturers.lcrId','=','faculties.lcrId') 
		   ->select('faculties.*','lecturers.*')
		->where('faculties.falId',$id) 
		->get(); */
		
		return $query = DB::table('faculties')
		    ->join('positions','positions.falId','=','faculties.falId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			 ->select('faculties.*','lecturers.*') 
		->where('faculties.falId',$id) 
		->get();
		  	 		 
		   
	}
	public function insertData($data, $lcr)
	{
		
	 
		
		 $rst= new FacultyModel();
		 
		 
		 //$query = DB::table('faculties')->insert($data);
		 //$insertedId=$rst->id;
		  $insertedId= DB::table('faculties')->insertGetId($data);
		  //$insertedId= DB::getPdo()->lastInserted;;
		  
		  
		  
		 $position ='Dean of Faculty';
		 $now =now();
		 
		 if($lcr =='Select')
		 {
			 
		 
		 $cntDpt  = DB::table('departments')->where('department','=','NA')->count();
		 if($cntDpt ==0)
		 {
			  $data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'falId' => $insertedId, 
	'department' =>'NA' ,
	'created_at' =>$now ,
	'updated_at' =>$now  );
	
	 $insertedDpt= DB::table('departments')->insertGetId($data);
	 
	 
	 
	  
	 
	  $data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'dptId' => $insertedDpt,
	'fName' =>'NA',
	'surname' =>'NA',
	'mobileNo' =>'NA',
	'address' =>'NA',
	'dateOfBirth' =>'NA',
	'created_at' =>$now ,
	'updated_at' =>$now  );
	
	 $insertedLec= DB::table('lecturers')->insertGetId($data);
	 
	 
	 
	 
	 $data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'falId' => $insertedId,
	'position' =>$position,
	'lcrId' =>$insertedLec,
	'created_at' =>$now ,
	'updated_at' =>$now  );
		  
		   DB::table('positions')->insert($data);
		 return $insertedId; 
	 
		}		 
		 
	 if($cntDpt >0)	 
	{		
	
	$query = DB::table('departments')->where('department','=','NA')->get();
	 
	 $dptId =trim($query[0]->dptId);
	 
	 $query1 = DB::table('lecturers')->where('fName','=','NA')->get();
	 
	  $lcrId =trim($query1[0]->lcrId);
	  
		 $data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'falId' => $insertedId,
	'position' =>$position,
	'dptId'=> $dptId,
	'lcrId'=> $lcrId,
	'created_at' =>$now ,
	'updated_at' =>$now  );
		  
		   DB::table('positions')->insert($data);
		 return $insertedId; 
	}		 
		 
		 
		 
		 }	
		 
		 else
		  
		 {
			 
		 
		 $data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'falId' => $insertedId,
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
		 
	
		  $query=DB::table('faculties')->where('falId',$id)->update([
		   'faculty' =>$data['faculty'],
		 'details' =>$data['details'], 
		 'updated_at' =>$data['created_at'] ,
		 'abbreviate' =>$data['abbreviate'] ,
		 ]);
		 
		  if($data['lcrId'] !='Select')
		 {
		  DB::table('positions')->where('falId',$id)->update([
		   'lcrId' =>$data['lcrId'],
		 'updated_at' =>$data['created_at'] ,
		 ]);
		 
		 }
		  return $query;
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new FacultyModel();
		  
		 $query= $rst->where('falId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new FacultyModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('falId',$dataArray[$ctr])->delete();
		       
				
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
		
		return $query = DB::table('faculties')
		    ->join('positions','positions.falId','=','faculties.falId') 
			 ->join('lecturers','lecturers.lcrId','=','positions.lcrId') 
			
			 ->select('faculties.*','lecturers.*') 
		->where('faculties.faculty','like',"%$search%")
		 ->Orderby('faculty','Asc')
		->get();
		 
		
	}
	
	public function queryByFaculty($faculty)
	{  
	      
		return $query  = DB::table('faculties')->where('faculty',$faculty)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
