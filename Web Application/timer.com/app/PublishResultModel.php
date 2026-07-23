<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PublishResultModel extends Model
{
    protected $table=['publishresults'];
	
	protected $fillable=['pubId','semId','acdId', 'updated_at','created_at'];
	
	
	public function getAll()
	{
		  $rst= new PublishResultModel();
		 return $query = DB::table('publishresults')
		 
		  ->join('semesters','semesters.semId','=','publishresults.semId')
		 
		   ->join('academic_sessions','academic_sessions.acdId','=','publishresults.acdId') 
		     
		->select('publishresults.*','semesters.semester','academic_sessions.academic_session')
		->Orderby('publishresults.pubId','Desc')
		->paginate(15);  
		 
	}
	public function getAllNoPaginate()
	{
		 $rst= new PublishResultModel();
		return $query = DB::table('publishresults')
		  ->join('semesters','semesters.semId','=','publishresults.semId')
		 
		   ->join('academic_sessions','academic_sessions.acdId','=','publishresults.acdId') 
		    
		->select('publishresults.*','semesters.semester','academic_sessions.academic_session')
		->Orderby('publishresults.pubId','Desc')
		->get();  
	
	}
	
	public function queryByid($ids,$table,$id)
	{
		 $rst= new PublishResultModel();
		return $query = DB::table('publishresults')
		  ->join('semesters','semesters.semId','=','publishresults.semId')
		  ->join('academic_sessions','academic_sessions.acdId','=','publishresults.acdId') 
		     
		->select('publishresults.*','semesters.semester','academic_sessions.academic_session')
		->where('publishresults.pubId',$id)
		->Orderby('publishresults.pubId','Desc')
		->get();  
	
	}
	
}
