<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use View;
use Validator;

use App\InstructionModel;
class InstructionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function index()
	{
		
		$rst= new InstructionModel();
	      $data['query'] = $rst->getAll();
		   
		  return view('instruction.instruction',$data);
	}
	
	public function create()
	{
		 
		 return view('instruction.insert');
	}

	public function storeData(Request $request)
	{
		 if($request->ajax())
		{
			 
		
		$class = $request->input('class');
		 
		  $data=array(
			 'instruction' => $request->input('class'),
			 );
		 	
			$rst= new InstructionModel();
			$table='instructions';
			
			
	     $tm = $rst->queryByTerm($class);
		 
		 // dd($request->all());
		  $cnt= $tm;
		  
		  if($cnt > 0 )
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else
		  {
		   $data['query'] = $rst->insertData($table,$data);
		   
		  
		   return json_encode('Data Successfully Saved');
		   
		  }
              
		 
		   
			
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function getShow($id)
	{
		 
		$rst= new InstructionModel();
		   $data['query'] = $rst->queryByid('instructions',$id);
		  
		   if (!empty($data['query']))
		   {
		       return view('instruction.update',$data);
		   }
	}

	public function edit(Request $request, $id)
	{
		 
		if($request->ajax())
		{
		 
		$class = $request->input('class');
		 
		 
		 //dd($request->all());	
			$sch= new InstructionModel();
	      
		    $data['query'] = $sch->editData($class,$id);
		   
		  
		   return json_encode('Data Successfully Updated');
		}
	}
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $clsId=$request->input('clsId');
			 
			
			 $st= new InstructionModel();
       
		  
			 $data['query'] = $st->delete_table('instructions',$clsId);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAll();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	public function destroyClass(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  $st= new InstructionModel();
         
		 
			 $data['query'] = $st->delete_table_colunms('instructions',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAll();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
		}
		
	}
}