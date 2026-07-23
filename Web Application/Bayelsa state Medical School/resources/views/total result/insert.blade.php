 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Total Result Page</span>

<meta name="_token" content="{!! csrf_token() !!}"/>
@stop

 
@section('content')

 

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 
 <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
 
<!--
 <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

  -->

<script language="javascript">

/*
 $('#datepicker-disabled-dates').Zebra_DatePicker({
        direction: true,
        disabled_dates: ['* * * 0,6']
    });
*/

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
	document.getElementById('D').checked='true';
	document.getElementById('E').checked='';
	
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


 function hideOption()
{
	/*
	document.getElementById('optE').className="hide_question";
	document.getElementById('optShow').value="";
	document.getElementById('optionE').value="";
	document.getElementById('answer').value="";
	document.getElementById('E').checked=""; */
	
	document.getElementById('txtTime').value="1";
	
}

function showOption()
{
	//document.getElementById('optE').className="show_question";
	var values =document.getElementById('optShow').value="2";
	
	document.getElementById('txtTime').value="2";
	
}
 
 
 
 
  function hideNoneGS()
{
	/*
	document.getElementById('optE').className="hide_question";
	document.getElementById('optShow').value="";
	document.getElementById('optionE').value="";
	document.getElementById('answer').value="";
	document.getElementById('E').checked=""; */
	
	document.getElementById('txtCourse').value="None GS";
	
	 
}

function showGS()
{
	//document.getElementById('optE').className="show_question";
	var values =document.getElementById('optShow').value="2";
	
	document.getElementById('txtCourse').value="GS";
	
	 
	
}
 
 
 
 
 
  function lecture()
{
	  
	var values =document.getElementById('optLecture').value="Lecture";
	document.getElementById('txtChoice').value="Lecture";
	
	
	 document.getElementById('displayExam').className="hide_question";
	  document.getElementById('displayType').className="hide_question";
	 document.getElementById('optLE').style.height='50px';
	
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
</head>

<body>
<div id="container">

 


<div id="container_text_Admin" class="rstAdmin result">
<form name="form1" id="form1">







<div id="insertQues" class="result_bg " >  
<div id="success-page" style="height:auto; text-align:center;"> </div>

<div id="error-page" style="height:auto; text-align:center;"> </div>


<div class="hide_question">
             <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }} "  >
                            <label for="optionA" class="col-md-4 control-label " style="margin-top:10px; width:230px;"  >Academic Session: &nbsp;</label>

        <div class="col-md-6" style="margin-top:10px;">
          <input id="optionA" type="text" class="form-control" name="optionA" value="{!!$academic[0]->acdId!!}" required autofocus autocomplete="off">
 
                                
                            </div>
                        </div>
            
            </div>
 


 <div class="form-group{{ $errors->has('cls') ? ' has-error' : '' }}">
  
   <div style=" margin-bottom:20px; margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Faculty: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="faculty" id="faculty">
   <option  value="Select"> Select</option>
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
   <option  value="Select"> Select</option>
     
    
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   
     <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Program: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="program" id="program">
   <option  value="Select"> Select</option>
     
    
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
 
   
   
   
   
    <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Level: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="level" id="level" class="select">
   <option  value="Select"> Select</option>
     
     
   @foreach($level as $rst)
   <option value="{!!$rst->levId !!}"> {!!$rst->level !!}</option>
   @endforeach
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   
    <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Semester: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="semester" id="semester" class="select">
   
    <option  value="Select"> Select</option>
   @foreach($semester as $rst)
   <option value="{!!$rst->semId !!}"> {!!$rst->semester !!}</option>
   @endforeach
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   
   
   
   
   
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; text-align:right;">Course: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="course" id="course" onChange="subjests()" class="select">
   
   <option  value="Select">Select</option>
     
   
   </select>
   
   <div id="error-subject" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   
    </div></div>
    
    
    
    
   
    
    
   
   
  <!-- SECTION STARTS HERE  -->
  
 
  
    
    
    
    
    
    
    
    
   
   
   </div>
   
    <!-- QUESTION SECTION STARTS HERE -->
      
  <div id="ques" class="result_bg "  style="height:160px;">   
   
   <div  id="error-Msg-page" class="top-page" style="text-align:center;">  </div>
   
 
 
  <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style=" float:left;margin-top:10px; width:190px; text-align:right ">  Student Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>  
    
   <div class="col-md-7" style="width:300px;position:relative; " >
     <input id="optionB" type="text" class="form-control mainbody" name="optionB" value="{{ old('optionB') }}" required autofocus autocomplete="off" >
 </div>
    
    <div class="col-md-2" style="width:100px;position:relative;  text-align:left;" >
     <input name="butSearch" id="butSearch" type="submit" value="Search" class="but" />
     </div>
    </div>
  
   <div style="clear:both;"></div> 
  
    </div>
    
 
  
 
  <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
    
    <div style=" margin-bottom:20px;margin-left:5%; margin-top:25px;" class="rstclass"> <label style="width:205px; text-align:right;">Letter Grade: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
   <select name="grade" id="grade"  class="select">
   
   <option  value="Select">Select</option>
     <option  value="A">A</option>
      <option  value="B">B</option>
       <option  value="C">C</option>
    <option  value="D">D</option>
     <option  value="E">E</option>
      <option  value="F">F</option>
   </select>
   
   <div id="error-subject" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   
    </div></div>
 
 
 
 
 
 

 <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; margin-top:10px; position:relative;" class="rstclass" > <label style=" float:left;margin-top:10px; width:170px;  text-align:right"> Total Mark:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</label>  
    
     
   <div class="col-md-7 mainbody" style="width:400px; margin-top:10px;position:relative;" >
     <input id="mark" type="text" class="form-control mainbody" name="mark" value="{{ old('mark') }}" required autofocus autocomplete="off" >
 </div>
    
    </div></div>
    
    
    
      

                            
          </div>              
                       
                       
           
  <div id="inserts" class="result_bg " >                        
                    
       
       
       <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl" class="mainbody"  >
<tr > 
	

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Student Id</th> 

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >First Name</th> 
   
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Surname</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Academic Session</th>  
  <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Course</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Mark Score</th> 

<th  width='150' bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong>Type</strong> </th> 
<!-- {{-- @if (trim($role['role'])-- }} == 'Super Admin')   
 <th  width='60' bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th> 
 {{-- @endif --}}-->
</tr> 
 </table> 
       
                        
     </div>                   
                         
   
 
 <div style="clear:both; height:10px;"> </div> 
 

 

<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">  
<input name="butBack" id="butBack" type="button" value="<<&nbsp;Back" class="but" onClick="window.location.href='../total-result'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
 <input name="butSubmit" id="butSubmit" type="submit" value="Submit" class="but" />
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
 </div>

</form>
   </div>
   
   
   
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
         url:'search_fal',
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
         url:'search-course-fal-dpt-program-course',
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
         url:'search-fal-dpt-program-lev-sem',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
  
   var sel="Select";
			 var option='';
			 option ='<option value="Select">'+sel+'</option>';
			
			  	 
				 for (i=0;i < data.length;i++)
				{
				 
					option+='<option value ="'+data[i].cosId +'">'+data[i].cosId +'&nbsp;-&nbsp;'+data[i].course +'</option>';
					 
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
         url:'search-lecture-room',
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
			 
  
  
  
  
  
  
  
  
 $("#butSearch").click(function(ev) {
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
	 
	
	if($("#semester").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Semester Value, is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	 
	 
	 if($("#optionB").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Student Id Value, is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	 
	  
	  
	  
	   
	
	 
	
	 
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	 var resultType='Test';
	  
	  dtArray.push({
			 levId:$("#level").val(),
			 semId:$("#semester").val(),
			cosId:$("#course").val(),
			prgId:$("#program").val(),
			mark:$("#mark").val(),
			 resultType:resultType,
			 stdId:$("#optionB").val(),
			academic_session:$("#optionA").val(),
			 
			});
			
			   
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"search-total-result-stdId",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
    var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successfully Saved &nbsp;</span>';
     //  $("#success-page").html(saved);
	   
	   // alert(data);
	   $("#success-page").html('');
	 
	 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Academic Session</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Course</th> <th width='160'bgcolor='' align=' left  ' valign='top' style='text-align:center;' > Mark Score</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Type</th>      </tr>";
			 
			
		 
			 
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  
	  
				 
				 
				 for(i=0;i < data.length;i++)
				{
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].stdId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].academic_session +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +" &nbsp;- &nbsp;" + data[i].course +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mark +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].resultType +"</span></td >   </tr>"
					 
				 
				}
			 
				
				
			
			 
				
				$("#tbl").append(option); 
				
	 
	  if(data =='Student Not Offering this course !!!')
		{
			 alert(data)
			  var saved= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;'+ data +' &nbsp;</span>';
      $("#success-page").html(saved);
	  $("#tbl").html(table); 
	     }
	 
	 if(data =='Student Id Not Found!!!')
		{
			 alert(data)
			 var saved= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;'+ data +' &nbsp;</span>';
			 $("#success-page").html(saved);
			 $("#tbl").html(table);
	     }
	 
			
         },
		 error: function(data) {
         
	   console.log('Data Error',data.error); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 $("#butSubmit").click(function(ev) {
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
	 
	
	if($("#semester").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Semester Value, is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	 
	 
	 if($("#optionB").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Student Id Value, is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	 if($("#mark").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Mark , is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	   
	  
	  var mk = $("#mark").val();
	// alert(parseInt(mk));
	 var mkInt=parseInt(mk);
	  if(isNaN(mkInt) && $("#mark").val() !='')
	   {
		   var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Enter Number for Mark !! &nbsp;</span>';
	  $("#error-page").append(errors);
	  
	  ctr++;
	   }
	  
	  
	  
	  if($("#grade").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Letter Grade value , is required !! &nbsp;</span>';
		 
	  $("#error-page").html(errors);
		ctr++;
	}  
	  
	  
	  
	
	 
	
	 
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	 var resultType='Test';
	 
	  dtArray.push({
			 levId:$("#level").val(),
			 semId:$("#semester").val(),
			cosId:$("#course").val(),
			prgId:$("#program").val(),
			mark:$("#mark").val(),
			grade:$("#grade").val(),
			 resultType:resultType,
			 stdId:$("#optionB").val(),
			academic_session:$("#optionA").val(),
			 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"create-total-result",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
    var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successfully Saved &nbsp;</span>';
       $("#success-page").html(saved);
	   
	    alert(data);
	    if(data.trim()=='Data Successfully Saved')
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
	 
	 if(data.trim() != 'Data Successfully Saved')
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
 
<script src="{{ url('../ckeditor/ckeditor.js')}}"></script>
 
 <script src="../ckeditor/plugins/ckeditor_wiris/wirisplugin-generic.js" type="text/javascript"></script>
<script src="../ckeditor/plugins/ckeditor_wiris/plugin.js" type="text/javascript"></script>

<!-- 
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>

 

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/plugins/ckeditor_wiris/plugin.js')}}"></script>

-->
 

<!--
 <script src="vendor/unisharp/laravel-ckeditor/ckeditor_wiris/wirisplugin-generic.js" type="text/javascript"></script>


<script src="../ckeditor/plugins/ckeditor_wiris/wirisplugin-generic.js" type="text/javascript"></script>
<script src="../ckeditor/plugins/ckeditor_wiris/plugin.js" type="text/javascript"></script>

 -->
 
 
 
 
 
 
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
     
    
   <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    

    <script>
	
	var ckview= document.getElementById("ckview");
	 CKEDITOR.replace(ckview,options,{language:'en-gb'});
	 //CKEDITOR.replace(ckview,options,{language:'en-gb',extraPlugins:'ckeditor_wiris'});
	 
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