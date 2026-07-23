<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ActivityModel extends Model
{
    
	protected $table=['activities','users'];
	
	protected $fillable=['id','details','user_Id', 'created_at','created_at'];
	
	
	public function getAll()
	{
		  $rst= new TotalResultModel();
		 return $query = DB::table('activities')
		  ->join('users','users.id','=','activities.user_Id')
		  ->join('academic_sessions','academic_sessions.acdId','=','activities.acdId') 
		     
		->select('activities.*','users.name','academic_sessions.academic_session')
		->Orderby('activities.id','Desc')
		->paginate(15);  
		 
	}
	public function getAllNoPaginate()
	{
		 $rst= new TotalResultModel();
		 return $query = DB::table('activities')
		  ->join('users','users.id','=','activities.user_Id')
		  ->join('academic_sessions','academic_sessions.acdId','=','activities.acdId') 
		     
		->select('activities.*','users.name','academic_sessions.academic_session')
		->Orderby('activities.id','Desc')
		->get();  
	
	}
}
