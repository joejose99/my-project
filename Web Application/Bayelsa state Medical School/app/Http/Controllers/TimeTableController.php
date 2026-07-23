<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Validator;
use App\TimeTableModel;
use Calendar;
class TimeTableController extends Controller
{
    //
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
		
		$rst= new TimeTableModel();
		
		 $acdIds =$rst->getAcademic_Session();
	 $data['query'] = $rst->getAll($acdIds);
	 
	 
	
	 // dd($data['query']);
		  
		    $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		    
		 
		 
		  $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		 
		 $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		  
		   $data['student'] = DB::table('students')
		  ->select('students.*') 
		  ->get();
		  
		   
		  
		 return view('time table.index',array('query'=>$data['query'],'faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester'],'student'=>$data['student'] ));
		 
		 
// return view('school.question.question',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects']));
	
	}
	
	
	
	
	
	public function examTimeTable()
	{
		
		$rst= new TimeTableModel();
		$acdIds =$rst->getAcademic_Session();
		 //$data['query'] = $rst->getAllExam($acdIds);
	
	
	$evt  = $rst->get_All_Exam($acdIds);
	 
	
	 $event_list = [];
	 
	 foreach($evt as $key => $event)
	 {
	  $event_list[]= Calendar::event(
	  $event->cosId. "\n".$event->roomNumber."\n".$event->time ."\n",
	  
	    true,
                new \DateTime($event->examDate),
                new \DateTime($event->examDate),null,['color'=>'#f05050',]
	   
	   );
	   
	   } 
	   $calendar_details=Calendar::addEvents($event_list);
	
	 
	 
	 
	  
		  
		    $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		    
		 
		 
		  $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		 
		 $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		  
		   $data['student'] = DB::table('students')
		  ->select('students.*') 
		  ->get();
		  
		   return view('exam time table.index',compact('calendar_details'));
		  
		 //return view('exam time table.index',array('query'=>$data['query'],'faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester'],'student'=>$data['student']));
		 
		 
// return view('school.question.question',array('query'=>$data['query'],'term'=>$data['term'],'class'=>$data['class'],'subjects'=>$data['subjects']));
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	 public function searchFalDptPrgLevSem(Request $request)
    {
		if($request->ajax())
		{
			
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		$time_stamps =now();
		$dataArray = json_decode($content, true);
	
	$semId=$dataArray[0]['semId']; 
	$falId= $dataArray[0]['falId'];
	$levId=$dataArray[0]['levId']; 
	$dptId= $dataArray[0]['dptId'];
	$prgId=$dataArray[0]['prgId']; 
	
	 
	 $data = DB::table('programs')
		    ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId') 
			 ->select('courses.*') 
			 
			 ->where('programs.prgId',$prgId)
		 ->where('semesters.semId',$semId)
		  ->where('levels.levId',$levId)
		->get();
			
			
			return json_encode($data);
	    }
	 
	  }
	
	
	
	public function setPreview(Request $request)
    {
		if($request->ajax())
		{
		
	 
	  		 
			$studentId=$request->input('studentId');
			 
			 $time_table_type=$request->input('time_table_type'); 
			 
			 $data['query'] = DB::table('students')
			 ->where('students.stdId',$studentId)
			 ->get();
			  
			  //dd( $data['query'][0]->prgId);
			  
			  $prgId=$data['query'][0]->prgId;
			  
			  
			 
			 
			 
			 
			 
			 $rst= new TimeTableModel();
		$acdIds =$rst->getAcademic_Session();
			 
			 
			 
			 
			  
			 /* MONDAY STATS HERE */
			 
			 $data['query'] = DB::table('students')
		// ->join('departments','departments.falId','=','faculties.falId') 
	   //->join('programs','programs.dptId','=','departments.dptId') 
	   ->join('programs','programs.prgId','=','students.prgId') 
	   //->join('students','students.prgId','=','programs.prgId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			 
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			  ->select('timetables.*','lecturerooms.roomNumber','students.fName','programs.program','students.surname') 
	  ->orderBy('timetables.day','ASC')
 			 //->get();  
		//->where('timetables.day','=','Monday')
		->where('students.stdId','=',$studentId)
		  ->where('timetables.prgId','=',$prgId)
		  ->where('timetables.acdId','=',$acdIds)
		   ->where('timetables.time_table_type','=',$time_table_type)
		
		 
		// ->Orderby('timetables.day','asc')
		 ->get();
			   
			   
			//,'tuesday'=>$data['tuesday'],'wednesday'=>$data['wednesday'],'thursday'=>$data['thursday'],'friday'=>$data['friday'],'saturday'=>$data['saturday']  
	
	return json_encode(array('query'=>$data['query'] ));
    
      
	 
		}
	}
	
	
	
	
	 public function postEdit(Request $request)
    {
		if($request->ajax())
		{
		
	 
	  		 
			$clsId=$request->input('clsId');
			
			$time_table_type =$request->input('time_table_type');
			 $rst= new TimeTableModel();
		$acdIds =$rst->getAcademic_Session();

			 $data['query'] = $rst->getQuestionByClassId($clsId,$time_table_type,$acdIds);
			 
			 
			 
			  
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
		
	 
	  		 
			$clsId=trim($request->input('clsId'));
			$termId=trim($request->input('terms'));
			$time_table_type=trim($request->input('time_table_type'));
			
			
			$rst= new TimeTableModel();
		$acdIds =$rst->getAcademic_Session();
			  
          
			 $data['query'] = $rst->getQuestionByClassTermId($clsId,$termId,$time_table_type,$acdIds);
			 
			 
			// dd($request->all());
		 
     $data['rstDpt'] = DB::table('programs')
		  ->select('programs.*') 
		  ->where('dptId',$termId) 
		  ->get();
		 
    //return json_encode( $data['querycls']);
	
	 
	
	return json_encode(array('query'=>$data['query'],'rstDpt'=>$data['rstDpt'] ));
      
	 
		}
	}
	
	
	
	 public function setPublish(Request $request)
    {
		if($request->ajax())
		{
		 
			 
			$prgId=$request->input('subjects');
			
			$semId=$request->input('semester');
			$levId=$request->input('level');
			$txtPublish=$request->input('txtPublish');
			$time_table_type=$request->input('time_table_type');
			
			if(trim($txtPublish)!='Publish')
			{
				 
				$rst= new TimeTableModel();
		$acdIds =$rst->getAcademic_Session();
           
			 $data['query'] = $rst->edit_tables_publish($semId,$levId,$prgId,$time_table_type,$acdIds);
			 
			  
			}
			else
			{
				
				 $st= new TimeTableModel();
				 $acdIds =$st->getAcademic_Session();
           
			 $data['query'] = $st->edit_tables_Unpublish($semId,$levId,$prgId,$time_table_type,$acdIds);
			}	
			
			 return json_encode('Success');
	
	}
	
	
	}
	
	 public function postEditTermSubj(Request $request)
    {
		if($request->ajax())
		{
		 
			$clsId=$request->input('clsId');
			$termId=$request->input('terms');
			$subjId=$request->input('subjects');
			
			$semId=$request->input('semester');
			$levId=$request->input('level');
			
			$time_table_type=trim($request->input('time_table_type'));
			 
			
			 $st= new TimeTableModel();
				 $acdIds =$st->getAcademic_Session();
           
			 $data['query'] = $st->getQuestionByClassTermSubjId($clsId,$termId,$subjId,$semId,$levId,$time_table_type,$acdIds);
			 
		 
    return json_encode($data['query']);
      
	 
		}
	}
	public function postEditQuestion(Request $request)
    {
		if($request->ajax())
		{
		 
			 $search=$request->input('search');
			
			
			 $rst= new TimeTableModel();
				 $acdIds =$rst->getAcademic_Session();
           
			 $data['search'] = $rst->getQuestionByQuestion($search, $acdIds);
			 
		 
    return json_encode($data['search']);
      
	 
		}
	}
	
	
	  
	

	 
	 
	 public function setCourses(Request $request)
	{
		
		if($request->ajax())
		{
		    
		   
		 
		 $falId = $request->input('falId');
		 
		  $dptId = $request->input('dptId');
		  $cosId=$request->input('subjects');
		  
		   $rst= new TimeTableModel();
				 $acdIds =$rst->getAcademic_Session();
				 
		  $data=$rst->getQeuryByCourses($dptId,$falId,$acdIds);
		  
		   return json_encode($data);	 
		  
		  }
		  
		  
	}
		
	 public function getInsertform()
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
		  
		  
		   $data['building'] = DB::table('buildings')
		  ->select('buildings.*') 
		  ->get();
		  
		  
		  
		  $rst= new TimeTableModel();
		$acdIds =$rst->getAcademic_Session();
		  
		  
		   $data['academic'] = DB::table('academic_sessions')
		  ->select('academic_sessions.*') 
		  ->where('academic_sessions.acdId',$acdIds)
		  ->get();
		    
	 return view('time table.insert',array('faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester'],'building'=>$data['building'],'academic'=>$data['academic']));	 
		 
	  
	// return view('school.question.insert');
	 
    }
	
		
		  
	public function setInsertform(Request $request)
	{
		
		if($request->ajax())
		{
		    
		  $dataArray=[];
		 
		 $content = $request->input('dataArray');
		 
		  $dataArray = json_decode($content, true);
		  
		  $error =0;
		  
		  $created_at=now();
		   $rst_cnt= new TimeTableModel();
		   
		   $time_table_type =$dataArray[0]['time_table_type'];
		    $levId =$dataArray[0]['levId'];
	 $semId =$dataArray[0]['semId'];
	$prgId= $dataArray[0]['prgId'];
	$day = $dataArray[0]['day'];
	 $time = $dataArray[0]['time'];
	$romId = $dataArray[0]['romId'];
	$cosId = $dataArray[0]['cosId'];
	 
	$academic_session  =$dataArray[0]['academic_session']; 
		 $duration = $dataArray[0]['duration'];   
			
	     $sub = $rst_cnt->queryByOption($prgId,$romId,$time,$day, $semId,$levId,$cosId,$academic_session);
		 
		 $cnt= $sub;
		 
		  /* CHECKING THE AVALABILITY OF ROOM */ 
		    $countRoom= DB::table('timetables')
		
		 ->where('romId',$romId)
		->where('time',$time)
		 ->where('day',$day) 
		  ->where('time_table_type',$time_table_type) 
		  
		->count();
		
		
		/* CHECKING FOR CLASH OF LECTURERS */ 
		    $countClash= DB::table('timetables')
		
		 
		->where('time',$time)
		 ->where('day',$day) 
		 ->where('prgId',$prgId)
		  ->where('time_table_type',$time_table_type) 
		  
		->count();
		   
		  
		  $gs='GS';
		 /* CHECKING THE GS COURSE */ 
		    $countGS= DB::table('timetables')
		 ->join('courses','courses.cosId','=','timetables.cosId') 
		->where('timetables.time',$time)
		 ->where('timetables.day',$day)
		 ->where('timetables.semId',$semId)
		->where('timetables.cosId',$cosId)
		->where('timetables.levId',$levId)
		 ->where('timetables.acdId',$academic_session)
  ->where('time_table_type',$time_table_type) 
        ->where('courses.cosId',$cosId)
		->where('courses.courseType',$gs)
		->count(); 
		  
		 
		 
		 
		 
		  
		  if($cnt > 0 )
		  {
			  
			   
			   return json_encode('Data Existed Already !!!');
			    $error ++;
		  }
		  
		   
		  if($countClash > 0  &&  trim($time_table_type) != "Lecture")
		  {
			  
			   
			   return json_encode('Lectures Avalable on Stated Time !!!');
			    $error ++;
		  }
		   
	 
		 
		  
		   if($countRoom > 0  &&  $countGS == 0)
		  {
			   
			   return json_encode('Lecture Room is Occupied !!!');
			    $error ++;
		  }
		  
		
		  
		  
		 else
		  {
		    
			 
			  $data=array(
	//'cls' => $dataArray[0]['cls'],
	//'dptId' => $dataArray[0]['term'],
	
	'time_table_type' => $dataArray[0]['time_table_type'],
	'cosId' => $dataArray[0]['cosId'],
	'day' => $dataArray[0]['day'],
	'time' => $dataArray[0]['time'],
	'prgId' =>  $dataArray[0]['prgId'],
	'semId' =>$dataArray[0]['semId'],
	'levId' =>$dataArray[0]['levId'],
	'romId' => $dataArray[0]['romId'],
	'created_at' => $created_at,
	'duration' => $dataArray[0]['duration'],
	'examDate' => $dataArray[0]['examDate'],
	'examType' => trim($dataArray[0]['examType']),
	'status' => 'Unpublish',
	'acdId' => $dataArray[0]['academic_session'] );
	  
	 $st= new TimeTableModel();
	  $data['st'] = $st->insertData('timetables',$data,$duration );
	 	  //return response()->json(['success'=>$data]);
		 
		 return json_encode('Data Successfully Saved');	  
	
		  }
	
		}
	}
	
	
	
	public function getShow($id)
	{
		 
		   
		   
		     $rst= new TimeTableModel();
				 $acdIds =$rst->getAcademic_Session();
				 
			
			
			
			 
		   $data['query'] = $rst->queryByid('timetables',$id,$acdIds);
		   
		   
		  
			
			$data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  
		   $data['level'] = DB::table('levels')
		  ->select('levels.*') 
		  ->get();
		 
		 $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		  
		   $data['building'] = DB::table('buildings')
		  ->select('buildings.*') 
		  ->get();
		  
		    
	 return view('time table.update',array('query'=>$data['query'],'faculty'=>$data['faculty'],'level'=>$data['level'],'semester'=>$data['semester'],'building'=>$data['building']));	
			
			
			
	// return view('question.update',array('query'=>$data['query'],'faculty'=>$data['faculty'] ));
		   
		    
	}
	
	
	public function edit(Request $request,$id)
	{
	
	 
	$dataArray=[];
		 
		 $content = $request->input('dataArray');
		 
		  $dataArray = json_decode($content, true);
		   
		   $error=0;
		   
		  // dd($dataArray[0]['prgId']);
		  
		  $rst= new TimeTableModel();
				 $acdIds =$rst->getAcademic_Session();
		    
			$levId =$dataArray[0]['levId'];
			
	$academic_session  =$dataArray[0]['academic_session'];
		
			
	 $semId =$dataArray[0]['semId'];
	$prgId= $dataArray[0]['prgId'];
	$day = $dataArray[0]['day'];
	 $time = $dataArray[0]['time'];
	$romId = $dataArray[0]['romId'];
	$cosId = $dataArray[0]['cosId'];
	
	$time_table_type = $dataArray[0]['time_table_type'];
	
	$examDate = $dataArray[0]['examDate'];
	
	
	 
	//$academic_session  =$dataArray[0]['academic_session']; 
		 $duration = $dataArray[0]['duration'];   
			
			 $rst_cnt= new TimeTableModel();
	     $sub = $rst_cnt->queryByOption($prgId,$romId,$time,$day, $semId,$levId,$cosId,$academic_session);
		 
		 $cnt= $sub;
		 
		 
		 /* CHECKING IF IS THE SAME DATA BEEN EDITED */
		 
		 $rmId= DB::table('timetables')
		
		 ->where('timId',$id)
		 
		->get();
		 
		 
		 $tms =$rmId[0]->time;
		  $days =$rmId[0]->day;
		 
		 
		  /* CHECKING THE AVALABILITY OF ROOM */ 
		    $countRoom= DB::table('timetables')
		
		 ->where('romId',$romId)
		->where('time',$time)
		 ->where('day',$day) 
		  ->where('timetables.acdId',$academic_session)
		->count();
		   
		  
		  $gs='GS';
		 /* CHECKING THE GS COURSE */ 
		    $countGS= DB::table('timetables')
		 ->join('courses','courses.cosId','=','timetables.cosId') 
		->where('timetables.time',$time)
		 ->where('timetables.day',$day)
		 ->where('timetables.semId',$semId)
		->where('timetables.cosId',$cosId)
		->where('timetables.levId',$levId)
		 ->where('timetables.acdId',$academic_session)
 
        ->where('courses.cosId',$cosId)
		->where('courses.courseType',$gs)
		 ->where('timetables.acdId',$academic_session)
		->count(); 
		  
		 
		 
		 
		 
		  /*
		  if($cnt > 0 )
		  {
			  
			   
			   return json_encode('Data Existed Already !!!');
			    $error ++;
		  }
		  */
		
		 
		 // dd($tms);
	  
	  // dd(trim($time));
	   
	   // dd(trim($day)); 
	   
		  if(trim($tms) != trim($time) ||   trim($days) != trim($day))
		   {
			 
			   
		  	 if($countRoom > 0  &&  $countGS == 0)
		  		{
			   
			  	 return json_encode('Lecture Room is Occupied !!!');
			   	 $error ++;
		  		}
		  
		}
		  
		 
		   	  
			 $data=array(
			 'time_table_type' => $dataArray[0]['time_table_type'],
			 'cosId' => $dataArray[0]['cosId'],
	'day' => $dataArray[0]['day'],
	'time' => $dataArray[0]['time'],
	'prgId' =>  $dataArray[0]['prgId'],
	'semId' =>$dataArray[0]['semId'],
	'levId' =>$dataArray[0]['levId'],
	'romId' => $dataArray[0]['romId'],
	'duration' => $dataArray[0]['duration'],
	'examDate' => $dataArray[0]['examDate'],
	'examType' => trim($dataArray[0]['examType']),
	'acdId' => $dataArray[0]['academic_session'] );
	
	 $id=$dataArray[0]['id'];
	    //dd($request->all(),$id);
		
		 $rst=new TimeTableModel();
		// dd($data);
		  
		   $data['edit']=$rst->edit_tables($data,$id, $acdIds);
		 
		   
		   
		   	 
		  return json_encode('success');
				 
				 
		    
		  
		  //return json_encode('success');
	} 
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
		   
			  $quesId=$request->input('quesId');
			   $time_table_type=$request->input('time_table_type');
			 
			 
			
			 $st= new TimeTableModel();
         $acdIds =$st->getAcademic_Session();
		 
			 $data['query'] = $st->delete_table('timetables',$quesId);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate($time_table_type,$acdIds);
		   
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
		 	  $st= new TimeTableModel();
			  
			    
				 $acdIds =$st->getAcademic_Session();
			
        
		$time_table_type=$request->input('time_table_type'); 
		 
		 
			 $data['query'] = $st->delete_table_colunms('timetables',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate($time_table_type,$acdIds);
			 
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
		}
		
	}
}
