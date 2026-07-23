<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use App\QuestionModel;

 use View;

  use DB;
  /*
  use App\Term;
 use App\Subjects;
 use App\Classes;
 use App\Students;
 */
 
 use Validator;
class QuestionController extends Controller
{
  
   public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	
	public function index()
	{
		
		$rst= new QuestionModel();
	 $data['query'] = $rst->getAll();
	 
	 /*   foreach ($data['query'] as $hm):
	 
	  echo  $hm->question;
	 echo'<br>';
        
		 endforeach ; */
		 
		   
		 
		// $rstTerm= new Term();
		
		 
		 
		    
		  
		    $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		    
		 
		 return view('question.question',array('query'=>$data['query'],'faculty'=>$data['faculty']));
		 
		 
// return view('school.question.question',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects']));
	
	}
	
	 public function postEdit(Request $request)
    {
		if($request->ajax())
		{
		
	 
	  		 
			$clsId=$request->input('clsId');
			 $st= new QuestionModel();

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
			
			
			 $st= new QuestionModel();
          
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
			
			
			 $st= new QuestionModel();
           
			 $data['query'] = $st->getQuestionByClassTermSubjId($clsId,$termId,$subjId);
			 
		 
    return json_encode($data['query']);
      
	 
		}
	}
	public function postEditQuestion(Request $request)
    {
		if($request->ajax())
		{
		 
			 $search=$request->input('search');
			
			
			 $st= new QuestionModel();
           
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
		    
	 return view('question.insert',array('faculty'=>$data['faculty']));	 
		 
	  
	// return view('school.question.insert');
	 
    }
	

	 
	 
	 public function setCourses(Request $request)
	{
		
		if($request->ajax())
		{
		    
		   
		 
		 $falId = $request->input('falId');
		 
		  $dptId = $request->input('dptId');
		  $cosId=$request->input('subjects');
		  
		   $rst= new QuestionModel();
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
		  
		  
		  
		   $rst_cnt= new QuestionModel();
		   
		    $cls =$dataArray[0]['cls'];
	 $term =$dataArray[0]['term'];
	$subjId= $dataArray[0]['subject'];
	$year = $dataArray[0]['year'];
	 $month = $dataArray[0]['month'];
	$question = $dataArray[0]['ckview'];
	 
	$optionA  =$dataArray[0]['optionA'];
	$optionB  =$dataArray[0]['optionB'];
		   
			
	     $sub = $rst_cnt->queryByOption($question,$optionA,$optionB,$cls, $term,$subjId,$year,$month);
		 
		 $cnt= $sub;
		 
		   
		  
		  if($cnt > 0)
		  {
			   
			   return json_encode('Data Existed Already !!!');
		  }
		  else
		  {
		    
			 
			  $data=array(
	//'cls' => $dataArray[0]['cls'],
	//'dptId' => $dataArray[0]['term'],
	'cosId' => $dataArray[0]['subject'],
	'year' => $dataArray[0]['year'],
	'month' => $dataArray[0]['month'],
	'question' =>  $dataArray[0]['ckview'],
	'optionA' =>$dataArray[0]['optionA'],
	'optionB' =>$dataArray[0]['optionB'],
	'optionC' => $dataArray[0]['optionC'],
	'optionD' => $dataArray[0]['optionD'],
	'optionE' => $dataArray[0]['optionE'],
	'answer' => $dataArray[0]['answer'],
	'mark'=> $dataArray[0]['mark']);
	  
	 $st= new QuestionModel();
	  $data['st'] = $st->insertData('questions',$data);
	 	  //return response()->json(['success'=>$data]);
		 
		 return json_encode('success');	  
	
		  }
	
		}
	}
	
	
	
	public function getShow($id)
	{
		 
		   
		   
		    $rst= new QuestionModel();
		   $data['query'] = $rst->queryByid('questions',$id);
		   
		   
		    
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
		    
	 return view('question.update',array('query'=>$data['query'],'faculty'=>$data['faculty'] ));
		   
		    
	}
	
	
	public function edit(Request $request,$id)
	{
	
	 
	$dataArray=[];
		 
		 $content = $request->input('dataArray');
		 
		  $dataArray = json_decode($content, true);
		   
		    //dd($request->all());
			 
			  $data=array(
	'cls' => trim($dataArray[0]['cls']),
	'term' => trim($dataArray[0]['term']),
	'subject' => trim($dataArray[0]['subject']),
	 'month' => trim($dataArray[0]['month']),
	'year' => trim($dataArray[0]['year']),
	'details' =>  trim($dataArray[0]['ckview']),
	'optionA' => trim($dataArray[0]['optionA']),
	'optionB' =>trim($dataArray[0]['optionB']),
	'optionC' => trim($dataArray[0]['optionC']),
	'optionD' => trim($dataArray[0]['optionD']),
	'optionE' => trim($dataArray[0]['optionE']),
	'answer' => trim($dataArray[0]['answer']),
	'id' => $dataArray[0]['id'],
	'mark'=> trim($dataArray[0]['mark']));
	
	 $id=$dataArray[0]['id'];
	    //dd($request->all(),$id);
		
		 $rst=new QuestionModel();
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
			
			
			 $st= new QuestionModel();
        
		 
			 $data['query'] = $st->delete_table('questions',$quesId);
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
		 	  $st= new QuestionModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('questions',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
		}
		
	}
	
}
