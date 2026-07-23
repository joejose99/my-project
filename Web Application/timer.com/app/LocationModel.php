<?php
namespace App;
namespace App;
use Exception;
 use DB;
use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
	 protected $table='locations';
	 
	  
	 protected $fillable=['loc_Id','usr_Id','longitude', 'latitude','street_ddress','location','premise','subCity','cityName','created_at'];

   	
	 
    public function getAll()
	{
		   
		  
		  /*
		  
		 return $query = DB::table('locations')
		->join('usersLogin','locations.usr_Id','=','usersLogin.usr_Id')
	 
		->select('locations.*','usersLogin.fname','usersLogin.surname','usersLogin.address','usersLogin.mobile')
		//->Orderby('locations.loc_Id','Desc')
		->paginate(10,array('usersLogin.usr_Id'));  
		
		*/
		
		$dt = DB::table('usersLogin')
	 
		->select('usr_Id')
		->get();
		  
		/*  
		foreach ($dt as $hm):
	  $data [] =	$hm->usr_Id;
	  
	  
		 endforeach ;
		*/
		
		

  
 $ctr1= count($dt);
		 
 		  $data = [];
for ($i = 0; $i < $ctr1; $i++) {
	$ctr = $dt[$i]->usr_Id;
     $data[] = DB::table('locations')
         ->where('usr_Id',$ctr)
         ->max('loc_Id');
 
} 

	
 		  return $query = DB::table('locations')
		->join('usersLogin','locations.usr_Id','=','usersLogin.usr_Id')
		->select('locations.*','usersLogin.fname','usersLogin.surname','usersLogin.address','usersLogin.mobile')
	 
	 ->whereIn('locations.loc_Id',$data)
	 	->Orderby('locations.loc_Id','Desc')
		 
		->paginate(10);     
		
	  
		 
	
}
	
	
	
	
	
}
