<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\ReportModel;

 use View;

  use DB;
  
  use Validator;
  
  use App\ReporterModel;
  
class ReportController extends Controller
{
    //
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
		
	$rst= new ReporterModel();
	 $data['query'] = $rst->getAll();
	 
	 
	  return view('brands.channel report.index',array('query'=>$data['query']));	 
}
}
