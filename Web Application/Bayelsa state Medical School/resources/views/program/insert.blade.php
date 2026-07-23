 
 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Program Page</span>

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop




@section('content')

<script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 

 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>
   <div style="width:90%; max-width:795px; height:auto;" >              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px; " >Program:* &nbsp;</label>

        <div class="col-md-9" >
          <input id="optionA" type="text" class="form-control" name="optionA" value="{{ old('optionA') }}" required autofocus autocomplete="off">

                                
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                         
                         <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Details:* &nbsp;</label>

                            <div class="col-md-10" >
                              <textarea name="txtOptionB" cols="150" rows="5" autofocus="autofocus" required="required" class="form-control" id="txtOptionB" autocomplete="off">{{ old('txtOptionB') }}</textarea>

 
                                
                            </div>
                        </div>  
                        
                        
                        
           
                    <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Faculty:* &nbsp;</label>

                 <div class="col-md-9" >
           <select name="faculty" class="faculty" id="faculty">
                               
                            <option  value="Select"> Select</option>
                                @foreach($faculty as $st)
   <option value="{!! trim($st->falId )!!}"> {!! $st->faculty !!} </option>
   @endforeach 

                          </select>     
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                      <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Department:* &nbsp;</label>

                 <div class="col-md-9" >
           <select name="dpt" class="dpt" id="dpt">
                               
                               <option  value="Select">Select</option>
                             
                               </select>

                               
                               
                            </div>
                        </div>   
                        
                     
                        
                        <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Program Leader:* &nbsp;</label>

                 <div class="col-md-9"  >
           <select name="cls" class="cls" id="cls">
           <option  value="Select">Select</option>
                               
 @foreach($lecturer as $st)
   @if($st->fName  != "NA")
   <option value="{!! trim($st->lcrId )!!}"> {!! $st->fName !!} &nbsp;&nbsp; {!! $st->surname !!}</option>
   @endif
   @endforeach  
                               
                               </select>

                               
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                          <div  class="show_question" >
              <label for="answer" class="col-md-4 control-label" style="margin-top:15px; width:200px;">Honour:* &nbsp;</label>
                        <div class="col-md-9" >
                

                               <select name="term" class="title" id="term">
                               
                               <option  value="Select"> Select</option>
                               <option  value="Certificate"> Certificate</option>
                               <option  value="Diploma"> Diploma</option>
                               <option  value="BSc"> BSc</option>
                               <option  value="BM"> BM</option>
                               <option  value="BA"> BA</option>
                                <option  value="BEng"> BEng</option>
                                 <option  value="BEd"> BEd</option>
                                 <option  value="MSc"> MSc</option>
                                 <option  value="MBA"> MBA</option>
                                 <option  value="PhD"> PhD</option>
                               </select>



                                
                                 
                            </div>
                        </div>      
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../program'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <input name="butSubmit" id="butSubmit" type="submit" value="&nbsp;Submit&nbsp;" class="but" />
 
 
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"></div>

 
   </div>
   
   </div>
   
   <script>
	 
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
		
$(function() {
 
  
  
  
  
  
  $("#faculty").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty").val() == "Selcet")
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
         url:'search_prg',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
			
			
			 var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				for (i=0;i < data.length;i++)
				//{ 
				//for (var i=0;i < data.rstDpt.length;i++)
				{
					
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				}
				
				
				 
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
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Department Name is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	if(document.getElementById('txtOptionB').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Details is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	
	 if(document.getElementById('term').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Honour !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	/* 
	 if(document.getElementById('cls').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select  Program Leader!! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	*/
	
	  if(document.getElementById('faculty').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Faculty !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	 if(document.getElementById('dpt').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Department !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  dtArray.push({
		     cls:$("#cls").val(),
			 term:$("#term").val(),
			  faculty:$("#faculty").val(),
			  department:$("#dpt").val(),
			optionA:$("#optionA").val(),
			optionB:$("#txtOptionB").val()
			 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"create_program",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
     var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; '+ data +' &nbsp;</span>';
       $("#error-page").html(saved);
	   alert(data);
	   
	   if(data == 'Data Successfully Saved')
	   {
	   
	   document.getElementById('optionA').value='';
	   document.getElementById('txtOptionB').value='';
	    
		  document.getElementById('cls').value='Select';
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
      <link href='../ckeditor/plugins/chart/chart.css' rel='stylesheet'>

   
@stop

@section('js')

 <script src="{{ url('../ckeditor/ckeditor.js') }}"></script>
    <script>
	
	var ckview= document.getElementById("ckview");
	CKEDITOR.replace(ckview,options,{language:'en-gb',extraPlugins:'chart'});
	 
	</script>
<!--
<script src="../js/jquery-3.4.1.js" ></script>
-->

 
 
 
 
@stop