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
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Set  Exam Question </span> 
            
             
                  <div style="float:right; width:290px; margin-top:-5px; text-align:right; margin-right:70px;">  <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insert-examTest'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel"></div>
                  
                  
             <div id="totSch" style="float:right; margin-top:-5px; width:50%; text-align:center;">  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search Course Code" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Course Code')"  >  

 
</div>
              
              </div>
              
              <div style="text-align:center; margin-top:10px;">
              
              
              &nbsp;&nbsp;
              <label>Faculty: </label>&nbsp;&nbsp; <select class="mnu" name="clss" id="clss"> 
              
              <option  value="Select"  >Select Faculty </option >
    @foreach($faculty as $rst)
   <option value=" {!!$rst->falId !!}"> {!! $rst->faculty !!}</option>
   @endforeach</select>
   
    &nbsp;&nbsp;<label>Department: </label>&nbsp;&nbsp; <select id="terms" class="mnu" name="terms"> 
   
    
   <option  value="Select Department">Select Department</option>
 </select>
 
 
 &nbsp;&nbsp;<label>Course: </label>&nbsp;&nbsp;<select id="subjects" class="mnu" name="subjects">
   
   <option  value="Select">Select Course</option>
    </select> </div>
                

               
                
     <div class="panel-body" >
           <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
           <div style="  text-align:center;" > 
     <span style="margin-left:7px; color:#4E6A9E; font-weight:bold;">
                         
                         </span>
                        </div> 
                        
                                 
   <script language="javascript">
   document.getElementById('terms').disabled="true";
    document.getElementById('subjects').disabled="true";
   </script>
   


  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl"  >
<tr > 
	

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Code</th> 

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Course Title</th> 
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Test Type</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >mark</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Exam Time</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >No of Question</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Created Date</th> 
 
 <th width='70'bgcolor='#ffffff' align='left' valign='top'   scope='col'style="text-align:center;"> </th> 

 
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
</tr> 
 
@foreach($query as $rst)
                 
					 

<tr>
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 
   {!! $rst->cosId !!} 
  
</span>

<select name="lst" id="lst" hidden=""  ></select>
 <input name="txt{!! $rst->exmId !!}" id="txt{!! $rst->exmId !!}" type="hidden" value="{!! $rst->cosId !!}">
 
  </td > 

 <td align='left' bgcolor=''  valign ='top' >
  <span  style="margin:8px; display:block;">
{!! $rst->course  !!}
</span>
  </td > 
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->examTest !!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->markPerQuestion !!}
</span>

 
  </td > 
  
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->duration !!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->quesNo !!}
</span>

 
  </td > 
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->created_at !!}
</span>

 
  </td > 

  
 

 <td align='left' bgcolor='#1D4B6D'  valign ='top' >
 <span  style="margin:8px; display:block;">
<a href ='edit-examTest/{{ $rst->exmId }}' class='update'>Edit</a> </span></td > 



 <td align='left' bgcolor='#980905'  valign ='top' >
 <span  style="margin:8px; display:block;">
<a href ='#' class="del" onClick="destroy({{ $rst->exmId }})">Delete</a> 


</span> </td > 


</td > 

 <td align='left' bgcolor='#980905'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 <input name="" type="checkbox" value=" {!! $rst->exmId !!}" onClick="get_Values('{!! $rst->exmId !!}')">

</span>

 
  </td > 

 
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
				 txt="txt";
				 selectValues=$(this).text();
				 
				
				txt= '#'+txt.concat(selectValues);
				    
                 
				 
				question += $(txt).val() +'\n';
				  
				 //alert(question);
				 
			
			dtArray.push({
			 quesId:selectValues });
			txt="";
				 selectValues="";
			});
			if(question=="")
			{
				alert('Select Check Box to Delete');
				exit;
			}
			//alert('Do you want to delete this? '+'\n' +question );
			
			var delMultiple=confirm('Are you sure you want to delete these ?  '+'\n' +question);
		 
		 
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
         url:'delete-multiple-examTest/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Course Code</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Title</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Test Type</th><th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >MarK</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Exam Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >No of Question</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Created At</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].examTest  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].markPerQuestion +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].duration  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].quesNo  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-examTest/ " +data[i].exmId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].exmId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].exmId +")' value='"+ data[i].exmId +"' id='" +data[i].exmId +"'  </span><input name='"+ txts.concat(data[i].exmId) +"' id='"+ txts.concat(data[i].exmId) +"' type='hidden' value='"+ data[i].cosId +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
					  
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
		var del=confirm('Are you sure you want to delete this item ?   '+'\n' + schss);
		 
		  
	if(del)	
	{ 
		
		$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'delete-examTest/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Course Code</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Title</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Test Type</th><th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >MarK</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Exam Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >No of Question</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Created At</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].examTest  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].markPerQuestion +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].duration  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].quesNo  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-examTest/ " +data[i].exmId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].exmId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].exmId +")' value='"+ data[i].exmId +"' id='" +data[i].exmId +"'  </span><input name='"+ txts.concat(data[i].exmId) +"' id='"+ txts.concat(data[i].exmId) +"' type='hidden' value='"+ data[i].cosId +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
					  
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
		
		 
		
$(function() {
 
  
 $("#clss").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	
	 
	 
	var ctr =0;
	 
	   
	  if($("#clss").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	    
	  document.getElementById('terms').disabled=false;
	  
   document.getElementById('terms').value="Select";
   document.getElementById('subjects').value="Select";
	   
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
 //var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-examTest-faculty',
         data:{"_token":$('#signup-token').val(),"clsId":$("#clss").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
	  
	   
	    var sel="Select";
			 var option='';
			 var opt='';
			 opt ='<option value="Select">'+sel+'</option>';
			
				/*  
				for (i=0;i < data.length;i++)
				{
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				}
				*/
				
				
				
				 
				for (var i=0;i < data.rstDpt.length;i++)
				{
				 if(data.rstDpt[i].department != 'NA')
				{	
				 opt+='<option value ="'+ data.rstDpt[i].dptId +'">'+data.rstDpt[i].department +'</option>';
				}
				}
				  
				$("#terms").html(opt);
	   
	   
	   
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Course Code</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Title</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Test Type</th><th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >MarK</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Exam Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >No of Question</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Created At</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  //for (i=0;i < data.length;i++)
				//{
					
					$.each(data['query'],function(key,val)
				{
				
		 			//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + val.cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.course  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.examTest  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.markPerQuestion +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.duration  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.quesNo  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td >  <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-examTest/ " +val.exmId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +val.exmId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +val.exmId +")' value='"+ val.exmId +"' id='" +val.exmId +"'  </span><input name='"+ txts.concat(val.exmId) +"' id='"+ txts.concat(val.exmId) +"' type='hidden' value='"+ val.cosId +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
				  
				});
				
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
			

 
 
 
 
 
 
 
 
 $("#terms").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#terms").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#clss").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	    
	  document.getElementById('terms').disabled=false;
   document.getElementById('subjects').disabled=false;
	   document.getElementById('subjects').value="Select";
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
//var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-faculty-department-examTest',
         data:{"_token":$('#signup-token').val(),"clsId":$("#clss").val(),"terms":$("#terms").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
	    
	    var sel="Select";
			 var option='';
			 var opt='';
			 opt ='<option value="Select">'+sel+'</option>';
			
				/*  
				for (i=0;i < data.length;i++)
				{
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				}
				*/
				
				
				
				 
				for (var i=0;i < data.rstDpt.length;i++)
				{
				  
				 opt+='<option value ="'+ data.rstDpt[i].cosId +'">'+data.rstDpt[i].course +'</option>';
				 
				}
				  
				$("#subjects").html(opt);
	   
	   
	  
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Course Code</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Title</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Test Type</th><th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >MarK</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Exam Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >No of Question</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Created At</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  		$.each(data['query'],function(key,val)
				{
				
		 			//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + val.cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.course  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.examTest  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.markPerQuestion +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.duration  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.quesNo  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td >  <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-examTest/ " +val.exmId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +val.exmId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +val.exmId +")' value='"+ val.exmId +"' id='" +val.exmId +"'  </span><input name='"+ txts.concat(val.exmId) +"' id='"+ txts.concat(val.exmId) +"' type='hidden' value='"+ val.cosId +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
				  
				});
				
				$("#tbl").append(option); 
			    var ctr=data['query'].length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
 
 
 
 //SUBJECT, CLASS AND TERM SESSION START HERE
 
 
 
 $("#subjects").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	
	   
	  
	  if($("#terms").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#clss").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	 if($("#subjects").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Course Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	    
	 // document.getElementById('terms').disabled=false;
   document.getElementById('subjects').disabled=false;
	    
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
//var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-faculty-department-course-examTest',
         data:{"_token":$('#signup-token').val(),"clsId":$("#clss").val(),"terms":$("#terms").val(),"subjects":$("#subjects").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Course Code</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Title</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Test Type</th><th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >MarK</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Exam Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >No of Question</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Created At</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].examTest  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].markPerQuestion +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].duration  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].quesNo  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-examTest/ " +data[i].exmId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].exmId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].exmId +")' value='"+ data[i].exmId +"' id='" +data[i].exmId +"'  </span><input name='"+ txts.concat(data[i].exmId) +"' id='"+ txts.concat(data[i].exmId) +"' type='hidden' value='"+ data[i].cosId +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"

				 
				 
				}
				
				$("#tbl").append(option); 
				
				var ctr=data.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }
         },
		 error: function(data) {
         
	   //console.log('Data Error'); 
	   
		 alert('Data not Found');
		          
	 
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
	
    document.getElementById('subjects').value='Select';
   document.getElementById('clss').value='Select';
    document.getElementById('terms').value='Select';
	  
	  
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-examTest',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Course Code</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Title</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Test Type</th><th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >MarK</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Exam Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >No of Question</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Created At</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	     for (i=0;i < data.length;i++)
				  {
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].examTest  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].markPerQuestion +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].duration  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].quesNo  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-examTest/ " +data[i].exmId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].exmId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].exmId +")' value='"+ data[i].exmId +"' id='" +data[i].exmId +"'  </span><input name='"+ txts.concat(data[i].exmId) +"' id='"+ txts.concat(data[i].exmId) +"' type='hidden' value='"+ data[i].cosId +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
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
    <link href="../exam/css/popup.css" rel="stylesheet" type="text/css" />
    
     

@stop

@section('js')
 
@stop

 @stop



   
