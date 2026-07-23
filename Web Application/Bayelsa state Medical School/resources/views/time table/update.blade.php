
  @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Time Table Page</span>

<meta name="_token" content="{!! csrf_token() !!}"/>
@stop

 
@section('content')

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 
 <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
 
<script language="javascript">


function ACheck()
{
	 
	 document.getElementById('A').checked='true';
	document.getElementById('B').checked='';
	document.getElementById('C').checked='';
	document.getElementById('D').checked='';
	document.getElementById('E').checked='';
	
	var val=document.getElementById('optionA').value;
	document.getElementById('answer').value=val;
	 
	 
}


function BCheck()
{
	document.getElementById('A').checked='';
	document.getElementById('B').checked='true';
	document.getElementById('C').checked='';
	document.getElementById('D').checked='';
	document.getElementById('E').checked='';
	
	var val=document.getElementById('optionB').value;
	document.getElementById('answer').value=val;
	
}
function CCheck()
{
	document.getElementById('A').checked='';
	document.getElementById('B').checked='';
	document.getElementById('C').checked='true';
	document.getElementById('D').checked='';
	document.getElementById('E').checked='';
	
	var val=document.getElementById('optionC').value;
	document.getElementById('answer').value=val;
}
function DCheck()
{

	document.getElementById('A').checked='';
	document.getElementById('B').checked='';
	document.getElementById('C').checked='';
	document.getElementById('E').checked='';
	document.getElementById('D').checked='true';
	
	var val=document.getElementById('optionD').value;
	document.getElementById('answer').value=val;
}


function ECheck()
{

	document.getElementById('A').checked='';
	document.getElementById('B').checked='';
	document.getElementById('C').checked='';
	document.getElementById('D').checked='';
	document.getElementById('E').checked='true';
	
	var val=document.getElementById('optionE').value;
	document.getElementById('answer').value=val;
}


function CheckAnswer()
{
	 
	  
	
	
 

	 
	if(answer == document.getElementById('optionA').value.trim())
	{
		document.getElementById('A').checked='true';
		document.getElementById('B').checked='';
	   document.getElementById('C').checked='';
	    document.getElementById('D').checked='';
		document.getElementById('E').checked='';
	}
	if(answer == document.getElementById('optionB').value.trim())
	{
		document.getElementById('B').checked='true';
		document.getElementById('A').checked='';
	   document.getElementById('C').checked='';
	    document.getElementById('D').checked='';
		document.getElementById('E').checked='';
	}
	if(answer == document.getElementById('optionC').value.trim()) 
	{
		document.getElementById('C').checked='true';
		document.getElementById('A').checked='';
	   document.getElementById('B').checked='';
	    document.getElementById('D').checked='';
		document.getElementById('E').checked='';
		 
	}
	 
	if(answer == document.getElementById('optionD').value.trim())
	{
		document.getElementById('D').checked='true';
		document.getElementById('A').checked='';
	   document.getElementById('C').checked='';
	    document.getElementById('B').checked='';
		document.getElementById('E').checked='';
	}
	
	if(answer == document.getElementById('optionE').value.trim())
	{
		document.getElementById('E').checked='true';
		document.getElementById('A').checked='';
	   document.getElementById('C').checked='';
	    document.getElementById('B').checked='';
		document.getElementById('D').checked='';
	}
	
	
	if(optValues != '')
	{
		 
		document.getElementById('optShow').checked="true";
	} 
}


function hideOption()
{
	document.getElementById('optE').className="hide_question";
	document.getElementById('optShow').value="";
	document.getElementById('optionE').value="";
	document.getElementById('answer').value="";
	document.getElementById('E').checked="";
	
}

function showOption()
{
	document.getElementById('optE').className="show_question";
	document.getElementById('optShow').value="5";
}

  


  function lecture()
{
	  
	var values =document.getElementById('optLecture').value="Lecture";
	document.getElementById('txtChoice').value="Lecture";
	
	
	 document.getElementById('displayExam').className="hide_question";
	 document.getElementById('optLE').style.height='50px';
	  document.getElementById('displayType').className="hide_question";
	
}

function exam()
{
	//document.getElementById('optE').className="show_question";
	var values =document.getElementById('optExam').value="Exam";
	
	document.getElementById('txtChoice').value="Exam";
	
	 document.getElementById('displayExam').className="show_question";
	 document.getElementById('optLE').style.height='150px';
	  document.getElementById('displayType').className="show_question";
	
}
 


 function online()
{
	  
	var values =document.getElementById('optOnline').value="Online";
	document.getElementById('txtType').value="Online";
	
 
}

function paper()
{
	//document.getElementById('optE').className="show_question";
	var values =document.getElementById('optPaper').value="Paper";
	
	document.getElementById('txtType').value="Paper";
 
	
}


</script>

<meta name="_token" content="{!! csrf_token() !!}"/>

</head>

<body onLoad="CheckAnswer()">
<div id="container">

 
 <form name="form1" id="form1">



<div id="optLE" class="result_bg " style=" height:auto; min-height:50px;  margin-bottom:20px;" >  
 

<div style=" margin-bottom:25px;margin-top:5px; margin-left:6%; " class=""> 
                            
  <div class="col-md-6" style="width:100%;"  >
    <label style=" margin-top:10px; " for="optHide">Time Table Type:</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <label style=" margin-top:10px; " for="optLecture">&nbsp;&nbsp;&nbsp;Lecture:</label>
  <input name="optionChoice" type="radio" id="optLecture" onClick="lecture()" value="Lecture" <?php if(trim($query[0]->time_table_type) == 'Lecture')  {echo 'checked';} ?>  />  &nbsp; &nbsp;
   <label style="margin-top:10px; " for="optExam">&nbsp;&nbsp;Exam:</label>
  
  
   <input name="optionChoice" type="radio" id="optExam" onClick="exam()"   value="Exam" <?php if(trim($query[0]->time_table_type) == 'Exam')  {echo 'checked'; } ?>  /> 
    
    
   
    <input name="txtChoice" type="hidden" id="txtChoice"  value="{!!$query[0]->time_table_type !!}"   /> 
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>
    
    
    
      
                    
                    
                    
        <div   id="displayExam"   <?php if(trim($query[0]->time_table_type) == 'Exam')  {echo 'checked'; ?> class='show_question' style="height:70px;"<?php } else{ ?>class='hide_question' <?php   }?>  >
                            <label for="optionA" class="col-md-4 control-label " style="margin-top:10px; width:230px;" >Date: &nbsp;&nbsp;&nbsp;&nbsp;</label>

        <div class="col-md-6" style="margin-top:5px; ">
          <input id="date" type="date" class="form-control" name="date"  value="{!!$query[0]->examDate!!}" required autofocus autocomplete="off" style=" text-align:center">
 
                                
                            </div>
                        </div>             
                    
                    
                    
                    
                    
                    
                    
                     <div style=" margin-bottom:10px;margin-top:5px; margin-left:15%;height:50px; " id="displayType" <?php if(trim($query[0]->time_table_type) == 'Exam')  {echo 'checked'; ?> class='show_question' <?php } else{ ?>class='hide_question' <?php   }?>  > 
                            
  <div class="col-md-6" style="width:100%; margin-left:-6%;"  >
  <label style=" margin-top:10px; width:130px; " for="optHide1">Exam Type:</label>
  <label style=" margin-top:10px; " for="optOnline">&nbsp;&nbsp;&nbsp;Online:</label>
  <input name="optType" type="radio" id="optOnline" onClick="online()" value="Online"  <?php if(trim($query[0]->examType) == 'Online')  {echo 'checked';} ?>  />     &nbsp; &nbsp;
   <label style="margin-top:10px; " for="optPaper">&nbsp;&nbsp;Paper:</label>
   <input name="optType" type="radio" id="optPaper" onClick="paper()"   value="Paper" <?php if(trim($query[0]->examType) == 'Paper')  {echo 'checked';} ?>   /> 
    
    
   
    <input name="txtChoice" type="hidden" id="txtType"  value=" {!! $query[0]->examType !!}"   /> 
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>    
                    
    
    
    
</div>







<div id="insertQues" class="result_bg " >  
<div id="success-page" style="height:auto; text-align:center;"> </div>

<div id="error-page" style="height:auto; text-align:center;"> </div>


 <div class="form-group{{ $errors->has('cls') ? ' has-error' : '' }}">
  
   <div style=" margin-bottom:20px; margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Faculty: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="faculty" id="faculty">
   <option  value="{!!$query[0]->falId!!}"> {!!$query[0]->faculty!!}</option>
   @foreach($faculty as $rst)
   <option value="{!!$rst->falId !!}"> {!!$rst->faculty !!}</option>
   @endforeach
   
    
   
   </select> 
   
   <div id="error-cls" style=" margin-top:10px;float:right; margin-right:20%;"  class="mainbody"> </div>
  
   </div>
   
   </div>
   
   
   
   <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Department: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="dpt" id="dpt">
   <option  value="{!!$query[0]->dptId!!}"> {!!$query[0]->department!!}</option>
     
    
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   
     <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Program: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="program" id="program">
   <option  value="{!!$query[0]->prgId!!}"> {!!$query[0]->program!!}</option>
     
    
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
 
   
   
   
   
    <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Level: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="level" id="level" class="select">
      
    <option  value="{!!$query[0]->levId!!}"> {!!$query[0]->level!!}</option>
    
   @foreach($level as $rst)
   <option value="{!!$rst->levId !!}"> {!!$rst->level !!}</option>
   @endforeach
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   
    <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Semester: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="semester" id="semester" class="select">
   <option  value="{!!$query[0]->semId!!}"> {!!$query[0]->semester!!}</option>
     
    
   @foreach($semester as $rst)
   <option value="{!!$rst->semId !!}"> {!!$rst->semester !!}</option>
   @endforeach
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   
   
   
   
   
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Course: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="course" id="course" onChange="subjests()" class="select">
   
   <option  value="{!!$query[0]->cosId!!}">{!!$query[0]->course!!}</option>
     
   
   </select>
   
   <div id="error-subject" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   
    </div></div>
    
    
    
    

   
    
    
   
   
  <!-- SECTION STARTS HERE  -->
  
 
  
    
    
    
    
    
    
    
    
   
   
   </div>
   
    <!-- QUESTION SECTION STARTS HERE -->
      
  <div id="ques" class="result_bg " >   
   
   <div  id="error-Msg-page" class="top-page" style="text-align:center;">  </div>
   
 
 
 <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; text-align:right;">  Building:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>  
   <select name="building" id="building" class="select"  >
   
     
    <option  value="{!!$query[0]->buiId !!}"> {!!$query[0]->building !!}</option>
   @foreach($building as $rst)
   <option value="{!!$rst->buiId !!}"> {!!$rst->building !!}</option>
   @endforeach
   </select>
   
    
 
    
    </div></div>
    
    
    
     <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; text-align:right "> Lecture Room:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>  
   <select name="room" id="room" class="select"  >
   
   <option  value="{!!$query[0]->romId!!}">{!!$query[0]->roomNumber!!} </option>
    
    
   </select>
   
    
 
    
    </div></div>
    
    
     
    
     
    
     
    
 
 
 
 
 
 
                            
          </div>              
                       
                       
           <!-- QUESTION OPTION SECTION STARTS HERE --> 
                       
                       <div id="questionOption" class="result_bg "  >  
                        <div  id="error-page" class="top-page" style="text-align:center;"> 
                         
                         
                               
                        </div>
                        
                        
                  <div id="errorReg" style="text-align:center; font-weight:bold;"> </div>
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; text-align:right;">Day: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
           
 <select name="days" id="days" class="select"  >
   
   <option  value="{!!$query[0]->day!!}">{!!$query[0]->day!!} </option>
   <option  value="Monday">Monday </option>
   <option  value="Tuesday">Tuesday </option>
   <option  value="Wednesday">Wednesday </option>
   <option  value="Thursday">Thursday </option>
   <option  value="Friday">Friday </option>
   <option  value="Saturday">Saturday </option>
    
    
   </select>
                                
                            </div>
                        </div>
                        
                        
                        
    <div id="errorReg" style="text-align:center; font-weight:bold;"> </div>
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; text-align:right;">Lecture Time: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
           
 <select name="time" id="time" class="select"  >
   
   <option  value="{!!$query[0]->time!!}">{!!$query[0]->time!!} </option>
   <option  value="8:00 AM">8:00 AM </option>
   <option  value="9:00 AM ">9:00 AM </option>
   <option  value="10:00 AM">10:00 AM </option>
   <option  value="11:00 AM">11:00 AM </option>
   <option  value="12:00 PM">12:00 PM </option>
   <option  value="1:00 PM">1:00 PM </option>
    <option  value="2:00 PM">2:00 PM </option>
    <option  value="3:00 PM">3:00 PM </option>
    <option  value="4:00 PM">4:00 PM </option>
    <option  value="5:00 PM">5:00 PM </option>
     
   </select>
                                
                            </div>
                        </div>
                                            
                        
                        
                        
                        
               
               
        <div style=" margin-bottom:25px;margin-top:10px; margin-left:15%; " class="hide_question"> 
                            
  <div class="col-md-6" style="width:100%;"  >
  <label style=" margin-top:10px; " for="optHide">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lecture Duration:</label>
  <label style=" margin-top:10px; " for="optHide">&nbsp;&nbsp;&nbsp;1 Hour:</label>
  <input name="optionE" type="radio" id="optHide" onClick="hideOption()" value="1" checked   />  &nbsp; &nbsp;
   <label style="margin-top:10px; " for="optShow">&nbsp;&nbsp;2 Hours:</label>
   <input name="optionE" type="radio" id="optShow" onClick="showOption()"   /> 
    
    
   
    <input name="txtTime" type="hidden" id="txtTime"  value=""   /> 
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>        
               
                        
            
             <div class="hide_question" >
                            <label for="optionA" class="col-md-4 control-label " style="margin-top:10px; width:230px;" >Academic Session: &nbsp;</label>

        <div class="col-md-6" style="margin-top:10px;">
          <input id="optionA" type="text" class="form-control" name="optionA" value="{!!$query[0]->academic_session!!}" required autofocus autocomplete="off">
 
                                
                            </div>
                        </div>
            
            
            
            
                        
                    
                        
                        
                         
   
 
 <div style="clear:both; height:10px;"> </div> 
 

</div>

<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">  
<input name="butBack" id="butBack" type="button" value="<<&nbsp;Back" class="but" onClick="window.location.href='../time-table'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
 <input name="butSubmit" id="butSubmit" type="submit" value="Edit" class="but" />
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
 </div>

</form>
   
   
   
  <script>
	 
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
		
$(function() {
 
 
 
 
  $("#faculty").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	  //document.getElementById('txtSearch').value='';
	  
	  
	  
	 
	var ctr =0;
	  $("#error-page").html("");
	  
	  if($("#faculty").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty  !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	 
	  
	  
	 
	    
	    document.getElementById('level').selectedIndex = 0;
		   document.getElementById('semester').selectedIndex = 0;
		    document.getElementById('course').selectedIndex = 0;
			 document.getElementById('program').selectedIndex = 0;
	   
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
 //var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'../search_fal',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
			
			
			 var sel="Select";
			 var option='';
			 option ='<option value="Select">'+sel+'</option>';
			
				/*  
				for (i=0;i < data.length;i++)
				{
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				}
				*/
				$.each(data['department'],function(key,val)
				{
					if(val.department != 'NA')
					{
					option+='<option value ="'+val.dptId +'">'+ val.department+'</option>';
					 }
				});
				
				  
				$("#dpt").html(option);
	  
			
			
		 
	        //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			

 
 
 
 
 
 
 
 
 $("#dpt").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	   $("#error-page").html("");
	  
	  if($("#faculty").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value, is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	 
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  
	  document.getElementById('level').selectedIndex = 0;
		   document.getElementById('semester').selectedIndex = 0;
	     
	 
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
//var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray);
	  
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'../search-course-fal-dpt-program-course',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty").val(),"department":$("#dpt").val()},
		 processData:"false",
         success: function(data) {
  
   var sel="Select";
			 var option='';
			 option ='<option value="Select">'+sel+'</option>';
			
			  	 
				 for (i=0;i < data.length;i++)
				{
				 
					option+='<option value ="'+data[i].prgId +'">'+data[i].program +'</option>';
					 
				} 
				 
				 
				$("#program").html(option);
	  
	   
					  
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			 
  
  
  
  $("#program").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	  $("#error-page").html("");
	  
	  
	  if($("#faculty").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#dpt").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#program").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select program Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
  if(ctr != 0 )
	  {
		  return false;
	  }
	   document.getElementById('level').selectedIndex = 0;
		   document.getElementById('semester').selectedIndex = 0;
	 
	  
  
   });
  
  
  
  
  
  $("#level").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	   $("#error-page").html("");
	  
	  if($("#faculty").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#dpt").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#program").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select program Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	   document.getElementById('semester').selectedIndex = 0;
	  
  
   });
	
  
  
  
  
  $("#semester").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	   $("#error-page").html("");
	  
	  if($("#faculty").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#dpt").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#program").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select program Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	if($("#level").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select level Value, is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	 
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	    
	 
	  dtArray.push({
			 falId:$("#faculty").val(),
			 dptId:$("#dpt").val(),
			 levId:$("#level").val(),
			 semId:$("#semester").val(),
			 prgId:$("#program").val(),
			  
			});
			
			 
	 	
 var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray);
	  
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'../search-fal-dpt-program-lev-sem',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
  
   var sel="Select";
			 var option='';
			 option ='<option value="Select">'+sel+'</option>';
			
			  	 
				 for (i=0;i < data.length;i++)
				{
				 
					option+='<option value ="'+data[i].cosId +'">'+data[i].course +'</option>';
					 
				} 
				 
				 
				$("#course").html(option);
	  
	   
					  
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			 
  
  
  
  
  
  
  
  
  
  $("#building").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	   $("#error-page").html("");
	  
	  
	    
	 
	  dtArray.push({
			 buiId:$("#buiding").val(), 
			  
			});
			
			 
	 	
 var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray);
	  
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'../search-lecture-room',
         data:{"_token":$('#signup-token').val(),"faculty":$("#building").val()},
		 processData:"false",
         success: function(data) {
  
   var sel="Select";
			 var option='';
			 option ='<option value="Select">'+sel+'</option>';
			
			  	  
				 for (i=0;i < data.length;i++)
				{
				 
					option+='<option value ="'+data[i].romId +'">'+data[i].roomNumber +'</option>';
					 
				} 
				 
				
				 
				$("#room").html(option);
	  
	   
					  
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			 
 
 
 
 
  
 $("#butSubmit").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 for (instance in CKEDITOR.instances) {
    CKEDITOR.instances[instance].updateElement();
}
	 
	 /* var cls = $("#cls").val();
	  var term = $("#term").val();
		var subject=$("#subject").val();
		var details=$("#details").val();
		
		var optionA=$("#optionA").val();
		
		 var optionB=$("#optionB").val();
		  var optionC=$("#optionC").val(); 
		  var optionD=$("#optionD").val();
		 var answer=$("#answer").val();
		 var  mark =$("#mark").val();
	*/
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
	  
	  
	  
	     if(document.getElementById("optHide").checked == true)
	{
		document.getElementById("txtTime").value='1';
		
		  
		}
		
		
	   if(document.getElementById("optShow").checked == true)
	{
		document.getElementById("txtTime").value='2';
		
		   
		}
		
		
		
		
		
	  if($("#faculty").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#dpt").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#program").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select program Value, is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	if($("#level").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select level Value, is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	 
	
	if($("#semester").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Semester Value, is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	 
	 if($("#txtTime").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Check Lecture Duration , is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	   
	  
	  /*
	   if($("#duration").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;   Lecture Time , is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}    
	*/
	
	
	if($("#txtChoice").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Check Time Table Type , is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 if($("#room").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;   Lecture Room , is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}    
	
	
	if($("#txtChoice").val() == "Exam" && $("#date").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;   Exam Date is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}    
	
	if($("#txtChoice").val() == "Exam" && $("#txtType").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;   Exam Type is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}    
	
	 
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	 
	  var id ='{!! $query[0]->timId !!}';
	  
	  dtArray.push({
			 levId:$("#level").val(),
			 semId:$("#semester").val(),
			cosId:$("#course").val(),
			prgId:$("#program").val(),
			
			romId:$("#room").val(),
			day:$("#days").val(),
			time_table_type:$("#txtChoice").val(),
			examDate:$("#date").val(),
			
			examType:$("#txtType").val(),
			time:$("#time").val(),
			duration:$("#txtTime").val(),
			academic_session:$("#optionA").val(),
			id:id,
			 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
        url:'/edit-time-table/{{$query[0]->timId}}',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
    var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successfully Saved &nbsp;</span>';
       $("#success-page").html(saved);
	   
	   alert(data);
	    if(data.trim()=='success')
	   {
		   
		// document.getElementById('txtTime').value='';
		 document.getElementById('optShow').checked=false;
		 document.getElementById('optHide').checked=false;
		 
		    
	    document.getElementById('ckview').value='';
	   document.getElementById('optionA').value='';
	   document.getElementById('optionB').value='';
	   document.getElementById('optionC').value='';
	   document.getElementById('optionD').value='';
	   document.getElementById('optionE').value='';
	   document.getElementById('answer').value='';
	   document.getElementById('mark').value='';
	  
	        
			 
	   	document.getElementById('A').checked='';
	document.getElementById('B').checked='';
	document.getElementById('C').checked='';
	document.getElementById('D').checked='';
		document.getElementById('E').checked='';
     $("#ckview").val() = "";
	   }
	 
	 if(data.trim() != 'success')
		{
			saved= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;'+ data +'&nbsp;</span>';
       $("#success-page").html(saved);
		}
	 
			
         },
		 error: function(data) {
         
	   console.log('Data Error',data.error); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
});
     </script>
   
   
   
   
   <div class="bottom-page"> </div>
 
 
 

</div>




<script src="{{ url('../ckeditor/plugins/chart/lib/chart.min.js') }}"></script>
  
   <script src="{{ url('../ckeditor/plugins/chart/widget/plugin.js') }}"></script>
     <script src="{{ url('../ckeditor/plugins/Chart.js-master/src/chart.js') }}"></script>
  
    
<script>
CKEDITOR.plugins.addExternal('chart','/plugins/chart/','plugin.js');

</script>
 
 
 <script>
   
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
	
 	
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
	
	 //extraPlugins:chart,
	<!-- MATHEMATICS PLUGINS -->
	
	
	// REMOVING OLD MATHS FORMULA IN OTHER TO INCLUDES CHEMISTRY AND MATHS FORMULA
	/*
	 extraPlugins:'mathjax', 
  mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		 	height: 200, 
		 	*/
  }; 
</script>



 
<!-- Scripts -->
     
   

    <script src="{{url('../ckeditor/ckeditor.js')}}"></script>
    <script>
	
	var ckview= document.getElementById("ckview");
	CKEDITOR.replace(ckview,options,{language:'en-gb'});
	
	
	//CKEDITOR.replace(ckview,options,{language:'en-gb',extraPlugins:'chart'});
	 
	</script>

 
 
       

      
 @section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
    <link href="../exam/css/popup.css" rel="stylesheet" type="text/css" />
      <link href='../ckeditor/plugins/chart/chart.css' rel='stylesheet'>

 
@stop

@section('js')
 
 
@stop

 @stop