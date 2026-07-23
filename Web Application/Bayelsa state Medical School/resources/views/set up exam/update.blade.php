
  @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Set Up Exam Page</span>

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
	 
	  
	/*
	var answer='{{-- $query[0]->answer --}}'
	
	var optValues='{{--$query[0]->optionE --}}'
 
*/
	 
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
	 
	 document.getElementById('insertQues').style.height='310px';
	
	  //.height='150px'
	 
	 } 

</script>

<meta name="_token" content="{!! csrf_token() !!}"/>

</head>

<body onLoad="CheckAnswer()">
<div id="container">

 
 
<div id="container_text_Admin" class="rstAdmin result">
 
<div id="insertQues" class="result_bg " >  
<div id="success-page" style="height:auto; text-align:center;"> </div>

<div id="error-page"> </div>

 <div class="form-group{{ $errors->has('cls') ? ' has-error' : '' }}"> 
   <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px;"> Faculty:&nbsp;</label> 
   <select name="cls" id="cls">
  
  
   <option value="{!!$query[0]->falId !!}">  {!!$query[0]->faculty !!}</option>
   
    @foreach($faculty as $rst)
   
   <option value="{!!$rst->falId !!}"> {!!$rst->faculty !!}</option>
    
   @endforeach  
   
   
   </select> 
   
   <div id="error-cls" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div>
   
   </div>
   
   
   
   <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px;"> Department:&nbsp;</label> 
   <select name="term" id="term">
     
   
     
   <option value="{!!$query[0]->dptId !!}">  {!!$query[0]->department !!}</option>
   
   
   </select> 
   
   <div id="error-term" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   </div></div>
   
   
   
   
   
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
    <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass"> <label style="width:200px; float:"> Course: &nbsp;</label> 
   <select name="subject" id="subject">
   
    <option value="{!!$query[0]->cosId !!}">  {!!$query[0]->course !!}</option>
   
   
   
   </select>
   
   <div id="error-subject" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
  
   
    </div></div>
   
   
   
    <!-- SECTION STARTS HERE  -->
  
  
  
 
  <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
 <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; float:">  Month:&nbsp;</label>   
   <select name="section" id="section"  >
     
    
   <option value=" {!!$query[0]->examTest!!}"> {!!$query[0]->examTest!!}</option>
   
   
   <option value="Exam">Exam</option>
    <option value="Test">Test</option> 
   </select>
   
   <div id="error-section" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
 
 
    
    </div></div>
    
    
     
     
    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
  <div style=" margin-bottom:20px;margin-left:5%; " class="rstclass" > <label style="width:200px; float:"> Exam Duration(Time):&nbsp;</label> 
   <select name="section" id="duration" class="select"  >
     
    
   <option value=" {!!$query[0]->examTest!!}"> {!!$query[0]->duration!!}</option>
   
   
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
          <input id="date" type="date" class="form-control" name="date"  value="{!!$query[0]->date!!}" required autofocus autocomplete="off" style=" text-align:center">
 
                                
                            </div>
                                <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>

                        </div>             
    
    
    </div>
    
    
    
    
    
    
    <div style="clear:both;"></div>
    
     <div style=" margin-bottom:25px;margin-top:10px; margin-left:5%; " class="rstclass"> <label style=" float:left;margin-top:10px; width:190px; "> No of Marks Per Question: &nbsp;&nbsp;  </label>
                            
  <div class="col-md-7" style="width:380px;" >
 <input id="optionC" type="text" class="form-control" name="optionC" value="{!!$query[0]->markPerQuestion!!}" required autofocus autocomplete="off" > 
    
    
   
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>
    
    
    
    
    
    
     <div style="clear:both;"></div>
    
     <div style=" margin-bottom:25px;margin-top:10px; margin-left:5%; " class="rstclass"> <label style=" float:left;margin-top:10px; width:190px; "> No of Question: &nbsp;&nbsp;  </label>
                            
  <div class="col-md-7" style="width:380px;" >
 <input id="optionB" type="text" class="form-control" name="optionB" value="{!!$query[0]->quesNo!!}" required autofocus autocomplete="off" > 
    
    
   
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>
    
     
     
     
     
     
     
    
    
   
   
   </div>
   
   
   
   
    <!-- QUESTION SECTION STARTS HERE -->
     
            
            
            
     
                           
   
   
 
 <div style="clear:both; height:10px;"> </div> 
 

</div>

<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="<<&nbsp;Back" class="but" onClick="window.location.href='../examTest'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input name="butSubmit" id="butSubmit" type="button" value="Edit" class="but" />
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
 </div>

 
  </div>
   
   
   
  <script>
	 
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
		
$(function() {
 
 
 
 
 
 
 
  $("#cls").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	
	 
	 
	var ctr =0;
	 
	   
	  if($("#cls").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
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
         url:'../search-faculty',
         data:{"_token":$('#signup-token').val(),"clsId":$("#cls").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
	  
	   
	    var sel="Select";
			 var option='';
			 var opt='';
			 opt ='<option value="Select">'+sel+'</option>';
			
				/*  
				for (i=0;i < data.length;i++)
				{
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				}
				*/
				
				
				
				 
				for (var i=0;i < data.rstDpt.length;i++)
				{
				 if(data.rstDpt[i].department != 'NA')
				{	
				 opt+='<option value ="'+ data.rstDpt[i].dptId +'">'+data.rstDpt[i].department +'</option>';
				}
				}
				  
				$("#term").html(opt);
	   
	   
	    
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
	 
	  
	  if($("#term").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#cls").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
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
         url:'../search-faculty-department',
         data:{"_token":$('#signup-token').val(),"clsId":$("#cls").val(),"terms":$("#term").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
	    
	    var sel="Select";
			 var option='';
			 var opt='';
			 opt ='<option value="Select">'+sel+'</option>';
			
				/*  
				for (i=0;i < data.length;i++)
				{
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				}
				*/
				
				
				
				 
				for (var i=0;i < data.rstDpt.length;i++)
				{
				  
				 opt+='<option value ="'+ data.rstDpt[i].cosId +'">'+data.rstDpt[i].course +'</option>';
				 
				}
				  
				$("#subject").html(opt);
	   
	   
	   
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
 
 
 
 //SUBJECT, CLASS AND TERM SESSION START HERE
 
  
 
 
 
 
 
 
 
 
 
 
 
 
 
  
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
	
	 
	  
	
	
	
	 
	
	
	
	if(document.getElementById('optionC').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; No Mark Per Question Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	} 
	
	 if(document.getElementById('duration').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Exam Duration Value is required !! &nbsp;</span>';
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
	
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	 
	  
	  dtArray.push({
			 cls:$("#cls").val(),
			term:$("#term").val(),
			subject:$("#subject").val(),
			duration:$("#duration").val(),
			 date:$("#date").val(),
			 section:$("#section").val(), 
			markPerQuestion:$("#optionC").val() ,
			quesNo:$("#optionB").val()  
			});
			
	
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'/edit-examTest/{{$query[0]->exmId}}',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
   var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successefully Saved &nbsp;</span>';
       $("#success-page").html(saved);
	 console.log(data.success);
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
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