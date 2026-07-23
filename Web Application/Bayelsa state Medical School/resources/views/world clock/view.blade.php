<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>World Clock</title>
 <script src="../timer/js/jquery-3.1.1.js"> </script>
 <!--
 <script src="../timer/js/moment-10-year-range.min.js"> </script>
-->
 
 <script src="../timer/js/moment.js"> </script>
 
 

 <script src="../timer/js/moment-10-year-range.min.js"> </script>
 
 <meta name="csrf-token" content="{{ csrf_token() }}"> 
 
  

<script>


function zoomOut(multiplier) {
	
	 	 var el=  document.getElementById('countdown');
		 var elClock =document.getElementById('wrdClock');
		
		
		var curTime = document.getElementById('currentTime'); 
		 
		
		var time_setUp = document.getElementById('time_setUp'); 
		 
		//var ctm = document.getElementById('ctm');  
		//var ctm2 = document.getElementById('ctm2');  
	 
	 
	 var tsp = document.getElementById('tsp'); 
	 var tm=document.getElementById('tm'); 
	 
	 //var el = document.getElementById('time-Size') ;
	 
	   
	 
	 var style =window.getComputedStyle(el,null).getPropertyValue('font-size');
	 
	    var style_clock =window.getComputedStyle(elClock,null).getPropertyValue('font-size');
	  
	 //alert(style);
	 
	
	 
	 var style2 =window.getComputedStyle(curTime,null).getPropertyValue('font-size');
	 
	 var style3 =window.getComputedStyle(time_setUp,null).getPropertyValue('font-size');
	 
	  
	  var styleTSP =window.getComputedStyle(tsp,null).getPropertyValue('font-size');
	 
	 
	
	 	 
	 var fontSize = parseFloat(style);
	  var fontSizeClock = parseFloat(style_clock);
	 
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
		 
		 elClock.style.fontSizeClock=(fontSizeTSP+(multiplier * 0.2)+'px');
		 
	 
	   var c =(fontSizeTSP+(multiplier * 0.2)+'px');
		  document.getElementById('txtFont').value=(fontSizeTSP+(multiplier * 0.2)+'px');
		  
		 var cnt=parseInt( document.getElementById('txtCounter').value)
		  
		  document.getElementById('txtCounter').value=cnt+1
		  
		  
		  
		}   
	
	}

function zoomIn(multiplier) {
	
	 	 
	 var el=  document.getElementById('countdown');
	 var elClock =document.getElementById('wrdClock');
	 
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
	
	elClock.style.fontSize=(fontSize-(multiplier * 0.2)+'px');
	
	
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
  
   document.getElementById("main5").style.marginRight = "250px";
  document.getElementById("main5").style.transition=".5s";
  
  document.getElementById("main6").style.minWidth="69.04%";
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
   
   
    document.getElementById("main5").style.marginRight= "0";
   document.getElementById("main5").style.transition=".5s";
   
   document.getElementById("main6").style.minWidth="88%";
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
 /*
 function city()
 {
	 
	alert('im here First') ;
 var nowDate = new Date(); 
	
	//var dd =nowDate.getDate();
	
	//var tm = nowDate.getTime();
	  // console.log(nowDate.toLocaleTimeString());  
	 var newYork= moment.tz(nowDate,"America/New_York");
	 document.getElementById("city").innerHTML=newYork;
	 
	 
	 alert('im here Second') 

  }
  
  */
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
	
	document.getElementById('wrdClock').style.color=colour;
	document.getElementById('sp1').style.color=colour;
	
	
	
	
	x =document.getElementsByClassName('world-tm2')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color=colour;
}	

x =document.getElementsByClassName('world-city')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color=colour;
}	

	
	
	 
	 
	 
	 sessionStorage.clear();
	 sessionStorage.setItem("colour",colour);
	//id='wrdClock' class="world-tm2"
}


/* THIS FUNCTION LOAD SAVED COLOUR JUST TO MAKE COLOUR CHANGE PERMANENT */

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
	
	document.getElementById('wrdClock').style.color=colour;
	//document.getElementById('sp1').style.color=colour;
	
	
	 
	
	x =document.getElementsByClassName('world-tm2')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color=colour;
}	

x =document.getElementsByClassName('world-city')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color=colour;
}	

	
	 if(colour=="#000")
	{
		document.getElementById('setUp').style.color="#C1C1C1";
	}
	
	window.sessionStorage;
	 
	 
	//id='wrdClock' class="world-tm2"
}





function nightFall()
{
	
	window.sessionStorage;
	 
	 var nightMode =document.getElementById('txtNight').value;
	 
	 if(nightMode==1)
	 {
		 
		 
		 document.getElementById('txtColour').value=sessionStorage.getItem("colour")
		 sessionStorage.clear();
	  sessionStorage.setItem("colour","#FF9500");
		
		
	 document.getElementById('currentTime').style.color="#FF9500";
	document.getElementById('countdown').style.color="#FF9500";
	document.getElementById('dt').style.color="#FF9500";
	
	document.getElementById('alarmTable').style.color="#FF9500";
	document.getElementById('main2').style.color="#FF9500";
	document.getElementById('main6').style.color="#FF9500";
	document.getElementById('main7').style.color="#FF9500";
	
	//document.getElementById('zoomOut').style.color="#fff";
	//document.getElementById('zoomIn').style.color="#fff";
	
	//document.getElementById('minox').style.color="#fff";
	//document.getElementById('plux').style.color="#fff";
	
	 
	
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




document.body.style.backgroundColor="#222D32";

document.getElementById('txtNight').value=0

document.getElementById('text-main').style.color="#FF9500";
	
	document.getElementById('title-head').style.color="#FF9500";
	document.getElementById('title-head6').style.color="#FF9500";
	document.getElementById('title-head7').style.color="#FF9500";
	
	document.getElementById('footer1').style.color="#FF9500";
document.getElementById('footer').style.color="#FF9500";


 
//document.getElementById('sp').style.color="#FF9500";
 

document.getElementById('sp1').style.color="#FF9500";


 //document.getElementById('spanId').style.color="#FF9500";


document.getElementById('time_setUp').style.color="#FF9500";

//document.getElementById('wrdClock').style.color="#FF9500";
//document.getElementById('wrdClock').style.backgroundColor="#222D32";

 

/* THIS FORMATE CLOCK BLOCK */


var x =document.getElementsByClassName('world-hour')

var i;
for(i=0;i<x.length;i++)
{
	x[i].style.backgroundColor="#222D32";
	x[i].style.color="#FF9500";
	 
}	

 x =document.getElementsByClassName('world-dt')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	


x =document.getElementsByClassName('world-tm')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	



x =document.getElementsByClassName('title-head')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	


x =document.getElementsByClassName('world-head')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	



x =document.getElementsByClassName('world-tm2')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	

x =document.getElementsByClassName('clock')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	

x =document.getElementsByClassName('world-city')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	

x =document.getElementsByClassName('update')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	

x =document.getElementsByClassName('mainbody')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FF9500";
}	

}
else
{
	
	  
	
	 window.sessionStorage;
	
	sessionStorage.clear();
	var color =document.getElementById('txtColour').value;
	 sessionStorage.setItem("colour",color);
	 
	 window.sessionStorage;
	var colour =sessionStorage.getItem("colour");
	
	/*
	 document.getElementById('currentTime').style.color="#000";
	document.getElementById('countdown').style.color="#000";
	document.getElementById('dt').style.color="#000";
	*/
	 document.getElementById('currentTime').style.color=colour;
	document.getElementById('countdown').style.color=colour;
	document.getElementById('dt').style.color=colour;
	
	
	
	document.getElementById('alarmTable').style.color="#000";
	document.getElementById('main2').style.color="#000";
	
	
	//document.getElementById('zoomOut').style.color="#fff";
	//document.getElementById('zoomIn').style.color="#fff";
	
	//document.getElementById('minox').style.backgroundColor="#000";
	//document.getElementById('plux').style.backgroundColor="#000";
	
	//document.getElementById('minox').style.content="'\FF0D'";
	// document.getElementById('plux').style.content="'\FF0B'";
	
	document.getElementById('main4').style.color="#1E2C2C";
	document.getElementById('main6').style.color="#1E2C2C";
	document.getElementById('main7').style.color="#1E2C2C";
	
	document.getElementById('footer1').style.color="#000";
document.getElementById('footer').style.color="#000";

	
	 document.getElementById('footer').style.backgroundColor="#fff";
	document.getElementById('footer1').style.backgroundColor="#fff";


	
	
	document.getElementById('text-main').style.color="#1E2C2C";
	
	document.getElementById('title-head').style.color="#1E2C2C";
	document.getElementById('title-head6').style.color="#1E2C2C";
	document.getElementById('title-head7').style.color="#1E2C2C";
	
	document.getElementById('main').style.backgroundColor="#fff";
	document.getElementById('main2').style.backgroundColor="#fff";
	document.getElementById('main3').style.backgroundColor="#fff";
	document.getElementById('main4').style.backgroundColor="#fff";
	document.getElementById('main5').style.backgroundColor="#fff";
	document.getElementById('main6').style.backgroundColor="#fff";
	document.getElementById('main7').style.backgroundColor="#fff";
	
	document.getElementById('footer').style.color="#1E2C2C";
	document.getElementById('footer1').style.color="#1E2C2C";
document.getElementById('time_setUp').style.color="#C1C1C1";

//document.getElementById('sp').style.color="#fff";
document.getElementById('sp1').style.color="#fff";
 //document.getElementById('spanId').style.color="#fff";
//document.getElementById('wrdClock').style.color="#A6E2FF";
//document.getElementById('wrdClock').style.backgroundColor="#008CBA";


x =document.getElementsByClassName('title-head')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#000";
}	

var x =document.getElementsByClassName('world-hour')

var i;
for(i=0;i<x.length;i++)
{
	x[i].style.backgroundColor="#008CBA";
	x[i].style.color="#A6E2FF";
}	

 x =document.getElementsByClassName('world-dt')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#A6E2FF";
}	


x =document.getElementsByClassName('world-tm')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FFF";
}	


x =document.getElementsByClassName('world-tm2')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#000";
}	



x =document.getElementsByClassName('world-head')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#FFF";
}	



x =document.getElementsByClassName('mainbody')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#1E2C2C";
}	

x =document.getElementsByClassName('world-city')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#666";
}	


x =document.getElementsByClassName('update')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#fff";
}	


x =document.getElementsByClassName('clock')

var i;
for(i=0;i<x.length;i++)
{
	 
	x[i].style.color="#1E2C2C";
}	
	
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



function calcTime(country,city, offset,utc_select) {
    // create Date object for current location
    var d = new Date();

    // convert to msec
    // subtract local time zone offset
    // get UTC time in msec
    var utc = d.getTime() + (d.getTimezoneOffset() * 60000);

    // create new Date object for different city
    // using supplied offset
    var nd = new Date(utc + (3600000*offset));
	
	//console.log(nd.toLocaleString().trim());
	var tm=nd.toLocaleString();
	var strArray=tm.split(",");

var UTC_time =utc_select.substr(3,10);
 

     // return time as a string
   // return "The local time for city"+ city +" is "+ nd.toLocaleString();
   var  span="<span id='spanId' class='world-head' style='color:#fff;'>";
   var  spanclose="</span >";
   
    
   
	var  sp="<span id='sp' class='timeSize world-tm'  >";
	var  sp1="<span id='sp1' class='timeSize world-dt'>";
	var cls ="</span>";
	
	var tm_disp=jQuery.trim(strArray[1]);
	var dt_disp=jQuery.trim(strArray[0]);
	
	
	
	var strArray1=UTC_time.split(" ");
	//console.log(strArray1);
	   UTC_time=strArray1[1]+strArray1[2];
	   
	
	//return "<span class='mainbody'> "+ city +', '+ country +"</span> <br><br> "+sp + nd.toLocaleString() +cls;
	return span + city +', '+ country + spanclose+"<br><br>"+sp+tm_disp+'<br>'+cls+sp1+dt_disp.trim()+cls +', &nbsp;'+UTC_time +' H';
	
	
}



function getCountryTime()
{
 
   
 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
   
	 
 
	 
	 var status='1';
	 
    
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'country-time',
         data:{"_token":$('#signup-token').val(),"status":status},
		 processData:"false",
         success: function(data) {
  
   var table ="";
   
	
	var UTC_time;
	var strArray1;
	
	var  span="<span id='spanId' class='clock' style='display:inline-block;'>";
   var  spanclose="</span >";
   
   
   var  sp="<span id='sp' class='timeSize world-tm'>";
	var  sp1="<span id='sp1' class='timeSize world-dt'>";
	var cls ="</span>";
	var tm_disp="";
	
	var tm_zone="";
	 
	for (i=0;i < data.length;i++)
				  {
		
		
			 UTC_time =data[i].utc_select.substr(3,10);
			
			 strArray1=UTC_time.split(" ");
	
	
	   UTC_time=strArray1[1]+strArray1[2];
 	 
	
	 
	   
 
  table+="<div id='wrdClock' class='world-hour'> <span id='spanId'  class='world-head' style='display:inline-block;'> <a href ='view-city-utc-time/{{ " +data[i].id  +"}}' class='update'>" + data[i].state +', '+ data[i].value + "</a></span><br><br> <span id='sp' class='timeSize world-tm  clock'  data-timezone='"+data[i].time_zone+"' data-utc='"+UTC_time+" H'> </span>"+"</div>";
		
		
		
		 
 	 
			 	
	 
		 
				 
				  }
				  
			$("#list-button").html(table);
			
			
			//var dt="<div style='clear:both;'></div><div  id='butSubmit' class='world-hour-button-bg' style='padding-top:5%;'><input class='btn btn-success btn-lg mb-1'  type='submit' name='button' id='button' value='Add' style='z-index:-2;  ' />"
			
			
			 
				   
	  //$("#list-button").append(dt); 
	   	   
	 
	  
         },
		 error: function(data) {
         
	   console.log('Data Error');
	    
	    
	  
    }   
		 
     });
  
	
	}





const clocks = document.getElementsByClassName("clock");
 
    
 
  window.sessionStorage;
 var colours= sessionStorage.getItem("colour");
 
 
 
 if(colours=="")
 {
 	colours="#000";
 }
 //console.log('Colour: '+ colours);
 var  span="<span id='spanId' class='world-head' style='display:inline-block;'>";
 
 var  sp1="<div id='sp1' class='world-dt2' style='color:"+ colours+"'>";
	var cls ="</div>";
	
function updateClocks() {
  for (let clock of clocks) {
    let timezone = clock.dataset.timezone;
	  
	 let utcTime = clock.dataset.utc;
	 
	  let utcCity = clock.dataset.time_zone_city;
	 
	  
	 
	 
	let tm = new Date();
	  
	   
	 
    let time = new Date().toLocaleTimeString("en-US", {
	   //let time = new Date().toLocaleString("en-US", {
      hour: '2-digit',
      minute:'2-digit',
	   second:'2-digit',
	   day:'2-digit',
	   month:'short',
	  year:'numeric',
      timeZone: timezone
    });
	 
	 colours= sessionStorage.getItem("colour");
     //clock.innerHTML = time.substr(11,20)+"<br>"+sp1+time.substr(0,10) +", "+utcTime+"</div>";
	 
	 
	 
	  var now =moment()
	 
	 
	 
	 var timDiff = (moment().tz(timezone).utcOffset() )/60;
	 
	 
	 
	 
	if(timDiff=='3.5')
{
	timDiff='3:30';
}

if(timDiff=='4.5')
{
	timDiff='4:30';
}

if(timDiff=='4.75')
{
	timDiff='4:45';
}


if(timDiff=='5.5')
{
	timDiff='5:30';
}

if(timDiff=='5.75')
{
	timDiff='5:45';
}

if(timDiff=='6.5')
{
	timDiff='6:30';
}

if(timDiff=='8.75')
{
	timDiff='8:45';
}
if(timDiff=='9.5')
{
	timDiff='9:30';
}

if(timDiff=='10.5')
{
	timDiff= '10:30';
}
if(timDiff=='11.5')
{
	timDiff= '11:30';
}

if(timDiff=='12.75')
{
	timDiff= '12:45';
}

if(timDiff=='13.75')
{
	timDiff= '13:45';
}	 
	timDiff =timDiff.toString();
	var m= timDiff.indexOf('-');  
	 
	 
	
	 
	 
	 
	 
	 
	  
		 
	// if(document.getElementById('txtCity').value.trim()==jQuery.trim(utcCity))
	//if(jQuery.trim($("#txtCity").val())==jQuery.trim(utcCity))
	if(typeof utcCity  =='undefined')
	 {
	 
	 clock.innerHTML = time.substr(13,20)+"<br> <div id='sp1' class='world-dt2' style='color:"+ colours+"'>"+time.substr(0,12) +"</div>";
	  
	} 
	else
	{
		dtm = new Date(time);
		console.log('formate date: '+dtm.toLocaleDateString());
		
		var  sp1="<div id='sp1' class=' world-dt' >";
	var cls ="</div>";
		    
		 
		  if(m == -1)
	  {
		    
		 clock.innerHTML = time.substr(13,20)+"<br>"+sp1+dtm.toLocaleDateString() +", +"+timDiff+" H</div>";
	 
	}  
	else{
		 clock.innerHTML = time.substr(13,20)+"<br>"+sp1+dtm.toLocaleDateString()  +", "+timDiff+" H</div>";
	 
		}
		 
		 
		//clock.innerHTML = time.substr(13,20)+"<br>"+sp1+ dtm.toLocaleDateString() +", "+utcTime+"</div>";
	}
	 
	 
	 
	//clock.textContent = time;
	//console.log('Colour: '+ colours);
	 
	halfDate=time.substr(0,8) 
	 
	 //console.log('Colour: '+ colours);
	 
	   //console.log("Half Date: "+halfDate);
  }
}

// Update every minute:
setInterval(updateClocks, 1000);
updateClocks();




 


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

<link href="../timer/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/app.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/style.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/app.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/menu.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/switch.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/checkbox.css" rel="stylesheet" type="text/css" />
<link href="../timer/css/popup.css" rel="stylesheet" type="text/css" />
<link href="../timer/css/dropdown.css" rel="stylesheet" type="text/css" />
<link href="../timer/css/table.css" rel="stylesheet" type="text/css" />


<style>

.clock {
   font-family: sans-serif;
  /* border: thin solid;
   border-radius: 10px;
   padding: 5px;*/
   font-family: 'digital-7',monospace, sans-serif;
	font-weight:normal;
}

</style>
</head>

<body onload="getAutoColour()">

 <!-- onload="getCountryTime()" -->   


 <div id="chronoExample" style="overflow:hidden;">
 
 <div id="top-menu" class="topMenu">
 <div id="top-menu-logo" class="topMenuLogo">Timer.com </div> 
 
 <div class="mobileNavOpen"><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span></div> 
 
 
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
 
   <input name="txtColour" type="hidden" value='0' id="txtColour" />
  
  <input name="txtCounter" type="hidden" value='0' id="txtCounter" /></div>
 
 <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
<div id="contact-us" class="rightNav" style="text-align:right"><a class="contactUs"  href="../contact-us">Contact Us</a></div>
   
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
  
  <a href="../alarm" ><i class="material-icons"><span style=" font-size:17px;"> access_alarms </span></i>&nbsp;&nbsp;Alarm &nbsp;<i class='fas fa-chevron-right'></i></a> 
  
  <a href="../timer-reading"><i class="material-icons" ><span style=" font-size:17px;">av_timer</span></i>&nbsp;&nbsp;Timer</a> 
  
  
  <a href="../stopwatch"><i class="material-icons" ><span style=" font-size:17px;">timer_off</span></i>&nbsp;&nbsp;Stopwatch</a> 
  
  <a class="active" href="../world-clock"><i class='fa fa-clock'></i> &nbsp;&nbsp;World Clock</a>
  
   
   
  <a href="../add-date"><i class='fas fa-calendar-alt'></i> &nbsp;&nbsp;Day Calculator</a>
  
  
   <a href="../count-days"> <i class='fas fa-calendar-plus'></i> &nbsp;&nbsp;Date Calculator</a>
   
  <a href="../holiday"><i class='fas fa-hotel'></i> &nbsp;&nbsp;Holiday</a>
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
  
  <a  href="../alarm"><i class="material-icons active">access_alarm</i><br />Alarm Clock</span></a> 
  <a href="../timer-reading"><i class="material-icons">av_timer</i><br />Timer</a> 
  <a href="../stopwatch"><i class="material-icons">timer_off</i><br /> Stopwatch</a> 
  <a class="active" href="../world-clock"><i class="material-icons">access_time</i> <br /><span class="active"> World Clock</span></a>

   
 <a href="../add-date"> <i class='fas fa-calendar-alt ' style="font-size:20px;"></i> <br /> Day Calculator</a>
  
  
   <a href="../count-days"> <i class='fas fa-calendar-plus' style="font-size:20px;"></i><br />Date Calculator</a>
 
 
  <a href="../holiday"><i class='fas fa-hotel'></i><br />Holiday</a>
 
 
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

             
            <!-- Old Timer Div> -->
            <div id="currentTime" class="timeSize" style="margin-top:-25px; text-align:center; margin-bottom:20px;  display:none; ">00:00:00</div>
            
             
             <div id="dt" class="timeSize" style="font-size:30px;margin-top:-25px; text-align:center;display:none;"></div>
            
            
           <!-- New Timer Div -->
 <div  id='city' class="mainbody  " style=" margin-bottom:5px; text-align:center;" ><span class="world-city">{!!$query[0]->state!!}</span>
 
  <input id="txtCity" type="hidden" class="form-control" name="txtCity" value="{!!$query[0]->state!!}" required autofocus autocomplete="off">
 </div>
 
                <div id='wrdClock' class="world-tm2" style="font-size:30px;margin-top:-25px;"> <span class='timeSize world-tm2  clock' data-timezone='{!!$query[0]->time_zone !!}'> </span></div>
            
 
  
                <div class="timeBut" style="margin-top:20px;">

 
 

 
 <nav id="nav" role="navigation" style="position:relative;">
	 
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
    <h4> <span class="header-title">Add City</span></h4>
      <span class="close">&times;</span>
     
    </div>
    <div class="modal-body">
      
      
      
      <div  class="div-table">
      <div class="div-table-row">  
      
      <div  id="error-page"class="div-table-col" style="width:90%;"> </div>
      
      <div class="div-table-col" style="width:90%;">Country </div>
       
       
      <div class="div-table-col" style="width:90%;">
      
  <select class="lst-menu" id="lstHour">
  
  <option value="Select">Select</option>
  
    
     
  </select>
  </div>
         </div>
      
      
      
     <div class="div-table-row" >  
      <div class="div-table-col" style="width:90%;">Time Zone </div>
       
        
       
      <div class="div-table-col" style="width:90%;">
      <!-- <span class="custom-select" style="width:100%; height:auto;">-->
  <select id="hr" class="lst-menu" style="width:99%;">
   
  </select>
   
  </div>
  
  
      
      </div> 
      
      
      
      
      
      <div class="div-table-row">  
      <div class="div-table-col">City </div>
     
      </div>
      
      <div class="div-table-row">  
      <div class="div-table-col" style="width:90%;">
      
       
          <input id="optionA" type="text" class="form-control" name="optionA" value="" required autofocus autocomplete="off"></div>
      
      <input id="optionB" type="hidden" class="form-control" name="optionB" value="" required autofocus autocomplete="off">
      
       <input id="utcSelect" type="hidden" class="form-control" name="utcSelect" value="" required autofocus autocomplete="off">
        <input id="utcValue" type="hidden" class="form-control" name="utcValue" value="" required autofocus autocomplete="off">
      </div>
      
      <div class="div-table-row">  
      <div class="div-table-col"> </div>
     
      </div>
      
     
      
      
      
      


     <br /><br /> 
      
    </div>
   </div>
   
    <div class="modal-footer" style="height:60px; width:100%; text-align:center; background-color:#FCFCFC;">
    <div style="text-align:left; width:100%" class="hide_question"><input name="btnTest" type="button"  class="button-gray" value="Test" /> </div>
    
    <input class="button-blue" name="btnCancel" id="btnCancel" type="button"  value="Cancel"/>&nbsp;&nbsp;&nbsp; <input class="button-green" name="btnStart"  id="btnStart"type="button"  value="Add"   /> </div>
    
    
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
  <div  id="title-head6" class="title-head">Advert </div>
 <br />
  

  
</div>

  
   


<!-- ThIRD PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
 
   
<div id="main3" class="mainDiv card mb-5" style="margin-top:-28px; display:inline-block; text-align:center;" >
 <div  id="title-head" class="title-head">Current Time in {!!$query[0]->state !!}, {!!$query[0]->value !!} </div>
 <br />
 
<!--
<p>New York: <span class="clock" data-timezone="America/New_York"></span></p>
<p>Shanghai: <span class="clock" data-timezone="Asia/Shanghai"></span></p>
<p>Berlin: <span class="clock" data-timezone="Europe/Berlin"></span></p>

<p>Lagos: <span class="clock" data-timezone="Africa/Lagos"></span></p>

<p>Accra: <span class="clock" data-timezone="Africa/Accra"></span></p>

<p>Benin: <span class="clock" data-timezone="Africa/Porto-Novo"></span></p>

<p>Russia: <span class="clock" data-timezone="Europe/Kirov"></span></p>

<p>Russia: <span class="clock" data-timezone="Europe/Samara"></span></p>

<p>Ivory Coast: <div class="clock" data-timezone="Africa/Abidjan"></div></p>

-->

 
<div class="mainbody">Time Zone:&nbsp;<strong> ({!!$query[0]->utc_select !!}) &nbsp;{!!$query[0]->time_zone !!}</strong></div>
 
 @if($query[0]->details !="")

 <div id="list-button" style="text-align:left; margin:10px;" class="mainbody">  {!!$query[0]->details !!}</div>
 
 @endif
 
 @if($query[0]->details =="")

 <div id="list-button" style="text-align:left; margin:10px;" class="mainbody">  On this website you can find out the current time and date in any country and city in the world. You can also view the time difference between your location and that of another city. The home page displays the clock with the exact time in your region, as well as a pre-installed list of clocks for major cities. </div>
 
 @endif

   <div  id='butSubmit' class='world-hour-button-bg' style='padding-top:5%; display:none;'><input class='btn btn-success btn-lg mb-1'  type='submit' name='button' id='button' value='Add' style='z-index:-2;  ' /></div>
 
</div>




<!-- FORUTH PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
    
<div id="main4" class="card mb-5 mainDiv" style="margin-top:-28px;" >

 <div  id="title-head" class="title-head">How to use the online  clock </div>
<div  id="text-main" class="mainbody">
   On this website you can find out the current time and date in any country and city in the world. You can also view the time difference between your location and that of another city.

The home page displays the clock with the exact time in your region, as well as a pre-installed list of clocks for major cities. You can modify this list as you wish. For any city in the list, you can open a separate page with a clock by clicking on the title with the name of the city.

You can configure the clock appearance (text color, type, and size), and these settings will be saved; they will be used when you open your web browser next time.</div>
</div>



<!-- FIFTH PHASE STARTS HERE -->

  
    
<div id="main5" class="card mb-5 mainDiv main5"  style="margin-top:-28px; " >
 
 <div id="list-button" > 
 <div  id="title-head" class="title-head ">List of Cities in  {!!$query[0]->value !!} </div><br />
 @foreach($city as $rst)
      
       <?php
 
  
      
	$UTC_time =substr($rst->utc_select,3,10);
	// echo $UTC_time;
			
			 $strArray1=explode(" ",$UTC_time);
	   
	
	    $UTC_time=$strArray1[1].$strArray1[2];
		
		 
     ?>  
 <?php 
 {
	 
	 if($id !=$rst->id)
	 {
  ?>  	 
 <div id='wrdClock' class='world-hour'> <span id='spanId'  class='world-head' style='display:inline-block;'><a href ='../view-city-utc-time/{!!$rst->id!!} ' class='update'> {!!$rst->state!!}  ,   {!!$rst->value!!} </a></span><br><br> <span id='sp' class='timeSize world-tm  clock'  data-timezone='{!!$rst->time_zone!!}'  data-time_zone_city='{!!$rst->state!!}'  data-utc=' <?php echo $UTC_time ;?>, H'> </span></div>
 
 <?php 
} 
} 
  ?> 
 @endforeach
 </div>
  
</div>



<!-- SEVENTH PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
 
   
<div id="main7" class="mainDiv card mb-5 mainbody" style="margin-top:-28px; display:inline-block;  min-width:88%;" >
  <div  id="title-head7" class="title-head">Blog </div>
 <br />
  
 @foreach($query1 as $rst)
@if(trim($rst->menu) ==  "World Clock")
  
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
   
     <a href="javascript:void(0)" style="text-align:right; margin:5px;"  onclick="scrolling()">Top </a>
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
	
	document.getElementById('main7').style.display="none";
	
	
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
	    
	if(style ==130)
	{
	   
	  // cur.style.fontSize='130px';
	   document.getElementById('mainNavBar').style.display="block";
	   
	}
	if (style == 60){
		//cur.style.fontSize=(45)+'px';
		  
	}	
	   
	   
		
	 
	 document.getElementById('main').style.backgroundClip="border-box";
	 
	 
	 
	 document.getElementById('main').style.border="1px solid rgba(0,0,0,.125)";
	 
	 document.getElementById('main6').style.backgroundClip="border-box";
	 
	 document.getElementById('main6').style.border="1px solid rgba(0,0,0,.125)";
	 
	 
	  document.getElementById('main2').style.backgroundClip="border-box";
	 
	 document.getElementById('main2').style.border="1px solid rgba(0,0,0,.125)";
	
	document.getElementById('main3').style.display="block";
	
	
	
	document.getElementById('main4').style.display="block";
	 document.getElementById('main7').style.display="block";
	
	
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
		   
		// console.log('C Font :'+c);  
		 
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
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate() +' '+ today.getHours() +':'+ today.getMinutes()+':'+ today.getSeconds();

var addDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' '+ hrInt +':'+ minInt+':'+ today.getSeconds();


   todayAdd= new Date(addDate);
   
    date= new Date(date);
	
	var dateDiff= todayAdd.getTime() - date.getTime();
   
 console.log('Add Date: '+addDate);
console.log('Date: '+date);
  console.log('Date Diff :'+dateDiff);
  
  
  
	   
	 
	  if( dateDiff <0 )
	  {
		   
		   var dt =today.getDate()+1;
		  addDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+dt+' '+ hrInt +':'+ minInt+':'+ today.getSeconds();

console.log('Add New Date: '+addDate)

		  todayAdd= new Date(addDate);
		  
		   dateDiff=  todayAdd.getTime()-date.getTime();
		
		 

    }
	 
// document.getElementById('setTime').value=dateDiff;
 
CountDown.Start(dateDiff);
 
 
 }
 
 
 
 
 /* RESTART TIME ENABLE THE CLOCK TO CONTINUE AFTER  ALARM EXPIRED */
 
 
 function restartTime()

{
	 
	
//alert(calcTime('Bombay', '+5.5'));	
	
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

 
	
	
	 $("#lstHour").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#lstHour").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Country  !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	 //document.getElementById('cls1').selectedIndex = 0;
	  //  document.getElementById('term1').selectedIndex = 0;
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	    //document.getElementById('cls1').value='Select';
	   
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
 //var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'utc-time',
         data:{"_token":$('#signup-token').val(),"countryId":$("#lstHour").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
    var sel="Select";
			 var option='';
			 option ='<option value="Select">'+sel+'</option>';
			
			
				 for (i=0;i < data.length;i++)
				 
				 { 
				   
				  option+='<option value ="'+ data[i].time_zone +'">('+data[i].utc_select +')&nbsp;'+ data[i].state +'</option>';

				} 
				
				
				 
				$("#hr").html(option);
				
				
				/*
				for (var i=0;i < data.rstDpt.length;i++)
				{
				 if(data.rstDpt[i].department != 'NA')
				{	
				 option+='<option value ="'+ data.rstDpt[i].dptId +'">'+data.rstDpt[i].department +'</option>';
				}
				
				
				}
				
				*/
				 
				 
	   
	    
		
				 
					 
				  	         $("#SelectError").html('');
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			

  $("#hr").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#lstHour").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Country  !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	  var sel= document.getElementById('hr'); 
	var opt = sel.options[sel.selectedIndex]; 
	
	 var str=opt.text;
	 
	  var y=str.indexOf(")")
	 var x=str.indexOf(")");
	 var n=str.indexOf(")");
	n=n+1;
	var timezone=opt.text.substr(n,30);
	
	// var timezone =document.getElementById('hr').value
	x=x-1;
	var utcSelect=opt.text.substr(1,x);
	 document.getElementById('utcSelect').value=utcSelect;
	
	y=y-4;
	var utcValue=opt.text.substr(4,y);
	 utcValue
	document.getElementById('utcValue').value=utcValue;
	document.getElementById('optionA').value=timezone;
	
	 //document.getElementById('cls1').selectedIndex = 0;
	  //  document.getElementById('term1').selectedIndex = 0;
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	
	
	
	
	 });
	 
	 
	 
	 
	 
	 
	 
	 
 
 $("#btnStart").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	   
	 
	 
	var ctr =0;
	
/*	$('#form1').validate({ // initialize the plugin
        rules: {
            mark: {
                required: true,
                integer: true
            } 
        }
    });*/
	$("#error-page").html("");
	 
	
	 
	
	
	
	document.getElementById('error-page').style.height="auto";
	if($("#optionA").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; City Name is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	if($("#hr").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Time Zone is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	
	
	if(document.getElementById('lstHour').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Country is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	
	 if(document.getElementById('hr').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select UTC Time !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	 
	  
	 if(document.getElementById('lstHour').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Country !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	 
	 
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	   var status=1;
	//alert(opt.text)
	  dtArray.push({
		     countryId:$("#lstHour").val(),
			 time_zone:$("#hr").val(),
			city:$("#optionA").val(),
			
			utcValue:$("#utcValue").val(),
			utcSelect:$("#utcSelect").val(),
			
			 status:status
			 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"/create-utc-time",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
     var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; '+ data +' &nbsp;</span>';
       //$("#error-page").html(saved);
	  // alert(data);
	   
	    var table ="";
   
	
	var UTC_time;
	var strArray1;
	
	var  span="<span id='spanId' class='clock' style='display:inline-block;'>";
   var  spanclose="</span >";
   
   
   var  sp="<span id='sp' class='timeSize world-tm'>";
	var  sp1="<span id='sp1' class='timeSize world-dt'>";
	var cls ="</span>";
	var tm_disp="";
	
	var tm_zone="";
	 
	for (i=0;i < data.length;i++)
				  {
		
		
			 UTC_time =data[i].utc_select.substr(3,10);
			
			 strArray1=UTC_time.split(" ");
	
	
	   UTC_time=strArray1[1]+strArray1[2];
 	  
 
  table+="<div id='wrdClock' class='world-hour'> <span id='spanId'  class='world-head' style='display:inline-block;'>" + data[i].state +', '+ data[i].value + "</span><br><br> <span id='sp' class='timeSize world-tm  clock'  data-timezone='"+data[i].time_zone+"' data-utc='"+UTC_time+" H'> </span>"+"</div>";
		
	 	 
				 
				  }
				  
			$("#list-button").html(table);
			
			 modal.style.display = "none";
         },
		 error: function(data) {
         
	   console.log('Data Error');
	   alert('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
  
	 
	 
	 
</script>



<script>
function scrolling()
{
	 
	$('html,body').animate({scrollTop:20},'0');
	 
	document.body.style.transition=".5s";
	
 
}
</script>




<!-- INSTANT LOADING OF HOUR -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false"> </script>


 
 <script src="../timer/js/dropdown.js"> </script>
 
  
</body>
</html>
