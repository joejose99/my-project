<?php

namespace App;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use DB;
class Home extends Model
{
    //
	
	protected $table='home';
	
	protected $fillable=['details','title','created_at'];
	public function getAll()
	{
		 $user=home::paginate(3);
		 return $user;
		 //$query=home::all();
		 //return $query;
		 
	}
	
	
	public function queryByid($table,$id)
	{
		 
		$query=$this->find($id);		 
		 return $query;
	}
	
	public function insertData($table,$data)
	{
		   //$query=DB::table($table)->insert($data);
		 
		  $rst= new home();
		 $query=$rst->create($data);
		 
		/*
		 $rst= new Student();
		$this->name =$data['name'];
		$this->email =$data['email'];
		$this->password =$data['password'];
		 
		 $query =$this->save();
		 $insertedId=$rst->id;
		 return $query;*/
		  
		 
		return $query;
		 
		
	}
	public function update_table($table,$id,$data)
	{
		/* ANY OF THE CODE WORKS DEPENDS ON WHAT YOU WANT TO ACHIEVE  
		For EXAMPLE: IF WE WANT TO USE A PARTICULAR MODEL TO REPRESENT A CLASS THEN, THESE VERY CODE COULD BE A 			        BETTER OPTION.
		ELSE WE USE THE OTHER OPTION (TRADITIONAL SQL QUERY)
		*/
		 
		$rst=$this->find($id);
		 
		$rst->details=$data['details'];
		$rst->title =$data['title'];
		 
		 
		$query =$rst->update();  
		
		/* 
		$query=DB::update('update student set name = ?, email=?,password=? where id = ?',[$data['name'],$data['email'],$data['password'],$id]);
		 */
		 return $query;
	}
	public function delete_table($tables,$id)
	{
		$query=$this->destroy($tables,$id);
		return $query;
	}
}
