<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
 use View;
  use Illuminate\Database\Eloquent\Model;

 use DB;

class BlogViewController extends Controller
{
    //
	 public function index()
    {
		   
		   $data['query'] = DB::table('blogs')
		 ->join('menu_blog','menu_blog.id_blog','=','blogs.id') 
		  ->join('timer_menu','timer_menu.id','=','menu_blog.id_menu') 
		  ->select('blogs.*','timer_menu.menu') 
		  ->distinct()
		  ->Orderby('blogs.id','Asc')
		   ->get();
		   //dd( $data['query']);
		   
		    return  $data['query'] ;
		   
		 // ->paginate(10);
}

public function getBlogId($id) {
	
	$data['query'] = DB::table('blogs')
		 ->join('menu_blog','menu_blog.id_blog','=','blogs.id') 
		  ->join('timer_menu','timer_menu.id','=','menu_blog.id_menu') 
		  //->select('blogs.*','timer_menu.menu') 
		  ->select('blogs.*') 
		  ->distinct()
		  ->Orderby('blogs.id','Asc')
		  ->where('blogs.id',$id)
		   ->get();
		   
		   $data['comment'] = DB::table('comments')
		 ->join('blogs','blogs.id','=','comments.id_blog')  
		  ->select('comments.*','blogs.id') 
		  //->distinct()
		  ->Orderby('comments.com_Id','Asc')
		    ->where('blogs.id',$id)
		   ->get();
		   
		    $data['comment_reply'] = DB::table('comments_reply')
		 ->join('comments','comments.com_Id','=','comments_reply.id_comments')  
		  ->select('comments_reply.*') 
		   ->distinct()
		  ->Orderby('comments_reply.id','Asc')
		     
		   ->get();
		   
		   //dd( $data['comment']);
		   //dd($data['query']);
 return view('blog.view-blog',array('query'=>$data['query'],'comment'=>$data['comment'],'reply'=>$data['comment_reply']));
		   //dd( $data['query']);
	
	}	
	
	
		public function insert(Request $request)
	{
		 if($request->ajax())
		{
			// $dataArray=[];
		
		 
		 $txtName=$request->input('txtName');
		 $txtEmail=$request->input('txtEmail');
		 $details=$request->input('blog');
		 $id=$request->input('id');
		 $status='Enable';
		$reply=$request->input('reply');
		//$dataArray = json_decode($content, true);
		    
	   if($reply=="")
	  {
		$data=array(
		'details' => $details,
		'status' => $status,
		'email' => $txtEmail,
		'id_blog' => $id,
		'disLike' => 0,
		'likes' => 0,
		'name'=>$txtName);
	 	
		
		/* VALIDATING IF DATA EXIT IN THE TABLE */	
		  $tm = DB::table('comments')->where('details',$details)->count();
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			     
				
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
			 
			/* SAVED DATA BLOG TO DATABASE TABLE */
	      
		  $ids= DB::table('comments')->insertGetId($data);
		   
		    
			 $data['comment'] = DB::table('comments')
		 ->join('blogs','blogs.id','=','comments.id_blog')  
		  ->select('comments.*','blogs.id') 
		  //->distinct()
		  ->Orderby('comments.com_Id','Asc')
		    ->where('blogs.id',$id)
		   ->get();
		   
		   
		   
		   $data['comment_reply'] = DB::table('comments_reply')
		 ->join('comments','comments.com_Id','=','comments_reply.id_comments')  
		  ->select('comments_reply.*') 
		  //->distinct()
		  ->Orderby('comments_reply.id','Asc')
		     
		   ->get();
		   
		   
		   //dd( $data['comment']);
		    // return json_encode('Data Successfully Saved');
		  // return json_encode($data['comment']);
		  
		  return json_encode( array('comment'=>$data['comment'],'reply'=>$data['comment_reply']));
		  
             //return json_encode($data['query']);
		 
		   }
			
		}
		
 


if($reply !="")
	   
	   $data=array(
		'details' => $details,
		'status' => $status,
		'email' => $txtEmail,
		'id_comments' => $reply,
		'disLike' => 0,
		'likes' => 0,
		'name'=>$txtName);
		
		/* VALIDATING IF DATA EXIT IN THE TABLE */	
		  $tm = DB::table('comments_reply')->where('details',$details)->count();
		 
		   // dd($tm);
		  $cnt= $tm;
		    
		  if($cnt > 0)
		  {
			     
				
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
			 
			/* SAVED DATA BLOG TO DATABASE TABLE */
	      
		  $ids= DB::table('comments_reply')->insertGetId($data);
		   
		    
			 $data['comment'] = DB::table('comments')
		 ->join('blogs','blogs.id','=','comments.id_blog')  
		  ->select('comments.*','blogs.id') 
		  //->distinct()
		  ->Orderby('comments.com_Id','Asc')
		    ->where('blogs.id',$id)
		   ->get();
		   
		   
		    $data['comment_reply'] = DB::table('comments_reply')
		 ->join('comments','comments.com_Id','=','comments_reply.id_comments')  
		  ->select('comments_reply.*') 
		  //->distinct()
		  ->Orderby('comments_reply.id','Asc')
		     
		   ->get();
		   
		   
		   return json_encode(array('comment'=>$data['comment'],'reply'=>$data['comment_reply']));
		 
		   
		   
		    
		    // return json_encode('Data Successfully Saved');
		  // return json_encode($data['comment']);
             //return json_encode($data['query']);
		 
		   }
			
		}


}
public function editLike(Request $request)
{
	  if($request->ajax())
		{
		 
			$status=$request->input('status');
		 $dislike=$request->input('dislike');
		// dd( $dislike);
		 $like=$request->input('like'); 
		 $id=$request->input('id');
		 
		 
		// dd($status);
		     if($status=='comments')
		      {
				 $data['comment'] = DB::table('comments')
		    
		  			->select('comments.*')  
		    		->where('comments.com_Id',$id)
		   			->get();
					
					$valLike =$data['comment'][0]->likes;
					$valDis =$data['comment'][0]->disLike;
					
					$valLike=$valLike+$like;
					$valDis=$valDis+ $dislike;
					
					 
					 $data=array(
						'likes' => $like,
						'disLike' => $dislike );
					
					DB::table('comments')->where('com_Id',$id)->update($data);
					 return json_encode('Sata Successfully Save'); 
			  }
			  
			  if($status=='reply')
		      {
				   $data['comment'] = DB::table('comments_reply')
		    
		  			->select('comments_reply.*')  
		    		->where('comments_reply.id',$id)
		   			->get();
					//dd($status);
					
					$valLike =$data['comment'][0]->likes;
					$valDis =$data['comment'][0]->disLike;
					$valLike=$valLike+$like;
					$valDis=$valDis+ $dislike;
					
					 $data=array(
						'likes' => $like,
						'disLike' => $dislike );
					
					DB::table('comments_reply')->where('id',$id)->update($data); 
					
					 return json_encode('Sata Successfully Save');
			  }

            
		}
}


}