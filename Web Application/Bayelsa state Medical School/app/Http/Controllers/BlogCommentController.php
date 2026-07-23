<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
 use View;
  use Illuminate\Database\Eloquent\Model;

 use DB;


class BlogCommentController extends Controller
{
	
	 public function __construct()
    {
        $this->middleware('auth');
    }
  public function index()
    {
		
		 
		// $tm = DB::table('blogs')->count();
		  
		$data['query'] = DB::table('comments')
		  ->select('comments.*') 
		  ->Orderby('com_Id','Asc')
		  //->get();
		   ->paginate(5);
		   
		   
		   $data['menu'] = DB::table('timer_menu')
		  ->select('timer_menu.*') 
		  ->Orderby('id','Asc')
		  ->get();
		  
		  

	     return view('comments.index', array('query'=>$data['query'],'menu'=>$data['menu']));
		
	 	//return view('blog.index');
		
		
	 }
	 
	 
	 public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('menu');
			
			/*
			 $ctr = DB::table('timer_menu')
			 ->join('menu_blog','menu_blog.id_menu','=','timer_menu.id') 
			  
		  ->select('menu_blog.*') 
		  
		  ->where('timer_menu.id',$search)
			 ->count();
			
			  if($ctr > 0 )
			  {		*/	
			 
			 $data['blogquery'] = DB::table('timer_menu')
			 ->join('menu_blog','menu_blog.id_menu','=','timer_menu.id') 
			  
		  ->select('menu_blog.*') 
		  
		  ->where('timer_menu.id',$search)
			 ->get();
			 
			  foreach ($data['blogquery'] as $hm): 
	     $blog_Id= $hm->id_blog ;
		       endforeach;
			 
			 /*
			 $tm = DB::table('comments')
			 ->where('comments.id_blog',$blog_Id)
			 ->count();
			  if($tm >0)
			 { */
			$data['query'] = DB::table('comments')
			  ->join('blogs','blogs.id','=','comments.id_blog') 
			  
		  ->select('comments.*') 
		  
		  ->where('comments.id_blog',$blog_Id)
			 ->get();
		 
            
		  //}
		   
		//}
		return json_encode($data['query']);
		
		}
		
		
	}
	
	 
	 public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			$data['query']= DB::table('comments')->where('com_id',$schId)->delete();
			
			  
			   if(!empty($data['query']))
		  {
			 $data['query'] = DB::table('comments')
		  ->select('comments.*') 
		  ->Orderby('com_Id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	
	
	 public function destroy_comment_comment(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 $txtComId=$request->input('txtComId');
			
			$data['query']= DB::table('comments_reply')->where('id',$schId)->delete();
			
			  
			   if(!empty($data['query']))
		  {
			 $data['query'] = DB::table('comments_reply')
		  ->select('comments_reply.*') 
		  ->where('comments_reply.id_comments',$txtComId)
		  ->Orderby('id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		  }
		 
		}
      
	}
	
	
	
	
	
	public function destroyBlog(Request $request,$id)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	   
        
		$ctr=0;
			   $numb=count($dataArray);
			   
			     $data['query']= DB::table('comments')->whereIn('com_Id',$dataArray)->delete();
			  
		
		 
			  
			  if(!empty($data['query']))
		 {
			 $data['query'] = DB::table('comments')
		  ->select('comments.*') 
		  ->Orderby('com_Id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}

public function getShow(Request $request)
	{
	if($request->ajax())
		{
		 
			$id=$request->input('com_Id');
			
			 
			 $data['query'] = DB::table('comments_reply')
		    ->join('comments','comments.com_Id','=','comments_reply.id_comments')  
			 ->select('comments_reply.*') 
		  ->where('comments.com_Id',$id)
		  ->get();
			 
		 
            return json_encode($data['query']);
		  
	
		}
	}


}
