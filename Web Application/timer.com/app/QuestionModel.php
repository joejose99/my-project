<?php

namespace App;
use Illuminate\Pagination\Paginator;
 use Illuminate\Database\Eloquent\Model;
 use Exception;
 use DB;

class QuestionModel extends Model
{
   protected $table='questions';
	 
	
	protected $fillable=['question','optionA','optionB','optionC','optionD','answer','userProspectAns','mark','class','answer','department','cosId','falId','dptId','cosId'];
	
	 
	 public function getAll()
	{
		  
		 return $query = DB::table('questions')
		->join('courses','courses.cosId','=','questions.cosId')
		->join('semesters','semesters.semId','=','courses.semId')
		->join('levels','levels.levId','=','courses.levId')
		->join ('departments','departments.dptId','=','courses.dptId')
		->join('faculties','faculties.falId','=','departments.falId')
		->select('questions.*','faculties.faculty','departments.department','courses.cosId')
		->Orderby('questions.queId','Desc')
		->paginate(5);  
		 
	}
	 public function getAllNoPaginate()
	{
		  
		 return $query = DB::table('questions')
		->join('courses','courses.cosId','=','questions.cosId')
		->join('semesters','semesters.semId','=','courses.semId')
		->join('levels','levels.levId','=','courses.levId')
		->join ('departments','departments.dptId','=','courses.dptId')
		->join('faculties','faculties.falId','=','departments.falId')
		->select('questions.*','faculties.faculty','departments.department','courses.cosId')
		->Orderby('questions.queId','Desc')
		->get();  
		 
	}
	
	
	public function  getQuestionByClassId($clsId)
	{
		 return $query = DB::table('questions')
		->join('courses','courses.cosId','=','questions.cosId')
		->join('semesters','semesters.semId','=','courses.semId')
		->join('levels','levels.levId','=','courses.levId')
		->join ('departments','departments.dptId','=','courses.dptId')
		->join('faculties','faculties.falId','=','departments.falId')
		->select('questions.*','faculties.faculty','departments.department','courses.cosId')
		
		->where('faculties.falId','=',$clsId)
		 ->Orderby('questions.queId','Desc')
		 ->get();
		 //->paginate(5);  
	 
		 	 
	}
	public function  getQuestionByClassTermId($clsId,$termId)
	{
		 return $query = DB::table('questions')
		->join('courses','courses.cosId','=','questions.cosId')
		->join('semesters','semesters.semId','=','courses.semId')
		->join('levels','levels.levId','=','courses.levId')
		->join ('departments','departments.dptId','=','courses.dptId')
		->join('faculties','faculties.falId','=','departments.falId')
		->select('questions.*','faculties.faculty','departments.department','courses.cosId')
		
		->where('faculties.falId','=',$clsId)
		->where('departments.dptId','=',$termId)
		->Orderby('questions.queId','Desc')
		 ->get();
		// ->paginate(5);  
	 
		 	 
	}
	public function  getQuestionByClassTermSubjId($clsId,$termId,$subjId)
	{
		  return $query = DB::table('questions')
		->join('courses','courses.cosId','=','questions.cosId')
		->join('semesters','semesters.semId','=','courses.semId')
		->join('levels','levels.levId','=','courses.levId')
		->join ('departments','departments.dptId','=','courses.dptId')
		->join('faculties','faculties.falId','=','departments.falId')
		->select('questions.*','faculties.faculty','departments.department','courses.cosId')
		
		->where('faculties.falId','=',$clsId)
		->where('departments.dptId','=',$termId)
		//->where('courses.cosId','=',$subjId)
		->where('questions.cosId','=',$subjId)
		->Orderby('questions.queId','Desc')
		->get(); 
		//->paginate(5); 
		 
	 
		 	 
	}
	public function  getQuestionByQuestion($search)
	{
		 return $query = DB::table('questions')
		->join('courses','courses.cosId','=','questions.cosId')
		->join('semesters','semesters.semId','=','courses.semId')
		->join('levels','levels.levId','=','courses.levId')
		->join ('departments','departments.dptId','=','courses.dptId')
		->join('faculties','faculties.falId','=','departments.falId')
		->select('questions.*','faculties.faculty','departments.department','courses.cosId')
		
		 ->where('questions.question','like',"%$search%")
		 ->Orderby('questions.question','Asc')
		->get(); 
		//->paginate(5); 
		 
	/*return  $query= DB::Select("Select question.question,question.optionA,question.optionB,question.optionC,question.optionD,question.answer,question.mark,question.quesId ,classes.class,terms.term,subjects.subjId from question join classes on question.clsId =classes.clsId join terms on question.termId = terms.termId join subjects on question.subjId= subjects.subjId WHERE question.question like '$search%' ");*/
		 	 
	}
	
	 
	public function get_Question($data,$Subjects)
	{  
	 //$query=question::where('clsId',$data['clsId'])->classes()->where('clsId','=',$data['clsId'])->term()->where('termId','=',$data['termId'])->subject()->where('subjId','=',$data['subjId'])->get();	
	 
	// if(trim($Subjects)=='English Language' || trim($Subjects)=='English Literature')
	 	
		
	
	if(trim($Subjects)=='English Language')
	 {
		 
		 
		 /* CREATING DISTINCT QUERY TO SELECT DISTINCT YEAR */
		 
		  $query =DB::table('questions')->distinct()
		 ->select('ques_Year')
		  
		->where('cosId',$data['cosId']) 
		 ->inRandomOrder()
		 ->groupBy('ques_Year')
		   ->get() ;
		    
		  $dstYear= $query[0]->ques_Year;
		 
		 
		 
		 
		 $query=DB::table('questions')->where('cosId',$data['cosId'])
		  ->where('ques_Year',$dstYear)
		      //->inRandomOrder()
		   //->LIMIT(1)		   
		   ->get();
		 
		 
		$year= trim($query[0]->ques_Year);
		$month= trim($query[0]->ques_Month);
		 
		 
		 
		return $query=DB::table('questions')->where('cosId',$data['cosId'])
		   //->where('subjId',$data['subjId'])
		    ->where('ques_Year',$year)
			->where('ques_Month',$month)
		    ->Orderby('queId','ASC')		
		    ->inRandomOrder()
		   ->LIMIT($data['numbOfQues'])		   
		   ->get();
		  
		   
		 }
		 else
		 {
		 
		  
		//return  $query=DB::table('questions')
		 $question= new QuestionModel() ;
		 $query=$question->join('courses','courses.cosId','=','questions.cosId') 
		->join('semesters','semesters.semId','=','courses.semId')
		->join('levels','levels.levId','=','courses.levId')
		->select('questions.*')
		->where('questions.cosId',$data['cosId'])
		  // ->where('subjId',$data['subjId'])
		   ->inRandomOrder()
		   ->LIMIT($data['numbOfQues'])		   
		   ->get();
		  
		   
		 }
		 
		 
		  return $query;
	 
	}
	
	
	public function insertData($table,$data)
	{
		    //$query=DB::table($table)->insert($data);
		 
		 
		 
		  // $rst= new aboutus();
		  /*
		  $rst= new QuestionModel();
		 return $query=$rst->create($data);
		 */
		 return $query=DB::table($table)->insert($data);
		 
		 
		 /*
		 $rst= new QuestionModel();
		//$this->clsId =$data['cls'];
		$this->cosId =$data['subject'];
		$this->ques_Year =$data['year'];
		 $this->ques_Month =$data['month']; 
		$this->question =$data['details'];
		
		$this->optionA =$data['optionA'];
		$this->optionB =$data['optionB'];
		$this->optionC =$data['optionC'];
		$this->optionD =$data['optionD'];
		$this->optionE =$data['optionE'];
		
		$this->answer =$data['answer'];
		$this->mark =$data['mark'];
		 
		 $query =$this->save();
		 $insertedId=$rst->id;
		 return $query; 
		  
		 
		  */
		 
		
	}
	 
	public function delete_table($tables,$quesId)
	{
		 //$query=$this->destroy($tables,$quesId);
		 $query= DB::table('questions')->where('queId',$quesId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= DB::table('questions')->where('queId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	
	public function edit_tables($data,$id)
	{
		 
		 // $rst= new Question();
		/*$rst=$this->find($id);
		 
		 $this->clsId =$data['cls'];
		$this->subjId =$data['subject'];
		$this->termId =$data['term'];
		$this->question =$data['details'];
		
		$this->optionA =$data['optionA'];
		$this->optionB =$data['optionB'];
		$this->optionC =$data['optionC'];
		$this->optionD =$data['optionD'];
		
		$this->answer =$data['answer'];
		$this->mark =$data['mark']; 
		 
		$query =$rst->update(); */
		
		
		 return $query=DB::table('questions')->where('queId', $id)->update([
		// 'clsId' => $data['cls'],
		 'cosId' =>$data['subject'],
		 'year' =>$data['year'],
		  'month' =>$data['month'],
		// 'termId' =>$data['term'],
		 'question' =>$data['details'],
		
		 'optionA' =>$data['optionA'],
		 'optionB' =>$data['optionB'],
		 'optionC' =>$data['optionC'],
		 'optionD' =>$data['optionD'],
		 'optionE' =>$data['optionE'],
		
		 'answer' =>$data['answer'],
		 'mark' =>$data['mark'],
        //others property
    ]);
		 
		
		 
		
	}
	
	public function queryByid($table,$id)
	{
		 
		//$query=$this->find($id);		 
		// return $query;
	 
 
		  
		 return  $query=DB::table('questions')
		  ->join ('courses','courses.cosId','=','questions.cosId')
		 ->join ('departments','departments.dptId','=','courses.dptId')
		->join('faculties','faculties.falId','=','departments.falId')
		->select('questions.*','departments.department','departments.dptId','faculties.falId','faculties.faculty','courses.cosId','courses.course')
		 
		 ->where('queId',$id)->get();
	}
	
	public function queryByOption($question,$optionA,$optionB, $subjId,$year,$month)
	{  
		return $query= DB::table('questions')
		
		->where('question',$question)
		->where('optionA',$optionA)
		->where('optionB',$optionB)
		//->where('clsId',$cls)
		//->where('termId',$term)
		->where('cosId',$subjId)
		->where('year',$year)
		 ->where('month',$month)
		->count();
		
	}
	
	public function  getQeuryByCourses($dptId,$falId)
	{
		 return $query = DB::table('courses')
		 ->join ('departments','departments.dptId','=','courses.dptId')
		->join('faculties','faculties.falId','=','departments.falId')
		->select('courses.course','courses.cosId')
		
		 ->where('departments.dptId',$dptId)
		  ->where('faculties.falId',$falId)
		 ->Orderby('courses.cosId','Asc')
		->get(); 
		//->paginate(5); 
		 
	 }
	
}
