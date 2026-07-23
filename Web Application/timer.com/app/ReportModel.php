<?php
namespace App;
namespace App;
use Exception;
 use DB;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
	 protected $table='channelreports';
	 
	 
    public function getAll()
	{
		  
		 return $query = DB::table('channelreports')
		->join('usersLogin','channelreports.urs_Id','=','userLogin.urs_Id')
		->join('channels','channelreports.chl_Id','=','channels.chl_Id') 
		->select('channelreports.*','usersLogin.fname')
		->Orderby('channelreports.rpt_Id','Desc')
		->paginate(10);  
		 
	}
}
