<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use View;
use Validator;

use App\LecturerModel;
class LecturerController extends Controller
{
    //
	
	
	 public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new LecturerModel();
	 $data['query'] = $rst->getAll();
	  
  
  
  
    $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  //dd($data['query']);
		  
		 
		   
		    return view('lecturer.index', array('query'=>$data['query'],'faculty'=>$data['faculty']));
	  
	
	}
	
	 public function insertform()
    {
        
		 
	  
	   $data['dpt'] = DB::table('departments')
		  ->select('departments.*')  
		    ->where('departments.department' ,'<>','NA')  
		  ->get();
			   
		      // return view('lecturer.update',$data);
			   
	 return view('lecturer.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		  //dd($dataArray);
		 
		$time_stamps =now();
		
		$data=array(
	'state' => $dataArray[0]['term'], 
	'LGA' => $dataArray[0]['cls'],
	 'dptId' => $dataArray[0]['dptId'],
	'fName' =>$dataArray[0]['optionA'],
	'gender' =>$dataArray[0]['gender'],
	'title' =>$dataArray[0]['title'],
	'surname' =>$dataArray[0]['optionB'],
	'midName' => $dataArray[0]['optionC'], 
	'email'=> $dataArray[0]['optionD'],
	'address'=> $dataArray[0]['txtAddress'],
	'mobileNo'=> $dataArray[0]['txtPhone'],
	'dateOfBirth'=> $dataArray[0]['txtBirth'],
	'nextOfKin'=> $dataArray[0]['txtNextKinName'],
	'nextOfKinMobile'=> $dataArray[0]['txtNextKinPhone'],
	'nextOfKinAddress'=> $dataArray[0]['txtNextKinAddress'],
	'created_at'=> $time_stamps);
	
			
		 
			$rst= new LecturerModel();
	      
		   $data['query'] = $rst->insertData($data);
		   
		  
		   return json_encode('Succcess');
             //return json_encode($data['query']);
		 
		   
			
		}
	}
	
	public function show($id)
	{
		 
		$rst= new LecturerModel();
		   $data['query'] = $rst->queryByid('lecturers',$id);
		   if (!empty($data['query']))
		   {
			  
			   $data['dpt'] = DB::table('departments')
		  ->select('departments.*')  
		   ->where('departments.department' ,'<>','NA') 
		  ->get();
			   
		      // return view('lecturer.update',$data);
			   return view('lecturer.update',array('query'=>$data['query'],'dpt'=>$data['dpt']));
			   
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
	
	 $time_stamps =now();
	 $data=array(
	'state' => $dataArray[0]['term'], 
	'LGA' => $dataArray[0]['cls'],
	 'dptId' => $dataArray[0]['dptId'], 
	'fName' =>$dataArray[0]['optionA'],
	'surname' =>$dataArray[0]['optionB'],
	'midName' => $dataArray[0]['optionC'], 
	'email'=> $dataArray[0]['optionD'],
	'address'=> $dataArray[0]['txtAddress'],
	'mobileNo'=> $dataArray[0]['txtPhone'],
	'dateOfBirth'=> $dataArray[0]['txtBirth'],
	'nextOfKin'=> $dataArray[0]['txtNextKinName'],
	'nextOfKinMobile'=> $dataArray[0]['txtNextKinPhone'],
	'nextOfKinAddress'=> $dataArray[0]['txtNextKinAddress'],
	'updated_at'=> $time_stamps,
	'lcrId'=> $dataArray[0]['id']);
	 
	 
	 
		
		 //dd($request->all());	
			$rst= new LecturerModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new LecturerModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	
	
	
	
	public function searchFaculty(Request $request)
	{
		if($request->ajax())
		{
		 
		 
		
		 $rst= new LecturerModel();
		 
		 
			 $falId=$request->input('faculty');
			 
			 $data['query'] = $rst->getSchoolByDepartment($falId);
			
			 
		  
		  
		  $data['rstDpt'] = DB::table('departments')
		  ->select('departments.*')
		    ->where('departments.department' ,'<>','NA')  
		  ->where('departments.falId',$falId)
		  ->get();
		  
		  
		   
		  
		 
		   
		  return json_encode(array('query'=>$data['query'],'rstDpt'=>$data['rstDpt']));
		   
		   
		  
		}
	}
	
	public function searchDepartment(Request $request)
	{
		if($request->ajax())
		{
		  
		 $rst= new LecturerModel();
			 $falId=$request->input('faculty');
			  $dptId=$request->input('department');
			 
			 /* 
			   $data['query']= DB::table('lecturers')
			 ->join('programs','programs.prgId','=','lecturers.prgId')	 
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   */
		    
			 $data['query']= $rst->getSchoolByFalDepartment($falId,$dptId);
			 
		  
		  $data['rstDpt'] = DB::table('programs')
		  ->select('programs.*')
		   ->where('programs.dptId',$dptId)   
		  ->get();
		  //dd($data['query']);
		  
		 
		   return json_encode(array('query'=>$data['query'],'rstDpt'=>$data['rstDpt']));
		  
		    
		}
	}
	public function searchProgram(Request $request)
	{
		if($request->ajax())
		{
		 
		  
		 $rst= new LecturerModel();
			 $falId=$request->input('faculty');
			  $dptId=$request->input('department');
			  $prgId=$request->input('program');
			  
			  /*
			   $data['query']= DB::table('lecturers')
			 ->join('programs','programs.prgId','=','lecturers.prgId')	 
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   */
		     
			  $data['query']= $rst->getSchoolByFalDepartmentPrg($falId,$dptId,$prgId);
		  
		  
		   
		  
		 return json_encode(array('query'=>$data['query']));
		  
		   
		     
		}
	}
	  
	
	
	
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new LecturerModel();
       
		 
			 $data['query'] = $st->delete_table('lecturers',$schId);
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
		 	  $st= new LecturerModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('lecturers',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}

public function searchStById(Request $request)
	{
	if($request->ajax())
		{
		 
			$id=$request->input('stdId');
			
			
			 $data['query'] = DB::table('lecturers')
		    ->join('lectures','lectures.lcrId','=','lecturers.lcrId')  
			->join('courses','courses.cosId','=','lectures.cosId')
			->join('departments','departments.dptId','=','courses.dptId')    
			 ->select('lecturers.*','courses.course','courses.cosId','departments.department') 
		  ->where('lecturers.lcrId',$id)
		  ->get();
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}

}
