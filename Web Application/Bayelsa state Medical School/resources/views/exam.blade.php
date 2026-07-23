 
 
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
 <title>Exam</title>


 
<link href="exam/css/template.css" rel="stylesheet" type="text/css" />
<link href="exam/css/button.css" rel="stylesheet" type="text/css" />


<link href="exam/css/cal.css" rel="stylesheet" type="text/css" />
  
  
  <meta name="_token" content="{!! csrf_token() !!}"/>
 <style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #DCEDF7;
}

 p		
{
	font-size: 14px;
	LINE-HEIGHT: 150%;
	FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
	color:#1E2C2C;
	 
	 
	
}
</style>
 
<link href="exam/css/template.css" rel="stylesheet" type="text/css" />

<link href="exam/css/style.css" rel="stylesheet" type="text/css" />
 
 
         <link href="exam/css/style3.css" rel="stylesheet" type="text/css" />
         
         

   
 <script>
// Set the date we're counting down to

 
 
function timer()
{
	var newHour= '<?= trim($Student['examDuration']); ?>'
	var nowDate = new Date();
	 
	 
	 var timeParts = newHour.split(":");
	var addHours= parseInt(timeParts[0]);
	var addMinutes=  parseInt(timeParts[1]);
	
	console.log('Hour: '+addHours);
	 
   // var listMonth=["January","February","March","April","May","June","July","August","September","October","November","December"];
   var listMonth=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
   
    var listMonths=["01","02","03","04","05","06","07","08","09","10","11","12"];
   
   //CALCULATING THE  DATE WITH REFERENCE TO YEAR MONTH DAY AND TIME
   
    var fullYear=nowDate.getFullYear();
	 var currentDate=nowDate.getDate();
	  var currentMonth=listMonth[nowDate.getMonth()];
	  var currentHour=nowDate.getHours()+ addHours;
	  var currentMinutes=nowDate.getMinutes()+ addMinutes;
	   var zeroSeconds= nowDate.getSeconds() + 55;
	   
	   var TestCurrentMonth =nowDate.getMonth();
	    var cntDate=nowDate.getDate();
	  
	   var mnth= listMonths[nowDate.getMonth()];
	   
	   nowDate.setHours(currentHour);
	    nowDate.setMinutes(currentMinutes);
		 nowDate.setSeconds(zeroSeconds);
	   
	   
	   console.log('Current Hour: '+currentHour);
	    
		console.log('Now Date: '+ nowDate);
		var countDownDt=nowDate.getTime();
		console.log('Millisecondes Date: '+ countDownDt);
 
	   
	  var countDownDate= countDownDt;
	  
	    

 var time = new Date();
  /* THE ADDED DATE HOUR WILL BE ASSIGNED FROM DATABASE. USING PHP  */
  
  
  
 
  

// Update the count down every 1 second

var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
   

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
 // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
 // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
 // + minutes + "m " + seconds + "s ";
//console.log(hours);
 document.getElementById("timerId").innerHTML ="<strong >Time: "+  hours + " : "
  + minutes + " : " + seconds + " </strong>";


  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timerId").innerHTML = "EXPIRED";
	 
	rstTimberSubmit();
  }
}, 1000);
window.x=x;
}
</script>
 
<script language="javascript">

 function registerPage()
 {
  //document.getElementById('instruction').className="hide_question";
   //document.getElementById('inst').className="hide_question";
   //document.getElementById('read').className="hide_question";
	document.getElementById('container_search').className="hide_question";
	
	document.getElementById('container_instruction').className="hide_question";
	
	  	document.getElementById('container_search_fName').className="hide_question";	
		  
			document.getElementById('container_registration').className="show_question";  
	    document.getElementById('submitSt').className="show_question";
		stLogin();
 }
   function profileStudent()
 {
	  
 // document.getElementById('instruction').className="hide_question";
 // document.getElementById('inst').className="hide_question";
  // document.getElementById('read').className="hide_question";
  document.getElementById('txtPassword').value='';
  
 
  
  
  
   document.getElementById('container_registration').className="hide_question"; 
   document.getElementById('container_instruction').className="hide_question";
	
	document.getElementById('container_search_fName').className="hide_question";

		document.getElementById('container_search').className="show_question";  		
	  
	    document.getElementById('profile').className="show_question";
		 document.getElementById('txtSearchStudent').value='';
		
		stLogin();
 }
 
 
 
function searchFName()
{
	
	document.getElementById('container_registration').className="hide_question"; 
   document.getElementById('container_instruction').className="hide_question";
	

		document.getElementById('container_search').className="hide_question";  		
	  
	    document.getElementById('profile').className="hide_question";
		
		document.getElementById('container_search_fName').className="show_question";
		
		document.getElementById('searchFName').className="show_question";
		
		
		stLogin();
	
}
 
   function clickStart()
 {
  document.getElementById('profile').className="hide_question";
   document.getElementById('submitSt').className="hide_question";
   
	document.getElementById('container_instruction').className="hide_question";
	document.getElementById('container_registration').className="hide_question"; 

		document.getElementById('container_search').className="hide_question";  		
	
	document.getElementById('container_search_fName').className="hide_question";
   		  
	    document.getElementById('start').className="show_question";
		
		
 }
  function exam_start()
 {
	 document.getElementById('container_text').className="show_question";
	 
	  document.getElementById('start').className="hide_question";
	 timer();
	  setFocusToTextBox();
 }
 
 function backInstruction()
 {
	  document.getElementById('profile').className="hide_question";
	  document.getElementById('container_registration').className="hide_question"; 

		document.getElementById('container_search').className="hide_question"; 
		document.getElementById('container_search_fName').className="hide_question"; 		
	
	  
	// document.getElementById('instruction').className="show_question";
	 document.getElementById('container_instruction').className="show_question";
	
  //document.getElementById('inst').className="show_question";
   //document.getElementById('read').className="show_question";
   document.getElementById('fName').value="";
    document.getElementById('midName').value="";
	 document.getElementById('surname').value="";
	 document.getElementById('txtSearchStudent').value="";
 
			  
	   
 }

/*
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
$(document).on("keydown", disableF5);
});
*/

/*$(document).keypress(function(event)
{ alert(String.fromCharCode(event.which));
});*/

// UNDECIDED CODE 
 
function myKeyPress(e)
{
	var keynum;
	if(window.event)
	{
		keynum= e.keyCode;	
		
	}else if(e.which){
		keynum=e.which;
	}
	
	 
	document.getElementById('txtno').value;
	var txt="txt";
	var ans ="ans";
	apha="";
	
	var UsrSelect =String.fromCharCode(keynum);
	
	var txtId_1 =document.getElementById('txtno').value;
	
	
	 var txtId = document.getElementById('txtno').value;
	txtId= txt.concat(txtId);
	
	var txtIdValue =document.getElementById(txtId).value;
	 
	var answers =document.getElementById('txtno').value;
	
	
	
	answers=ans.concat(answers)
	 
	
	var choice =document.getElementById('txtno').value;
	
	 
	
	if(UsrSelect=='A' || UsrSelect=='a')
	{
		apha='A';
		 choice =apha.concat(choice);
		  
		 document.getElementById(choice).checked=true;
		 AnsCheck(choice,answers,txtIdValue);
		 
		  
	}
	if(UsrSelect=='B' || UsrSelect=='b')
	{
		apha='B';
		 choice =apha.concat(choice);
		 document.getElementById(choice).checked=true;
		 AnsCheck(choice,answers,txtIdValue);
	}
	
	if(UsrSelect=='C' || UsrSelect=='c')
	{
		apha='C';
		 choice =apha.concat(choice);
		 document.getElementById(choice).checked=true;
		 AnsCheck(choice,answers,txtIdValue)
	}
	if(UsrSelect=='D' || UsrSelect=='d')
	{
		apha='D';
		 choice =apha.concat(choice);
		 document.getElementById(choice).checked=true;
		 AnsCheck(choice,answers,txtIdValue)
	}
	
	
	if(UsrSelect=='E' || UsrSelect=='e')
	{
		apha='E';
		 choice =apha.concat(choice);
		 document.getElementById(choice).checked=true;
		 AnsCheck(choice,answers,txtIdValue)
	}
	
	 document.getElementById('txtFocus').value=""; 
	 
	 document.getElementById('txtFocus').style.border='hidden'; 
	document.getElementById('txtFocus').style.color='#FFF'; 
	 
	 document.getElementById('txtFocus').className="txtFocus"; 
	    
	 
}

function setFocusToTextBox()
{
	document.getElementById('txtFocus').focus();
	document.getElementById('txtFocus').className="txtFocus"; 
	 document.getElementById('txtFocus').style.border='hidden'; 
	document.getElementById('txtFocus').style.color='#FFF'; 
	var myInput =document.getElementById('txtFocus').style; 
	 myInput.border.style="none";
	 
	
		
}
 
 
</script> 
 
<script src="exam/javascript/cal.js" type="text/javascript"></script>
<script src="exam/javascript/jquery-1.10.2.js" type="text/javascript"></script>

  <script src="js/jquery-3.4.1.js" type="text/javascript" ></script>
 
 
   {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
  
 
 
 
</head>

<body onblur="self.focus()" onunload="clearInterval(window.x)" onfocus="setFocusToTextBox()" >

<div id="container"  onclick="setFocusToTextBox()">

                      
                        
<div id="header" class="heading" onclick="setFocusToTextBox()"> Bayelsa State Medical University</div>




  
<div id="container_text" class="hide_question">

<div id="numb_ques" onclick="setFocusToTextBox()">
 
<ul class="nav-list" >

 
<?php  $ctr=1;
$ctr_values=1; 
$counters=0;

 ?>
@foreach($query as $rst)
<a href="#" style="text-decoration:none; color:#000;" >
  <li value="<?php echo $ctr_values++; ?>" class="nav-item" id="{!!$rst->queId !!}" onclick="findeElement('{!!$rst->queId !!}')" >              

 
<?php 

//$counters++; 

echo $ctr++; 
 
?>
 
 
</li>
</a>
@endforeach


 
 
 

</ul>  

</div>

<div id="exampage"> <!-- QUESTION PAGE BEGINS HERE -->


<div style="width:400px; margin-left:5px; margin-top:10px; float:left;" class="mainbody" onclick="setFocusToTextBox()"> <img src="exam/images/bullet.png" width="15" height="15" /> Answered
 
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="exam/images/bullet yellow.png" width="15" height="15" />  Bookmark
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="timerId"><strong > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span>
 
  <input name="txtFocus" id="txtFocus" type="text" / onkeypress="return myKeyPress(event)"  size="1" style=" border-style:none; border-color:#fff;color:#FFF;" class="txtFocus">
  
</div>
  
  
 <div style="width:500px; margin-left:5px; margin-right:25px;  float:right; text-align:right; margin-top:10px;" onclick="setFocusToTextBox()"><input name="review" type="button" value="Review" class="but" onclick="enlargeQuesNo()"  /> &nbsp;&nbsp;&nbsp;<input name="bookmark" type="button" value="Bookmark" class="bookMark" onclick="bookmark('txtno')"  /> 
 
  &nbsp;&nbsp;&nbsp;&nbsp;<input name="cal" type="button" value="Calculator" class="but" id="calButton"  onclick="showstuff('calculator')"/>
 </div>
 <div id="close-calculator"><input name="close" type="button" class="but" value="Close Cal &nbsp;" onclick="hidestuff('calculator')" /> </div>
 
 <div id="calculator">
 
<div class="box">
	<div class="display"><input type="text" readonly size="18" id="d" name="d"></div>
	<div class="keys"><input name="saveText" id="saveText"   type="hidden" /> <input name="equallTo" id="equallTo"   type="hidden" />
		<p><input type="button" class="button gray" value="mrc" onclick="memeoryRecall()"><input type="button" class="button gray" value="m-" onclick="memeoryDelete()"><input type="button" class="button gray" value="m+" onclick="memeorySave()"><input type="button" class="button pink" value="/" onclick='v("/")'></p>
		<p><input type="button" class="button black" value="7" onclick='v("7")'><input type="button" class="button black" value="8" onclick='v("8")'><input type="button" class="button black" value="9" onclick='v("9")'><input type="button" class="button pink" value="*" onclick='v("*")'></p>
		<p><input type="button" class="button black" value="4" onclick='v("4")'><input type="button" class="button black" value="5" onclick='v("5")'><input type="button" class="button black" value="6" onclick='v("6")'><input type="button" class="button pink" value="-" onclick='v("-")'></p>
		<p><input type="button" class="button black" value="1" onclick='v("1")'><input type="button" class="button black" value="2" onclick='v("2")'><input type="button" class="button black" value="3" onclick='v("3")'><input type="button" class="button pink" value="+" onclick='v("+")'></p>
		<p><input type="button" class="button black" value="0" onclick='v("0")'><input type="button" class="button black" value="." onclick='v(".")'><input type="button" class="button black" value="C" onclick='c("")'><input type="button" class="button orange" value="=" onclick='e("=")'></p>
	</div>


 

      </div>
        
 
 </div>
  
  <div style="clear:both;">
    <label for="textfield"></label>
    <input type="hidden" name="txtId" id="txtId"   value=""/>
  </div>
 
 <div style="width:700px; margin-left:5px; margin-top:10px;" class="mainbody" id="noQues" onclick="setFocusToTextBox()"><strong><label class="mainbody"> <input id="txtno" name="txtno" type="text" value="1"  size="1" autocomplete="off"  style="font-size:bold;" readonly="readonly" />&nbsp;&nbsp;&nbsp;Question  of  <?php echo count($query) ?> </label></strong></div>
 
  <div id="first1"  class="show_question" onclick="setFocusToTextBox()"> 
 
 
 <div  id="quesFirst" style="overflow: auto;width:930px; height:auto; max-height:140px; margin-left:10px; margin-right:10px; margin-top:15px;" class="mainbody">   
 
  <?php echo "1. ";
  
   $string= $query[0]['question'];
	  $string = preg_replace('~<p>(.*?)</p>~is', '$1', $string, /* limit */ 1);
	  
	   echo $string;
   ?>
 <!--<textarea cols="30" id="editor1" name="editor1" rows="10" >-->
 {{--
   {!!  $query[0]['question']!!}
   
   --}}
 
  <!--</textarea>-->
	 
    
  
  
  
 <input id="txt1" name="txt1" type="hidden" autocomplete="off" value="{!! $query[0]['queId']!!}" size="1"   readonly="readonly" />
 </div>
 
 
 <div id="ques_option" onclick="setFocusToTextBox()"> 
  
  
 <div style="width:800px;margin-left:5px; margin-top:10px;" class="mainbody"><input name="{!!$query[0]['queId']!!}" type="radio" value="{!!trim($query[0]['optionA'])!!}" onclick="AnsCheck('A1','ans1','{!! $query[0]['queId']!!}')" id="A1" autocomplete="off"><label for="A1">A.&nbsp;&nbsp;{!!trim($query[0]['optionA'])!!}</label></div>
 
 <div style="width:800px; margin-left:5px; margin-top:10px;" class="mainbody"><input name="{!!$query[0]['queId']!!}" type="radio" value="{!! $query[0]['optionB']!!}" onclick="AnsCheck('B1','ans1','{!! $query[0]['queId']!!}')" id="B1" autocomplete="off"/><label for="B1">B.&nbsp;&nbsp;{!!$query[0]['optionB']!!}</label></div>
  

 
 <div style="width:800px;  margin-left:5px; margin-top:10px;" class="mainbody"><input name="{!! $query[0]['queId']!!}" type="radio" value="{!!trim($query[0]['optionC'])!!}"  onclick="AnsCheck('C1','ans1','{!! $query[0]['queId']!!}')" id="C1" autocomplete="off"><label for="C1">C.&nbsp;&nbsp;{!!trim($query[0]['optionC'])!!} </label> </div>
 
 <div style="width:800px; margin-left:5px; margin-top:10px;" class="mainbody"><input name="{!! $query[0]['queId']!!}" type="radio" value="{!!trim($query[0]['optionD'])!!}" onclick="AnsCheck('D1','ans1','{!! $query[0]['queId']!!}')" id="D1" autocomplete="off" /><label for="D1">D.&nbsp;&nbsp;{!!$query[0]['optionD']!!}</label> </div>
 
 
 <?php if($query[0]['optionE'] != '') {?>
 
 <div style="width:800px; margin-left:5px; margin-top:10px;" class="mainbody"><input name="{!! $query[0]['queId']!!}" type="radio" value="{!!trim($query[0]['optionE'])!!}" onclick="AnsCheck('E1','ans1','{!! $query[0]['queId']!!}')" id="E1" autocomplete="off" /><label for="E1">E.&nbsp;&nbsp;{!!$query[0]['optionE']!!}</label> </div>

  <?php } ?>
 
 
 <!-- TEXTBOX HOLDING ANSWERS FROM DB -->
 <input name="ans1" id="ans1" type="hidden"  size="20" value=" {!!trim($query[0]['answer'])!!}" autocomplete="off" />
 <input name="mrk1"  id="mrk1" type="hidden"  value=" {!!$query[0]['mark']!!}" size="2" autocomplete="off" />
 <input name="rst1"  id="rst1" type="hidden"  value="" size="30" autocomplete="off" />
 
<input name="sbj1"  id="sbj1" type="hidden"  value="{!!trim($query[0]['cosId'])!!}" size="2"autocomplete="off" />
  <input name="tms1"  id="tms1" type="hidden"  value="{!!trim($query[0]['semId'])!!}" size="2" autocomplete="off" />
  <input name="cls1"  id="cls1" type="hidden"  value="{!!trim($query[0]['levId'])!!}" size="2" autocomplete="off"/>
  
  
  
   <input name="StudentId"  id="StudentId" type="hidden"  value="" size="2" autocomplete="off"/>

  <input name="SchoolId"  id="SchoolId" type="hidden"  value="{!!trim($Student['schId'])!!}" size="2" autocomplete="off"/>
  
  <input name="FName"  id="FName" type="hidden"  value="" size="2" autocomplete="off"/>

<input name="Surname"  id="Surname" type="hidden"  value="" size="2" autocomplete="off"/>

<input name="LGA"  id="LGA" type="hidden"  value="{{--{!!trim($Student['LGA'])!!} --}}" size="2" autocomplete="off"/>

<input name="schName"  id="schName" type="hidden"  value="{!!trim($Student['School'])!!}" size="2" autocomplete="off"/>

<input name="newStId"  id="newStId" type="hidden"  value="" size="2" autocomplete="off"/>

 			 
 </div>
 
 <div style="width:350px; margin-left:5px; margin-top:25px; text-align:right; position:relative;  margin-bottom:25px; float:left; "> 
     
   <input name="submit" type="Button" value="Next >>"  id="" class="but" onclick="showQuestion('first2')" /> 
    </div>
 </div>
 
 
 
 
 
 
 
 
   <?php 
  // STATEGE FOUR
 $numb=1;
 $ctr2=2;
 //$ctr3=2;
  
// foreach ($query as $data) :
 while($numb < count($query))
 {
	 ?>
	 <div id="first<?php echo $ctr2;?>"  class="hide_question" onclick="setFocusToTextBox()">  
              
	 <div  id="ques" style="overflow:auto; width:930px; max-height:140px; margin-left:10px; margin-right:10px; margin-top:15px; height:auto;" class="mainbody" >   

    <?php
	echo $ctr2.". ";
	?>
    
    <input name="ck" type="hidden" value="<?php echo $ctr;?>"  id="ck" utocomplete="off"/>
    
    
	 <!--<textarea cols="30" id="ckview" rows="10" >-->
	<?php 
     /*
         
		 $questions= $query[$numb]['question'];
	  
	  $substr =substr($questions,0,3);
	  echo  $substr;
	  if ($substr=='<p>')
	  {
		   //echo substr($questions,3,-5);
		   $qestionReplace= substr_replace($questions,'',0,3);
		   
		   $questions = substr_replace($qestionReplace,'',-5,-1);
		   echo  $questions;
		   echo' IM IN';
		    
	  }
	  else
	  {
		  echo $query[$numb]['question'];
	  } 
	  */
	   $string= $query[$numb]['question'];
	  $string = preg_replace('~<p>(.*?)</p>~is', '$1', $string, /* limit */ 1);
	  
	   echo $string;
	 ?>
     {{--
     {!! $query[$numb]['question']  !!}
     --}}
    
    <!-- </textarea>-->
 
 
 <input id="txt<?php echo $ctr2;?>" name="txt<?php echo $ctr2;?>" type="hidden" value="<?php echo $query[$numb]['queId'];
	 ?>" size="1" utocomplete="off"   readonly="readonly" />

 
 
    </div>
    
    <div id="ques_option2"  onclick="setFocusToTextBox()"> 
	  <div style="width:800px;  margin-left:5px; margin-top:10px;" class="mainbody">
     <input name="<?php echo trim($query[$numb]['queId']);?>" type="radio" value="<?php echo $query[$numb]['optionA'];?>" / onclick="AnsCheck('A<?php echo $ctr2;?>','ans<?php echo $ctr2;?>','<?php echo trim($query[$numb]['queId']);?>')" id="A<?php echo $ctr2;?>" utocomplete="off"/><label for="A<?php echo $ctr2;?>">A.&nbsp;&nbsp;<?php echo trim($query[$numb]['optionA']);?> </label></div>
 
 <div style="width:800px; margin-left:5px; margin-top:10px;" class="mainbody">
 <input name="<?php echo trim($query[$numb]['queId']);?>" type="radio" value="<?php echo trim($query[$numb]['optionB']);?>"  onclick="AnsCheck('B<?php echo $ctr2;?>','ans<?php echo $ctr2;?>','<?php echo trim($query[$numb]['queId']);?>')" id="B<?php echo $ctr2;?>" utocomplete="off" /><label for="B<?php echo $ctr2;?>">B.&nbsp;&nbsp;<?php echo trim($query[$numb]['optionB']);?></label> </div>
 
 <div style="width:800px;  margin-left:5px; margin-top:10px;" class="mainbody">
 <input name="<?php echo trim($query[$numb]['queId']);?>" type="radio" value="<?php echo trim($query[$numb]['optionC']);?>" / onclick="AnsCheck('C<?php echo $ctr2;?>','ans<?php echo $ctr2;?>','<?php echo trim($query[$numb]['queId']);?>')" id="C<?php echo $ctr2;?>" utocomplete="off" /><label  for="C<?php echo $ctr2;?>">C.&nbsp;&nbsp;<?php echo trim($query[$numb]['optionC']);?></label>  </div>
 
 <div style="width:800px; margin-left:5px; margin-top:10px;" class="mainbody">
 <input name="<?php echo trim($query[$numb]['queId']);?>" type="radio" value="<?php echo trim($query[$numb]['optionD']);?>"/ onclick="AnsCheck('D<?php echo $ctr2;?>','ans<?php echo $ctr2;?>','<?php echo trim($query[$numb]['queId']);?>')" id="D<?php echo $ctr2;?>" utocomplete="off" /><label for="D<?php echo $ctr2;?>">D.&nbsp;&nbsp;<?php echo trim($query[$numb]['optionD']);?></label></div>
 
 
 <?php if($query[$numb]['optionE'] != '') { ?>
 
 <div style="width:800px; margin-left:5px; margin-top:10px;" class="mainbody">
 <input name="<?php echo trim($query[$numb]['queId']);?>" type="radio" value="<?php echo trim($query[$numb]['optionE']);?>"/ onclick="AnsCheck('E<?php echo $ctr2;?>','ans<?php echo $ctr2;?>','<?php echo trim($query[$numb]['queId']);?>')" id="E<?php echo $ctr2;?>" utocomplete="off" /><label for="E<?php echo $ctr2;?>">E.&nbsp;&nbsp;<?php echo trim($query[$numb]['optionE']);?></label></div>
 
 <?php } ?>
 
 
 
  <!-- TEXTBOX HOLDING ANSWERS FROM DB -->
 <input name="ans<?php echo $ctr2;?>" id="ans<?php echo $ctr2;?>" type="hidden" size="20"  value="<?php echo trim($query[$numb]['answer']);?>" />
 <input name="mrk<?php echo $ctr2;?>"  id="mrk<?php echo $ctr2;?>"type="hidden"  value="<?php echo trim($query[$numb]['mark']);?>" size="2" />
 <input name="rst<?php echo $ctr2;?>" id="rst<?php echo $ctr2;?>" type="hidden"  value="" size="30" />	 
 
 
 
   
 <input name="sbj<?php echo $ctr2;?>"  id="sbj<?php echo $ctr2;?>" type="hidden"  value="<?php echo trim($query[$numb]['cosId']);?>" size="2"autocomplete="off" />
  <input name="tms<?php echo $ctr2;?>"  id="tms<?php echo $ctr2;?>" type="hidden"  value="<?php echo trim($query[$numb]['semId']);?>" size="2" autocomplete="off" />
  <input name="cls<?php echo $ctr2;?>"  id="cls<?php echo $ctr2;?>" type="hidden"  value="<?php echo trim($query[$numb]['levId']);?>" size="2" autocomplete="off"/>
  
  
 
   

 
  </div>
 
 
  
 
 <div style="width:350px; margin-left:5px; margin-top:25px; text-align:right; position:relative;  margin-bottom:25px; float:left; ">  
  
   
 <input name="submit" type="Button" value="Next >>" class="but" onclick="showQuestion('first<?php echo $ctr2;?>')"
 /> 
   
  </div>
   
  
  </div>
 <?php
 $ctr2++;
  $numb++;
  }?>
  
  

  
    
   
   
  
  
  </div><!-- END OF EXAM PAGE THE ESSENCE IS TO HIDE THE QUESTION PAGE WHEN QUESTION NUMBER IS ENLARGED -->
  
   <!-- END OF EXAM PAGE THE ESSENCE IS TO HIDE THE QUESTION PAGE WHEN QUESTION NUMBER IS ENLARGED -->
 <div id="but_submit" style="width:350px; margin-right:15%;  margin-bottom:25px;margin-top:25px; text-align:left; position:relative; float:right;" class="hide_question">
  <input name="Button" type="button" id="butId" value="Submit"  onclick="rst()" class="but"/> 
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
 
 </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   
    <div style="clear:both;"></div>
   
   
    
 
 </div>
 
   <!--   RESULT PAGE DIV -->
   
    
   <div id="container_result" class="hide_question">
     
   <div  class="printout" >
   <div class="school-heading">    {!!trim($Student['School'])!!}   </div>
   <div class="result_bg" style="margin-bottom:20px;">
   
   <div style=" margin-bottom:10px;" class="rstclass"> {!!trim($Student['Class'])!!} &nbsp;&nbsp;&nbsp;  {!!trim($Student['Term'])!!} &nbsp;&nbsp;&nbsp;&nbsp;{!!$query[0]['cosId']!!}&nbsp; -&nbsp;  {!!trim($Student['Subject'])!!} </div>
   <div id="rstClasses" style=" margin-bottom:10px; " class="rstclass">   </div>
   </div>
   
   <div id="result-score">
   <div id="rstPass" class="result"> Number of Question Pass:</div>
   <div id="rstFail" class="result"> Number of Question Fail:</div>
   <div  id="rstTotal" style=" margin-bottom:10px; margin-top:15px;   "class="result"><strong> Exam Score:</strong></div>
   </div>
   
   <div style=" margin-top:20px; font-weight:bold;" class="result" > Send the Result Copy to Your Email Address</div>
   
   <div  class="result">
   <label  class="col-md-4 control-label "> Email:</label>
   <input class="form-control"  id="txtEmail" name="txtEmail" value="{{ old('txtEmail') }}" type="text" autocomplete="off"  style="margin-top:10px;"/>
   </div>
   
   <div  class="result" style="margin-top:30px; text-align:center;"><input name="" type="button" value="Send"  class="but"/></div>
   </div>
   
   </div>
   
   
    <!-- RESULT PRINT OUT PAGE END HERE -->
    
    
    
    
    <!--- START OF INSTRUCTION PAGE -->
    
    <div id="container_instruction" class="show_question" >
    <div  id="inst" style="font-weight:bold;" class="result">Instructions </div>
    <div  id="read" class="result"> Kindly read the instructions below carefully.</div>
    
    <div  id="instruction"  class="result" style="height:400px; overflow:scroll; margin-left:40px;" >
    <table> 
    
    @foreach($Instruction as $inst)
    <tr>
    <td valign="top" width="30">
    
     <img src="../exam/images/bullet blue.png" width="18" height="18" /></td> 
    <td height="">
       {!! $inst->instruction !!} 
   </td>
   </tr>
   <tr>
   <td height="10"> </td><td> </td>
   
   </tr>
    
      
    @endforeach
     
    </table>
    <div  id="nextInst" style="width:550px; margin-left:120px; margin-top:25px; text-align:center;  margin-bottom:15px;">  
  
   
 <input name="submit" type="Button" value="Register" class="hide_question" onclick="registerPage()"/>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 
 <input name="profileStudent" type="Button" value="Next" class="but" onclick="profileStudent()"/>  
 
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <input name="FirstName" type="Button" value="Search" class="hide_question" onclick="searchFName()"/> </div>
      </div>
    </div> <!-- ENDO CONTAINER INSTRUCTION -->
  
  
  
   
   
   
   
   
   
   
   
   
   <!--- START OF REGISTRATION PAGE -->
   <div id="container_registration" class="hide_question">
   
  <div class="hide_question" id="submitSt" style="height:auto; margin-bottom:15px; margin-left:20px; ">
  <div class="mainbody" style="font-weight:bold;">Register<br /></div>
  <div class="result_bg" >
  
  <div id="errorReg" style="text-align:center; font-weight:bold;"> </div>
  <div class="form-group{{ $errors->has('fName') ? ' has-error' : '' }}" >
                            <label for="fName" class="col-md-4 control-label " style="margin-top:10px;width:170px;" >First Name: &nbsp;</label>

        <div class="col-md-6" style="margin-top:10px;">
          <input id="fName" type="text" class="form-control" name="fName" value="{{ old('fName') }}" required autofocus autocomplete="off">

                                @if ($errors->has('fName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         
                         <div class="form-group{{ $errors->has('midName') ? ' has-error' : '' }}" >
                            <label for="midName" class="col-md-4 control-label" style="margin-top:10px;width:170px;">Middle Name: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
      <input id="midName" type="text" class="form-control" name="midName" value="{{ old('midName') }}" required autofocus autocomplete="off">

                                @if ($errors->has('midName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('midName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        
                        
                      <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}"   >
                            <label for="surname" class="col-md-4 control-label" style="margin-top:10px;width:170px;">Surname: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus autocomplete="off" >

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        
                        
                        
                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}"   >
                            <label for="Date_of_Birth" class="col-md-4 control-label" style="margin-top:10px; width:170px;">Date of Birth&nbsp;<strong>(dd/mm/yy):</strong> &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
                                <input id="Date_of_Birth" type="text" class="form-control" name="Date_of_Birth" value="{{ old('Date_of_Birth') }}" required autofocus autocomplete="off" >

                                @if ($errors->has('Date_of_Birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Date_of_Birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        
                        
                        
 <div  id="nextsubmit" style="width:270px; margin-left:120px; margin-top:205px; text-align:center;  margin-bottom:10px;">  
  
   
 <input name="butBk"  id="butBk" type="Button" value="<<&nbsp;Back" class="but" onclick="backInstruction()"/>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
 <input name="submit" id="nextsubmit" type="submit" value="Submit" onclick="register()" class="but" />
  <!--- onclick="clickStart()" -->
 </div>
  
 </div>
 </div> </div><!--- END OF CONTAINER REGISTRATION -->
 
 
 
                        
  
  
  <!--- START OF SEARCH or PROFILE PAGE -->
  <div id="container_search" class="hide_question"><!--- container search start -->
  
  <div class="hide_question" id="profile" style="height:230px; width:500px; margin-bottom:18px; margin-left:4.5%; ">
  <div class="mainbody" style="font-weight:bold;">Student Login <br /> </div>
  
  <div class="result_bg" style="margin-bottom:20px; ">
   
                            <label for="studentIds" class="col-md-4 control-label" style="margin-top:20px;">Student Id: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:17px; ">
                                <input id="txtSearchStudent" type="text" class="searchTextbox" name="txtSearchStudent" value="{{ old('studentIds') }}" required autofocus autocomplete="off"> </div>
                             
                        
                        
                        
                         <label for="studentIds" class="col-md-4 control-label" style="margin-top:20px;">Password: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:17px;  ">
     <input id="txtPassword" type="password" class="searchTextbox" name="txtPassword" value="{{ old('txtPassword') }}" required autofocus autocomplete="off">

                                
                                
                                          
                                    
                            </div>
                        
                        
                        
                        
                        
                         <div  id="nextsubmit" style="width:80px;  margin-top:-60px; text-align:left;  margin-bottom:10px; position:relative; float:right; clear:both;">
        <input name="butSearch"  id="butSearch" type="Button" value="Login" class="but" onclick="searchStudent()"/> </div>
        <div style="clear:both"> </div>
        <div  id="errorSearch" class="help-block" style="text-align:center;" ></div>
        </div><!--- CLOSING BACKGROUND DIV-->
        
        <div style="text-align:center;"> <input name="butBack"  id="butBack" type="Button" value="<<&nbsp;Back" class="but" onclick="backInstruction()"/></div>
                        </div>
  
  </div>
  </div>
  
  
  
  
  <!-- DIV SEARCH FIRST NAME START HERE -->
  
  
  
  <div id="container_search_fName" class="hide_question"><!--- container search first Name start -->
  
 <div class="hide_question" id="searchFName" style=" min-height:170px; width:500px; margin-bottom:15px; margin-left:50px; ">
  
  <div class="mainbody" style="font-weight:bold;">Search First Name <br /> </div>
  
  <div class="result_bg" style="margin-bottom:20px;">
   
                            <label for="studentIds" class="col-md-4 control-label" style="margin-top:10px;">First Name: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
                                 
                                
                                <input name="txtSearchFName" type="text" id="txtSearchFName" class="searchTextbox" placeholder="Search First Name" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search First Name')"  >
              
                                    
                            </div>
                         
                        
                          
        <div style="clear:both"> </div>
        <div  id="errorSearch" class="help-block" style="text-align:center;" ></div>
        
        <div id="tbl" style="overflow:scroll; max-height:350px;"> </div>
        
        </div><!--- CLOSING BACKGROUND DIV-->
        
        <div style="text-align:center;"> <input name="butBack"  id="butBack" type="Button" value="<<&nbsp;Back" class="but" onclick="backInstruction()"/></div>
                        </div>
  
  </div>
  
  
  
  
 
   
   
  
  
  
  
  
  
  
  
  
  
  
  
  
  <!--- START OF START PAGE -->
  <div id="start" class="hide_question">
     
   <div  class="printout" >
   <div class="school-heading">    {!!trim($Student['School'])!!}    </div>
   <div class="result_bg" style="margin-bottom:20px;">
   
   <div style=" margin-bottom:10px;" class="rstclass"> {!!trim($Student['Class'])!!} &nbsp;&nbsp;&nbsp;  {!!trim($Student['Term'])!!} &nbsp;&nbsp;&nbsp;&nbsp; {!!$query[0]['cosId']!!}&nbsp; -&nbsp;   {!!trim($Student['Subject'])!!} </div>
   
   <div id="studentDetails" style=" margin-bottom:10px; " class="rstclass">  </div>
   </div>
   
   </div>
   
   
  
  <div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:75px; text-align:center;  margin-bottom:10px;">  
  
   
 <input name="butStart" type="Button" value="Start" class="but" onclick="exam_start()"/>
 </div>
 
 
 
  
     </div>
    
    
    
 

 <div style="clear:both;"></div>
</div>

<script language="javascript">

function showstuff(boxid){
   
   // if ($('#boxid').is(':visible')) {
  try {   
	   
	   
		 
		document.getElementById(boxid).style.visibility="visible";
		document.getElementById(boxid).style.display="block";
		
		 document.getElementById('calButton').style.visibility="hidden";
		// document.getElementById('calButton').style.display="none";
		 
		document.getElementById('close-calculator').style.visibility="visible";
		document.getElementById('close-calculator').style.display="block";

} catch (e) {}	 
}
 
function hidestuff(boxid){
try{	 
  
   //document.getElementById(boxid).style.visibility="hidden";
   document.getElementById(boxid).style.display="none";
   
   document.getElementById('calButton').style.visibility="visible";
   //document.getElementById('calButton').style.display="block";
   
   
		//document.getElementById('close-calculator').style.visibility="hidden";
	  document.getElementById('close-calculator').style.display="none";
	  
	  setFocusToTextBox();
    
} catch (e) {}	}

function memeorySave()
{
try{	 
	var val=document.getElementById('d').value;
	
	
	    document.getElementById('saveText').value=val;
	//alert(document.getElementById('saveText').value=val);
} catch (e) {}	}


function memeoryRecall()
{
	try{ 
	var recall=document.getElementById('saveText').value;
	 
	  document.getElementById('d').value="";
	    document.getElementById("d").value=recall;
	 
} catch (e) {}	}

function memeoryDelete()
{
	try{ 
	 document.getElementById('saveText').value="";	   
	 
} catch (e) {}	}


function enlargeQuesNo()
{
	
	document.getElementById('numb_ques').style.height="200px";
	document.getElementById('numb_ques').style.maxHeight="210px";
	
	document.getElementById('exampage').className="hide_question";
	document.getElementById('but_submit').className="show_question";
	
	
	 
	
	
	
	 
}

 

function AnsCheck(uniqueId,answer,boxid)
{
	
	try{  
	var val=document.getElementById(uniqueId).value;
	
	//$(this).text().trim()
	
	 var strAns="ans"
	 var strMrk="mrk";
	 var strUserResult="rst";
	  var strSubId="sbj";
	  var strTms="tms";
	  var strCls="cls";
	  
	  var str=answer.substr(3);
	  
	  
	  var intAns=parseInt(str);

  document.getElementById(boxid).style.backgroundColor='green';
	   document.getElementById(boxid).style.color='white'; 

	  
	  strMrkMerge=strMrk.concat(intAns);
	  strMergeSubId=strSubId.concat(intAns);
	  strMergeClsId=strCls.concat(intAns);
	  strMergeTmsId=strTms.concat(intAns)
	
	  strUserResultMerge=strUserResult.concat(intAns);
	  document.getElementById(answer).value
	  
	   /* GET ANSWER FROM THE TEXTBOX IS OREGINALLY FROM DB */
	  	var answerDB=document.getElementById(answer).value
		var Mark=document.getElementById(strMrkMerge).value;
		
		  
		   
		 document.getElementById(strUserResultMerge).value=val;
		 
	  document.getElementById('txtFocus').value='';
	    
		//FOCUS CALL
	   setFocusToTextBox()
	   document.getElementById('txtFocus').value=""; 
	  
	  
	   
} catch (e) {}	}



function showQuestion(hideId){
		  
 
	try{	     
			var totalQuery= <?= count($query)?>
		 	 //document.getElementById('firstQuestion').className="hide_question";
			 
			
			 //var str=hideId.substr(5)
			   
			     var str = document.getElementById('txtno').value
			  
			   
			  var val_new=parseInt(str);
			  var val_old=parseInt(str);
			  
			  var val_query=parseInt(str);
			   
			// alert(hideId);
			   // alert('string '+str)
				 
				
			  var val_ld1= val_old
			  
			  var new_page=val_new+1;
			  var str1="first";
			  var merge_Old= str1.concat(val_ld1);
			  
			    var merge_new= str1.concat(new_page);
				
				 
			  
			if(val_query < totalQuery)
			 { 
			 
			   document.getElementById(merge_Old).className="hide_question";
			  
			   document.getElementById(merge_new).className="show_question";
			  
			 
			  
			 // var no = document.getElementById('txtno').value=val_query;
			  document.getElementById('txtno').value=new_page
			  
			 }
			 
			 
			 
			 if(val_query == totalQuery)
			 {
				 //DISPLAYING SUBMIT BUTTON
				  document.getElementById('but_submit').className="show_question";
			 }
			 
			 if(val_query >= totalQuery)
			 {
			   alert('End of Question')
	   	     }
			 
			 //FOCUSING TEXT ON TEXT BOX FOCUS
			 
			   document.getElementById('txtFocus').value='';
	    
	   				setFocusToTextBox()
			    
			   
} catch (e) {}	}

function bookmark(bk){
	
try{
	var bkmark =document.getElementById(bk).value;
	  
	 var str1="txt";
	 
			  var merge= str1.concat(bkmark);
			 
			  
	var finalBK = document.getElementById(merge).value;
	  
	 
	 
	document.getElementById(finalBK).style.backgroundColor='orange';
	document.getElementById(finalBK).style.color='white';
	
	//TEXT FOCUS
	 document.getElementById('txtFocus').value='';
	    
	   setFocusToTextBox()
	
} catch (e) {}	}
 
 function findeElement(elem){
	 
	try{  
	 
	 var clickedEle= document.getElementById(elem).value
	 
	
	 
	 
	  var getId = document.getElementById('txtno').value;
	  
	  
	  
	 var str1="first";
	 
	var merge= str1.concat(getId);
	
	var merge2= str1.concat(clickedEle);
			  
		
		document.getElementById(merge).className="hide_question";
			  
	    document.getElementById(merge2).className="show_question";
		
		document.getElementById('txtno').value=clickedEle;
		
		// SETTING NUMBER QUESTION TO THE OREGINAL SIZE AND MAKING SUBMIT BUTTON HIDDEN
		document.getElementById('numb_ques').style.height="auto";
		
		document.getElementById('exampage').className="show_question";
		document.getElementById('but_submit').className="hide_question";
		 //alert('Old page' + getId + '  ' + merge);	 
		 
		 // alert('New page' + clickedEle + '  ' + merge2);
		 
		 
	document.getElementById('numb_ques').style.maxHeight="120px";
		 	
		 
		  document.getElementById('txtFocus').value='';
	    
	   setFocusToTextBox()
	     
 } catch (e) {}	}
 




 function rst()
 {
	 //event.preventDefault();
	 
	
	 try{
		 
		var submitRst=confirm("Are you sure you want to Submit now ?") ;
		 
	if(submitRst)	
	{ 
	
	 var totalQuestion='<?= count($query);?>'
	   
	 var strAns="ans"
	 var strMrk="mrk";
	 var strUserResult="rst";
	  var strSubId="sbj";
	  var strTms="tms";
	  var strCls="cls";
		 
	 var next=0;
	  
	 var ctr =1;  
	  var dataArray=[];
	 while(ctr <= totalQuestion)
	 {
		  
		 
		 strMrkMerge=strMrk.concat(ctr);
	  strMergeSubId=strSubId.concat(ctr);
	  strMergeClsId=strCls.concat(ctr); 
	  strMergeTmsId=strTms.concat(ctr);
	strMergeDBAnswer=strAns.concat(ctr);
	  strUserResultMerge=strUserResult.concat(ctr);
	  
	   /* alert('Mark  '+   strMrkMerge )	
	   alert('Database Answer  '+  strMergeDBAnswer )	
	   alert('User Answer  '+  strUserResultMerge )	
	   alert('Class Id  '+  strMergeClsId )
	   alert('Terms Id  '+ strMergeTmsId )	
	   alert('Subject Id  '+ strMergeSubId ) */
	   
	 
	 	   
	    dataArray.push({
			Id:ctr,
			mark:document.getElementById(strMrkMerge).value,
			DBAnswer:document.getElementById(strMergeDBAnswer).value,
			UserAns:document.getElementById(strUserResultMerge).value,
			SubjectId:document.getElementById(strMergeSubId).value,
			ClassId:document.getElementById(strMergeClsId).value,
			TermId:document.getElementById(strMergeTmsId).value,
			
			StudentId:document.getElementById('StudentId').value,
			
			NewStudentId:document.getElementById('newStId').value,
		 	
			
			 SchoolId:document.getElementById('SchoolId').value,
			 FName:document.getElementById('FName').value,
			  Surname:document.getElementById('Surname').value});
			 
			  
			  	
				 // alert('Here is my mark:  '+ dataArray[next]['mark']);
			 
  				 
				 // alert('User Answer:  '+ dataArray[next]['UserAns']);
				// alert('Database Answer:  '+ dataArray[next]['DBAnswer']);
				  //alert('First name:  '+ dataArray[next]['FName']);
				
				 // console.log(dataArray[next]['NewStudentId']);
				 // console.log(dataArray[next]['StudentId']);
				 
				 
				 next++;
 			  
		ctr++;
	 }
	 
	 
	    
	   
	   
        
   
	$.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});   
     
    
		 
		  var dataArray= JSON.stringify(dataArray);
		  // console.log(dataArray);
	   
		var request=$.ajax({
			  type:"POST",
		  url:"result", 
		 data:{"_token":$('#signup-token').val(), "dataArray":dataArray},
		 dataType:"JSON",
		 processData:"false",
		   success: function(data) {
			   
			 document.getElementById('container_text').className="hide_question"; 
			 document.getElementById('container_result').className="show_question"; 
			    //container_result
			  
			  //container_text
			  
               $("#rstTotal").html('<span class=total-result>Exam Score: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data.success.totalMark +'</span>');
			    $("#rstPass").html('<span class=result>Number of Question Pass: &nbsp;&nbsp;&nbsp;&nbsp;' + data.success.totalQuePass +'</span>');
				 $("#rstFail").html('<span class=result>Number of Question Fail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data.success.totalQuesFailed +'</span>');
				 
				  //$("#rstFail").append('<p>' + data.success.totalQuesFailed +'</p>');
			 //alert(data.success.totalMark);
			 //LOGIN STUDENT OUT
			 console.log('Before Clear Interval');
			   clearInterval(window.x);
			  
			  console.log('After Clear Interval');
			 
			stLogout();  
         },
		
		 
		 
		  error: function(data,  errorThrown) {
        //this is going to happen when you send something different from a 200 OK HTTP
        alert('Ooops, something happened: ' +   data + ' ' +errorThrown);
    }   
		   
     });   
	
		   
   
	 }
	
 
} catch (e) {}	 }
 
 
//SUBMISION BY TIMER IS HERE

 function rstTimberSubmit()
 {
	 //event.preventDefault();
	 
	
	 try{
		 
		 
	
	 var totalQuestion='<?= count($query);?>'
	   
	 var strAns="ans"
	 var strMrk="mrk";
	 var strUserResult="rst";
	  var strSubId="sbj";
	  var strTms="tms";
	  var strCls="cls";
		 
	 var next=0;
	  
	 var ctr =1;  
	  var dataArray=[];
	 while(ctr <= totalQuestion)
	 {
		  
		 
		 strMrkMerge=strMrk.concat(ctr);
	  strMergeSubId=strSubId.concat(ctr);
	  strMergeClsId=strCls.concat(ctr); 
	  strMergeTmsId=strTms.concat(ctr);
	strMergeDBAnswer=strAns.concat(ctr);
	  strUserResultMerge=strUserResult.concat(ctr);
	  
	   /* alert('Mark  '+   strMrkMerge )	
	   alert('Database Answer  '+  strMergeDBAnswer )	
	   alert('User Answer  '+  strUserResultMerge )	
	   alert('Class Id  '+  strMergeClsId )
	   alert('Terms Id  '+ strMergeTmsId )	
	   alert('Subject Id  '+ strMergeSubId ) */
	   
	 
	 	   
	    dataArray.push({
			Id:ctr,
			mark:document.getElementById(strMrkMerge).value,
			DBAnswer:document.getElementById(strMergeDBAnswer).value,
			UserAns:document.getElementById(strUserResultMerge).value,
			SubjectId:document.getElementById(strMergeSubId).value,
			ClassId:document.getElementById(strMergeClsId).value,
			TermId:document.getElementById(strMergeTmsId).value,
			
			StudentId:document.getElementById('StudentId').value,
			
			NewStudentId:document.getElementById('newStId').value,
		 	
			
			 SchoolId:document.getElementById('SchoolId').value,
			 FName:document.getElementById('FName').value,
			  Surname:document.getElementById('Surname').value});
			 
			  
			  	
				 // alert('Here is my mark:  '+ dataArray[next]['mark']);
			 
  				 
				 // alert('User Answer:  '+ dataArray[next]['UserAns']);
				// alert('Database Answer:  '+ dataArray[next]['DBAnswer']);
				  //alert('First name:  '+ dataArray[next]['FName']);
				 // console.log(dataArray[next]['NewStudentId']);
				 
				 
				 next++;
 			  
		ctr++;
	 }
	 
	 
	    
	   
	   
        
   
	$.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});   
     
    
		 
		  var dataArray= JSON.stringify(dataArray);
		  // console.log(dataArray);
	   
		var request=$.ajax({
			  type:"POST",
		  url:"result", 
		 data:{"_token":$('#signup-token').val(), "dataArray":dataArray},
		 dataType:"JSON",
		 processData:"false",
		   success: function(data) {
			   
			 document.getElementById('container_text').className="hide_question"; 
			 document.getElementById('container_result').className="show_question"; 
			    //container_result
			  
			  //container_text
			  
               $("#rstTotal").html('<span class=total-result>Exam Score: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data.success.totalMark +'</span>');
			    $("#rstPass").html('<span class=result>Number of Question Pass: &nbsp;&nbsp;&nbsp;&nbsp;' + data.success.totalQuePass +'</span>');
				 $("#rstFail").html('<span class=result>Number of Question Fail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data.success.totalQuesFailed +'</span>');
				 
				  //$("#rstFail").append('<p>' + data.success.totalQuesFailed +'</p>');
			 //alert(data.success.totalMark);
			  
			  
         },
		
		 
		 
		  error: function(data,  errorThrown) {
        //this is going to happen when you send something different from a 200 OK HTTP
        alert('Ooops, something happened: ' +   data + ' ' +errorThrown);
    }   
		   
     });   
	
		   
   
	  
	
 
} catch (e) {}	 } 
 
 
 
 
 

</script>

<script language="javascript">

function register()
{

$.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		var nowDate = new Date(); 

var dtArray=[];

var fname=$('#fName').val();
var midName=$('#midName').val();
var surname=$('#surname').val();
var LGA=$('#LGA').val();
var schName=$('#schName').val();
var SchoolId=$('#SchoolId').val();
var birth=$('#Date_of_Birth').val();
var fullYear=nowDate.getFullYear();

 dtArray.push({
			 fname:fname,
			midName:midName,
			surname:surname,
			LGA:LGA,
			schName:schName,
			birth:birth,
			SchoolId:SchoolId,
			fullYear:fullYear});
			
var dataArray= JSON.stringify(dtArray);


if(fname =="")
{
	$("#errorReg").html('<span class=help-block> &nbsp; First Name Required !!!  </span>');
	exit();
}

if(surname =="")
{
	$("#errorReg").html('<span class=help-block> &nbsp; Surname Required !!!  </span>');
	exit();
}

if(birth =="")
{
	$("#errorReg").html('<span class=help-block> &nbsp; Date of Birth Required !!!  </span>');
	exit();
}
   

$.ajax({
type:"post",
url:"regStudent",
data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
 dataType:"JSON",
 processData:"false",


success: function(data) {
			    
			    
               $("#studentDetails").html('<span class=rstclass>Student Id: &nbsp;&nbsp;' + data.success.studentId +'  &nbsp;&nbsp; ' + data.success.fName +'   &nbsp;&nbsp; ' + data.success.surname +'  </span>');
			   
			   $("#rstClasses").html('<span class=rstclass>&nbsp;' + data.success.studentId +'  &nbsp;&nbsp; ' + data.success.fName +'   &nbsp;&nbsp; ' + data.success.surname +'  </span>');
			   

document.getElementById('FName').value=data.success.fName;
document.getElementById('Surname').value=data.success.surname;
document.getElementById('newStId').value=data.success.studentId;

document.getElementById('StudentId').value=data.success.stId;
 
  
 //if($.trim($('#schName').val()) != $.trim(data.success.school))
 

clickStart(); 
			     
			  
			  
         },
		
		 
		 
		  error: function(data,  errorThrown) {
        //this is going to happen when you send something different from a 200 OK HTTP
        //alert('Ooops, something happened: ' +   data + ' ' +errorThrown);
		$("#errorReg").html('<span class=help-block> &nbsp; Data Required !!!  </span>');
    } 

});

   

} 







function searchStudent()
{

		$.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
		
		var txtSearchStudent=$('#txtSearchStudent').val();
		//console.log(txtSearchStudent);
		var SchoolId=$('#SchoolId').val();
		
		
		var cosId='{!!$query[0]->cosId !!}'
		
		 
		$.ajax({
type:"post",
url:"searchStudent",
data:{"_token":$('#signup-token').val(),"txtSearchStudent":txtSearchStudent,"SchoolId":SchoolId ,"Password":$("#txtPassword").val(),"schId":$("#SchoolId").val(),"cosId":cosId},
 dataType:"JSON",
 processData:"false",
 success: function(data) {
	 
		 if(data=="Result Existed for this Academic Session")
			  {   
		  $("#errorSearch").html("<span class=help-block> &nbsp;  "+ data +"!!!  </span>");
			} 		    
			  
               $("#studentDetails").html('<span class=rstclass>Student Id: &nbsp;&nbsp;' + data.success.stId +'  &nbsp;&nbsp; ' + data.success.fName +'   &nbsp;&nbsp; ' + data.success.surname +'  </span>');
			   
			    $("#rstClasses").html('<span class=rstclass>&nbsp;' + data.success.stId +'  &nbsp;&nbsp; ' + data.success.fName +'   &nbsp;&nbsp; ' + data.success.surname +'  </span>');
			   
			    

document.getElementById('FName').value=data.success.fName;
document.getElementById('Surname').value=data.success.surname;
document.getElementById('newStId').value=data.success.studentId;

document.getElementById('StudentId').value=data.success.stId;


if(data.length == 0)
 {
	 
	 $("#errorReg").html('<span class=help-block> &nbsp; School Mismatch Check your school Name !!!  </span>');
	 exit;
 }

clickStart(); 
			  
			  if(data=="Result Existed for this Academic Session")
			  {   
		  $("#errorSearch").html("<span class=help-block> &nbsp;  "+ data +"!!!  </span>");
			} 
			 
         },
		
		 
		 
		  error: function(data,  errorThrown) {
          
		  
		 $("#errorSearch").html('<span class=help-block> &nbsp; Data not found !!!  </span>');
		
			  
		
    } 

});
}




 
 
 //STUDENT LOGIN SESSION START HERE
 //$(function() {
  function stLogin()
  {
  
 
   
 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
   
	 
	 
	var email='student@gmail.com';
	 
	 var password='student';
	 
    
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'{{ route('login') }}',
         data:{"_token":$('#signup-token').val(),"email":email,"password":password},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
  
    
    
   
				//document.getElementById('container_instruction').className="show_question";
				//document.getElementById('container_student_login').className="hide_question";
				 
				
				/*var ctr=data.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }*/
         },
		 error: function(data) {
         
	   console.log('Data Error');
	   //alert(data); 
	   	//document.getElementById('container_instruction').className="show_question";
				//document.getElementById('container_student_login').className="hide_question";
			
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
  
 // });
}
 
 
 function stLogout()
 {
    
 
 $.ajax({ 
	  dataType:"json", 
	    type:"GET",
         url:'{{ route('logout') }}',
         //data:{"_token":$('#signup-token').val(),"email":$("#email").val(),"password":$("#password").val()},
		 processData:"false",
         success: function(data) {
  
    console.log('success');
    
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	      
	  
    }   
		 
     });
  
}
 
 
 
 
 
 
//SEARCH QUESTION SESSION START HERE
 
 
 
 $("#txtSearchFName").keyup(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	
	  
	var ctr =0;
	
    //document.getElementById('LAG').value='Select';
   //document.getElementById('school').value='Select';
      
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'searchFName',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearchFName").val(),"schId":$("#SchoolId").val()},
		 processData:"false",
         success: function(data) {
  
  	   
  var table="<table class='result' width='98%' bgcolor='#ccc' cellpadding='2' cellspacing='2'  align='center' id='+ tblSearch +'<tr > <th width='150' bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>First Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Surname</th>    </tr>";
   
   //$("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	     for (i=0;i < data.length;i++)
				  {
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
table +="<tr><td align='left' bgcolor= #ffffff   valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].studentId +"</span></td ><td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fname +"</span></td ><td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midname +"</span></td ><td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ></tr>";
				 //console.log('Searching Data'); 
		
		 
				 
				  }
				
				 $("#tbl").html(table); 
				 
				   
				//document.getElementById('paginate').className="hide_question";
				 
				
				/*var ctr=data.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }*/
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
 
 
 
  



</script>


 
<script>
 /*
 function requestFullScreen(element)
{

var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;


if(requestMethod)
{

requestMethod.call(element)
 
}
else if(typeof window.ActiveXObject !=="undefined")
{
var wscript = new ActiveXObject("WScript.Shell");
if(wscript !== null)
{
wscript.SendKeys("{F11}");
}
}
}

//var elem = document.body;
//requestFullScreen(elem);
document.body.style.backgroundColor="#DCEDF7";
var elem = document.body;
*/
</script>


 <!-- <script src="https://cdn.ckeditor.com/4.9.0/standard-all/ckeditor.js"></script> -->
    
    
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <script>
	 
	 
	//CKEDITOR.replace(ckview,{language:'en-gb'});
	
	</script>
    <script>
	//CKEDITOR.replace(editor1,{toolbarGroups: [
				 
			//]});
	</script> 
 


  
     
     

</body>
</html>
