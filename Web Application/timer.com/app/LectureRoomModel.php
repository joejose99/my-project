<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class LectureRoomModel extends Model
{
     protected $table='lecturerooms';
	protected $fillable=['romId','roomNumber','buiId','building','capacity','option','option1', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		  
		  $rst= new LectureRoomModel() ;
	  return $query = DB::table('buildings')
		     ->join('lecturerooms','lecturerooms.buiId','=','buildings.buiId') 
			  
			  
			 ->select('lecturerooms.*','buildings.building') 
			 
		  
		  ->paginate(10);
		 
		 
			
			 
			
		// ->get();
		 
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new LectureRoomModel() ;
		   
		
		return $query = DB::table('buildings')
		     ->join('lecturerooms','lecturerooms.buiId','=','buildings.buiId') 
			  
			  
			 ->select('lecturerooms.*','buildings.building') 
		
				->get();
	}

	
	
	public function queryByid($table,$id)
	{
		$rst= new LectureRoomModel();
		 
		 
		
		return $query = DB::table('buildings')
		     ->join('lecturerooms','lecturerooms.buiId','=','buildings.buiId') 
			  
			  
			 ->select('lecturerooms.*','buildings.building') 
		  
		->where('lecturerooms.romId',$id) 
		->get();
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	 
		
		 $rst= new LectureRoomModel();
		 
		 
		 return $query = DB::table('lecturerooms')->insert($data);
		 //return $insertedId= DB::table('lecturerooms')->insertGetId($data);
		  
	 
	
	}
	
	public function editData($data,$id)
	{
		 
	 $updated_at= now();
		  $query=DB::table('lecturerooms')->where('romId',$id)->update([
		   'capacity' =>$data['capacity'],
		 'buiId' =>$data['buiId'], 
		 'roomNumber' =>$data['roomNumber'], 
		 'updated_at' =>$updated_at, 
		 ]);
		 
		  
		 
		  
		  return $query;
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		
		 $rst= new LectureRoomModel();
		 
		 $query= DB::table('lecturerooms')->where('romId',$schId)->delete();
		 //$query= $rst->where('dptId',$schId)->delete();
		 return $query;
	 	 
		 
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new LectureRoomModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 
		 		//$query= $rst->where('dptId',$dataArray[$ctr])->delete();
		        $query= DB::table('lecturerooms')->where('romId',$dataArray[$ctr])->delete();
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
		 
		return $query = DB::table('buildings')
		     ->join('lecturerooms','lecturerooms.buiId','=','buildings.buiId') 
			  
			  
			 ->select('lecturerooms.*','buildings.building') 
		->where('lecturerooms.roomNumber','like',"%$search%")
		  
		->get();
		 
		
	}
	
	public function getSchoolByDepartment($search)
	{ 
	return $query = DB::table('buildings')
		     ->join('lecturerooms','lecturerooms.buiId','=','buildings.buiId') 
			  
			  
			 ->select('lecturerooms.*','buildings.building') 
		->where('lecturerooms.buiId','=',$search)
		 ->Orderby('building','Asc')
		->get();
	}
	
	
	public function queryByFaculty($department)
	{  
	      
		return $query  = DB::table('lecturerooms')->where('roomNumber',$department)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
