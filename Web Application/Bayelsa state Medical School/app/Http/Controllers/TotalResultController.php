<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\ResultModel;
use App\FacultyModel;

use App\DepartmentModel;
use App\SemesterModel;
use App\LevelModel;
use App\CourseModel;

use App\TotalCourseModel;

use App\TotalResultModel;
use App\AcademicSessionModel;


use App\StudentModel;

 use View;
use DB;
class TotalResultController extends Controller
{
    
	protected $fillable=['id','details','user_Id', 'created_at','created_at','acdId'];
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function index()
	{
	
	$rst= new TotalResultModel();
	 $data['query'] = $rst->getAll();
	 
	 
	 
	 /*   foreach ($data['query'] as $hm):
	 
	  echo  $hm->question;
	 echo'<br>';
        
		 endforeach ; */
		 
		// $role = trim(Auth::user()->role);
	  //$data['role'] = array('role'=>$role);
		 //,'role'=>$data['role']
		 
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
		  
		 
		 
  return view('total result.index',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects'],'faculty'=>$data['faculty'],'session'=>$data['session']));
	
	}
	
	
	public function postFaculty(Request $request)
	{
		$falId = $request->input('falId');
		 
		$acdId=$request->input('session');
		
			
			 $rst= new TotalResultModel();
	   
		   
		  // $data['rstSch']=$rstSch->where('LGA',$LGA)->orderBy('school','asc')->get();
		   
		 
		  $data['query'] = $rst->getFaculty($falId,$acdId);
		  
		  
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
			
			$falId = $request->input('falId');
			
			 $st= new TotalResultModel();

			 $data['query'] = $st->getSubmitRstBySch($acdId,$falId,$dptId);
			  
			   
		  
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
			
			$falId = $request->input('falId');
			
			 $st= new TotalResultModel(); 

			 $data['query'] = $st->getQuestionByClassId($acdId,$falId,$dptId,$levId);
			  
		 
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
			
			$rst= new CourseModel();
			 $st= new TotalResultModel();
          
			 $data['query'] = $st->getQuestionByClassTermId($acdId,$falId,$dptId,$levId,$semId);
			 
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
			
			$cosId=$request->input('cosId');
			 $st= new  TotalResultModel();
           
			 $data['query'] = $st->getQuestionByClassTermSubjId($acdId,$falId,$dptId,$levId,$semId,$cosId);
			 
		 
    return json_encode($data['query']);
      
	 
		}
	}
	
	
	
	
	 public function migrateResult(Request $request)
    {
		if($request->ajax())
		{
		 
			$levId=$request->input('levId');
			$acdId=$request->input('session');
			$dptId=$request->input('dptId');
			
			$falId = $request->input('falId');
			$semId=$request->input('semId');
			
			$cosId=trim($request->input('cosId'));
			 $st= new  TotalResultModel();
           
			 $data['query'] = $st->setMigrationResult($acdId,$falId,$dptId,$levId,$semId,$cosId);
			 
		 
    return json_encode('Successfully Migrated');
      
	 
		}
	}
	
	
	
	
	
	public function postEditQuestion(Request $request)
    {
		if($request->ajax())
		{
		 
			 $search=$request->input('search');
			
			
			 $st= new TotalResultModel();
           
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
			  
			  
		 	  $st= new TotalResultModel();
           
		   $ids='totId';
		   $table='totalresults';
		 
			 $data['del'] = $st->delete_table_colunms($table,$dataArray,$ids);
			  if(!empty($data['del']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
			 
		   
                return json_encode( $data['query']);
	  
		 }
			  
			
		}
		
	}
	
	
	public function postSearchStdId(Request $request)
	{
		if($request->ajax())
		{
			  
		 
		 
		 
		 $acdId = $request->input('session');
		 $search = $request->input('search');
	
	$rst= new TotalResultModel();
	$data['query']=$rst->getSchoolByLike($search,$acdId);
	
	return json_encode($data['query']);	
	
	}
		
	}
	
	
	
	public function postStdId(Request $request)
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
			
			
			 $data['query'] = DB::table('students')
		 ->join('results','results.stdId','=','students.stdId') 
		 ->join('courses','courses.cosId','=','results.cosId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId')
		->select('results.*','students.stdId','students.fName','students.surname','courses.cosId','courses.course','academic_sessions.academic_session')
		
		
		->where('courses.cosId','=',$cosId) 
		->where('students.stdId','=',$stdId) 
		 ->get(); 
		 
		 return json_encode($data['query']);	
		 
	}	
	}	
	
	
	public function insert_total_result()
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
		  
		 
		  
		  
		    
	 return view('total result.insert',array('faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester'] ,'academic'=>$data['academic']));	 
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
			
			
			 $counts = DB::table('totalresults') 
		->select('*')
		 
		->where('cosId','=',$cosId)
		->where('stdId','=',$stdId)
		->where('acdId','=',$accId) 
		 ->count(); 
			
		if($counts > 0)
			{
				return json_encode('Data Existed Aready !!!');
			}	
			
			$created_at=now();
			$data[]=array('cosId' => $dataArray[0]['cosId'],
	'stdId' => $dataArray[0]['stdId'], 
	'mark' => $dataArray[0]['mark'],
	'grade' => $dataArray[0]['grade'],
	'status' => 'Publish',
	'acdId' => trim($dataArray[0]['academic_session']),
	'created_at' => $created_at);
	  
	  // dd($data);
	  
	 $st= new TotalResultModel();
	  $data['st'] = $st->insertData('totalresults',$data);
	 	   
		 
		 return json_encode('Data Successfully Saved');	  
	
			
			
			
	
		}
	}
	
	
	
	public function getShow($id)
	{
		
		 
		  
		$rst= new TotalResultModel();
		$ids='totId';
		   $data['query'] = $rst->queryByid($ids,'totalresults',$id);
		 
		 
		 
		   
		 
		   if (!empty($data['query']))
		   {
			    
			   
			    return view('total result.edit', array('query'=>$data['query']));
	  
		       
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
	
	$stdId= $dataArray[0]['stdId'];
	$oldMak= $dataArray[0]['oldMak'];
	 
	 
	 $userId=$dataArray[0]['userId'];
	  $userName=$dataArray[0]['userName'];
	 
	 $prev='<strong> Previous Mark:</strong> ';
	 
	 
	 
	
	 
	 
	 
	 $data=array(
	 'mark' => $dataArray[0]['optionA'],
	 'grade' => $dataArray[0]['grade']);
	 $ids='totId';
	  		$rst= new ResultModel();
	      
		   $table='totalresults';
		    $data['query'] = $rst->edit_tables($table,$data,$ids,$id);
			
			
		
		 $data['session']= DB::table('academic_sessions')
			 
		   ->select('academic_sessions.*') 
				->orderby('academic_sessions.acdId','Desc')  
		  ->get();	
		  
		   
		  $acdId=$data['session'][0]->acdId;
			
			
			
		   if(!empty($data['query']))
		 {
		  
		  
	if(trim($oldMak) != trim($mark))
	 {
	     $details= $userName.' made the following changes to this Student '.'<br>'.'<strong>Student Id:</strong> '.$stdId.'<br> '.$prev.$oldMak.'<br>'.'<strong>New Mak:</strong> '.$mark.'<br>'.'<strong>Date:</strong> '.now();
	
	
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
	
	
}
 

