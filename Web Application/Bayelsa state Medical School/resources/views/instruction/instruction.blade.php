 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  <span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1> 

 <meta name="csrf-token" content="{{ csrf_token() }}">
 
@stop

 
 
@section('content')
 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>


 <div class="panel panel-default">
                <div class="panel-heading">
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Insruction</span>
                  
                  <div style="float:right; width:330px; margin-top:-5px; text-align:right;"><label  id="SelectError"> </label>  <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insertInst'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel"></div>
                  
                  
             


 
</div>
           
 
 
 
              
              
              
              
              
              
              
              
              
              
              <div style="text-align:center; margin-top:10px;">
              
               
                
     <div class="panel-body" >
           <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
           <div style="  text-align:center;" > 
     <span style="margin-left:7px; color:#4E6A9E; font-weight:bold;">
                         
             </span>
       </div>          
   
    
<div id="success" style="text-align:center;"> </div>
  <table width="90%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl"  >
<tr > 
	

 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Instruction</th> 

 
  
 
 <th width='70'bgcolor='#ffffff' align='left' valign='top'   scope='col'style="text-align:center;"> </th> 

 
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
</tr> 
 
@foreach($query as $rst)
                 
	 
    <tr   >
    
    
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->instruction !!}
</span>
<select name="lst" id="lst" hidden=""  ></select>
 <input name="txt{!! $rst->instId !!}" id="txt{!! $rst->instId !!}" type="hidden" value="{!! $rst->instruction !!}">

  </td > 
  
   

  
   

 

 <td align='left' bgcolor='#1D4B6D'  valign ='top' >
 <span  style="margin:8px; display:block;">
<a href ='editInst/{{ $rst->instId }}' class='update'>Edit</a> </span></td > 



 <td align='left' bgcolor='#980905'  valign ='top' >
 <span  style="margin:8px; display:block;">
<a href ='#' class="del" onClick="destroy({{ $rst->instId }})">Delete</a> 


</span> </td > 


 

 <td align='center' bgcolor='#980905'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 <input name="" type="checkbox" value=" {!! $rst->instId !!}" onClick="get_Values('{!! $rst->instId !!}')">

</span>

 
  </td > 

 
</tr>
   
	
						
					  
					  
				 
				@endforeach
 </table>				 
	 			 
       <div style="text-align:center;" id="paginate">   </div>    
         
	    <div id="lengths" style="height:30px;"> </div>
               
             
        </div>
    </div>
</div>


<script>
	
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		 
		
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
			 clsId:selectValues });
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
         url:'delete_multiple_Inst/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='' >Instruction</th>      <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].instruction +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editSchool/ " +data[i].instId +" ' class='update'>Update</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].instId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].instId +")' value='" +data[i].instId +" ' id='" +data[i].instId +"'  </span><input name='"+ txts.concat(data[i].instId) +"' id='"+ txts.concat(data[i].instId) +"' type='hidden' value='"+ data[i].instruction +"'><select name='lst' id='lst' hidden=''></select></td >";
				 
					  
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
		
		
		var del=confirm('Are you sure you want to delete this item ?  '+'\n'  + schss);
		 
		  
	if(del)	
	{ 
		
		$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'delete_Inst/quesId',
         data:{"_token":$('#signup-token').val(),"clsId":quesId},
		 processData:"false",
         success: function(data) {
			
			 
	
			 
			 alert('Data Deleted');
			   
			    var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='' >Instruction</th>      <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].instruction +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editSchool/ " +data[i].instId +" ' class='update'>Update</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].instId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].instId +")' value='" +data[i].instId +" ' id='" +data[i].instId +"'  </span><input name='"+ txts.concat(data[i].instId) +"' id='"+ txts.concat(data[i].instId) +"' type='hidden' value='"+ data[i].instruction +"'><select name='lst' id='lst' hidden=''></select></td ></tr>";
				 
					  
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
     
 


 @section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
   
@stop

@section('js')
 
@stop

 @stop



 

   
