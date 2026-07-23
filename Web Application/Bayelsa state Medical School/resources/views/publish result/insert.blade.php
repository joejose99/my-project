 
 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Faculty Page</span>

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop




@section('content')

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 

 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>
   <div style="width:90%; max-width:795px; height:auto;" >              
   
                        
                        
                       
                        
                        
                     <div style="width:90%; max-width:795px; height:auto;" >              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px;" >Date:* &nbsp;</label>

        <div class="col-md-9" >    
                        
                        
                    <input id="date" type="date" class="form-control" name="date"  value="{{ old('date') }}" required autofocus autocomplete="off" style=" text-align:center">
                    
                    
 
                       <input id="acdId" type="hidden" class="form-control" name="acdId" value="{!!$academic[0]->acdId !!}" required autofocus autocomplete="off">   
                        <input id="userName" type="hidden" class="form-control" name="userName" value="{{ Auth::user()->name }}" required autofocus autocomplete="off" >   
                        
                    <input id="userId" type="hidden" class="form-control" name="userId" value="{{ Auth::user()->id }}" required autofocus autocomplete="off" >           
                        
                        
          </div></div>              
                        
                        
             
              <div style="width:90%; max-width:795px; height:auto; margin-top:15px;" >              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px;" >Semester:* &nbsp;</label>

        <div class="col-md-9" >
          <select name="semId" id="semester"  class="select">
          
   <option value="Select"> Select</option>
   
    @foreach($semester as $rst)
   <option value="{!!$rst->semId !!}"> {!!$rst->semester !!}</option>
   @endforeach
      
   </select>
   
                                
                            </div>
                        </div>                       
                        
                         
                           
                        
                        
                        
           
                        
                        
                        
                      
                        
                        
                          
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../publish-result'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <input name="butSubmit" id="butSubmit" type="submit" value="&nbsp;Submit&nbsp;" class="but" />
 
 
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"></div>

 
   </div>
   
   </div>
   
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
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Academic Session Value is required !! &nbsp;</span>';
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
	
	 
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  
	 
	  
	  dtArray.push({
		      semId:$("#semester").val(),
			date:$("#date").val(), 
			acdId:$("#acdId").val(), 
			userName:$("#userName").val(),
			userId:$("#userId").val(),
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"create-publish-result-date",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
			 /*
    var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successfully Saved &nbsp;</span>';
       $("#error-page").html(saved);
	   alert('Data Successfully Saved'); */
	   
	   
	   
	    var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; '+ data +' &nbsp;</span>';
       $("#error-page").html(saved);
	   alert(data);
	   if(data == 'Data Successfully Saved')
	   {
	   document.getElementById('optionA').value='';
	   
	    } 
			
         },
		 error: function(data) {
         
	   console.log('Data Error');
	   alert('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
});
     </script>




 @stop
 
  
@section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
   
@stop

@section('js')


<!--
<script src="../js/jquery-3.4.1.js" ></script>
-->

 
 
 
 
@stop