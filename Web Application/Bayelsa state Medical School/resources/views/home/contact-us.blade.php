<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">
 
 <meta name="_token" content="{!! csrf_token() !!}"/>
<title>Timer</title>
 <script src="../timer/js/jquery-3.1.1.js"> </script>
 
 <script src="../timer/dist/js/window-date-picker.js"></script>
  
 

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
  
  document.getElementById("main").style.minWidth="69.04%";
    document.getElementById("main").style.marginRight = "250px";
  document.getElementById("main").style.transition=".5s";
  
  document.getElementById("main2").style.marginRight = "250px";
  document.getElementById("main2").style.transition=".5s";
  
  document.getElementById("main3").style.minWidth="69.04%";
   document.getElementById("main3").style.marginRight = "250px";
  document.getElementById("main3").style.transition=".5s";
  
  document.getElementById("main4").style.minWidth="69.04%";
   document.getElementById("main4").style.marginRight = "250px";
  document.getElementById("main4").style.transition=".5s";
  
  document.getElementById("main5").style.minWidth="69.04%";
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
  document.getElementById("main").style.minWidth="88%";
   document.getElementById("main").style.marginRight= "0";
  //document.getElementById("container").style.marginRight = "0";
  document.getElementById("main").style.transition=".5s";
  
   document.getElementById("main2").style.marginRight= "0";
   document.getElementById("main2").style.transition=".5s";
   
    document.getElementById("main3").style.minWidth="88%";
	document.getElementById("main3").style.marginRight= "0";
   document.getElementById("main3").style.transition=".5s";
   
   document.getElementById("main4").style.minWidth="88%";
    document.getElementById("main4").style.marginRight= "0";
   document.getElementById("main4").style.transition=".5s";
   
   
   document.getElementById("main5").style.minWidth="88%";
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
	
	window.sessionStorage;
	
	 
	
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
	
	document.getElementById('main3').style.color="#FF9500";
	
	document.getElementById('main6').style.color="#FF9500";
	document.getElementById('main7').style.color="#FF9500";
	
	document.getElementById('main5').style.color="#FF9500";
	document.getElementById('main4').style.color="#FF9500";
	document.getElementById('title-head').style.color="#FF9500";
	
	document.getElementById('title-head3').style.color="#FF9500";
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

document.getElementById('rst').style.color="#FF9500";

}
else
{
	 document.getElementById('currentTime').style.color="#000";
	document.getElementById('countdown').style.color="#000";
	document.getElementById('dt').style.color="#000";
	
	document.getElementById('alarmTable').style.color="#000";
	document.getElementById('main2').style.color="#000";
	
	document.getElementById('main3').style.color="#1E2C2C";
	
	
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

document.getElementById('rst').style.color="#1E2C2C";

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
//document.getElementById('dates_times_row').style.display="none";
//document.getElementById('dates_times_row_text').style.display="none";

 
document.getElementById('popup_month').style.display="none";
document.getElementById('popup_year').style.display="none";


document.getElementById('hours_minutes_sec_row').style.display="block";
document.getElementById('hours_minutes_sec_row_txt').style.display="block";

document.getElementById('txtCheck_Date').value="";
 //document.getElementById('date').value="";
  document.getElementById('time').value="";
  
   document.getElementById('txtStartMonth').value="";
  
 


}

function hide_hour_min_sec()
{
//document.getElementById('dates_times_row').style.display="block";
//document.getElementById('dates_times_row_text').style.display="block";

document.getElementById('hours_minutes_sec_row').style.display="none";
document.getElementById('hours_minutes_sec_row_txt').style.display="none";

document.getElementById('popup_month').style.display="none";




 

}


function sort_time_AM(h)
{
	var hrs=""
	var option="";
  var eq='"';
    ctrhr="";
   
   var ctr=0;
   
    ctrhr =00;
	
	var hoursss=0;
    
   console.log('H time : '+h);
   
   if(h <10)
	{	
	 hoursss ="0"+h ; 
	 }
	
	
   while(ctr <  12)
  {
	  
	  
	  if(h <10)
	{	
	 hoursss ="0"+h ; 
	 }
	 
	 if(h >9)
	{	
	 hoursss =h ; 
	 }
	  
	if(ctrhr <10)
	{
	 hrs =hoursss +":0"+ctrhr  +" AM"; 
  
	 option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-white' value='"+hrs+"'  onClick="+ eq +"updateTime_full('"+hrs+"','but"+ ctr +"')"+ eq +"/>"
	 
	 ctr++;
	 ctrhr+=5;
	
 	 
}

else
	{
		
	  
	 hrs =hoursss +":"+ctrhr+" AM"; 
  
	 option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-white ' value='"+hrs+"'  onClick="+ eq +"updateTime_full('"+hrs+"','but"+ ctr +"')"+ eq +"/>"
	 
	 ctr++;
	 ctrhr+=5;
 	 
}

}	
	 
$('#popup_hour_list').html("<div  class='title-head'>AM</div>");
 

$('#popup_hour_list').append(option);


document.getElementById('popup_hour').style.display='none';
 document.getElementById('pop_hrs').style.display='block';

//$('#am_pm').html("AM");
}

function sort_time_PM(h)
{
var hrs=""
	var option="";
  var eq='"';
   var hoursss="";
   var ctr=0;
   ctrhr="";
   
   
    
    ctrhr =00;
   while(ctr <  12)
  {
	  
	if(h <10)
	{	
	 hoursss ="0"+h ; 
	 }
	 
	 if(h >9)
	{	
	 hoursss =h ; 
	 }  
	  
	  
	  
	if(ctrhr <10)
	{
		
	 hrs =hoursss +":0"+ctrhr  +" PM"; 
  
	 option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-white' value='"+hrs+"'  onClick="+ eq +"updateTime_full('"+hrs+"','but"+ ctr +"')"+ eq +"/>"	 
	 ctr++;
	 ctrhr+=5;
	
 	 
}

else
	{
	 hrs =hoursss +":"+ctrhr+" PM"; 
  
	 option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-white ' value='"+hrs+"'  onClick="+ eq +"updateTime_full('"+hrs+"','but"+ ctr +"')"+ eq +"/>"
	 
	 ctr++;
	 ctrhr+=5;
 	 
}

}	 

 
$('#popup_hour_list').html("<div  class='title-head'>PM</div>");
$('#popup_hour_list').append(option);


document.getElementById('popup_hour').style.display='none';
 document.getElementById('pop_hrs').style.display='block';

 
}


function updateTime_full(hr,id)
{
 
//console.log('Update Hr: '+hr +" Id : "+id);
 
  
 var c=String(hr);
  
 //console.log("Len: "+c.length);
if( c.length==1)
{
  hr="0"+hr; 
  
   
}

if(id==1)
{
	document.getElementById('time').value="";
 document.getElementById('time').value=hr;
  document.getElementById('txtCheck_Date').value=hr;
 } 
 
if(id==2)
{
	document.getElementById('txtStartMonth').value="";
 document.getElementById('txtStartMonth').value=hr;
  document.getElementById('txtCheck_Date').value=hr;
 } 

if(id==3)
{
	 
	document.getElementById('txtStartYear').value="";
 document.getElementById('txtStartYear').value=hr;
  document.getElementById('txtCheck_Date').value=hr;
 } 
 
  if(id==4)
{
	document.getElementById('txtEndDay').value="";
 document.getElementById('txtEndDay').value=hr;
  document.getElementById('txtCheck_Date').value=hr;
 } 
 
 if(id==5)
{
	document.getElementById('txtEndMonth').value="";
 document.getElementById('txtEndMonth').value=hr;
  document.getElementById('txtCheck_Date').value=hr;
 } 
 
 if(id==6)
{
	 
	document.getElementById('txtEndYear').value="";
 document.getElementById('txtEndYear').value=hr;
  document.getElementById('txtCheck_Date').value=hr;
 } 
 
 if(id==7)
{
	 
	document.getElementById('txtEndWeek').value="";
 document.getElementById('txtEndWeek').value=hr;
  document.getElementById('txtCheck_Date').value=hr;
 } 
 
 /* HIDE FIRST TIME LIST*/ 
  document.getElementById('pop_hrs').style.display='none';
  document.getElementById('popup_hour').style.display='none';
  
  document.getElementById('popup_month').style.display='none';
  document.getElementById('popup_year').style.display='none';
  
  
  document.getElementById('popup_hour1').style.display='none';
  
  document.getElementById('popup_month1').style.display='none';
  document.getElementById('popup_year1').style.display='none';
  
  document.getElementById('popup_week').style.display='none';
 //document.getElementById('pop_hrs').style.display='block';
  
 // activateTimer_date();

 
 }
 
 
 
 function txtTimePopUp()
{
 // var ids =id;
  
  
    document.getElementById('popup_hour').style.display='block';
 document.getElementById('popup_month').style.display='none';
   document.getElementById('popup_year').style.display='none';
 
//console.log(id);
 }
 
  function txtMonthPopUp()
{
  
  document.getElementById('popup_hour').style.display='none';
   document.getElementById('popup_year').style.display='none';
   document.getElementById('popup_month').style.display='block';
  
 
//console.log(id);
 }
 
  function txtYearPopUp()
{
  
   document.getElementById('popup_year').style.display='block';
document.getElementById('popup_hour').style.display='none';
   document.getElementById('popup_month').style.display='none';
 
  }
 
 /* START POPUP STARTS HERE */
 
 
  function txtTimeEndPopUp()
{
 // var ids =id;
  
  
    document.getElementById('popup_hour1').style.display='block';
 document.getElementById('popup_month1').style.display='none';
   document.getElementById('popup_year1').style.display='none';
   document.getElementById('popup_week').style.display='none';
 
//console.log(id);
 }
 function txtMonthEndPopUp()
{
  
   document.getElementById('popup_month1').style.display='block';
document.getElementById('popup_hour1').style.display='none';
   document.getElementById('popup_year1').style.display='none';
 document.getElementById('popup_week').style.display='none';
  }
 
  function txtYearEndPopUp()
{
  
   document.getElementById('popup_year1').style.display='block';
document.getElementById('popup_hour1').style.display='none';
   document.getElementById('popup_month1').style.display='none';
  document.getElementById('popup_week').style.display='none';
  }
  
  
  function txtWeekEndPopUp()
{
  
   document.getElementById('popup_week').style.display='block';
document.getElementById('popup_hour1').style.display='none';
   document.getElementById('popup_month1').style.display='none';
   document.getElementById('popup_year1').style.display='none';
 
  }
 
  
 
 // When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	
   if (event.target == modal) { 
   document.getElementById('popup_year1').style.display='none';
document.getElementById('popup_hour1').style.display='none';
   document.getElementById('popup_month1').style.display='none';
   
   document.getElementById('popup_year').style.display='block';
document.getElementById('popup_hour').style.display='none';
   document.getElementById('popup_month').style.display='none';
   }
  
   
}
 
 
 function generate_Date(id)
 {
	nowdates =new Date();
	  
	var y=parseInt(nowdates.getFullYear());
	if(id=='end')
	{
	document.getElementById('txtEndDay').value=nowdates.getDate();
	document.getElementById('txtEndMonth').value=nowdates.getMonth()+1;
 document.getElementById('txtEndYear').value=nowdates.getFullYear();
 }
 
 if(id=='start')
	{
	document.getElementById('time').value=nowdates.getDate();
	document.getElementById('txtStartMonth').value=nowdates.getMonth()+1;
 document.getElementById('txtStartYear').value=nowdates.getFullYear();
 }
 
	
}
 
 function generateYear()
 {
	nowdates =new Date();
	  
	var y=parseInt(nowdates.getFullYear());
	   
	   var table="";
	   var option="";
	   var ctr=1;
	 for (i=0;i < 31;i++)
	{
	  
		  
		 
table +="<input name='but1' id='but"+ ctr +"' type='button' class='button-white' value='"+y+"' onClick='updateTime_full("+y+",3)'/>"
//option +="<input name='but1' id='but"+ ctr +"' type='button' class='button-white' value='"+y+"' onClick='updateTime_full("+y+",6)'/>"
		 
		y=y+1 
		 
	     
		 ctr++; 
	 
	  
  } 
  
  $("#popup_year").append(table);
  //$("#popup_year1").append(option);
  generateYearNumber();
}	 





function generateYearNumber()
 {
	nowdates =new Date();
	  
	var y=parseInt(nowdates.getFullYear());
	   
	   var table="";
	   var option="";
	   var ctr=1;
	 for (i=0;i < 21;i++)
	{
	  
		  if(ctr <10)
		  {
			option +="<input name='but1' id='but"+ ctr +"' type='button' class='button-white' value='0"+ctr+"' onClick='updateTime_full(0"+ctr+",6)'/>"  
			
			
			table +="<input name='but1' id='but"+ ctr +"' type='button' class='button-white' value='0"+ctr+"' onClick='updateTime_full(0"+ctr+",7)'/>"  
		  }
		  
		  if(ctr >9)
		  {
			option +="<input name='but1' id='but"+ ctr +"' type='button' class='button-white' value='"+ctr+"' onClick='updateTime_full("+ctr+",6)'/>" 
			
			table +="<input name='but1' id='but"+ ctr +"' type='button' class='button-white' value='"+ctr+"' onClick='updateTime_full("+ctr+",7)'/>"  
		  }
 //option +="<input name='but1' id='but"+ ctr +"' type='button' class='button-white' value='"+ctr+"' onClick='updateTime_full("+ctr+",6)'/>"
		 
		 
		 
	     
		 ctr++; 
	 
	  
  } 
  
   
  $("#popup_year1").append(option);
  $("#popup_week").append(table);
}	 




 function count_days()
 {

 	var stDay =parseInt(document.getElementById('time').value);
  
 
 
	var stMonth=parseInt(document.getElementById('txtStartMonth').value);
  
	var stYear =parseInt(document.getElementById('txtStartYear').value);
	
	
	 
	/*
	if(isNaN(stYear))
	{
	   stYear=0;
	}
	
	if(isNaN(stMonth))
	{
	   stMonth=0;
	}
	
	if(isNaN(stDay))
	{
	   stDay=0;
	}
	*/
	 $('#error-time').html("");
	
	
	if(isNaN(stDay))
	{
		 $('#error-time').html('Day Can not be empty')
		 return false;
	  // enDay=0;
	 // enDay= new_date.getDate()
	}
	  
	  if(isNaN(stMonth))
	{
	   //enMonth=0;
	   $('#error-time').html('Month Can not be empty');
	    return false;
	  //enMonth= new_date.getMonth()+1;
	} 
	 
	 if(isNaN(stYear))
	{
	   //enYear=new_date.getFullYear();
	   
	   $('#error-time').html('Year Can not be empty');
	   return false;
	   
	}
	
	
	
  
	var enDay=parseInt(document.getElementById('txtEndDay').value);
	var enDay2=enDay;
 
  
	var enMonth =parseInt(document.getElementById('txtEndMonth').value);
  
	var enYear =parseInt(document.getElementById('txtEndYear').value);
	
	var enWeek =parseInt(document.getElementById('txtEndWeek').value);
	
	var en_weerk=enWeek;
	
	 
	 
	if(document.getElementById('chk').checked==true)
	{
		 
	} 
	
	if(isNaN(enWeek))
	{
	   enWeek=0;
	   en_weerk=0;
	}
	
	if(isNaN(enYear))
	{
	   enYear=0;
	}
	
	if(isNaN(enMonth))
	{
	   enMonth=0;
	}
	
	if(isNaN(enDay))
	{
	   enDay=0;
	}
	
	enWeek=enWeek*7;
	
	
	enDay=enDay+enWeek;
	//console.log('Start Month: '+stMonth);
	
	//var ed=enYear+"-"+enMonth+"-"+enDay;
	
	var st=stYear+"-"+stMonth+"-"+stDay;
   
   //var endDate = new Date(ed);
   
    var endDate = new Date()
	
	
   
   endDate.setDate(endDate.getDate()+enDay);
   endDate.setMonth(endDate.getMonth()+enMonth);
   
   endDate.setFullYear(endDate.getFullYear()+enYear);
    
   var  start_Date = new Date(st);
   
   
  var startDates =start_Date.toString();
   
    
   
   var now = new Date().getTime();
   
       //updateListBox();
	   //var choiceOpt= document.getElementById('cls').value
	  var choiceOpt= document.getElementById('txtlListBox').value
	   
	if(choiceOpt=='Add')
	{
		
		var now = new Date();
		
		var va=(start_Date.getTime())-(now.getTime())
		 var daysDal = Math.round(va / (1000 * 60 * 60 * 24));
		   
		   
		  // console.log('Difference Start Day :'+daysDal);
		    
		   
		   var date_Diff=((start_Date.getTime()-now.getTime())+(endDate.getTime()-now.getTime()));
		 
		 
		  
		  var days = Math.round(date_Diff / (1000 * 60 * 60 * 24)-daysDal);
		  
		 //console.log('Days '+days);
		   start_Date.setDate(start_Date.getDate()+days);
		 total_date=start_Date.toString();
	}	
	
	if(choiceOpt=='Subtract')
	{
		 
		 var now = new Date();
		   
		   var va=(start_Date.getTime())-(now.getTime())
		 var daysDal = Math.round(va / (1000 * 60 * 60 * 24));
		 
		 //console.log('Difference Start Day :'+daysDal);
		   
		   var date_Diff=((endDate.getTime()-now.getTime())-(start_Date.getTime()-now.getTime()));
		
		 
		// var date_Diff=endDate.getTime()-start_Date.getTime();
		  var days = Math.floor(date_Diff / (1000 * 60 * 60 * 24)+daysDal);
		  
		  //console.log('Days '+days);
		 
		   start_Date.setDate(start_Date.getDate()-days);
		 
		//console.log('Final Date: '+start_Date.toString())
		
		 	
		total_date=start_Date.toString();
		 
		
		 
	}	
		 
		 
		 
		var date_Diff=total_date ;
 
  rst="";
	var x =document.getElementById('cls').value;
	
	//var cls = document.getElementById('lstHour').selectedIndex=1 ;
	 
	
	//console.log('options' +cls);
	
  if(choiceOpt=='Add')
	{
   
 var rst ="From <span style='font-weight:bold;'>"+ startDates.toString().substr(0,15)+"</span><br> <span class='mainbody'> Added "+ enYear+" years,  "+ enMonth+" month, "+ en_weerk+" weeks and "+ enDay2+" days</span><br><br>"
  
  //added 9 year, 12 months, 10 weeks and 72 days
  
  //Result: Thursday, 13 November 2029.
 rst+=" <span style='font-weight:bold;'>Result: "+ total_date.toString().substr(0,15)+ "  </span>"
 
  
   }
   
   
   if(choiceOpt=='Subtract')
	{
		
   
 var rst ="From <span style='font-weight:bold;'>"+ startDates.toString().substr(0,15)+"</span><br> <span class='mainbody'> Subtracted "+ enYear+" years,  "+ enMonth+" month, "+ en_weerk+" weeks and "+ enDay2+" days</span><br><br>"
  
  //added 9 year, 12 months, 10 weeks and 72 days
  
  //Result: Thursday, 13 November 2029.
 rst+=" <span style='font-weight:bold;'>Result: "+ total_date.toString().substr(0,15)+ "  </span>"
 
  
 
   }
  
$('#rst').html(rst);
  
   

}

/*POPULATE LIST BOX MOBILE SELECTION FOR ADDITION AND SUBTRACTION */

function updateListBox(options)
{
	if(options=="Mobile")
	{
	var val=document.getElementById('clsMobile').value
	}
	if(options=="Desktop")
	{
	var val=document.getElementById('cls').value
	}
	  			 
				 document.getElementById('txtlListBox').value=val
				  
				 
}

/* START TIMER USING DATE */ 
 function activateTimer_date()
 {
	 var date_split=document.getElementById('txtCheck_Date').value;
	 
	 var date_selected=document.getElementById('date').value;
	 
	 console.log('Hour: '+date_split.substring(0,2));
	 
	 console.log('Minutes: '+date_split.substring(3,5));
	 
	  console.log('AM: '+date_split.substring(6,8));
	 
	
	 
	  var lstHour=date_split.substring(0,2);
	 var lstMinutes= date_split.substring(3,5);
	 
	  var am_pm =date_split.substring(6,8);
	 
	  
	 var checkHours =lstHour +" "+am_pm;
	 
	
	
	console.log("Check Hours: "+checkHours);
	
	 
	
	
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
	
	if(checkHours =="09 PM")
	{
		lstHour=21;
	}	
	if(checkHours =="08 PM")
	{
		lstHour=20;
	}	
	if(checkHours =="07 PM")
	{
		lstHour=19;
	}	
	if(checkHours =="06 PM")
	{
		lstHour=18;
	}	
	if(checkHours =="05 PM")
	{
		lstHour=17;
	}
	if(checkHours =="04 PM")
	{
		lstHour=16;
	}
	if(checkHours =="03 PM")
	{
		lstHour=15;
	}
	if(checkHours =="02 PM")
	{
		lstHour=14;
	}
	if(checkHours =="01 PM")
	{
		lstHour=13;
	} 
	
	
	var now = new Date();
	
	var selected_date=date_selected +" "+lstHour+":"+lstMinutes+":00" 
	var selectedDate = new Date(selected_date).getTime();
	
	//console.log("New Date Time: "+ selectedDate);
	 
	 var calculated_date= selectedDate - now.getTime();
	 
	 
	  console.log("Calculated Date: "+ calculated_date);
	  
	 document.getElementById('reset').style.display="none";
	 
	  CountDown.Start(calculated_date);
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

<link href="../timer/dist/css/window-date-picker.css" rel="stylesheet" />

<link href="../timer/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/app.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/style.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/app.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/menu.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/switch.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/radio.css" rel="stylesheet" type="text/css" />

<link href="../timer/css/checkbox.css" rel="stylesheet" type="text/css" />
<link href="../timer/css/popup.css" rel="stylesheet" type="text/css" />
<link href="../timer/css/dropdown.css" rel="stylesheet" type="text/css" />
<link href="../timer/css/table.css" rel="stylesheet" type="text/css" />



<script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>

<meta name="_token" content="{!! csrf_token() !!}"/>
</head>

<body onload="generateHour() ,hide_date_time(), getAutoColour(),generateYear()">

   

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
  
  <a href="../alarm" ><i class="material-icons"><span style=" font-size:17px;"> access_alarms </span></i>&nbsp;&nbsp;Alarm &nbsp;<i class='fas fa-chevron-right'></i></a> 
  
    <a href="../timer"><i class="material-icons" ><span style=" font-size:17px;">av_timer</span></i>&nbsp;&nbsp;Timer</a> 

  
  <a href="../stopwatch"><i class="material-icons" ><span style=" font-size:17px;">timer_off</span></i>&nbsp;&nbsp;Stopwatch</a> 
  
  <a href="../world-clock"><i class='fa fa-clock'></i> &nbsp;&nbsp;World Clock</a>
 
  <a href="../time-calculator"><i class='far fa-clock'></i> &nbsp;&nbsp;Time Calculator</a>
  
   
  <a href="../add-date"><i class='fas fa-calendar-alt'></i> &nbsp;&nbsp;Day Calculator</a>
  
  
   <a href="../count-days"> <i class='fas fa-calendar-plus'></i> &nbsp;&nbsp;Date Calculator</a>
   
  <a href="../holiday"><i class='fas fa-hotel'></i> &nbsp;&nbsp;Holiday</a>
</div>


 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
<div id="main" class="card mb-5 mainDiv mainbody"  style="display:inline-block; min-width:88%;  "  >

 


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
  
  <a href="../alarm"><i class="material-icons ">access_alarm</i><br /> Alarm Clock</a> 
  <a  href="../timer-reading"><i class="material-icons ">av_timer</i><br />Timer</a> 
  <a href="../stopwatch"><i class="material-icons">timer_off</i><br /> Stopwatch</a> 
  <a href="../world-clock"><i class="material-icons">access_time</i> <br />World Clock</a>
   
 <a href="../time-calculator"> <i class='far fa-clock ' style="font-size:20px;"></i><br />Time Calculator</a>
   
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

<div id="setUp" style="font-size:27px; color:#C1C1C1; padding-bottom:10px; display:none;" >Contact Us  </div>
<input name="hrs" id="hr_s" type="hidden" value="00" /><input name="mins" type="hidden" value="00" id="min_s" />
<input name="sec" type="hidden" value="00" id="sec_s" />
<input name="txtFont" type="hidden" value='' id="txtFont" />

<!-- THIS TEXTBOX WILL ENABLE ME TO VALIDATE DATE AND HOUR OPTION -->
<input name="txtCheck_Date" type="hidden" value='' id="txtCheck_Date" />

<!-- STORE TIME -->
<input name="txtNow" type="hidden" value='' id="txtNow" />

            <div id="currentTime" class="timeSize" style="margin-top:-25px; text-align:center; display:none;">00:00:00</div>
            
            <div id="dt" class="timeSize" style="font-size:40px;margin-top:-25px; text-align:center;display:none;"></div>
            
<!--
                <div  class="timeSize"  id="countdown">00:00:00</div>
     
-->

<div  id="title-head1" class="title-head">Contact Us </div>

<div style="font-size:12px; color:#436FB8;font-weight:bold;"> </div>
<br />
 @foreach($query as $rst)
   
 <!--
 <img src="../timer/images/default_avatar.webp" width="50" height="50" /> 
 -->

{!! $rst->details !!}
<br />

 
 
 @endforeach









 
  



  <!-- Modal content <div id="myCountsDate" style="width:90%;"> -->
  <div class="modal-contents"  style="display:none;">
    <div class="modal-header">
    <h4> <span class="header-title">Start Date</span></h4>
      <span class="close">&times;</span>
     
    </div>
    <div class="modal-body" >
      
      
      
      <div   class="div-table"  >
      
       
      
    
      
    <div class="div-table-row" id="dates_times_row" >  
       



<div id="popup_hour"  class="popupDate popup_month_year"  style="display:none;"  >
<div class="title-head"  >Day </div>
<input  class="button-white" id="but1" name="but1" type="button" value="01"   onclick="updateTime_full('01',1)"/>

 

<input  class="button-white" id="but2" name="but2" type="button" value="02"   onclick="updateTime_full('02',1)"/>
<input  class="button-white" id="but3" name="but3" type="button" value="03"   onclick="updateTime_full('03',1)"/>
<input  class="button-white" id="but4" name="but4" type="button" value="04"   onclick="updateTime_full('04',1)"/>
<input  class="button-white" id="but5" name="but5" type="button" value="05"   onclick="updateTime_full('05',1)"/>
<input  class="button-white" id="but6" name="but6" type="button" value="06"   onclick="updateTime_full('06',1)"/>
<input  class="button-white" id="but7" name="but7" type="button" value="07"   onclick="updateTime_full('07',1)"/>
<input  class="button-white" id="but8" name="but8" type="button" value="08"   onclick="updateTime_full('08',1)"/>
<input  class="button-white" id="but9" name="but9" type="button" value="09"   onclick="updateTime_full('09',1)"/>
<input  class="button-white" id="but10" name="but10" type="button" value="10"   onclick="updateTime_full(10,1)"/>
<input  class="button-white" id="but11" name="but11" type="button" value="11"   onclick="updateTime_full(11,1)"/>
<input  class="button-white" id="but12" name="but12" type="button" value="12"   onclick="updateTime_full(12,1)"/>

<input  class="button-white" id="but13" name="but13" type="button" value="13"   onclick="updateTime_full(13,1)"/>
<input  class="button-white" id="but14" name="but14" type="button" value="14"   onclick="updateTime_full(14,1)"/>
<input  class="button-white" id="but15" name="but15" type="button" value="15"   onclick="updateTime_full(15,1)"/>

<input  class="button-white" id="but16" name="but16" type="button" value="16"   onclick="updateTime_full(16,1)"/>
<input  class="button-white" id="but17" name="but19" type="button" value="17"   onclick="updateTime_full(17,1)"/>
<input  class="button-white" id="but18" name="but18" type="button" value="18"   onclick="updateTime_full(18,1)"/>

<input  class="button-white" id="but19" name="but19" type="button" value="19"   onclick="updateTime_full(19,1)"/>
<input  class="button-white" id="but20" name="but20" type="button" value="20"   onclick="updateTime_full(20,1)"/>
<input  class="button-white" id="but21" name="but21" type="button" value="21"   onclick="updateTime_full(21,1)"/>

<input  class="button-white" id="but22" name="but22" type="button" value="22"   onclick="updateTime_full(22,1)"/>
<input  class="button-white" id="but23" name="but23" type="button" value="23"   onclick="updateTime_full(23,1)"/>
<input  class="button-white" id="but24" name="but24" type="button" value="24"   onclick="updateTime_full(24,1)"/>
 
 
 <input  class="button-white" id="but25" name="but25" type="button" value="25"   onclick="updateTime_full(25,1)"/>
<input  class="button-white" id="but26" name="but26" type="button" value="26"   onclick="updateTime_full(26,1)"/>
<input  class="button-white" id="but27" name="but27" type="button" value="27"   onclick="updateTime_full(27,1)"/>

<input  class="button-white" id="but28" name="but28" type="button" value="28"   onclick="updateTime_full(28,1)"/>
<input  class="button-white" id="but29" name="but29" type="button" value="29"   onclick="updateTime_full(29,1)"/>
<input  class="button-white" id="but30" name="but30" type="button" value="30"   onclick="updateTime_full(30,1)"/>
<input  class="button-white" id="but31" name="but31" type="button" value="31"   onclick="updateTime_full(31,1)"/>
 
 

 
</div>


<!-- MONTH POPUP STARTS HERE -->

<div id="popup_month"  class="popupDate popup_month_year" style="display:none;"  >
<div class="title-head">Month </div>
<input  class="button-white" id="but1" name="but1" type="button" value="01"   onclick="updateTime_full('01',2)"/>

 

<input  class="button-white" id="but2" name="but2" type="button" value="02"   onclick="updateTime_full('02',2)"/>
<input  class="button-white" id="but3" name="but3" type="button" value="03"   onclick="updateTime_full('03',2)"/>
<input  class="button-white" id="but4" name="but4" type="button" value="04"   onclick="updateTime_full('04',2)"/>
<input  class="button-white" id="but5" name="but5" type="button" value="05"   onclick="updateTime_full('05',2)"/>
<input  class="button-white" id="but6" name="but6" type="button" value="06"   onclick="updateTime_full('06',2)"/>
<input  class="button-white" id="but7" name="but7" type="button" value="07"   onclick="updateTime_full('07',2)"/>
<input  class="button-white" id="but8" name="but8" type="button" value="08"   onclick="updateTime_full('08',2)"/>
<input  class="button-white" id="but9" name="but9" type="button" value="09"   onclick="updateTime_full('09',2)"/>
<input  class="button-white" id="but10" name="but10" type="button" value="10"   onclick="updateTime_full(10,2)"/>
<input  class="button-white" id="but11" name="but11" type="button" value="11"   onclick="updateTime_full(11,2)"/>
<input  class="button-white" id="but12" name="but12" type="button" value="12"   onclick="updateTime_full(12,2)"/>


 
 

 
</div>

<!-- YEAR POPUP STARTS HERE -->

<div id="popup_year"  class="popupDate popup_month_year" style="display:none;"  >
<div class="title-head"  >Year </div>

</div>


<!-- HOUR LIST -->
<div id="pop_hrs" style="display:none;" >

  
 
<div id="popup_hour_list"  class=" popupDate" style="display:none;" > 
 
  
  
  </div>


</div>
 
      </div>    
      
      
      
      
      <div class="div-table-row" id="hours_minutes_sec_row">  
      <div id="hoursId" class="div-table-col drop-down-menu" style="width:70px; margin-top:10px; " >Day: </div>
      <div id="minutesId" class="div-table-col  drop-down-menu" style="width:70px;margin-top:10px;" >Month: </div>
      
       <div  id="seconds"class="div-table-col drop-down-menu" style="width:80px;margin-top:10px;">Year: </div>
       <div  id="seconds"class="div-table-col drop-down-menu" style="width:40px;margin-top:10px;">Date: </div>
      </div>
      
      <div class="div-table-row" id="hours_minutes_sec_row_txt" >   
      <div id="hoursId" class="div-table-col  drop-down-menu" style="width:55px; "  >
     
  <input id="time" type="text" class="form-control" name="time"   value="{{ old('time') }}" required autofocus autocomplete="off" style=" text-align:left; width:50px;" onclick="txtTimePopUp()" placeholder="dd" >  
  </div>
   <div id="minutesId" class="drop-down-menu div-table-col" style="width:5px; font-weight:bold; line-height:40px; " > /</div>
   
   
      <div id="minutesId" class="drop-down-menu div-table-col" style="width:55px; " >
      <!-- <span class="custom-select" style="width:100%; height:auto;">-->
   <input id="txtStartMonth" type="text" class="form-control" name="txtStartMonth"   value="{{ old('txtStartMonth') }}" required autofocus autocomplete="off" style=" text-align:left; width:50px;" onclick="txtMonthPopUp()" placeholder="mm" >
  </div>  
  
  <div id="minutesId" class="drop-down-menu div-table-col" style="width:5px; font-weight:bold; line-height:40px;" > /</div>
  
  <div id="seconds" class="div-table-col  drop-down-menu" style="width:80px;">
      <!-- <span class="custom-select" style="width:100%; height:auto;">-->  
   <input id="txtStartYear" type="text" class="form-control" name="txtStartYear"   value="{{ old('txtStartYear') }}" required autofocus autocomplete="off" style=" text-align:left; width:80px;" onclick="txtYearPopUp()" placeholder="yyyy" >
   
   
  </div>
  <div id="picker_main"> 
  <div id="picker" class="div-table-col" style="width:40px; margin-top:5px;"  >
<button  id="toggle" onclick="callDatePicker(1)" class="button-image" ><i class='fas fa-calendar-alt' ></i></button>  </div>
   </div>  
  
  
  <input id="txtPicker" type="hidden" class="form-control" name="txtPicker"   value="{{ old('txtPicker') }}" required autofocus autocomplete="off" style=" text-align:left; width:130px;"  placeholder="picker" >
  
  
      </div>
      
      
    
      
      
      
      
      
      
     <div class="div-table-row">  
       
        <div class="div-table-col" ><a href="javascript:void(0)"onclick="generate_Date('start')">Today</a> </div>
      </div>
      
        
      
   
 
      
    </div>
   </div>
   
   
   
     
    
   

</div>






<!-- END DATE -->




 


 
 <div id="week_txtAddHead" class="modal-contents week-text-add" style="width:100px; border:none; display:none;">
     
      
      
      
      <div   class="div-table" >
<div class="div-table-row" id="hours_minutes_sec_row_txt" style="width:100px; color:#3C8DBC;"> Add/Subtract</div>
 <div class="div-table-row" id="hours_minutes_sec_row">  
      <div id="hoursId" class="div-table-col drop-down-menu" style="width:70px;" >
      <input name="txtlListBox" type="hidden" value='Add' id="txtlListBox" />
  <select class="lst-menu drop-down-menu" id="clsMobile" style="width:120px;" onchange="updateListBox('Mobile')" >
   
    <option value="Add">(+) Add</option>
    <option value="Subtract">(-) Subtract</option>
      
       </select>
       </div></div>
       

 </div></div>




 






   <!-- Modal content <div id="myCountsDate" style="width:90%;"> -->
  <div class="modal-contents" style="display:none;">
    <div class="modal-header">
    <h4> <span class="header-title">Add Day</span></h4>
       
     
    </div>
    <div class="modal-body">
      
      
      
      <div   class="div-table">
      
       
      
    
      
    <div class="div-table-row" id="dates_times_row1" >  
       



<div id="popup_hour1"  class="popupDate popup_month_year" style="display:none;" >
<div class="title-head"  >Day  </div>
<input  class="button-white" id="but0" name="but1" type="button" value="00"   onclick="updateTime_full('00',4)"/>

<input  class="button-white" id="but1" name="but1" type="button" value="01"   onclick="updateTime_full('01',4)"/>

 

<input  class="button-white" id="but2" name="but2" type="button" value="02"   onclick="updateTime_full('02',4)"/>
<input  class="button-white" id="but3" name="but3" type="button" value="03"   onclick="updateTime_full('03',4)"/>
<input  class="button-white" id="but4" name="but4" type="button" value="04"   onclick="updateTime_full('04',4)"/>
<input  class="button-white" id="but5" name="but5" type="button" value="05"   onclick="updateTime_full('05',4)"/>
<input  class="button-white" id="but6" name="but6" type="button" value="06"   onclick="updateTime_full('06',4)"/>
<input  class="button-white" id="but7" name="but7" type="button" value="07"   onclick="updateTime_full('07',4)"/>
<input  class="button-white" id="but8" name="but8" type="button" value="08"   onclick="updateTime_full('08',4)"/>
<input  class="button-white" id="but9" name="but9" type="button" value="09"   onclick="updateTime_full('09',4)"/>
<input  class="button-white" id="but10" name="but10" type="button" value="10"   onclick="updateTime_full(10,4)"/>
<input  class="button-white" id="but11" name="but11" type="button" value="11"   onclick="updateTime_full(11,4)"/>
<input  class="button-white" id="but12" name="but12" type="button" value="12"   onclick="updateTime_full(12,4)"/>

<input  class="button-white" id="but13" name="but13" type="button" value="13"   onclick="updateTime_full(13,4)"/>
<input  class="button-white" id="but14" name="but14" type="button" value="14"   onclick="updateTime_full(14,4)"/>
<input  class="button-white" id="but15" name="but15" type="button" value="15"   onclick="updateTime_full(15,4)"/>

<input  class="button-white" id="but16" name="but16" type="button" value="16"   onclick="updateTime_full(16,4)"/>
<input  class="button-white" id="but17" name="but19" type="button" value="17"   onclick="updateTime_full(17,4)"/>
<input  class="button-white" id="but18" name="but18" type="button" value="18"   onclick="updateTime_full(18,4)"/>

<input  class="button-white" id="but19" name="but19" type="button" value="19"   onclick="updateTime_full(19,4)"/>
<input  class="button-white" id="but20" name="but20" type="button" value="20"   onclick="updateTime_full(20,4)"/>
<input  class="button-white" id="but21" name="but21" type="button" value="21"   onclick="updateTime_full(21,4)"/>

<input  class="button-white" id="but22" name="but22" type="button" value="22"   onclick="updateTime_full(22,4)"/>
<input  class="button-white" id="but23" name="but23" type="button" value="23"   onclick="updateTime_full(23,4)"/>
<input  class="button-white" id="but24" name="but24" type="button" value="24"   onclick="updateTime_full(24,4)"/>
 
 
 <input  class="button-white" id="but25" name="but25" type="button" value="25"   onclick="updateTime_full(25,4)"/>
<input  class="button-white" id="but26" name="but26" type="button" value="26"   onclick="updateTime_full(26,4)"/>
<input  class="button-white" id="but27" name="but27" type="button" value="27"   onclick="updateTime_full(27,4)"/>

<input  class="button-white" id="but28" name="but28" type="button" value="28"   onclick="updateTime_full(28,4)"/>
<input  class="button-white" id="but29" name="but29" type="button" value="29"   onclick="updateTime_full(29,4)"/>
<input  class="button-white" id="but30" name="but30" type="button" value="30"   onclick="updateTime_full(30,4)"/>
<input  class="button-white" id="but31" name="but31" type="button" value="31"   onclick="updateTime_full(31,4)"/>
 
 

 
</div>


<!-- MONTH POPUP STARTS HERE -->

<div id="popup_month1"  class="popupDate popup_month_year" style="display:none;"  >
<div class="title-head">Month </div>
<input  class="button-white" id="but0" name="but1" type="button" value="00"   onclick="updateTime_full('00',5)"/>

<input  class="button-white" id="but1" name="but1" type="button" value="01"   onclick="updateTime_full('01',5)"/>

 

<input  class="button-white" id="but2" name="but2" type="button" value="02"   onclick="updateTime_full('02',5)"/>
<input  class="button-white" id="but3" name="but3" type="button" value="03"   onclick="updateTime_full('03',5)"/>
<input  class="button-white" id="but4" name="but4" type="button" value="04"   onclick="updateTime_full('04',5)"/>
<input  class="button-white" id="but5" name="but5" type="button" value="05"   onclick="updateTime_full('05',5)"/>
<input  class="button-white" id="but6" name="but6" type="button" value="06"   onclick="updateTime_full('06',5)"/>
<input  class="button-white" id="but7" name="but7" type="button" value="07"   onclick="updateTime_full('07',5)"/>
<input  class="button-white" id="but8" name="but8" type="button" value="08"   onclick="updateTime_full('08',5)"/>
<input  class="button-white" id="but9" name="but9" type="button" value="09"   onclick="updateTime_full('09',5)"/>
<input  class="button-white" id="but10" name="but10" type="button" value="10"   onclick="updateTime_full(10,5)"/>
<input  class="button-white" id="but11" name="but11" type="button" value="11"   onclick="updateTime_full(11,5)"/>
<input  class="button-white" id="but12" name="but12" type="button" value="12"   onclick="updateTime_full(12,5)"/>

<input  class="button-white" id="but13" name="but13" type="button" value="13"   onclick="updateTime_full('13',5)"/>
<input  class="button-white" id="but14" name="but14" type="button" value="14"   onclick="updateTime_full('14',5)"/>
<input  class="button-white" id="but15" name="but15" type="button" value="15"   onclick="updateTime_full('15',5)"/>
<input  class="button-white" id="but16" name="but16" type="button" value="16"   onclick="updateTime_full('16',5)"/>
<input  class="button-white" id="but17" name="but17" type="button" value="17"   onclick="updateTime_full('17',5)"/>
<input  class="button-white" id="but18" name="but18" type="button" value="18"   onclick="updateTime_full('18',5)"/>
<input  class="button-white" id="but19" name="but19" type="button" value="19"   onclick="updateTime_full('19',5)"/>
<input  class="button-white" id="but20" name="but20" type="button" value="20"   onclick="updateTime_full('20',5)"/>
<input  class="button-white" id="but21" name="but21" type="button" value="21"   onclick="updateTime_full(21,5)"/>
<input  class="button-white" id="but22" name="but22" type="button" value="22"   onclick="updateTime_full(22,5)"/>
<input  class="button-white" id="but23" name="but23" type="button" value="23"   onclick="updateTime_full(23,5)"/>
<input  class="button-white" id="but24" name="but24" type="button" value="24"   onclick="updateTime_full(24,5)"/>


<input  class="button-white" id="but25" name="but25" type="button" value="25"   onclick="updateTime_full('25',5)"/>
<input  class="button-white" id="but26" name="but26" type="button" value="26"   onclick="updateTime_full('26',5)"/>
<input  class="button-white" id="but27" name="but27" type="button" value="27"   onclick="updateTime_full('27',5)"/>
<input  class="button-white" id="but28" name="but28" type="button" value="28"   onclick="updateTime_full('28',5)"/>
<input  class="button-white" id="but29" name="but29" type="button" value="29"   onclick="updateTime_full('29',5)"/>
<input  class="button-white" id="but30" name="but30" type="button" value="30"   onclick="updateTime_full('30',5)"/>
<input  class="button-white" id="but31" name="but31" type="button" value="31"   onclick="updateTime_full('31',5)"/>
<input  class="button-white" id="but32" name="but32" type="button" value="32"   onclick="updateTime_full('32',5)"/>
<input  class="button-white" id="but33" name="but33" type="button" value="33"   onclick="updateTime_full(33,5)"/>
<input  class="button-white" id="but34" name="but34" type="button" value="34"   onclick="updateTime_full(34,5)"/>
<input  class="button-white" id="but35" name="but35" type="button" value="35"   onclick="updateTime_full(35,5)"/>
<input  class="button-white" id="but36" name="but36" type="button" value="36"   onclick="updateTime_full(36,5)"/>




 
 

 
</div>

<!-- YEAR POPUP STARTS HERE -->

<div id="popup_year1"  class="popupDate popup_month_year"  style="display:none;"  >
<div class="title-head"  >Year </div>
<input  class="button-white" id="but0" name="but1" type="button" value="00"   onclick="updateTime_full('00',6)"/>



</div>

<!-- WEEK STARTS HERE -->

<div id="popup_week"  class="popupDate popup_month_year"  style="display:none;"  >
<div class="title-head"  >Week </div>

<input  class="button-white" id="but0" name="but1" type="button" value="00"   onclick="updateTime_full('00',7)"/>


</div>


<!-- HOUR LIST -->
<div id="pop_hrs" style="display:none;">

 
 
<div id="popup_hour_list1"  class=" popupDate" style="display:none;"> 
 
  
  
  </div>


</div>
 
      </div>    
      
      
      
      
      <div class="div-table-row" id="hours_minutes_sec_row">  
      <div id="hoursId" class="div-table-col drop-down-menu" style="width:70px;" >Day: </div>
      <div id="minutesId" class="div-table-col  drop-down-menu" style="width:70px;" >Month: </div>
      
       <div  id="seconds"class="div-table-col drop-down-menu" style="width:50px;">Year: </div>
       <div  id="week_txtAdd"class="div-table-col drop-down-menu" style="width:56px;">Week: </div>
       
       
        <div  id="week"class="div-table-col drop-down-menu week-text" style="width:100px; color:#3C8DBC;">Add/Subtract </div>
      </div>
      
      <div class="div-table-row" id="hours_minutes_sec_row_txt">  
      <div id="hoursId" class="div-table-col  drop-down-menu" style="width:55px;"  >
     
  <input id="txtEndDay" type="text" class="form-control" name="txtEndDay"   value="{{ old('txtEndDay') }}" required autofocus autocomplete="off" style=" text-align:left; width:50px;" onclick="txtTimeEndPopUp()" placeholder="00"  >  
  </div>
   <div id="minutesId" class="drop-down-menu div-table-col" style="width:5px; font-weight:bold; line-height:40px;" > /</div>
   
   
      <div id="minutesId" class="drop-down-menu div-table-col" style="width:55px;" >
      <!-- <span class="custom-select" style="width:100%; height:auto;">-->
   <input id="txtEndMonth" type="text" class="form-control" name="txtEndMonth"   value="{{ old('txtEndMonth') }}" required autofocus autocomplete="off" style=" text-align:left; width:50px;" onclick="txtMonthEndPopUp()" placeholder="00"  >
  </div>  
  
  <div id="minutesId" class="drop-down-menu div-table-col" style="width:5px; font-weight:bold; line-height:40px;" > /</div>
  
  <div id="seconds" class="div-table-col  drop-down-menu" style="width:55px;">
      <!-- <span class="custom-select" style="width:100%; height:auto;">-->  
   <input id="txtEndYear" type="text" class="form-control" name="txtEndYear"   value="{{ old('txtEndYear') }}" required autofocus autocomplete="off" style=" text-align:left; width:50px;" onclick="txtYearEndPopUp()" placeholder="00"   >
  </div>
  
   <div id="seconds" class="div-table-col  drop-down-menu" style="width:55px;">
  
  <input id="txtEndWeek" type="text" class="form-control" name="txtEndWeek"   value="{{ old('txtEndWeek') }}" required autofocus autocomplete="off" style=" text-align:left; width:50px;" onclick="txtWeekEndPopUp()" placeholder="00"  ></div>
    
  
      
      
      
    <div id="week-text" class="div-table-col  drop-down-menu week-text" style="width:90px;">
  
   <select name="cls" class="lst-menu " id="cls" style="width:100px;" onchange="updateListBox('Desktop')" >
     
    <option value="Add">(+) Add</option>
    <option value="Subtract">(-) Subtract</option>
      
       </select></div>
    
  
      </div>
      
      
      
      
      
      
     <div class="div-table-row">  
      <div class="div-table-col" style="display:none;"><a href="javascript:void(0)"onclick="generate_Date('end')">Today</a> </div>
       
         <div class="div-table-col" style="display:block;">&nbsp;  </div>
       
      </div>
      
        
      
   
 
      
    </div>
   </div>
   
   
   
     
    
   

</div>








 


<div id="error-time" class="mainbody" style="text-align:center; color:red;"> </div>






<div class="mainbody" style="text-align:center; display:none;" ><label class="container" > 
  <input type="checkbox" checked="checked" id="chk"  value="1">&nbsp;<span  style="font-size:13px;">Include end date in calculation(1 day is added)</span>
  <span class="checkmark5"></span>
</label> </div>
                <div class="timeBut" style="margin-top:4px;display:none;">

 
 

 
 <nav id="nav" role="navigation" style="position:relative; margin-top:10px; text-align:center; margin-left:40px; ">
	 
	<ul class="clearfix">

  <li id="reset_but" style="margin-right:10px;display:none;" > <input class="pauseButton btn btn-warning btn-lg mb-1" type="submit" name="butPause" id="reset" value="Reset"   /> 
 </li>
 <li style="display:none;"> <input class="pauseButton btn btn-primary btn-lg mb-1" type="submit" name="butEdit" id="edit" value="Edit"  />
 <input name="" type="hidden" id="setTime" /> 
 </li>
       
  
  <li id="pause_but" style="display:none;" >
    
  <input  class="stopButton btn btn-danger btn-lg mb-1 " type="submit" name="stop" id="pause" value="Stop"   />
 </li>
  
 <li  id="resume_but" style="display:none;">
  <input class="pauseButton btn btn-success btn-lg mb-1 "  type="submit" name="resume" id="resume" value="Resume" /> 
  </li>
  
    
   
  <li id="butSubmit" >
   <input class="pauseButton btn btn-success btn-lg mb-1"  type="submit" name="button" id="button" value="Calculate Duration" style="z-index:-2;"   onclick="count_days()"  /> 
   
    </li>
   </ul></nav>
  
  
 
 </div>
 
   <div id="rst"  style="margin-top:10px; text-align:left; margin-left:40px;" class="mainbody"> </div>
   
   
   
</div>



<!-- POPUP STARTS HERE -->

<audio id="myAudio" controls loop  class="hide_question" >
<source id="audioSource"  src=""  type="audio/mpeg" />
</audio>








<!-- END OF FIRST PHASE -->


<!-- SECOND PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
    
<div id="main2" class="card mb-5 mainDiv" style="margin-top:-28px; display:inline-block; min-width:88%;display:none;" >


 
 
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
 
 
   
<div id="main6" class="mainDiv card mb-5" style="margin-top:-28px; display:inline-block;  min-width:88%;display:none;" >
  <div  id="title-head" class="title-head">Advert </div>
 <br />
 <div id="list-button">
 




  
 </div>

  
</div>




<!-- SEVENTH PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
 
   
<div id="main7" class="mainDiv card mb-5" style="margin-top:-28px; display:none; min-width:88%;" >
  <div  id="title-head3" class="title-head">Set Timer Minutes  </div>
 <br />
 <div id="list-button-minutes">
 




  
 </div>

  
</div>

 
  
    






<!-- FOURTH PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
    
<div id="main4" class="card mb-5 mainDiv" style="margin-top:-28px;display:inline-block; min-width:88%; display:none;" >

 <div  id="title-head2" class="title-head">How to use the online Count Day's </div>
<div  id="text-main" class="mainbody">
  Set the hour, minute, and second for the online countdown timer, and start it. Alternatively, you can set the date and time to count days, hours, minutes, and seconds till (or from) the event. The timer triggered alert will appear and the pre-selected sound will be played at the set time.

When setting the timer, you can click the "Test" button to preview the alert and check the sound volume.

Click the "Reset" button to start the timer from the initial value. Click the "Stop" ("Start") button to stop (start) the timer.

You can add links to online timers with different time settings to your browser's Favorites. Opening such a link will set the timer to the predefined time.

In the holiday list you can launch a countdown timer for any holiday on the list, or you can create a new timer for your own event or holiday. Make sure to share your timer with your friends.</div>
</div>



<!-- ThIRD PHASE STARTS HERE -->

<div style="clear:both;"> </div>
 
 
   
<div id="main3" class="mainDiv card mb-5 mainbody" style="margin-top:-28px; display:inline-block; min-width:88%;display:none;" >
 <div >Contact Us </div>
 <br />
 
 <!-- BUTTON LIST IS IN HERE -->
 
 

 <div id="list-button-hour">
 
 
 </div>
 
  
</div>





<!-- FIFTH PHASE STARTS HERE -->

  
    
<div id="main5" class="card mb-5 mainDiv " style="margin-top:-28px; display:none;  min-width:88%;" >

  
</div>


 

<div  id="footer1" class=" card mb-5 mainDiv"   style="margin-top:0px;" >
<span class="mainbody">
  <div  id="footer"class="footer">Copyright ©2019 timeer.com All Rights Reserved.</div>

   </span>
  </div>  
 
 </div>
 
 
 
 <!-- POPUP SCRIPT STARTS HERE -->
 
 <script>
 
 $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},}); 	

 
 
// Get the modal
var modal = document.getElementById("myModal");


//console.log(modal);
  
// Get the button that opens the modal
var btn = document.getElementById("edit");


//var btnCancel = document.getElementById("btnCancel");
 
 

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var endDates = document.getElementsByClassName("close")[0];

var spanAlarm = document.getElementsByClassName("closeAlarm")[0];



// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  //modal.style.display = "none";
  
   document.getElementById('popup_year1').style.display='none';
document.getElementById('popup_hour1').style.display='none';
   document.getElementById('popup_month1').style.display='none';
   
   document.getElementById('popup_year').style.display='none';
document.getElementById('popup_hour').style.display='none';
   document.getElementById('popup_month').style.display='none';
  document.getElementById('popup_week').style.display='none';
  
 
  
}


/*
btnCancel.onclick = function() {
  modal.style.display = "none";
  
  stopAudio();
  
}
*/
 
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
 
//var spanAlarm = document.getElementsByClassName("closeAlarm")[0];


 
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
	 document.getElementById('txtCheck_Date').value="";
	 
	 document.getElementById('date').value="";
	  document.getElementById('time').value="";
	 
   
  playAudio();
}

/*PLAYING FROM LINK */


 






// When the user clicks on <span> (x), close the modal
/*
spanAlarm.onclick = function() {
	 
	 modalAlarm.style.display = "none";

  stopAudio();
  
})*/

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
	
	document.getElementById('edit').style.display="block";
	document.getElementById('setUp').style.display="block";
	
	
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
	 
	 document.getElementById('lstHour').selectedIndex = 0;
	 document.getElementById('lstMinutes').selectedIndex = 0;
	 
	 document.getElementById('lstSeconds').selectedIndex = 0;
	 
	 
	  document.getElementById('txtCheck_Date').value="";
	 
	 document.getElementById('date').value="";
	  document.getElementById('time').value="";
	 
	// location.reload(document.getElementById('currentTime'));	
	 
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
	
	document.getElementById('main3').style.display="none";
	document.getElementById('main4').style.display="none";
	document.getElementById('main5').style.display="none";
	
	document.getElementById('main6').style.display="none";
	document.getElementById('main7').style.display="none";
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
	
	document.getElementById('main3').style.display="block";
	
	
	
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
	
	
	//var GuiTimer = $('#countdown');
    
    var GuiTimer = $('#currentTime');
     var GuiPause = $('#pause');
    var GuiResume = $('#resume').hide();
	var count_ctr=0;
	var setTimeId;
   
	 var GuiPlay1 = $('#button');
	 
	
    var Running = true;
    
    var UpdateTimer = function() {
        // Run till timeout
		
		// Current_Date();
		
        if( CurrentTime + TimeGap < EndTime ) {
          setTimeId=  setTimeout( UpdateTimer, TimeGap );
			  
			
        }
        // Countdown if running
		
		 
		
		 if( CurrentTime + TimeGap == EndTime ) {
			 
			 
			var status= document.getElementById('optionB').value;
			//console.log('Runing status: '+status);
			
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
			 // console.log('loop hour: '+lstHour);
			  
			 if(lstHour=="Select")
			{
		  
				lstHour =document.getElementById('hr_s').value;
				lstMinutes =document.getElementById('min_s').value;
		
	 
			}
			  
			  document.getElementById("alarmTime").innerHTML= lstHour+':'+lstMinutes;
			  
			  /*LOOPING THE TIME */
			  
			  //restartTime();
			 
		}	
			 
        if( Running ) {
			
			//GuiTimer.css('color','black');
            CurrentTime += TimeGap;
            if( CurrentTime >= EndTime ) {
               // GuiTimer.css('color','red');
				document.getElementById('resume_but').style.display="none";
				document.getElementById('pause_but').style.display="none";
				
				
				
				
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
		
		  
	 var lstHour =document.getElementById('lstHour').value;
  	var lstMinutes =document.getElementById('lstMinutes').value;
 	var lstSeconds =document.getElementById('lstSeconds').value;
 	
	 if(lstHour==00 && lstMinutes ==00 && lstSeconds ==00 )
	 {
	     lstHour =document.getElementById('hr_s').value;
 
	  lstMinutes =document.getElementById('min_s').value;
 	  lstSeconds =document.getElementById('sec_s').value;
 	   
	  }
		  
		  
			  
			  
		var Hours = Time.getHours();
        var Minutes = Time.getMinutes();
        var Seconds = Time.getSeconds();
		
		//var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		//console.log('Hour: '+Hours);
		 var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var s = Math.floor((distance % (1000 * 60)) / 1000);
		
		
		 
		/* UPDATE FONT DURING ZOOMING OF FONT */
		 
		 
		var c =document.getElementById('txtFont').value
		 
		 
		 var avarter="<span id='tm' class='material-icons time-set-up' style=font-size:"+c +";> av_timer </span> ";
		   
		 var font= "<span class=rstclass style=font-size:"+c +"; text-align:center;font-family:monospace; > ";
		
		
		var check_ctr =0;
		
		 //GuiTimer.html(font);
		  if(lstHour >= 24)
		{
	 	   GuiTimer.html(font+
		   //GuiTimer.html(font+
		     days+ "<span style='font-size:30px'; class='timeSize'>  Day </span> "+
		    (h < 10 ? '0' : '')+ h
		 
		    + ':' 
              + (m < 10 ? '0' : '') + m 
            + ':' 
            + (s < 10 ? '0' : '') + s  +"</span>" );
			
			check_ctr=1;
			
		}	
		 if(lstHour <24)
		{
	 	   GuiTimer.html(font+
		   //GuiTimer.html(font+
		    // days+ "  Day  "+
		    (h < 10 ? '0' : '')+ h
		 
		    + ':' 
              + (m < 10 ? '0' : '') + m 
            + ':' 
            + (s < 10 ? '0' : '') + s  +"</span>" );
			
			check_ctr=1;
			
		}	
      
	 
	  if(lstHour ==0 )
		{
	 	   GuiTimer.html(font+
		    
               (m < 10 ? '0' : '') + m 
            + ':' 
            + (s < 10 ? '0' : '') + s  +"</span>" );
			
			check_ctr=1;
			
		}	
		
		
		 if(document.getElementById('txtCheck_Date').value !="")
		{
	 	   GuiTimer.html(font+
		   //GuiTimer.html(font+
		     days+ "<span style='font-size:30px'; class='timeSize'>  Day </span>  "+
		    (h < 10 ? '0' : '')+ h
		 
		    + ':' 
              + (m < 10 ? '0' : '') + m 
            + ':' 
            + (s < 10 ? '0' : '') + s  +"</span>" );
			
			//console.log("inside checker ctr"); 
			
		}	
		
		console.log('list Hour'+lstHour);
		
     };
	 
	 
	 
		
	 
	 if (distance < 0) {
    clearTimeout(setTimeId);
	GuiTimer.html(font+ 
	"00:00:00");
	activateAlarm();
    
  }
	 
	 
	}
	 
    
    var Pause = function() {
        Running = false;
        GuiPause.hide();
          
		   document.getElementById('resume_but').style.display="block";
		   document.getElementById('pause_but').style.display="none"; 
		   $('#resume').show();
		   
		 $('#GuiResume').show(); 
		  
		$('#edit').show();
		  
		
		if(document.getElementById('txtCheck_Date').value =="")
		{
		$('#reset').show();
		}
				$('#pause').hide();
		// $('#button').show();
		
	    
    };
    
    var Resume = function() {
        Running = true;
        GuiPause.show();
        GuiResume.hide();
		 
		document.getElementById('pause_but').style.display="block"; 
		
    };
	
	  
	
	
	
	 Stop = function( ) {
		
		 
		 
       clearTimeout(setTimeId);
	   
	  // $('#button').show()
		 
		
		var tm= document.getElementById('setTime').value;
		
		$('#button').show();
		clearInterval(TimeGap);
		
		$('#button').show();
		$('#edit').show();
		 //GuiResume.show();
		 
		$('#reset').show();
		 
		
		$('#pause').hide();
		
		 document.getElementById('resume_but').style.display="none"; 
		 document.getElementById('pause_but').style.display="none"; 
		 document.getElementById('butSubmit').style.display="block"; 
		  document.getElementById('button').style.display="block"; 
		  GuiPause.hide();
		 
		 
    };

	
	
	
	
    var Start = function( Timeout ) {
		
		 
			  Running = true;
       
		
        CurrentTime = ( new Date() ).getTime();
		
		var CurrentTime_old= parseInt(document.getElementById('txtNow').value);
		
		var diffCurrent_Time=CurrentTime-CurrentTime_old;
		
		 console.log('Diff Current Time: '+diffCurrent_Time);
		 
		 TimeOut = Timeout+diffCurrent_Time;
		
		
		 EndTime = CurrentTime + TimeOut ;
        //EndTime = ( new Date() ).getTime() + TimeOut ;
		
        UpdateTimer();
		
		 $('#button').hide();
		 
		 $('#edit').show();
		 
		  $('#pause').show();
		 
		 
		  document.getElementById('pause_but').style.display="block"; 
		 
		
		 
		
		 //console.log('counter CTR :'+count_ctr);
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
 
  

 
 //restartTime();




function caculateDate(lstHour,lstMinutes,lstSeconds)

{
	
	 
	
	 CountDown.Stop();
	
	
	 staticTime();
	
	 myLoop();
	 
	 
	var n =0;
	 
	 
	document.getElementById('edit').style.display="none";
	
	//document.getElementById('setUp').style.display="none";
	
	 $("#setUp").html("<span style='font-size:27px; color:#C1C1C1;'>Timer </span>");
	
	
	 	 
	 
		document.getElementById('main2').style.display='none';
	//document.getElementById('main2').style.display='block';
	
	
	document.getElementById('optionB').value="Runing";
	
	
	 var hrInt=parseInt(lstHour);
	  var minInt=parseInt(lstMinutes);
	  
	 var secInt=parseInt(lstSeconds);
	
	 
	  document.getElementById('time_setUp').innerHTML=" <i class='material-icons'><span id='tsp' class='time-set-up'> access_alarms </span></i> &nbsp;"+ lstHour+":"+lstMinutes+":"+lstSeconds;
	 	   
	   //document.getElementById('currentTime').style.fontSize="80px";
	  
	  var cur =document.getElementById('currentTime');
	var style =window.getComputedStyle(cur,null).getPropertyValue('font-size');
	
	var style=parseFloat(style)
	 
	if(style==130)
	{
	   
	   //cur.style.fontSize=(style-50)+'px';
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
    
	 to_day= new Date();
	 var dd = to_day.getDate();
	 var mm = to_day.getMonth()+1;
	 var yy =to_day.getFullYear();
	 
	 var fullYear=mm+"/"+dd+"/"+yy+" "+hrInt+":"+minInt+":"+secInt;
	  
	 
	 
	 //var full_Date = new Date(fullYear).;
	 
	 console.log(fullYear);
	 
   var today = new Date();
   
   
    var todayAdd = new Date();
	
	console.log('Int Hour: '+hrInt);
	
	var addHours=today.getHours()+ hrInt;
	
	var addMins=today.getMinutes()+ minInt;
	
	var addSecs=today.getSeconds()+ secInt;
 
 

       today.setHours(addHours);
	    today.setMinutes(addMins);
		 today.setSeconds(addSecs);

 
	 
	 
 
 var now = new Date().getTime();
	   
		var countDownDt=today.getTime()
		
		 
		
		
		
		
		
		
		dateDiff=countDownDt - now;
		
		document.getElementById('txtNow').value=now;
		
		 var date_split=document.getElementById('txtCheck_Date').value;
		 
		 if(date_split !="")
		 {
			 activateTimer_date();
		  }
		
		else
		{
          CountDown.Start(dateDiff);
        }
 
 }
 
 /* PAUSE LOOP FOR TIME SET */
  var i=1;
 function myLoop()
 {
	 
	
	 setTimeout(function()
	 {
		 
		 i++;
		 if(i <10)
		 {
			 myLoop();
		 }
	 },3000)
 
}
 
 
 
/* SEND TIME AND DATE VARIABLES */ 
function sendVarables()
{
 
 		document.getElementById('resume_but').style.display="none"; 
		 document.getElementById('pause_but').style.display="none"; 
		 document.getElementById('butSubmit').style.display="block"; 
		  document.getElementById('button').style.display="block"; 
 
    var lstHour =document.getElementById('lstHour').value;
  	var lstMinutes =document.getElementById('lstMinutes').value;
 	var lstSeconds =document.getElementById('lstSeconds').value;
 	
	 if(lstHour==00 && lstMinutes ==00 && lstSeconds ==00 )
	 {
	     lstHour =document.getElementById('hr_s').value;
 
	  lstMinutes =document.getElementById('min_s').value;
 	  lstSeconds =document.getElementById('sec_s').value;
 	   
	  }
	 caculateDate(lstHour,lstMinutes,lstSeconds) 
 
 
 
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
  
  
    //var currentTime= nowDate.getHours() +":"+ nowDate.getMinutes()+":"+ nowDate.getMilliseconds(); 
   
    var currentTime= nowDate.getHours() +":"+ nowDate.getMinutes()+":"+ nowDate.getSeconds(); 
	
	
	 
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
	 
	// $("#dt").html(Curent_Date);
	  }
	  
	  
	   /* I WILL BE HANDDLING 24 HOURS DISPLAY HERE */
	  if(dateFormat==0)
	  {
	//  document.getElementById("currentTime").innerHTML=nowDate.toString();
	  
	  var str = nowDate.toString();
	 var monthDate =str.substring(0,15)
	 
	 //console.log('Substring :'+monthDate);
	 
	  var TimeDate =str.substring(15,24)
	  
	  
	  
	//  console.log('Substring Time :'+TimeDate);
	   document.getElementById("currentTime").innerHTML=TimeDate;
	  
	  
	   //$("#dt").html(monthDate);
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

 
 
 
 

function updateTime(time,status)
{
 	 
	
		
		document.getElementById('lstHour').selectedIndex = 0;
	 document.getElementById('lstMinutes').selectedIndex = 0;
	 
	 document.getElementById('lstSeconds').selectedIndex = 0;
	
	 
	 
    var font= "<span class=rstclass style=font-size:"+c +"; text-align:center; > ";
	
  
				 $("#setUp").html("<span style='font-size:27px; color:#C1C1C1;'>Set Timer for "+ time +"</span>"); 
				 
				
				 
				 
				 if(status=="Hour")
				 {
				  document.getElementById('hr_s').value=time
				  //document.getElementById("hr").innerHTML=data.hrs;
				 }
				 
				 
				 if(status=="Minute")
				 {
				 document.getElementById("min_s").value=time;
				 }
				 
				 
				 if(status=="Second")
				 {
				  document.getElementById("sec_s").value=time;
				 }
				 document.getElementById('setUp').style.display="block";
				 
				 document.getElementById('resume_but').style.display="none"; 
		 document.getElementById('pause_but').style.display="none"; 
		 document.getElementById('butSubmit').style.display="block"; 
		  document.getElementById('button').style.display="block"; 
		  
		  
		  
		   
		   /* Date popup option */
  document.getElementById('txtCheck_Date').value="";
	 
	 document.getElementById('date').value="";
	  document.getElementById('time').value="";
		   
		  
		   CountDown.Stop();
				 
				   scrolling(); 
				
				staticTime();
          
	 
	

}




/* SCROLLING TO TOP OF PAGE */
function scrolling()
{
	 
	$('html,body').animate({scrollTop:20},'0');
	 
	document.body.style.transition=".5s";
	
 
}

 

/* GENERATE SECONDS BUTTON */

function generateSeconds()
{
  var sec =60;
  var ctr =0
  var option="";
  var eq='"';
  while(ctr <  60)
  {
	if(ctr <10)
	{
	 option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-light-blue spacing-button' value='0"+ctr+"&nbsp; Second Timer'  onClick="+ eq +"updateTime('0"+ctr+"','Second')"+ eq +"/>"
	 
	}
	else
	{
		option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-light-blue spacing-button' value='"+ctr+"&nbsp; Second Timer'  onClick="+ eq +"updateTime('"+ctr+"','Second')"+ eq +"/>"
	}	 
	ctr++;  
}  
 $("#list-button").html(option); 
  
}


/* GENERATE MINUTES BUTTON */

function generateMinutes()
{
  var sec =60;
  var ctr =0
  var option="";
  var eq='"';
  while(ctr <  60)
  {
	if(ctr <10)
	{
	 option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-light-blue spacing-button' value='0"+ctr+"&nbsp; Minute Timer'  onClick="+ eq +"updateTime('0"+ctr+"','Minute')"+ eq +"/>"
	 
	}
	else
	{
		option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-light-blue spacing-button' value='"+ctr+"&nbsp; Minute Timer'  onClick="+ eq +"updateTime('"+ctr+"','Minute')"+ eq +"/>"
	}	 
	ctr++;  
}  
 $("#list-button-minutes").html(option); 
  
}



/* GENERATE HOUR BUTTON */


function generateHour()
{
  var sec =60;
  var ctr =0
  var option="";
  var eq='"';
  while(ctr <  60)
  {
	if(ctr <10)
	{
	 option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-light-blue spacing-button' value='0"+ctr+"&nbsp; Hour Timer'  onClick="+ eq +"updateTime('0"+ctr+"','Hour')"+ eq +"/>"
	 
	}
	else
	{
		option +="<input name='but1' id='but"+ ctr +"'  type='button' class='button-light-blue spacing-button' value='"+ctr+"&nbsp; Hour Timer'  onClick="+ eq +"updateTime('"+ctr+"','Hour')"+ eq +"/>"
	}	 
	ctr++;  
}  
 //$("#list-button-hour").html(option); 
 
 //generateSeconds();
  //generateMinutes();
  
 /* HIDE DATE AND TIME POPUP */
 
 document.getElementById('popup_hour').style.display='none';
 document.getElementById('pop_hrs').style.display='none';
 
 document.getElementById('main2').style.display='none';
 
 
  
}



function staticTime()
{
	
	//var distance =Time.setTime( EndTime - CurrentTime );
		
		  var lstHour =document.getElementById('lstHour').value;
  	var lstMinutes =document.getElementById('lstMinutes').value;
 	var lstSeconds =document.getElementById('lstSeconds').value;
 	
	 if(lstHour==00 && lstMinutes ==00 && lstSeconds ==00 )
	 {
	  
	     lstHour =document.getElementById('hr_s').value;
 
	  lstMinutes =document.getElementById('min_s').value;
 	  lstSeconds =document.getElementById('sec_s').value;
 	   
	 } 
		  
		  
		  
		 
			  
	/*		  
		var Hours = Time.getHours();
        var Minutes = Time.getMinutes();
        var Seconds = Time.getSeconds();
		
		*/
		
		 var today = new Date();
   
   
    var todayAdd = new Date();
	
	//console.log('Int Hour: '+hrInt);
	
	var hrInt=parseInt(lstHour);
	  var minInt=parseInt(lstMinutes);
	  
	 var secInt=parseInt(lstSeconds);
	
	var addHours=today.getHours()+ hrInt;
	
	var addMins=today.getMinutes()+ minInt;
	
	var addSecs=today.getSeconds()+ secInt;
 

       today.setHours(addHours);
	    today.setMinutes(addMins);
		 today.setSeconds(addSecs);

 
	 
	 
 
 var now = new Date().getTime();
	   
		var distance="";
		
		 
		
		 var count_down=today.getTime()
		
		
		distance=count_down - now;
		
		
		//var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		//console.log('Hour: '+Hours);
		 var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var s = Math.floor((distance % (1000 * 60)) / 1000);
		
		
		 
		/* UPDATE FONT DURING ZOOMING OF FONT */
		 
		 
		var c =document.getElementById('txtFont').value
		 
		 
		 var avarter="<span id='tm' class='material-icons time-set-up' style=font-size:"+c +";> av_timer </span> ";
		   
		 var font= "<span class=rstclass style=font-size:"+c +"; text-align:center; font-family:monospace; > ";
		
		 //GuiTimer.html(font);
		  if(lstHour >= 24)
		{
	 	   $('#currentTime').html(font+
		   //GuiTimer.html(font+
		     days+ "<span style='font-size:30px'; class='timeSize'>  Day </span> "+
		    (h < 10 ? '0' : '')+ h
		 
		    + ':' 
              + (m < 10 ? '0' : '') + m 
            + ':' 
            + (s < 10 ? '0' : '') + s  +"</span>" );
			
		}	
		 if(lstHour <24)
		{
	 	  $('#currentTime').html(font+
		   //GuiTimer.html(font+
		    // days+ "  Day  "+
		    (h < 10 ? '0' : '')+ h
		 
		    + ':' 
              + (m < 10 ? '0' : '') + m 
            + ':' 
            + (s < 10 ? '0' : '') + s  +"</span>" );
			
		}	
      
	 
	  if(lstHour ==0 )
		{
	 	   $('#currentTime').html(font+
		    
               (m < 10 ? '0' : '') + m 
            + ':' 
            + (s < 10 ? '0' : '') + s  +"</span>" );
			
			
		}
		
		
		
		
			
     };


</script>


<script>


/* DATE PICKER STARTS HERE */
function callDatePicker(id)
{
	var opt='';
	if(id==1)
	{
		opt="#picker";
	}
	if(id==2)
	{
		opt="#picker1";
	}
	console.log('Id'+id);
const picker = new WindowDatePicker({
	  el:opt, 
	toggleEl:'#toggle',
	 showArrowButton:true,
	showButtons: true,
	inputEl:'#txtPicker'  
	
	
});
//console.log(picker);

picker.el.addEventListener('wdp.open', () => {
 // console.log('open');
});

picker.el.addEventListener('wdp.close', () => {
  
   
    updateButton(id)
 
   
});
picker.el.addEventListener('wdp.save', () => {
  //console.log('When picker save');
  //updateButton(id);
});


picker.el.addEventListener('wdp.cancel', () => {
  //console.log('When picker cancel');
  updateButton(id);
});


picker.el.addEventListener('wdp.change', () => {
  //console.log('When picker change');
   
    
	var d=document.getElementById('txtPicker').value.substring(0,2)
	var m=document.getElementById('txtPicker').value.substring(3,5)
	var y=document.getElementById('txtPicker').value.substring(6,10)
  //picker.get();
  
  if(id==1)
  {
  document.getElementById('time').value=d;
   document.getElementById('txtStartMonth').value=m;
    document.getElementById('txtStartYear').value=y;
     
 
 }
 
  if(id==2)
  {
  document.getElementById('txtEndDay').value=d;
   document.getElementById('txtEndMonth').value=m;
    document.getElementById('txtEndYear').value=y;
    
	  
 
 }
//$('#picker').html(option);
updateButton(id);

  picker.close();
  
});


picker.el.addEventListener('wdp.destroy', () => {
  //console.log('When picker destroy');
});


picker.get();
picker.open();
picker.close();
//picker.toggle();
picker.save();
  
//picker.destroy();

}
/*
 picker = new WindowDatePicker({
	el:'#picker',
	toggleEl:'#toggle',
	inputEl:'#txtStartYear',
	type: 'HOUR'
});
*/

function updateButton(id)
 {
	 if(id==1)
  {
   
    
	  var option="<div id='picker' class='div-table-col' style='width:40px;'><button id='toggle' onclick='callDatePicker(1)' class='button-image' ><i class='fas fa-calendar-alt' ></i></button> </div>";
	
	//var option="<button id='toggle' onclick='callDatePicker()' class='button-image' ><i class='fas fa-calendar-alt' ></i></button>" 
	  
 $('#picker_main').html(option);
 
 }
 
  if(id==2)
  {
   
    
	  var option="<div id='picker1' class='div-table-col' style='width:40px;'><button id='toggle2' onclick='callDatePicker(2)' class='button-image' ><i class='fas fa-calendar-alt' ></i></button> </div>";
	
	//var option="<button id='toggle' onclick='callDatePicker()' class='button-image' ><i class='fas fa-calendar-alt' ></i></button>" 
	  
 $('#picker_main1').html(option);
 
 }


}
 
 function setDatePickerNull()
 {
 var picker = new WindowDatePicker({
	value: null,
	el: null,
	toggleEl: null,
	inputEl: null,
	type: 'DATE',
	dateType:"DD/MM/yyyy",
	allowEmpty: true,
	showButtons: false,
	inputToggle: false,
	lang: 'en',
	orientation:false,
	showArrowButton:false
});
}

 


</script>


<!-- INSTANT LOADING OF HOUR -->



<script src="../js/jquery-3.4.1.js"></script>
 
 <script src="../timer/js/dropdown.js"> </script>
  

   
</body>
</html>
