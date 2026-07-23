<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;

use View;
use Validator;
use App\ExamTestModel;
class ExamTestController extends Controller
{
	
	
	
	 public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	
	public function index()
	{
		
		$rst= new ExamTestModel();
	 $data['query'] = $rst->getAll();
	 
	  
		 
		 
		    
		  
		    $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		    
		 
		 return view('set up exam.index',array('query'=>$data['query'],'faculty'=>$data['faculty']));
		 
		 
// return view('school.question.question',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects']));
	
	}
	
	public function postEdit(Request $request)
    {
		if($request->ajax())
		{
		
	 
	  		 
			$clsId=$request->input('clsId');
			 $st= new ExamTestModel();

			 $data['query'] = $st->getQuestionByClassId($clsId);
			  
			  $data['rstDpt'] = DB::table('departments')
		  ->select('departments.*') 
		  ->where('falId',$clsId) 
		  ->get();
		 
    //return json_encode( $data['querycls']);
	
	return json_encode(array('query'=>$data['query'],'rstDpt'=>$data['rstDpt'] ));
    
      
	 }
		}
	
	 public function postEditTerm(Request $request)
    {
		if($request->ajax())
		{
		
	 
	  		 
			$clsId=$request->input('clsId');
			$termId=$request->input('terms');
			
			
			 $st= new ExamTestModel();
          
			 $data['query'] = $st->getQuestionByClassTermId($clsId,$termId);
			// dd($request->all());
		 
     $data['rstDpt'] = DB::table('courses')
		  ->select('courses.*') 
		  ->where('dptId',$termId) 
		  ->get();
		 
    //return json_encode( $data['querycls']);
	
	return json_encode(array('query'=>$data['query'],'rstDpt'=>$data['rstDpt'] ));
      
	 
		}
	}
	 public function postEditTermSubj(Request $request)
    {
		if($request->ajax())
		{
		 
			$clsId=$request->input('clsId');
			$termId=$request->input('terms');
			$subjId=$request->input('subjects');
			
			
			 $st= new ExamTestModel();
           
			 $data['query'] = $st->getQuestionByClassTermSubjId($clsId,$termId,$subjId);
			 
		 
    return json_encode($data['query']);
      
	 
		}
	}
	
	
	
	public function postEditQuestion(Request $request)
    {
		if($request->ajax())
		{
		 
			 $search=$request->input('search');
			
			
			 $st= new ExamTestModel();
           
			 $data['search'] = $st->getQuestionByQuestion($search);
			 
		 
    return json_encode($data['search']);
      
	 
		}
	}
	
	
    public function getInsertform()
    {
        
		 
		  
		  $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		 /*
		  $rstTerm= new Term();
		 $rstClass = new Classes();
		 $rstSub= new Subjects();
		 
		   
		  $data['term']=$rstTerm->getAll();
		  $data['class']=$rstClass->getAll();
		   $data['subjects']=$rstSub->getAll();
		  */
		    
	 return view('set up exam.insert',array('faculty'=>$data['faculty']));	 
		 
	  
	// return view('school.question.insert');
	 
    }
	

	 
	 
	 public function setCourses(Request $request)
	{
		
		if($request->ajax())
		{
		    
		   
		 
		 $falId = $request->input('falId');
		 
		  $dptId = $request->input('dptId');
		  $cosId=$request->input('subjects');
		  
		   $rst= new ExamTestModel();
		  $data=$rst->getQeuryByCourses($dptId,$falId);
		  
		   return json_encode($data);	 
		  
		  }
		  
		  
	}
		  
	public function setInsertform(Request $request)
	{
		
		if($request->ajax())
		{
		    
		  $dataArray=[];
		 
		 $content = $request->input('dataArray');
		 
		  $dataArray = json_decode($content, true);
		  
		  
		  
		   $rst_cnt= new ExamTestModel();
		   
		    
	$subjId= $dataArray[0]['subject'];
	  
	$examTest = $dataArray[0]['section'];
	
	 
	$quesNo =$dataArray[0]['quesNo']; 
	
	$date =$dataArray[0]['date']; 
	
	
	  $counts= DB::table('questions')
		 ->where('cosId',$subjId) 
		->count();
	$qeusInt =(int)$quesNo;
	
	if($counts < $qeusInt)
	{
		
	    return json_encode('No of Question Enter is greater than Avalable Questions !!! '.$counts );
	}
		
		 
		   
			
	     $sub = $rst_cnt->queryByOption($examTest,$subjId);
		 
		 $cnt= $sub;
		 
		   
		  
		  if($cnt > 0)
		  {
			   
			   return json_encode('Data Existed Already !!!');
		  }
		  else
		  {
		    
			 $time_stamps =now();
			  $data=array(
	//'cls' => $dataArray[0]['cls'],
	//'dptId' => $dataArray[0]['term'],
	'cosId' => $dataArray[0]['subject'],  
	'examTest' => $dataArray[0]['section'],  
	'duration' => $dataArray[0]['duration'],  
	'quesNo' =>$dataArray[0]['quesNo'],
	'markPerQuestion' => $dataArray[0]['markPerQuestion'],
	'created_at' => $time_stamps,
	'date' => $dataArray[0]['date']);
	  
	 $st= new ExamTestModel();
	  $data['st'] = $st->insertData('setexamtestdates',$data);
	 	  //return response()->json(['success'=>$data]);
		 
		 return json_encode('success');	  
	
		  }
	
		}
	}
	
	
	
	public function getShow($id)
	{
		 
		   
		   
		    $rst= new ExamTestModel();
		   $data['query'] = $rst->queryByid('setexamtestdates',$id);
		   
		   
		    
		   /*
		     $rstTerm= new Term();
		 $rstClass = new Classes();
		 $rstSub= new Subjects();
		 
		   
		  $data['term']=$rstTerm->getAll();
		  $data['class']=$rstClass->getAll();
		   $data['subjects']=$rstSub->getAll();
		  
		  */
		  
		   
		  $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		    
	 return view('set up exam.update',array('query'=>$data['query'],'faculty'=>$data['faculty'] ));
		   
		    
	}
	
	
	public function edit(Request $request,$id)
	{
	
	 
	$dataArray=[];
		 
		 $content = $request->input('dataArray');
		 
		  $dataArray = json_decode($content, true);
		   
		    //dd($request->all());
			 
			  $data=array(
	'cosId' => $dataArray[0]['subject'],  
	'examTest' => $dataArray[0]['section'], 
	'duration' => $dataArray[0]['duration'],  
	'quesNo' =>$dataArray[0]['quesNo'],
	'markPerQuestion' => $dataArray[0]['markPerQuestion'],
	'date' => $dataArray[0]['date']); 
	
	// $id=$dataArray[0]['id'];
	    //dd($request->all(),$id);
		
		 $rst=new ExamTestModel();
		   $data['edit']=$rst->edit_tables($data,$id);
		 
		   
		   
		 if(!empty($data['edit']))
		 {
		 	 	 
		  return json_encode('success');
				 
				 
		 }  
		  
		  //return json_encode('success');
	} 
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
		   
			  $quesId=$request->input('quesId');
			
			
			 $st= new ExamTestModel();
        
		 
			 $data['query'] = $st->delete_table('setexamtestdates',$quesId);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
		 
		}
      
	}
	public function destroyQuestion(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new ExamTestModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('setexamtestdates',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
		}
		
	}
	
}