<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\ResultModel;
use App\FacultyModel;

use App\DepartmentModel;
use App\SemesterModel;
use App\LevelModel;
use App\CourseModel;

use App\AcademicSessionModel;

use App\StudentModel;
use App\ActivityModel;

use App\TotalResultModel;

 use View;
use DB;
class ActivityController extends Controller
{
    
	protected $fillable=['id','details','user_Id', 'created_at','created_at'];
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function index()
	{
	
	$rst= new ActivityModel();
	 $data['query'] = $rst->getAll();
	 
	  
		   
		  
			    $data['session']= DB::table('academic_sessions')
			 
		   ->select('academic_sessions.*') 
				->orderby('academic_sessions.acdId','Desc')  
		  ->get();
		  
		 
		 
  return view('activity.index',array('query'=>$data['query'] ,'session'=>$data['session']));
	
	}
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
			  
			  
		 	  $st= new TotalResultModel();
           
		   $ids='id';
		   $table='activities';
		 
			 $data['del'] = $st->delete_table_colunms($table,$dataArray,$ids);
			  if(!empty($data['del']))
		 {
			  $st= new ActivityModel();
			 $data['query'] = $st->getAllNoPaginate();
			 
		   
                return json_encode( $data['query']);
	  
		 }
			  
			
		}
		
	}
	
}
