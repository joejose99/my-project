 
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
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Question </span> 
            
             
              <div style="float:right; width:290px; margin-top:-5px; text-align:right; margin-right:70px;">  <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insert-Question'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel"></div>
                  
                  
             <div id="totSch" style="float:right; margin-top:-5px; width:50%; text-align:center;">  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search Question" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Question')"  >  




</div>
              
              </div>
              
              <div style="text-align:center; margin-top:10px; ">
              
              
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
   


  <table width="98%" bgcolor=""   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl" style="position:relative;"  >
<tr > 
	

 
 <th width='150'bgcolor='' align='left' valign='top' style="text-align:center;">Question</th> 

 
 <th width='120'bgcolor='' align='left' valign='top' style="text-align:center;" >OptionA</th> 
 
 <th width='120'bgcolor='' align='left' valign='top' style="text-align:center;" >OptionB</th> 
 <th width='120'bgcolor='' align='left' valign='top' style="text-align:center;" >OptionC</th> 
 <th width='120'bgcolor='' align='left' valign='top' style="text-align:center;" >OptionD</th> 
 <th width='120'bgcolor='' align='left' valign='top' style="text-align:center;" >OptionE</th> 
  <th width='120'bgcolor='' align='left' valign='top' style="text-align:center;" >Answer</th> 
   <th width='120'bgcolor='' align='left' valign='top' style="text-align:center;" >mark</th>  
 <th width='150'bgcolor='' align='left' valign='top' style="text-align:center;" >Department</th> 
<th width='150'bgcolor='' align='left' valign='top' style="text-align:center;" >Course Code</th>  

 
 <th width='70'bgcolor='' align='left' valign='top'   scope='col'style="text-align:center;"> </th> 

 
 <th  width='70'bgcolor='' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
 <th  width='70'bgcolor='' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
</tr> 
 
@foreach($query as $rst)
                 
					 

<tr>
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
 
 {{-- {!! $rst->question !!}--}}
 <?php
 
  
echo str_limit($rst->question ,50) ?>
</span>

<select name="lst" id="lst" hidden=""  ></select>
 <input name="txt{!! $rst->queId !!}" id="txt{!! $rst->queId !!}" type="hidden" value="{!! $rst->question !!}">
 
  </td > 

 <td align='left' bgcolor=''  valign ='top' >
  <span  style="margin:3px; display:block;">
{!! str_limit($rst->optionA,40) !!}
</span>
  </td > 
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
{!! str_limit(trim($rst->optionB),40) !!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
{!! str_limit($rst->optionC,40) !!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
{!! str_limit($rst->optionD,40) !!}
</span>

 
  </td > 
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
{!! str_limit($rst->optionE,40) !!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
{!! str_limit($rst->answer,40) !!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
{!! $rst->mark !!}
</span>

 
  </td > 

   

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
{!! $rst->department !!}
</span>

 
    </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
{!! $rst->cosId !!}
</span>

 
  </td >  

 

 <td align='left' bgcolor='#1D4B6D'  valign ='top' >
 <span  style="margin:3px; display:block;">
<a href ='edit-question/{{ $rst->queId }}' class='update'>Edit</a> </span></td > 



 <td align='left' bgcolor='#980905'  valign ='top' >
 <span  style="margin:3px; display:block;">
<a href ='#' class="del" onClick="destroy({{ $rst->queId }})">Delete</a> 


</span> </td > 


</td > 

 <td align='left' bgcolor='#980905'  valign ='top' class="table-td" >
 <span  style="margin:3px; display:block;">
 <input name="" type="checkbox" value=" {!! $rst->queId !!}" onClick="get_Values('{!! $rst->queId !!}')">

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
         url:'delete_multiple_question/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='140' >Question</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >OptionA</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >OptionB</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >OptionC</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >OptionD</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >OptionE</th><th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Answer</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >mark</th>   <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Department</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;' >course Id</th> <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].question.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].optionA.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].optionB.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].optionC.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].optionD.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].optionE.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].answer.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mark.substr(0,50) +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].department.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId.substr(0,50) +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-question/ " +data[i].queId +" ' class='Edit'>Update</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].queId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].queId +")' value='"+ data[i].queId +"' id='" +data[i].queId +"'  </span><input name='"+ txts.concat(data[i].queId) +"' id='"+ txts.concat(data[i].queId) +"' type='hidden' value='"+ data[i].question +"'><select name='lst' id='lst' hidden=''  ></select></td >"
				 
					  
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
         url:'delete-question/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Question</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >OptionA</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >OptionB</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >OptionC</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >OptionD</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >OptionE</th><th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Answer</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >mark</th>   <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Department</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;' >course Id</th> <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:3px; display:block;'>" + data[i].question.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].optionA.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].optionB.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].optionC.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].optionD.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].optionE.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].answer.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].mark.substr(0,50) +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].department.substr(0,50) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + data[i].cosId.substr(0,50) +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:3px; display:block;'><a href ='edit-question/ " +data[i].queId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:3px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].queId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:3px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].queId +")' value='"+ data[i].queId +"' id='" +data[i].queId +"'  </span><input name='"+ txts.concat(data[i].queId) +"' id='"+ txts.concat(data[i].queId) +"' type='hidden' value='"+ data[i].question +"'><select name='lst' id='lst' hidden=''  ></select></td >"
				 
					  
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
	 
	 
	 
	 document.getElementById('txtSearch').value="";
	
	 
	 
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
         url:'search-faculty',
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
	   
	   
	   
	   
 var table="<table width='98%' bgcolor=' ' cellpadding='2' cellspacing='2'  align='center' id='tbl'<tr > <th bgcolor=' ' align='left' valign='top' style=' text-align:center;' width='150' >Question</th> <th   width='120' bgcolor='' align='left' valign='top' style='  text-align:center;  ' >OptionA</th><th width='  120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionB</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionC</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionD</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionE</th><th width='100'bgcolor='' align='left' valign='top' style='text-align:center;' >Answer</th> <th width='120'bgcolor=' ' align='left' valign='top' style='text-align:center;' >mark</th>   <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >Department</th> <th width='100'bgcolor='' align='left' valign='top' style='text-align:center;' >course Id</th> <th width='70'bgcolor=' ' align='left' valign='top'   scope='col'style='text-align:center;'> </th> <th  width='70'bgcolor='' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor='' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  //for (i=0;i < data.length;i++)
				//{
					
					$.each(data['query'],function(key,val)
				{
				
		 			//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left' valign='top' class='table-td' ><span  style='margin:2px; display:block;'>" + jQuery.trim(val.question.substr(0,40)) +"..</span></td ><td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.optionA.substr(0,40)) +"..</span></td ><td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.optionB.substr(0,40)) +"..</span></td ><td align='left'valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.optionC.substr(0,40)) +"..</span></td ><td align='left'valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.optionD.substr(0,40)) +"..</span></td ><td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" +jQuery.trim(val.optionE.substr(0,40)) +"..</span></td > <td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.answer.substr(0,40)) +"..</span></td ><td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.mark) +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + jQuery.trim(val.department) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.cosId) +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:2px; display:block;'><a href ='edit-question/ " +val.queId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:2px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +val.queId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:2px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +val.queId +")' value='" +val.queId +" ' id='" +val.queId +"'  </span><input name='"+ txts.concat(val.queId) +"' id='"+ txts.concat(val.queId) +"' type='hidden' value='"+ val.question +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
				  
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
	 
	  
	  if($("#terms").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#clss").val() == "Select")
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
         url:'search-faculty-department',
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
				  
				 opt+='<option value ="'+ data.rstDpt[i].cosId +'">'+ data.rstDpt[i].cosId +'&nbsp;-&ensp;'+data.rstDpt[i].course +'</option>';
				 
				}
				  
				$("#subjects").html(opt);
	   
	   
	  
	   
 var table="<table width='98%' bgcolor=' ' cellpadding='2' cellspacing='2'  align='center' id='tbl'<tr > <th bgcolor=' ' align='left' valign='top' style=' text-align:center;' width='150' >Question</th> <th   width='120' bgcolor='' align='left' valign='top' style='  text-align:center;  ' >OptionA</th><th width='  120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionB</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionC</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionD</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionE</th><th width='100'bgcolor='' align='left' valign='top' style='text-align:center;' >Answer</th> <th width='120'bgcolor=' ' align='left' valign='top' style='text-align:center;' >mark</th>   <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >Department</th> <th width='100'bgcolor='' align='left' valign='top' style='text-align:center;' >course Id</th> <th width='70'bgcolor=' ' align='left' valign='top'   scope='col'style='text-align:center;'> </th> <th  width='70'bgcolor='' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor='' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  		$.each(data['query'],function(key,val)
				{
				
		 			//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left' valign='top' class='table-td' ><span  style='margin:2px; display:block;'>" + jQuery.trim(val.question.substr(0,40)) +"..</span></td ><td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.optionA.substr(0,40)) +"..</span></td ><td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.optionB.substr(0,40)) +"..</span></td ><td align='left'valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.optionC.substr(0,40)) +"..</span></td ><td align='left'valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.optionD.substr(0,40)) +"..</span></td ><td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" +jQuery.trim(val.optionE.substr(0,40)) +"..</span></td > <td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.answer.substr(0,40)) +"..</span></td ><td align='left' valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.mark) +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + jQuery.trim(val.department) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:2px; display:block;'>" + jQuery.trim(val.cosId) +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:2px; display:block;'><a href ='edit-question/ " +val.queId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:2px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +val.queId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:2px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +val.queId +")' value='" +val.queId +" ' id='" +val.queId +"'  </span><input name='"+ txts.concat(val.queId) +"' id='"+ txts.concat(val.queId) +"' type='hidden' value='"+ val.question +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
				  
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
         url:'search-faculty-department-course',
         data:{"_token":$('#signup-token').val(),"clsId":$("#clss").val(),"terms":$("#terms").val(),"subjects":$("#subjects").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
 var table="<table width='98%' bgcolor=' ' cellpadding='2' cellspacing='2'  align='center' id='tbl'<tr > <th bgcolor=' ' align='left' valign='top' style=' text-align:center;' width='150' >Question</th> <th   width='120' bgcolor='' align='left' valign='top' style='  text-align:center;  ' >OptionA</th><th width='  120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionB</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionC</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionD</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionE</th><th width='100'bgcolor='' align='left' valign='top' style='text-align:center;' >Answer</th> <th width='120'bgcolor=' ' align='left' valign='top' style='text-align:center;' >mark</th>   <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >Department</th> <th width='100'bgcolor='' align='left' valign='top' style='text-align:center;' >course Id</th> <th width='70'bgcolor=' ' align='left' valign='top'   scope='col'style='text-align:center;'> </th> <th  width='70'bgcolor='' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor='' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].question.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].optionA.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].optionB.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].optionC.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" +jQuery.trim(data[i].optionD.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].optionE.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].answer.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].mark.substr(0,40)) +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].department.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].cosId.substr(0,40)) +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-question/ " +data[i].queId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:3px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].queId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].queId +")' value='"+ data[i].queId +"' id='" +data[i].queId +"'  </span><input name='"+ txts.concat(data[i].queId) +"' id='"+ txts.concat(data[i].queId) +"' type='hidden' value='"+ data[i].question +"'><select name='lst' id='lst' hidden=''  ></select></td >"

				 
				 
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
	  
	   document.getElementById('subjects').selectedIndex = 0;
	    document.getElementById('clss').selectedIndex = 0;
	   document.getElementById('terms').selectedIndex = 0;
	  
	  
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-question',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
 var table="<table width='98%' bgcolor=' ' cellpadding='2' cellspacing='2'  align='center' id='tbl'<tr > <th bgcolor=' ' align='left' valign='top' style=' text-align:center;' width='150' >Question</th> <th   width='110' bgcolor='' align='left' valign='top' style='  text-align:center;  ' >OptionA</th><th width='  120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionB</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionC</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionD</th> <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >OptionE</th><th width='100'bgcolor='' align='left' valign='top' style='text-align:center;' >Answer</th> <th width='120'bgcolor=' ' align='left' valign='top' style='text-align:center;' >mark</th>   <th width='120'bgcolor='' align='left' valign='top' style='text-align:center;' >Department</th> <th width='100'bgcolor='' align='left' valign='top' style='text-align:center;' >course Id</th> <th width='70'bgcolor=' ' align='left' valign='top'   scope='col'style='text-align:center;'> </th> <th  width='70'bgcolor='' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor='' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	     for (i=0;i < data.length;i++)
				  {
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].question.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].optionA.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].optionB.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].optionC.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" +jQuery.trim(data[i].optionD.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].optionE.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].answer.substr(0,30)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].mark.substr(0,40)) +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].department.substr(0,40)) +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:3px; display:block;'>" + jQuery.trim(data[i].cosId.substr(0,40)) +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:3px; display:block;'><a href ='edit-question/ " +data[i].queId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:3px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].queId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:2px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].queId +")' value='"+ data[i].queId +"' id='" +data[i].queId +"'  </span><input name='"+ txts.concat(data[i].queId) +"' id='"+ txts.concat(data[i].queId) +"' type='hidden' value='"+ data[i].question +"'><select name='lst' id='lst' hidden=''  ></select></td >"
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



   
