<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
 use Session;
use DB;
class contactUsCommentController extends Controller
{
       public function index()
    {
		
		 
		
		$data['query'] = DB::table('home')
		  ->select('home.*') 
		  ->Orderby('id','Asc')
		   ->get();
		
	 	return view('home.contact-us',array('query'=>$data['query']));
		
		
	 }
}
