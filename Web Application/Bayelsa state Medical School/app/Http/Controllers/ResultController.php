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


 use View;
use DB;
class ResultController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function index()
	{
	
	$rst= new ResultModel();
	$resultType="Exam";
	 $data['query'] = $rst->getAll($resultType);
	 
	  
		 
		 $rstFaculty= new FacultyModel();
		  $rstTerm= new SemesterModel();
		  
		  
		 $rstClass = new LevelModel();
		 $rstSub= new CourseModel();
		 
		  $data['faculty']=$rstFaculty->getAll();
		   $data['term']=$rstTerm->getAll();
		  $data['class']=$rstClass->getAll();
		   $data['subjects']=$rstSub->getAll();
		   
		  
			    $data['session']= DB::table('academic_sessions')
			 
		   ->select('academic_sessions.*') 
				->orderby('academic_sessions.acdId','Desc')  
		  ->get();
		  
		 
		 
  return view('result.result',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects'],'faculty'=>$data['faculty'],'session'=>$data['session']));
	
	}
	
	
	
	
	
	
	
	public function test()
	{
	
	$resultType="Test";
	
	$rst= new ResultModel();
	 $data['query'] = $rst->getAll($resultType);
	 
	  
		 
		 $rstFaculty= new FacultyModel();
		  $rstTerm= new SemesterModel();
		  
		  
		 $rstClass = new LevelModel();
		 $rstSub= new CourseModel();
		 
		  $data['faculty']=$rstFaculty->getAll();
		   $data['term']=$rstTerm->getAll();
		  $data['class']=$rstClass->getAll();
		   $data['subjects']=$rstSub->getAll();
		   
		  
			    $data['session']= DB::table('academic_sessions')
			 
		   ->select('academic_sessions.*') 
				->orderby('academic_sessions.acdId','Desc')  
		  ->get();
		  
		 
		 
  return view('result.test',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects'],'faculty'=>$data['faculty'],'session'=>$data['session']));
	
	}
	
	
	
	
	public function assignment()
	{
	
	$resultType="Assignment";
	
	$rst= new ResultModel();
	 $data['query'] = $rst->getAll($resultType);
	 
	  
		 
		 $rstFaculty= new FacultyModel();
		  $rstTerm= new SemesterModel();
		  
		  
		 $rstClass = new LevelModel();
		 $rstSub= new CourseModel();
		 
		  $data['faculty']=$rstFaculty->getAll();
		   $data['term']=$rstTerm->getAll();
		  $data['class']=$rstClass->getAll();
		   $data['subjects']=$rstSub->getAll();
		   
		  
			    $data['session']= DB::table('academic_sessions')
			 
		   ->select('academic_sessions.*') 
				->orderby('academic_sessions.acdId','Desc')  
		  ->get();
		  
		 
		 
  return view('result.assignment',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects'],'faculty'=>$data['faculty'],'session'=>$data['session']));
	
	}
	
	
	
	
	public function writtenExam()
	{
	
	$resultType="Written Exam";
	
	$rst= new ResultModel();
	 $data['query'] = $rst->getAll($resultType);
	 
	  
		 
		 $rstFaculty= new FacultyModel();
		  $rstTerm= new SemesterModel();
		  
		  
		 $rstClass = new LevelModel();
		 $rstSub= new CourseModel();
		 
		  $data['faculty']=$rstFaculty->getAll();
		   $data['term']=$rstTerm->getAll();
		  $data['class']=$rstClass->getAll();
		   $data['subjects']=$rstSub->getAll();
		   
		  
			    $data['session']= DB::table('academic_sessions')
			 
		   ->select('academic_sessions.*') 
				->orderby('academic_sessions.acdId','Desc')  
		  ->get();
		  
		 
		 
  return view('result.writtenExam',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects'],'faculty'=>$data['faculty'],'session'=>$data['session']));
	
	}
	
	
	public function insertform_assignment()
	{
		
		  $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		 
		 $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		   
		  
		  
		  $rst= new AcademicSessionModel();
		$data['academic']=$rst->getAcademicSession();
		  
		 // $acdIds
		 
		  
		  /* $data['academic'] = DB::table('academic_sessions')
		  ->select('academic_sessions.*') 
		  ->where('academic_sessions.acdId',$acdIds)
		  ->get();
		  */
		  
		  
		    
	 return view('result.insert-assignment',array('faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester'] ,'academic'=>$data['academic']));	 
	}
	
	
	
	
	public function insertform_test()
	{
		
		  $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		 
		 $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		   
		  
		  
		  $rst= new AcademicSessionModel();
		$data['academic']=$rst->getAcademicSession();
		  
		 // $acdIds
		 
		  
		  /* $data['academic'] = DB::table('academic_sessions')
		  ->select('academic_sessions.*') 
		  ->where('academic_sessions.acdId',$acdIds)
		  ->get();
		  */
		  
		  
		    
	 return view('result.insert-test',array('faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester'] ,'academic'=>$data['academic']));	 
	}
	
	
	
	
	
	public function insert_form_written_exam()
	{
		
		  $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		 
		 $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		   
		  
		  
		  $rst= new AcademicSessionModel();
		$data['academic']=$rst->getAcademicSession();
		  
		 
		  
		  
		    
	 return view('result.insert-written-exam',array('faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester'] ,'academic'=>$data['academic']));	 
	}
	
	
	
	
	
	public function insert(Request $request)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		 
		 $content = $request->input('dataArray');
		 
		  $dataArray = json_decode($content, true);
		  
		  $stdId =$dataArray[0]['stdId'];
		   $resultType =$dataArray[0]['resultType'];
		     $cosId =$dataArray[0]['cosId'];
			  $prgId =$dataArray[0]['prgId'];
			  
			   $accId =$dataArray[0]['academic_session'];
			   
		   
		    $rst= new StudentModel();
		    $cnt= $rst->queryStudentIdCheck($stdId);
			if($cnt==0)
			{
				return json_encode('Student Id Not Found!!!');
			}	
			
			
			 $countSt = DB::table('students')
		 ->join('offerings','offerings.stdId','=','students.stdId') 
		->join('program_course','program_course.prcId','=','offerings.prcId') 
		->join('courses','courses.cosId','=','program_course.cosId') 
		 
		->select('students.stId')
		
		
		->where('courses.cosId','=',$cosId)
		->where('program_course.prgId','=',$prgId)
		->where('students.stdId','=',$stdId) 
		 ->count(); 
			
			if($countSt==0)
			{
				return json_encode('Student Not Offering this course !!!');
			}
			
			
			$created_at=now();
			$data=array( 
	
	'resultType' => $dataArray[0]['resultType'],
	'cosId' => $dataArray[0]['cosId'],
	'stdId' => $dataArray[0]['stdId'], 
	'created_at' => $created_at,
	'mark' => $dataArray[0]['mark'], 
	'acdId' => trim($dataArray[0]['academic_session']));
	  
	 $st= new ResultModel();
	  $data['st'] = $st->insertData('results',$data);
	 	   
		 
		 return json_encode('Data Successfully Saved');	  
	
			
			
			
	
		}
	}
	
	
	
	
	
	
	
	
	public function getShow($id)
	{
		
		$array = explode('_',$id);
		
		 $id=$array[0];
		  $resultType=$array[1];
		  
		$rst= new ResultModel();
		   $data['query'] = $rst->queryByid('results',$id);
		 
		 
		 
		  $data['resultType']=array('resultType' =>  $resultType);
		 
		   if (!empty($data['query']))
		   {
			    
			   
			    return view('result.edit', array('query'=>$data['query'],'resultType'=>$data['resultType']));
	  
		       
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
	
	$mark=$dataArray[0]['optionA']; 
	$rstId= $dataArray[0]['id'];
	 
	 $data=array(
	 'mark' => $dataArray[0]['optionA']);
	 $ids='rstId';
	  		$rst= new ResultModel();
	      
		   $table='results';
		    $data['query'] = $rst->edit_tables($table,$data,$ids,$id);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	
	
	
	
	
	public function postFaculty(Request $request)
	{
		$falId = $request->input('falId');
		 
		 $resultType = $request->input('resultType');
		 
		$acdId=$request->input('session');
		
			
			 $rst= new ResultModel();
	   
		   
		  // $data['rstSch']=$rstSch->where('LGA',$LGA)->orderBy('school','asc')->get();
		   
		 
		  $data['query'] = $rst->getFaculty($falId,$acdId, $resultType);
		  
		  
		  $st= new DepartmentModel();
         
			 $data['dpt'] = $st->queryByFac($falId);
			 
		  
		  
		  //$data['queryRST']= array('rstSch'=>$data['rstSch'],'query'=>$data['query']);
		  
		  //return response()->json(['success'=>'I HAVE THE DATA']);
		  
		  //return response()->json(['success'=>$rstSch]);
		  return json_encode(array('dpt'=>$data['dpt'],'query'=>$data['query']));
	}
	
	
	
	
	public function post_rst_sch(Request $request)
    {
		if($request->ajax())
		{
		
	 
	  		 
			$acdId=$request->input('session');
			$dptId=$request->input('dptId');
			 $resultType = $request->input('resultType');
			$falId = $request->input('falId');
			
			 $st= new ResultModel();

			 $data['query'] = $st->getSubmitRstBySch($acdId,$falId,$dptId,$resultType);
			  
			   
		  
          return json_encode($data['query']);
      
	 
		}
	}
	
	
	
	
	 public function postEdit(Request $request)
    {
		if($request->ajax())
		{
		
	 
	  		 
			$levId=$request->input('levId');
			$acdId=$request->input('session');
			$dptId=$request->input('dptId');
			
			 $resultType = $request->input('resultType');
			
			$falId = $request->input('falId');
			
			 $st= new ResultModel(); 

			 $data['query'] = $st->getQuestionByClassId($acdId,$falId,$dptId,$levId,$resultType);
			  
		 
                 return json_encode($data['query']);
      
	 
		}
	}
	
	
	 public function postEditTerm(Request $request)
    {
		if($request->ajax())
		{
		
	 
	  		$levId=$request->input('levId');
			$acdId=$request->input('session');
			$dptId=$request->input('dptId');
			
			$falId = $request->input('falId');
			$search = $request->input('falId');
			$semId=$request->input('semId');
			
			 $resultType = $request->input('resultType');
			
			$rst= new CourseModel();
			 $st= new ResultModel();
          
			 $data['query'] = $st->getQuestionByClassTermId($acdId,$falId,$dptId,$levId,$semId,$resultType);
			 
			 $data['course'] = $rst->getByCourseSemester($search,$levId,$dptId,$semId);
			// dd($request->all());
			//
		 
    return json_encode(array('query'=>$data['query'],'course'=>$data['course']));
      
	 
		}
	}
	 public function postEditTermSubj(Request $request)
    {
		if($request->ajax())
		{
		 
			$levId=$request->input('levId');
			$acdId=$request->input('session');
			$dptId=$request->input('dptId');
			
			$falId = $request->input('falId');
			$semId=$request->input('semId');
			
			 $resultType = $request->input('resultType');
			
			$cosId=$request->input('cosId');
			 $st= new  ResultModel();
           
			 $data['query'] = $st->getQuestionByClassTermSubjId($acdId,$falId,$dptId,$levId,$semId,$cosId,$resultType);
			 
		 
    return json_encode($data['query']);
      
	 
		}
	}
	
	
	
	public function postSearchStdId(Request $request)
	{
		if($request->ajax())
		{
			  
		 
		 
		 
		 $acdId = $request->input('session');
		 $search = $request->input('search');
		  $resultType = $request->input('resultType');
	
	$rst= new ResultModel();
	$data['query']=$rst->getSchoolByLike($search,$acdId, $resultType);
	
	return json_encode($data['query']);	
	
	}
		
	}
	
	 
	
	
	
	
	public function postEditQuestion(Request $request)
    {
		if($request->ajax())
		{
		 
			 $search=$request->input('search');
			
			
			 $st= new ResultModel();
           
			 $data['search'] = $st->getQuestionByQuestion($search);
			 
		 
    return json_encode($data['search']);
      
	 
		}
	}
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new ResultModel();
           
		 
			 $data['del'] = $st->delete_table_colunms($dataArray);
			  if(!empty($data['del']))
		 {
			  $resultType = $request->input('resultType');
			 $data['query'] = $st->getAllNoPaginate($resultType);
			 
		   
                return json_encode($data['query']);
	  
		 }
			  
			
		}
		
	}
	
	
}
 
