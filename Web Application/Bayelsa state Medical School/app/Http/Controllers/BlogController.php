<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
 use View;
  use Illuminate\Database\Eloquent\Model;

 use DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
		
		 
		 $tm = DB::table('blogs')->count();
		 
		$data['query'] = DB::table('blogs')
		  ->select('blogs.*') 
		  ->Orderby('id','Asc')
		  //->get();
		   ->paginate(10);
		   
		   
		   $data['menu'] = DB::table('timer_menu')
		  ->select('timer_menu.*') 
		  ->Orderby('id','Asc')
		  ->get();
		  
		  //dd($data['query']);
		  /*
		   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->details ;
	          echo'<br>'; 
        
		       endforeach;
			   */

	     return view('blog.index', array('query'=>$data['query'],'menu'=>$data['menu']));
		
	 	//return view('blog.index');
		
		
	 }
	 
	 
	 
	  public function get_insert()
    {
        
		 
	   
	  $data['query'] = DB::table('timer_menu')
		  ->select('timer_menu.*') 
		  ->Orderby('id','Asc')
		  ->get();
		   
		  
	   
	   return view('blog.insert', array('query'=>$data['query']));
	 //return view('department.insert',$data);
	 
    }
	
	
	public function insert(Request $request)
	{
		 if($request->ajax())
		{
			 $dataArray=[];
		
		$content = $request->input('dataArray');
		 $blog=$request->input('blog');
		 $status='Enable';
		
		
		 
		
		$dataArray = json_decode($content, true);
		  
	  
		$data=array(
		'details' => $blog,
		'status' => $status,
		'user_Id'=>$id= Auth::user()->id);
	 	
		/* VALIDATING IF DATA EXIT IN THE TABLE */	
		  $tm = DB::table('blogs')->where('details',$blog)->count();
		 
		 
		 
		   // dd($tm);
		  $cnt= $tm;
		   
		  if($cnt > 0)
		  {
			    
			   return json_encode('Data Existed Already !!!');
		  }
		  else	 
			{ 
			
			 
			/* SAVED DATA BLOG TO BLOG TABLE */
	      
		  $id= DB::table('blogs')->insertGetId($data);
		   
		    
		   $insertedId=$id;
		   
		   /* LOOP TO SAVE DATA TO LINKERS TABLE (MENU_BLOG) */
		   
		   $ctrArray =count($dataArray);
		   
		    
			
			 
		   
		   for($i=0; $i < $ctrArray; $i++)
		 
	      {
			   
			  $data=array( 
	
	 'id_menu' => $dataArray[$i]['menu_Id'],
	 
	'id_blog' => $insertedId);
		 	
		   DB::table('menu_blog')->insert($data);
		   
		 }   
			
			
		   
		   return json_encode('Data Successfully Saved');
             //return json_encode($data['query']);
		 
		   }
			
		}
	}
	
	public function getShow($id)
	{
		 $data['query'] = DB::table('blogs')
		  ->select('blogs.*') 
		  ->Orderby('id','Asc')
		  ->where('id',$id)
		  ->get();
		  
		   $data['menu_blog'] = DB::table('menu_blog')
		  ->select('menu_blog.*') 
		   ->where('id_blog',$id)
		  ->get();
		  
		  $data['timer_menu'] = DB::table('timer_menu')
		  ->select('timer_menu.id') 
		    
		  ->get();
		  
		  /*CREATING ARRAY LIST FOR ALL MENU*/
		  $list1= array();
		  
			foreach ($data['timer_menu'] as $tm): 
	     $list1[]= $tm->id ;
		       endforeach; 
		  
		  
		  $menu_Id=$data['menu_blog'][0]->id_menu;
		  
		  
		   $data['id_menu'] = DB::table('menu_blog')
		  ->select('menu_blog.id_menu') 
		   ->where('id_blog',$id)
		  ->get();
		  
		  
		 
		  
		  
		 // dd($menu_Id);
		  
		  
		   $data['checked'] = DB::table('timer_menu')
		    ->join('menu_blog','menu_blog.id_menu','=','timer_menu.id') 
		  ->select('timer_menu.*') 
		  // ->where('menu_blog.id_menu',$menu_Id)
		     ->where('menu_blog.id_blog',$id)
		   ->distinct()
		  ->get();
		  
		  
		  /* CREATING ARRAY OF CHECKED MENU */
		    $list= array();
			foreach ($data['id_menu'] as $hm): 
	     $list[]= $hm->id_menu ;
		       endforeach;
			   
			  
			 /* SORTING THE ARRAY LIST OF MENU TIMER, THIS WILL HELP US DELETE CHECKED MENU FROM THE LIST1 ARRAY*/ 
			  for($i=0;$i<count($list);$i++)
			  {  
			  	for($ctr=0;$ctr<count($list1);$ctr++)
			  	{    
				
				if(($key =array_search($list[$i],$list1))!== false)
				  	 
				  	{
						 
					  unset($list1[$key]);
					  
				  	} 
			  	}    
				  
			  }  
			  
			   
			   
		  $data['unchecked'] = DB::table('timer_menu')
		  ->select('timer_menu.*') 
		  // ->where('id','<>',$menu_Id)
		   ->whereIn('id', $list1)
		  ->get();
		  
		    return view('blog.edit', array('query'=>$data['query'],'checked'=>$data['checked'],'unchecked'=>$data['unchecked']));
 }
 
 public function edit(Request $request, $id)
	{
		
		if($request->ajax())
		{
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		$time_stamps =now();
		$dataArray = json_decode($content, true);
		
		
		
		$content = $request->input('dataArray');
		 $blog=$request->input('blog');
		 $status=$request->input('status');
		
		$dataArray = json_decode($content, true);
	
	/* UPDATING BLOG DATABASE */
	 
	 DB::table('blogs')->where('id',$id)->update([
		   'details' =>$blog,
		 'status' =>$status ,]);
	 
	   $i=0;
	   
	     /* GET MENU BLOG DATA BEFOR ADDING TO LIST ARRAY */
		   $data['menu_blog'] = DB::table('menu_blog')
		  ->select('menu_blog.id') 
		   ->where('id_blog',$id)
		  ->get();
		  
	   /* CREATING LIST ARRAY FOR MENU_BLOG DATA */
	   $list= array();
			foreach ($data['menu_blog'] as $hm): 
	     $list[]= $hm->id ;
		       endforeach;
	   /* UPDATING DATA TO DATABASE */
	  for($ctr=0; $ctr< count($list); $ctr++)
	 {
		 for($i=0; $i < count($dataArray); $i++)
		 
	      {
			  
			  $ids= $dataArray[$i]['menu_Id'];
			  
			 	 if($ids ===$list[$ctr])
			  	{
			  	 
		   			DB::table('menu_blog')->where('id',$list[$ctr])->update([
		   			'id_menu' => $ids,]); 
		   
	 			}	 		
	 	   }   
	 }
	 
	  /* LOOP TO VERIFY THAT DATA IS NOT ALREADY I DB*/
	  /* IF NOT IN DB THEN ADD THE DATA */
	 for($i=0; $i < count($dataArray); $i++)
		 
	      {
			  
			  $ids= $dataArray[$i]['menu_Id'];
			  
			  $tm = DB::table('menu_blog')->where('id_menu',$ids)->where('id_blog',$id)->count();
			  if( $tm ==0)
			  {
			  $data=array( 
	
	 'id_menu' => $dataArray[$i]['menu_Id'],
	 
	'id_blog' => $id);
		 	
		   DB::table('menu_blog')->insert($data);
			  
	       }
	     }   
	  
	 
	 
	 return json_encode('Succcess');
	 
	
	}
	
    }
	
	
	
	public function search(Request $request)
	{
	if($request->ajax())
		{
		 
			$search=$request->input('menu');
			
			 
			
			$data['query'] = DB::table('menu_blog')
			 ->join('blogs','blogs.id','=','menu_blog.id_blog') 
		  ->select('blogs.*') 
		  
		  ->where('menu_blog.id_menu',$search)
			 ->get();
		 
            return json_encode($data['query']);
		  
	
		}
	}
	
	  
	
	public function destroy_Checkbox(Request $request,$id)
	{
		 
		if($request->ajax())
		{
			$id_blog=$request->input('id_blog');
			$id_menu=$request->input('id_menu');
			
			 $data['menu_blog'] = DB::table('menu_blog')
		  ->select('menu_blog.id') 
		   ->where('id_blog',$id)
		   ->where('id_menu',$id_menu)
		  ->get();
			
			
			
			foreach ($data['menu_blog'] as $hmId): 
	 
	         $mnId = $hmId->id ;
	            endforeach;
			//$studentId= $YEARMax[0]->studentId;
  
				$data['query']= DB::table('menu_blog')
				//->where('id',$mnId)
				 ->where('id_menu',$id_menu)
				 ->where('id_blog',$id_blog)
				->delete();
	return json_encode('success');
		}
	}
	
	
	public function storeCheckbox(Request $request,$id)
	{
		if($request->ajax())
		{
			$id_blog=$request->input('id_blog');
			$id_menu=$request->input('id_menu');
			
			
			$data=array(
		'id_blog' => $id_blog,
		'id_menu' => $id_menu);
	 	
		 
			
			 
			/* SAVED DATA BLOG TO BLOG TABLE */
	      
		   DB::table('menu_blog')->insert($data);
			
	return json_encode('Inserted successfully');
		}
	}
	
	
	
	
	public function destroy(Request $request,$id)
	{
		if($request->ajax())
		{
		 
			  $schId=$request->input('quesId');
			 
			
			$data['query']= DB::table('blogs')->where('id',$schId)->delete();
			
			  
			   if(!empty($data['query']))
		  {
			 $data['query'] = DB::table('blogs')
		  ->select('blogs.*') 
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
			   
			     $data['query']= DB::table('blogs')->whereIn('id',$dataArray)->delete();
			   /*
			  for($i = 0; $i < $numb; $i++) 
			 {
		 
		 		  $data['query']= DB::table('blogs')->where('id',$dataArray[$ctr])->delete();
		       
				
				$ctr++;
			 }*/
		
		 
			  
			  if(!empty($data['query']))
		 {
			 $data['query'] = DB::table('blogs')
		  ->select('blogs.*') 
		  ->Orderby('id','Asc')
		   ->get();
		  
                return json_encode( $data['query']);
	  
		 }
			  
			
	 }
	
}
}
