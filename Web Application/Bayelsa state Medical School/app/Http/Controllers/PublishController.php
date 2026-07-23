<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\DepartmentModel;
use App\SemesterModel;
use App\LevelModel;
use App\CourseModel;

use App\AcademicSessionModel;

use App\StudentModel;
use App\ActivityModel;

use App\TotalResultModel;
use App\ResultModel;


use App\PublishResultModel;

 use View;
use DB;
class PublishController extends Controller
{
  protected $fillable=['id','details','user_Id', 'created_at','created_at','pubId','date','semId'];
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function index()
	{
	
	$rst= new PublishResultModel();
	 $data['query'] = $rst->getAll();
	 
	  
		   
		  
			    $data['session']= DB::table('academic_sessions')
			 
		   ->select('academic_sessions.*') 
				->orderby('academic_sessions.acdId','Desc')  
		  ->get();
		  
		  
		  
		// dd( $data['query']);
		 
  return view('publish result.index',array('query'=>$data['query'] ,'session'=>$data['session']));
	
	}
	
	
	
	
	
	public function insert_publish_result()
	{
		
		   
		 
		 $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		   
		  
		  
		  $rst= new AcademicSessionModel();
		$data['academic']=$rst->getAcademicSession();
		  
		 
		  
		  
		    
	 return view('publish result.insert',array('semester'=>$data['semester'] ,'academic'=>$data['academic']));	 
	}
	
	
	
	
	
	
	
	public function insert(Request $request)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		 
		 $content = $request->input('dataArray');
		 
		  $dataArray = json_decode($content, true);
		  
		  $semId =$dataArray[0]['semId'];
		   $acdId =$dataArray[0]['acdId'];
		     $date =$dataArray[0]['date'];
		 
		     
			
			
			 $countSt = DB::table('publishresults')
		  
		 
		->select('publishresults.*')
		
		
		->where('publishresults.semId','=',$semId)
		->where('publishresults.acdId','=',$acdId)
		 
		 ->count(); 
			
			if($countSt>0)
			{
				return json_encode('Data Existed Already !!!');
			}
			
			
			 
			
			$created_at=now();
			$data[]=array('semId' => $dataArray[0]['semId'],
	'date' => $dataArray[0]['date'],  
	'acdId' => trim($dataArray[0]['acdId']),
	'created_at' => $created_at);
	  
	  // dd($data);
	  
	 $st= new TotalResultModel();
	  $data['st'] = $st->insertData('publishresults',$data);
	 	   
		 
		 return json_encode('Data Successfully Saved');	  
	
			
			
			
	
		}
	}
	
	
	
	
	
	public function getShow($id)
	{
		
		 
		  
		$rst= new PublishResultModel();
		
		$ids='pubId';
		
		 
		   $data['query'] = $rst->queryByid($ids,'publishresults',$id);
		 
		 
		// dd($data['query']);
		   
		    $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		   
		 
		   if (!empty($data['query']))
		   {
			    
			   
			    return view('publish result.edit', array('query'=>$data['query'],'semester'=>$data['semester']));
	  
		       
		   }
	}

	public function edit(Request $request, $id)
	{
		 
		if($request->ajax())
		{
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		$time_stamps =now();
		$dataArray = json_decode($content, true);
	
	$date=$dataArray[0]['date']; 
	$pubId= $dataArray[0]['id'];
	$oldDate=$dataArray[0]['oldDate']; 
	$semId= $dataArray[0]['semId'];
	$acdId= $dataArray[0]['acdId'];
	 
	 
	 $userId=$dataArray[0]['userId'];
	  $userName=$dataArray[0]['userName'];
	 
	 $prev='<strong> Previous Date:</strong> ';
	 
	 
	 
	
	 
	 
	 
	 $data=array(
	 'date' => $dataArray[0]['date'],
	 'semId' => $dataArray[0]['semId'],
	 'acdId' => $dataArray[0]['acdId']);
	 $ids='pubId';
	  		$rst= new ResultModel();
	      
		   $table='publishresults';
		   
		    
		    $data['query'] = $rst->edit_tables($table,$data,$ids,$id);
			
			
		
		 $data['session']= DB::table('academic_sessions')
			 
		   ->select('academic_sessions.*') 
				->orderby('academic_sessions.acdId','Desc')  
		  ->get();	
		  
		   
		  $acdId=$data['session'][0]->acdId;
			
			
			
		   if(!empty($data['query']))
		 {
		  
		  
	if(trim($oldDate) != trim($date))
	 {
	     $details= $userName.' made the following changes to Result Publish Date '.'<br>'.$prev.$oldDate.'<br>'.'<strong>New Date:</strong> '.$date.'<br>'.'<strong>Changes occure on Date:</strong> '.now();
	
	
	 $data=array(
	 'details' => $details,
	 'user_Id' => $userId,
	 'acdId' => $acdId,
	 'updated_at' => now());
	 
	
	 
	   DB::table('activities')->insert($data);
	  
	   
	
	 }
		  
		  
		  
		 
		  
		  }
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
			  
			 $id= $dataArray[0]['schId'];
			  $acdId= $request->input('acdId');
			  
			   
			  
			   $data['publish']= DB::table('publishresults')
			 
		   ->select('*') 
				->where('pubId',$id)  
		  ->get();	
		  
		  //  dd( $data['publish']);
		     
		   
		  $date=$data['publish'][0]->date;
			 
			
			  
			$userName=Auth::user()->name;  
			$userId=Auth::user()->id;  
			  
			  
		 	  $st= new TotalResultModel();
           
		   $ids='pubId';
		   $table='publishresults';
		 
			 $data['del'] = $st->delete_table_colunms($table,$dataArray,$ids);
			 
			 
			  if(!empty($data['del']))
		 {
			  $st= new PublishResultModel();
			 $data['query'] = $st->getAllNoPaginate();
			 
			 
			 
			  $details= $userName.' Deleted Result Publish Date '.'<strong>Stated Date:</strong> '.$date.'<br>'.'<strong>Changes occure on Date:</strong> '.now();
	
	
	 $dataActivities=array(
	 'details' => $details,
	 'user_Id' => $userId,
	 'acdId' => $acdId,
	 'updated_at' => now());
	 
	
	 
	   DB::table('activities')->insert($dataActivities);
		   
                return json_encode($data['query']);
	  
		 }
			  
			
		}
		
	}
	
}
