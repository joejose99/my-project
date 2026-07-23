<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
 use View;
 use App\QuestionModel;
 use Illuminate\Database\Eloquent\Model;
 
 use App\SubmitResult;
 use DB;
  use App\TimeTableModel;
 use App\DepartmentModel;
 use  App\CourseModel;
 use App\FacultyModel;
 use App\StudentModel;
 
  use App\ResultModel;
  
  
class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	 
	public function index(Request $request)
	{
		  Log::info(Input::all());
			  Log::error(Input::all());
			  error_log(Input::all());
		     $data=Request::all();
		 
		 
		 if($request->ajax())
		{
			return response()->json($data);
			 
		}  
		
	}
	
	
	public function getResult()
	{
	   
			  
			 
	}
	
	
	
	 public function insertResult(Request $request)
	{
		  
		  
		   
		  
		 if($request->ajax())
		{
		   
     $dataArray=[];
		
		$content = $request->input('dataArray');
		
		$dataArray = json_decode($content, true);
		 $numb=count($dataArray);
			   
			  $ctr=0;
			  $addMark=0;
			  $noPass=0;
			 // for($i = 0; $i < $numb; $i++)
			 
			 
			 while($ctr < $numb)
			 {
			   
			  $DBAnswer= $dataArray[$ctr]['DBAnswer']; 
			   $mark=  $dataArray[$ctr]['mark'];
			$DBAnswer =  trim($dataArray[$ctr]['DBAnswer']);
			$UserAns =  trim($dataArray[$ctr]['UserAns']);
			$cosId =  $dataArray[$ctr]['SubjectId'];
			$levId =  $dataArray[$ctr]['ClassId'];
			$semId=  $dataArray[$ctr]['TermId'];
			
			$StudentId=  $dataArray[$ctr]['StudentId'];
			$NewStudentId=  $dataArray[$ctr]['NewStudentId'];
			//$SchoolId=  $dataArray[$ctr]['SchoolId'];
			
			 if(trim($DBAnswer)== trim($UserAns))
			 {
				 $addMark=($addMark + $mark);
				 $noPass++;
			 }
			  
			 /*if(trim($DBAnswer)!= trim($UserAns))
			 {
				 dd($DBAnswer,$UserAns);
			 } */ 
	
			 $ctr++;
			    
			   }
			
			 
				 
			 $numbFail=$numb-$noPass;
			 
			//$date=trim(date("Y-m-d")); 
			$date=now();
			 $rstAcd = DB::table('academic_sessions')
		  ->select('academic_sessions.*')
		->Orderby('acdId','DESC')
		 ->get();  
		 
		 $acdId=$rstAcd[0]->acdId;
			
			
			
		$data=array(
	 'mark' => $addMark,
	  'cosId' => $cosId,
	   'stdId' => $StudentId,
	    'created_at' => $date,
		 'acdId' => $acdId,
		 'resultType'=>'Exam',
		  'totalQuesFailed' => $numbFail,
		   'totalQuePass' => $noPass,);	
			
 	   
	  $query=DB::table('results')->insert($data);
	  
	  /*
	 $rst= new ResultModel();
		 
		$rst->cosId = $cosId;
		 
		$rst->stdId = $StudentId;
		$rst->created_at = $date;
		
		 $rst->acdId = $acdId;
		
		$rst->mark = $addMark;
		$rst->totalQuesFailed = $numbFail;		
		$rst->totalQuePass  = $noPass;

		 
		  $rst->save();
		  
		  */  
		 
		 
		 
		 
		 $data=array(
	 'totalMark'=>$addMark,
	'totalQuePass'=>$noPass,
	'totalQuesFailed'=>$numbFail);
		 
	
	  
				  
				  //return response()->json(['success'=>$rst]);
				    //return response()->json(['success'=>$addMark]);
					return response()->json(['success'=>$data]);
				 
				 // return json_encode(array('success'=>$data));
   
				 
				 
				 //return response()->json(['success'=>$numb]);
			  
		}   
		
	 
		 		
		 
	} 
	
	public function postSearch(Request $request)
	{
		 if($request->ajax())
		{
			$txtSearchStudent = $request->input('txtSearchStudent');
			$SchoolId = $request->input('SchoolId');
			$cosId = $request->input('cosId');
			$password = $request->input('Password');
			
			//$rstSt= new students();
	      
		  
/* $rstSt = DB::select('select students.studentId,
 					students.stId, 
					students.fName, 
					students.midName,
					students.surname,
					 school.school 
          from students join school on students.schId = school.schId where students.studentId = ? and students.schId=?',[$txtSearchStudent,$SchoolId] );*/
		  
		 $date=trim(date("Y-m-d"));
		 
		  $rstAcd = DB::table('academic_sessions')
		  ->select('academic_sessions.*')
		->Orderby('acdId','DESC')
		 ->get();  
		 
		 $acdId=$rstAcd[0]->acdId;
		 
		 
		  $rstStQuery = DB::table('results')
		  
		->select('restults.*')
		->where('results.stdId','=',$txtSearchStudent)
		->where('results.acdId','=',$acdId)
		 ->where('results.cosId','=',$cosId)
		 ->count(); 
		
		/* CHECKING TO AVOID MULTIPLE EXAM FOR A COURSE WITHING ONE ACADEMIC SESSION.
	
	TO BE ACTIVATED IN PRODUCTION ENVIRONMENT
	
	 */
		/*if($rstStQuery > 0)
		 {
		 	//return response()->json(['error'=>'Result Existed for this Academic Session']);
			
			 
		  return json_encode('Result Existed for this Academic Session');
		 } */
		 
		 
		 
		 $rstSt = DB::table('students')
		 ->join('offerings','offerings.stdId','=','students.stdId') 
		->join('program_course','program_course.prcId','=','offerings.prcId') 
		->join('courses','courses.cosId','=','program_course.cosId') 
		->join('questions','questions.cosId','=','courses.cosId') 
		->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId')
		->join('timetables','timetables.cosId','=','courses.cosId')
		
		->select('students.stId','students.studentId','students.fName','students.midName','students.surname','programs.program')
		->where('students.stdId','=',$txtSearchStudent)
		->where('timetables.prgId','=',$SchoolId)
		->where('timetables.examDate','=',$date)
		->where('timetables.cosId','=',$cosId)
		 ->count(); 
		 
		 
     //dd($rstSt);
		 
		 if($rstSt == 0)
		 {
		 	return response()->json(['error'=>'Data Not found']);
		 
		 }
		    $rstSt = DB::table('students')
		->join('programs','programs.prgId','=','students.prgId') 
		->join('program_course','program_course.prgId','=','programs.prgId') 
		->select('students.stdId','students.studentId','students.fName','students.midName','students.surname','programs.program')
		->where('students.stdId','=',$txtSearchStudent)
		->where('programs.prgId','=',$SchoolId)
		 ->get();  
		  
		  
		  // dd($rstSt);
		  
		    $data=array(
		  'studentId'=>$rstSt[0]->studentId,
		  'stId'=>$rstSt[0]->stdId,
		  'fName'=>$rstSt[0]->fName,
		  'midName'=>$rstSt[0]->midName,
		  'surname'=>$rstSt[0]->surname,
		  'school'=>$rstSt[0]->program); 
		  
		  
		  // dd($data);
		  //return response()->json(['success'=>'I HAVE THE DATA']);
		  
		  return response()->json(['success'=>$data]);
		 
		   
			
		}
	}
	
	public function postFName(Request $request)
	
	{
		if($request->ajax())
		{
		   $search = $request->input('search');
			$schId = $request->input('schId');
			
			 $query = DB::table('students')
		 ->select('students.*')
		 ->where('schId','=',$schId) 
		->where('fname','like',"%$search%")
		 ->Orderby('fname','Asc')
		->get();
			
			return json_encode($query);
			
		}
	}
	
	public function register(Request $request)
	{
		 if($request->ajax())
		{
			$dataArray=[];
		$ctr=0;
		$content = $request->input('dataArray');
		
		$dataArray = json_decode($content, true);
		  
		  $fname= $dataArray[0]['fname'];
		 $midName= $dataArray[0]['midName'];
		 $surname= $dataArray[0]['surname'];
		 $LGA= $dataArray[0]['LGA'];
		 $schName= $dataArray[0]['schName'];
		 $SchoolId= $dataArray[0]['SchoolId'];
		 $birth= $dataArray[0]['birth'];
		 $fullYear= $dataArray[0]['fullYear'];
		
		 
		 $YEARMax=DB::Select('select studentId,stId,  YEAR(created_at) AS YEAR FROM `students`
		   WHERE stId =(select MAX(stId) from students )'); 
		   
		 
		 
		 $rst= new Students();
		$rst->fname = $fname;
		$rst->midname = $midName;
		$rst->surname = $surname;
		$rst->Date_of_Birth = $birth;
		$rst->schId = $SchoolId; 
		  $rst->save();  
		  $stId=$rst->id;
		   
 	
		  
		 // GENERATION ID FOR NEW STUDENT USING THEIR LGA AND SCHOOL 
		 $val= stripos(trim($LGA)," ");
		 
		  if($val >0)
		  {
			  $val2=$val+1;
			  $value= substr($LGA,0,2);
			 $value2= $LGA[$val2];
			 $value3=$value."".$value2;
		  }
		 
		 if($val <=0)
		  {
			   $value3= substr($LGA,0,3);
		  }
		  $value4= substr($schName,0,2);
		  //$value5= $value4."".$value3."".$stId;
		  
		  
		    $queryCount=DB::table('students')->count();
			
			 
			
			$numb=1;
		
		if( $queryCount == 0)
		{
			$value5= $value4."".$fullYear."0".$numb; 
			
		}
		  if( $queryCount != 0)
		{
		  
		  $numb=0;
		   
		     
		  
		 $studentId= $YEARMax[0]->studentId;
		 $maxYear= $YEARMax[0]->YEAR;
		  if(trim($maxYear) == trim($fullYear))
		  {
			$numbs= substr($studentId,6);
			$numb= substr($studentId,6);
			$numb=$numb+1;
			
			$value5= $value4."".$fullYear."0".$numb; 
			
		  }
		  
		   //dd( $numb);
		  
		  if(trim($maxYear)!= trim($fullYear))
		  {
			 $numb=1;
			  
			$value5= $value4."".$fullYear."0".$numb;
			
		  }
		  
		  
		}
		  
		    $data=array('studentId'=>$value5);
		   
		   
		   
		   
		   
		   
		 
		 
		 $query=DB::update('update students set studentId = ? where stId = ?',[$data['studentId'],$stId]);
		 
		  $data=array(
		  'studentId'=>$value5,
		  'stId'=>$stId,
		  'fName'=>$fname,
		  'midName'=>$midName,
		  'surname'=>$surname);
		  
		  
		 
		  
		  
		 return response()->json(['success'=>$data]);
		 
		}
		
	}
	
	public function postSetTest(Request $request)
	{
		if($request->ajax())
		{
		    
		  $dataArray=[];
		 
		 $content = $request->input('dataArray');
		 
		  $dataArray = json_decode($content, true);
		  
		  
		    
	$Test= $dataArray[0]['optTest'];
	
	 
	
	$date=trim(date("Y-m-d"));
	
	  $data['query'] = DB::table('programs')
		    ->join('program_course','program_course.prgId','=','programs.prgId') 
			->join('courses','courses.cosId','=','program_course.cosId')
			 ->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		->select('courses.*')
		 ->where('setexamtestdates.examTest',$Test)
		  ->where('setexamtestdates.date',$date)
		    
		->distinct() 
		->get();
		
		//dd($data['query']);
		
		 return json_encode($data['query']);
		
	}
		}
		
	public function getSetExam()
	{
		 
		  $date=date("Y-m-d");
		   
		 
		 $data = DB::table('timetables')
		   
		->select('timetables.prgId')
		->where('examDate','=',$date)
		
		->get();
		   $ctr=0;
		 foreach ($data as $hm):
	 
	       
		    $data[$ctr]=array($hm->prgId, );
	 $ctr++;
       	 endforeach ;
		   
		    $dataProgram = DB::table('programs')
		    ->join('program_course','program_course.prgId','=','programs.prgId') 
		->select('programs.*')
		 ->whereIn('programs.prgId',$data)
		->distinct() 
		->get();
		   
		  //dd($dataProgram);
		   
		   
		  $rst= new TimeTableModel();
		   $data['query']=$rst->getExamTimeTable();
		  
		   $data['faculty']=$rst->getExamTimeTableFaculty();
		 
		   //dd($data['faculty']);
		  $data['Student']=array('examDate' => $date );
		  
		  
		  return view('exam.setExam',array('query'=>$data['query'],'faculty'=>$data['faculty'],'Student'=>$data['Student']));
			 
	}
	
	
	public function postSetExam(Request $request)
	{
		 
		 try
		 {
		  
		$validator=Validator::make($request->all(),[
		
		   'subject'=>'required|not_in:Select']);
		   
  
 
 
        if ($validator->fails()) 
		{
            
			return redirect('setExam')->withErrors($validator)->withInput();			    
				 	   
        }
		
		
		  
		 
		$rst=new QuestionModel();
		
		
		
		
		
		$subj_Id=trim($request->input('subject'));
		$test=trim($request->input('optTest'));
		
		$optionE=trim($request->input('optionE'));
		
		$test=trim($request->input('opts'));
		
		
		//dd($optionE);
		
		 $counts= DB::table('setexamtestdates')
		
		->where('cosId',$subj_Id)
		 
		->count();
		
		 
		
		if($counts==0)
		{
			return redirect('setExam')->with('flash_message','Exam not set!!!');
		
		}
		
		 
		
		 //$subj = DB::select('select numbOfQues,examDuration,subject from subjects where subjId = ?',[$subj_Id]); 
		 $subj = DB::select('select markPerQuestion, quesNo ,duration,cosId from setexamtestdates where cosId = ?',[$subj_Id]); 
		 
		$numbOfQues =$subj[0]->quesNo;
		$examDuration =$subj[0]->duration ;
		$Subjects =$subj[0]->cosId;
		$markPerQuestion =$subj[0]->markPerQuestion ;
		
		$cosId=$subj[0]->cosId;
		 
		
		 $data=array( 
		 'duration' => $examDuration ,
		'markPerQuestion' => $markPerQuestion ,
		 'cosId'=>$request->input('subject'),
		  'numbOfQues'=>$numbOfQues);
		  
		 
		   
	 	 
		  
		 
		 
		//$table_question='question';
		 
		 
		 
		  $data['query']=$rst->get_Question($data,$Subjects);
		  
		  
		  
		     // dd($data['query']);
			
			  
			 
		   //if($data['query']->count() == 0)
		  if(count($data['query']) == 0)
		 {
		 	return redirect('setExam')->with('flash_message','Data Not Found!!!');
		 }
		  
		  
		  /*
		   $rstSch= new School();
	     $sch_Id=$data['school'];
		  
		  //echo  $sch_Id;
		  $sch = DB::select('select * from school where schId = ?',[$sch_Id]);
		  
		   $schoolName =$sch[0]->school;
		    
		   $LGA =$sch[0]->LGA;
		  
		  
		  $rstSch= new School();
	     $subj_Id= $data['subjId'];
		 
		 */
		 
		  // $subject = DB::select('select * from courses where cosId = ?',[$cosId]); 
		   
		   // $subjectName =$subject[0]->course;
			
			
		$date=trim(date("Y-m-d"));
		
		 
		
		
		if($optionE =='Test')
		{
		
			$queryPrgId = DB::table('program_course')
		  ->join('courses','courses.cosId','=','program_course.cosId') 
		   ->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId')
		 ->select('courses.*','program_course.prgId')
		 ->where('courses.cosId',$cosId)
		  ->where('setexamtestdates.date',$date)
		  
		->get(); 
		
		
		
		
		$queryCourse = DB::table('programs')
		    ->join('program_course','program_course.prgId','=','programs.prgId') 
			->join('courses','courses.cosId','=','program_course.cosId')
			->join('semesters','semesters.semId','=','courses.semId') 
		->join('levels','levels.levId','=','courses.levId') 
			 ->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		//->select('courses.*','program_course.prgId')
		->select('courses.*','semesters.semester','levels.level','programs.program','programs.prgId')
		 ->where('setexamtestdates.examTest',$optionE)
		  ->where('setexamtestdates.date',$date)
		    ->where('courses.cosId',$cosId)
		->distinct() 
		->get();
		
		
		
		 
		
		$prgIds=$queryPrgId[0]->prgId;
		  
		
		 
		
			 
			}
		
		
		
		
		
		else
		{
		
			$queryPrgId = DB::table('courses')
		  ->join('timetables','timetables.cosId','=','courses.cosId') 
		 ->select('courses.*','timetables.examDate','timetables.prgId')
		 ->where('courses.cosId',$cosId)
		  ->where('timetables.examDate',$date)
		  
		->get();  
		
		$prgIds=$queryPrgId[0]->prgId;
		 //dd($queryPrgId);
		
		
		
			
			$queryCourse = DB::table('courses')
		->join('semesters','semesters.semId','=','courses.semId') 
		->join('levels','levels.levId','=','courses.levId') 
		 ->join('timetables','timetables.cosId','=','courses.cosId') 
		->join('program_course','program_course.cosId','=','courses.cosId') 
		->join('programs','programs.prgId','=','program_course.prgId') 
		->select('courses.*','semesters.semester','levels.level','programs.program','programs.prgId','timetables.examDate')
		 ->where('courses.cosId',$cosId)
		  ->where('timetables.examDate',$date)
		 ->where('timetables.cosId',$cosId)
		  ->where('programs.prgId',$prgIds)
		    ->where('program_course.prgId',$prgIds)
		->get();  
			
			}
			
			 
			$className =$queryCourse[0]->level;
			$termName =$queryCourse[0]->semester;
			 $subjectName =$queryCourse[0]->course;
			  $schoolName =$queryCourse[0]->program;
			  $sch_Id=$queryCourse[0]->prgId;
			  
			  
			  
			   
			  // dd($queryCourse);	 
		  
		   // $subject = DB::select('select subjects.subject, instructions.instruction from subjects join instructions on subjects.subjId = instructions.subjId where subjects.subjId = ?',[$subj_Id]); 
		   
		   $instructions = DB::select('select  instruction from  instructions'); 
			
			
		
		 
		 $data['Instruction']= $instructions;
		  
		  
		  
	    
		  
		   $data['Student']=array('schId' => $sch_Id,'School'=> $schoolName, 'examDuration'=>$examDuration,'Subject'=> $subjectName, 'Class'=> $className, 'Term'=> $termName);
		   
		  
		    
			 //dd($data['query'][0]->queId);
		  
		 
 return view('exam',array('query'=>$data['query'],'Student'=>$data['Student'],'Instruction'=>$data['Instruction']));
		 
		 
		  
		 
		 //return redirect()->action('examController@exam',$data)->with($data['school'])->with($data['clsId'])->with($data['termId'])->with($data['subjId']);
		 }
		 catch(\Illuminate\Database\QueryException $e)
		 {
			  
			 //throw $e;
		 }
		  catch(\Exception $e)
		 {
			  
			 //report($e);
			 //return false;
			 return back()->withErrors('Data error');
		 }
		
	}
	
	
	 public function exam()
    {
	
		//$data=array('termId' => 3,'clsId' => 6,'subjId'=>3);
	$data=$this->postSetExam($data);
		 
		
		/* 
		 
		$st=new Question();
		$table_question='question';
		 
		  
		 
		  $data['query']=$st->get_Question($data);
		  
		  
		   
		  
		  
		  
		  
		   $rstSch= new School();
	     $sch_Id=$data['school'];
		  
		  $sch = DB::select('select * from school where schId = ?',[$sch_Id]);
		  
		   $schoolName =$sch[0]->school;
		  
		  
		  $rstSch= new School();
	     $subj_Id= $data['subjId'];;
		 // $subject = DB::select('select * from subject where subjId = ?',[$subj_Id]); 
		  
		    $subject = DB::select('select subjects.subject, instructions.instruction from subjects join instructions on subjects.subjId = instructions.subjId where subjects.subjId = ?',[$subj_Id]); 
			
			
		 $subjectName =$subject[0]->subject;
		 
		 $data['Instruction']= $subject;
		  
	     
		  $cls_Id=$data['clsId'];
		  $class = DB::select('select * from classes where clsId = ?',[$cls_Id]); 
		 $className =$class[0]->class;
		  
		  
		 $term_Id=$data['termId'];
		  $Term = DB::select('select * from terms where termId = ?',[$term_Id]); 
		 $termName =$Term[0]->term;
		 

		  
		   $data['Student']=array('schId' => 1,'stId' => 1,'Fname' => 'Chinedu','Surname'=>'Francis','School'=> $schoolName,'Subject'=> $subjectName, 'Class'=> $className, 'Term'=> $termName);
		   
		  
		    
			
		  
		//,'School'=>$data['School']
 return view('school.exam',array('query'=>$data['query'],'Student'=>$data['Student'],'Instruction'=>$data['Instruction']));
 
 */
	}
	public function postLGA(Request $request)
	{
		$LGA = $request->input('LGA');
			
			$rstSch= new school();
	     
		  
		   $rstSch=$rstSch->where('LGA',$LGA)->orderBy('school','asc')->get();
		 
		  
		  
		  //return response()->json(['success'=>'I HAVE THE DATA']);
		  
		  //return response()->json(['success'=>$rstSch]);
		  return json_encode($rstSch);
	}
	
	
}

