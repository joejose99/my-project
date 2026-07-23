<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\FeesModel;
use DB;
class FeesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new FeesModel();
	
	 $data['query'] = $rst->getAll();
	 
	 
	 
	 
	 $data['program'] = DB::table('programs')
		  ->select('programs.*') 
		  ->get();
		  
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		  //dd($data['query']);
		  
		   
		    return view('fees.index', array('query'=>$data['query'],'program'=>$data['program'],'level'=>$data['level']));
	  
  
	
	}
	
	 public function insertform()
    {
        
		 
	  
	  
		  
		  
		   $data['program'] = DB::table('programs')
		  ->select('programs.*') 
		  ->get();
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
	  
	   return view('fees.insert', array('level'=>$data['level'],'program'=>$data['program']));
	 //return view('department.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		  
		 
		
		$fees=$dataArray[0]['optionA'];
		$program=$dataArray[0]['term'];
		$feesName=$dataArray[0]['optionB'];
		 
		$level=$dataArray[0]['dpt'];
		 
		 $time_stamps =now();
		
		 
		$data=array(
		'prgId' => $dataArray[0]['term'],  
	 'levId' => $dataArray[0]['dpt'],
	 'feesDetails' => $dataArray[0]['txtOptionB'],
	  'feesName' => $dataArray[0]['optionB'],
	  
	  'created_at' => $time_stamps,
	  
	'fees' =>$dataArray[0]['optionA']  );
	
		 	
			 
		$rst= new FeesModel();
		 $tm = $rst->queryByFaculty($feesName,$level,$program);
		 
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
		 
		$rst= new FeesModel();
		   $data['query'] = $rst->queryByid('fees',$id);
		   
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		  
		  
		   
		  
		  $data['program'] = DB::table('programs')
		  ->select('programs.*') 
		  ->get();
	  
	  /*
	  $data['fct'] = DB::table('faculties')
		  ->select('faculties.*')
		  ->where('falId',$id) 
		  ->get();*/
	      
		   if (!empty($data['query']))
		   {
			    
			  
			   
	return view('fees.update', array('query'=>$data['query'],'level'=>$data['level'],'program'=>$data['program']));
	  
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
	 'prgId' => $dataArray[0]['term'], 
	'feesName' => $dataArray[0]['optionB'],
	'feesDetails' => $dataArray[0]['txtOptionB'], 
	'fees' =>$dataArray[0]['optionA'],
	'levId' =>$dataArray[0]['dpt'] ,
	'feId'=> $dataArray[0]['id']);
	 
	 
	
	 
		
		 //dd($request->all());	
			$rst= new FeesModel();
	      
		    $data['query'] = $rst->editData($data,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new FeesModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function searchDepartment(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('program');
			
			 $st= new FeesModel();
         
			 $data['query'] = $st->getSchoolByDepartment($search);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function searchProgramLevel(Request $request)
	{
	if($request->ajax())
		{
		 
			$level=$request->input('levId');
			$search=$request->input('prgId');
			 $st= new FeesModel();
         
			 $data['query'] = $st->getByProgramLevel($search,$level);
			 
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	  
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new FeesModel();
       
		 
			 $data['query'] = $st->delete_table('fees',$schId);
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
		 	  $st= new FeesModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('fees',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
