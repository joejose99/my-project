 
 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Fees Page</span>

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop




@section('content')

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 

 <div id="success-page" style="text-align:center; font-weight:bold;"> </div>
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>
   <div style="width:90%; max-width:795px; height:auto;" >              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px; " >Fees:* &nbsp;</label>

        <div class="col-md-9" >
          <input id="optionA" type="text" class="form-control" name="optionA" value="{{ old('optionA') }}" required autofocus autocomplete="off">

                                
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Fess Name:* &nbsp;</label>

                            <div class="col-md-9" >
                              <input id="optionB" type="text" class="form-control" name="optionB" value="{{ old('optionB') }}" required autofocus autocomplete="off">
 
                                
                            </div>
                        </div>  
                        
                        
                        <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Fess Description:* &nbsp;</label>

                            <div class="col-md-10" >
                              <textarea name="txtOptionB" rows="5" autofocus="autofocus" required="required" class="form-control" id="txtOptionB" autocomplete="off">{{ old('txtOptionB') }}</textarea>

 
                                
                            </div>
                        </div>  
                        
                         
                        
                        
                        
           
                    <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Program:* &nbsp;</label>

                 <div class="col-md-9" >
           <select name="term" class="term" id="term">
                               
                            <option  value="Select"> Select</option>
                                @foreach($program as $st)
   <option value="{!! trim($st->prgId )!!}"> {!! $st->program !!} </option>
   @endforeach 

                          </select>     
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                        
                        
                           
                      <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Level:* &nbsp;</label>

                 <div class="col-md-9">
           <select name="cls" class="dpt" id="dpt">
                               
                               <option  value="Select">Select</option>
   @foreach($level as $st)
   <option value="{!! trim($st->levId )!!}"> {!! $st->level !!} </option>
   @endforeach 
                               
                               </select>

                               
                               
                            </div>
                        </div>   
                        
                        
                        
                       
                        
                        
                          
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../fees'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;Fees is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	 var mk = $("#optionA").val();
	// alert(parseInt(mk));
	 var mkInt=parseInt(mk);
	  if(isNaN(mkInt) && $("#optionA").val() !='')
	   {
		   var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Enter Number for Fees !! &nbsp;</span>';
	  $("#error-page").append(errors);
	  
	  ctr++;
	   }
	   
	 if($("#optionB").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;Fees Name is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	if($("#txtOptionB").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;Fees Description is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	 if(document.getElementById('term').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Program !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	 
	  if(document.getElementById('dpt').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Level !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	
	 
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  dtArray.push({
		     txtOptionB:$("#txtOptionB").val(),
			 optionB:$("#optionB").val(),
			  dpt:$("#dpt").val(),
			 term:$("#term").val(),
			optionA:$("#optionA").val() 
			 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"create_fees",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
     var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; '+ data +' &nbsp;</span>';
       $("#success-page").html(saved);
	   alert(data);
	   
	   if(data == 'Data Successfully Saved')
	   {
	   
	   document.getElementById('optionA').value=''; 
	   ocument.getElementById('optionB').value=''; 
	   ocument.getElementById('txtOptionB').value=''; 
	    
		  /*
		  document.getElementById('term').value='Select';
		   document.getElementById('dpt').value='Select';
		   */
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