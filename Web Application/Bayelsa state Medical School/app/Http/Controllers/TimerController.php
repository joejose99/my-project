<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 
use Validator;
 use Session;
class TimerController extends Controller
{
      public function index()
    {
			
		 $rst= new BlogViewController();
		$data['query'] =$rst->index();
		
	 	return view('timer reading.index',array('query'=>$data['query']));
		
		
	 }
}
