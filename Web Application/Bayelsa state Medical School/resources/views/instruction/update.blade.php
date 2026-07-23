@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  <span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1> 

 <meta name="csrf-token" content="{{ csrf_token() }}">
 
@stop

 
 
@section('content')
 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 
 <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
 
  <div class="panel panel-default">
                <div class="panel-heading">
                
                
                  <span class="school-heading"><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Set Exam</span>
                  
                   


 
</div>



<body >
<div id="container">

 
 
<div id="container_text_Admin" class="rstAdmin result">
 
  
<div id="success-page" style="height:auto; text-align:center;"> </div>
 
                       
                       
           <!-- QUESTION OPTION SECTION STARTS HERE --> 
                       
                       <div id="questionOption" class="result_bg "  >  
                        <div  id="error-page" class="top-page" style="text-align:center;"> </div>
                         
                        
                                
                                  
                                
                               
                        
                        
                        
                   
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}" >
                           
<label style="width:200px; text-align:center;">Instruction: &nbsp;</label>
        <div class="col-md-13">
        
     <textarea name="ckview" cols="20" rows="4" class="form-control" id="ckview"  >{!!$query[0]->instruction !!}  </textarea> 

              <input id="id" type="hidden" class="form-control" name="id" value="{!!$query[0]->instId !!}" required autofocus autocomplete="off" >  
              
              
                              
        </div>
                        </div>
   
  
   
   
 
 <div style="clear:both; height:10px;"> </div> 
 

 
</div>
<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
 <input name="butBack" id="butBack" type="button" value="<<Back" class="but" onClick="window.location.href='../instruction'"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
 <input name="butSubmit" id="butSubmit" type="button" value="Update" class="but" />&nbsp;
 
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
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
	 
	   
	var ctr =0;
	
 
	
	$("#error-page").html("");
	document.getElementById('error-page').style.height="auto";
	if($("#cls").val() == "Select")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Class Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	 
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	   
	   for (instance in CKEDITOR.instances) {
    CKEDITOR.instances[instance].updateElement();
}
			
			  
	 	
//var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'/editInst/{{$query[0]->instId}}',
         data:{"_token":$('#signup-token').val(),"class":$("#ckview").val()},
		 processData:"false",
         success: function(data) {
   var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; '+ data +' &nbsp;</span>';
       $("#success-page").html(saved);
	 console.log(data);
         },
		 error: function(data) {
         
	   console.log('Data Error');
	   alert( 'Data Error');
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
});
     </script>
   
   
   
   
   <div class="bottom-page"> </div>
 
 
 

</div>




 
 
 <script>
   
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
	
 	
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
	
	 //extraPlugins:chart,
	<!-- MATHEMATICS PLUGINS -->
	 //extraPlugins:'uicolor',height:'100px';
	extraPlugins:'mathjax',
	mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',height:200 

  }; 
</script>



 
<!-- Scripts -->
     
    
    <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <script>
	
	var ckview= document.getElementById("ckview");
	CKEDITOR.replace(ckview,options,{language:'en-gb',extraPlugins:'chart'});
	 
	</script>

 


 
 
 
      

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
 