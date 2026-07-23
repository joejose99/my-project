 
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
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Building</span>
                  
                  <div style="float:right; width:330px; margin-top:-5px; text-align:right;"><label  id="SelectError"> </label>  <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insert-building'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel"></div>
                  
                  
             <div id="totSch" style="float:right; margin-top:-5px; width:60%; text-align:center;" >  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search Building" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Building')"  >  </div>


 
</div>
              
              
                

               
                
     <div class="panel-body" >
           <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
           <div style="  text-align:center;" > 
     <span style="margin-left:7px; color:#4E6A9E; font-weight:bold;">
                         
             </span>
       </div>          
  

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl"  >
<tr > 
	
 
 <th width='270'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Building</th> 

<th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Building Description</th> 
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Registered Date</th> 

  

 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

<th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

  <th width='50'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

 
 </tr> 
 
@foreach($query as $rst)
                 
	 
    <tr   >
    
    
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->building!!}
</span>

 
  </td > 


<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! str_limit($rst->description,50)!!}
</span>

  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"> 
<select name="lst" id="lst" hidden=""  > </select>

 <input name="txt{!! $rst->buiId !!}" id="txt{!! $rst->buiId !!}" type="hidden" value="{!! $rst->building !!}" /></td >
      
 </td > 




 
 
 
 
  
 
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->created_at!!}
</span>
 
</td>   

  
   

 
  <td align='left' bgcolor='#1D4B6D'  valign ='top' ><span  style="margin:8px; display:block;"> <a href ='edit-building/{{ $rst->buiId }}' class='update'>Edit</a></span></td >
    <td align='left' bgcolor='#980905'  valign ='top' ><span  style="margin:8px; display:block;"> <a href ='#' class="del"onclick="destroy({{ $rst->buiId }})">Delete</a> </span>
    </td >

  
<td align='center' bgcolor='#980905'  valign ='top' class="table-td" ><span  style="margin:8px; display:block;">
      <input name="input" type="checkbox" value=" {!! $rst->buiId !!}" onclick="get_Values('{!! $rst->buiId !!}')" />
    </span></td >
 
</tr>
   
	
						
					  
					  
				 
				@endforeach
 </table>				 
	 			 
       <div style="text-align:center;" id="paginate"> {{ $query->links() }}  </div>    
         
	    <div id="lengths" style="height:30px;"> </div>
               
             
        </div>
    </div>


<script>
	
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		 
		
		  var txts ="txt";
		  
		  
		  
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
         url:'delete-multiple-building/buiId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='120' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Building</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Building Description</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
					
	 	
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].building +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].description.substring(0,50) +"..</span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-building/ " +data[i].buiId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].buiId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].buiId +")' value='" +data[i].buiId +" ' id='" +data[i].buiId +"'  </span><input name='"+ txts.concat(data[i].buiId) +"' id='"+ txts.concat(data[i].buiId) +"' type='hidden' value='"+ data[i].building +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		 
		 
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
		 
		
		/*function get_Values(quesId)
		{
			var txt='txt'
			txt= txt.concat(quesId);
			// strMrkMerge=strMrk.concat(ctr);
			
			var opt= document.createElement("OPTION");
			lst.options.add(opt);
			opt.text=quesId;
			opt.value=quesId;
			
			 
			
		}*/
		
		
		
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
         url:'delete-building/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='120' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Building</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Building Description</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    var ctr=0
	  var cnt =data.length;
	  
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
	 
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].building +"</span></td > <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].description.substring(0,50) +"..</span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-building/ " +data[i].buiId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].buiId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].buiId +")' value='" +data[i].buiId +" ' id='" +data[i].buiId +"'  </span><input name='"+ txts.concat(data[i].buiId) +"' id='"+ txts.concat(data[i].buiId) +"' type='hidden' value='"+ data[i].building +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		  
		 
				 					
				/*	 
				ctr++
				
				if(ctr >= 8	)
				{
					break;
				}
				if(cnt <= 8)
				{
					document.getElementById('paginate').className="hide_question";
					break;
				}
				*/
				
				}
				
				$("#tbl").append(option); 
					 document.getElementById('paginate').className="hide_question";
			  
			  
			   
			  
		 },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 //alert('Data Error'); 
	     
	  
    }  
		 
		});
		
	}
	}
  
 
		 
		
$(function() {
 
  
 $("#LGA").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#LGA").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Class Value is required !! &nbsp;</span>';
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
         url:'search_LGA_St',
         data:{"_token":$('#signup-token').val(),"LGA":$("#LGA").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			 var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				 
				for (var i=0;i < data.rstSch.length;i++)
				{
				 
					
				 option+='<option value ="'+ data.rstSch[i].schId +'">'+data.rstSch[i].school +'</option>';
				}
				
				
				 
				$("#school").html(option);
			
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='120' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Building</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Building Description</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   var dt="";
	    
	   for (i=0;i < data.query.length;i++)
				{
				
					 if( data.query[i].email != null)
					 {
						dt= data.query[i].email;
					 }
					 else
					 {
						dt= "";
					 }
			 
				
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].building +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].description.substring(0,50) +"..</span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-building/ " +data[i].buiId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].buiId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].buiId +")' value='" +data[i].buiId +" ' id='" +data[i].buiId +"'  </span><input name='"+ txts.concat(data[i].buiId) +"' id='"+ txts.concat(data[i].buiId) +"' type='hidden' value='"+ data[i].building +"'><select name='lst' id='lst' hidden=''  ></select></td >";
						 
			 
			 
			  
				  
				}
				
				$("#tbl").append(option); 
					document.getElementById('paginate').className="hide_question";
					
					 var ctr=data.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }
	        //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			

 
 
 
 
 
 
 
 
 $("#school").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#school").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Term Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#LGA").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Class Value is required !! &nbsp;</span>';
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
         url:'search_school_St',
         data:{"_token":$('#signup-token').val(),"LGA":$("#LGA").val(),"schId":$("#school").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='120' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Building</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Building Description</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
   $("#tbl").html(table);
   
   var dt="";
	   var option="";  
	   var i=0;
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
					 if( data[i].email != null)
					 {
						dt= data[i].email;
					 }
					 else
					 {
						dt= "";
					 }
					
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].building +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].description.substring(0,50) +"..</span></td >  <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-building/ " +data[i].buiId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].buiId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].buiId +")' value='" +data[i].buiId +" ' id='" +data[i].buiId +"'  </span><input name='"+ txts.concat(data[i].buiId) +"' id='"+ txts.concat(data[i].buiId) +"' type='hidden' value='"+ data[i].building +"'><select name='lst' id='lst' hidden=''  ></select></td >";
				 
				 
				}
				
				$("#tbl").append(option); 
				
				 
			    var ctr=data.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }
					 //$("#totSch").html("<pan>Total No of Student: "+ ctr); 
					  
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
 
 
 
 
 
 
 
 
 
 
 
 //SEARCH QUESTION SESSION START HERE
 
 
 
 $("#txtSearch").keyup(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	
	  
	var ctr =0;
	
    //document.getElementById('LAG').value='Select';
   //document.getElementById('school').value='Select';
      
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-building',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='120' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Building</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Building Description</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	     for (i=0;i < data.length;i++)
				  {
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
					 
					
			 	
option +="<tr> <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].building +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].description.substring(0,50) +"..</span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-building/ " +data[i].buiId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].buiId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].buiId +")' value='" +data[i].buiId +" ' id='" +data[i].buiId +"'  </span><input name='"+ txts.concat(data[i].buiId) +"' id='"+ txts.concat(data[i].buiId) +"' type='hidden' value='"+ data[i].building +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		 
				 
				  }
				
				 $("#tbl").append(option); 
				document.getElementById('paginate').className="hide_question";
				 
				
				/*var ctr=data.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }*/
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

 @section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
   
@stop

@section('js')
 
@stop

 @stop



 
