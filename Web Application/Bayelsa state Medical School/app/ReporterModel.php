<?php
 
namespace App;
namespace App;
use Exception;
 use DB;
use Illuminate\Database\Eloquent\Model;

class ReporterModel extends Model
{
    protected $table='channelreports';
	 
	 
    public function getAll()
	{
		  
		 return $query = DB::table('channelreports')
		->join('userslogin','channelreports.usr_Id','=','userslogin.usr_Id')
		->join('channels','channelreports.chl_Id','=','channels.chl_Id') 
		->select('channelreports.*','userslogin.fname')
		->Orderby('channelreports.rpt_Id','Desc')
		->paginate(10);  
		 
	}
}
