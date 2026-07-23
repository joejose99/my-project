@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  <span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1> 

<meta name="_token" content="{!! csrf_token() !!}"/>
 
 
@stop

 
 
@section('content')
 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 
 
 <script language='javascript'>
function showPopupPage(popUpPage)
{  
	 
	window.open(popUpPage,'window',"top=500,left=500, width=4000,height=4000,toobar=0,scrollbars=0,location=0,statusbar=0,titlebar=0,menubar=0,resizable=0,fullscreen=yes");
}

 
//height=screen.availHeight,width=screen.availWidth


 function examOption()
{
	 
	var val =document.getElementById('optExam').value="Exam";
	 
	 document.getElementById('optExam').checked='true';
	 
	 document.getElementById('optTest').checked='';
	 
	 document.getElementById('opts').value ='Exam';
	 location.reload();
}

function testOption()
{
	 
	var val =document.getElementById('optTest').value="Test";
	document.getElementById('optTest').checked ='true';
	document.getElementById('optExam').checked="";
	
	document.getElementById('opts').value ='Test';
	
	 // document.getElementById('optExam').checked='false';
	  
	 //callTestOption();
}
 
</script>
 
  <div class="panel panel-default">
                <div class="panel-heading">
                
                
                  <span class="school-heading"><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Set Exam</span>
                  
                   


 
</div>
 
<body >
 
 <div id="container">
 
  
<form class="form-horizontal" role="form" method="POST" action="{{ route('setExam') }}">
                    
                        {{ csrf_field() }}
                        
<div id="container_setExam">
   
   <div  class="printout" >
   
    
   
   <div  class="rstclass" style="color:#C81E0B; text-align:center;">  @if(Session::has('flash_message'))
					{{Session::get('flash_message')}}
						@endif </div>
   <div class="result_bg" style="margin-bottom:20px;">
   
   
   
   <!--
     
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
    <div style=" margin-bottom:20px; " class="rstclass"> <label style="width:200px; float:">Faculty: &nbsp;</label> 
   <select name="subject">
   
   <option  value="Select">Select </option>
  {{--  @foreach($faculty as $rst) --}}
   <option value="{{--!!$rst->falId !! --}}">  {{--{!! $rst->faculty !!}--}} &nbsp; - &nbsp; {{--{!! $rst->program !!}--}}</option>
  {{-- @endforeach --}}
   
   </select>
   
   @if($errors->has('subject'))
      <span class="help-block" style="float:right;">
        <strong>{{ $errors->first('subject') }}</strong>
           </span>
                 @endif
   
    </div></div>
 
   
   
    
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
    <div style=" margin-bottom:20px; " class="rstclass"> <label style="width:200px; float:">Department: &nbsp;</label> 
   <select name="dpt" id="dpt">
   
   <option  value="Select">Select </option>
    
   
   </select>
   
   @if($errors->has('subject'))
      <span class="help-block" style="float:right;">
        <strong>{{ $errors->first('subject') }}</strong>
           </span>
                 @endif
   
    </div></div>
   
   
   
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   <div style=" margin-bottom:20px; " class="rstclass"> <label style="width:200px; float:">Program: &nbsp;</label> 
   <select name="dpt" id="LGA">
   
   <option  value="Select">Select </option>
    
   
   </select>
   
   @if($errors->has('subject'))
      <span class="help-block" style="float:right;">
        <strong>{{ $errors->first('subject') }}</strong>
           </span>
                 @endif
   
    </div></div>
   
   -->
   
   <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   
   
   <div style=" margin-bottom:25px;margin-top:10px; margin-left:15%; " class="rstclass"> 
                            
  <div class="col-md-6" style="width:340px;" >
  
  <label style=" margin-top:10px; " for="optExam">&nbsp;Exam:</label>
  <input name="optionE" type="radio" id="optExam"  onClick="examOption()" value="Exam"  checked="checked" />  &nbsp; &nbsp;
  
   <label style="margin-top:10px; " for="optTest">&nbsp;Test:</label>
   <input name="optionE" type="radio" id="optTest" onClick="testOption()" value="Test"  /> 
   
   <input name="options" type="hidden" id="opts" value="Exam"  /> 
    
    
   
  
   </div>
    <div id="error-year" style=" margin-top:10px;float:right; margin-right:20% "  class="mainbody"> </div>
    </div>
   
   
   
    <div style=" margin-bottom:20px; " class="rstclass"> <label style="width:120px; float:">Course: &nbsp;</label> 
   <select name="subject" id="subject">
   
   <option  value="Select">Select </option>
    @foreach($query as $rst)
  @if(trim($Student['examDate']) == trim($rst->examDate) ) 
   <option value="{!!$rst->cosId !!}">{!!$rst->cosId !!}&nbsp;-&nbsp; {!! $rst->course !!}</option>
  @endif
   @endforeach
   
   </select>
   
   @if($errors->has('subject'))
      <span class="help-block" style="float:right;">
        <strong>{{ $errors->first('subject') }}</strong>
           </span>
                 @endif
   
    </div></div>
   
   
   </div>
   
   </div>
   
   
  
  <div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:55px; text-align:center;  margin-bottom:10px;">    
 <input name="butSubmit" type="submit" value="Submit" class="but" />
   <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
  
 </div>

 
  
     </div>
     <div style="clear:both;"> </div>
     
     </form>
     
     <script type="text/javascript">
	 
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
		
$(function() {
 
  
 $("#LGA").change(function(ev) {
	  ev.preventDefault();
     $.ajax({  
	    type:"POST",
         url:"lga",
         data:{"_token":$('#signup-token').val(),"LGA":$("#LGA").val()},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
  
			 var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				 
				for (var i=0;i < data.length;i++)
				{
					 
					 
					option+='<option value ="'+data[i].schId+'">'+data[i].school+'</option>';
					
				 
				}
				
				$("#school").html(option);
			
            
         },
		  error: function(data,  errorThrown) {
        //this is going to happen when you send something different from a 200 OK HTTP
       
	   var errors
	  errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  $("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });



 

 $("#optTest").click(function(ev) {
	 // ev.preventDefault();
	  
	   
	   var dtArray=[];
	 
	  
	 
	 
	var ctr =0;
	
 
	
	
	if(document.getElementById('optTest').value =='Exam')
	{
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Test Option !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	  document.getElementById('optTest').checked =='True' 
	
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	   document.getElementById('optTest').value="Test"
	   
	  dtArray.push({
			 
			optTest:$("#optTest").val() 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
	  
	  
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'setExam-test',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
   //var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successefully Saved &nbsp;</span>';
      // $("#success-page").html(saved);
	  
	  
	   var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				 
				for (var i=0;i < data.length;i++)
				{
					// console.log(data.rstSch[i].schId); 
					 
					option+='<option value ="'+ data[i].cosId +'">'+data[i].course
					+'</option>';
					
				 
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
	
 
	
	
	if(document.getElementById('subject').value =='Select')
	{
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Course !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	 
	alert(document.getElementById('optTest').value)
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	   
	  dtArray.push({
			 
			subject:$("#subject").val(),
			optTest:$("#optTest").val() 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'setExam',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
   //var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successefully Saved &nbsp;</span>';
      // $("#success-page").html(saved);
	  
	  showPopupPage(popUpPage);
	  
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
     </div>

</body>
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