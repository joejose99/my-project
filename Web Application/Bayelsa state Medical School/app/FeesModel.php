<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class FeesModel extends Model
{
   
 
   protected $table='fees';
	protected $fillable=['fees','fesId','levId','prgId','feesName','feesDetails', 'updated_at','created_at'];
	
	
	  
	
	
	public function getAll()
	{
		 /* $rst= new FacultyModel() ;
		  $query=$rst->orderBy('falId','ASC')->paginate(5);*/
		   
		 
		 return $query = DB::table('fees')
		   ->join('levels','levels.levId','=','fees.levId') 
		    ->join('programs','programs.prgId','=','fees.prgId') 
		   ->select('fees.*','levels.level','levels.levId','programs.program','programs.prgId'
		    )
		    ->Orderby('level','Asc')
		  
		->paginate(10);
		// ->get();
		 
		 
		return $query;
	}
	
	public function getAllNoPaginate()
	{
		  $rst= new FeesModel() ;
		  /*$query=$rst->orderBy('falId','ASC')->get();
		   
		 
		return $query;
		*/
		
		 
		 return $query = DB::table('fees')
		   ->join('levels','levels.levId','=','fees.levId') 
		    ->join('programs','programs.prgId','=','fees.prgId') 
		   ->select('fees.*','levels.level','levels.levId','programs.program','programs.prgId'
		    )
		->get(); 
		
		
	}
	
	
	public function queryByid($table,$id)
	{
		$rst= new MaxCourseModel();
		 
		   //return $query=$rst->where('falId',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		
		
		 return $query = DB::table('fees')
		   ->join('levels','levels.levId','=','fees.levId') 
		    ->join('programs','programs.prgId','=','fees.prgId') 
		   ->select('fees.*','levels.level','levels.levId','programs.program','programs.prgId'
		    )
		->where('fees.fesId',$id) 
		 ->Orderby('level','Asc')
		->get(); 
		  	 		 
		   
	}
	public function insertData($data)
	{
		
	 
		
		 $rst= new FeesModel();
		 
		 
		 $query = DB::table('fees')->insert($data);
		 $insertedId=$rst->id;
		 return $query; 
	}
	
	public function editData($data,$id)
	{
		 $time_stamps =now();
	
		 return $query=DB::table('fees')->where('fesId',$id)->update([
		  'levId' => $data['levId'],
		   'fees' => $data['fees'],
		 'feesName' =>$data['feesName'],
		 'feesDetails' =>$data['feesDetails'],
		 'updated_at' =>$time_stamps,
		 'prgId' =>$data['prgId'], 
		 ]);
		 
	}
	
	
	public function delete_table($tables,$schId)
	{
		 $rst= new FeesModel();
		 
		  
		 
		 
		 $query= $rst->where('fesId',$schId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		  $rst= new FeesModel();
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= $rst->where('fesId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	public function  getSchoolByLike($search)
	{
			return $query = DB::table('fees')
		   ->join('levels','levels.levId','=','fees.levId') 
		    ->join('programs','programs.prgId','=','fees.prgId') 
		   ->select('fees.*','levels.level','levels.levId','programs.program','programs.prgId')	
		->where('fees.feesName','like',"%$search%")
		 ->Orderby('level','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function  getSchoolByDepartment($search)
	{
		return $query = DB::table('fees')
		   ->join('levels','levels.levId','=','fees.levId') 
		    ->join('programs','programs.prgId','=','fees.prgId') 
		   ->select('fees.*','levels.level','levels.levId','programs.program','programs.prgId' )
		->where('programs.prgId',$search)
		 ->Orderby('level','Asc')
		->get(); 
		
		 
		
	}
	
	
	public function  getByProgramLevel($search,$level)
	{
		return $query = DB::table('fees')
		   ->join('levels','levels.levId','=','fees.levId') 
		    ->join('programs','programs.prgId','=','fees.prgId') 
		   ->select('fees.*','levels.level','levels.levId','programs.program','programs.prgId' )
		->where('programs.prgId',$search)
		->where('levels.levId',$level)
		 ->Orderby('level','Asc')
		->get(); 
		
		 
		
	}
	
	public function queryByFaculty($feesName,$level,$program)
	{  
	      
		return $query  = DB::table('fees')
		->where('feesName',$feesName)
		->where('levId',$level) 
		->where('prgId',$program)
		->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
}
