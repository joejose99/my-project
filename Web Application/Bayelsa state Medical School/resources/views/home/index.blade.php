@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
 <meta name="_token" content="{!! csrf_token() !!}"/>

<section class="content" >
  <?php 
				 
				$value= $title['title'];
			
			 
				 
				?>
 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>

 <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
                @yield('content')
             <div class="panel panel-default">
                <div class="panel-heading" >
                
                
                Dashboard &nbsp;   <span ><img src="../image/arrow.gif" width="5" height="10" />&nbsp;&nbsp;  Contact Us</span>   
              <div style="float:right;">  
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <label  id="SelectError"> </label>  <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insert'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel" > 
              
              
              
               </div>

                
              <div class="panel-body"  >   
    
                 <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
           <div style="  text-align:center;" > 
     <span style="margin-left:7px; color:#4E6A9E; ">
                         
                         </span>
                        </div>          
   

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center" id="tbl"   >
<tr > 
	

 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Details</th> 

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Title</th> 
 
<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Date</th> 
 
 
 <th width='70'bgcolor='#ffffff' align='left' valign='top'   scope='col'style="text-align:center;"> </th> 

 
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
 
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
</tr> 
 
@foreach($query as $rst)
                 
					 

<tr>
 <td align='left' bgcolor='#ffffff'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->details !!}
</span>

 <select name="lst" id="lst" hidden=""  >
      </select>
      
      
      

 <input name="txt{!! $rst->id !!}" id="txt{!! $rst->id !!}" type="hidden" value="{!! $rst->title !!}" /></td >

  </td > 

 <td align='left' bgcolor='#ffffff'  valign ='top' >
  <span  style="margin:8px; display:block;">
{!! $rst->title !!}
</span>
  </td > 



<td align='left' bgcolor='#ffffff'  valign ='top' >
  <span  style="margin:8px; display:block;">
{!! $rst->created_at !!}
</span>
  </td > 
  

 

 <td align='left' bgcolor='#ffffff'  valign ='top' style=" background-color:#1D4B6D;" >
 <span  style="margin:8px; display:block;">
<a href ='edit/{{ $rst->id }}' class='topnav_admin' style="color:#FFF; font-weight:bold;" >Edit</a> </span></td > 

<input name="input"  value=" {!! $rst->title !!}" type="hidden"  id="txt{!! $rst->id !!}" />

 <td align='left' bgcolor='#ffffff'  valign ='top' style=" background: #980905;" >
 <span  style="margin:8px; display:block;">
 
<a href ='#' class="del"onclick="destroy({{ $rst->id }})" >Delete</a>

</span> </td > 
 <td align='center' bgcolor='#980905'  valign ='top' class="table-td" ><span  style="margin:8px; display:block;">
      <input name="input" type="checkbox" value=" {!! $rst->id !!}" onclick="get_Values('{!! $rst->id !!}')" />
      
    </span></td >
</tr>
   
	
						
					  
					  
				 
				@endforeach
 </table>				 
	 			 
       <div style="text-align:center;"> {{ $query->links() }}  </div>         
	   </div>
       
       
       
       
       </div>         
             
         


 

   
     
     @section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style.css" rel="stylesheet" type="text/css" />
   
@stop

@section('js')
 <script src="{{ asset('../js/app.js') }}"></script>
 
 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
@stop

     
     
     
     
     
     
     
     
      
<script>


$.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		 
		
		  var txts ="txt";
		  




 var txts ="txt";
		  
		  
		  
		 $(function() {
 
  
 $("#multiDel").click(function(ev) {
	  ev.preventDefault();
 
		   
		
		 
			var selectValues="";
			var dtArray=[];
			var question="";
			var txt="txt";
			$("#lst option[value='']").remove();
			 
			$("#lst option").each(function()
			{
				 txt="#txt";
				 selectValues=$(this).text();
				 
				
				txt= txt.concat(selectValues);
				  
                 
				 
				question += $(txt).val() +'\n';
				   
				 
				 
			
			dtArray.push({
			 schId:selectValues });
			txt="";
				 selectValues="";
			});
			if(question=="")
			{
				alert('Select Check Box to Delete');
				exit;
			}
			//alert('Do you want to delete this? '+'\n' +question );
			
			
			var delMultiple=confirm('Are you sure you want to delete these ?'+'\n' +question);
		 
		 
	if(delMultiple)
	{	
			
			/*for (var i=0;i < dtArray.length;i++)
			{
			
			 alert(dtArray[i].quesId);
			 
			} */
			  
			var quesId=1;
			
			var dataArray= JSON.stringify(dtArray);
			$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'delete-multiple-home/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
	 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr >  <th   width='' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Details</th>  <th width='200'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> Title</th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> Date</th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th> <th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
		  				
					
option +="<tr>   <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,350) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].title   +" </span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit/ " +data[i].id +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].id +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].id +")' value='" +data[i].id +" ' id='" +data[i].id +"'  </span><input name='"+ txt.concat(data[i].id) +"' id='"+ txt.concat(data[i].id) +"' type='hidden' value='"+ data[i].details.substring(0,50) +"'><select name='lst' id='lst' hidden=''  ></select></td ><tr>";
				 
					  
				}
				
				$("#tbl").append(option); 
					document.getElementById('paginate').className="hide_question";
			  
			 
			 
			 
		 },
		error: function(data){
			alert('Data Error');
		}
		 
			});
	
			
   	
			
		}
		
		});
		});






function get_Values(quesId)
		{
			 
			 
			var txt='txt'
			txt= txt.concat(quesId);
			// strMrkMerge=strMrk.concat(ctr);
			
			 //alert(txt);
			 var lst= document.getElementById('lst');
			 
			
			var ch =document.getElementById(txt).checked;
			
			
			if( ch==false)
			{
				 document.getElementById(txt).checked=true;
				  
				   //alert(document.getElementById(txt).checked=true);
			}
			
			if( ch==true)
			{
				 document.getElementById(txt).checked=false;
				   //alert(document.getElementById(txt).checked=false);
				 
			}
			//alert(ch);
			
			var opt= document.createElement("OPTION");
			
			
			if(document.getElementById(txt).checked==true)
			{
				
				 lst.options.add(opt);
				 
				 
			 for(var i=0;i < lst.options.length; i++)
			 {
				   
				  
				 if(lst.options[i].value != quesId)
				 {
				// alert('inside For loop Add ' + lst.options[i].value);
				 
			      	lst.options.add(opt);
			        opt.text=quesId;
			      	opt.value=quesId;
				 }
			 }
			
			
			}
			
			
			if(document.getElementById(txt).checked ==false)
			{
				 
				 
			 for(var i=0;i < lst.options.length; i++)
			 {
				 //alert('inside For loop Remove ' + lst.options[i].value)
				 if(lst.options[i].value == quesId)
				 {
				  
					lst.remove(i);
					break;
				 }
			 }
			
			
			}
			
			
			
		}








function destroy(quesId)	
	{
		
		   txt='txt';
		var schs= txt.concat(quesId);
		 
		
		var schss= document.getElementById(schs).value;
		
		
		
		var del=confirm("Are you sure you want to delete this item ?"+'\n' +schss);
		//var delMultiple=confirm('Are you sure you want to delete these ?'+'\n' +question);
		 
		
		  
	if(del)	
	{ 
		
		$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:"delete/quesId",
         data:{"_token":$('#signup-token').val(),"quesId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   var i=0;
			   
	 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr >  <th   width='' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Details</th>  <th width='200'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> Title</th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> Date</th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th> <th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   
	   
	    
	   console.log(data);
	   for(i=0;i<data.length;i++)
		{
		 			
					
option +="<tr>   <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,350) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].title   +" </span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit/ " +data[i].id +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].id +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].id +")' value='" +data[i].id +" ' id='" +data[i].id +"'  </span><input name='"+ txt.concat(data[i].id) +"' id='"+ txt.concat(data[i].id) +"' type='hidden' value='"+ data[i].details.substring(0,50) +"'><select name='lst' id='lst' hidden=''  ></select></td ><tr>";
						 
					  
				}
				
				$("#tbl").append(option); 
					document.getElementById('paginate').className="hide_question";
			  
			  
			  
		 },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 alert('Data Error'); 
	     
	  
    }  
		 
		});
		
	}
	}
	


</script>



<script>
function toggleFullScreen() {
  var doc = window.document;
  var docEl = doc.documentElement;

  var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
  var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

  if(!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
    requestFullScreen.call(docEl);
	
	document.getElementById('zoomIn').className='show_question';
	
	 document.getElementById('zoomOut').className='hide_question';
  }
  else {
    cancelFullScreen.call(doc);
	
	document.getElementById('zoomIn').className='hide_question';
	document.getElementById('zoomOut').className='show_question';
  }
}

</script>
 
@stop
