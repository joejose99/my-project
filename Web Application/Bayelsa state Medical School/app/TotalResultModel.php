<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

 
class TotalResultModel extends Model
{
    
	protected $table=['totalresults','results'];
	
	protected $fillable=['stdId','cosId','mark','totId','created_at','created_at','acdId','grade'];
	
	
	public function  setMigrationResult($acdId,$falId,$dptId,$levId,$semId,$cosId)
	{
		 $rst= new TotalResultModel();
		 $date=trim(now());
		 
		   $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		  ->join('levels','levels.levId','=','courses.levId')
		   ->join('semesters','semesters.semId','=','courses.semId')
		    ->join('results','results.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','results.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		 
		//->select('results.*','students.*','courses.course','academic_sessions.academic_session')
		->select('results.*')
		
		->where('results.acdId','=',$acdId)
		->where('departments.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId)
		->where('levels.levId','=',$levId)
		->where('semesters.semId','=',$semId)
		->where('courses.cosId','=',$cosId)
		->Orderby('results.rstId','Desc')
		 ->get();
		//->paginate(5);
		
		 
		foreach($query as $hm):
		// foreach($query as $hm => $event)
	 
	 
	  $cosId= $hm->cosId;
	  $mark= $hm->mark;
	   $stdId= $hm->stdId;
	   
	    $data=array(
			 'cosId' =>$hm->cosId,
			 'mark' => $hm->mark,
	'stdId' =>  $stdId= $hm->stdId, 
	'created_at' => $date,
	'acdId' => $acdId );
	 
	 $cnt=DB::table('totalresults')
	 ->select('*')
	 ->where('cosId',$cosId)
	 ->where('mark',$mark)
	 ->where('stdId',$stdId)
	 ->where('acdId',$acdId)
	 ->count();
       // dd($stdId);
		if($cnt ==0)
		{
		
		$query=DB::table('totalresults')->insert($data);
		 /*
		$rst->mark = $mark;
		$rst->cosId = $cosId;
		$rst->stdId = $stdId;
		$rst->acdId = $acdId;
		$rst->created_at = $date; 
		  $rst->save();  
		*/
		
		}
		 endforeach ; 
		 
	 
		 	 
	 
	return $query;
	
}


 public function getAll()
	{
		  $rst= new TotalResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('totalresults','totalresults.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','totalresults.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','totalresults.acdId') 
		->join ('levels','levels.levId','=','courses.levId')
		->join('semesters','semesters.semId','=','courses.semId') 
		->select('totalresults.*','students.studentId','students.fName','students.midName','students.surname','students.stdId','levels.level','semesters.semester','courses.course','academic_sessions.academic_session')
		->Orderby('totalresults.totId','Desc')
		->paginate(5);  
		 
	}
	
	
	public function getAllNoPaginate()
	{
		  $rst= new TotalResultModel();
		return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('totalresults','totalresults.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','totalresults.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','totalresults.acdId') 
		->join ('levels','levels.levId','=','courses.levId')
		->join('semesters','semesters.semId','=','courses.semId') 
		->select('totalresults.*','students.studentId','students.fName','students.midName','students.surname','students.stdId','levels.level','semesters.semester','courses.course','academic_sessions.academic_session')
		->Orderby('totalresults.totId','Desc')
		->get();  
		 
	}
	
	 public function getFaculty($falId,$acdId)
	{
		   
		 $rst= new TotalResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('totalresults','totalresults.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','totalresults.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','totalresults.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('totalresults.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('totalresults.acdId','=',$acdId)
		->where('faculties.falId','=',$falId)
		->Orderby('totalresults.totId','Desc')
		->get();
		//->paginate(5); 
		//->whereYear('submitresult.created_at','=',Carbon::date().toDateString()) 
		 
	}
	
	
	
	public function  getSubmitRstBySch($acdId,$falId,$dptId)
	{
		  
		  $rst= new TotalResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('totalresults','totalresults.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','totalresults.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','totalresults.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('totalresults.*','students.*','courses.course','academic_sessions.academic_session')		
		->where('totalresults.acdId','=',$acdId)
		->where('faculties.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId) 
		->Orderby('totalresults.totId','Desc')
		 ->get();
		 //->paginate(5);  
	 
		 	 
	}
	
	
	public function  getSchoolByLike($search,$acdId)
	{
		
		
		
		
		 $rst= new TotalResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		    ->join('totalresults','totalresults.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','totalresults.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','totalresults.acdId') 
		 
		 	->select('totalresults.*','students.*','courses.course','academic_sessions.academic_session')		
		->where('totalresults.acdId','=',$acdId)
		 
		  ->where('totalresults.stdId','like',"%$search%")
		 
		->Orderby('totalresults.totId','Desc')
		 ->get();
		
		
			 
		
		 
		
	}
	
	
	
	public function  getQuestionByClassId($acdId,$falId,$dptId,$levId)
	{
		 $rst= new TotalResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		  ->join('levels','levels.levId','=','courses.levId')
		    ->join('totalresults','totalresults.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','totalresults.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','results.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('totalresults.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('totalresults.acdId','=',$acdId)
		->where('departments.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId)
		->where('levels.levId','=',$levId)
		->Orderby('totalresults.totId','Desc')
		 ->get();
		 //->paginate(5);  
	 
		 	 
	}
	public function getQuestionByClassTermId($acdId,$falId,$dptId,$levId,$semId)
	{
		//
		  $rst= new TotalResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		  ->join('levels','levels.levId','=','courses.levId')
		   ->join('semesters','semesters.semId','=','courses.semId')
		    ->join('totalresults','totalresults.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','totalresults.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','totalresults.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('totalresults.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('totalresults.acdId','=',$acdId)
		->where('departments.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId)
		->where('levels.levId','=',$levId)
		->where('semesters.semId','=',$semId)
		->Orderby('totalresults.totId','Desc')
		 ->get();
		// ->paginate(5);  
	 
		 	 
	}
	
	
	
	
	
	
	public function  getQuestionByClassTermSubjId($acdId,$falId,$dptId,$levId,$semId,$cosId)
	{
		 $rst= new TotalResultModel();
		 return $query = DB::table('faculties')
		  ->join('departments','departments.falId','=','faculties.falId')
		  ->join('courses','courses.dptId','=','departments.dptId')
		  ->join('levels','levels.levId','=','courses.levId')
		   ->join('semesters','semesters.semId','=','courses.semId')
		    ->join('totalresults','totalresults.cosId','=','courses.cosId')
		 ->join('students','students.stdId','=','totalresults.stdId') 
		 ->join('academic_sessions','academic_sessions.acdId','=','totalresults.acdId') 
		//->join ('levels','levels.levId','=','courses.levId')
		//->join('semesters','semesters.semId','=','courses.semId') 
		->select('totalresults.*','students.*','courses.course','academic_sessions.academic_session')
		
		->where('totalresults.acdId','=',$acdId)
		->where('departments.falId','=',$falId)
		  
		->where('departments.dptId','=',$dptId)
		->where('levels.levId','=',$levId)
		->where('semesters.semId','=',$semId)
		->where('courses.cosId','=',$cosId)
		->Orderby('totalresults.totId','Desc')
		 ->get();
		//->paginate(5); 
		 
	 
		 	 
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
	
	
	public function delete_table_colunms($table,$dataArray,$ids)
	{
		  $rst= new TotalResultModel();
		$ctr=0;
			   $numb=count($dataArray);
			  
			    
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		  $query= DB::table($table)->where($ids,$dataArray[$ctr])->delete();
				  
				 //  $query= DB::table($table)->where($ids,$dataArray)->delete();
				 //$query=  $rst->where('totId',$dataArray[$ctr])->delete();
				  
		       
				 
				$ctr++;
			 }
			  return $query;
	}
	public function insertData($table,$data)
	{
		    return $query=DB::table($table)->insert($data);
		 
		 /*
		    $rst= new TotalResultModel();
		  return $query=$rst->create($data); 
		  
		 */
		 
		 
		
	}
public function queryByid($ids,$table,$id)
	{
		  
		   
		
		return $query = DB::table($table) 
			
			 ->select('*') 
		->where($ids,$id) 
		->get();
		  	 		 
		   
	} 

}