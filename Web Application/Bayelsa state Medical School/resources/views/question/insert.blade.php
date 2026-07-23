 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Question Page</span>

<meta name="_token" content="{!! csrf_token() !!}"/>
@stop

 
@section('content')

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 
 <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
 
<!--
 <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

  -->

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
 

</script>
</head>

<body>
<div id="container">

 


<div id="container_text_Admin" class="rstAdmin result">
<form name="form1" id="form1">

<div id="insertQues" class="result_bg " >  
<div id="success-page" style="height:auto; text-align:center;"> </div>

 <div class="form-group{{ $errors->has('cls') ? ' has-error' : '' }}">
  
   <div style=" margin-bottom:20px; margin-left:5%; " class="rstclass"> <label style="width:200px;">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Faculty:&nbsp;</label> 
   <select name="cls" id="cls">
   <option  value="Select"> Select</option>
   @foreach($faculty as $rst)
   <option value="{!!$rst->falId !!}"> {!!$rst->faculty !!}</option>
   @endforeach
   
    
   
   </select> 
   
   <div id="error-cls" style=" margin-top:10px;float:right; margin-right:20%;"  class="mainbody"> </div>
  
   </div>
   
   </div>
   
   
   
   <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px;">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Department:&nbsp; </label> 
   <select name="term" id="term">
   <option  value="Select"> Select</option>
     
    
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; float:">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Course: &nbsp;</label> 
   <select name="subject" id="subject" onChange="subjests()">
   
   <option  value="Select">Select</option>
     
   
   </select>
   
   <div id="error-subject" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   
    </div></div>
   
   
  <!-- SECTION STARTS HERE  -->
  
 
  <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; float:"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Month:&nbsp;</label>  
   <select name="section" id="section"  >
   
   <option  value="Select">Select </option>
    
   <option value="Janaury">Janaury</option>
    <option value="February">February</option>
   <option value="March">March</option>
   <option value="April">April</option>
   <option value="May">May</option>
   <option value="June">June</option> 
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
   </select>
   
   <div id="error-section" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
 
 
    
    </div></div>
    
    
     
    
     <div style=" margin-bottom:25px;margin-top:10px; margin-left:5%; " class="rstclass"> <label style=" float:left;margin-top:10px; width:190px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year (YYYY): &nbsp;&nbsp;  </label>
                            
  <div class="col-md-7" style="width:380px;" >
 <input id="txtYear" type="text" class="form-control" name="txtYear" value="{{ old('txtYear') }}" required autofocus autocomplete="off" > 
    
    
   
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>
    
    
    
    
    
    
    <div style=" margin-bottom:25px;margin-top:10px; margin-left:15%; " class="rstclass"> 
                            
  <div class="col-md-6" style="width:340px;" >
  <label style=" margin-top:10px; " for="optHide">&nbsp;No of Option 4:</label>
  <input name="optionE" type="radio" id="optHide" onClick="hideOption()" value="4"  checked="checked" />  &nbsp; &nbsp;
   <label style="margin-top:10px; " for="optShow">&nbsp;No of Option 5:</label>
   <input name="optionE" type="radio" id="optShow" onClick="showOption()"   /> 
    
    
   
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>
    
    
   
   
   </div>
   
    <!-- QUESTION SECTION STARTS HERE -->
      
  <div id="ques" class="result_bg " >   
   
   <div  id="error-Msg-page" class="top-page" style="text-align:center;">  </div>
   
 
                            <label style="width:200px;">Question: &nbsp;</label>
                            <div  style="height:auto;">
       <textarea name="ckview" cols="20" rows="4" class="form-control" id="ckview"  value="{{ old('ckview') }}"required > {{ old('ckview') }} </textarea>
                                 
                            
                        </div> 
          </div>              
                       
                       
           <!-- QUESTION OPTION SECTION STARTS HERE --> 
                       
                       <div id="questionOption" class="result_bg "  >  
                        <div  id="error-page" class="top-page" style="text-align:center;"> 
                         
                         
                               
                        </div>
                        
                        
                  <div id="errorReg" style="text-align:center; font-weight:bold;"> </div>
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}" >
                            <label for="optionA" class="col-md-4 control-label " style="margin-top:10px;" >Option A: &nbsp;</label>

        <div class="col-md-6" style="margin-top:10px;">
          <input id="optionA" type="text" class="form-control" name="optionA" value="{{ old('optionA') }}" required autofocus autocomplete="off">

                                
                            </div>
                        </div>
                        
                        
                        
                        
                    <div style=" margin-top:10px;float:right; margin-right:12% "  class="mainbody">
     <label for="A">Check Answer  </label>
     <input name="A" type="checkbox" value=""   onclick="ACheck()" id="A" utocomplete="off"/> 
     
     
     </div>    
                        
                        
                         
                         <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
                            <label for="optionB" class="col-md-4 control-label" style="margin-top:10px;">Option B: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
      <input id="optionB" type="text" class="form-control" name="midName" value="{{ old('optionB') }}" required autofocus autocomplete="off">

 
                                
                            </div>
                        </div>  
                        
                        
                        
       <div style=" float:right; margin-right:12%; margin-top:15px;" class="mainbody">
     <label for="B">Check Answer  </label>
     <input name="B" type="checkbox" value=""  onclick="BCheck()" id="B" utocomplete="off"/> 
     </div>    
                        
                        
                        
                        
                      <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
                            <label for="optionC" class="col-md-4 control-label" style="margin-top:10px;">Option C: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
                                <input id="optionC" type="text" class="form-control" name="optionC" value="{{ old('optionC') }}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>   
                        
                        
                       <div style=" float:right; margin-right:12%; margin-top:15px;" class="mainbody">
     <label for="C">Check Answer  </label>
     <input name="C" type="checkbox" value=""  onclick="CCheck()" id="C" utocomplete="off"/> 
     </div>  
                             
   
   <div class="form-group{{ $errors->has('optionD') ? ' has-error' : '' }}"   >
                            <label for="optionD" class="col-md-4 control-label" style="margin-top:10px;">Option D: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
                                <input id="optionD" type="text" class="form-control" name="optionD" value="{{ old('optionD') }}" required autofocus autocomplete="off" >

 
                               
                            </div>
                        </div>   
                        
                        
                      <div style=" float:right; margin-right:12%; margin-top:15px;" class="mainbody">
     <label for="D">Check Answer  </label>
     <input name="D" type="checkbox" value=""   onclick="DCheck()" id="D" utocomplete="off"/> 
     </div> 
     
     
       
     
  <!-- OPTION E STARTS HERE     -->   
     <div id="optE" class="hide_question">
    <div class="form-group{{ $errors->has('optionE') ? ' has-error' : '' }}"   >
                            <label for="optionE" class="col-md-4 control-label" style="margin-top:10px;">Option E: &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
                                <input id="optionE" type="text" class="form-control" name="optionE" value="{{ old('optionE') }}" required autofocus autocomplete="off" >

 
                               
                            </div>
                        </div>   
                        
                        
                      <div style=" float:right; margin-right:12%; margin-top:15px;" class="mainbody">
     <label for="E">Check Answer  </label>
     <input name="E" type="checkbox" value=""   onclick="ECheck()" id="E" utocomplete="off"/> 
     </div>  
     </div>
     
     <!-- END OF OPTION E -->   
                        
                        
                        <div  class="hide_question" >
                            <label for="answer" class="col-md-4 control-label" style="margin-top:10px;">Aswer: &nbsp;</label>
                        <div class="col-md-6" style="margin-top:10px;">
                                <input id="answer" type="text" class="form-control" name="answer" value="{{ old('answer') }}" required autofocus autocomplete="off" >

                               
                                
                                 
                            </div>
                        </div>      
                        
                        <div class="form-group{{ $errors->has('mark') ? ' has-error' : '' }}"   >
                            <label for="mark" class="col-md-4 control-label" style="margin-top:10px;">Mark: &nbsp;</label>
                        <div class="col-md-6" style="margin-top:10px;">
                                <input id="mark" type="text" class="form-control" name="mark" value="{{ old('mark') }}" required autofocus autocomplete="off" >

                                 
                                 
                            </div>
                        </div>   
                           
   
   
 
 <div style="clear:both; height:10px;"> </div> 
 

</div>

<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">  
<input name="butBack" id="butBack" type="button" value="<<&nbsp;Back" class="but" onClick="window.location.href='../question'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
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
 
  
  
  
  
  
   
  
  
  
  
  $("#cls").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	  //document.getElementById('txtSearch').value='';
	 
	var ctr =0;
	 
	  
	  if($("#cls").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty  !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	    
	   
	   
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
         data:{"_token":$('#signup-token').val(),"faculty":$("#cls").val()},
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
				
				  
				$("#term").html(option);
	  
			
			
		 
	        //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			

 
 
 
 
 
 
 
 
 $("#term").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  
	  if($("#cls").val() == "Select")
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
	  
	    
	 
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
//var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray);
	  
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-fal-dpt-course',
         data:{"_token":$('#signup-token').val(),"falId":$("#cls").val(),"dptId":$("#term").val()},
		 processData:"false",
         success: function(data) {
  
   var sel="Select";
			 var option='';
			 option ='<option value="Select">'+sel+'</option>';
			
			  	 
				 for (i=0;i < data.length;i++)
				{
				 
					option+='<option value ="'+data[i].cosId +'">'+data[i].cosId +'&ensp;-&nbsp;'+data[i].course +'</option>';
					 
				} 
				 
				 
				$("#subject").html(option);
	  
	   
					  
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
	
	 $("#error-cls").html("");
	 $("#error-term").html("");
	 $("#error-subject").html("");
	 if(document.getElementById('cls').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Class !! &nbsp;</span>';
	  $("#error-cls").html(errors);
		ctr++;
	}
	
	 if(document.getElementById('term').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Term !!  &nbsp;</span>';
	  $("#error-term").html(errors);
		ctr++;
	}
	
	 if(document.getElementById('subject').value =='Select')
	{
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Subject !! &nbsp;</span>';
	  $("#error-subject").html(errors);
		ctr++;
	}
	
	
	if(document.getElementById('section').value =='Select')
	{
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Month !! &nbsp;</span>';
	  $("#error-section").html(errors);
		ctr++;
	}
	
	if(document.getElementById('txtYear').value =='')
	{
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Year Value is Required !! &nbsp;</span>';
	  $("#error-year").html(errors);
		ctr++;
	}
	  
	  $("#error-Msg-page").html("");
	  if($("#ckview").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Question Value is required !! &nbsp;</span>';
	  $("#error-Msg-page").html(errors);
		ctr++;
	}  
	
	
	$("#error-page").html("");
	document.getElementById('error-page').style.height="auto";
	if($("#optionA").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Option A Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	if(document.getElementById('optionB').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Option B Value is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	if(document.getElementById('optionC').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Option C Value is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	if(document.getElementById('optionD').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Option D Value is required. !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	 
	 
	if(document.getElementById('optShow').value =='5' && document.getElementById('optionE').value =='')
	{
		 
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Option E Value is required. !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	
	
	
	if(document.getElementById('mark').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Mark Value is required. !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	
	 
	
	if(document.getElementById('answer').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Answer Value is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
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
	
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	  dtArray.push({
			 cls:$("#cls").val(),
			term:$("#term").val(),
			subject:$("#subject").val(),
			month:$("#section").val(),
			year:$("#txtYear").val(),
			month:$("#section").val(),
			ckview:$("#ckview").val(),
			optionA:$("#optionA").val(),
			optionB:$("#optionB").val(),
			optionC:$("#optionC").val(),
			optionD:$("#optionD").val(),
			optionE:$("#optionE").val(),
			answer:$("#answer").val(),
			mark:$("#mark").val() 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"insert-Questions",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
    var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successfully Saved &nbsp;</span>';
       $("#success-page").html(saved);
	   
	    if(data.trim()=='success')
	   {
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