<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Alarm</title>
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
		  document.getElementById('txtFont').value=(fontSizeTSP+(multiplier * 0.2)+'px');
		  
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
		 
		 var c =(fontSizeTSP-(multiplier * 0.2)+'px')
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
	 
	 	 
  
  //document.getElementById("mySidenav").style.transition=".5s";
  
 /* document.getElementById("main").style.marginLeft= "0";*/
 
 /*
  document.getElementById("main").style.marginLeft= "165px";
  
  document.getElementById("main2").style.marginLeft= "165px";
   document.getElementById("main2").style.transition=".5s";
   
   document.getElementById("main3").style.marginLeft= "165px";
   document.getElementById("main3").style.transition=".5s";
   
   document.getElementById("main4").style.marginLeft= "165px";
   document.getElementById("main4").style.transition=".5s";
   
   document.getElementById("main5").style.marginLeft= "165px";
   document.getElementById("main5").style.transition=".5s";
   
   */
  
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
  
  //// document.getElementById("main5").style.marginRight = "250px";
  //document.getElementById("main5").style.transition=".5s";
  
  
  document.getElementById("main6").style.minWidth="69.04%";
   document.getElementById("main6").style.marginRight = "250px";
  document.getElementById("main6").style.transition=".5s";
  
  
  document.getElementById("main5").style.minWidth="69.04%";
   document.getElementById("main5").style.marginRight = "250px";
  document.getElementById("main5").style.transition=".5s";
  
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
   
   
   // document.getElementById("main5").style.marginRight= "0";
  // document.getElementById("main5").style.transition=".5s";
   
   document.getElementById("footer1").style.marginRight= "0";
   document.getElementById("footer1").style.transition=".5s";
   
  
  document.getElementById("rightNav").style.marginRight= "20px";
  
  document.getElementById("rightNav").style.transition=".5s";
  
  document.getElementById("main6").style.minWidth="88%";
   document.getElementById("main6").style.marginRight= "0";
   document.getElementById("main6").style.transition=".5s";
   
   document.getElementById("main5").style.minWidth="88%";
   document.getElementById("main5").style.marginRight= "0";
   document.getElementById("main5").style.transition=".5s";
  
   document.getElementById("mainNavBar").style.marginRight = "0px";
    document.getElementById("mainNavBar").style.transition=".5s";
	
	 //document.getElementById('mainNavBar').style.position="static";
	 
  
 // jQuery('#navbar-menu').css({position:"fixed"});
  
  
}
</script>
 


<script>

function playAudio() {
	
 
  var myAudio=document.getElementById("myAudio");
  
  var source=document.getElementById("myAudio");

source.src =document.getElementById("hr").value;

 
   
  document.getElementById("myAudio").play()
  
  
}

function stopAudio()
{
	var myAudio=document.getElementById("myAudio");
	
	 
	 
	document.getElementById("myAudio").pause();
	//document.getElementById("myAudio").reset();
	 
}
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
	
	//document.getElementById('zoomOut').style.color="#fff";
	//document.getElementById('zoomIn').style.color="#fff";
	
	//document.getElementById('minox').style.color="#fff";
	//document.getElementById('plux').style.color="#fff";
	
document.getElementById('title-head3').style.color="#FF9500";
 	
	
	document.getElementById('main').style.backgroundColor="#222D32";
	document.getElementById('main2').style.backgroundColor="#222D32";
	document.getElementById('main3').style.backgroundColor="#222D32";
	document.getElementById('main4').style.backgroundColor="#222D32";
	document.getElementById('main5').style.backgroundColor="#222D32";
	
	document.getElementById('main6').style.backgroundColor="#222D32";
	
	document.getElementById('main6').style.color="#FF9500";
	 document.getElementById('main5').style.color="#FF9500";
	
	document.getElementById('main4').style.color="#FF9500";
	
	
	

document.getElementById('top-menu').style.backgroundColor="#222D32";
document.getElementById('top-menu-logo').style.backgroundColor="#222D32";


document.getElementById('footer1').style.backgroundColor="#222D32";
document.getElementById('footer').style.backgroundColor="#222D32";


document.body.style.backgroundColor="#222D32";

document.getElementById('txtNight').value=0

document.getElementById('text-main').style.color="#FF9500";
	
	document.getElementById('title-head').style.color="#FF9500";
	document.getElementById('title-head4').style.color="#FF9500";
	document.getElementById('title-head5').style.color="#FF9500";
	document.getElementById('footer1').style.color="#FF9500";
document.getElementById('footer').style.color="#FF9500";


}
else
{
	 document.getElementById('currentTime').style.color="#000";
	document.getElementById('countdown').style.color="#000";
	document.getElementById('dt').style.color="#000";
	
	document.getElementById('alarmTable').style.color="#000";
	document.getElementById('main2').style.color="#000";
	document.getElementById('main5').style.color="#000";
	
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
	
document.getElementById('title-head4').style.color="#1E2C2C";
document.getElementById('title-head5').style.color="#1E2C2C";

document.getElementById('title-head3').style.color="#1E2C2C";
 	
	document.getElementById('main').style.backgroundColor="#fff";
	document.getElementById('main2').style.backgroundColor="#fff";
	document.getElementById('main3').style.backgroundColor="#fff";
	document.getElementById('main4').style.backgroundColor="#fff";
	document.getElementById('main5').style.backgroundColor="#fff";
	
	document.getElementById('main6').style.backgroundColor="#fff";
	document.getElementById('main6').style.color="#fff";
	//document.getElementById('main7').style.color="#fff";
	
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



</script>







<link href="../timer/dist/examples.min.css" rel="stylesheet">

 
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

<link href="timer/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="timer/css/app.css" rel="stylesheet" type="text/css" />

<link href="timer/css/style.css" rel="stylesheet" type="text/css" />

<link href="timer/css/app.css" rel="stylesheet" type="text/css" />

<link href="timer/css/menu.css" rel="stylesheet" type="text/css" />

<link href="timer/css/switch.css" rel="stylesheet" type="text/css" />

<link href="timer/css/checkbox.css" rel="stylesheet" type="text/css" />
<link href="timer/css/popup.css" rel="stylesheet" type="text/css" />
<link href="timer/css/dropdown.css" rel="stylesheet" type="text/css" />
<link href="timer/css/table.css" rel="stylesheet" type="text/css" />
 </head>

<body  onload="getAutoColour()" >

  


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
 <input name="txtFont" type="hidden" value='' id="txtFont" /> 
 
 <input name="txtMobile" type="hidden" value='' id="txtMobile" />
  
  <input name="txtCounter" type="hidden" value='0' id="txtCounter" /></div>
 
 
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
  
  <a  class="active" href="alarm" ><i class="material-icons"><span style=" font-size:17px;"> access_alarms </span></i>&nbsp;&nbsp;Alarm &nbsp;<i class='fas fa-chevron-right'></i></a> 
  
 <a href="timer-reading"><i class="material-icons" ><span style=" font-size:17px;">av_timer</span></i>&nbsp;&nbsp;Timer</a> 
  
  
  <a href="stopwatch"><i class="material-icons" ><span style=" font-size:17px;">timer_off</span></i>&nbsp;&nbsp;Stopwatch</a> 
  
  <a href="world-clock"><i class='fa fa-clock'></i> &nbsp;&nbsp;World Clock</a>
   
   
   
  <a href="add-date"><i class='fas fa-calendar-alt'></i> &nbsp;&nbsp;Day Calculator</a>
  
  
   <a href="count-days"> <i class='fas fa-calendar-plus'></i> &nbsp;&nbsp;Date Calculator</a>
  
  <a href="holiday"><i class='fas fa-hotel'></i> &nbsp;&nbsp;Holiday</a>
</div>


 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
<div id="main" class="card mb-5 mainDiv" >

 


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
  
  
   
  
  <a class="active" href="alarm"><i class="material-icons active">access_alarm</i><br /><span class="active"> Alarm Clock</span></a> 
  <a href="timer-reading"><i class="material-icons">av_timer</i><br />Timer</a> 
  <a href="stopwatch"><i class="material-icons">timer_off</i><br /> Stopwatch</a> 
  <a href="world-clock"><i class="material-icons">access_time</i> <br />World Clock</a>
  
    
 <a href="add-date"> <i class='fas fa-calendar-alt ' style="font-size:20px;"></i> <br /> Day Calculator</a>
  
  
   <a href="count-days"> <i class='fas fa-calendar-plus' style="font-size:20px;"></i><br />Date Calculator</a>
 
  <a href="holiday"><i class='fas fa-hotel' style="font-size:20px;"></i><br />Holiday</a>
 
 
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
<div id="setUp" style="font-size:27px; color:#C1C1C1;" >Alarm  </div>
            <div id="currentTime" class="timeSize" style="margin-top:-25px; text-align:center;">00:00:00</div>
            
            
            
            <div id="dt" class="timeSize" style="font-size:40px;margin-top:-25px; text-align:center"></div>
            
<!--
                <div  class="timeSize"  id="countdown">00:00:00</div>
-->
                <div class="timeBut" style="margin-top:20px;">

 
 

 
 <nav id="nav" role="navigation" style="position:relative; margin-left:40px;">
	 
	<ul class="clearfix">
<li style="margin-right:10px;" class="hide_question"> <input class="pauseButton btn btn-warning btn-lg mb-1" type="submit" name="butPause" id="reset" value="Reset"   /> 
 </li>
 <li class="hide_question"> 
 <input class="pauseButton btn btn-secondary btn-lg mb-1" type="submit" name="butEdit" id="edit" value="Edit"   />
 <input name="" type="hidden" id="setTime" /> 
 </li>
       
 
        
 
  <li style="margin-left:2px;">
  <div class="hide_question">
  <input  class="stopButton btn btn-danger btn-lg mb-1  hide_question" type="submit" name="test" id="" value="Test"   />
  
  <input  class="stopButton btn btn-danger btn-lg mb-1 hide_question" type="submit" name="stop" id="pause" value="Stop"   />
 
  <input class="pauseButton btn btn-success btn-lg mb-1 hide_question"  type="submit" name="resume" id="resume" value="Resume" /> 
  
  </div>
  <div  id="butSubmit">
   <input class="pauseButton btn btn-success btn-lg mb-1"  type="submit" name="button" id="button" value="Set Alarm" style="z-index:-2;onclick="caculateDate()" "    /> 
   </div>
    </li>
   </ul></nav>
  
  
 
 </div>
 
   
</div>



<!-- POPUP STARTS HERE -->

<audio id="myAudio" controls loop  class="hide_question" >
<source id="audioSource"  src=""  type="audio/mpeg" />
</audio>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
    <h4> <span class="header-title">Edit Alarm</span></h4>
      <span class="close">&times;</span>
     
    </div>
    <div class="modal-body">
      
      
      
      <div  class="div-table">
      <div class="div-table-row">  
      <div class="div-table-col">Hours </div>
      <div class="div-table-col">Minutes </div>
      </div>
      
      <div class="div-table-row">  
      <div class="div-table-col">
      
  <select class="lst-menu" id="lstHour">
    <option value="12 AM">12 AM</option>
    <option value="1 AM">1 AM</option>
    <option value="2 AM">2 AM</option>
    <option value="3 AM">3 AM</option>
    <option value="4 AM">4 AM</option>
    <option value="5 AM">5 AM</option>
    <option value="6 AM">6 AM</option>
    <option value="7 AM">7 AM</option>
    <option value="8 AM">8 AM</option>
    <option value="9 AM">9 AM</option>
    <option value="10 AM">10 AM</option>
    <option value="11 AM">11 AM</option>
    <option value="12 PM">12 PM</option>
    <option value="1 PM">1 PM</option>
    <option value="2 PM">2 PM</option>
    <option value="3 PM">3 PM</option>
    <option value="4 PM">4 PM</option>
    <option value="5 PM">5 PM</option>
    <option value="6 PM">6 PM</option>
     <option value="7 PM">7 PM</option>
      <option value="8 PM">8 PM</option>
       <option value="9 PM">9 PM</option>
        <option value="10 PM">10 PM</option>
         <option value="11 PM">11 PM</option>
  </select>
  </div>
      <div class="div-table-col">
      <!-- <span class="custom-select" style="width:100%; height:auto;">-->
  <select class="lst-menu" id="lstMinutes">
    <option value="00">00</option>
    <option value="01">01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
     <option value="19">19</option>
      <option value="20">20</option>
       <option value="21">21</option>
        <option value="22">22</option>
         <option value="23">23</option>
         
         
          
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
     <option value="42">42</option>
      <option value="43">43</option>
       <option value="44">44</option>
        <option value="45">45</option>
         <option value="46">46</option>
         
         
        <option value="47">47</option>
    <option value="48">48</option>
     <option value="49">49</option>
      <option value="50">50</option>
       <option value="51">51</option>
        <option value="52">52</option>
         <option value="53">53</option>
         
         
         <option value="44">54</option>
      <option value="55">55</option>
       <option value="56">56</option>
        <option value="57">57</option>
         <option value="58">58</option>
         <option value="59">59</option>
  </select>
  </div>      </div>
      
      
      
     <div class="div-table-row">  
      <div class="div-table-col">Sound </div>
      <div class="div-table-col">&nbsp; </div>
      </div>
      
      <div class="div-table-row">  
      <div class="div-table-col">
      <!-- <span class="custom-select" style="width:100%; height:auto;">-->
  <select id="hr" class="lst-menu" style="width:88%;">
  <option value="./timer/tones/huawei alarm.mp3">huawei alarm</option>
    <option value="./timer/tones/best alarm.mp3">best alarm</option>
    <option value="./timer/tones/Camila Cabello Havana.mp3">Camila Cabello Havana</option>
    
    <option value="./timer/tones/In The End.mp3">In The End</option>
    <option value="./timer/tones/let me love you.mp3">let me love you</option>
    <option value="./timer/tones/Lifetime.mp3">Lifetime</option>
    <option value="./timer/tones/lovely alarm.mp3">lovely alarm</option>
    <option value="./timer/tones/new minion wake up.mp3">new minion wake up</option> 
  </select>
  <span> <a href="javascript:void(0)"  onclick="playAudio()"><i class="far fa-play-circle" style="color:DodgerBlue; font-size:18px;"> </i></a></span>
  </div>
  
  
      <div class="div-table-col" style="text-align:left;"><label class="container" > 
  <input type="checkbox" checked="checked"  value="1">&nbsp;<span  style="font-size:13px;">Repeart Sound</span>
  <span class="checkmark5"></span>
</label> </div>
      </div> 
      
      
      
      
      
      <div class="div-table-row">  
      <div class="div-table-col">Title </div>
     
      </div>
      
      <div class="div-table-row">  
      <div class="div-table-col" style="width:90%;">
      
       
          <input id="optionA" type="text" class="form-control" name="optionA" value="AlarM"  readonly="readonly" required autofocus autocomplete="off"></div>
      
      <input id="optionB" type="hidden" class="form-control" name="optionB" value="" required autofocus autocomplete="off">
      </div>
      
      <div class="div-table-row">  
      <div class="div-table-col"> </div>
     
      </div>
      
     
      
      
      
      


     <br /><br /> 
      
    </div>
   </div>
   
    <div class="modal-footer" style="height:60px; width:100%; text-align:center; background-color:#FCFCFC;">
    <div style="text-align:left; width:100%" class="hide_question"><input name="btnTest" type="button"  class="button-gray" value="Test" /> </div>
    
    <input class="button-blue" name="btnCancel" id="btnCancel" type="button"  value="Cancel"/>&nbsp;&nbsp;&nbsp; <input class="button-green" name="btnStart"  id="btnStart"type="button"  value="Start" onclick="caculateDate()" /> </div>
    
    
  </div>

</div>








<div id="myModalStop" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
    <div class="modal-header" style="background-color:#f44336;">
    <h4> <span class="header-title">Alarm</span></h4>
      <span class="closeAlarm">&times;</span>
     
    </div>
    <div class="modal-body">
      
      
      <div  class="div-table">
         
         
      
       <br /><br />  
         
      <div class="div-table-row" style=" font-size:54px;text-align:center; color:#f44336; margin:25px;"><i class="material-icons" style=" font-size:54px;">  access_alarms </i></div>
       
       
      
      
        
      <div class="div-table-row" style=" font-size:30px; margin-top:10px;text-align:center;">  Alarm </i></div>
       
       
      
      
      <div id="alarmTime" class="div-table-row" style=" font-size:16px;text-align:center;"> Alarm Time  </div>
       
      
      
      
        
      <div id="timeOver" class="div-table-row" style=" font-size:16px; text-align:center;">  Overdue  </div>
       
       
       
        <div class="div-table-row"  style=" font-snter; color:#f44336; margin:25px; border:thin; border-left:none;border-right:none;border-top:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
         
       
       
 
      </div>
      
      


     <br /> 
      </div>
    
    <div class="modal-footer" style="height:60px; text-align:center; background-color:#FCFCFC;" >
    <input name="btnTest" type="button"  class="button-red" value="Ok" onclick="terminateAlerm()"/>  
    </div>
    
  </div></div>






<!-- END OF FIRST PHASE -->


<!-- SECOND PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
    
<div id="main2" class="card mb-5 mainDiv" style="margin-top:-28px; display:none;" >


 
 
 <div  class="div-table" id="alarmTable">
         
        
      
        
      <div class="div-table-row" style=" font-size:30px; margin-top:10px;text-align:center;">Alarm </i></div>
       
       
       
          
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
 
 
   
<div id="main6" class="mainDiv card mb-5" style="margin-top:-28px; display:inline-block;  min-width:88%;" >
  <div  id="title-head" class="title-head">Advert </div>
 <br />
 

  
</div>

  
  
   


<!-- ThIRD PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
 
   
<div id="main3" class="mainDiv card mb-5" style="margin-top:-28px; display:inline-block;" >
 <div  id="title-head3" class="title-head">Set an alarm for the specified time </div>
 <br />
<input name="but1" id="but1" type="button" class="button-blue spacing-button"  value="4:00 AM" onClick="window.location.href='view-alarm/4:00_AM'"  />

<input name="but2" id="but2" type="button" class="button-blue spacing-button"  value="4:30 AM" onClick="window.location.href='view-alarm/4:30_AM'"/>

<input name="" id="but3" type="button" class="button-blue spacing-button"  value="5:00 AM" onClick="window.location.href='view-alarm/5:00_AM'"/>
<input name=""  id="but4"type="button" class="button-blue spacing-button"  value="5:15 AM" onClick="window.location.href='view-alarm/5:15_AM'"/>

<input name=""  id="but5"type="button" class="button-blue spacing-button"  value="5:30 AM" onClick="window.location.href='view-alarm/5:30_AM'"/>
<input name=""  id="but6"type="button" class="button-blue spacing-button"  value="5:45 AM" onClick="window.location.href='view-alarm/5:45_AM'"/>


<input name=""  id="but7" type="button"  class="button-blue spacing-button"  value="6:00 AM" onClick="window.location.href='view-alarm/6:00_AM'"/>

<input name=""  id="but7" type="button"  class="button-blue spacing-button"  value="6:15 AM" onClick="window.location.href='view-alarm/6:15_AM'"/>

<input name="" id="but8" type="button" class="button-blue spacing-button"  value="6:30 AM" onClick="window.location.href='view-alarm/6:30_AM'"/>
<input name=""  id="but9" type="button" class="button-blue spacing-button"  value="6:45 AM" onClick="window.location.href='view-alarm/6:45_AM'"/>

<input name=""  id="but10" type="button" class="button-blue spacing-button"  value="7:00 AM" onClick="window.location.href='view-alarm/7:00_AM'"/>

<input name=""  id="but11"type="button" class="button-blue spacing-button"  value="7:15 AM" onClick="window.location.href='view-alarm/7:15_AM'"/>

 <input name=""  id="but12" type="button" class="button-blue spacing-button"  value="7:30 AM" onClick="window.location.href='view-alarm/7:30_AM'"/>
 <input name=""  id="but13" type="button" class="button-blue spacing-button"  value="7:45 AM" onClick="window.location.href='view-alarm/7:45_AM'"/>


<input name="" id="but14" type="button" class="button-blue spacing-button"  value="8:00 AM" onClick="window.location.href='view-alarm/8:00_AM'"/>

 <input name="" id="but15"type="button" class="button-blue spacing-button"  value="8:15 AM" onClick="window.location.href='view-alarm/8:15_AM'"/>

<input name=""  id="but16" type="button" class="button-blue spacing-button"  value="8:30 AM" onClick="window.location.href='view-alarm/8:30_AM'"/>

 <input name=""  id="but17"type="button" class="button-blue spacing-button"  value="8:45 AM" onClick="window.location.href='view-alarm/8:45_AM'"/>


<input name="" id="but18" type="button" class="button-blue spacing-button"  value="9:00 AM" onClick="window.location.href='view-alarm/9:00_AM'"/>
<input name="" id="but19" type="button" class="button-blue spacing-button"  value="9:30 AM" onClick="window.location.href='view-alarm/9:30_AM'"/>

<input name="" id="but20" type="button" class="button-blue spacing-button"  value="10:00 AM" onClick="window.location.href='view-alarm/10:00_AM'"/>
<input name="" id="but21" type="button" class="button-blue spacing-button"  value="10:30 AM" onClick="window.location.href='view-alarm/10:30_AM'"/>

<input name=""  id="but22" type="button" class="button-blue spacing-button"  value="11:00 AM" onClick="window.location.href='view-alarm/11:00_AM'"/>
<input name="" id="but23" type="button" class="button-blue spacing-button"  value="11:30 AM" onClick="window.location.href='view-alarm/11:30_AM'"/>

<input name="" id="but24" type="button" class="button-blue spacing-button"  value="12:00 PM" onClick="window.location.href='view-alarm/12:00_PM'"/>
<input name="" id="but26" type="button" class="button-blue spacing-button"  value="12:30 PM" onClick="window.location.href='view-alarm/12:30_PM'"/>
  
  
</div>




<!-- FORUTH PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
    
<div id="main4" class="card mb-5 mainDiv" style="margin-top:-28px;" >

 <div  id="title-head4" class="title-head">How to use the online alarm clock </div>
<div  id="text-main" class="mainbody">
   Set the hour and minute for the online alarm clock. The alarm message will appear and the preselected sound will be played at the set time.

When setting the alarm, you can click the "Test" button to preview the alert and check the sound volume.

You can configure the alarm clock appearance (text color, type, and size), and these settings will be saved; they will be used when you open your web browser next time.

The online alarm clock will not work if you close your browser or shut down your computer, but it can work without an internet connection.

You can add links to online alarm clocks with different time settings to your browser's Favorites. Opening such a link will set the alarm clock to the predefined time.</div>
</div>



<!-- FIFTH PHASE STARTS HERE -->

  
    
<div id="main5" class="mainDiv2 card mb-5 mainbody" style="margin-top:-28px;  display:inline-block;  min-width:88%; text-align:left;" >
  <div  id="title-head5" class="title-head">Blog </div>
  <br />
   
  @foreach($query as $rst)
@if(trim($rst->menu) ==  "Alarm")
  
 <!--
 <img src="../timer/images/default_avatar.webp" width="50" height="50" /> 
 -->
<div style="font-size:12px; color:#436FB8;font-weight:bold;"> {!!  $rst->created_at!!}</div>
{!! str_limit($rst->details,600)!!}
<br />

<div  class="title-head">
<input name="" id="but20" type="button" class="button-blue-read spacing-button"  value="Read More..." onClick="window.location.href='./view-blog-page/{!!$rst->id !!}'"/> 

<input name="" id="but10" type="button" class="button-blue-read spacing-button"  value="Comment" onClick="window.location.href='./view-blog-page/{!!$rst->id !!}'"/> 


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
// Get the modal
var modal = document.getElementById("myModal");


//console.log(modal);
  
// Get the button that opens the modal
var btn = document.getElementById("button");


var btnCancel = document.getElementById("btnCancel");
 
 

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var spanAlarm = document.getElementsByClassName("closeAlarm")[0];



// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  
  stopAudio();
  
}



btnCancel.onclick = function() {
  modal.style.display = "none";
  
  stopAudio();
  
}

 
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	
  if (event.target == modal) { 
    modal.style.display = "none";
	
	stopAudio(); 
  }
  
  if (event.target == modalAlarm) {
     modalAlarm.style.display = "none";
	
	 stopAudio();
  }
}
 


/* TIME UP ALARM */
var modalAlarm = document.getElementById("myModalStop");


// Get the <span> element that closes the modal
 
var spanAlarm = document.getElementsByClassName("closeAlarm")[0];


 
// Get the button that opens the modal
 var btnTest = document.getElementById("btnTestAlarm");



//btnTest.onclick = function() {
	function activateAlarm() {
  modalAlarm.style.display = "block";
  
    
	//document.getElementById('butSubmit').className='show_question';
	 document.getElementById('butSubmit').style.display="block";
	  
	document.getElementById('main2').style.display="none";
	
	/* UPDATING CURRENT TIME */
	var cur =document.getElementById('currentTime');
	var style =window.getComputedStyle(cur,null).getPropertyValue('font-size');
	
	var style=parseFloat(style)
	
	cur.style.fontSize=(style)+'px';
	
	//document.getElementById('currentTime').style.fontSize='130px';
	
   
  playAudio();
}

// When the user clicks on <span> (x), close the modal
spanAlarm.onclick = function() {
	 
	 modalAlarm.style.display = "none";

  stopAudio();
  
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	
	
	 
	
  if(event.target == modalAlarm) {
     modalAlarm.style.display = "none";
	
	 stopAudio();
  }
  if (event.target == modal)
  {
	  
	  
	   modal.style.display = "none";
	   stopAudio();
}





if(event.target == main) {
    rightCloseNav()
  }



if(event.target == main3) {
    rightCloseNav()
  }
  
  if(event.target == main4) {
    rightCloseNav()
  }

  if(event.target == main2) {
    rightCloseNav()
  }

if(event.target == main5) {
    rightCloseNav()
  }
  
  

}

function terminateAlerm()
{
	
	//modalAlarm.style.display = "none";
	 document.getElementById("myModalStop").style.display = "none";
	 
	 document.getElementById("myModalStop").style.transition=".4s";
	 
	 //document.getElementById('butSubmit').className='show_question';
	  document.getElementById('butSubmit').style.display="block";
	  
	document.getElementById('main2').style.display="none";
	
	
	var cur =document.getElementById('currentTime');
	var style =window.getComputedStyle(cur,null).getPropertyValue('font-size');
	
	var style=parseFloat(style)
	 
	 
	if(style <130 || style>45)
	{
	   
	   cur.style.fontSize='130px';
	   
	}
	if (style  < 80){
		cur.style.fontSize=(45)+'px';
		  
	}	
	
	//cur.style.fontSize=(style)+'px';
	
	//document.getElementById('currentTime').style.fontSize='130px';
	
	document.getElementById('optionB').value="Auto";
	
	
	
	 stopAudio();
	 
}
	 

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
	
	document.getElementById('main3').style.display="none";
	document.getElementById('main4').style.display="none";
	document.getElementById('main5').style.display="none";
	
	
	
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
	 console.log('Style: '+style);
	   
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
	
	document.getElementById('main3').style.display="block";
	
	
	
	document.getElementById('main4').style.display="block";
	 
	
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

 
 






<script language="javascript">
var CountDown
 CountDown = (function ($) {
    // Length ms 
    var TimeOut = 10000;
    // Interval ms
    var TimeGap = 1000;
    
	 document.getElementById('setTime').value=TimeGap;
	 var Stop;
	 
	  var UpdateTimer;
		
		 // var firstDate =new Date().getTime();
	// var CurrentTime= new Date(+firstDate);
	 
	 
	
	 
     var CurrentTime = ( new Date() ).getTime();
	 
 
	
	
	 
	
	
	
    var EndTime = ( new Date() ).getTime()+ TimeOut;
	
	//var EndTime= new Date(+firstDate)+ TimeOut;
	
	
	
    
    var GuiTimer = $('#countdown');
    var GuiPause = $('#pause');
    var GuiResume = $('#resume').hide();
	
	var setTimeId;
   
	 var GuiPlay1 = $('#button');
	 
	
    var Running = true;
    
    var UpdateTimer = function() {
        // Run till timeout
		
		Current_Date();
		
        if( CurrentTime + TimeGap < EndTime ) {
          setTimeId=  setTimeout( UpdateTimer, TimeGap );
			  
			
        }
        // Countdown if running
		
		 if( CurrentTime + TimeGap == EndTime ) {
			 
			 
			var status= document.getElementById('optionB').value;
			
			if(status=="Runing")
			{
			  activateAlarm();
			  
			  }
			  //console.log('im here');
			   var nowDate = new Date();
			  document.getElementById('timeOver').innerHTML= h+":"+m;
			  
			   
			  
			  document.getElementById("timeOver").innerHTML=nowDate.toLocaleTimeString() +' Overdue';
			  
			  
			  var lstHour =document.getElementById('lstHour').value;
	          var lstMinutes =document.getElementById('lstMinutes').value;
			  
			  document.getElementById("alarmTime").innerHTML= lstHour+':'+lstMinutes;
			  
			  /*LOOPING THE TIME */
			  
			  restartTime();
			 
		}	
			 
        if( Running ) {
			
			//GuiTimer.css('color','black');
            CurrentTime += TimeGap;
            if( CurrentTime >= EndTime ) {
                GuiTimer.css('color','red');
				
				$('#button').show()
				GuiPause.hide();
                 GuiResume.hide();
				
            }
        
        // Update Gui
        var Time = new Date();
		 
		 //console.log(EndTime);
		
		 	 

  // Time calculations for days, hours, minutes and seconds
 // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  	
		var distance =Time.setTime( EndTime - CurrentTime );
		
		
		var Hours = Time.getHours();
        var Minutes = Time.getMinutes();
        var Seconds = Time.getSeconds();
		
		
		//console.log('Hour: '+Hours);
		
		var h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var s = Math.floor((distance % (1000 * 60)) / 1000);
		
		
		 
		/* UPDATE FONT DURING ZOOMING OF FONT */
		 
		//var el =document.getElementById('countdown')
		//var style =window.getComputedStyle(el,null).getPropertyValue('font-size');
		
		//console.log("Style :"+style);
		 
		//"<i class='material-icons time-set-up'><span id='tm' class='time-set-up'> av_timer </span></i> "+
		var c =document.getElementById('txtFont').value
		//document.getElementById('countdown').style.fontSize=c 
		   
		 console.log('C Font :'+c);  
		 
		 var avarter="<span id='tm' class='material-icons time-set-up' style=font-size:"+c +";> av_timer </span> ";
		   
		 var font= "<span class=rstclass style=font-size:"+c +"; text-align:center; > ";
		
		 //GuiTimer.html(font);
	 	   GuiTimer.html(font+avarter+
		   //GuiTimer.html(font+
		     
		    (h < 10 ? '0' : '')+ h
		 
		    + ':' 
              + (m < 10 ? '0' : '') + m 
            + ':' 
            + (s < 10 ? '0' : '') + s  +"</span>" );
			
     };
	 
		
	 
	}
	 
    
    var Pause = function() {
        Running = false;
       // GuiPause.hide();
       // GuiResume.show();
    };
    
    var Resume = function() {
        Running = true;
        GuiPause.show();
        GuiResume.hide();
    };
	
	  
	
	
	
	 Stop = function( ) {
		
		 
		 
       clearTimeout(setTimeId);
	   
	  // $('#button').show()
		 
		
		var tm= document.getElementById('setTime').value;
		
		clearInterval(TimeGap);
		
		
		 /*
		// GuiResume.hide();
		 Running = true;
		// GuiPause.show();
		setTimeId=  setTimeout( UpdateTimer, TimeGap );
		 CurrentTime = ( new Date() ).getTime();
        EndTime = ( new Date() ).getTime() + parseInt(tm) ;
		*/
		 
		// console.log('Set Time: '+setTimeId);
       // UpdateTimer();
		  
		 
    };

	
	
	
	
    var Start = function( Timeout ) {
		
		 console.log(Timeout);
        TimeOut = Timeout;
        CurrentTime = ( new Date() ).getTime();
        EndTime = ( new Date() ).getTime() + TimeOut ;
        UpdateTimer();
		
		 $('#button').show()
		 //console.log('im here at Start');
		
		 //document.getElementById('button').className="hide_question";
		 
		// GuiPause.show();
    };

    return {
        Pause: Pause,
        Resume: Resume,
		  Stop: Stop,
        Start: Start 
    };
})(jQuery);

jQuery('#pause').on('click',CountDown.Pause);
jQuery('#resume').on('click',CountDown.Resume);
 jQuery('#reset').on('click',CountDown.Stop);
 
  

//window.CountDown=CountDown;

// ms

 restartTime();




function caculateDate()

{
	
	 
	
	CountDown.Stop();
	
	 
	var n =0;
	var lstHour =document.getElementById('lstHour').value;
	var lstMinutes =document.getElementById('lstMinutes').value;
	
	 
	
	var checkHours =lstHour;
	var str =lstHour;
	
	 n =str.indexOf('M');
	 
	var sp =str.indexOf(' ');
	
	//console.log('Space: '+sp)
	
	if(n >0)
	{
		lstHour=str.substring(0,sp)
		
		//console.log('Im here');
	}	
	
	
	
	if(checkHours =="12 AM")
	{
		lstHour=00;
	}	
	if(checkHours =="11 PM")
	{
		lstHour=23;
	}	
	
	if(checkHours =="10 PM")
	{
		lstHour=22;
	}
	
	if(checkHours =="9 PM")
	{
		lstHour=21;
	}	
	if(checkHours =="8 PM")
	{
		lstHour=20;
	}	
	if(checkHours =="7 PM")
	{
		lstHour=19;
	}	
	if(checkHours =="6 PM")
	{
		lstHour=18;
	}	
	if(checkHours =="5 PM")
	{
		lstHour=17;
	}
	if(checkHours =="4 PM")
	{
		lstHour=16;
	}
	if(checkHours =="3 PM")
	{
		lstHour=15;
	}
	if(checkHours =="2 PM")
	{
		lstHour=14;
	}
	if(checkHours =="1 PM")
	{
		lstHour=13;
	}
		
	//console.log('Hours: '+lstHour);	
	
	//console.log('Minutes: '+lstMinutes);	
	 
	if(checkHours =="Hour")
	{
		alert('Select Hour');
		return false;
	}	
	document.getElementById('main2').style.display='block';
	
	
	document.getElementById('optionB').value="Runing";
	
	
	 var hrInt=parseInt(lstHour);
	  var minInt=parseInt(lstMinutes);
	 
	
	 
	  document.getElementById('time_setUp').innerHTML=" <i class='material-icons'><span id='tsp' class='time-set-up'> access_alarms </span></i> &nbsp;"+ lstHour+":"+lstMinutes;
	 	   
	   //document.getElementById('currentTime').style.fontSize="80px";
	  
	  var cur =document.getElementById('currentTime');
	var style =window.getComputedStyle(cur,null).getPropertyValue('font-size');
	
	var style=parseFloat(style)
	if(style==130)
	{
	   
	   cur.style.fontSize=(style-50)+'px';
	}
	else{
		cur.style.fontSize=(style)+'px';
	}	
	
	  
	  
	   //document.getElementById('butSubmit').className='hide_question';
	   document.getElementById('butSubmit').style.display="none";
	  
	  
	 var soundAlarm =document.getElementById("hr").value
	  
	 
	document.getElementById("myModal").style.display = "none";
	
	 
   var dateFormat= document.getElementById('dateFormat').value
	 
	 
	   /* I WILL BE HANDDLING 12 HOURS DISPLAY HERE */
	   
 	    
	 if(dateFormat==1)
	  {	 
	  
	   }
    
   var today = new Date();
   
   
    var todayAdd = new Date();
var date =   today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate() +' '+ today.getHours() +':'+ today.getMinutes()+':'+ today.getSeconds();

var addDate = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate()+' '+ hrInt +':'+ minInt+':'+ today.getSeconds();


   todayAdd= new Date(addDate);
   
    date= new Date(date);
    
    
    
	
	var dateDiff= todayAdd.getTime() - date.getTime();
	//alert(dateDiff)
   
 console.log('Add Date: '+addDate);
console.log('Date: '+date);
  console.log('Date Diff :'+dateDiff);
  
  
   
  
   	  
	 
	  if( dateDiff <0 )
	  {
		   var mt=today.getMonth()+1;
		   var fyear=today.getFullYear();
		  var avalableDate = daysInMonth(mt,fyear);
		  
		  console.log("Avalable Date: "+avalableDate);
		  
		  
		     var dt =today.getDate()+1;
			 if(dt<avalableDate)
			 {
			 
		  // var dt =today.getDate();
		  addDate = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+dt+' '+ hrInt +':'+ minInt+':'+ today.getSeconds();
      }
	  
	  if(dt>avalableDate)
			 {
				 console.log('greater');
			  dt=1;
		  // var dt =today.getDate();
		  addDate = today.getFullYear()+'/'+(today.getMonth()+2)+'/'+dt+' '+ hrInt +':'+ minInt+':'+ today.getSeconds();
      
	  console.log('Added Date '+addDate);
	  }
	  
	  
console.log('Add New Date: '+addDate)

		  todayAdd= new Date(addDate);
		  
		   dateDiff=  todayAdd.getTime()-date.getTime();
		
		 

    }
	 
// document.getElementById('setTime').value=dateDiff;
 
   
CountDown.Start(dateDiff);
 
 
 }
 
 /* THIS FUNCTION CHECK THE NUMBER OF DATES IN A MONTH */
 function daysInMonth(month,year)
 {
	 return new Date(year,month,0).getDate();
 
  }
 /* RESTART TIME ENABLE THE CLOCK TO CONTINUE AFTER  ALARM EXPIRED */
 
 
 function restartTime()

{
	 
	
	
	
	var nowDate="";
 nowDate = new Date();

 var dtDate =new Date().getTime();
 var parseDate= new Date(+dtDate);
 
 // console.log('current Date : '+nowDate);

document.getElementById('optionB').value="Auto";

var currentHour=parseDate.getHours()+0;

// console.log('hour: '+ currentHour);



	  var currentMinutes=nowDate.getMinutes()+01;
	 
	   var zeroSeconds= nowDate.getSeconds() +05;
	   
	    
	   
	   
	   var TestCurrentMonth =nowDate.getMonth();
	    var cntDate=nowDate.getDate();
	  
	  var countDownDate="";
	  
	   
	   nowDate.setHours(currentHour);
	    nowDate.setMinutes(currentMinutes);
		 nowDate.setSeconds(zeroSeconds);
	   
	   var now = new Date().getTime();
	   
		var countDownDt=nowDate.getTime();
		 
  
	   
	   countDownDate= countDownDt - now;
	  document.getElementById('setTime').value=countDownDate;
	  
 
CountDown.Start(countDownDate);
 
 
 }
 
 
 
 
 
 

 function Current_Date()
 {	 
	 var ctr =0;
	  
	var nowDate = new Date(); 
	
	var dd =nowDate.getDate();
var mm =nowDate.getMonth()+1;
var yy = nowDate.getFullYear();
//var d = nowDate.getDay();
 

 var listMonth=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
 
  var currentMonth=listMonth[nowDate.getMonth()];
  
  
   var currentTime= nowDate.getHours() +":"+ nowDate.getMinutes()+":"+ nowDate.getMilliseconds(); 
	 
	  $("#ct").html(currentTime);
	  
	  //console.log(nowDate.toLocaleTimeString());
	  
	 // $("#currentTime").html(nowDate.toLocaleTimeString());
	  
	 var dateFormat= document.getElementById('dateFormat').value
	 
	 
	   /* I WILL BE HANDDLING 12 HOURS DISPLAY HERE */
	  if(dateFormat==1)
	  {
	  document.getElementById("currentTime").innerHTML=nowDate.toLocaleTimeString();
	 // console.log('im in Local Time');
	  
	  var Curent_Date= currentMonth +" "+dd+", "+yy;
	 
	 $("#dt").html(Curent_Date);
	  }
	  
	  
	   /* I WILL BE HANDDLING 24 HOURS DISPLAY HERE */
	  if(dateFormat==0)
	  {
	//  document.getElementById("currentTime").innerHTML=nowDate.toString();
	  
	  var str = nowDate.toString();
	 var monthDate =str.substring(0,15)
	 
	 //console.log('Substring :'+monthDate);
	 
	  var TimeDate =str.substring(15,24)
	  
	 // console.log('Substring Time :'+TimeDate);
	   document.getElementById("currentTime").innerHTML=TimeDate;
	  
	  
	  $("#dt").html(monthDate);
	  }
	 // document.getElementById("currentTime").innerHTML=nowDate.toLocaleTimeString();
	  
	  
	 
	 
	   
	 
	
	 
	 


if(mm<10)
{
mm='0'+mm;
}

if(dd<10)
{
dd='0'+dd;
}

//console.log(mm+"/"+dd+"/"+yy); 
 
}
 
 
 
 /*$("#hours").click(function(ev) {
	  ev.preventDefault();
	  
	  */
	  function hours_list()
	  {
	  
	  
	  var stHour= document.getElementById('hours').value
	  
	   var st_Hour=parseInt(stHour);
	   
			 var option='';
			 var opt='';
			 
			 
			
			if(st_Hour==1)
			{	  
			 
			
	opt+='<option value="12 AM">12 AM</option>'
     opt+='<option value="1 AM">1 AM</option>'
     opt+='<option value="2 AM">2 AM</option>'
     opt+='<option value="3 AM">3 AM</option>'
     opt+='<option value="4 AM">4 AM</option>'
     opt+='<option value="5 AM">5 AM</option>'
     opt+='<option value="6 AM">6 AM</option>'
     opt+='<option value="7 AM">7 AM</option>'
     opt+='<option value="8 AM">8 AM</option>'
     opt+='<option value="9 AM">9 AM</option>'
     opt+='<option value="10 AM">10 AM</option>'
     opt+='<option value="11 AM">11 AM</option>'
     opt+='<option value="12 PM">12 PM</option>'
     opt+='<option value="1 PM">1 PM</option>'
     opt+='<option value="2 PM">2 PM</option>'
     opt+='<option value="3 PM">3 PM</option>'
     opt+='<option value="4 PM">4 PM</option>'
     opt+='<option value="5 PM">5 PM</option>'
     opt+='<option value="6 PM">6 PM</option>'
      opt+='<option value="7 PM">7 PM</option>'
       opt+='<option value="8 PM">8 PM</option>'
        opt+='<option value="9 PM">9 PM</option>'
        opt+=' <option value="10 PM">10 PM</option>'
		opt+=' <option value="11 PM">11 PM</option>'
			
			document.getElementById('hours').value=0; 
			
			 document.getElementById('dateFormat').value=1; 
			
			 
		
		}		 
		
		
		
		if(st_Hour==0)
			{
				
			 
			
	 opt+='<option value="00">00</option>'
     opt+='<option value="01">01</option>'
     opt+='<option value="02">02</option>'
     opt+='<option value="03">03</option>'
     opt+='<option value="04">04</option>'
     opt+='<option value="05">05</option>'
     opt+='<option value="06">06</option>'
     opt+='<option value="07">07</option>'
     opt+='<option value="08">08</option>'
     opt+='<option value="09">09</option>'
     opt+='<option value="10">10</option>'
     opt+='<option value="11">11</option>'
     opt+='<option value="12">12</option>'
    opt+=' <option value="13">13</option>'
     opt+='<option value="14">14</option>'
     opt+='<option value="15">15</option>'
     opt+='<option value="16">16</option>'
    opt+=' <option value="17">17</option>'
    opt+=' <option value="18">18</option>'
      opt+='<option value="19">19</option>'
      opt+=' <option value="20">20</option>'
        opt+='<option value="21">21</option>'
         opt+='<option value="22">22</option>'
          opt+='<option value="23">23</option>'
		  
		  document.getElementById('hours').value=1; 
		  document.getElementById('dateFormat').value=0; 
			}		
				  
				$("#lstHour").html(opt);
	   
	  
	  
	  
	  };

</script>



<script>
function scrolling()
{
	 
	$('html,body').animate({scrollTop:20},'0');
	 
	document.body.style.transition=".5s";
	
 
}
</script>


<!-- INSTANT LOADING OF HOUR -->




 <script src="timer/js/dropdown.js"> </script>
 
  
</body>
</html>
