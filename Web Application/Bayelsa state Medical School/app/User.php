<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Authenticatable
{
    use Notifiable;

protected $fillable=['name','email','role','status','password','created_at','rol_Id','id' ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
	use Notifiable;
	//protected $quard='admin'

	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	// protected $table='roles';
	 
	 public function user_Role()
	{
		 //return $this->hasMany('myFirstApp\Role');
		  //return $this->belongsTo('myFirstApp\Role');
		 // return $query=user::all();
		 
		 
		 return $query = DB::table('users')
		 
		->join('roles','users.rol_Id','=','roles.id')
		 ->select('users.*','roles.*')
		 ->Orderby('users.id','Desc')
		 ->get(); 
	}
	 
	  public function role()
	{
		 //return $this->hasMany('myFirstApp\Role');
		 // return $this->belongsTo('myFirstApp\Role');
		  
		 return $query=DB::table('users')
		 ->join('roles','roles.id','=','users.rol_Id') 
		 ->select('users.*','roles.*') 
		 ->get();
		 
		//return $query=user::all();
	}
	
	  public function checkUser($email)
	{
		   return $query=DB::table('users')
		 ->select('users.*') 
		 ->where('email',$email)->exists();
		 
		 
	}
}
