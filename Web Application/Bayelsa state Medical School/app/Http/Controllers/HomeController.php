<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
 use App\Home;
use Validator;
 use Session;
 use DB;

class HomeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
		$title='home';
		 $data['title'] = array('title'=>$title);
		 
		$rst= new Home();
	 $data['query'] = $rst->getAll('home');
	  return view('home.index',$data);
	  //return view('home.home',$data)->with('home',Home::paginate(5));
	  
	// foreach ($data['home'] as $hm):
	 
	// echo  $hm->details;
	 
        
		//endforeach ;
    }
	
	 public function insertform()
    {
        
		$title='Insert Data';
		 $data['title'] = array('title'=>$title);
	  
	 return view('home.insert',$data);
	 
    }
	
	
	public function insert(Request $request)
	{
		
		if($request->ajax())
		{
		 $title='Insert Data';
		 $data['title'] = array('title'=>$title);
		 
		 
	 
	 
		  $validator =Validator::make($request->all(),[
		  'details' =>'required',
		   'title' => 'required|not_in:null']);
		   
 
        if ($validator->fails()) 
		{
            
			return redirect('insert')->withErrors($validator)->withInput();			    
					   
        }
       
    
	$data=array(
	'title' => $request->input('title'),
	'details'=> $request->input('details'));
	
	  
	 $st= new Home();
	 $data['st'] = $st->insertData('home',$data);
	 	
		 if( !empty($data['st']))
		 {
		  $message="Record Inserted Successfully";
		  
		   
		   return json_encode($message);
		   
		 } 
		 
		 } 
	} 
	
	
	 public function getShow($id)
    {
         
		$title='Insert Data';
		// $data['title'] = array('title'=>$title);
		 $rst= new Home();
		  $data['query'] = $rst->queryByid('home',$id);
	   
	  
		 
	  return view('home.update', array('query'=>$data['query'],'title'=>$title));
	 
    }
	
	public function edit(Request $request,$id)
	{
		
	if($request->ajax())
		{	
	$data=array(
	'details' => $request->input('details'),
	'title'=> $request->input('title')
	);
		$st=new Home();
		$data['edit']=$st->update_table('home',$id,$data);
		 $message="Record Updated Successfully";
		
		 //$data['msg']=$message;
		 if(!empty($data['edit']))
		 {
		 	 	//$data['id']=$id;
				 
		// return redirect()->action('HomeController@getShow',$id)->with('flash_message','Record Updated Successfully');
				 
			 return json_encode($message);	 
		 } 
	} 
	} 
	
	public function destroy(Request $request,$id)
	{
	 
		if($request->ajax())
		{
			
			 $id=$request->input('quesId');
			
			
		$st= new Home();
	 $data['del'] = $st->delete_table('home',$id);
	 
	
	 	 
	
	if(!empty($data['del']))
		 {
			 $data['query'] = DB::table('home')
		  ->select('home.*') 
		  ->Orderby('id','Asc')
		   ->get();
		   
		 // dd( $data['query'] ); 
		  
                return json_encode($data['query']);
	
	 
		 }
	}
	}
	
	public function destroyHome(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	   
        
		$ctr=0;
			   $numb=count($dataArray);
			   
			     $data['del']= DB::table('home')->whereIn('id',$dataArray)->delete();
			  
		
		 
			  
			  if(!empty($data['del']))
		 {
			 $data['query'] = DB::table('home')
		  ->select('home.*') 
		  ->Orderby('id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
