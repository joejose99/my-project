 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Add Page</span>

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop




@section('content')
 

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 
  
 <meta name="_token" content="{!! csrf_token() !!}"/>
 
 
  
 


 
<title>Add Contact Us</title>
<style>
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #DCEDF7;
}

</style>


 
 

 
 
<div id="container">

 <div style="width:90%; max-width:795px; height:auto;" >  
   
   <div id="error-page" style="text-align:center; font-weight:bold;"> </div>

   
   
   <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Title:* &nbsp;</label>

                 <div class="col-md-9">
           <select name="cls" class="cls" id="cls">
                               
                               <option  value="Select">Select</option>
    
   
   <option value="Contact Us"> Contact Us </option>
   
   <option value="About Us"> About Us </option>
                               
                               </select>

                               
                               
                            </div>
                        </div>   
   
                
                        
                         
                         <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Details:* &nbsp;</label>

                            <div class="col-md-12" >
                              <textarea name="txtOptionB" rows="5" autofocus="autofocus" required="required" class="form-control" id="ckview" autocomplete="off">{{old('ckview')}}</textarea>

 
                                
                            </div>
                        </div>  
                        
                        
                        
           
                    
                        
                      
                        
                     
                         
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../home'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
	   
	  
	 
	 
	var ctr =0;
 
	$("#error-page").html("");
	 
	  
	
	
	  for (instance in CKEDITOR.instances) {
    CKEDITOR.instances[instance].updateElement();
}
	
	
	

	document.getElementById('error-page').style.height="auto";
	 
	  if($("#cls").val() == "Select")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Title Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	 
	 
	 
	if(document.getElementById('ckview').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Details is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	 
	 
	 
	 
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	   
	   
	   
	   
	   dtArray.push({
			  
			title:$("#cls").val(),
			details:$("#ckview").val() 
			});
	  var dataArray= JSON.stringify(dtArray);
  console.log(dataArray); 

     $.ajax({  
	    type:"POST",
         url:"create",
         data:{"_token":$('#signup-token').val(),'title':$("#cls").val(),'details':$("#ckview").val()},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
		
		var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp;'+ data +'&nbsp;</span>';
       		$("#success-page").html(saved);
		
		
		if(data.trim()== 'Data Existed Already !!!')
		{
    		var saved= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;'+ data +'&nbsp;</span>';
       		$("#success-page").html(saved);
		}
	   //alert('Data Successfully Saved');
	   
	    
	    
	   
	   
	   alert(data);
	    
			
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
   
   
   
   
   <div class="bottom-page"> </div>
 
 
 

</div>

   

 @stop
 
  
@section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
     
<link href="../exam/css/template.css" rel="stylesheet" type="text/css" />

@stop

@section('js')


<!--
<script src="../js/jquery-3.4.1.js" ></script>
-->

 <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>


 <script src="{{ url('../ckeditor/ckeditor.js')}}"></script>
 

<script src="../ckeditor/plugins/ckeditor_wiris/wirisplugin-generic.js" type="text/javascript"></script>
<script src="../ckeditor/plugins/ckeditor_wiris/plugin.js" type="text/javascript"></script>



<script src="{{ url('../ckeditor/plugins/chart/lib/chart.min.js') }}"></script>
  
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
     
    
    <script src="{{ url('../ckeditor/ckeditor.js') }}"></script>
    
      

    <script>
	
	var ckview= document.getElementById("ckview");
	 CKEDITOR.replace(ckview,options,{language:'en-gb'});
	//CKEDITOR.replace(ckview,options,{language:'en-gb',extraPlugins:'ckeditor_wiris'});
	 
	</script>


 
 
 
@stop