 
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  <span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1> 

 <meta name="csrf-token" content="{{ csrf_token() }}">
 
@stop

 
 
@section('content')
 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>

<div id="prog_course" class="prog_course">
 
<select class="mnu" name="faculty2" id="faculty2"> 
             
              
               
                               
                				<option  value="Select"> Select Faculty</option>
                                @foreach($faculty as $st)
   <option value="{!! trim($st->falId )!!}"> {!! $st->faculty !!} </option>
   @endforeach 
                               
                               
                               </select>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select class="selectAdmin" name="dpt2" id="dpt2"> 
             
              
               
                               
                				<option  value="Select"> Select Department</option>
                                
                               
                               
                               </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
<select class="selectAdmin" name="program1" id="program1"> 
             
              
               
                               
                				<option  value="Select"> Select Program</option>
                                
                               
                               
                               </select>
                              
                             &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp; 
                              
                        <!--      
                         <input name="butInsert" id="butInsert" type="button" value="Program Course"   class="but"> 
                         -->
                         <label id="edit_but"  style="visibility:visible">
        <a class="button" href="#popup1"  onclick="getPrgCourse()">Program Course</a>
        
        
        
        </label>        
                               

 </div>


<div style="height:30px; clear:both;"> </div>


 <div class="panel panel-default">
                <div class="panel-heading">
                
                
                 <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Course</span>
                  
                  
                  
             <div id="totSch" style="float:right; margin-top:-5px; width:70%;"  >  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search Course Code" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Course Code')"  >  




</div>

 

 
</div>
              
              <div style="text-align:center; margin-top:10px;">
              
              
              &nbsp;&nbsp;
             <div style=" margin-left:10px; float:left;">
             
             
             <select class="mnu" name="faculty1" id="faculty1"> 
               
                				<option  value="Select Faculty"> Select Faculty</option>
                                @foreach($faculty as $st)
   <option value="{!! trim($st->falId )!!}"> {!! $st->faculty !!} </option>
   @endforeach 
                               
                               
                               </select>
             &nbsp;&nbsp;&nbsp;&nbsp; 
              <select class="mnu" name="dpt1" id="dpt1"> 
                				<option  value="Select"> Select Department</option>
                                 
                               </select>
                                 
      
      
      &nbsp;&nbsp;&nbsp;&nbsp; 
               <select class="mnu" name="cls1" id="cls1">  
                				<option  value=""> Select Level</option>
                                @foreach($level as $st)
   <option value="{!! trim($st->levId )!!}"> {!! $st->level !!} </option>
   @endforeach 
                               
                               
                               </select>
                               
                               
                               
                                &nbsp;&nbsp;&nbsp;&nbsp; 
               <select class="mnu" name="term1" id="term1">  
               
                				<option  value=""> Select Semester</option>
                                @foreach($semester as $st)
   <option value="{!! trim($st->semId )!!}"> {!! $st->semester !!} </option>
   @endforeach 
                               
                               
                               </select>
                               
                           &nbsp;&nbsp;&nbsp;&nbsp;    <label  id="SelectError"> </label>
    </div></div>
                

               
                
     <div class="panel-body" >
           <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
           <div style="  text-align:center;" > 
     <span style="margin-left:7px; color:#4E6A9E; font-weight:bold;">
                         
             </span>
       </div>          
  
 <div id="error-page" style="text-align:center; font-weight:bold;"> </div>
 <div id="success-page" style="text-align:center; font-weight:bold;"> </div>
 
  

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl"  >
<tr > 
	
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Code</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Title </th> 
 
 <th width='120'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Unit</th> 

 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Description</th> 
 
  
  
 <th width='120'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Registered Date</th> 

  <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Mode</th> 


 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

 

 
 </tr> 
 

                 <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"> 
 </table>				 
	 		



 <!--           
     
    <h1>Popup/Modal Windows without JavaScript</h1>
<div class="box">
	<a class="button" href="#popup1">Let me Pop up</a>
</div>

   -->     
            
            
   <div id="popup1" class="overlay">
	<div class="popup">
		<h2 id="prg"> </h2> 
         
		<a class="close" href="#">&times;</a>
		<div class="tbl2" >
			<!-- Thank to pop me out of that button, but now i'm done so you can close this window. -->


  
 
  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tb2" height="200"   >
<tr > 
	
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Code</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Title </th> 
 
 <th width='120'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Unit</th> 
  
  <th width='120'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Mode</th> 
  

 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

<th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

  <th width='50'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

 
 </tr> </table>
 
 <!--
 <div style="margin-top:25px;">
 
 	<a class="button" href="#popup1" onClick="showPopupPage('./edit-vote/{{Session::get('selection')}}')" >Login</a>  
 	
 	<a class="button" href="#popup1" onClick="login()" >Login</a>
 	
 	
 	</div> -->
 	
 	
		</div>
	</div>
</div>





         
   

  
 
             
             
             
             
             
            
            	 
          
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
			var lsts="lsts";
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
         url:'delete_multiple-program-course/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course </th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th> <th width='' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Description</th><th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
					
option +="<tr> <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId	 +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td ><td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseDetails.substring(0,200)   +"..</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].courseMode +"</span></td >  <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgramCourse/"+data[i].prcId +"' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prcId +")' value='" +data[i].prcId +" ' id='" +data[i].prcId +"'  </span><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 
					  
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
		
		var prgId= document.getElementById('program1').value;
		
		 
		var del=confirm("Are you sure you want to delete this item ?"+'\n' +schss);
		//var delMultiple=confirm('Are you sure you want to delete these ?'+'\n' +question);
		 
		 
		  
	if(del)	
	{ 
		
		$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'delete-program-course/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId,"prgId":prgId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
		var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='130' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='180' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title </th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th> <th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Mode</th>  <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> </tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    var ctr=0
	  var cnt =data.length;
	  
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
option +="<tr> <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId	 +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td ><td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseMode   +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'></tr>";
					
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
				
				$("#tb2").append(option); 
					//document.getElementById('paginate').className="hide_question";
			  
			  
			   
			  
		 },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 //alert('Data Error'); 
	     
	  
    }  
		 
		});
		
	}
	}
  
 
 
 
 
 
 
 function getPrgCourse()	
	{
		
		var dtArray=[];
		
		   
		  
		 
		 
		var program= document.getElementById('program1').value;
		
		 
		if(program =='Select')
		{
		  alert('Select Program Value is required ');
		  
		  var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Select  Program Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		  return false;
		  
		 } 
		
		  
		 
		 
		
		
		 dtArray.push({ 
			   prgId:program
			  
			});
			
			 
	 	
 var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
		
		
		$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'create-program-course-view',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 		
		  
		  
		 
$("#prg").html("<span style='text-align: center; font-family: Tahoma, Arial, sans-serif;color: #3C8DBC; margin: 80px 0;'>"+ data[0].program  +"</span> ");
		
		var table="<table class='table' width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='160' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='320' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title </th><th width='180' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th> <th width='180' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Mode</th>  <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> </tr>";
    
   $("#tb2").html(table);
   
     
    
	    
	   var option="";  
	   var i=0;
	     for (i=0;i < data.length;i++)
				  {
	     
		 		 
				
option +="<tr> <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId	 +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td ><td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseMode   +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'></tr>";
				 
				 
				}
				
				$("#tb2").append(option); 
		
		
		
		
		     //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	    
	  
    }   
		 
     });
  
	}
		
 
 
 
 
		
		
		
function insertPrgCourse(quesId)	
	{
		
		var dtArray=[];
		
		$("#error-page").html('');
		$("#success-page").html('');
		   txtcode='txtcode';
		   
		 lstcode='lstcode';
		  
		  var md= lstcode.concat(quesId);
		var schs= txtcode.concat(quesId);
		 
		 var CourseMode =document.getElementById(md).value ;
		// alert(schs);
		
		var schss= document.getElementById(schs).value;
		
		var program= document.getElementById('program1').value;
		
		if(CourseMode =='Select')
		{
		  alert('Select Course Mode Value is required ');
		  
		  var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Select Course Mode Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		  return false;
		  
		 } 
		 
		if(program =='Select')
		{
		  alert('Select Program Value is required ');
		  
		  var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Select  Program Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		  return false;
		  
		 } 
		
		  
		
		var del=confirm("Are you sure you want to Add this Course Code:  ?"+'\n' + schss);
		//var delMultiple=confirm('Are you sure you want to delete these ?'+'\n' +question);
		 
	 
		  
	if(del)	
	{ 
		
		
		 dtArray.push({
			 cosId:schss,
			  courseMode:CourseMode,
			   prgId:program
			  
			});
			
			 
	 	
 var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
		
		
		$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'create-program-course',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 		
		var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; '+ data +' &nbsp;</span>';
       $("#success-page").html(saved);
	   alert(data);
		
		
		     //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	    
	  
    }   
		 
     });
  
	}}
		
		
		 
		
$(function() {
 
  
  
  var lstcode="lstcode";
  var txtcode="txtcode";
  
  
  
  
  
  $("#faculty2").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	  document.getElementById('txtSearch').value='';
	 
	var ctr =0;
	 
	  
	  if($("#faculty2").val() == "Select")
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
         url:'search_fal',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty2").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
			
			
			 var sel="Select Department";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				/*  
				for (i=0;i < data.length;i++)
				{
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				}
				*/
				$.each(data['department'],function(key,val)
				{
					if(val.department != 'NA')
					{
					option+='<option value ="'+val.dptId +'">'+ val.department+'</option>';
					 }
				});
				
				 
				$("#dpt2").html(option);
	  
			
			
		 
	        //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			

 
 
 
 
 
 
 
 
 $("#dpt2").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  
	  if($("#faculty1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value, is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	 
	
	  if(ctr != 0 )
	  {
		  return false;
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
         url:'search-course-fal-dpt-program-course',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty2").val(),"department":$("#dpt2").val()},
		 processData:"false",
         success: function(data) {
  
   var sel="Select Program";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
			  	 
				 for (i=0;i < data.length;i++)
				{
				 
					option+='<option value ="'+data[i].prgId +'">'+ data[i].program+'</option>';
					 
				} 
				 
				 
				$("#program1").html(option);
	  
	   
					  
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
  
  
  
  
  
  
  
  
  
  $("#faculty1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty  !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	 document.getElementById('cls1').selectedIndex = 0;
	    document.getElementById('term1').selectedIndex = 0;
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	    //document.getElementById('cls1').value='Select';
	   
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
 //var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search_course_fal',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
    var sel="Select Department";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
			/*
				 for (i=0;i < data.length;i++)
				 
				 { 
				 //for (var i=0;i < data.dpt.length;i++)
				 
					
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				} 
				
				
				 
				$("#dpt1").html(option);
				
				*/
				
				for (var i=0;i < data.rstDpt.length;i++)
				{
				 if(data.rstDpt[i].department != 'NA')
				{	
				 option+='<option value ="'+ data.rstDpt[i].dptId +'">'+data.rstDpt[i].department +'</option>';
				}
				}
				
				
				 
				$("#dpt1").html(option);
	  
	   
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='100' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='170' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title </th><th width='90' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>    <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th width='90'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th></tr>";
   
   $("#tbl").html(table);
   
	   
	  
		  
	  var option="";  
	   
	    // for(i=0; i< data.length;i++)
		
				 // {
					 
				 $.each(data['query'],function(key,val)
				{
			 
			// name='"+ lsts.concat(val.courseId) +"'
			    
					
option +="<tr> <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.cosId	 +" <input type='hidden' name='"+txtcode.concat(val.courseId) +"' id='"+txtcode.concat(val.courseId) +"' value='"+ val.cosId +"'> </span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.course +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ val.courseUnit   +"</span></td >   <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(val.courseId) +"' class='mnu'><option  value='Select'> Select </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='#' class='update' onClick='insertPrgCourse("+val.courseId +" )'>Add Course</a> </span></td ></tr> ";
						 
						  
			 
			 
			  
				 
					});	
				
				$("#tbl").append(option); 
					//document.getElementById('paginate').className="hide_question";
					
					 var ctr=data.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }
	         $("#SelectError").html('');
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			

 
 
 
 
 
 
 
 
 $("#dpt1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  
	  
	   if($("#dpt1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	 
	  document.getElementById('cls1').selectedIndex = 0;
	    document.getElementById('term1').selectedIndex = 0;
	
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
         url:'search_course_fal_dpt',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"dptId":$("#dpt1").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  
	 
	   
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='100' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='170' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title </th><th width='90' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>    <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th width='90'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th></tr>";
    
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
					
					
					
option +="<tr> <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId	 +" <input type='hidden' name='"+ txtcode.concat(data[i].courseId) +"' id='"+ txtcode.concat(data[i].courseId) +"' value='"+ data[i].cosId +"'></span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td >  <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" +lstcode.concat(data[i].courseId) +"' class='mnu' ><option  value='Select'> Select </option> <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='#' class='update' onClick='insertPrgCourse("+data[i].courseId +" )'>Add Course</a> </span></td > </tr> ";
				 
				 
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
			
 
 
 
 $("#cls1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  
	    if($("#dpt1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	 
	
	document.getElementById('term1').selectedIndex = 0;
	     
		
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
         url:'search_course_level',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"dptId":$("#dpt1").val(),"levId":$("#cls1").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='100' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='170' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title</th><th width='90' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>    <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th width='90'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th></tr>";
    
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
					
					
					
option +="<tr> <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId	 +" <input type='hidden' name='"+ txtcode.concat(data[i].courseId) +"' id='"+ txtcode.concat(data[i].courseId) +"' value='"+ data[i].cosId +"'></span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td >  <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" +lstcode.concat(data[i].courseId) +"' class='mnu' ><option  value='Select'> Select </option> <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='#' class='update' onClick='insertPrgCourse("+data[i].courseId +" )'>Add Course</a> </span></td > </tr> ";
				 
				 
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
			
 
 
 
 
 
 
 
 
 
 $("#term1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  
	  
	  
	    if($("#dpt1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	  if($("#cls1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Level Value is required !! &nbsp;</span>';
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
         url:'search-course-semester',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"dptId":$("#dpt1").val(),"levId":$("#cls1").val(),"semId":$("#term1").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='100' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='170' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title</th><th width='90' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>    <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th width='90'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th></tr>";
    
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
					
					
					
option +="<tr> <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId	 +" <input type='hidden' name='"+ txtcode.concat(data[i].courseId) +"' id='"+ txtcode.concat(data[i].courseId) +"' value='"+ data[i].cosId +"'></span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td >  <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" +lstcode.concat(data[i].courseId) +"' class='mnu' ><option  value='Select'> Select </option> <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='#' class='update' onClick='insertPrgCourse("+data[i].courseId +" )'>Add Course</a> </span></td > </tr> ";
				 
				 
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
      document.getElementById('faculty1').selectedIndex = 0;
	    document.getElementById('dpt1').selectedIndex = 0;
	   document.getElementById('cls1').selectedIndex = 0;
	    document.getElementById('term1').selectedIndex = 0;
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-course-text',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='100' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='170' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title </th><th width='90' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>    <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th width='90'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th></tr>";
    
   $("#tbl").html(table);
   
   
   
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
					
					
					
option +="<tr> <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId	 +" <input type='hidden' name='"+ txtcode.concat(data[i].courseId) +"' id='"+ txtcode.concat(data[i].courseId) +"' value='"+ data[i].cosId +"'></span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td >  <td align='left' bgcolor= #ffffff   valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" +lstcode.concat(data[i].courseId) +"' class='mnu' ><option  value='Select'> Select </option> <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='#' class='update' onClick='insertPrgCourse("+data[i].courseId +" )'>Add Course</a> </span></td > </tr> ";
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



 
