 
 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Edit Blog</span>

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop




@section('content')
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>


 <script src="{{ asset('./js/jquery-3.4.1.js') }}"></script>
 
<script >
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
 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>

 
                        



   <div style="width:90%; max-width:795px; height:auto; display:inline-block;" >  
   <label>Menu Options</label>
   <br />
   
   <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"  style="display:inline-block;"   >
   
  
    
   @foreach($checked as $st)
   
    <label   class="container"  style="display:inline-block; width:234px;"> 
   <input type="checkbox" name="option[]"  checked="checked"  id="opt{!!$st->id!!}"  value="{!! trim($st->id )!!}"  onclick="validateCheckbox({!!$query[0]->id!!},{!! trim($st->id )!!})" >&nbsp;  &nbsp;<span   style="font-size:13px; ">{!! $st->menu !!}</span>
  
   <span class="checkmark6"></span>
   </label>
   
    
    
   @endforeach  
  
  
  
  
  @foreach($unchecked as $st)
   
    <label   class="container"  style="display:inline-block; width:234px;"> 
   <input type="checkbox" name="option[]"   id="option{!! trim($st->id )!!}"  value="{!! trim($st->id )!!}" >&nbsp;  &nbsp;<span   style="font-size:13px; ">{!! $st->menu !!}</span>
  
   <span class="checkmark6"></span>
   </label>
   @endforeach  
                 
 

   
   
              
                 
                                

                               
                               
                            </div>
                        </div>   
   
   
   
               
   
                        
                        
                 
   
   
      <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" ><div class="col-md-10" >
      <label>Status: </label>&nbsp;&nbsp;
             
                            
                               
                               <select class="selectAdmin" name="faculty1" id="faculty1">   
                				
                                 
   <option value="{!!$query[0]->status!!}"> {!!$query[0]->status!!} </option>
   
                               
        <option  value="Enabled"> Enabled</option>  
        <option  value="Disabled"> Disabled</option>                        
                               </select>
                                
                            </div>
                        </div>       
   
                        
                        
                        
                        
                         
                         <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;">Blog:* &nbsp;</label>

                            <div class="col-md-10" >
                               
                              
                             
 
        <textarea name="ckview" cols="20" rows="4" class="form-control" id="ckview"  >{!!$query[0]->details !!}   </textarea>
      
                            </div>
                        </div>  
                        
                        
                        
            
                      
                        
                     
                         
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../blog'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <input name="butSubmit" id="butSubmit" type="submit" value="&nbsp;Edit&nbsp;" class="but" />
 
 
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
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Blog Details is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
		//alert(errors);
	} 
	
	
	  
	
	 
	 
	 
	 var list, index,item,checkedCount;
	 checkedCount =0;
	 list=document.getElementsByTagName('input');
	 for(index=0;index < list.length; ++index)
	 {
		 item=list[index];
		 if(item.getAttribute('type')=== "checkbox" && item.checked && item.name==="option[]")
		 {
			 
			 dtArray.push({
		     menu_Id:item.value
			  
			 
			});
			 
			 ++checkedCount;
		 }
		 
	 
	
	}
	if(checkedCount ==0)
	{
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select Checkbox Options !! &nbsp;</span>';
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
	 	
var dataArray= JSON.stringify(dtArray);
	 // console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"../edit-blog/{{$query[0]->id}}",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray,"blog":$("#ckview").val(),"status":$("#faculty1").val()},
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
     

 
		
		




function validateCheckbox(blog_Id,menu_Id)
{
	   
	 
	var cont=document.getElementsByTagName('input');
	  
	 for(var i=0; i<cont.length;i++)
	 {
		  
		 if(cont[i].tagName=='INPUT' && cont[i].type=='checkbox')
		 {
			
			 if(cont[i].checked && cont[i].value==menu_Id )
			 {
				 //alert(cont[i].value+' im checked');
			 
		$.ajax({  
	    type:"POST",
         url:"../insert-menu-blog/{{$query[0]->id}}",
         data:{"_token":$('#signup-token').val(),"id_blog":blog_Id,"id_menu":menu_Id},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
     //var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; '+ data +' &nbsp;</span>';
       //$("#error-page").html(saved);
	   //alert(data);
	   console.log(data);
	   
			
         },
		 error: function(data) {
         
	   console.log('Data Error');
	   //alert('Data Error'); 
	 
	   
	  
    }   
		 
     });
		  }
			 
			 
			 
			 
			 
			 if(cont[i].checked==false && cont[i].value==menu_Id )
			  {
				  //alert(cont[i].value+' im Unchecked');
			 
		$.ajax({  
	    type:"POST",
         url:"../remove-checkbox/{{$query[0]->id}}",
         data:{"_token":$('#signup-token').val(),"id_blog":blog_Id,"id_menu":menu_Id},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
			  console.log(data);
        //alert(data);
	   
		 
         },
		 error: function(data) {
         
	   console.log('Data Error');
	    //alert('Data Error'); 
	 
	    
	  
    }   
		 
     });	
		
	}
				 
				 
				 
			 }
			 
		 }
	 
}

</script>


 @stop
 
  
@section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
    <link href="../timer/css/checkbox.css" rel="stylesheet" type="text/css" />
@stop

@section('js')


<!--
<script src="../js/jquery-3.4.1.js" ></script>
-->
<!--
<script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>

-->

<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

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