 
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
                
                
                 <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Student</span>
                  
                  <div style="float:right; width:290px; margin-top:-5px; text-align:right;"><label  id="SelectError"> </label>  <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insertStudent'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel"></div>
                  
                  
             <div id="totSch" style="float:right; margin-top:-5px; width:24%; text-align:center;" >  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search First Name" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search First Name')"  >  </div>

<div id="totSch" style="float:right; margin-top:-5px;margin-right:40px;width:30%; text-align:center;" >  <input name="txtSearchSt" type="text" id="txtSearchSt" class="searchTextbox" placeholder="Search Student Id" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Student Id')"  >  </div>


 
</div>
              
              <div style="text-align:center; margin-top:10px;">
              
              
              &nbsp;&nbsp;
             <div style=" margin-left:10px; float:left;">
             &nbsp;&nbsp;&nbsp;&nbsp; 
              <label>Faculty: </label>&nbsp;&nbsp; <select class="selectAdmin" name="faculty1" id="faculty1"> 
             
              
               
                               
                				<option  value=""> Select</option>
                                @foreach($faculty as $st)
   <option value="{!! trim($st->falId )!!}"> {!! $st->faculty !!} </option>
   @endforeach 
                               
                               
                               </select>
                                 
   
    &nbsp;&nbsp;<label>Department: </label>&nbsp;&nbsp; <select name="dpt1" id="dpt1" >
   <option  value="Select">Select </option>
   
   
  
   </select> 
   
   
   
  &nbsp;&nbsp;<label>Program: </label>&nbsp;&nbsp; <select name="program1" id="program1" >
   <option  value="Select">Select </option>
   
   
  
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
	
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Student Id</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">First name</th> 

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Middle Name</th> 
<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Surname</th> 

<th width='180'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Address</th> 

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Phone No</th> 



<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Email</th> 

<!--

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Birth Date</th>

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin.</th>

 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin Address.</th>

 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin Phone.</th>




 
 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >L.G.A</th> 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >State</th> 
 
 -->
 
 <th width='180'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Registered Date</th> 

 
 <th width='180'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

 <th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

<th width='100'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

  

 
 </tr> 
 
@foreach($query as $rst)
                 
	 
    <tr   >
    
    <!--
    
     <td align='left' bgcolor='#ffffff'  valign ='top' >
  <span  style="margin:8px; display:block;">
{!!$rst->lcrId!!}
</span>
  
  </td > -->
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
   
  <a href='#popup1' onclick='getStudentDetails({{$rst->studentId }})'>
{!!$rst->stdId!!}
</a>
</span>

 
  </td > 
  
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->fName!!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->midName!!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->surname!!}
</span>

  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"> 
<select name="lst" id="lst" hidden=""  > </select>

 <input name="txt{!! $rst->studentId !!}" id="txt{!! $rst->studentId !!}" type="hidden" value="{!! $rst->fName !!}" /></td >
      
 </td > 

<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->address!!} 
</span>
 </td>
 
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->mobileNo!!} 
</span>
 </td>


 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->email!!} 
</span>
 </td>
 
 <!--
 
 <td align='left' bgcolor='#ffffff'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->dateOfBirth!!}
</span>
 </td>
 
 
 
 
 <td align='left' bgcolor='#ffffff'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->nextOfKin!!}
</span>
 </td>
 
 
 <td align='left' bgcolor='#ffffff'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->nextOfKinAddress!!}
</span>
 </td>
 
 
 <td align='left' bgcolor='#ffffff'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->nextOfKinMobile!!}
</span>
 </td>
 
 
 
 
 
   
    
    
 
  
  <td align='left' bgcolor='#ffffff'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->LGA !!}
</span>

 
  </td > 

<td align='left' bgcolor='#ffffff'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->state !!}
</span>

 
  </td > 

 -->
 
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->created_at!!}
</span>
 
</td>   

 
 
   

 
  <td align='left' bgcolor='#1D4B6D'  valign ='top' ><span  style="margin:8px; display:block;"> <a href ='editStudent/{{ $rst->stdId }}' class='update'>Edit</a></span></td >
    <td align='left' bgcolor='#980905'  valign ='top' ><span  style="margin:8px; display:block;"> <a href ='#' class="del"onclick="destroy({{ $rst->studentId }})">Delete</a> </span>
    </td >

  
<td align='center' bgcolor='#980905'  valign ='top' class="table-td" ><span  style="margin:8px; display:block;">
      <input name="input" type="checkbox" value=" {!! $rst->studentId !!}" onclick="get_Values('{!! $rst->studentId !!}')" />
    </span></td >
 
</tr>
   
	
						
					  
					  
				 
				@endforeach
 </table>				 
	 			 
       <div style="text-align:center;" id="paginate"> {{ $query->links() }}  </div>    
         
	    <div id="lengths" style="height:30px;"> </div>
               
             
             
          
          <div id="popup1" class="overlay">
	<div class="popup">
		<h2 id="prg"> </h2> 
         
		<a class="close" href="#">&times;</a>
        
        <div id="details"> </div>
		<div class="content" id="contents" style="max-height:600px;overflow-y:scroll; " >
			<!-- Thank to pop me out of that button, but now i'm done so you can close this window. -->


    
    <table width="98%" bgcolor="#FFFFFF"   border=" "  height="150" cellpadding="2" cellspacing="2"  align="center"  id="tbl2"  >
<tr > 
	
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Student Id</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">First name</th> 

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Middle Name</th> 
<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Surname</th> 

<th width='180'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Address</th> 

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Phone No</th> 



<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Email</th> 

<!--

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Birth Date</th>

<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin.</th>

 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin Address.</th>

 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin Phone.</th>




 
 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >L.G.A</th> 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >State</th> 
 
 -->
 
 <th width='180'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Registered Date</th> 

 
  
  

 
 </tr> 
 </table>
  
 
 <div style="height:20px;"> </div>
 
 
   <table width="98%" bgcolor="#FFFFFF" height="150"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tb2"  >
<tr > 
	
   
 
 
<th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin.</th>

 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin Address.</th>

 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Next of Kin Phone.</th>




 
 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >L.G.A</th> 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >State</th> 
 
  
   

 
  
  

 
 </tr> 
 </table>
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
         url:'delete_multiple_student/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th>   <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].stdId +")'>" + data[i].stdId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editStudent/"+data[i].stdId +"' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].studentId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].studentId +")' value='" +data[i].studentId +" ' id='" +data[i].studentId +"'  </span><input name='"+ txts.concat(data[i].studentId) +"' id='"+ txts.concat(data[i].studentId) +"' type='hidden' value='"+ data[i].fName +"'><select name='lst' id='lst' hidden=''  ></select></td >";
							 
					  
				}
				
				$("#tbl").append(option); 
					//document.getElementById('paginate').className="hide_question";
			  
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
         url:'delete_student/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
   var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    var ctr=0
	  var cnt =data.length;
	  
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].stdId +")'>" + data[i].stdId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editStudent/"+data[i].stdId +"' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].studentId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].studentId +")' value='" +data[i].studentId +" ' id='" +data[i].studentId +"'  </span><input name='"+ txts.concat(data[i].studentId) +"' id='"+ txts.concat(data[i].studentId) +"' type='hidden' value='"+ data[i].fName +"'><select name='lst' id='lst' hidden=''  ></select></td >";
					
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
  
 
		 
	 
	function getStudentDetails(quesId)	
	{
		 
		 
		 $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'studentDetails',
         data:{"_token":$('#signup-token').val(),"stdId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			  
			
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	    
	   $("#prg").html("<span style='text-align: center; font-family: Tahoma, Arial, sans-serif;color: #3C8DBC; margin: 80px 0;'>"+ data[0].program  +"</span> ");
	   
   var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl2 +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th>   </tr>";
   
   $("#tbl2").html(table);
   
	   var option="";  
	   var i=0;
	   var dt="";
	    
	 // $.each(data['query'],function(key,val)
	  // for (i=0;i < data.length;i++)
				//{
			 
				
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].stdId +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].created_at +"</span></td ></tr> ";
						 
			 
			 //}
			  
				  
				//});	
				
				  
				$("#tbl2").append(option); 
				
				
				
				
				
				
				 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tb2 +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>State</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>LGA</th> <th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Next Of Kins</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Next of Kins Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Next Of Kins Phone No</th>  </tr>";
   
   $("#tb2").html(table);
   
	   var option="";  
	   var i=0;
	   var dt="";
	    
	 // $.each(data['query'],function(key,val)
	  // for (i=0;i < data.length;i++)
				//{
			 
				
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].state +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].LGA +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].nextOfKin +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].nextOfKinAddress +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[0].nextOfKinMobile +"</span></td ></tr> ";
						 
			 
			 //}
			  
				  
				//});	
				
				  
				$("#tb2").append(option); 
				
				
				
				
				
				
				
					document.getElementById('paginate').className="hide_question";
					
					
					
					 
		 $("#contents").append(details); 
		
					
					 var ctr=data.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }
	        //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	   
	  
    }   
		 
     });
  		
		 
		 
		 
		 
		 
		
		     //$("#lengths").html(ctr); 
         
  
	}
				
		
		
		
		
		
		
		
		
		
$(function() {
 
  
 $("#faculty1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty1").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	   document.getElementById("txtSearch").value=""; 
	   document.getElementById('txtSearchSt').value='';
	   
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
 //var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search_student_fal',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty1").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			 var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				 
				for (var i=0;i < data.rstDpt.length;i++)
				{
				 
					
				 option+='<option value ="'+ data.rstDpt[i].dptId +'">'+data.rstDpt[i].department +'</option>';
				}
				
				
				 
				$("#dpt1").html(option);
			
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
   var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   var dt="";
	    
	  $.each(data['query'],function(key,val)
				{
			 
				
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ val.stdId +")'>" + val.stdId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editStudent/"+ val.stdId +"' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ val.studentId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" + val.studentId +")' value='" + val.studentId +" ' id='" + val.studentId +"'  </span><input name='"+ txts.concat(val.studentId) +"' id='"+ txts.concat(val.studentId) +"' type='hidden' value='"+ val.fName +"'><select name='lst' id='lst' hidden=''  ></select></td >";
						 
			 
			 
			  
				  
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
			

 
 
 
 
 
 
 
 
 $("#dpt1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#program1").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
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
         url:'search_student_fal_dpt',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty1").val(),"department":$("#dpt1").val()},
		 processData:"false",
         success: function(data) {
  
  
  
   var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				 
				for (var i=0;i < data.rstDpt.length;i++)
				{
				 
					
				 option+='<option value ="'+ data.rstDpt[i].prgId +'">'+data.rstDpt[i].program +'</option>';
				}
				
				
				 
				$("#program1").html(option);
  
  
	  
	   
   var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
   $("#tbl").html(table);
   
   var dt="";
	   var option="";  
	   var i=0;
	   $.each(data['query'],function(key,val)
				{
			 
				
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ val.stdId +")'>" + val.stdId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editStudent/"+ val.stdId +"' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ val.studentId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" + val.studentId +")' value='" + val.studentId +" ' id='" + val.studentId +"'  </span><input name='"+ txts.concat(val.studentId) +"' id='"+ txts.concat(val.studentId) +"' type='hidden' value='"+ val.fName +"'><select name='lst' id='lst' hidden=''  ></select></td >";
						 
			 
			 
			  
				  
				});	
				
		
				
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
			
 
 
 
 
 
 
 
 
 
 
 
  $("#program1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#program1").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
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
         url:'search_student_fal_dpt_prg',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty1").val(),"department":$("#dpt1").val(),"program":$("#program1").val()},
		 processData:"false",
         success: function(data) {
  
   
	   
   var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
   $("#tbl").html(table);
   
   var dt="";
	   var option="";  
	   var i=0;
	    $.each(data['query'],function(key,val)
				{
			 
				
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ val.stdId +")'>" + val.stdId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editStudent/"+ val.stdId +"' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ val.studentId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" + val.studentId +")' value='" + val.studentId +" ' id='" + val.studentId +"'  </span><input name='"+ txts.concat(val.studentId) +"' id='"+ txts.concat(val.studentId) +"' type='hidden' value='"+ val.fName +"'><select name='lst' id='lst' hidden=''  ></select></td >";
						 
			 
			 
			  
				  
				});	
				
		
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
	document.getElementById('txtSearchSt').value='';
    document.getElementById('faculty1').value='Select';
    document.getElementById('dpt1').value='Select';
	document.getElementById('program1').value='Select';
      
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search_student',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
	   
   var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].stdId +")'>" + data[i].stdId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editStudent/"+data[i].stdId +"' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].studentId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].studentId +")' value='" +data[i].studentId +" ' id='" +data[i].studentId +"'  </span><input name='"+ txts.concat(data[i].studentId) +"' id='"+ txts.concat(data[i].studentId) +"' type='hidden' value='"+ data[i].fName +"'><select name='lst' id='lst' hidden=''  ></select></td >";
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
 
 
 
 
 
 
 
  $("#txtSearchSt").keyup(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	
	  
	var ctr =0;
	
    document.getElementById('faculty1').value='Select';
    document.getElementById('dpt1').value='Select';
	document.getElementById('program1').value='Select';
	
	document.getElementById('txtSearch').value='';
      
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search_studentId',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearchSt").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
	   
   var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th>  <th width='70'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='70'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='70'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].stdId +")'>" + data[i].stdId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editStudent/"+data[i].stdId +"' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].studentId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].studentId +")' value='" +data[i].studentId +" ' id='" +data[i].studentId +"'  </span><input name='"+ txts.concat(data[i].studentId) +"' id='"+ txts.concat(data[i].studentId) +"' type='hidden' value='"+ data[i].fName +"'><select name='lst' id='lst' hidden=''  ></select></td >";
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



 
