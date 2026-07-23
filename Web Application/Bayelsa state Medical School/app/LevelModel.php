<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
class LevelModel extends Model
{
   protected $table='levels';
	protected $fillable=['levId','level', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('levels')
		   ->select('levels.*')
		   
		->paginate(10);
		// ->get();
		 
		 
		 
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new LevelModel() ;
		  /*$query=$rst->orderBy('falId','ASC')->get();
		   
		 
		return $query;
		*/
		
		return $query = DB::table('levels')
		    ->select('levels.*')
		 
		->get(); 
		
		
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new LevelModel();
		 
		   //return $query=$rst->where('falId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		
		 return $query = DB::table('levels')
		  ->select('levels.*')
		->where('levels.levId',$id) 
		->get(); 
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	 
		
		 $rst= new LevelModel();
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
		 
		 $query = DB::table('levels')->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
	}
	
	public function editData($data,$id)
	{
		 
	$time_stamps = now();
	
		 return $query=DB::table('levels')->where('levId',$id)->update([
		    'level' =>$data['level'],  
			'updated_at' =>$time_stamps,  
		 ]);
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new LevelModel();
		 
		  
		 
		 
		 $query= $rst->where('levId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new LevelModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('levId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
		 return $query = DB::table('levels')
		    ->select('levels.*')
		->where('levels.level','like',"%$search%")
		 ->Orderby('level','Asc')
		->get(); 
		
		 
		
	}
	
	public function queryByFaculty($faculty)
	{  
	      
		return $query  = DB::table('levels')->where('level',$faculty)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
