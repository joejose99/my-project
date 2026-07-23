<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ResultModel extends Model
{
    protected $table=['results','publisresults'];
	
	protected $fillable=[ 'stdId','cosId','acdId','mark','resultType','totalQuePas','totalQuesFailed','created_at','smId','date'];
	
	
	 public function getAll($resultType)
	{
		 
		  $rst= new ResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		->join ('levels','levels.levId','=','courses.levId')
		->join('semesters','semesters.semId','=','courses.semId') 
		->select('results.*','students.studentId','students.fName','students.midName','students.surname','students.stdId','levels.level','semesters.semester','courses.course','academic_sessions.academic_session')
		->where('results.resultType',$resultType)
		->Orderby('results.rstId','Desc')
		->paginate(5);  
		 
	}
	
	
	public function getAllNoPaginate($resultType)
	{
		  $rst= new ResultModel();
		  
		  
		return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		->join ('levels','levels.levId','=','courses.levId')
		->join('semesters','semesters.semId','=','courses.semId') 
		->select('results.*','students.studentId','students.fName','students.midName','students.surname','students.stdId','levels.level','semesters.semester','courses.course','academic_sessions.academic_session')
		->where('results.resultType',$resultType)
		->Orderby('results.rstId','Desc')
		->get();  
		 
	}
	
	 public function getFaculty($falId,$acdId,$resultType)
	{
		   $exam="Exam";
		 $rst= new ResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('results.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('results.acdId','=',$acdId)
		->where('faculties.falId','=',$falId)
		->where('results.resultType',$resultType)
		->Orderby('results.rstId','Desc')
		->get();
		//->paginate(5); 
		//->whereYear('submitresult.created_at','=',Carbon::date().toDateString()) 
		 
	}
	
	
	
	public function  getSubmitRstBySch($acdId,$falId,$dptId,$resultType)
	{
		  
		  $rst= new ResultModel();
		 
		 
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('results.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('results.acdId','=',$acdId)
		->where('faculties.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId) 
		->where('results.resultType',$resultType)
		->Orderby('results.rstId','Desc')
		 ->get();
		 //->paginate(5);  
	 
		 	 
	}
	
	public function  getQuestionByClassId($acdId,$falId,$dptId,$levId,$resultType)
	{
		 $rst= new ResultModel();
		 $exam="Exam";
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		  ->join('levels','levels.levId','=','courses.levId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('results.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('results.acdId','=',$acdId)
		->where('departments.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId)
		->where('levels.levId','=',$levId)
		->where('results.resultType',$resultType)
		->Orderby('results.rstId','Desc')
		 ->get();
		 //->paginate(5);  
	 
		 	 
	}
	public function getQuestionByClassTermId($acdId,$falId,$dptId,$levId,$semId,$resultType)
	{
		//
		  $rst= new ResultModel();
		  $exam="Exam";
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		  ->join('levels','levels.levId','=','courses.levId')
		   ->join('semesters','semesters.semId','=','courses.semId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('results.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('results.acdId','=',$acdId)
		->where('departments.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId)
		->where('levels.levId','=',$levId)
		->where('semesters.semId','=',$semId)
		->where('results.resultType',$resultType)
		->Orderby('results.rstId','Desc')
		 ->get();
		// ->paginate(5);  
	 
		 	 
	}
	
	
	
	
	
	
	public function  getQuestionByClassTermSubjId($acdId,$falId,$dptId,$levId,$semId,$cosId,$resultType)
	{
		 $rst= new ResultModel();
		 
		 
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		  ->join('levels','levels.levId','=','courses.levId')
		   ->join('semesters','semesters.semId','=','courses.semId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('results.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('results.acdId','=',$acdId)
		->where('departments.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId)
		->where('levels.levId','=',$levId)
		->where('semesters.semId','=',$semId)
		->where('courses.cosId','=',$cosId)
		->where('results.resultType',$resultType)
		->Orderby('results.rstId','Desc')
		 ->get();
		//->paginate(5); 
		 
	 
		 	 
	}
	
	
	
	
	public function  getSchoolByLike($search,$acdId,$resultType)
	{
		
		
		
		
		 $rst= new TotalResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		  ->join('levels','levels.levId','=','courses.levId')
		   ->join('semesters','semesters.semId','=','courses.semId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		 
		 	->select('results.*','students.*','courses.course','academic_sessions.academic_session')		
		->where('results.acdId','=',$acdId)
		->where('results.resultType','=',$resultType)
		 
		  ->where('results.stdId','like',"%$search%")
		 
		->Orderby('results.rstId','Desc')
		 ->get();
		
		
			 
		
		 
		
	}
	
 
	
	
	
	public function  getQuestionByQuestion($search)
	{
		 return $query = DB::table('question')
		->join('terms','question.termId','=','terms.termId')
		->join ('classes','question.clsId','=','classes.clsId')
		->join('subjects','question.subjId','=','subjects.subjId')
		->select('question.*','classes.class','terms.term','subjects.subject')
		->where('question.question','like',"%$search%")
		 ->Orderby('question.question','Asc')
		->get(); 
		//->paginate(5); 
		 
	/*return  $query= DB::Select("Select question.question,question.optionA,question.optionB,question.optionC,question.optionD,question.answer,question.mark,question.quesId ,classes.class,terms.term,subjects.subjId from question join classes on question.clsId =classes.clsId join terms on question.termId = terms.termId join subjects on question.subjId= subjects.subjId WHERE question.question like '$search%' ");*/
		 	 
	}
	
	
	public function delete_table_colunms($dataArray)
	{
		  $rst= new resultModel();
		$ctr=0;
			   $numb=count($dataArray);
			   /*
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		 //$query= results::where('rstId',$dataArray[$ctr])->delete();
				 $query=  $rst->where('rstId',$dataArray[$ctr])->delete();
				  
		       
				
				$ctr++;
			 }
			 */
			 
			 
			 $query=  DB::Table('results')->whereIn('rstId',$dataArray)->delete();
			  return $query;
	}
	public function insertData($table,$data)
	{
		    return $query=DB::table($table)->insert($data);
		 
		   // $rst= new resultModel();
		 // return $query=$rst->create($data); 
		 
		 
		 
		
	}
	
	public function edit_tables($table,$data,$ids,$id)
	{
	 $query = DB::table($table)->where($ids,$id)->update($data);
		 //$insertedId=$rst->id;
		 return $query; 
		 
	}	
	
	
	public function queryByid($table,$id)
	{
		  
		   
		
		return $query = DB::table($table) 
			
			 ->select('results.*') 
		->where('results.rstId',$id) 
		->get();
		  	 		 
		   
	} 
}
