<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model
{
    //
	
	 
	protected $fillable=['role','id','status','created_at','updated_at'];
	 
	 protected $table='roles';
	 
	public function getAllPagination()
	{
		  /* 
		   $cat= new ElectionCategory() ;
		   $query=$cat->orderBy('electionCategory','ASC')
		   ->paginate(8);*/
		   
		   
		   $query= DB::table('roles')
		 ->paginate(8);
		return $query;
	}
	
	public function getAll()
	{ 
		  /*  $state= new State() ;
		   $query=$state->orderBy('state','ASC')
		   
		  ->get();
		 
		return $query; */
		 
		
		
		 return $query = DB::table('roles')
		  ->get();
		 
		 
	}
	
	
	
	
	
	
	
	public function getUserRole()
	{
		return $query = DB::table('roles')
		 ->distinct()
		 ->select('roles.*')
		  
		 ->get(); 
		
	}
	
	
	public function queryByTerm($state)
	{  
	      
		return $query  = DB::table('roles')->where('role',$state)->count();
		//return $query  = terms::where('term',$term)->count();
		
	}
	
	
	
	
	public function insertData($data)
	{ 
	
	
	 //DB::table('electionCategory')
	 
	 return $query=DB::table('roles')->insert($data);
	 /* $rst= new ElectionCategory();
		$this->electionCategory =$state; 
		 
		 $query =$this->save();
		 $insertedId=$rst->id;
		 return $query; */
		   
	}
	 
	public function delete_table($tables,$ste_Id)
	{
		 
		 $query= DB::table('roles')->where('id',$ste_Id)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= DB::table('roles')->where('id',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	
	public function editData($state,$status,$id)
	{
		  
		
		 return $query=DB::table('roles')->where('id', $id)->update([
		  'role' =>$state, 
		  'status' =>$status,
        //others property
    ]);
 	 
		
	}
	
	
	public function user()
	{
		//return $this->belongsTo('App\User');
		
		return $this->hasMany('App\User');
	}
	
	public function queryByid($table,$id)
	{
		 
		 return  $query=DB::table('roles')->where('id', $id)->get();
	}
}

?>
