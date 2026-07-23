<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Validator;
use App\DepartmentModel;
class DepartmentController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new DepartmentModel();
	
	 $data['query'] = $rst->getAll();
	  
	   
	   
	 $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		
		  
		   
		    return view('department.index', array('query'=>$data['query'],'faculty'=>$data['faculty'] ));
	  
  
	
	}
	
	 public function insertform()
    {
        
		 
	   
	  $data['lecturer'] = DB::table('lecturers')
		  ->select('lecturers.*') 
		  ->get();
		   
		  
		   $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
	  
	  
	   return view('department.insert', array('faculty'=>$data['faculty'],'lecturer'=>$data['lecturer']));
	 //return view('department.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 $lcr =$dataArray[0]['cls'];
		
		$department=$dataArray[0]['optionA'];
		 
		$time_stamps =now();
		 
		$data=array(
		'falId' => $dataArray[0]['term'], 
	  //'lcrId' => $dataArray[0]['cls'], 
	'department' =>$dataArray[0]['optionA'],
	'created_at' =>$time_stamps,
	'details' =>$dataArray[0]['optionB'] );
	
		 	
			 
		$rst= new DepartmentModel();
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
	      
		   $data['query'] = $rst->insertData($data, $lcr);
		   
		   
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	public function show($id)
	{
		 
		$rst= new DepartmentModel();
		   $data['query'] = $rst->queryByid('departments',$id);
		   
		   
		   //
		   
		  /* $data['lecturer'] = DB::table('lecturers')
		  ->select('lecturers.*') 
		  ->get(); */
		   $data['lecturer'] = DB::table('lecturers')
		    ->join('departments','departments.dptId','=','lecturers.dptId') 
			 ->join('faculties','faculties.falId','=','departments.falId') 
			 ->select('lecturers.*') 
		  ->where('departments.dptId',$id)
		  ->get();
		  
		  $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
	  
	  /*
	  $data['fct'] = DB::table('faculties')
		  ->select('faculties.*')
		  ->where('falId',$id) 
		  ->get();*/
	      
		   if (!empty($data['query']))
		   {
			    
			 
			   
			    return view('department.update', array('query'=>$data['query'],'faculty'=>$data['faculty'],'lecturer'=>$data['lecturer']));
	  
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
		 
		
		$dataArray = json_decode($content, true);
	
	 
	 $data=array(
	 'falId' => $dataArray[0]['term'], 
	 'lcrId' => $dataArray[0]['cls'], 
	'department' =>$dataArray[0]['optionA'],
	'details' =>$dataArray[0]['optionB'] ,
	'dptId'=> $dataArray[0]['id']);
	 
	 
	 
		
		 //dd($request->all());	
			$rst= new DepartmentModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new DepartmentModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function searchDepartment(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('faculty');
			 $st= new DepartmentModel();
         
			 $data['query'] = $st->getSchoolByDepartment($search);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			
			
			 $st= new DepartmentModel();
       
		 
			 $data['query'] = $st->delete_table('departments',$schId);
			 
			   
			 
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
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new DepartmentModel();
        
		
		 
			 $data['query'] = $st->delete_table_colunms('departments',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
