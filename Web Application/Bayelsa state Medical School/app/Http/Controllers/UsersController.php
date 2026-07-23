<?php

namespace  App\Http\Controllers;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
 
use Illuminate\Http\Request;

 

use Validator;
 use Session;
 use App\Support;
   use App\User_Model;
   use DB;
   


class UsersController extends Controller
{
    //
	protected $fillable=['name','email','role','status','password','created_at'];
	 

	//protected $redirectTo = '/register';
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function index()
    {
		//$user =Users::with(['role'])->find(1);
		 
		
		$title='Users';
		 $data['title'] = array('title'=>$title);
		 
		 $rst= new User_Model();
		 
		 //$data['role'] = $rst->role();
		 
		 // dd(User::with('role')->get());
		
		/*  $query=DB::table('users')
		 ->join('roles','roles.id','=','users.rol_Id') 
		 ->select('users.*','roles.*') 
		 ->get();
		 
		 dd($query);  */
		 
		 
		 
		 
		  
		    //dd(Auth::user()->role());
		  
		 //if(Auth::user()->role()->role =='Super Admin')
		// dd(Auth::user()->role()->first()->role );
		 
		 if(Auth::user()->role()->first()->role =='Super Admin')

		 //if(Auth::user()->role =='Super Admin')
		 {
	        $data['query'] = $rst->getAll();
			 
		 }
		 
		 //if( Auth::user()->role =='Admin')
		 if(Auth::user()->role()->first()->role == 'Admin')
		 {
	        $data['query'] = $rst->getByAdmin();
		 }
	    //if(Auth::user()->role =='Center Admin')
		if(Auth::user()->role()->first()->role == 'Center Admin')
		 {
		  $id= Auth::user()->id ;
	        $data['query'] = $rst->getById('users',$id);
		 } 
		 
		 
		   
	 
	 //$role = trim(Auth::user()->role);
	 
	 $role = trim( Auth::user()->role()->first()->role); 
	 //dd($role );
	 
	  $data['role'] = array('role'=>$role);
	 
	 
        
		 return view('user.user', array('query'=>$data['query'],'role'=>$data['role'],'title'=>$data['title']));
		
		 
	   
		
		
		 
    }
	
	public function destroy($id)
	{
	 $this->middleware('auth');
		
		$st= new User_Model();
		
		 $idAdmin=  Auth::user()->id;
		 
		 
		
		if((int)$id != $idAdmin)//YOU CAN'T DELETE YOUR SELF
		{
	 		$data['del'] = $st->delete_table('users',$id);
		 	$message="Record Deleted Successfully";
		}
		
		if((int)$id == $idAdmin)//YOU CAN'T DELETE YOUR SELF
		{
	 		//$data['del'] = $st->delete_table('users',$id);
		 $message="Error You can't Delete Yourself";
		}
		 
		if( !empty($data['del']))
		 {
		 
		 Session::flash('flash_message', $message);
  
	return redirect()->action('UsersController@index',$data)->with('flash_message',$message);
		 }
		 
		 if(empty($data['del']))
		 {
		 		return redirect()->action('UsersController@index')->with('flash_message',$message);
				
		 
		 }
		 
		 
	}
	
	public function edit(Request $request)
	{
		if($request->ajax())
		{
			 $dataArray=[];
		
		     $content = $request->input('dataArray');
		
		      $dataArray = json_decode($content, true);
		 	  
			  $status =$request->input('status');
			   $ctr=0;
        
		 $numb=count($dataArray);
		 //dd($dataArray,$status);
		  
		   $id= Auth::user()->id ;
	        // $data['query'] = $rst->getById('users',$id);
		 
		 
		
		 //dd($id);
		 
		 if(trim($status)=='Enable')
		 {
			  for($i = 0; $i < $numb; $i++) 
			 {
				$ursId= (int)$dataArray[$ctr]['quesId'];
				 			 
				if(trim($id) != (int)$ursId)//YOU CAN'T DISABLE YOUR SELF
				{
					
					 
					 
					$query= DB::table('users')->where('id',$dataArray[$ctr])->update(['status' => 'Disable' ]);
		 				$ctr++;
			    }
			 }
			 
		 }
		 else
		 {
			 for($i = 0; $i < $numb; $i++) 
			 {
				$ursId= (int)$dataArray[$ctr]['quesId'];
				 
				if($id != (int)$ursId)//YOU CAN'T ENABLE YOUR SELF
				{
			        DB::table('users')->where('id',$dataArray[$ctr])->update(['status' => 'Enable']);
		 	        $ctr++;
				}
			 }
			 
			  
		 }
			 
			$rst= new User_Model(); 
			 
			 // if(Auth::user()->role =='Super Admin')
			 if(Auth::user()->role()->first()->role =='Super Admin')
		 {
	        $data['query'] = $rst->getAll();
		 }
		 
		 //if( Auth::user()->role =='Admin')
		 if(Auth::user()->role()->first()->role =='Admin')
		 {
	        $data['query'] = $rst->getByAdmin();
		 }
		  	
                return json_encode($data['query']);
	  
		 }
	}
	public function userProfile()
	{
		 return view('user.profile');
	}	
	
	
	
	public function show($id)
	{
		 
		$rst= new User_Model();
		   $data['query'] = $rst->queryByid('users',$id);
		   if (!empty($data['query']))
		   {
			    
			  /*   foreach ($data['query'] as $hm): 
	 
	         echo  $hm->school ;
	          echo'<br>'; 
        
		       endforeach; */ 
			   
			   
		       return view('user.update',$data);
		   }
	}

	public function editProfile(Request $request, $id)
	{
		//echo 'update';
		if($request->ajax())
		{
		 $dataArray=[];
		
		$content = $request->input('dataArray');
		 
		
		$dataArray = json_decode($content, true);
	
	 
	 $data=array(
	 'name' =>$dataArray[0]['optionA'],
	  'email'=> $dataArray[0]['optionD'],
	 
	'id'=> $dataArray[0]['id']);
	 
	 
	 
		
		 //dd($request->all());	
			$rst= new User_Model();
	      
		    $data['query'] = $rst->editData($data,$id);
		   Auth::user()->role()->first();
		  
		   return json_encode('Succcess');
		}
	}
	
	public function showSettings()
	{
	
	    return view('admin.settings');
	}
}
