<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use DB;
class InstructionModel extends Model
{
   protected $fillable=['instruction','instId'];
	 
	
	public function getAll()
	{
		   /*
		     $cls= new InstructionModel() ;
		    $query=$cls->orderBy('instruction','ASC')->get();
			*/
		   $query=DB::table('instructions')->orderBy('instruction','ASC')->get();
		  
		return $query;
	}
	
	
	 
	
	
	public function queryByTerm($class)
	{  
	      
		return $query  = DB::table('instructions')->where('instruction',$class)->count();
		 
		
	}
	
	
	public function insertData($table,$data)
	{ 
	/*
	 $rst= new InstructionModel();
		$this->instruction =$class; 
		 
		 $query =$this->save();
		 $insertedId=$rst->id;
		 return $query; 
		 */
		 
		    return $query=DB::table($table)->insert($data);
	}
	 
	public function delete_table($tables,$clsId)
	{
		 
		 $query= DB::table('instructions')->where('instId',$clsId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= DB::table('instructions')->where('instId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	
	public function editData($class,$id)
	{
		  
		
		 return $query=DB::table('instructions')->where('instId', $id)->update([
		  'instruction' =>$class, 
        //others property
    ]);
 	 
		
	}
	
	public function queryByid($table,$id)
	{
		 
		 return  $query=DB::table('instructions')->where('instId', $id)->get();
	}
	
}
