 
 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">World Clock Page</span>

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop




@section('content')

 <script src="{{ asset('./js/jquery-3.4.1.js') }}"></script>
 
<script >
function changeValue()
{
	
	
	if(document.getElementById('optionD').checked == true)
	{
		document.getElementById('optionD').value=1;
	}	
	
	if(document.getElementById('optionD').checked == false)
	{
		document.getElementById('optionD').value=0;
	}	  
	
	var val =document.getElementById('optionD').value
	  
}
</script>
 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>

 
                        



   <div style="width:90%; max-width:795px; height:auto;" >  
   
   
   <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:left;">Country:* &nbsp;</label>

                 <div class="col-md-9">
           <select name="cls" class="cls" id="cls">
                               
                               <option  value="Select">Select</option>
   @foreach($country as $st)
   
   <option value="{!! trim($st->id )!!}"> {!! $st->value !!} </option>
   
   @endforeach  
                               
                               </select>

                               
                               
                            </div>
                        </div>   
   
               
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px; text-align:left; " >City:* &nbsp;</label>

        <div class="col-md-9" >
          <input id="optionA" type="text" class="form-control" name="optionA" value="{{ old('optionA') }}" required autofocus autocomplete="off">

                                
                            </div>
                        </div>
                        
                        
                
          <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px; text-align:left; " >Time Zone:* &nbsp;</label>

        <div class="col-md-9" >
          <input id="timezone" type="text" class="form-control" name="timezone" value="{{ old('timezone') }}" required autofocus autocomplete="off">

                                
                            </div>
                        </div>       
                
                
                
                        
   
   
   
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionD" class="col-md-4 control-label"  style="margin-top:15px; width:200px;text-align:left;  " >Activate City Time:* &nbsp;</label>

        <div class="col-md-9" >
           
<input name="optionD" type="checkbox" value="0" id="optionD"   onclick="changeValue()" />
                                
                            </div>
                        </div> 
   
                        
                        
                        
                        
                         
                         <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:left;">Details:* &nbsp;</label>

                            <div class="col-md-10" >
                              <textarea name="txtOptionB" rows="5" autofocus="autofocus" required="required" class="form-control" id="ckview" autocomplete="off">{{ old('ckview') }}</textarea>

 
                                
                            </div>
                        </div>  
                        
                        
                        
           
                    <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:left;">UTC Time:* &nbsp;</label>

                 <div class="col-md-9" >
           <select name="term" class="term" id="term">
                               
                            <option  value="Select"> Select</option>
                                
   <option value="-12"> UTC - 12 </option>
   <option value="-11"> UTC - 11 </option>
   <option value="-10"> UTC - 10 </option>
   <option value="-9.5"> UTC - 9:30 </option>
   <option value="-9"> UTC - 9 </option>
   <option value="-8"> UTC - 8 </option>
   <option value="-7"> UTC - 7 </option>
   <option value="-6"> UTC - 6 </option>
   <option value="-5"> UTC - 5 </option> 
   <option value="-4.5"> UTC - 4:30 </option>
    <option value="-4"> UTC - 4 </option> 
   <option value="-3.5"> UTC - 3:30 </option>
   <option value="-3"> UTC - 3 </option>
   <option value="-2"> UTC - 2 </option>
    <option value="-2.5"> UTC - 2:30 </option>
   <option value="-1"> UTC - 1 </option>
   <option value="0"> UTC + 0 </option>
   <option value="1"> UTC + 1 </option>
   <option value="2"> UTC + 2 </option>
   <option value="3"> UTC + 3 </option>
   <option value="3.5"> UTC + 3:3O </option>
   <option value="4"> UTC + 4 </option>
   <option value="4.5"> UTC + 4:30 </option>
   <option value="5"> UTC + 5 </option>
   <option value="5.5"> UTC + 5:30 </option>
   <option value="5.75"> UTC + 5:45 </option>
   <option value="6"> UTC + 6 </option>
   <option value="6.5"> UTC + 6:30 </option>
   <option value="7"> UTC + 7 </option>
   <option value="8"> UTC + 8 </option>
   <option value="8.75"> UTC + 8:45 </option>
   <option value="9"> UTC + 9 </option>
   <option value="9.5"> UTC + 9:30 </option>
   <option value="10"> UTC + 10 </option>
   <option value="10.5"> UTC + 10:30 </option>
   <option value="11"> UTC + 11 </option>
   <option value="11.5"> UTC + 11:30 </option>
   <option value="12"> UTC + 12 </option>
   <option value="12.75"> UTC + 12:45 </option>
   <option value="13"> UTC + 13 </option>
   <option value="14"> UTC + 14 </option>

                          </select>     
                               
                            </div>
                        </div>   
                        
                        
                      
                        
                     
                         
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='./city'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
	if($("#optionA").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; City Name is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	if($("#timezone").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Time Zone is required !! &nbsp;</span>';
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
	
	
	 if(document.getElementById('term').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select UTC Time !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	 
	  
	 if(document.getElementById('cls').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Country !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	 
	 
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  var sel= document.getElementById('term'); 
	var opt = sel.options[sel.selectedIndex]; 
	
	val =document.getElementById('optionD').value
	//alert(opt.text)
	  dtArray.push({
		     cls:$("#cls").val(),
			 term:$("#term").val(),
			optionA:$("#optionA").val(),
			
			timezone:$("#timezone").val(),
			optionD:val,
			utc_select:opt.text,
			optionB:$("#ckview").val()
			 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"create-world-clock",
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
	   //document.getElementById('txtOptionB').value='';
	    
		   //document.getElementById('cls').value='Select';
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
 
      
     <link href="./exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="./exam/css/style.css" rel="stylesheet" type="text/css" />
     <link href="./exam/css/popup.css" rel="stylesheet" type="text/css" />
    
 
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
 
   
@stop

@section('js')


<!--
<script src="../js/jquery-3.4.1.js" ></script>
-->

 <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>


 <script src="{{ url('./ckeditor/ckeditor.js')}}"></script>
 

<script src="./ckeditor/plugins/ckeditor_wiris/wirisplugin-generic.js" type="text/javascript"></script>
<script src="./ckeditor/plugins/ckeditor_wiris/plugin.js" type="text/javascript"></script>



<script src="{{ url('./ckeditor/plugins/chart/lib/chart.min.js') }}"></script>
  
       <script src="{{ url('./ckeditor/plugins/Chart.js-master/src/chart.js') }}"></script>
  
    
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
     
    
    <script src="{{ url('./ckeditor/ckeditor.js') }}"></script>
    
      

    <script>
	
	var ckview= document.getElementById("ckview");
	 CKEDITOR.replace(ckview,options,{language:'en-gb'});
	//CKEDITOR.replace(ckview,options,{language:'en-gb',extraPlugins:'ckeditor_wiris'});
	 
	</script>


 
 
 
@stop