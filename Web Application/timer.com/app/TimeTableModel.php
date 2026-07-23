<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class TimeTableModel extends Model
{
    
	 
	protected $table=['timetables','academic_sessions','setexamtestdates'];
	 
	
	protected $fillable=['acdId','academic_session','prgId','semId','levId','duration','time','day','timId','cosId','falId','dptId','cosId'];
	


	public function getAll($acdIds)
	{  
	 
	return $query = DB::table('programs')
	    
	  //->join('departments','departments.dptId','=','faculties.falId') 
	    //->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			 
			 ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			 
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			 
			  ->select('timetables.*','courses.course','programs.program','semesters.semester','levels.level','lecturerooms.roomNumber','academic_sessions.academic_session') 
			  
			  ->where('timetables.time_table_type','=','Lecture')
			   ->where('timetables.acdId','=',$acdIds)
	  ->orderBy('timetables.day','ASC')
 			 //->get();  
		 ->paginate(10);
		
		}
		
		
		
		
		public function getAllExam($acdIds)
	{  
	
	
	  
	
	return $query = DB::table('programs')
	    
	  //->join('departments','departments.dptId','=','faculties.falId') 
	    //->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			 ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			  ->select('timetables.*','courses.course','programs.program','semesters.semester','levels.level','lecturerooms.roomNumber','academic_sessions.academic_session')  
			  
			  ->where('timetables.time_table_type','=','Exam')
			  ->where('timetables.acdId','=',$acdIds)
	  ->orderBy('timetables.day','ASC')
 			 //->get();  
		 ->paginate(10);
		
		}
		
		
		
		public function get_All_Exam($acdIds)
	{  
	
	
	  
	
	return $query = DB::table('programs')
	    
	  //->join('departments','departments.dptId','=','faculties.falId') 
	    //->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			 ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			  
			 
			  ->select('timetables.*','courses.course','lecturerooms.roomNumber','academic_sessions.academic_session')  
			  
			  ->where('timetables.time_table_type','=','Exam')
			  ->where('timetables.acdId','=',$acdIds)
			  ->distinct()
	  ->orderBy('timetables.day','ASC')
 			  ->get();  
		  
		
		}
		
		
	public function getAcademic_Session()
{
	
	 $data['academic'] = DB::table('academic_sessions')
		  ->select('academic_sessions.*') 
		   ->Orderby('acdId','DESC')
		  ->get();
		  
		 $acdId= $data['academic'][0]->acdId;
		 
		 return $acdId;
		 
	 }	
		
		public function getAllNoPaginate($time_table_type,$acdIds)
	{
		 return $query = DB::table('faculties')
		 ->join('departments','departments.falId','=','faculties.falId') 
	   ->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			  
			  ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			  ->select('timetables.*','courses.course','programs.program','semesters.semester','levels.level','lecturerooms.roomNumber','academic_sessions.academic_session') 
			  
			   ->where('timetables.time_table_type','=',$time_table_type)
			   ->where('timetables.acdId','=',$acdIds)
			  
		 ->get();  
	}
	
	public function queryByOption($prgId,$romId,$time,$day, $semId,$levId,$cosId,$academic_session)
	{  
		return $query= DB::table('timetables')
		
		->where('prgId',$prgId)
		->where('romId',$romId)
		->where('time',$time)
		 ->where('day',$day)
		 ->where('semId',$semId)
		->where('cosId',$cosId)
		->where('levId',$levId)
		 ->where('acdId',$academic_session)
		->count();
		
	}
	
	
	 
	
	
	
	public function insertData($table,$data,$duration )
	{
	 
	 return $query=DB::table($table)->insert($data);
	
	} 
	
	
	
	 
		
	public function  getQuestionByClassId($clsId, $time_table_type,$acdIds)
	{
		
		
		$data = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId') 
	    ->join('programs','programs.dptId','=','departments.dptId') 
		->select('programs.prgId')
		->where('faculties.falId','=',$clsId)
		
		->get();
		
		
		 
		
		$ctr=0;
		 foreach ($data as $hm):
	 
	       
		    $data[$ctr]=array($hm->prgId, );
	 $ctr++;
       	 endforeach ;
		
		
		// dd( $data);
		
		 return $query = DB::table('faculties')
		 ->join('departments','departments.falId','=','faculties.falId') 
	   ->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			  ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			  ->select('faculties.faculty','timetables.*','courses.course','programs.program','semesters.semester','levels.level','lecturerooms.roomNumber','academic_sessions.academic_session') 
	  ->orderBy('timetables.day','ASC')
 			 //->get();  
		
		  ->where('faculties.falId','=',$clsId)
		 
		 //->where('timetables.prgId','=',1)
		  ->whereIn('timetables.prgId',$data)
		  ->where('timetables.time_table_type','=',$time_table_type)
		  ->where('timetables.acdId','=',$acdIds)
		  //->whereIn('timetables.prgId',[1,2,9,8])
		 ->Orderby('timetables.day','asc')
		 ->get();
		 //->paginate(5);  
	 
		 	 
	}
	
	
	public function  getQuestionByClassTermId($clsId,$termId,$time_table_type,$acdIds)
	{
		
		
		$data = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId') 
	    ->join('programs','programs.dptId','=','departments.dptId') 
		->select('programs.prgId')
		 ->where('faculties.falId','=',$clsId)
		->where('departments.dptId','=',$termId)
		 
		->get();
		
		//$data['query'][0]->prgId
		//echo $data[0]->prgId;
		$prgId = $data[0]->prgId;
		 
		 
		
		
		//dd($data[$ctr]);
		
		
		 return $query = DB::table('faculties')
		 ->join('departments','departments.falId','=','faculties.falId') 
	   ->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			  ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			  ->select('timetables.*','courses.course','programs.program','semesters.semester','levels.level','lecturerooms.roomNumber','academic_sessions.academic_session') 
 			 
		 ->where('faculties.falId','=',$clsId)
		->where('departments.dptId','=',$termId)
		 ->where('timetables.prgId','=',$prgId)
		  ->where('timetables.time_table_type','=',$time_table_type)
		  ->where('timetables.acdId','=',$acdIds)
		->orderBy('timetables.day','ASC')
		 ->get();
		 
	 
		 	 
	}
	
	
	public function  getQuestionByClassTermSubjId($clsId,$termId,$subjId,$semId,$levId,$time_table_type,$acdIds)
	{
		  return $query = DB::table('faculties')
		 ->join('departments','departments.falId','=','faculties.falId') 
	   ->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			  ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			  ->select('timetables.*','courses.course','programs.program','semesters.semester','levels.level','lecturerooms.roomNumber','academic_sessions.academic_session') 
 			 
		 // ->where('faculties.falId','=',$clsId)
		 //->where('departments.dptId','=',$termId)
		 ->where('departments.dptId','=',$termId)
		->where('timetables.semId','=',$semId)
		->where('timetables.levId','=',$levId)
		->where('timetables.prgId','=',$subjId)
		 ->where('timetables.time_table_type','=',$time_table_type)
		 ->where('timetables.acdId','=',$acdIds)
		 ->orderBy('timetables.day','ASC')
		//->groupby('timetables.timId')
		// ->distinct()
		->get(); 
		
		
		//->paginate(5); 
		 
	 
		 	 
	}
	
	
	public function  getQuestionByQuestion($search,$time_table_type,$acdIds)
	{
		  return $query = DB::table('faculties')
		 ->join('departments','departments.falId','=','faculties.falId') 
	   ->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			  
			  ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			  ->select('timetables.*','courses.course','programs.program','semesters.semester','levels.level','lecturerooms.roomNumber','academic_sessions.academic_session') 
		
		 ->where('timetables.cosId','like',"%$search%")
		  ->where('timetables.time_table_type','=',$time_table_type)
		  ->where('timetables.acdId','=',$acdIds)
		 ->Orderby('timetables.timId','Asc')
		->get(); 
		//->paginate(5); 
	 
		 	 
	}
	
	
	public function edit_tables($data,$id, $acdIds)
	{
		 
		  
		  
		  
		 return $query=DB::table('timetables')
		 ->where('timId', $id)->update([
		'time_table_type' => trim($data['time_table_type']),
	'cosId' => trim($data['cosId']),
	'day' => trim($data['day']),
	'time' => trim($data['time']),
	'prgId' =>  trim($data['prgId']),
	'semId' =>trim($data['semId']),
	'levId' =>trim($data['levId']),
	'romId' => trim($data['romId']),
	'duration' => trim($data['duration']),
	'examDate' => trim($data['examDate']),
	'examType' => trim($data['examType']),
	'acdId' =>  trim($acdIds), ]);
		 
	 
		 
		
	}
	
	
	 
	public function edit_tables_publish($semId,$levId,$prgId,$time_table_type,$acdIds)
	{
		 
		   
		 return $query=DB::table('timetables')
		 ->where('timetables.semId','=',$semId)
		->where('timetables.levId','=',$levId)
		->where('timetables.acdId','=',$acdIds)
		->where('timetables.time_table_type','=',$time_table_type)
		->where('timetables.prgId','=',$prgId)->update([ 
	'status' => 'Publish', ]);
		 
	 
		 
		
	}
	
	public function edit_tables_Unpublish($semId,$levId,$prgId,$time_table_type,$acdIds)
	{
		 
		  
		  
		  
		 return $query=DB::table('timetables')
		 ->where('timetables.semId','=',$semId)
		->where('timetables.levId','=',$levId)
		->where('timetables.acdId','=',$acdIds)
		->where('timetables.time_table_type','=',$time_table_type)
		->where('timetables.prgId','=',$prgId)->update([ 
	'status' => 'Unpublish', ]);
		 
	 
		 
		
	}
	
	 
	
	public function queryByid($table,$id,$acdIds)
	{
		 
		//$query=$this->find($id);		 
		// return $query;
	 
 
		  
		 return  $query=DB::table('faculties')
		   ->join('departments','departments.falId','=','faculties.falId') 
	   ->join('programs','programs.dptId','=','departments.dptId') 
		      ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
			  ->join('timetables','timetables.cosId','=','courses.cosId')
			  ->join('academic_sessions','academic_sessions.acdId','=','timetables.acdId')
			
			
			    ->join('lecturerooms','lecturerooms.romId','=','timetables.romId') 
				
				 ->join('buildings','buildings.buiId','=','lecturerooms.buiId') 
				
			 ->join('levels','levels.levId','=','courses.levId') 
			 ->join('semesters','semesters.semId','=','courses.semId')
			 
			  ->select('timetables.*','courses.course','programs.program','semesters.semester','levels.level','lecturerooms.roomNumber','faculties.falId','faculties.faculty','departments.dptId','departments.department','buildings.building','buildings.buiId','academic_sessions.academic_session') 
		 ->where('timetables.acdId',$acdIds)
		 ->where('timetables.timId',$id)->get();
	}
	
	
	
	
	public function delete_table($tables,$quesId)
	{
		 //$query=$this->destroy($tables,$quesId);
		 $query= DB::table('timetables')->where('timId',$quesId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= DB::table('timetables')->where('timId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	public function getExamTimeTable()
	{
		$date=trim(date("Y-m-d"));
		
		 // dd($date);
		 
		 
		 
		 return  $query=DB::table('courses')
		   	 
			   
			 ->join('timetables','timetables.cosId','=','courses.cosId') 
			  ->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
			 
			  ->select('timetables.*','courses.course')
			  ->where('timetables.examDate',$date) 
		   ->where('timetables.examType','=','Online')
		   ->where('timetables.status','=','Publish')
		  
		     
		 ->get();
	}	
	
	
	public function getExamTimeTableFaculty()
	{
		$date=trim(date("Y-m-d"));
		
		 // dd($date);
		 return  $query=DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')  
		   ->join('programs','programs.dptId','=','departments.dptId') 
		   ->join('program_course','program_course.prgId','=','programs.prgId') 
			 ->join('courses','courses.cosId','=','program_course.cosId') 
		   	 ->join('timetables','timetables.cosId','=','courses.cosId') 
			  ->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
			 
			  ->select('faculties.*','programs.program') 
		   ->where('timetables.examType','=','Online')
		   ->where('timetables.status','=','Publish')
		  ->where('timetables.examDate',$date)
		  ->distinct()
		 ->get();
	}	
}




