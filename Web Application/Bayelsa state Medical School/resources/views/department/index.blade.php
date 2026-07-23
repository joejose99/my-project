 
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
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Department</span>
                  
                  <div style="float:right; width:290px; margin-top:-5px; text-align:right;"><label  id="SelectError"> </label>  <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insertDepartment'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel"></div>
                  &nbsp&nbsp;
                  
             <div id="totSch" style="float:right; margin-top:-5px; width:56%; text-align:center;" >  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search Department" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Department')"  >  </div>


 
</div>
              
              <div style="text-align:center; margin-top:10px;">
              
              
              &nbsp;&nbsp;
             <div style=" margin-left:10px; float:left;">
             &nbsp;&nbsp;&nbsp;&nbsp; 
              <label>Faculty: </label>&nbsp;&nbsp; <select class="selectAdmin" name="faculty1" id="faculty1"> 
             
              
               
                               
                				<option  value="Select"> Select</option>
                                @foreach($faculty as $st)
   <option value="{!! trim($st->falId )!!}"> {!! $st->faculty !!} </option>
   @endforeach 
                               
                               
                               </select>
                                 
      
    </div></div>
                

               
                
     <div class="panel-body" >
           <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
           <div style="  text-align:center;" > 
     <span style="margin-left:7px; color:#4E6A9E; font-weight:bold;">
                         
             </span>
       </div>          
  
 
  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl"  >
<tr > 
	
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Department</th> 

<th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Department Details</th> 

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Head Of Department</th>  
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Registered Date</th> 

  

 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

<th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

  <th width='50'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

 
 </tr> 
 
@foreach($query as $rst)
                 
	 
    <tr   >
    
    
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->department!!}
</span>

 
  </td > 


<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! str_limit($rst->details,50)!!}
</span>

  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"> 
<select name="lst" id="lst" hidden=""  > </select>

 <input name="txt{!! $rst->dptId !!}" id="txt{!! $rst->dptId !!}" type="hidden" value="{!! $rst->department !!}" /></td >
      
 </td > 




 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 @if(trim($rst->fName) != "NA")
{!!$rst->title!!} {!!$rst->fName!!} {!!$rst->surname!!}

@endif
</span>

 
  </td > 

 
 
 
  
 
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->created_at!!}
</span>
 
 
  
</td>   

  
   

 
  <td align='left' bgcolor='#1D4B6D'  valign ='top' ><span  style="margin:8px; display:block;"> <a href ='editDepartment/{{ $rst->dptId }}' class='update'>Edit</a></span></td >
    <td align='left' bgcolor='#980905'  valign ='top' ><span  style="margin:8px; display:block;"> <a href ='#' class="del"onclick="destroy({{ $rst->dptId }})">Delete</a> </span>
    </td >

  
<td align='center' bgcolor='#980905'  valign ='top' class="table-td" ><span  style="margin:8px; display:block;">
      <input name="input" type="checkbox" value=" {!! $rst->dptId !!}" onclick="get_Values('{!! $rst->dptId !!}')" />
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
         url:'delete_multiple_department/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Department</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Department Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Head Of Department</th><th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='120'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	   var na ='NA'; 
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
					
if(data[i].fName != na)
					{
option +="<tr> <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].title   +" " + data[i].fName   +"  "+ data[i].surname 
+"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		} 
		
		else
					{
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;"+   '&nbsp;&nbsp;&nbsp;&nbsp;'
+"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		} 							 
					  
				}
				
				$("#tbl").append(option); 
					//document.getElementById('paginate').className="hide_question";
			  
			 
			 
			 
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
         url:'delete_department/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Department</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Department Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Head Of Department</th><th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='120'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   var na="NA";
	    var ctr=0
	  var cnt =data.length;
	  
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
if(data[i].fName != na)
					{
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].title   +" " + data[i].fName   +"  "+ data[i].surname 
+"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		} 
		
		else
					{
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;"+   '&nbsp;&nbsp;&nbsp;&nbsp;'
+"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		} 					
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
					//document.getElementById('paginate').className="hide_question";
			  
			  
			   
			  
		 },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 //alert('Data Error'); 
	     
	  
    }  
		 
		});
		
	}
	}
  
 
		 
		
$(function() {
 
  
 $("#faculty1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty1").val() == "Selcet")
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
         url:'search_dpt',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty1").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Department</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Department Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Head Of Department</th><th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='120'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   
	    
		 var na="NA";
	  var option="";  
	   
	     for(i=0; i< data.length;i++)
				  {
				
			
			 
					
if(data[i].fName != na)
					{
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].title   +" " + data[i].fName   +"  "+ data[i].surname 
+"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		} 
		
		else
					{
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;"+   '&nbsp;&nbsp;&nbsp;&nbsp;'
+"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		} 						 
			 
			 
			  
				  
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
	  
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Department</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Department Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Head Of Department</th><th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='120'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].title   +" " + data[i].fName   +"  "+ data[i].surname   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
				 
				 
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
         url:'search_department',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Department</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Department Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Head Of Department</th><th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='120'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
   $("#tbl").html(table);
   
   var na='NA';
   
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
					
					if(data[i].fName != na)
					{
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].title   +" " + data[i].fName   +"  "+ data[i].surname 
+"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		} 
		
		else
					{
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department +"</span></td > <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;"+   '&nbsp;&nbsp;&nbsp;&nbsp;'
+"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editDepartment/ " +data[i].dptId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].dptId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].dptId +")' value='" +data[i].dptId +" ' id='" +data[i].dptId +"'  </span><input name='"+ txts.concat(data[i].dptId) +"' id='"+ txts.concat(data[i].dptId) +"' type='hidden' value='"+ data[i].department +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 //console.log('Searching Data'); 
		
		} 
				 
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



 
