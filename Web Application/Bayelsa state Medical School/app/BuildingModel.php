<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use DB;

class BuildingModel extends Model
{
     protected $table='buildings';
	protected $fillable=['buiId','building','description','option','option1', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		 
		 
	  $query= DB::table('buildings')
		     
			 ->select('buildings.*') 
		  
		  ->paginate(10);
		 
		 
			
			 
			
		// ->get();
		 
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new BuildingModel() ;
	 
		
		return $query= DB::table('buildings')
		     
			 ->select('buildings.*') 
		
		->get();
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new BuildingModel();
		 
		   //return $query=$rst->where('falId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		/*
		 return $query = DB::table('faculties')
		 ->join('lecturers','lecturers.lcrId','=','faculties.lcrId') 
		   ->select('faculties.*','lecturers.*')
		->where('faculties.falId',$id) 
		->get(); */
		
		return $query= DB::table('buildings')
		     
			 ->select('buildings.*') 
		->where('buildings.buiId',$id) 
		->get();
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	  
		 
		 
		  return $query = DB::table('buildings')->insert($data);
		  
	}
	
	public function editData($data,$id)
	{
		 
	
		 return $query=DB::table('buildings')->where('buiId',$id)->update([
		   'building' =>$data['building'],
		 'description' =>$data['description'], 
		 'updated_at' =>$data['created_at'] , 
		 ]);
		 
		  
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new BuildingModel();
		  
		 $query= $rst->where('buiId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new BuildingModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('buiId',$dataArray[$ctr])->delete();
		       
				
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
		
		return $query = DB::table('buildings')
		    ->select('buildings.*') 
		->where('buildings.building','like',"%$search%")
		 ->Orderby('building','Asc')
		->get();
		 
		
	}
	
	public function queryByFaculty($faculty)
	{  
	      
		return $query  = DB::table('buildings')->where('building',$faculty)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
