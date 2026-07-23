 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Set Up Exam Page</span>

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
 
 
 
 
 
 
  

function exam()
{
	//document.getElementById('optE').className="show_question";
	
	if(document.getElementById('section').value =='Exam')
	{
	 
	 document.getElementById('displayExam').className="hide_question";
	  document.getElementById('insertQues').style.height='auto';
	
	 } 
	 
	 if(document.getElementById('section').value =='Test')
	{
	 
	 document.getElementById('displayExam').className="show_question";
	 
	 document.getElementById('insertQues').style.height='350px';
	
	  //.height='150px'
	 
	 } 
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

 <div class="form-group{{ $errors->has('cls') ? ' has-error' : '' }}">
  
   <div style=" margin-bottom:20px; margin-left:5%; " class="rstclass"> <label style="width:200px;">Faculty:&nbsp;&nbsp;</label> 
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
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px;">Department:&nbsp;&nbsp; </label> 
   <select name="term" id="term">
   <option  value="Select"> Select</option>
     
    
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; float:">Course: &nbsp;&nbsp;</label> 
   <select name="subject" id="subject" onChange="subjests()">
   
   <option  value="Select">Select</option>
     
   
   </select>
   
   <div id="error-subject" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   
    </div></div>
   
   
  <!-- SECTION STARTS HERE  -->
  
 
  <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; float:"> Test Type:&nbsp;</label>  
   <select name="section" id="section"  onChange="exam()" >
   
   <option  value="Select">Select </option>
    
   <option value="Exam">Exam</option>
    <option value="Test">Test</option> 
   </select>
   
   <div id="error-section" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
 
 
    
    </div></div>
    
     
    
    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; float:"> Exam Duration(Time):&nbsp;</label>  
   <select name="duration" id="duration" class="mnu" >
   
   <option  value="Select">Select </option>
    
   <option value="1:00">1:00</option>
    <option value="1:30">1:30</option> 
     <option value="1:45">1:45</option> 
      <option value="2:00">2:00</option> 
      <option value="2:30">2:30</option> 
      <option value="2:45">2:45</option> 
   </select>
   
   <div id="error-section" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
 
 
    
    </div></div>
    
    
    
    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}" >
   
    <div style=" margin-bottom:20px;margin-left:5%; " class="hide_question rstclass" id="displayExam"> <label style="width:190px; float:left;margin-top:7px;">Date: &nbsp;&nbsp;</label> 
    

        <div class="col-md-6" style="margin-top:5px; ">
          <input id="date" type="date" class="form-control" name="date"  value="{{ old('date') }}" required autofocus autocomplete="off" style=" text-align:center">
 
                                
                            </div>
                                <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>

                        </div>             
    
    
    </div>
    
    
    
    
    
    
    <div style="clear:both;"></div>
    
     <div style=" margin-bottom:25px;margin-top:10px; margin-left:5%; " class="rstclass"> <label style=" float:left;margin-top:10px; width:190px; "> No of Marks Per Question: &nbsp;&nbsp;  </label>
                            
  <div class="col-md-7" style="width:380px;" >
 <input id="optionC" type="text" class="form-control" name="optionC" value="{{ old('optionC') }}" required autofocus autocomplete="off" > 
    
    
   
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>
    
    
    
    
    
    
     <div style="clear:both;"></div>
    
     <div style=" margin-bottom:25px;margin-top:10px; margin-left:5%; " class="rstclass"> <label style=" float:left;margin-top:10px; width:190px; "> No of Question: &nbsp;&nbsp;  </label>
                            
  <div class="col-md-7" style="width:380px;" >
 <input id="optionB" type="text" class="form-control" name="optionB" value="{{ old('optionB') }}" required autofocus autocomplete="off" > 
    
    
   
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>
    
    
    
    
    
     
    
    
   
   
   </div>
   
    <!-- QUESTION SECTION STARTS HERE -->
      
  
                       
           
                           
   
   
 
 <div style="clear:both; height:10px;"> </div> 
 

 

<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">  
<input name="butBack" id="butBack" type="button" value="<<&nbsp;Back" class="but" onClick="window.location.href='../examTest'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
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
				 
					option+='<option value ="'+data[i].cosId +'">'+data[i].cosId +' &nbsp;-&nbsp; '+data[i].course +'</option>';
					 
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
	 
	 
	var ctr =0;
	
 	 $("#error-cls").html("");
	 $("#error-term").html("");
	 $("#error-subject").html("");
	 
	 
	 $("#error-page").html("");
	document.getElementById('error-page').style.height="auto";
	
	 if(document.getElementById('cls').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Faculty !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	 if(document.getElementById('term').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Department !!  &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	 if(document.getElementById('subject').value =='Select')
	{
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Course !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	if(document.getElementById('section').value =='Select')
	{
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Test Type !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	 
	 if(document.getElementById('duration').value =='Select')
	{
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Test Duration !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	  
	
	
	
	 
	
	
	
	if(document.getElementById('optionC').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; No Mark Per Question Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	} 
	
	 
	
	
	 var mk = $("#optionC").val();
	// alert(parseInt(mk));
	 var mkInt=parseInt(mk);
	  if(isNaN(mkInt) && $("#mark").val() !='')
	   {
		   var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Enter Number for No Of Mark !! &nbsp;</span>';
	  $("#error-page").html(errors);
	  
	  ctr++;
	   }
	
	
	
	if(document.getElementById('optionB').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Number of Question Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	} 
	
	 
	 
	 
	
	 var mk = $("#optionB").val();
	// alert(parseInt(mk));
	 var mkInt=parseInt(mk);
	  if(isNaN(mkInt) && $("#mark").val() !='')
	   {
		   var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Enter Number for No of Question !! &nbsp;</span>';
	  $("#error-page").html(errors);
	  
	  ctr++;
	   }
	
	
	if(document.getElementById('duration').value =="Select")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Exam Duration Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
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
			 date:$("#date").val(),
			 section:$("#section").val(), 
			  duration:$("#duration").val(), 
			markPerQuestion:$("#optionC").val() ,
			quesNo:$("#optionB").val() 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"insert-examTest",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
    var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successfully Saved &nbsp;</span>';
       $("#success-page").html(saved);
	   
	   
	   
	
	   
	    if(data.trim()=='success')
	   {
	    
	    
	   document.getElementById('optionB').value='';
	   document.getElementById('optionC').value='';
	    
	  document.getElementById('optionB').value='';
	document.getElementById('optionC').value='';
	         
      
	   }
	 
	 if(data.trim() != 'success')
		{
			saved= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;'+ data +'&nbsp;</span>';
       $("#success-page").html(saved);
		}
	 
		
		alert(data);	
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