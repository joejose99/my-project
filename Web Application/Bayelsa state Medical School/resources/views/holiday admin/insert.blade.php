 
 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">World Clock Page</span>

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop




@section('content')
<script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>


 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 
 

<link href="../timer/css/popup.css" rel="stylesheet" type="text/css" />
<link href="../timer/css/dropdown.css" rel="stylesheet" type="text/css" />
<link href="../timer/css/table.css" rel="stylesheet" type="text/css" />


<script>
/*
function changeValue(option)
{
	
	
	if(document.getElementById(option).checked == true)
	{
		document.getElementById('optionD').value=1;
	}	
	
	if(document.getElementById('optionD').checked == false)
	{
		document.getElementById('optionD').value=0;
	}	  
	
	var val =document.getElementById('optionD').value
	  
}
*/
</script>
<body onload="generateYear()">
 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>

 
                        



   <div style="width:90%; max-width:795px; height:auto; display:inline-block;" >  
    
   <br />
   
   <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"  style="display:inline-block;"   >
   
   
   
  
  
 <label>Country: </label>&nbsp;&nbsp; <select class="selectAdmin" name="faculty1" id="faculty1"> 
             
              
               
                               
                				<option  value="Select"> Select</option>
                                @foreach($query as $st)
   <option value="{!! trim($st->id )!!}"> {!! $st->value !!} </option>
   @endforeach 
                               
                               
                               </select>
                 
 

   
   
              
                 
                                

                               
                               
                            </div>
                        </div>   
   
   
   
               
   
   <div style="width:90%; max-width:795px; height:auto; display:inline-block;" > 
    
   

   <br />
    <label>Year: </label>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; 
   
   <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"  style="display:inline-block;"   >
                       
                        
        <input id="txtStartYear" type="text" class="form-control" name="txtStartYear"   value="{{ old('txtStartYear') }}" required autofocus autocomplete="off" style=" text-align:left; " onclick="txtYearPopUp()" placeholder="yyyy" >         
   
   </div></div>
     <div class="modal-content-years">
     
    <div id="popup_year"  class="popupDate popup_month_year" style="display:none; width:60%;"  >
<div class="title-head"  >Year </div>

</div></div> 
                 
                        
                        
                        
                         
                         <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Holiday:* &nbsp;</label>

                            <div class="col-md-10" >
                               
                              
<textarea name="ckview" cols="20" rows="4" class="form-control" id="ckview"  value="{{ old('ckview') }}"required > {{ old('ckview') }} </textarea>
 
                                
                            </div>
                        </div>  
                        
                        
                        
            
                      
                        
                     
                         
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../holidays'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <input name="butSubmit" id="butSubmit" type="submit" value="&nbsp;Submit&nbsp;" class="but" />
 
 
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"></div>

 
   </div>
   
   </div>
   </body>
   
   
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
	 
	
	 
	
	
	
	
	if(document.getElementById('ckview').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Holiday Details is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
		//alert(errors);
	} 
	
	
	  
	
	
	
	
	 
	 
	 
	  
	if(document.getElementById('faculty1').value =="Select")
	{
	 
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Country Options !! &nbsp;</span>';
	  $("#error-page").append(errors);
	
	  return false;
	  }
	  
	  if(document.getElementById('txtStartYear').value =="")
	{
	 
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Year Options !! &nbsp;</span>';
	  $("#error-page").append(errors);
	
	  return false;
	  }
	  
	  
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  
	//alert(opt.text)
	/*
	  dtArray.push({
		     ckview:$("#ckview").val(),
			 term:$("#term").val(),
			optionA:$("#optionA").val(),
			
			timezone:$("#timezone").val(),
			optionD:val,
			utc_select:opt.text,
			optionB:$("#txtOptionB").val()
			 
			});
			
			 */ 
	 	
//var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"/create-holiday",
         data:{"_token":$('#signup-token').val(),"countryId":$("#faculty1").val(),"holiday":$("#ckview").val(),"year":$("#txtStartYear").val()},
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



<script>
function generateYear()
 {
	nowdates =new Date();
	  
	var y=parseInt(nowdates.getFullYear());
	   
	   var table="";
	   var option="";
	   var ctr=1;
	 for (i=0;i < 31;i++)
	{
	  
		  
		 
table +="<input name='but1' id='but"+ ctr +"' type='button' class='button-white' value='"+y+"' onClick='updateTime_full("+y+",3)'/>"
 		 
		y=y+1 
		 
	     
		 ctr++; 
	 
	  
  } 
  
  $("#popup_year").append(table);
   
}	 




function updateTime_full(hr,id)
{
 
//console.log('Update Hr: '+hr +" Id : "+id);
 
 console.log(hr);

 
 
	 
	document.getElementById('txtStartYear').value="";
 document.getElementById('txtStartYear').value=hr;
 // document.getElementById('txtCheck_Date').value=hr;
  
 
   
 
 /* HIDE FIRST TIME LIST*/ 
   
  document.getElementById('popup_year').style.display='none';
   
  
  
 //document.getElementById('pop_hrs').style.display='block';
  
 // activateTimer_date();

 
 }

 function txtYearPopUp()
{
   
   document.getElementById('popup_year').style.display='block';
 
 
  }
  
  /*
  window.onclick = function(event) {
	
   if (event.target == modal) { 
  
   document.getElementById('popup_year').style.display='none'; 
   }
  
   
}*/



</script>

 @stop
 
  
@section('css')
 
 <link href="../timer/css/style.css" rel="stylesheet" type="text/css" />

 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
    <link href="../timer/css/checkbox.css" rel="stylesheet" type="text/css" />
@stop

@section('js')


<!--
<script src="../js/jquery-3.4.1.js" ></script>
-->
<!--
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>-->

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