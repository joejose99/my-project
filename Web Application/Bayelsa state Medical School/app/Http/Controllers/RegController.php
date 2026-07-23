<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
 use App\User_Model;
 
 use App\User;
 use App\Role;
 
 use Validator;
 use Session;

use DB;

class RegController extends Controller
{
    //
	
	protected $fillable=['name','email','role','status','password','created_at','id'];
	
	protected $table=('users');
	 public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
			'role' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  public function getShow()
    {
		
		//dd('im here');
		 
		$rst = new Role();
		
		$data['user_role']=$rst->getUserRole();
		 
		$role = trim(Auth::user()->role()->first()->role);
	  $data['role'] = array('role'=>$role);
	  
	   	   
	  
		return view('register',array('user_role'=>$data['user_role']));
	}
	
	
    public function create(Request $request)
    {
		 
		 
		  
		 
		 $validator =Validator::make($request->all(),[
		  'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
			'role' => 'required|string',
        ]);
		   
 
        if ($validator->fails()) 
		{
            
			return redirect('reg')->withErrors($validator)->withInput();			    
					   
        }
		
		 $email= $request->input('email');
		
		//$rst2 = new User();
		//$dt= $rst2->checkUser($email);
		 
		
		
		
		
		
		$id =  $request->input('role');
		
		$rst = new Role();
		 
		$data= $rst->queryByid('roles',$id);
		 
		$role =$data[0]->role;
		
		  
		
		echo $request->input('role');
		 
		
		if(trim($role) != 'Polling Officer')
		{
		 $data=array('name'=> $request->input('name'),
		 'email' => $request->input('email'),
		 'rol_Id' => $request->input('role'),
		 'role' => $role,
		 'password' =>bcrypt($request->input('password')),
		 'status'=> 'Enabled');
		 
		 
		 
		 
		 $rst = new Role();
		
		$data['user_role']=$rst->getUserRole();
		 
		 
		 
		 $st= new User_Model();
		 
	    $data['st'] = $st->insertData('users',$data);
		   $success='Data Successfuly Saved';
		   $data['success'] = array('success'=>$success);
		  
 return redirect()->action('RegController@getShow',array('user_role'=>$data['user_role']))->with('flash_message','Data Successfuly Saved');		
		
		}
		
		if(trim($role) == 'Polling Officer')
		{
			$salt= $request->input('email');
			$pwd= $request->input('password');
			$pwd1 =md5(trim($salt . $pwd));
			
		  
		 $data=array('name'=> $request->input('name'),
		 'email' => $request->input('email'),
		 'rol_Id' =>$request->input('role'),
		 'password' => $pwd1,
		 'status'=> 'Enabled');
		 
		 
		 
		 $st= new User_Model();
		 
	    $data['st'] = $st->insertData('users',$data);
		
		   $success='Data Successfuly Saved';
		   $data['success'] = array('success'=>$success);
		  
		  
		  
		  $rst = new Role();
		
		$data['user_role']=$rst->getUserRole();
		
		//dd($data['user_role']);
		
		
		$message="Data Successfuly Saved";
		 Session::flash('flash_message', $message);
		  
		  return redirect()->action('RegController@getShow',array('user_role'=>$data['user_role']))->with('flash_message','Data Successfuly Saved');
		  
		  
		  // return json_encode(array('success'=>$data['success']));
		}
		
		
		 
	   
	  
		 
    }
 

}
