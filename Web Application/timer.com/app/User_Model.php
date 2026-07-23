<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class User_Model extends Model
{
     
		protected $fillable=['name','email','role','rol_Id','status','password','created_at','id' ];

	//protected $table =['users','roles'];
	 protected $table ='users';
	//protected $table1 ='role';
	
	//protected $fillable=['name','password','email'];
	 public function getAll()
	{ 
		 //$query=user::all();
		
		return $query = DB::table('users')
		 
		->join('roles','users.rol_Id','=','roles.id')
		 ->select('users.*','roles.role')
		 ->Orderby('users.id','Desc')
		 ->get(); 
		
		//return $query;
		
		/*
		return $query=DB::table('users')
		 ->join('role','role.rol_Id','=','users.rol_Id') 
		 ->select('users.*','role.*') 
		 
		 ->get();*/ 
		
	}
	
	
	
	
	
	public function delete_table($tables,$id)
	{
		$query=$this->destroy($tables,$id);
		return $query;
	}
	
	public function insertData($table,$data)
	{
		    
		  return $query=$this->create($data);
		/*
		 return $user = $this->create([
            'name' => $data['name'],
            'email' => $data['email'],
			'rol_Id' => $data['rol_Id'],
			'status' => $data['status'],
            'password' => bcrypt($data['password']),
        ]); */ 
	}
	
	 
	public function getByAdmin()
	{
		 return $query = DB::table('users')
		 ->join('roles','users.rol_Id ','=','roles.id')
		->select('users.*','roles.role')
		->where('roles.role','=','Center Admin')
		->Orderby('users.id','Desc')
		 ->get();  
		 
		 
		 //return User::with('role')->get();
		 
		 /*
		return $query= DB::table('users')
		 ->join('role','role.rol_Id','=','users.rol_Id')
		 ->where('role.role','=','Center Admin')
		 ->select('users.*','role.*')
		->Orderby('id','Desc')
		 ->get(); */
		 
		 
	}
	
	public function role()
	{
		 
		 //return $this->belongsTo('myFirstApp\Role');
		 
		return $query=DB::table('users')
		 ->join('roles','roles.id','=','users.rol_Id') 
		 ->select('users.*','roles.*') 
		 ->get();
		 
	}
	
	
	
	
	public function getById($table,$id)
	{
		return $query = DB::table('users')
		 ->join('roles','users.rol_Id ','=','roles.id')
		->select('users.*','roles.role')
		 ->where('users.id','=',$id) 
		 ->get(); 
		 
		 
		 /*
		 return $query= DB::table('users')
		 ->join('role','role.rol_Id','=','users.rol_Id')
		 ->select('users.*','role.*')
		->where('id','=',$id) 	 
		 ->get(); */
	}
	
	
	
	public function editData($data,$id)
	{
		 
	
		 return $query=DB::table('users')->where('id',$id)->update([
		  'name' => $data['name'],
		  
		 'email' =>$data['email'], 
		 
		 ]);
		 
	}
	
	public function queryByid($table,$id)
	{
		$rst= new User_Model();
		 
		 //return $query=lecturers::where('lcrId',$id)->get();
		  return $query=$rst->where('id',$id)->get();
		// return $query= DB::Select('Select * from school where schId=',$id);	
		  	 		 
		   
	}
}
