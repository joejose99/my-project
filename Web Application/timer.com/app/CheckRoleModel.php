<?php

namespace App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
use DB;
	
class CheckRoleModel extends Model
{
	protected $fillable=['name','email','role','status','password','created_at'];

     public function index()
    {
	
	 return $role =  Auth::user()->role;
		 
		
} 
}
