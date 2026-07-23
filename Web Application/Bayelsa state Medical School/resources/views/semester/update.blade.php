 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Semester Page</span>

<meta name="_token" content="{!! csrf_token() !!}"/>
@stop

 
@section('content')

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 

 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>
   <div style="width:90%; max-width:795px; height:auto;" >              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px;" >Semester:* &nbsp;</label>

        <div class="col-md-9" >
          <input id="optionA" type="text" class="form-control" name="optionA" value="{!!$query[0]->semester!!}" required autofocus autocomplete="off">

                      <input id="id" type="hidden" class="form-control" name="id" value="{!!$query[0]->semId !!}" required autofocus autocomplete="off" >           
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                         
                         
                        
                        
                        
           
                        
                        
                        
                        
                     
                        
                        
                          
                        
                        
                        
                       
                             
   
    
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../semester'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
	 
	  
	 
	var ctr =0;
	
 	
	  
	 
	  
	
	
	$("#error-page").html("");
	document.getElementById('error-page').style.height="auto";
	if($("#optionA").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Semester is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	 
	 
	 
	
	 
	
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  dtArray.push({
		      
			optionA:$("#optionA").val(), 
			 
			id:$("#id").val()
			});
			
	  
	   
	  
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'/editSemester/{{$query[0]->semId}}',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
   var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successefully Saved &nbsp;</span>';
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
   
   
   
  @stop
 

 



 


 
 
 
      

</body>
</html>
 