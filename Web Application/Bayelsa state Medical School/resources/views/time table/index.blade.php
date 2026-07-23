 
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  <span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1> 

 <meta name="csrf-token" content="{{ csrf_token() }}">
 
@stop

 
 
@section('content')
   
  
     
       <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
        
 <script>
  function lecture()
{
	  
	var values =document.getElementById('optLecture').value="Lecture";
	document.getElementById('txtChoice').value="Lecture";
	
	
	 document.getElementById('displayExam').className="hide_question";
	 document.getElementById('optLE').style.height='50px';
	
}

function exam()
{
	//document.getElementById('optE').className="show_question";
	var values =document.getElementById('optExam').value="Exam";
	
	document.getElementById('txtChoice').value="Exam";
	
	 document.getElementById('displayExam').className="show_question";
	 document.getElementById('optLE').style.height='100px';
	
}
 

</script>






 
        
            <div class="panel panel-default">
                <div class="panel-heading">
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Time Table </span> 
            
             
              <div style="float:right; width:75%; margin-top:-5px; text-align:right; margin-right:70px;"> 
              
              
              
              <span class="hide_question" id="spUnpublish">
                             <input name="butUnpublish" type="button" value="Unpublish"  id="butUnpublish" class="but">
                             </span>
    &nbsp;&nbsp;&nbsp;&nbsp;

              
            <span class="hide_question" id="spPub" >
               <input name="butPublish" type="button" value="Publish"  id="butPublish" class="but">
               
               </span>
    &nbsp;&nbsp;&nbsp;&nbsp;
  <label style=" margin-top:10px; " for="optLecture">&nbsp;&nbsp;&nbsp;Lecture:</label>
  <input name="optionChoice" type="radio" id="optLecture" onClick="lecture()" value="Lecture" checked   />  &nbsp; &nbsp;
   <label style="margin-top:10px; " for="optExam">&nbsp;&nbsp;Exam:</label>
   <input name="optionChoice" type="radio" id="optExam" onClick="exam()"   value="Exam" /> 
    
    
   
   <input name="txtPublish" type="hidden" id="txtPublish"  value=""   /> 
    <input name="txtChoice" type="hidden" id="txtChoice"  value="Lecture"   /> 
   
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
              
              
              
              
              
             
               <a class="button" href="#popup1"  >Preview</a>
               &nbsp;&nbsp;&nbsp;&nbsp;
               <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insert-time-table'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel">
              
             
              
              </div>
                  
              <!--    
             <div id="totSch" style="float:right; margin-top:-5px; width:50%; text-align:center;" class="hide_question">  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search Course" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Question')"  >  


 

</div> -->
              
              </div>
              
              <div style="text-align:center; margin-top:10px;">
              
              
              &nbsp;&nbsp;
              <select class="mnu" name="faculty1" id="faculty1"> 
              
              <option  value="Select"  >Select Faculty </option >
    @foreach($faculty as $rst)
   <option value="{!!$rst->falId!!}"> {!! $rst->faculty !!}</option>
   @endforeach</select>
   
    &nbsp;&nbsp; <select id="terms" class="mnu" name="terms"> 
   
    
   <option  value="Select Department">Select Department</option>
 </select>
 
 
 &nbsp;&nbsp;<select id="level"  class="mnu">
   
   <option  value="Select">Select Level</option>
   
    @foreach($level as $rst)
   <option value="{!!trim($rst->levId) !!}"> {!! $rst->level !!}</option>
   @endforeach</select>
    </select> 
 
 
 &nbsp;&nbsp;<select id="semester" class="mnu" >
   
   <option  value="Select">Select Semester</option>
   
    @foreach($semester as $rst)
   <option value="{!!trim($rst->semId) !!}"> {!! $rst->semester !!}</option>
   @endforeach</select>
    </select> 
 
 &nbsp;&nbsp;<select id="subjects" class="mnu" name="subjects">
   
   <option  value="Select">Select Course</option>
    </select>
    
    
    
    
    
    
     </div>
                

               
                
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
   
<div id="SelectError"> </div>

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl"  >
<tr > 
	

 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Day</th> 
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Code</th> 

 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Room No</th> 
 
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Time</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Semester</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Level</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Program</th>  
   <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Session</th>  

 <!--
 <th width='70'bgcolor='#ffffff' align='left' valign='top'   scope='col'style="text-align:center;"> </th> 

 
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
 
 -->
</tr> 
 
@foreach($query as $rst)
                 
					 

<tr>

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!  $rst->day !!}
</span>

 
  </td > 


 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 
 {{-- {!! $rst->question !!}--}}
  
 
  
{!! $rst->cosId !!}
</span>

<select name="lst" id="lst" hidden=""  ></select>
 <input name="txt{!! $rst->timId !!}" id="txt{!! $rst->timId !!}" type="hidden" value="{!! $rst->roomNumber !!}">
 
  </td > 

 <td align='left' bgcolor=''  valign ='top' >
  <span  style="margin:8px; display:block;">
{!! $rst->roomNumber !!}
</span>
  </td > 
  
 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!  $rst->time !!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!  $rst->semester  !!}
</span>

 
  </td > 
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!  $rst->level  !!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! str_limit($rst->program,50) !!}
</span>

 
  </td > 
 

   

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->academic_session !!}
</span>

 
    </td > 

  

 
<!--
 <td align='left' bgcolor='#1D4B6D'  valign ='top' >
 <span  style="margin:8px; display:block;">
<a href ='edit-time-table/{{ $rst->timId }}' class='update'>Edit</a> </span></td > 



 <td align='left' bgcolor='#980905'  valign ='top' >
 <span  style="margin:8px; display:block;">
<a href ='#' class="del" onClick="destroy({{-- $rst->timId --}})">Delete</a> 


</span> </td > 


</td > 

 <td align='left' bgcolor='#980905'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 <input name="" type="checkbox" value="{{-- {!! $rst->timId !!} --}}" onClick="get_Values(' {{-- {!! $rst->timId !!} --}}')">

</span>

 
  </td > 
-->
 
</tr>
   
	
						
					  
					  
				 
				@endforeach
 </table>				 
	 			 
       <div style="text-align:center;" id="paginate"> {{ $query->links() }}  </div>    
         
	    <div id="lengths" style="height:30px;"> </div>
               
             
             
             
             
             
             
         
         
         
          <div id="popup1" class="overlay">
	<div class="popup">
		<h2 id="prg"> </h2> 
         
		<a class="close" href="#">&times;</a>
		<div class="tbl2" >
			<!-- Thank to pop me out of that button, but now i'm done so you can close this window. -->

<div style="margin:25px;">
   <select id="studentId" class="select" >
   
   <option  value="Select">Select Student</option>
   
    @foreach($student as $rst)
   <option value="{!!trim($rst->stdId) !!}">{!!trim($rst->stdId) !!}&nbsp;&nbsp; {!! $rst->fName !!} &nbsp; {!! $rst->surname !!}</option>
   @endforeach</select>
    </select> 
 </div>
 
   
  
 
  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tb2" height="200"   >
<tr > 
	
 
 <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 
 <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">8 - 9</th> 
 
 <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">9 - 10</th> 
  
   

 <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">10 - 11</th> 

<th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">11 - 12</th> 

  <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">12 - 1</th> 

 <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">1 - 2</th> 
 
  <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">2 - 3</th> 
  
   <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">3 - 4</th> 
    <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">4 - 5</th>
    
     <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">5 - 6</th>  
 
 </tr> </table>
 
 <!--
 <div style="margin-top:25px;">
 
 	<a class="button" href="#popup1" onClick="showPopupPage('./edit-vote/{{Session::get('selection')}}')" >Login</a>  
 	
 	<a class="button" href="#popup1" onClick="login()" >Login</a>
 	
 	
 	</div> -->
 	
 	
		</div>
	</div>
</div>
    
             
             
   

     
             
         
    </div>
</div>









<script>
	
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		  var txts ="txt";
		  
		  
		 document.getElementById('level').disabled=true; 
		 document.getElementById('semester').disabled=true;  
		  
		  
		  
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
         url:'delete-multiple-time-table/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray ,"time_table_type":$("#txtChoice").val() },
		 processData:"false",
         success: function(data) {
			
			 
			 
			 alert('Data Deleted');
			 
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='100' >Day</th> <th   width='100' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Code</th><th width='  100'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Room No</th> <th width='100'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Time</th> <th width='100'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Semester</th> <th width='100'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Level</th><th width='100'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Program</th> <th width='100'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Session</th>      </tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].day +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].roomNumber +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].time +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].semester +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].level +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].program  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].academic_session +"</span></td >  </tr>"
				 
					  
				}
				
				$("#tbl").append(option); 
					document.getElementById('paginate').className="hide_question";
			  
			  document.getElementById('subjects').selectedIndex = 0;
			 
			 
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
         url:'delete-time-table/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId ,"time_table_type":$("#txtChoice").val()},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Day</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Code</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Room No</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Semester</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Level</th><th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Program</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Session</th>      </tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].day +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].roomNumber +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].time +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].semester +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].level +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].program  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].academic_session +"</span></td >  </tr>"
				 
					  
				}
				
				$("#tbl").append(option); 
					document.getElementById('paginate').className="hide_question";
					
			   document.getElementById('subjects').selectedIndex = 0;
			  
			  
		 },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 alert('Data Error'); 
	     
	  
    }  
		 
		});
		
	}
	}
		
		
		
		
		
		
		
		
		
		
		
	//function getTimeTable()	
	 $("#studentId").change(function(ev) {
	  ev.preventDefault();
	 
		
		var dtArray=[];
		
		   
		  
		 
		/* 
		var program= document.getElementById('program1').value;
		
		  
		if(program =='Select')
		{
		  alert('Select Lecturer Value is required ');
		  
		  var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Select  Lecturer Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		  return false;
		  
		 } 
		*/
		  
		  program='SCI19111'
		 //program='BUA19112'
		
		 
		
		 dtArray.push({ 
			   studentId:$("#studentId").val()
			  
			});
			
			
			 
	 	
 var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
		 
		
		$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'student-time-table',
         data:{"_token":$('#signup-token').val(),"studentId":$("#studentId").val(),"time_table_type":$("#txtChoice").val()},
		 processData:"false",
         success: function(data) {
			 		
		  
		   
		//   
		 
		 
$("#prg").html("<span style='text-align: center; font-family: Tahoma, Arial, sans-serif;color: #3C8DBC; margin: 80px 0;'> &nbsp;<strong>"+ data.query[0].program  +"</strong> "+ $("#txtChoice").val() +"&nbsp; Time Table &nbsp;&nbsp;("+data.query[0].fName  +" &nbsp;"+ data.query[0].surname  +" )</span> ");
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		var table="<table class='table' width='99%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='160' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'> </th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>8-9 </th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>9-10</th>    <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> 10-11</th>     <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> 11-12</th>     <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> 12-1</th>     <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> 1-2</th>     <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> 2-3</th>     <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> 3-4</th>     <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> 4-5</th>     <th width='100'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> 5-6</th>      </tr>";
    
   $("#tb2").html(table);
   
     
    
	   // alert(data['monday'].length);
	   var option="";  
	   var i=0;
	      option+="<tr>";
		  
		 option +="<td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>Monday</span></td >";
	   
	     
		 
		option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
		
		 $.each(data['query'],function(key,val)
				{
				   
		 if(val.day.trim() =='Monday' && val.time.trim() =='8:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>"+val.cosId+"</strong><br>" + val.roomNumber +" <br>" + val.time +"\n"
			  if(val.time_table_type == 'Exam' && val.day.trim() =='Monday' && val.time.trim() =='8:00 AM' && val.cosId !='')
			  {
				option += val.examDate +"\n"
			  }
		 });	
		 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >" 
		 
		 
			
			 option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='9:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
		 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "	 
			 
		$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='10:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
		   
			   	 
		 option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
			 
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='11:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	  
			  
			 
			 
			 
			  option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='12:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
			 
			 
			 
			 option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='1:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
		 
			 
			 
			 
			 
			 option +=" <td align='left'  valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='2:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			  
			 
			
			
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='3:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="</span></td >"	
			 
			  
			 
			 
			 
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='4:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Monday' && val.time.trim() =='5:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  
			 
			// } 
			 
		
		
		option +=" </tr>";
		
		
		
	/*TUESDAY START HERE */
	
	 option+="<tr>";
	 
	 option +="<td align='left' valign='top' class='table-td'><span  style='margin:8px; display:block;'>Tuesday</span></td >";
	   
	     
		 
		option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
		
		 $.each(data['query'],function(key,val)
				{
				   
		 if(val.day.trim() =='Tuesday' && val.time.trim() =='8:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
		 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >" 
		 
		 
			
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='9:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
		 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "	 
			 
		$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='10:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
		   
			   	 
		 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
			 
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='11:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	  
			  
			 
			 
			 
			  option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='12:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
			 
			 
			 
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='1:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
		 
			 
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='2:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			  
			 
			
			
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='3:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"

			 }	
			   
			 });	
			 
		option +="</span></td >"	
			 
			  
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='4:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +=" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Tuesday' && val.time.trim() =='5:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  
			 
			// } 
			 
		
		
		option +=" </tr>";
		
		/* WEDNESDAY STARTS HERE */
		
		
		 option+="<tr>";
		 
		  option +="<td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>Wednesday</span></td >";
	   
	     
		 
		option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
		
		 $.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='8:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
		 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >" 
		 
		 
			
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='9:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
		 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "	 
			 
		$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='10:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
		   
			   	 
		 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
			 
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='11:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	  
			  
			 
			 
			 
			  option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='12:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
			 
			 
			 
			 option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='1:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
		 
			 
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='2:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			  
			 
			
			
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='3:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			  
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='4:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Wednesday' && val.time.trim() =='5:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  
			 
			// } 
			 
		
		
		option +=" </tr>";
		
		
		
		
		
		
		/* THURSDAY START HERE */
		
		 option+="<tr>";
		  option +="<td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>Thursday</span></td >";
	   
	     
		 
		option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
		
		 $.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='8:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
		 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >" 
		 
		 
			
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='9:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
		 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "	 
			 
		$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='10:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
		   
			   	 
		 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
			 
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='11:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	  
			  
			 
			 
			 
			  option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='12:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
			 
			 
			 
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='1:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
		 
			 
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='2:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			  
			 
			
			
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='3:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="</span></td >"	
			 
			  
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='4:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Thursday' && val.time.trim() =='5:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"

			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  
			 
			// } 
			 
		
		
		option +=" </tr>";
		
		
		
		
		/* FRIDAY START HERE */
		
		
		 option+="<tr>";
		 
		 
		 
		 
		  option +="<td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>Friday</span></td >";
	   
	     
		 
		option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
		
		 $.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='8:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
		 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >" 
		 
		 
			
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='9:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
		 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "	 
			 
		$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='10:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
		   
			   	 
		 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
			 
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='11:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	  
			  
			 
			 
			 
			  option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='12:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='1:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
		 
			 
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='2:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			  
			 
			
			
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='3:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="</span></td >"	
			 
			  
			 
			 
			 
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='4:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Friday' && val.time.trim() =='5:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  
			 
			// } 
			 
		
		
		option +=" </tr>";
		
		
		
		
		/* SATURDAY STARTS HERE */
		
		
		 option+="<tr>";
		 option +="<td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>Saturday</span></td >";
	   
	     
		 
		option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
		
		 $.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='8:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
		 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >" 
		 
		 
			
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='9:00 AM')
		
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			
			  
		 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
		 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "	 
			 
		$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='10:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
		   
			   	 
		 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>"
			 
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='11:00 AM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	  
			  
			 
			 
			 
			  option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='12:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	 
			 
			 
			 
			 
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='1:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
		 
			 
			 
			 
			 
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='2:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			  
			 
			
			
			 option +=" <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='3:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="</span></td >"	
			 
			  
			 
			 
			 
			 option +=" <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='4:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  option +=" <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'> "
			$.each(data['query'],function(key,val)
				{
				   
		 if( val.day.trim() =='Saturday' && val.time.trim() =='5:00 PM')
		  {
		      option +="<strong style='color:#3C8DBC;'>" + val.cosId	 +"</strong><br>" + val.roomNumber +" <br>" + val.time  +"\n"
			 }	
			   
			 });	
			 
		option +=" <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td >"	
			 
			 
			 
			 
			 
			  
			 
			// } 
			 
		
		
		option +=" </tr>";
		
		
		
		
		
		 
				
				$("#tb2").append(option); 
		
		
		
		
		     //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	    
	  
    }   
		 
     });
  
	})
		
 
 	
		
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	 $("#butUnpublish").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
 
 $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-publish-time-table',
         data:{"_token":$('#signup-token').val(),"subjects":$("#subjects").val(),"semester":$("#semester").val(),"level":$("#level").val(),"time_table_type":$("#txtChoice").val(),"txtPublish":$("#txtPublish").val()},
		 processData:"false",
         success: function(data) {
    alert(data);
  },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
  });
	
	
	$("#butPublish").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
 
 
 
 
 $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-publish-time-table',
         data:{"_token":$('#signup-token').val(),"subjects":$("#subjects").val(),"semester":$("#semester").val(),"level":$("#level").val(),"time_table_type":$("#txtChoice").val(),"txtPublish":$("#txtPublish").val()},
		 processData:"false",
         success: function(data) {
   alert(data);
   
   
  },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
  });
	
	
	
	
	
	
	
	
	
	
	
		
		
		
		
		
		
		 
		
$(function() {
 
  
 $("#faculty1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	 
	 
	  //document.getElementById('txtSearch').value='';
	
	   $("#SelectError").html('');
	 
	var ctr =0;
	 
	   
	  if($("#faculty1").val() == "Select")
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
	   
	    document.getElementById('level').disabled=true;
		 document.getElementById('semester').disabled=true;
   
	   
	   
	    document.getElementById('subjects').selectedIndex = 0;
	     document.getElementById('level').selectedIndex = 0;
		 document.getElementById('semester').selectedIndex = 0;
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
 //var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
	  
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-faculty-time-table',
         data:{"_token":$('#signup-token').val(),"clsId":$("#faculty1").val(),"time_table_type":$("#txtChoice").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
	  
	   
	    var sel="Select Department";
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
	   
	   
	   
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='120' >Day</th> <th   width='160' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Code</th><th width='  140'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Room No</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Semester</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Level</th><th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Program</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Session</th>     <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
   
   	   var option="";  
	   var i=0;
	  //for (i=0;i < data.length;i++)
				//{
					
					$.each(data['query'],function(key,val)
				{
				
		 			//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + val.day +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.cosId  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.roomNumber +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.time +" </span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.semester +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +val.level +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.program +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +val.academic_session +"</span></td >  <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-time-table/ " +val.timId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +val.timId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +val.timId +")' value='" +val.timId +" ' id='" +val.queId +"'  </span><input name='"+ txts.concat(val.timId) +"' id='"+ txts.concat(val.timId) +"' type='hidden' value='"+ val.roomNumber +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
				  
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
	 
	 
	 
	  // document.getElementById('txtSearch').value='';
	var ctr =0;
	 $("#SelectError").html('');
	  
	  if($("#terms").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#faculty1").val() == "Select")
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
	   
	    document.getElementById('level').disabled=false; 
		
		
		 
	    document.getElementById('level').selectedIndex = 0;
		 document.getElementById('semester').selectedIndex = 0;
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
		 
//var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-faculty-department-time-table',
         data:{"_token":$('#signup-token').val(),"clsId":$("#faculty1").val(),"terms":$("#terms").val(),"time_table_type":$("#txtChoice").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
	    
	    var sel="Select Program";
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
				  
				 opt+='<option value ="'+data.rstDpt[i].prgId+'">'+data.rstDpt[i].program +'</option>';
				 
				}
				  
				$("#subjects").html(opt);
	   
	   
	  
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='120' >Day</th> <th   width='160' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Code</th><th width='  140'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Room No</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Semester</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Level</th><th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Program</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Session</th>     <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  		$.each(data['query'],function(key,val)
				{
				
		 			//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + val.day +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.cosId  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.roomNumber +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.time +" </span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.semester +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +val.level +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.program +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +val.academic_session +"</span></td >  <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-time-table/ " +val.timId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +val.timId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +val.timId +")' value='" +val.timId +" ' id='" +val.queId +"'  </span><input name='"+ txts.concat(val.timId) +"' id='"+ txts.concat(val.timId) +"' type='hidden' value='"+ val.roomNumber +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
				  
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
			
 
  $("#level").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
 
 
   //document.getElementById('txtSearch').value='';
   
    document.getElementById('semester').disabled=false; 
	 document.getElementById('subjects').selectedIndex = 0;
	   
	    
		 document.getElementById('semester').selectedIndex = 0;
 
  });
 
 //SUBJECT, CLASS AND TERM SESSION START HERE
 
 
 
 $("#subjects").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	
	  //document.getElementById('txtSearch').value='';
	
	   $("#SelectError").html('');
	  
	  if($("#terms").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#faculty").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	 if($("#subjects").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Course Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	
	 if($("#level").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Level Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	if($("#smester").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Semester Value is required !! &nbsp;</span>';
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
         url:'search-faculty-dpt-course-time-table',
         data:{"_token":$('#signup-token').val(),"clsId":$("#faculty1").val(),"terms":$("#terms").val(),"subjects":$("#subjects").val(),"semester":$("#semester").val(),"level":$("#level").val(),"time_table_type":$("#txtChoice").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='120' >Day</th> <th   width='160' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Code</th><th width='  140'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Room No</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Semester</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Level</th><th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Program</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Session</th>     <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	   
	  document.getElementById('txtPublish').value=data[0].status.trim();
	  
	   if(data[0].status.trim() =='Publish')
	   {
		    document.getElementById('spPub').className='hide_question';
		   document.getElementById('spUnpublish').className='show_question';
		}   
		if(data[0].status.trim() =='Unpublish')
		{
			document.getElementById('spPub').className='show_question';
			 document.getElementById('spUnpublish').className='hide_question';
			  
		} 	
		
		
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].day +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].roomNumber +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].time +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].semester +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].level +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].program  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>"+ data[i].academic_session +"</span></td >   <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-time-table/ " +data[i].timId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].timId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].timId +")' value='"+ data[i].timId +"' id='" +data[i].timId +"'  </span><input name='"+ txts.concat(data[i].timId) +"' id='"+ txts.concat(data[i].timId) +"' type='hidden' value='"+ data[i].roomNumber +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"

				 
				 
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
   document.getElementById('faculty1').value='Select';
    document.getElementById('terms').value='Select';
	
	 
	 document.getElementById('faculty1').selectedIndex = 0;
	    document.getElementById('subjects').selectedIndex = 0;
	   document.getElementById('terms').selectedIndex = 0;
	    document.getElementById('level').selectedIndex = 0;
		 document.getElementById('semester').selectedIndex = 0;
	  
	  
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search-courseText',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val(),time_table_type:$("#txtChoice").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Day</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >Course Code</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Room No</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Time</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Semester</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Level</th><th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Program</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Session</th>     <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70  'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	     for (i=0;i < data.length;i++)
				  {
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].day +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].roomNumber +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].time +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].semester +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].level +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].program  +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].academic_session  +"</span></td >   <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='edit-time-table/ " +data[i].timId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy(" +data[i].timId +" )'>Delete</a>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" +data[i].timId +")' value='"+ data[i].timId +"' id='" +data[i].timId +"'  </span><input name='"+ txts.concat(data[i].timId) +"' id='"+ txts.concat(data[i].timId) +"' type='hidden' value='"+ data[i].roomNumber +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
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



   
