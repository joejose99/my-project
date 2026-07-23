<?php

namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
use DB;
use View;
use Validator;

use App\BuildingModel;
class BuildingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new BuildingModel();
	
	 $data['query'] = $rst->getAll();
	 
	 
	 
	 
	 $data['building'] = DB::table('buildings')
		  ->select('buildings.*') 
		  ->get();
		  
		  
		  
		  //dd($data['query']);
		  
		   
		    return view('building.index', array('query'=>$data['query'],'building'=>$data['building']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		   
	  
	  $data['lecturer'] = DB::table('buildings')
		    //->join('positions','positions.lcrId','=','lecturers.lcrId') 
			 //->join('faculties','faculties.falId','=','positions.falId') 
			 ->select('buildings.*') 
		  
		  ->get();
		  
		  return view('building.insert', array('lecturer'=>$data['lecturer']));
	  
	  
	 //return view('faculty.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 
		  
		  
		 
		$faculty= $dataArray[0]['optionA'];
		 
		 $time_stamps=now();
		$data=array(
	// 'lcrId' => $dataArray[0]['cls'], 
	'building' =>$dataArray[0]['optionA'],
	'description' =>$dataArray[0]['optionB'], 
	'created_at' =>$time_stamps );
	
		 	
			 
		$rst= new BuildingModel();
		 $tm = $rst->queryByFaculty($faculty);
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
	      
		   $data['query'] = $rst->insertData($data);
		   
		   
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	public function show($id)
	{
		 
		$rst= new BuildingModel();
		   $data['query'] = $rst->queryByid('faculties',$id);
		  /* 
		   $data['lecturer'] = DB::table('lecturers')
		  ->select('lecturers.*') 
		  ->get();
		  */
		  
		  
		   
		  
		   if (!empty($data['query']))
		   {
			    
			  /*   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->school ;
	          echo'<br>'; 
        
		       endforeach; */ 
			   
			    return view('building.update', array('query'=>$data['query']));
	  
		       //return view('faculty.update',$data);
		   }
	}

	public function edit(Request $request, $id)
	{
		//echo 'update';
		if($request->ajax())
		{
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		$time_stamps =now();
		$dataArray = json_decode($content, true);
	
	//$lcr=$dataArray[0]['cls']; 
	$falId= $dataArray[0]['id'];
	
	 
	 
	 
	 
	 
	 $data=array(  
	'building' =>$dataArray[0]['optionA'],
	'description' =>$dataArray[0]['optionB'] ,
	'created_at' =>$time_stamps  ,    
	'buiId'=> $dataArray[0]['id']);
	 
	 
	
	 //dd($strPos);
		
		
		//dd(substr($contents,8,2));
		
		
		
			$rst= new BuildingModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new BuildingModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new BuildingModel();
       
		 
			 $data['query'] = $st->delete_table('buildings',$schId);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroyLecturer(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new BuildingModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('buildings',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
