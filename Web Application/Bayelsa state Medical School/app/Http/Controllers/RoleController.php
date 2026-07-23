<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;
 use App\Role;
use DB;
class RoleController extends Controller
{
    //
public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function index()
	{
		
		$rst= new Role();
	      $data['query'] = $rst->getAllPagination();
		   
		  return view('election.role.index',$data);
	}
	
	public function create()
	{
		 
		 return view('election.role.insert');
	}

	public function store(Request $request)
	{
		 if($request->ajax())
		{
			 
		
		$state = $request->input('electionType');
		 
		 	
			
			$data=array(
	'role' => $request->input('electionType'),
	'status' => $request->input('status'));
			
			
			
			$rst= new Role();
			
	     $tm = $rst->queryByTerm($state);
		 
		  // dd($request->all());
		  $cnt= $tm;
		  
		  if($cnt > 0 )
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else
		  {
		   $data['query'] = $rst->insertData($data);
		   
		  
		   return json_encode('Data Successfully Saved');
		   
		  }
              
		 
		   
			
		}
	}
	
	
	
	
	 
	
	
	
	public function Show($id)
	{
		 
		$rst= new Role();
		   $data['query'] = $rst->queryByid('devices',$id);
		  
		   if (!empty($data['query']))
		   {
		       return view('election.role.update',$data);
		   }
	}

	public function edit(Request $request, $id)
	{
		 
		if($request->ajax())
		{
		 
		$state = $request->input('State');
		 $status = $request->input('status');
		 
		 //dd($request->all());	
			$sch= new Role();
	      
		    $data['query'] = $sch->editData($state,$status,$id);
		   
		  
		   return json_encode('Data Successfully Updated');
		}
	}
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $ste_Id=$request->input('ele_Id');
			 
			
			 $st= new Role();
       
		 
			 $data['query'] = $st->delete_table('role',$ste_Id);
			   if(!empty($data['query']))
		  {
			 $data['query'] = $st->getAll();
		  
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
		 	  $st= new Role();
         
		 
			 $data['query'] = $st->delete_table_colunms('devices',$dataArray);
			  if(!empty($data['query']))
		 {
			 $data['query'] = $st->getAll();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
		}
		
	}
	

	
	
	
	
	
}
?>