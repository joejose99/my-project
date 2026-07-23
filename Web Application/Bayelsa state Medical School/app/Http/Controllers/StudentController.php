<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use DB;
use View;
use Validator;

use App\StudentModel;
class StudentController extends Controller
{
   
	
	
	 public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
	
	$rst= new StudentModel();
	 $data['query'] = $rst->getAll();
	 
	 
	 
	  
		   $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		  //dd($data['query']);
		  
		 
		   
		    return view('student.index', array('query'=>$data['query'],'faculty'=>$data['faculty']));
	  
	  
  //return view('student.index',$data);
	
	}
	
	
	 public function insertform()
    {
        /*
		$title='Insert Data';
		 $data['title'] = array('title'=>$title);
		 */
		 $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
	  
	 return view('student.insert',$data);
	 
    }
	
	
	 
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		 // dd($dataArray[0]['txtStudentId']);
		
		$time_stamps =now();
		
		$data=array(
	'state' => $dataArray[0]['term'], 
	'LGA' => $dataArray[0]['cls'],
	'prgId' => $dataArray[0]['prgId'], 
	'stdId' => $dataArray[0]['txtStudentId'], 
	'fName' =>$dataArray[0]['optionA'],
	'gender' =>$dataArray[0]['gender'], 
	'mode' =>$dataArray[0]['mode'], 
	'surname' =>$dataArray[0]['optionB'],
	'midName' => $dataArray[0]['optionC'], 
	'email'=> $dataArray[0]['optionD'],
	'address'=> $dataArray[0]['txtAddress'],
	'mobileNo'=> $dataArray[0]['txtPhone'],
	'dateOfBirth'=> $dataArray[0]['txtBirth'],
	'nextOfKin'=> $dataArray[0]['txtNextKinName'],
	'nextOfKinMobile'=> $dataArray[0]['txtNextKinPhone'],
	'nextOfKinAddress'=> $dataArray[0]['txtNextKinAddress'],
	'created_at'=> $time_stamps);
	
			
			 
			$rst= new StudentModel();
	      
		   $data['query'] = $rst->insertData('students',$data);
		   
		  
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   
			
		}
	}
	
	public function show($id)
	{
		 
		$rst= new StudentModel();
		   $data['query'] = $rst->queryByid('students',$id);
		   if (!empty($data['query']))
		   {
			    
			  /*   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->school ;
	          echo'<br>'; 
        
		       endforeach; */ 
			   
			   
		       return view('student.update',$data);
		   }
	}

	public function edit(Request $request, $id)
	{
		//echo 'update';
		if($request->ajax())
		{
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
	
	 $time_stamps =now();
	 $data=array(
	'state' => $dataArray[0]['term'], 
	'LGA' => $dataArray[0]['cls'], 
	//'prgId' =>$dataArray[0]['prgId'],
	'fName' =>$dataArray[0]['optionA'],
	'surname' =>$dataArray[0]['optionB'],
	'midName' => $dataArray[0]['optionC'], 
	'email'=> $dataArray[0]['optionD'],
	'address'=> $dataArray[0]['txtAddress'],
	'mobileNo'=> $dataArray[0]['txtPhone'],
	'dateOfBirth'=> $dataArray[0]['txtBirth'],
	'nextOfKin'=> $dataArray[0]['txtNextKinName'],
	'nextOfKinMobile'=> $dataArray[0]['txtNextKinPhone'],
	'nextOfKinAddress'=> $dataArray[0]['txtNextKinAddress'],
	'updated_at'=> $time_stamps,
	'stdId'=> $dataArray[0]['id']);
	 
	 
	 
		
		 //dd($request->all());	
			$rst= new StudentModel();
	      
		  $ids='stdId';
		    $data['query'] = $rst->editData('students',$data,$id,$ids);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	/* TRANSFER STUDENT TO OTHER DEPARTMENT AND FACULTY */
	
	public function showTransfer($id)
	{
		 
		$rst= new StudentModel();
		   $data['query'] = $rst->queryByid('students',$id);
		   if (!empty($data['query']))
		   {
			    
			  /*   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->school ;
	          echo'<br>'; 
        
		       endforeach; */ 
			   
			   
		       return view('student.update',$data);
		   }
	}

	public function editTransfer(Request $request, $id)
	{
		//echo 'update';
		if($request->ajax())
		{
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
	
	 $time_stamps =now();
	 $data=array(
	'state' => $dataArray[0]['term'], 
	'LGA' => $dataArray[0]['cls'], 
	 'prgId' =>$dataArray[0]['prgId'],
	'fName' =>$dataArray[0]['optionA'],
	'surname' =>$dataArray[0]['optionB'],
	'midName' => $dataArray[0]['optionC'], 
	'email'=> $dataArray[0]['optionD'],
	'address'=> $dataArray[0]['txtAddress'],
	'mobileNo'=> $dataArray[0]['txtPhone'],
	'dateOfBirth'=> $dataArray[0]['txtBirth'],
	'nextOfKin'=> $dataArray[0]['txtNextKinName'],
	'nextOfKinMobile'=> $dataArray[0]['txtNextKinPhone'],
	'nextOfKinAddress'=> $dataArray[0]['txtNextKinAddress'],
	'updated_at'=> $time_stamps,
	'stdId'=> $dataArray[0]['id']);
	 
	 
	 
		  $ids='stdId';
		 //dd($request->all());	
			$rst= new StudentModel();
	      
		    $data['query'] = $rst->editData('students',$data,$id, $ids);
		   
		  
		   return json_encode('Succcess');
		}
	}
	
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new StudentModel();
         
			 $data['query'] = $st->getSchoolByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	public function transferSt(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new StudentModel();
         
			$data['query'] = DB::table('students')
		  ->select('students.*') 
		  	->where('students.stdId',$search)  
		  ->get();
			 
		 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	public function transfer()
	{
		 $data['faculty'] = DB::table('faculties')
		  ->select('faculties.*') 
		  ->get();
		return view('transfer.index',$data);
	}
	
	
	
	
	public function searchStById(Request $request)
	{
	if($request->ajax())
		{
		 
			$id=$request->input('stdId');
			
			
			 $data['query'] = DB::table('students')
		    ->join('programs','programs.prgId','=','students.prgId')  
			 ->select('students.*','programs.program') 
		  ->where('students.studentId',$id)
		  ->get();
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	
	public function searchStId(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('search');
			 $st= new StudentModel();
         
			 $data['query'] = $st->getStudentByLike($search);
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function transferSt_edit(Request $request)
	{
		if($request->ajax())
		{
			$falId=$request->input('faculty');
			$dptId=$request->input('department');
			$prgId=$request->input('program');
			$stdId=$request->input('search');
			
			
			$query=DB::table('students')->where('stdId',$stdId)->update([
		  'prgId' => $prgId, 
		 
		 ]);
		 
		 return json_encode('Data Successefully Saved');
	    }
	}
	
	public function generateStdId(Request $request)
	{
			if($request->ajax())
		{
		 
		 
		  $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		
		 $rst= new StudentModel();
			//$faculty=$request->input('faculty');
			
			$falId =$dataArray[0]['faculty']; 
			$dptId =$dataArray[0]['department']; 
	 		$prgId = $dataArray[0]['program'];
			
			/* GET FACULTY ABBREVIATE VALUE */
			  $data['query'] = DB::table('programs') 
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   
		   ->select('faculties.abbreviate','faculties.falId','faculties.faculty','departments.department')
		   	 
		   	->where('faculties.falId',$falId)  
				->where('departments.dptId',$dptId)  
				->where('programs.prgId',$prgId) 
				  ->where('departments.department' ,'<>','NA')  
		  ->get();
	
	
	
	
	/*
	   foreach ($data['query'] as $hm): 
	 
	         $Abb=  $hm->abbreviate ;
	         // echo'<br>'; 
        
		       endforeach;   */
			   
			     $Abb=  $data['query'][0]->abbreviate;
	
	/* determine if student with this program is already in database */
	 $cnt = DB::table('programs') 
	 ->join('students','students.prgId','=','programs.prgId')  
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   
		   ->select('faculties.abbreviate','faculties.falId','faculties.faculty')
		   	 
		   	->where('faculties.falId',$falId)  
				//->where('departments.dptId',$dptId)  
				//->where('programs.prgId',$prgId)  
				->count();
	
	 
		    $currentY = substr(date("Y"),2,2);
		  if($cnt > 0)
		  {
			  /* GET THE LAST STUDENT ID ENTERED */
			  
			   
			    $data['maxId']= DB::table('students')
			 ->join('programs','programs.prgId','=','students.prgId')	 
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   
		   ->select('students.stdId')
			   
		   	 
			 ->where('students.mode','Auto')
		   	->where('faculties.falId',$falId)  
				//->where('departments.dptId',$dptId)  
				//->where('programs.prgId',$prgId) 
				->orderby('students.studentId','Desc')  
		  ->get();
			   
			   
			 
			   /*
			   
			    foreach ($data['maxId'] as $hm): 
	 
	         $studentId=  $hm->stdId ;
	         // echo'<br>'; 
        
		//SOS19111
		       endforeach;
			   */
			   
			    $studentId=   $data['maxId'][0]->stdId;
			  // dd($studentId); 
			   
			   
			   $yearDB=substr($studentId,3,2);
			   $numbDB=substr($studentId,5,3);
			   
			    
			  // dd($yearDB);			   
				
				
				
			    if(trim($yearDB) == trim($currentY))
			  // if(trim($yearDB) == trim(date("Y")))
			  {
				  $numbDB =$numbDB +1;
				   $id= $Abb.$yearDB.$numbDB ;
				   
				   
			  }  
			  
			   if(trim($yearDB) != trim($currentY))
			  {
				   $id= $Abb.$currentY."111";
					//$Abb.date("Y")."111";
					
					 
				   
			  }  
			   
	
	        }
			if($cnt == 0)
		   {
			 $id= $Abb.$currentY."111";
			  
			 // dd($currentY);
			    //dd($id);
		    }  
			
			
			
          
		 $data['stdId'] = array('stdId'=>$id);
			/*
		   $data['faculty'] = DB::table('faculty')
		  ->select('faculty.*') 
		  ->get();
		  */
			 
			 
			 
		 
            return json_encode($data['stdId']);
		  
	
		}
	}
	
	
	
	public function searchFaculty(Request $request)
	{
		if($request->ajax())
		{
		 
		 
		
		 $rst= new StudentModel();
			 $falId=$request->input('faculty');
			 
			  $data['query']= DB::table('students')
			 ->join('programs','programs.prgId','=','students.prgId')	 
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   
		   ->select('students.*')
			   
		   	 
			  ->where('faculties.falId',$falId)  
				//->where('departments.dptId',$dptId)  
				//->where('programs.prgId',$prgId) 
				->orderby('students.studentId','Desc')  
		  ->get();
		  
		  
		  $data['rstDpt'] = DB::table('departments')
		  ->select('departments.*') 
		  ->where('departments.falId',$falId)
		   ->where('departments.department' ,'<>','NA')  
		  ->get();
		  
		  
		   
		  
		 
		   
		  return json_encode(array('query'=>$data['query'],'rstDpt'=>$data['rstDpt']));
		   
		   
		  
		}
	}
	
	public function searchDepartment(Request $request)
	{
		if($request->ajax())
		{
		  
		 $rst= new StudentModel();
			 $falId=$request->input('faculty');
			  $dptId=$request->input('department');
			  
			   $data['query']= DB::table('students')
			 ->join('programs','programs.prgId','=','students.prgId')	 
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   
		   ->select('students.*')
			   
		   	 
			  ->where('faculties.falId',$falId)  
				 ->where('departments.dptId',$dptId)  
				//->where('programs.prgId',$prgId) 
				->orderby('students.studentId','Desc')  
		  ->get();
		  
		  
		  $data['rstDpt'] = DB::table('programs')
		  ->select('programs.*')
		   ->where('programs.dptId',$dptId)   
		  ->get();
		  //dd($data['query']);
		  
		 
		   return json_encode(array('query'=>$data['query'],'rstDpt'=>$data['rstDpt']));
		  
		    
		}
	}
	public function searchProgram(Request $request)
	{
		if($request->ajax())
		{
		 
		  
		 $rst= new StudentModel();
			 $falId=$request->input('faculty');
			  $dptId=$request->input('department');
			  $prgId=$request->input('program');
			  
			   $data['query']= DB::table('students')
			 ->join('programs','programs.prgId','=','students.prgId')	 
		  ->join('departments','departments.dptId','=','programs.dptId')  
		  ->join('faculties','faculties.falId','=','departments.falId')
		   
		   ->select('students.*')
			   
		   	 
			  ->where('faculties.falId',$falId)  
				 ->where('departments.dptId',$dptId)  
				 ->where('programs.prgId',$prgId) 
				->orderby('students.studentId','Desc')  
		  ->get();
		  
		  
		   
		  
		 return json_encode(array('query'=>$data['query']));
		  
		   
		     
		}
	}
	  
	
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			 $st= new StudentModel();
       
		 
			 $data['query'] = $st->delete_table('students',$schId);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroyMultiple(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new StudentModel();
        
		 
			 $data['query'] = $st->delete_table_colunms('students',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAllNoPaginate();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}

/* STUDENT ACTION STARTS HERE */


public function action_on_student()
{
	$data['query'] = DB::table('action_on_student')
		  
		   ->join('semesters','semesters.semId','=','action_on_student.semId')
		   ->join('students','students.stdId','=','action_on_student.stdId')
		    ->join('academic_sessions','academic_sessions.acdId','=','action_on_student.acdId')
		  ->select('action_on_student.*','semesters.semester','academic_sessions.academic_session','students.fName','students.surname') 
		  ->get();
		  
		  
		  
		   return view('student.action',array('query'=>$data['query']));
}		

public function search_Action_on_student_details(Request $request)
{
	 if($request->ajax())
		{
			  
		
		$stdId = $request->input('stdId');
 

		$data['query'] = DB::table('action_on_student')
		   ->join('academic_sessions','academic_sessions.acdId','=','action_on_student.acdId')
		   ->join('semesters','semesters.semId','=','action_on_student.semId')
		   ->join('students','students.stdId','=','action_on_student.stdId')
		  ->select('action_on_student.*','semesters.semester','academic_sessions.academic_session','students.fName','students.surname')
		  ->where('action_on_student.aosId',$stdId)
		  ->get();	
		  
		  return json_encode($data['query']);
}
}	

public function insertform_Action_on_student()
    {
        /*
		$title='Insert Data';
		 $data['title'] = array('title'=>$title);
		 */
		 $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		  
		  $data['academic'] = DB::table('academic_sessions')
		  ->select('academic_sessions.*') 
		  ->get();
		  
		  
	  
	 return view('student.insert_std_action',array('semester'=>$data['semester'],'academic'=>$data['academic']));
	 
    }
	

public function insert_Action_on_student(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
		 // dd($dataArray[0]['txtStudentId']);
		
		
		 
		
		
		$time_stamps =now();
		
		$data=array(
	'activate_details' => $dataArray[0]['dActivate'], 
	'publish_details' => $dataArray[0]['dPublish'],
	'acdId' => $dataArray[0]['acdId'], 
	'stdId' => $dataArray[0]['stdId'], 
	'semId' =>$dataArray[0]['semId'],
	'publish' =>$dataArray[0]['publish'], 
	'activate' =>$dataArray[0]['activate'], 
	'created_at'=> $time_stamps);
	
			
			 
			$rst= new StudentModel();
	      
		   $data['query'] = $rst->insertData('action_on_student',$data);
		   
		  
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   
			
		}
	}




public function show_Action_on_student($id)
	{
		 
		   
		   $data['query'] = DB::table('action_on_student')
		   ->join('academic_sessions','academic_sessions.acdId','=','action_on_student.acdId')
		   ->join('semesters','semesters.semId','=','action_on_student.semId')
		    ->join('students','students.stdId','=','action_on_student.stdId')
		  ->select('action_on_student.*','semesters.semester','academic_sessions.academic_session','students.fName','students.surname') 
		  ->where('action_on_student.aosId',$id)
		  ->get();
		  
		 
		  
		   if (!empty($data['query']))
		   {
			    
			  
			   
			    $data['semester'] = DB::table('semesters')
		  ->select('semesters.*') 
		  ->get();
		       return view('../student.edit_std_action',array('query'=>$data['query'],'semester'=>$data['semester']));
		   }
	}

	public function edit_Action_on_student(Request $request, $id)
	{
		//echo 'update';
		if($request->ajax())
		{
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		$id= $request->input('id');
		$dataArray = json_decode($content, true);
	
	 $time_stamps =now();
		$data=array(
	'activate_details' =>  trim($dataArray[0]['dActivate']), 
	'publish_details' =>  trim($dataArray[0]['dPublish']),
	'acdId' =>  trim($dataArray[0]['acdId']), 
	'stdId' => trim($dataArray[0]['stdId']), 
	'semId' => trim($dataArray[0]['semId']),
	'publish' => trim($dataArray[0]['publish']), 
	'activate' => trim($dataArray[0]['activate']), 
	'updated_at'=> $time_stamps);
	 
	 
	 
		 $ids='aosId';
		 //dd($request->all());	
			$rst= new StudentModel();
	      
		    $data['query'] = $rst->editData('action_on_student',$data,$id,$ids);
		   
		  
		   return json_encode('Succcess');
		}
	}
	


public function searchStudentId(Request $request)
	{
	 
		 
			if($request->ajax())
		{
		 
		 
		 
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
	
	 
	  
	   $id = $dataArray[0]['stdId'];
			 $st= new StudentModel();
			 
			  
         
			 $data['query'] = $st->queryByid('students',$id);
			 
		 
            
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	public function search_Action_on_student(Request $request)
	{
	 
		 
			if($request->ajax())
		{
		  
		
		$search = $request->input('search');
		
		$data['query'] = DB::table('action_on_student')
		   ->join('academic_sessions','academic_sessions.acdId','=','action_on_student.acdId')
		   ->join('semesters','semesters.semId','=','action_on_student.semId')
		   ->join('students','students.stdId','=','action_on_student.stdId')
		  ->select('action_on_student.*','semesters.semester','academic_sessions.academic_session','students.fName','students.surname')
		 ->where('students.fName','like',"%$search%")
		 ->Orderby('action_on_student.aosId','DESC')
		  ->get();	
		  
		    return json_encode($data['query']);
		
		}
	}
	
	
	public function search_Action_on_student_like(Request $request)
	{
	 
		 
			if($request->ajax())
		{
		  
		
		$search = $request->input('search');
		
		$data['query'] = DB::table('action_on_student')
		   ->join('academic_sessions','academic_sessions.acdId','=','action_on_student.acdId')
		   ->join('semesters','semesters.semId','=','action_on_student.semId')
		   ->join('students','students.stdId','=','action_on_student.stdId')
		  ->select('action_on_student.*','semesters.semester','academic_sessions.academic_session','students.fName','students.surname')
		 ->where('action_on_student.stdId','like',"%$search%")
		 ->Orderby('action_on_student.aosId','DESC')
		  ->get();	
		  
		    return json_encode($data['query']);
		
		}
	}
	
	
	public function delete_action_on_student(Request $request)
	{
		 
		  if($request->ajax())
		{
		 
		 
		 
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
	
		//dd($dataArray);	   
			 
			   DB::table('action_on_student')->whereIn('aosId',$dataArray)->delete();
			 
			 $data['query'] = DB::table('action_on_student')
		   ->join('academic_sessions','academic_sessions.acdId','=','action_on_student.acdId')
		   ->join('semesters','semesters.semId','=','action_on_student.semId')
		   ->join('students','students.stdId','=','action_on_student.stdId')
		  ->select('action_on_student.*','semesters.semester','academic_sessions.academic_session','students.fName','students.surname')
		  
		 ->Orderby('action_on_student.aosId','DESC')
		  ->get();	
			   return json_encode( $data['query']);
	}
	}

}
