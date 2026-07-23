<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ExamTestModel extends Model
{
    
	
	
	protected $table='setexamtestdates';
	 
	
	protected $fillable=['markPerQuestion','examTest','exmId','quesNo', 'cosId','cosId'];
	
	 
	 public function getAll()
	{
		  
		 return $query = DB::table('courses')
		->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		->select('setexamtestdates.*','courses.course')
		->Orderby('setexamtestdates.exmId','Desc')
		->paginate(10);  
		 
	}
	 public function getAllNoPaginate()
	{
		  return $query = DB::table('courses')
		->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		->select('setexamtestdates.*','courses.course')
		->Orderby('setexamtestdates.exmId','Desc')
		->get();  
		 
	}
	
	
	
	public function  getQuestionByClassId($clsId)
	{
		 return $query = DB::table('faculties')
		->join('departments','departments.falId','=','faculties.falId') 
		  ->join('courses','courses.dptId','=','departments.dptId') 
		  ->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		->select('setexamtestdates.*','courses.course','departments.dptId','departments.department','faculties.falId','faculties.faculty')
	
		
		->where('faculties.falId','=',$clsId)
		 
		 ->get();
		 //->paginate(5);  
	 
		 	 
	}
	public function  getQuestionByClassTermId($clsId,$termId)
	{
		 return $query = DB::table('faculties')
		->join('departments','departments.falId','=','faculties.falId') 
		  ->join('courses','courses.dptId','=','departments.dptId') 
		  ->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		->select('setexamtestdates.*','courses.course','departments.dptId','departments.department','faculties.falId','faculties.faculty')
	
		
		
		->where('faculties.falId','=',$clsId)
		->where('departments.dptId','=',$termId)
		 
		 ->get();
		// ->paginate(5);  
	 
		 	 
	}
	 
	
	
	
	public function  getQuestionByClassTermSubjId($clsId,$termId,$subjId)
	{
		  return $query = DB::table('courses')
		->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		->select('setexamtestdates.*','courses.course')
		
		 ->where('setexamtestdates.cosId','=',$subjId)
		->Orderby('setexamtestdates.exmId','Desc')
		->get(); 
		//->paginate(5); 
		 
	 
		 	 
	}
	public function  getQuestionByQuestion($search)
	{
		 return $query = DB::table('courses')
		->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		->select('setexamtestdates.*','courses.course')
		
		 ->where('setexamtestdates.cosId','like',"%$search%")
		 ->Orderby('setexamtestdates.exmId','Asc')
		->get(); 
		 
		 	 
	}
	
	 
	 
	
	
	public function insertData($table,$data)
	{
		    
		 return $query=DB::table($table)->insert($data);
		 
		 
		 
		
	}
	 
	public function delete_table($tables,$quesId)
	{
		 //$query=$this->destroy($tables,$quesId);
		 $query= DB::table('setexamtestdates')->where('exmId',$quesId)->delete();
		 return $query;
	}
	
	public function delete_table_colunms($tables,$dataArray)
	{
		 
		 $ctr=0;
			   $numb=count($dataArray);
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		$query= DB::table('setexamtestdates')->where('exmId',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }
			  return $query;
	}
	
	
	
	public function edit_tables($data,$id)
	{
		 
		 
		
		
		 return $query=DB::table('setexamtestdates')->where('exmId', $id)->update([
		// 'clsId' => $data['cls'],
		 'cosId' => $data['cosId'],  
	'examTest' => $data['examTest'],  
	'duration' => $data['duration'], 
	'quesNo' =>$data['quesNo'],
	'markPerQuestion' => $data['markPerQuestion'],
	'date' => $data['date'], ]);
		 
		
		 
		
	}
	
	public function queryByid($table,$id)
	{
		 
		   
		 return  $query=DB::table('faculties')
		 
		 ->join('departments','departments.falId','=','faculties.falId') 
		  ->join('courses','courses.dptId','=','departments.dptId') 
		  ->join('setexamtestdates','setexamtestdates.cosId','=','courses.cosId') 
		->select('setexamtestdates.*','courses.course','departments.dptId','departments.department','faculties.falId','faculties.faculty')
		 
		 ->where('exmId',$id)->get();
	}
	
	public function queryByOption($examTest, $subjId)
	{  
		return $query= DB::table('setexamtestdates')
		
		->where('examTest',$examTest) 
		 
		->where('cosId',$subjId) 
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