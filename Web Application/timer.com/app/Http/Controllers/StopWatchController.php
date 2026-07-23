<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use View;
use Validator;
use App\TimeTableModel;

class StopWatchController extends Controller
{
    
	 public function index()
    {
		
		 $rst= new BlogViewController();
		$data['query'] =$rst->index();
		
	 	return view('stopwatch.index',array('query'=>$data['query']));
		
	 	//return view('stopwatch.index');
		
		
	 }
}
