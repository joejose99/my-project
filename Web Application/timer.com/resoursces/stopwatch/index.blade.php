<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">
 
 <meta name="_token" content="{!! csrf_token() !!}"/>
<title>Stopwatch</title>
 <script src="../timer/js/jquery-3.1.1.js"> </script>
  <script src="timer/js/jquery-3.1.1.js"> </script>
 

<script>

function zoomOut(multiplier) {
	
	 	 var el=  document.getElementById('countdown');
		
		
		
		var curTime = document.getElementById('currentTime'); 
		 
		
		var time_setUp = document.getElementById('time_setUp'); 
		 
		//var ctm = document.getElementById('ctm');  
		//var ctm2 = document.getElementById('ctm2');  
	 
	 
	 var tsp = document.getElementById('tsp'); 
	 var tm=document.getElementById('tm'); 
	 
	 //var el = document.getElementById('time-Size') ;
	 
	   
	 
	 var style =window.getComputedStyle(el,null).getPropertyValue('font-size');
	 
	 //alert(style);
	 
	
	 
	 var style2 =window.getComputedStyle(curTime,null).getPropertyValue('font-size');
	 
	 var style3 =window.getComputedStyle(time_setUp,null).getPropertyValue('font-size');
	 
	  
	  var styleTSP =window.getComputedStyle(tsp,null).getPropertyValue('font-size');
	 
	 
	
	 	 
	 var fontSize = parseFloat(style);
	 
	  console.log("font size: "+style);
	  
	 
	 var fontSize2 = parseFloat(style2);
	 
	  var fontSize3 = parseFloat(style3);
	  
	 	
		var fontSizeTSP = parseFloat(styleTSP);
		
		
		
		var ctr =parseInt(document.getElementById('txtCounter').value);
		 if(ctr ==0 || ctr <3)
		 {
	 
	  curTime.style.fontSize=(fontSize2+(multiplier * 0.2)+'px');
	  
	   time_setUp.style.fontSize=(fontSize3+(multiplier * 0.2)+'px');
	   
	   
		
		/*This is for the icons ,setupTime and  countdown */
		 tsp.style.fontSize=(fontSizeTSP+(multiplier * 0.2)+'px');
		
		 
		 
		  
		 tm.style.fontSize=(fontSizeTSP+(multiplier * 0.2)+'px');
	 
	   var c =(fontSizeTSP+(multiplier * 0.2)+'px');
		  document.getElementById('txtFont').value=(fontSize2+(multiplier * 0.2)+'px');
		  
		 var cnt=parseInt( document.getElementById('txtCounter').value)
		  
		  document.getElementById('txtCounter').value=cnt+1
		   
		  
		  
		}   
	
	}

function zoomIn(multiplier) {
	
	 	 
	 var el=  document.getElementById('countdown');
	 
	 var curTime = document.getElementById('currentTime'); 
	 
	 
	 
	  var time_setUp = document.getElementById('time_setUp');  
		var ctm = document.getElementById('ctm');  
		var ctm2 = document.getElementById('ctm2');  
	 
	  var tsp = document.getElementById('tsp'); 
	 var tm=document.getElementById('tm'); 
	 
	
	  
	 var style3 =window.getComputedStyle(time_setUp,null).getPropertyValue('font-size');
	 
	  
	 
	 var style =window.getComputedStyle(el,null).getPropertyValue('font-size');
	 
	 var style2 =window.getComputedStyle(curTime,null).getPropertyValue('font-size');
	 
	   var styleTSP =window.getComputedStyle(tsp,null).getPropertyValue('font-size');
	 
	 var fontSize = parseFloat(style);
	  var fontSize2 = parseFloat(style2);
	  
	   
	  
	 var fontSize3 = parseFloat(style3);
	   
	   var fontSizeTSP = parseFloat(styleTSP); 
	  
	  var ctr=parseInt(document.getElementById('txtCounter').value)
	  
		 if(ctr > 0 )
		 {
	  
	el.style.fontSize=(fontSize-(multiplier * 0.2)+'px');
	
	curTime.style.fontSize=(fontSize2-(multiplier * 0.2)+'px');
	
	time_setUp.style.fontSize=(fontSize3-(multiplier * 0.2)+'px');
	   
	 
	 tsp.style.fontSize=(fontSizeTSP-(multiplier * 0.2)+'px');
		
		 
		 tm.style.fontSize=(fontSizeTSP-(multiplier * 0.2)+'px');
		 
		 var c =(fontSize2-(multiplier * 0.2)+'px')
		  document.getElementById('txtFont').value=c;
		  
		   
		  
		  var cnt=parseInt( document.getElementById('txtCounter').value)
		  
		  document.getElementById('txtCounter').value=cnt-1
		  
		}   
	}
	


</script>



<script>
function openNav() {
	
	
	  rightCloseNav();
 
	 document.getElementById("mySidenav").style.width = "240px";
	 
	  document.getElementById("chronoExample").style.marginLeft = "250px";
     document.getElementById("chronoExample").style.transition=".5s";
	 
	 /*
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  
  
  
  
   document.getElementById("main2").style.marginLeft = "250px";
     document.getElementById("main2").style.transition=".5s";
	 
	 
	 document.getElementById("main3").style.marginLeft = "250px";
     document.getElementById("main3").style.transition=".5s";
	 
	 document.getElementById("main4").style.marginLeft = "250px";
     document.getElementById("main4").style.transition=".5s";
	 
	 document.getElementById("main5").style.marginLeft = "250px";
     document.getElementById("main5").style.transition=".5s";
	 
	 */
	 
}

function closeNav() {
	
	
	 
document.getElementById("mySidenav").style.width = "0";
  
  document.getElementById("chronoExample").style.marginLeft = "4px";
  document.getElementById("chronoExample").style.transition=".5s";
	 
	 	 
   
  
}
</script>




<script>
function rightOpenNav() {
	
	
	
	
	// jQuery('#navbar-menu').css({position:"static"});
	 //jQuery('#navbar').css({position:"static"});
	 
	 closeNav();
	 document.getElementById("chronoExample").style.marginRight = "4px";
  document.getElementById("chronoExample").style.transition=".5s";
	 
	 
  document.getElementById("rightMySidenav").style.width = "250px";
    document.getElementById("main").style.marginRight = "250px";
  document.getElementById("main").style.transition=".5s";
  
  document.getElementById("main2").style.marginRight = "250px";
  document.getElementById("main2").style.transition=".5s";
  
  
   document.getElementById("main3").style.marginRight = "250px";
  document.getElementById("main3").style.transition=".5s";
  
  
   document.getElementById("main4").style.marginRight = "250px";
  document.getElementById("main4").style.transition=".5s";
  
  document.getElementById("main5").style.minWidth="69.04%";
   document.getElementById("main5").style.marginRight = "250px";
  document.getElementById("main5").style.transition=".5s";
  
  
   document.getElementById("main6").style.marginRight = "250px";
  document.getElementById("main6").style.transition=".5s";
  
  document.getElementById("main7").style.minWidth="69.04%";
   document.getElementById("main7").style.marginRight = "250px";
  document.getElementById("main7").style.transition=".5s";
  
  
   document.getElementById("footer1").style.marginRight = "250px";
  document.getElementById("footer1").style.transition=".5s";
	  
	  document.getElementById("rightNav").style.marginRight = "250px";
   document.getElementById("rightNav").style.transition=".5s";
   
   
   
    //chronoExample
	   // document.getElementById('mainNavBar').style.position="inherit";
	/* 
	  document.getElementById("mainNavBar").style.marginRight = "250px";
	 document.getElementById("mainNavBar").style.transition=".5s";
	 
	 document.getElementById("navbar").style.marginRight = "250px";
	 document.getElementById("navbar").style.transition=".5s";
   */
   
	   
   
}

function rightCloseNav() {
	
	 
  document.getElementById("rightMySidenav").style.width = "0";
   document.getElementById("main").style.marginRight= "0";
  //document.getElementById("container").style.marginRight = "0";
  document.getElementById("main").style.transition=".5s";
  
   document.getElementById("main2").style.marginRight= "0";
   document.getElementById("main2").style.transition=".5s";
   
    document.getElementById("main3").style.marginRight= "0";
   document.getElementById("main3").style.transition=".5s";
   
    document.getElementById("main4").style.marginRight= "0";
   document.getElementById("main4").style.transition=".5s";
   
   document.getElementById("main5").style.minWidth="88%";
    document.getElementById("main5").style.marginRight= "0";
   document.getElementById("main5").style.transition=".5s";
   
   
   document.getElementById("main6").style.marginRight= "0";
   document.getElementById("main6").style.transition=".5s";
   
   document.getElementById("main7").style.minWidth="88%";
   document.getElementById("main7").style.marginRight= "0";
   document.getElementById("main7").style.transition=".5s";
   
   document.getElementById("footer1").style.marginRight= "0";
   document.getElementById("footer1").style.transition=".5s";
   
  
  document.getElementById("rightNav").style.marginRight= "20px";
  
  document.getElementById("rightNav").style.transition=".5s";
  
  
   document.getElementById("mainNavBar").style.marginRight = "0px";
    document.getElementById("mainNavBar").style.transition=".5s";
	
	 //document.getElementById('mainNavBar').style.position="static";
	 
  
 // jQuery('#navbar-menu').css({position:"fixed"});
  
  
}
</script>
 


<script>

 

 
function changeColour(colour)
{
	document.getElementById('currentTime').style.color=colour;
	document.getElementById('countdown').style.color=colour;
	document.getElementById('dt').style.color=colour;
	
	document.getElementById('alarmTable').style.color=colour;
	document.getElementById('main2').style.color=colour;
	
	document.getElementById('setUp').style.color=colour;
	
	if(colour=="#000")
	{
		document.getElementById('setUp').style.color="#C1C1C1";
	}
	
	window.sessionStorage;
	
	sessionStorage.clear();
	 sessionStorage.setItem("colour",colour);
	
}




function getAutoColour()
{
	
	window.sessionStorage;
	var colour =sessionStorage.getItem("colour");
	
	
	if(colour=="")
	{
		colour ="#000";
	}
	
	document.getElementById('currentTime').style.color=colour;
	document.getElementById('countdown').style.color=colour;
	document.getElementById('dt').style.color=colour;
	
	document.getElementById('alarmTable').style.color=colour;
	document.getElementById('main2').style.color=colour;
	document.getElementById('setUp').style.color=colour;
	
	 
	 if(colour=="#000")
	{
		document.getElementById('setUp').style.color="#C1C1C1";
	}
	
	 
	
}


function nightFall()
{
	
	 
	 var nightMode =document.getElementById('txtNight').value;
	 
	 if(nightMode==1)
	 {
	 document.getElementById('currentTime').style.color="#FF9500";
	document.getElementById('countdown').style.color="#FF9500";
	document.getElementById('dt').style.color="#FF9500";
	
	document.getElementById('alarmTable').style.color="#FF9500";
	document.getElementById('main2').style.color="#FF9500";
	
	document.getElementById('main6').style.color="#FF9500";
	document.getElementById('main7').style.color="#FF9500";
	
	document.getElementById('main5').style.color="#FF9500";
	document.getElementById('main4').style.color="#FF9500";
	document.getElementById('title-head').style.color="#FF9500";
	
	document.getElementById('title-head3').style.color="#FF9500";
	document.getElementById('title-head5').style.color="#FF9500";
	//document.getElementById('zoomOut').style.color="#fff";
	//document.getElementById('zoomIn').style.color="#fff";
	
	//document.getElementById('minox').style.color="#fff";
	//document.getElementById('plux').style.color="#fff";
	
	
	
	document.getElementById('chronoExample').style.backgroundColor="#222D32";
	document.getElementById('main').style.backgroundColor="#222D32";
	document.getElementById('main2').style.backgroundColor="#222D32";
	document.getElementById('main3').style.backgroundColor="#222D32";
	document.getElementById('main4').style.backgroundColor="#222D32";
	document.getElementById('main5').style.backgroundColor="#222D32";
	
	document.getElementById('main6').style.backgroundColor="#222D32";
	
	document.getElementById('main7').style.backgroundColor="#222D32";
	
	document.getElementById('main4').style.color="#FF9500";
	
	
	

document.getElementById('top-menu').style.backgroundColor="#222D32";
document.getElementById('top-menu-logo').style.backgroundColor="#222D32";


document.getElementById('footer1').style.backgroundColor="#222D32";
document.getElementById('footer').style.backgroundColor="#222D32";



document.getElementById('txtNight').value=0

document.getElementById('text-main').style.color="#FF9500";
	
	document.getElementById('title-head').style.color="#FF9500";
	document.getElementById('title-head1').style.color="#FF9500";
	document.getElementById('title-head2').style.color="#FF9500";
	
	
	
	document.getElementById('footer1').style.color="#FF9500";
document.getElementById('footer').style.color="#FF9500";

document.body.style.backgroundColor="#222D32";



}
else
{
	 document.getElementById('currentTime').style.color="#000";
	document.getElementById('countdown').style.color="#000";
	document.getElementById('dt').style.color="#000";
	
	document.getElementById('alarmTable').style.color="#000";
	document.getElementById('main2').style.color="#000";
	
	
	
	document.getElementById('main6').style.color="#000";
	document.getElementById('main7').style.color="#000";
	
	document.getElementById('main5').style.color="#000";
	document.getElementById('main4').style.color="#000";
	
	//document.getElementById('zoomOut').style.color="#fff";
	//document.getElementById('zoomIn').style.color="#fff";
	
	//document.getElementById('minox').style.backgroundColor="#000";
	//document.getElementById('plux').style.backgroundColor="#000";
	
	//document.getElementById('minox').style.content="'\FF0D'";
	// document.getElementById('plux').style.content="'\FF0B'";
	
	document.getElementById('main4').style.color="#1E2C2C";
	document.getElementById('footer').style.color="#1E2C2C";
	document.getElementById('footer1').style.color="#1E2C2C";
	
	document.getElementById('text-main').style.color="#1E2C2C";
	
	document.getElementById('title-head').style.color="#1E2C2C";
	document.getElementById('title-head1').style.color="#1E2C2C";
	document.getElementById('title-head2').style.color="#1E2C2C";
	
	document.getElementById('title-head3').style.color="#1E2C2C";
	
	document.getElementById('title-head5').style.color="#1E2C2C";
	
	document.getElementById('main6').style.backgroundColor="#fff";
	
	document.getElementById('main').style.backgroundColor="#fff";
	document.getElementById('main2').style.backgroundColor="#fff";
	document.getElementById('main3').style.backgroundColor="#fff";
	document.getElementById('main4').style.backgroundColor="#fff";
	document.getElementById('main5').style.backgroundColor="#fff";
	
	document.getElementById('main7').style.backgroundColor="#fff";
	 
	
	document.getElementById('chronoExample').style.backgroundColor="#fff";
	
	
	document.getElementById('footer1').style.backgroundColor="#fff";
document.getElementById('footer').style.backgroundColor="#fff";

	
	document.getElementById('top-menu').style.backgroundColor="#3C8DBC";
document.getElementById('top-menu-logo').style.backgroundColor="#367FA9";

document.body.style.backgroundColor="#f8fafc";

document.getElementById('txtNight').value=1

}
 
 
	
}




function digital()
 {
	 
	 
	  var digital =document.getElementById('txtDigital').value;
	    digital=parseInt(digital);
	   
	  if(digital==1)
	  {
	 console.log('First Digital: ' +digital)
	 document.getElementById('countdown').style.fontFamily="sans-serif";
	 
	  document.getElementById('currentTime').style.fontFamily="sans-serif";
	  document.getElementById('dt').style.fontFamily="sans-serif";
	 
	  
	 document.getElementById('txtDigital').value=0;
	 
	 
	}
	
	if(digital==0)
	  {
		   console.log('Second Digital: ' +digital)
	 
	 document.getElementById('countdown').style.fontFamily="'digital-7', sans-serif";
	 
	  document.getElementById('currentTime').style.fontFamily="'digital-7', sans-serif"
	  document.getElementById('dt').style.fontFamily="'digital-7', sans-serif";
	 document.getElementById('txtDigital').value=1;
	}
	
}	

 



function hide_date_time()
{
document.getElementById('dates_times_row').style.display="none";
document.getElementById('dates_times_row_text').style.display="none";

document.getElementById('hours_minutes_sec_row').style.display="block";
document.getElementById('hours_minutes_sec_row_txt').style.display="block";

document.getElementById('txtCheck_Date').value="";
 document.getElementById('date').value="";
  document.getElementById('time').value="";

}

function hide_hour_min_sec()
{
document.getElementById('dates_times_row').style.display="block";
document.getElementById('dates_times_row_text').style.display="block";

document.getElementById('hours_minutes_sec_row').style.display="none";
document.getElementById('hours_minutes_sec_row_txt').style.display="none";

 

}


 
</script>







<link href="./timer/dist/examples.min.css" rel="stylesheet">

 
<style>

	body
	{
		max-height:100%;
		max-weight:100%;
		
	}	 
	 
 
 </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' />

<!--
LOADING THE SAME CSS FROM LOCAL FILE DIRECTORY

-->

<link href="./timer/css/font-awesome-all.css" rel="stylesheet" type="text/css" />
<link href="./timer/css/material-icon.css" rel="stylesheet" type="text/css" />

<link href="./timer/css/font-awesome.min.css" rel="stylesheet" type="text/css" />




<link href="./timer/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="./timer/css/app.css" rel="stylesheet" type="text/css" />

<link href="./timer/css/style.css" rel="stylesheet" type="text/css" />

<link href="./timer/css/app.css" rel="stylesheet" type="text/css" />

<link href="./timer/css/menu.css" rel="stylesheet" type="text/css" />

<link href="./timer/css/switch.css" rel="stylesheet" type="text/css" />

<link href="./timer/css/radio.css" rel="stylesheet" type="text/css" />

<link href="./timer/css/checkbox.css" rel="stylesheet" type="text/css" />
<link href="./timer/css/popup.css" rel="stylesheet" type="text/css" />
<link href="./timer/css/dropdown.css" rel="stylesheet" type="text/css" />
<link href="./timer/css/table.css" rel="stylesheet" type="text/css" />

 

<script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>

<meta name="_token" content="{!! csrf_token() !!}"/>
</head>

<body onload="getAutoColour()">

   

 <div id="chronoExample" style="overflow:hidden;">
 
 <div id="top-menu" class="topMenu">
 <div id="top-menu-logo" class="topMenuLogo">Timer.com </div> 
 
 <div class="mobileNavOpen"><span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class='fas' style='  margin-top:10px;margin-left:4px; margin-right:10px;color:#fff;'>&#xf0c9</i></span></div> 
 
 
  <!-- RIGHT SIDE MENU -->  
    
    <div id="rightNav">
    
    <div  id="spaceMobile"style="width:70px; float:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
    
    <div id="" class=" rightNavcolor " style="width:20px;">
    
    
   <span style="font-size:20px; margin-top:-5px;cursor:pointer" onclick="rightOpenNav()"><i class="fa fa-gear rightNavcolor"  ></i></span>
    
      <span class="tooltiptextSetting">Settings</span>
      
      
      
      </div>
      
       
      
      
 
 <div id="" class="rightNavcolor" style="width:20px;">
  
 <a href="javascript:void(0)" style="font-size:20px; margin-top:-5px;" onclick="nightFall()">
 <i class="fa fa-adjust rightNavcolor" ></i></a> 
 
 
  
 <span class="tooltiptext" >Night Mode</span><input name="txtNight" type="hidden" value='1' id="txtNight" /> 
 <input name="txtDigital" type="hidden" value='1' id="txtDigital" /> 
  
 
 <input name="txtMobile" type="hidden" value='' id="txtMobile" />
  
  <input name="txtCounter" type="hidden" value='0' id="txtCounter" />
  
   <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
  </div>
 
 
<div id="contact-us" class="rightNav" style="text-align:right"><a class="contactUs"  href="contact-us">Contact Us</a></div>
   
 </div></div>
 
 
 
 <!-- SETTINGS START HERE -->
 
 <div id="rightMySidenav" class="right-sidenav">
 
 <div id="settings" class="settings"> Settings</div>
 
 <div style="height:20px; clear:both;"> </div>
 
  
 
 <div class="rightNavLink" >
  Degital Font:   
 </div> 
  <div class="rightNavCheck">
  <label class="switch">
   
  <input type="checkbox" value="ON" checked="checked"  onclick="digital()" >
  <span class="slider round" style="padding-left:5px;padding-top:5px;padding-bottom:5px;padding-right:2px; font-size:11px; font-family:Verdana, Geneva, sans-serif;">ON &nbsp; &nbsp; OFF</span> 
    
</label>  
 </div>
 
 
 <div class="rightNavLink" >
  12 Hours (am/pm)
 </div> 
  <div  class="rightNavCheck">
  <label class="switch">
   
  <input  type="checkbox" id="hours"   checked="checked" value="0" onclick="hours_list()">
  
  
   
  <span class="slider round" style="padding-left:5px;padding-top:5px;padding-bottom:5px;padding-right:2px; font-size:11px;font-family:Verdana, Geneva, sans-serif;">ON &nbsp; &nbsp; OFF</span> 
    
</label> 

 <input  type="hidden" id="dateFormat"  value="1"> 
 </div>
 
 
 <div class="rightNavLink" >
  Night Mode: 
 </div> 
  <div  class="rightNavCheck">
  <label class="switch">
   
  <input type="checkbox" id="mode" onclick="nightFall()">
  <span class="slider round" style="padding-left:5px;padding-top:5px;padding-bottom:5px;padding-right:2px; font-size:11px;font-family:Verdana, Geneva, sans-serif;">ON &nbsp; &nbsp; OFF</span> 
    
</label>  
 </div>
  
   <div class="right-radioButton">Colours</div> 
   
   <label class="container">
  <input type="radio" checked="checked"  onclick="changeColour('#000')"name="radio">
  <span class="checkmark"> </span>
</label>


<label class="container">
  <input type="radio" name="radio" onclick="changeColour('#FF9500')">
  <span class="checkmark2"></span>
</label>

<label class="container">
  <input type="radio" name="radio" onclick="changeColour('#388E3C')">
  <span class="checkmark3"></span>
</label>

<label class="container">
  <input type="radio" name="radio" onclick="changeColour('#1976D2')">
  <span class="checkmark4"></span>
</label>
  
   
  <a href="javascript:void(0)" class="closebtn" onclick="rightCloseNav()">&times;</a>
 
  
 
</div>
<!-- END OF RIGHT MENU  -->


 
 
 <!-- Main slide for mobile Mobile app -->
 
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <a href="./alarm" ><i class="material-icons"><span style=" font-size:17px;"> access_alarms </span></i>&nbsp;&nbsp;Alarm &nbsp;<i class='fas fa-chevron-right'></i></a> 
  
<a href="./timer-reading"><i class="material-icons" ><span style=" font-size:17px;">av_timer</span></i>&nbsp;&nbsp;Timer</a> 
  
  <a class="active" href="./stopwatch"><i class="material-icons" ><span style=" font-size:17px;">timer_off</span></i>&nbsp;&nbsp;Stopwatch</a> 
  
  <a href="./world-clock"><i class='fa fa-clock'></i> &nbsp;&nbsp;World Clock</a>

  
   
  <a href="./add-date"><i class='fas fa-calendar-alt'></i> &nbsp;&nbsp;Day Calculator</a>
  
  
   <a href="./count-days"> <i class='fas fa-calendar-plus'></i> &nbsp;&nbsp;Date Calculator</a>
   
  <a href="./holiday"><i class='fas fa-hotel'></i> &nbsp;&nbsp;Holiday</a>
</div>


 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
<div id="main" class="card mb-5 mainDiv"  >

 


 <div id="mainNavBar" class="navbar-menu">
 
 <div  id="navBar" class="navbar" >
 <!--
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Alam Clock</a> 
  <a href="#"><i class="material-icons">av_timer</i><br />Timer</a> 
  <a href="#"><i class="material-icons">timer_off</i><br /> Stopwatch</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Stopwatch</a> 
   <a href="#"><i class="fa fa-clock"></i> <br />World Clock</a>
  <a href="#"><i class='fas fa-calendar-alt'></i><br>Calendar</a>
  <a href="#"><i class="fa fa-fw fa-user"></i><br>Holiday</a>
  -->
  
  <a href="./alarm"><i class="material-icons ">access_alarm</i><br /><span > Alarm Clock</span></a> 
  <a href="./timer-reading"><i class="material-icons">av_timer</i><br />Timer</a> 
  
  
  <a  class="active" href="./stopwatch"><i class="material-icons active">timer_off</i><br /><span class="active"> Stopwatch</span></a> 
  <a href="./world-clock"><i class="material-icons">access_time</i> <br />World Clock</a>
  
    
 <a href="./add-date"> <i class='fas fa-calendar-alt ' style="font-size:20px;"></i> <br /> Day Calculator</a>
  
  
   <a href="./count-days"> <i class='fas fa-calendar-plus' style="font-size:20px;"></i><br />Date Calculator</a>
 

  <a href="./holiday"><i class='fas fa-hotel'></i><br />Holiday</a>
 
 
</div>
 </div>







<div  class="zommLink">
<!--
     <button class=" maximize" id="goFS"> <img src="images/maximize.png" width="16" height="30" /></button> -->
    <div id="wrap">
   <!--
    <div class="icon" id="minus"></div>
    <div class="icon" id="plus">  </div>
    -->
   <div  class="tooltips zoomTimer"> <a href="javascript:void(0)"><i class="fa fa-minus-circle"    onclick="zoomIn(20)"></i> </a>
     <span class="tooltiptext">Zoom In</span>  </div>
     
    <div  class="tooltips zoomTimer" > <a href="javascript:void(0)"><i class="fa fa-plus-circle"    onclick="zoomOut(20)"></i> </a>
     <span class="tooltiptext">Zoom Out</span>  </div>
    
    
    <div  class="tooltips zoomTimer">
     
     <a href="javascript:void(0)" id="zoomOut" style="font-size:20px; font-weight:normal;"><i class="fa fa-arrows-alt"   onclick="   toggleFullScreen()"></i> </a>
      <a href="javascript:void(0)" id="zoomIn" class="hide_question zoomTimer"> <i class="material-icons " id="zoomIn"  onclick=" toggleFullScreen()">&#xe5d1;</i> </a>
    
    <span id="maximize" class="tooltiptext">Maximize</span>  
</div>


 
    </div>

 

</div>
 
<div style="clear:both"></div>

<div id="setUp" style="font-size:27px; color:#C1C1C1;" >Stopwatch  </div>
<input name="hrs" id="hr_s" type="hidden" value="00" /><input name="mins" type="hidden" value="00" id="min_s" />
<input name="sec" type="hidden" value="00" id="sec_s" />
<input name="txtFont" type="hidden" value='' id="txtFont" />

<!-- THIS TEXTBOX WILL ENABLE ME TO VALIDATE DATE AND HOUR OPTION -->
<input name="txtCheck_Date" type="hidden" value='' id="txtCheck_Date" />

<!-- STORE TIME -->
<input name="txtNow" type="hidden" value='' id="txtNow" />

<!-- KEEP THE VALUE OF THE MAIN STOPWATCH -->
<input name="txtStopWatch" type="hidden" value='' id="txtStopWatch" />

            <div id="currentTime" class="timeSize" style="margin-top:-25px; text-align:center;position:relative;">00:00:00</div>
            <div id="reset" class="timeSize" style="font-size:25px;"> </div>
            
            <div id="dt" class="timeSize" style="font-size:40px;margin-top:-25px; text-align:center;position:relative;"></div>
    
          
<!--
                <div  class="timeSize"  id="countdown">00:00:00</div>
                
-->

                <div class="timeBut" style="margin-top:20px;">

 
 

 
 <nav id="nav" role="navigation" style="position:relative; margin-top:40px; margin-left:40px;">
	 
	<ul class="clearfix">
<li id="reset_but" style="margin-right:10px;" class=""> <input class="pauseButton btn btn-warning btn-lg mb-1" type="submit" name="butPause" id="reset" value="Reset"  onclick="stopwatch.reset(),nextStopwatch.reset()"  /> 
 </li>


<li  id="resume_but" style="display:none;" >
  <input class="pauseButton btn  btn-primary btn-lg mb-1 "  type="submit" name="resume" id="resume" value="&nbsp;Laps&nbsp;"  onclick="stopwatch.lap(),nextStopwatch.lap()"/> 
  </li>


 <li style="display:none;"> <input class="pauseButton btn btn-primary btn-lg mb-1" type="submit" name="butEdit" id="edit" value="Clear Laps"  onclick="nextStopwatch.clear(),stopwatch.clear()"  />
 <input name="" type="hidden" id="setTime"  /> 
 </li>
       
  
  
  
 
  
  
  <li id="pause_but"  style="display:none;" >
    
  <input  class="stopButton btn btn-danger btn-lg mb-1 " type="submit" name="stop" id="pause" value="&nbsp;Stop&nbsp;" onclick="stopwatch.stop(),nextStopwatch.stop()"   />
 </li>  
   
  <li id="butSubmit" >
   <input class="pauseButton btn btn-success btn-lg mb-1"  type="submit" name="button" id="button" value="Start" style="z-index:-2;"   onclick="nextStopwatch.start(),stopwatch.start()"  /> 
   
    </li>
   </ul></nav>
  
  
 
 </div>
 
   
</div>



<!-- POPUP STARTS HERE -->

<audio id="myAudio" controls loop  class="hide_question" >
<source id="audioSource"  src=""  type="audio/mpeg" />
</audio>

















<!-- END OF FIRST PHASE -->


<!-- SECOND PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
    
<div id="main2" class="card mb-5 mainDiv" style="margin-top:-28px; display:none;" >


 
 
 <div  class="div-table" id="alarmTable">
         
        
      
        
      <div class="div-table-row" style=" font-size:30px; margin-top:10px;text-align:center;">Timer </i></div>
       
       
       
          
      <div id="time_setUp"  class="div-table-row  time-set-up" style="text-align:center;" >
      <!--
      <div  id="ctm2" class="div-table-col " ></div>
      
      <div   class=" div-table-col time-set-up"   id="time_setUp" >00:00:00</div>
 -->
 
 
  
 <div   class=" div-table-col time-set-up hide_question"   id="tsp" >00:00:00</div>
 
 
   00:00:00
      </div>
       
       
       
      <div class="div-table-row " style="text-align:center;" >
      
       <span id="tm" class='material-icons time-set-up' style="text-align:center; visibility:hidden;">&nbsp;av_timer </span>
       
        
         <span  id="countdown" class="time-set-up small-time-size">00:00:00</span>
 
 
   
      </div> 
     

 </div>
 
 
 <div style="margin-top:15px; text-align:center; margin-bottom:20px;"> <input  class="stopButton btn btn-danger btn-lg mb-1" type="submit" name="test" id="btnTestAlarm" value="Stop Alarm"  onclick="terminateAlerm()"  />
</div>
 
 </div>
 
 
  
  
 <!-- SIXTH PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
 
   
<div id="main6" class="mainDiv2 card mb-5" style="margin-top:-28px; display:inline-block;  position:relative; display:none;" >
  <div  id="title-head" class="title-head" style="text-align:center;">
  
  
  
  <span class=rstclass style=' padding-left:30px;text-align:right;font-family:monospace; margin-right:60px; display:inline-block;'  >Lap</span>  
  <span class=rstclass style='text-align:left;font-family:monospace; margin-right:100px;display:inline-block;'  >Time</span></div>
  
   <div   class="small-time-size"   id="tsp1" >00:00:00.0</div>

  
  <div style="font-size:40px;margin-top:10px; text-align:center; position:relative;"><ul class="results small-time-size"></ul> </div>
 <br />
  

  
</div>




<!-- SEVENTH PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
 
   
<div id="main7" class="mainDiv card mb-5" style="margin-top:-28px; display:inline-block;min-width:88%; " >
  <div  id="title-head3" class="title-head">Advert  </div>
 <br />
 <div id="list-button-minutes">
 

 


 

  
 </div>

  
</div>

 
  
    


<!-- ThIRD PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
 
   
<div id="main3" class="mainDiv card mb-5" style="margin-top:-28px; display:inline-block; display:none;" >
 <div  id="title-head1" class="title-head">Set Timer Hour </div>
 <br />
 
 <!-- BUTTON LIST IS IN HERE -->
 <div id="list-button-hour">
 




  
 </div>

  
  
  
 
  
  
</div>




<!-- FOURTH PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
    
<div id="main4" class="card mb-5 mainDiv" style="margin-top:-28px;" >

 <div  id="title-head2" class="title-head">How to use the online Stopwatch </div>
<div  id="text-main" class="mainbody">
  The online stopwatch counts the time to the millisecond that passes after you click the "Start" button. It allows you to add laps. If you close the stopwatch, the value and laps will be automatically saved. If the period is sufficiently large, the number of days passed will be displayed, too.

In the stopwatch settings, you can configure the accuracy for displaying fractions of a second.

Click the "Start" or "Stop" buttons to start or stop the stopwatch. Click the "Lap" button to add one lap and the stopwatch current value to the lap list. To reset laps and the stopwatch value, click the "Reset" button (the button appears when the stopwatch is stopped).

You can configure the stopwatch appearance (text color, type, and size), and these settings will be saved; they will be used when you open your web browser next time.

You can add links to online stopwatches with various time values and lap lists to your browser's Favorites.</div>
</div>



<!-- FIFTH PHASE STARTS HERE -->

  
    
<div id="main5" class="card mb-5 mainDiv2 mainbody" style="margin-top:-28px; display:inline-block min-width:88%; " >
 <div  id="title-head5" class="title-head">Blog </div>
 
 <br />
 
  @foreach($query as $rst)
@if(trim($rst->menu) ==  "StopWatch")
  
 <!--
 <img src="../timer/images/default_avatar.webp" width="50" height="50" /> 
 -->
<div style="font-size:12px; color:#436FB8;font-weight:bold;"> {!!  $rst->created_at!!}</div>
{!! str_limit($rst->details,600)!!}
<br />

<div  class="title-head">
<input name="" id="but20" type="button" class="button-blue-read spacing-button"  value="Read More..." onClick="window.location.href='../view-blog-page/{!!$rst->id !!}'"/> 

<input name="" id="but10" type="button" class="button-blue-read spacing-button"  value="Comment" onClick="window.location.href='../view-blog-page/{!!$rst->id !!}'"/> 


</div>
<br />
@endif
@endforeach
   
</div>


 

<div  id="footer1" class=" card mb-5 mainDiv"   style="margin-top:0px;" >
<span class="mainbody">
  <div  id="footer"class="footer">Copyright ©2019 timeer.com All Rights Reserved.</div>

   </span>
   
     <a href="javascript:void(0)" style="text-align:right;"  onclick="scrolling()">Top </a>
  </div>  
 
 </div>
 
 
 
 <!-- POPUP SCRIPT STARTS HERE -->
 
 <script>
 
 $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},}); 	

 
 
// Get the modal
 


 
 
 

/*PLAYING FROM LINK */


 





 
 
  
  

 
	
	 
	 
	 
	 

</script>

 
 
 

 



<script>
function toggleFullScreen() {
  var doc = window.document;
  var docEl = doc.documentElement;
  
  
   
	   

  var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
  var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;
  
  
  
  
 // alert(document.getElementById('txtMobile').value);
  

  if(!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
    requestFullScreen.call(docEl);
	
	
	 var cur =document.getElementById('currentTime');
	var style =window.getComputedStyle(cur,null).getPropertyValue('font-size');
	
	var style=parseFloat(style)
	 
	   document.getElementById('txtMobile').value= style;
	
	 
	 
	
	 document.getElementById('chronoExample').style.width='100%';
	  
	  
	  
	   document.getElementById('top-menu').style.display="none";
	   
	    
	   
	   document.getElementById('top-menu-logo').style.display="none";
	   
	    document.getElementById('mainNavBar').style.display="none";
	document.body.style.backgroundColor="#fff";
	
	
	document.getElementById('main').style.border="none";
	document.getElementById('main2').style.border="none";
	document.getElementById('main6').style.border="none";
	document.getElementById('main7').style.border="none";
	
	document.getElementById('main3').style.display="none";
	document.getElementById('main4').style.display="none";
	document.getElementById('main5').style.display="none";
	
	 
	//document.getElementById('main6').style.border="none";
	
	//document.getElementById('main7').style.display="none";
	 document.getElementById('setUp').style.display="none";
	 
	 document.getElementById('footer1').style.display="none";
	 
	 
	document.getElementById('zoomIn').className='show_question';
	
	 document.getElementById('zoomOut').className='hide_question';
	 
	  //document.getElementById('welcome').className='hide_question';
	  
	 
	  
	  
  }
  else {
    cancelFullScreen.call(doc);
	
	
	document.getElementById('top-menu').style.display="block";
	   document.getElementById('top-menu-logo').style.display="block";
	   
	   
	   
	    
	
	 /* THESE CODES HELP US TO HIDE MENU FOR DESKTOP */
	//document.getElementById('txtMobile').value;
	 var style=parseFloat(document.getElementById('txtMobile').value)
	 
	 //alert(style);
	 
	 //if(style ==130)  
	if(style >60)
	{
	   
	   
	  // cur.style.fontSize='130px';
	   document.getElementById('mainNavBar').style.display="block";
	   
	}
	if (style == 60){
		//cur.style.fontSize=(45)+'px';
		  
	}	
	   
	   
		
	 
	 document.getElementById('main').style.backgroundClip="border-box";
	 
	 
	 
	 document.getElementById('main').style.border="1px solid rgba(0,0,0,.125)";
	 
	 
	  document.getElementById('main2').style.backgroundClip="border-box";
	 
	 document.getElementById('main2').style.border="1px solid rgba(0,0,0,.125)";
	 
	 
	 
	 
	  document.getElementById('main6').style.backgroundClip="border-box";
	 
	 document.getElementById('main6').style.border="1px solid rgba(0,0,0,.125)";
	
	document.getElementById('main7').style.backgroundClip="border-box";
	 
	 document.getElementById('main7').style.border="1px solid rgba(0,0,0,.125)";
	
	
	document.getElementById('main5').style.display="block";
	
	
	
	document.getElementById('main4').style.display="block";
	document.getElementById('main6').style.display="block";
	
	document.getElementById('main7').style.display="block";
	
	 document.getElementById('setUp').style.display="block";
	
	document.getElementById('title-head').className="title-head";
	
	
	document.getElementById('text-main').className="mainbody"
	document.getElementById('text-main').style.padding="13px";
	
	 
	
	document.getElementById('text-main').style.textAlign="left";
	 
	 
	   
	  
	 
	
	
	//document.getElementById('main5').style.display="block";
	
	 document.getElementById('footer1').style.display="block";
	 
	 document.body.style.backgroundColor="#f8fafc";
	 
	 
	document.getElementById('zoomIn').className='hide_question';
	document.getElementById('zoomOut').className='show_question';
	
	
	
	//document.getElementById('title-head').style.fontSize='130px';
	
	
	 
	 
	  
	  document.getElementById('chronoExample').style.width='98%';
	  
	  
	  
	  
	   
		
  }
}
</script>


<script>
   
	 var dtArrays=[];
  
class Stopwatch {
	 
    constructor(display, results) {
        this.running = false;
        this.display = display;
        this.results = results;
        this.laps = [];
        this.reset();
        this.print(this.times);
		
		this.print(this.timess);
    }
    
    reset() {
		
		
		 
        this.times = [0, 0, 0, 0 ];
		  this.running = false;
		 
 		 this.clear();
        this.print();
		 
		   
		
		 
		 //this.running = false;
		
		
    }
    
    start() {
        if (!this.time) this.time = performance.now();
        if (!this.running) {
			
            this.running = true;
            requestAnimationFrame(this.step.bind(this));
			 
		 
		 }
		  
		document.getElementById('butSubmit').style.display="none";
		document.getElementById('reset_but').style.display="none";
		
		document.getElementById('pause_but').style.display="block";
		document.getElementById('resume_but').style.display="block";
		
		 
		
    }
    
    lap() {
		
		//this.running = false;
		 
		/*
		document.getElementById('main6').style.display="block";
		
		var font= "<span class=rstclass style=margin-right:60px; text-align:left;font-family:monospace; > ";
		var clfont="</span>";
		var numb= parseInt(document.getElementById('hr_s').value);
		numb=numb+1;
		document.getElementById('hr_s').value=numb;
        let times = this.times;
		 
        let li = document.createElement('li');
        li.innerHTML = font+numb + clfont+ this.format(times);
		
		 
		 
		
		  dtArrays.push({
		     dtArraysTime:times[2] 
			 
			});
			
			//console.log(dtArrays);
		//console.log('Times: '+times);
         this.results.appendChild(li);
		 */
		  this.running = false;
		  
		 if (!this.time) this.time = performance.now();
        if (!this.running) {
            this.running = true;
            requestAnimationFrame(this.step.bind(this));
        }
		   
    }
    
    stop() {
        this.running = false;
        this.time = null;
		 
		
		document.getElementById('butSubmit').style.display="block";
		document.getElementById('pause_but').style.display="none";
		
		document.getElementById('reset_but').style.display="block";
		
		document.getElementById('resume_but').style.display="none";
    }

     restart() {
		
        if (!this.time) this.time = performance.now();
        if (!this.running) {
            this.running = true;
            requestAnimationFrame(this.step.bind(this));
        }
        this.reset();
		 this.clear();
		 document.getElementById('hr_s').value="00";
		 
		 document.getElementById('butSubmit').style.display="none";
		document.getElementById('reset_but').style.display="none";
		
		document.getElementById('pause_but').style.display="block";
		document.getElementById('resume_but').style.display="block";
		
		document.getElementById('main6').style.display="none";
    }
	
	
    clear() {
        clearChildren(this.results);
    }
    
    step(timestamp) {
		 
        if (!this.running) return;
		//this.calculate_reset(timestamp);
        this.calculate(timestamp);
		
        this.time = timestamp;
        this.print();
		
		//console.log('Print Time: '+ this.print())
        requestAnimationFrame(this.step.bind(this));
    }
	
	
	  
    calculate(timestamp) {
        var diff = timestamp - this.time;
        // Hundredths of a second are 100 ms
        this.times[3] += diff / 10;
        // Seconds are 100 hundredths of a second
        if (this.times[3] >= 100) {
            this.times[2] += 1;
            this.times[3] -= 100;
			
			  
        }
        // Minutes are 60 seconds
        if (this.times[2] >= 60) {
            this.times[1] += 1;
            this.times[2] -= 60;
			
			 
        }
		
		// Minutes are 60 seconds
        if (this.times[1] >= 60) {
            this.times[0] += 1;
            this.times[1] -= 60;
			
			
        }
		 
		 
		 
    }
	
	
	 
	
    
    print() {
        //this.display.innerText = this.format(this.times);
		var font= "<span style='font-size:30px'; class='timeSize'>";
		var clfont="</span>";
		 //this.display.innerText = this.format(this.times);
		
		//console.log(this.format(this.times));
		var c=this.format(this.times);
		 
		//var val =c.substring(0,5)+ "<span  class='small-stopwatch-size'>."+c.substring(6,9) +"</span>"   ;
		var val =c.substring(0,8)+ "<span  class='small-stopwatch-size'>."+c.substring(9,12) +"</span>";
		 
		 this.display.innerHTML=val;
		 document.getElementById('txtStopWatch').value=val;
		 
		 
		 /*
		var x=this.format1(this.timess);
		 
		//var val =c.substring(0,5)+ "<span  class='small-stopwatch-size'>."+c.substring(6,9) +"</span>"   ;
		var val1 =x.substring(0,8)+ "<span  class='small-stopwatch-size'>."+x.substring(9,12) +"</span>";
		 
		 tsp.innerHTML=val1;*/
		 
		  
    }
    
    format(times) {
	 
	
	 
        return `\
${pad0(times[0], 2)}:\
${pad0(times[1], 2)}:\
${pad0(times[2], 2)}:\
${pad0(Math.floor(times[3]),2 )}`;
 

     }
	 
	   
	 
	 
}

function pad0(value, count) {
    var result = value.toString();
    for (; result.length < count; --count)
        result = '0' + result;
		
		//console.log(' pad0 '+result);
    return result;
}



 





function clearChildren(node) {
    while (node.lastChild)
        node.removeChild(node.lastChild);
		
}

/*
let stopwatch = new Stopwatch(
    document.querySelector('.stopwatch'),
    document.querySelector('.results'));
*/
	
var stopwatch = new Stopwatch(


    document.querySelector('#currentTime'),
    document.querySelector('.results'));


 



/* CLASS FOR LAP COUNTER */





class NextStopwatch {
	 
    constructor(display, results) {
        this.running = false;
        this.display = display;
        this.results = results;
        this.laps = [];
        this.reset();
        this.print(this.times);
		
		this.print(this.timess);
    }
    
    reset() {
		
		
		 
        this.times = [0, 0, 0, 0 ];
		  this.running = false;
		 
 		 this.clear();
        this.print();
		 
		   document.getElementById('hr_s').value="00";
		
		 
		 //this.running = false;
		
		
    }
    
    start() {
        if (!this.time) this.time = performance.now();
        if (!this.running) {
            this.running = true;
            requestAnimationFrame(this.step.bind(this));
			
			//alert('im here'); 
        }
		
		 
		document.getElementById('butSubmit').style.display="none";
		document.getElementById('reset_but').style.display="none";
		
		document.getElementById('pause_but').style.display="block";
		document.getElementById('resume_but').style.display="block";
		document.getElementById('main6').style.display="block";
		
		
    }
    
    lap() {
		
		//this.running = false;
		 
		
		document.getElementById('main6').style.display="block";
		
		var font= "<span class=rstclass style=margin-right:60px; text-align:left;font-family:monospace; > ";
		var clfont="</span>";
		var numb= parseInt(document.getElementById('hr_s').value);
		numb=numb+1;
		document.getElementById('hr_s').value=numb;
		
		  var c=this.format(this.times);
         
		  
		 var val =c.substring(0,8)+'.'+ c.substring(9,12);
		 
		 
		
		//var val =c.substring(0,8)+ "<span  class='small-stopwatch-size'>."+c.substring(9,12) +"</span>";
		
		var total= document.getElementById('txtStopWatch').value
		
        let li = document.createElement('li');
        //li.innerHTML = '&ensp; &ensp; &ensp;' +font+numb +'&ensp; &ensp;' + val + clfont + total;
		
		li.innerHTML = '&ensp; &ensp; ' +font+numb +'&ensp; &ensp;' + val + clfont ;
		
		 
		 
		 
			 
         //this.results.appendChild(li);
		  this.results.prepend(li);
		   
		   this.restart(); 
    }
    
    stop() {
        this.running = false;
        this.time = null;
		 
		
		document.getElementById('butSubmit').style.display="block";
		document.getElementById('pause_but').style.display="none";
		
		document.getElementById('reset_but').style.display="block";
		
		document.getElementById('resume_but').style.display="none";
    }

    restart() {
		
		this.times = [0, 0, 0, 0 ];
		  this.running = false;
		 
		 //document.getElementById('hr_s').value="00";
		
        if (!this.time) this.time = performance.now();
        if (!this.running) {
            this.running = true;
            requestAnimationFrame(this.step.bind(this));
        }
        
		 
		 /*
		 document.getElementById('butSubmit').style.display="none";
		document.getElementById('reset_but').style.display="none";
		
		document.getElementById('pause_but').style.display="block";
		document.getElementById('resume_but').style.display="block";
		
		 document.getElementById('main6').style.display="none"; */
    }
	
	
    clear() {
        clearChildren(this.results);
    }
    
    step(timestamp) {
		 
        if (!this.running) return;
		//this.calculate_reset(timestamp);
        this.calculate(timestamp);
		
        this.time = timestamp;
        this.print();
		
		//console.log('Print Time: '+ this.print())
        requestAnimationFrame(this.step.bind(this));
    }
	
	
	  
    calculate(timestamp) {
        var diff = timestamp - this.time;
        // Hundredths of a second are 100 ms
        this.times[3] += diff / 10;
        // Seconds are 100 hundredths of a second
        if (this.times[3] >= 100) {
            this.times[2] += 1;
            this.times[3] -= 100;
			
			  
        }
        // Minutes are 60 seconds
        if (this.times[2] >= 60) {
            this.times[1] += 1;
            this.times[2] -= 60;
			
			 
        }
		
		// Minutes are 60 seconds
        if (this.times[1] >= 60) {
            this.times[0] += 1;
            this.times[1] -= 60;
			
			
        }
		 
		 
		 
    }
	
	
	 
	
    
    print() {
        //this.display.innerText = this.format(this.times);
		 
		
		var font= "<span class=rstclass style=margin-right:60px; text-align:left;font-family:monospace; > ";
		var clfont="</span>";
		
		
		 //this.display.innerText = this.format(this.times);
		
		//console.log(this.format(this.times));
		var c=this.format(this.times);
		 
		 
		var val =c.substring(0,8)+ "<span  class=rstclass style=margin-right:60px; text-align:left;font-family:monospace;>."+c.substring(9,12) +"</span>";
		 
		 //tsp1.innerHTML=val;
		 tsp1.innerHTML ='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+  val;
		 
		 
		  
    }
    
    format(times) {
	 
	
	 
        return `\
${pad0(times[0], 2)}:\
${pad0(times[1], 2)}:\
${pad0(times[2], 2)}:\
${pad0(Math.floor(times[3]),2 )}`;
 

     }
	 
	   
	 
	 
}

function pad0(value, count) {
    var result = value.toString();
    for (; result.length < count; --count)
        result = '0' + result;
		
		//console.log(' pad0 '+result);
    return result;
}



 





function clearChildren(node) {
    while (node.lastChild)
        node.removeChild(node.lastChild);
		
}


var nextStopwatch = new NextStopwatch(


    document.querySelector('#currentTime'),
    document.querySelector('.results'));













 
 
 
/* SCROLLING TO TOP OF PAGE */
 
function scrolling()
{
	 
	$('html,body').animate({scrollTop:20},'0');
	
 
	 
	document.body.style.transition=".5s";
	
 
}
 


</script><!-- INSTANT LOADING OF HOUR -->

 

<script src="../js/jquery-3.4.1.js"></script>
 
<script src="./timer/js/dropdown.js"> </script>
  

   
</body>
</html>
