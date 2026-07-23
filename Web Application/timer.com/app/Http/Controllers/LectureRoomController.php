<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Validator;

use App\CheckRoleModel;
use App\LectureRoomModel;
class LectureRoomController extends Controller
{
    
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new LectureRoomModel();
	
	 $data['query'] = $rst->getAll();
	  
	   
	   
	 $data['faculty'] = DB::table('buildings')
		  ->select('buildings.*') 
		  ->get();
		
		  
		   
		    return view('lecture room.index', array('query'=>$data['query'],'faculty'=>$data['faculty'] ));
	  
  
	
	}
	
	 public function insertform()
    {
        
		 
	   
	   
		   
		  
		   $data['faculty'] = DB::table('buildings')
		  ->select('buildings.*') 
		  ->get();
	  
	  
	   return view('lecture room.insert', array('faculty'=>$data['faculty']));
	 //return view('department.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
			 
			 $chk = new CheckRoleModel();
			 $role=$chk->index();
			 
		 
			if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	json_encode($message);
		 } 
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		// $lcr =$dataArray[0]['cls'];
		
		$department=trim($dataArray[0]['optionA']);
		 
		$time_stamps =now();
		 
		$data=array(
		'buiId' => $dataArray[0]['term'], 
	  //'lcrId' => $dataArray[0]['cls'], 
	'roomNumber' =>$dataArray[0]['optionA'],
	'created_at' =>$time_stamps,
	'capacity' =>$dataArray[0]['optionB'] );
	
		 	
			 
		$rst= new LectureRoomModel();
		 $tm = $rst->queryByFaculty($department);
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
			//dd($lcr);
	      
		   $data['query'] = $rst->insertData($data);
		   
		   
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	public function show($id)
	{
		 
		$rst= new LectureRoomModel();
		   $data['query'] = $rst->queryByid('lecturerooms',$id);
		   
		   
		   
		  
		  $data['faculty'] = DB::table('buildings')
		  ->select('buildings.*') 
		  ->get();
	  
	  /*
	  $data['fct'] = DB::table('faculties')
		  ->select('faculties.*')
		  ->where('falId',$id) 
		  ->get();*/
	      
		   if (!empty($data['query']))
		   {
			    
			 
			   
			    return view('lecture room.update', array('query'=>$data['query'],'faculty'=>$data['faculty'] ));
	  
		       //return view('faculty.update',$data);
		   }
	}

	public function edit(Request $request, $id)
	{
		//echo 'update';
		if($request->ajax())
		{
		 $dataArray=[];
		 
		 $chk = new CheckRoleModel();
			 $role=$chk->index();
			 
		 
			if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	json_encode($message);
		 } 
		 
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
	
	 
	 $data=array(
	 'buiId' => $dataArray[0]['term'], 
	 //'lcrId' => $dataArray[0]['cls'], 
	'roomNumber' =>$dataArray[0]['optionA'],
	'capacity' =>$dataArray[0]['optionB'] ,
	'romId'=> $dataArray[0]['id']);
	 
	 
	 
		
		 //dd($request->all());	
			$rst= new LectureRoomModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new LectureRoomModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function searchDepartment(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('faculty');
			 $st= new LectureRoomModel();
         
			 $data['query'] = $st->getSchoolByDepartment($search);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		    
		    $chk = new CheckRoleModel();
			 $role=$chk->index();
			 
		 
			if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	json_encode($message);
		 } 
		 
			  $schId=$request->input('quesId');
			
			
			 $st= new LectureRoomModel();
       
		 
			 $data['query'] = $st->delete_table('lecturerooms',$schId);
			 
			   
			 
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroyDepartment(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
			 
			 
			 $chk = new CheckRoleModel();
			 $role=$chk->index();
			 
		 
			if(trim($role) =='Sub Admin')
		 {
		     	$message='See Admin You have no right to make changes';
		     	 
		     return	json_encode($message);
		 } 
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new LectureRoomModel();
        
		
		 
			 $data['query'] = $st->delete_table_colunms('lecturerooms',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
