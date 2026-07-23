<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use DB;

class HolidayController extends Controller
{
    public function index()
    {
		
		$date=now();
		//$date->setTimezone(new DateTimeZone('America/New York'));
		
		 $y =$date->format("Y-m-d H:i:s");
		 $yy=substr($y,0,4);
		// dd($yy);
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
  ->join('holidays','holidays.countryId','=','countries.id') 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		
			$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		
	 	// return view('holiday.index');
		
		  return view('holiday.index', array('country'=>$data['country'],'query'=>$data['query'] ));
		
		
	 }
	 
	 
	 public function getEasterSunday($id)
	  {
		
		$date=now();
		/* WE USE THIS TABLE FOR BLOG CONNECTION  AND ADVERT */
		 /*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		*/
		
		$content="Many Christians celebrate Easter Sunday as the day of Jesus Christ’s resurrection, which is written in the New Testament of the Christian bible. According to the Gospel of John in the New Testament, Mary Magdalene came to the tomb where Jesus was buried and found it empty. An angel told her that Jesus had risen. Christians worldwide have celebrated Easter for centuries.";
		//dd($id);
		
	 	// return view('holiday.index');
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		  return view('holiday.view-easter', array('easterDate'=>$id,'status'=>'Easter Sunday','query'=>$data['query'] ));
		
		
	 }
	 
	  public function getEasterMonday($id)
	  {
		
		$date=now();
		/* WE USE THIS TABLE FOR BLOG CONNECTION  AND ADVERT */
		 /*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		*/
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		$content=" Easter Monday is the day after Easter Sunday and is a holiday in some countries. Easter Monday in the Western Christian liturgical calendar is the second day of Eastertide and analogously in the Byzantine Rite is the second day of Bright Week.";
		
	 	// return view('holiday.index');
		
		  return view('holiday.view-easter', array('easterDate'=>$id,'status'=>'Easter Monday','content'=>$content,'query'=>$data['query'] ));
		
		
	 }
	 
	  public function getGoodFriday($id)
	  {
		
		$date=now();
		/* WE USE THIS TABLE FOR BLOG CONNECTION  AND ADVERT */
		 /*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		*/
		$content="Good Friday is observed on the Friday that proceeds Easter Sunday (also called Resurrection Sunday). It is a day when people remember Jesus’ death on the cross. Many people, mostly Christians, celebrate this day by attending a Good Friday service where they read the biblical accounts of Jesus’ death on the cross. (Read Luke 19.)";
		
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
	 	// return view('holiday.index');
		
		  return view('holiday.view-easter', array('easterDate'=>$id,'status'=>'Good Friday','content'=>$content,'query'=>$data['query']));
		
		
	 }
	 
	 
	 public function getNewYear($id)
	  {
		
		 
		/* WE USE THIS TABLE FOR BLOG CONNECTION  AND ADVERT */
		 /*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		*/
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		$item=explode("-",$id);
		//dd($item[1]);
		
		$m=$item[1];
		$d=$item[2];
		if(strlen(trim($item[1]))==1)
		{
			$m="0".$item[1];
		}
		
		if(strlen(trim($item[2]))==1)
		{
			$d="01".$item[2];
		}
		
		
		
		$id =trim($item[0])."-".$m."-".$d;
		
		$content ="New Year Day is a day set to celebrate the first day of the year. In the western calendar New Year day start on January 1st of every year, <br>however there have been celebrations to mark the beginning of a new year for thousands of years. Sometimes these were simply an opportunity for people to eat, drink and have fun, but in some places the festivities were connected to the land or astronomical events. For example, in Egypt the beginning of the year coincided with when the River Nile flooded, and this normally happened when the star Sirius rose. The Persians and Phoenicians started their new year at the spring equinox (this is around 20 March when the Sun shines more or less directly on the equator and the length of the night and the day are almost the same).";
		
	 	// return view('holiday.index');
		$url="new-year";
		  return view('holiday.view', array('easterDate'=>$id,'status'=>'New Year Day','url'=>$url,'content'=>$content,'query'=>$data['query']));
		
		
	 }
	 
	 public function getChristmas($id)
	  {
		
		 
		/* WE USE THIS TABLE FOR BLOG CONNECTION  AND ADVERT */
		 /*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		*/
		
		
		$content ="Christmas is the annual Christian festival celebrating Christ's birth, held on December 25 in the Western Church. The traditional date of December 25 goes back as far as A.D.";
		
	 	// return view('holiday.index');
		
		$item=explode("-",$id);
		//dd($item[1]);
		
		$m=$item[1];
		$d=$item[2];
		if(strlen(trim($item[1]))==1)
		{
			$m="0".$item[1];
		}
		
		if(strlen(trim($item[2]))==1)
		{
			$d="01".$item[2];
		}
		
		
		
		$id =trim($item[0])."-".$m."-".$d;
		
		$url="christmas";
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		  return view('holiday.view', array('easterDate'=>$id,'status'=>'Christmas Day','url'=>$url,'content'=>$content,'query'=>$data['query']));
		
		
	 }
	 
	 public function getChristmasEve($id)
	  {
		
		
		
		$content ="Christmas Eve, also known as the Vigil of Christmas, is perceived as the culmination of the Advent season. Christmas Eve is the day before Christmas Day and is associated with celebrating Jesus Christ’s birth.";
		
		$item=explode("-",$id);
		//dd($item[1]);
		
		$m=$item[1];
		$d=$item[2];
		if(strlen(trim($item[1]))==1)
		{
			$m="0".$item[1];
		}
		
		if(strlen(trim($item[2]))==1)
		{
			$d="01".$item[2];
		}
		
		
		$url="christmas-eve";
		$id =trim($item[0])."-".$m."-".$d;
		
	 	// return view('holiday.index');
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		  return view('holiday.view', array('easterDate'=>$id,'status'=>'Christmas Eve','url'=>$url,'content'=>$content,'query'=>$data['query']));
		
		
	 }
	 
	 public function getValentine($id)
	  {
		
		 
		/* WE USE THIS TABLE FOR BLOG CONNECTION  AND ADVERT */
		 /*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		*/
		
		//dd(strlen(trim($id)));
		
		$item=explode("-",$id);
		//dd($item[1]);
		
		$m=$item[1];
		$d=$item[2];
		if(strlen(trim($item[1]))==1)
		{
			$m="0".$item[1];
		}
		
		if(strlen(trim($item[2]))==1)
		{
			$d="01".$item[2];
		}
		
		
		
		$id =trim($item[0])."-".$m."-".$d;
		
		//dd($id);
	 	// return view('holiday.index');
		$url="valentine";
		
		$content="Valentine's Day, or St Valentine's Day, is celebrated every year on 14 February.

It's the day when people show their affection for another person or people by sending cards, flowers or chocolates with messages of love.";

        $rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		  return view('holiday.view', array('easterDate'=>$id,'status'=>"Valentine's Day",'url'=>$url,'content'=>$content,'query'=>$data['query']));
		
		
	 }
	 
	 public function getSaintPatrick($id)
	  {
		
		 
		/* WE USE THIS TABLE FOR BLOG CONNECTION  AND ADVERT */
		 /*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		*/
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		$item=explode("-",$id);
		//dd($item[1]);
		
		$m=$item[1];
		$d=$item[2];
		if(strlen(trim($item[1]))==1)
		{
			$m="0".$item[1];
		}
		
		if(strlen(trim($item[2]))==1)
		{
			$d="01".$item[2];
		}
		
		
		
		$id =trim($item[0])."-".$m."-".$d;
		
	 	// return view('holiday.index');
		
		 $url="saint-partrick";
		 
		 //$contents=' $data['dt']= array('YY'=>$yy);
		$content="St Patrick’s Day is celebrated in many parts of the world, especially by Irish communities and organizations. St Patrick is one of the patron saints of Ireland. He is said to have died on March 17 in or around the year 493. He grew up in Roman Britain, but was captured by Irish raiders and taken to Ireland as a slave when he was a young adult. After some years he returned to his family and entered the church, like his father and grandfather before him. He later returned to Ireland as a missionary and worked in the north and west of the country.";
		
		
		  return view('holiday.view', array('easterDate'=>$id,'status'=>"Saint Patrick's Day",'url'=>$url,'content'=>$content,'query'=>$data['query']));
		
		
	 }
	 
	 public function getMartinLutherKing($id)
	  {
		
		 
		/* WE USE THIS TABLE FOR BLOG CONNECTION  AND ADVERT */
		 /*
		$data['country'] = DB::table('countries') 
		     ->select('countries.*') 
 
		 ->Orderby('value','Asc')
		 ->distinct() 
		->get();
		
		*/
		
		$rst= new BlogViewController();
		$data['query'] =$rst->index();
		
		$item=explode("-",$id);
		//dd($item[1]);
		
		$m=$item[1];
		$d=$item[2];
		if(strlen(trim($item[1]))==1)
		{
			$m="0".$item[1];
		}
		
		if(strlen(trim($item[2]))==1)
		{
			$d="01".$item[2];
		}
		
		
		
		$id =trim($item[0])."-".$m."-".$d;
		
	 	// return view('holiday.index');
		
		$url="martin-luther-king";
		
		$content="Martin Luther King, Jr., Day, in the United States, holiday (third Monday in January) honouring the achievements of Martin Luther King, Jr. A Baptist minister who advocated the use of nonviolent means to end racial segregation, he first came to national prominence during a bus boycott by African Americans in Montgomery, Alabama, in 1955. ";
		
		  return view('holiday.view', array('easterDate'=>$id,'status'=>'Martin Luther King Jr Day','url'=>$url,'content'=>$content,'query'=>$data['query']));
		
		
	 }
	 
	 
	 public function getCountryHoliday($id)
	{
	 
			//$search=$request->input('menu');
			 $date=now();
		 
		 $y =$date->format("Y-m-d H:i:s");
		 $yy=substr($y,0,4);
			
			$data['query'] = DB::table('countries')
			 ->join('holidays','holidays.countryId','=','countries.id') 
		  ->select('holidays.*') 
		  
		  ->where('holidays.countryId',$id)
			 //->get();
			  ->orderby('year','ASC')
			 ->paginate(1);
			 $data['dt']= array('YY'=>$yy);
			// $data['Student']=array('schId' => $sch_Id,
			
			  //dd($data['query'] );
			  $rst= new BlogViewController();
		     $data['query1'] =$rst->index();
            
		  return view('holiday.view-city', array('query'=>$data['query'],'dt'=>$data['dt'],'query1'=>$data['query1'] ));
	
		 
	}
	  
}
