<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
	
	 public function index()
    {
		
		 
		//$date->setTimezone(new DateTimeZone('America/New York'));
		
		//dd($date->format("Y-m-d H:i:s"));
		/*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		*/
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		 
		
	 	  return view('calendar.add-days',array('query'=>$data['query'] ));
		
		 // return view('holiday.index', array('country'=>$data['country'] ));
		
		
	 }
	 
	  public function getCountDate()
    {
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
	   return view('calendar.count-days' ,array('query'=>$data['query'] ));
	
	 }
	 
	 
	   public function time_calculator()
    {
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
	   return view('calendar.time-calculator' ,array('query'=>$data['query'] ));
	
	 }
}
