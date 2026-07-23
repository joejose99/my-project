 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Total Result  Page</span>

<meta name="_token" content="{!! csrf_token() !!}"/>
@stop

 
@section('content')

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 

 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>
   <div style="width:90%; max-width:795px; height:auto;" >              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px;" >Mark:* &nbsp;</label>

        <div class="col-md-9" >
          <input id="optionA" type="text" class="form-control" name="optionA" value="{!!$query[0]->mark!!}" required autofocus autocomplete="off">
  <input id="id" type="hidden" class="form-control" name="id" value="{!!$query[0]->acdId !!}" required autofocus autocomplete="off" >
    
    
    
    <input id="stdId" type="hidden" class="form-control" name="stdId" value="{!!$query[0]->stdId !!}" required autofocus autocomplete="off" >
    <input id="oldMak" type="hidden" class="form-control" name="oldMak" value="{!!$query[0]->mark !!}" required autofocus autocomplete="off" >
  
    <input id="userName" type="hidden" class="form-control" name="userName" value="{{ Auth::user()->name }}" required autofocus autocomplete="off" >
    
                <input id="userId" type="hidden" class="form-control" name="userId" value="{{ Auth::user()->id }}" required autofocus autocomplete="off" >
                     
                            </div>
                        </div>
                        
                        
            
            <div style="width:90%; max-width:795px; height:auto;" >              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px;" >Letter Grade:* &nbsp;</label>

        <div class="col-md-9" >
          <select name="grade" id="grade"  class="select">
   
   <option  value="{!!$query[0]->grade!!}">{!!$query[0]->grade!!}</option>
     <option  value="A">A</option>
      <option  value="B">B</option>
       <option  value="C">C</option>
    <option  value="D">D</option>
     <option  value="E">E</option>
      <option  value="F">F</option>
   </select>
   
                                
                            </div>
                        </div>            
                        
                        
                        
                        
                        
                      
                         
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;"> 
  
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../total-result'" />

 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




 <input name="butSubmit" id="butSubmit" type="submit" value="&nbsp;Edit&nbsp;" class="but" />
 
 
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"></div>

 
   </div>
   
   </div>


@section('css')

 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />

@stop

@section('js')
 
@stop

 
 
 
 
 
   
   
  <script>
	 
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
		
$(function() {
 
  
 $("#butSubmit").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	  
	 
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
	if($("#optionA").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Academic Session is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	 
	
	 /*
	 
	 if(document.getElementById('cls').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Head of Faculty !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	*/
	
	
	/* alert(new Date().toLocaleString());*/
	
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  dtArray.push({
		      cls:$("#cls").val(),
			optionA:$("#optionA").val(), 
			 grade:$("#grade").val(),
			 oldMak:$("#oldMak").val(),
			  stdId:$("#stdId").val(),
			   userName:$("#userName").val(),
			    userId:$("#userId").val(),
			id:$("#id").val()
			});
			
	  
	   
	  
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'/edit-total-result/{{$query[0]->totId}}',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
		if(data=='Succcess')
		{	 
   var saved= "<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; "+data +" &nbsp;</span>";
   }
   
   if(data=='Lectueres Is not in this Faculty!!!')
		{	 
   var saved= "<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; "+data +" &nbsp;</span>";
   }
   
   else
		{	 
   var saved= "<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; "+data +" &nbsp;</span>";
   }
   
  
       $("#error-page").html(saved);
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


 


 
 
 
      

</body>
</html>
 