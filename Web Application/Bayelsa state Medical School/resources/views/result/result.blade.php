@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  <span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1> 

 <meta name="csrf-token" content="{{ csrf_token() }}">
 
@stop

 
 
@section('content')
         
         
         <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>     
 
    
        
            <div class="panel panel-default">
            <!--
              <form class="form-horizontal" role="form" method="POST" action="{{route('insertPDFExport') }}">  -->
                <div class="panel-heading">
                
             
             <!--
             {{-- {{ csrf_field() }} --}} -->
             
             <div style="float:right; width:140px; margin-top:5px; text-align:right; max"> 
            <input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel"> </div>
               &nbsp;&nbsp;&nbsp;&nbsp; 
          
              <div style="float:right; width:155px; margin-top:5px; text-align:right;">   <input name="butInsert" type="submit" value="Migrate Result"   id="exp" class="but hide_question"  > </div>
          
            
            
            
              
              
               
<div style="float:left; text-align:center; width:70%;">

<span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Online Exam Result</span> 
 &nbsp;&nbsp; 
 
 <label>Academic Session: </label>&nbsp;&nbsp; 
               <select     id="session" name="session" style="margin-top:5px;" class="selectAdmin"> 
                 
                				 
                               @foreach($session as $rst)
   <option value="{!!$rst->acdId !!}"> {!!$rst->academic_session !!}</option>
   @endforeach
   
   </select>
 

               
                &nbsp;&nbsp;&nbsp;
               
               
               <label  >Faculty: </label>&nbsp;&nbsp; 
               <select     id="faculty1" name="faculty1" style="margin-top:5px;"> 
                 
                				<option  value="Select"> Select</option>
                               @foreach($faculty as $rst)
   <option value="{!!$rst->falId !!}"> {!!$rst->faculty !!}</option>
   @endforeach
   
   </select>
   
 </div> 
               
     
                  
                  
                   <div style="clear:both;" > </div>  
                  </div>       
                    
                   
                   
           
                    

              <div style="  padding-right:5px;  padding-top:10px; padding-bottom:10px; text-align:center;" class="result_bg">
              
              <input name="txtYear"  id="txtYear" type="hidden" value="" />
              
                
              
                               
                               
                               
                                 
   
    <label>Department: </label>&nbsp;&nbsp; <select class="selectAdmin" name="schools" id="schools">
   <option  value="Select">Select </option>
   
    
  
   </select>  
   
   &nbsp;&nbsp;
    <label>Level: </label>&nbsp;&nbsp; <select class="selectAdmin" name="clss" id="clss"> 
              
              <option  value="Select"  >Select </option >
    @foreach($class as $rst)
   <option value="{!!$rst->levId !!}"> {!!$rst->level !!}</option>
   @endforeach</select>
   
    &nbsp;&nbsp;<label>Semester: </label>&nbsp;&nbsp; <select  class="selectAdmin" id="terms" name="terms"> 
   
    
   <option  value="Select">Select </option>
@foreach($term as $rst)
   <option value="{!!$rst->semId !!}"> {!! $rst->semester !!}</option>
   @endforeach</select>&nbsp;&nbsp;
   
   <label>Course: </label>&nbsp;&nbsp;<select  class="selectAdmin" id="subjects" name="subjects">
   
   <option  value="Select">Select </option>
    @foreach($subjects as $rst)
   <option value="{!!$rst->cosId !!}"> {!! $rst->course !!}</option>
   @endforeach</select> 
   
   <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">  
   
   
  
   </div>
             
     <!-- </form> -->        
              
              
   
   
   
   
                

               
                
      <div class="panel-body" >
               
               
               
               
                   
   <script language="javascript">
    document.getElementById('schools').disabled=false;
    document.getElementById('faculty1').disabled=false; 
    
	
   document.getElementById('terms').disabled="true";
    document.getElementById('subjects').disabled="true";
	 document.getElementById('clss').disabled="true";
	 
	 
	 
   </script>
   
   
    

<div style="text-align:center; margin-top:10px;"> </div>

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl" class="mainbody"  >
<tr > 
	

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Student Id</th> 

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >First Name</th> 
   
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Surname</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Academic Session</th>  
  <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Course</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Total Mark Score</th> 

<th  width='150' bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong>Date</strong> </th>
<th  width='60' bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>

<!-- {{-- @if (trim($role['role'])-- }} == 'Super Admin')   
 <th  width='60' bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th> 
 {{-- @endif --}}-->
</tr> 
 
@foreach($query as $rst)
                 
					 

<tr>
 

 <td align='left' bgcolor=''  valign ='top' width="" >
  <span  style="margin:8px; display:block;">
{!!$rst->stdId!!}
</span>
<select name="lst" id="lst" hidden=""   ></select>
 <input name="txt{!!$rst->rstId!!}" id="txt{!!$rst->rstId!!}" type="hidden" value="{!!$rst->fName!!}">
 
  </td > 
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->fName!!}
</span>

 
  </td > 

 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->surname!!}
</span>

 
  </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->academic_session!!}
</span>

 
  </td > 

  
 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->cosId!!} &nbsp;- &nbsp;{!!$rst->course!!}
</span>

 
    </td > 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">

{!!$rst->mark!!}

</span>

 
  </td >  

 
 
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">

{!!$rst->created_at!!}

</span>

 
  </td >  

<!--  
{{-- @if (trim($role['role']) --}} =='Super Admin') -->
 <td align='left' bgcolor='#980905'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 <input name="" type="checkbox" value=" {!! $rst->rstId !!}" onClick="get_Values('{!! $rst->rstId !!}')">

</span>

 
  </td > 
  {{--@endif --}}

 
</tr>
   
	
						
					  
					  
				 
				@endforeach
 </table>				 
	 			 
       <div style="text-align:center;" id="paginate"> {{ $query->links() }}  </div>    
         
	    <div id="lengths" style="height:30px;"> </div>
               
             
         
    </div>
</div>
 

 
 
<script>
	 //var role ='<?//= $role['role'] ?>';
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		var fullYear="";
		  var txts ="txt";
		  var nowDate = new Date();
		
		var exam='Exam';
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
				  
				// alert(question);
				 
			
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
			 
			
			var delMultiple=confirm('Are you sure you want to delete these ?  '+'\n' +question);
		 
		 
	if(delMultiple)
	{	
			 
			var quesId=1;
			var exam="Exam";
			var dataArray= JSON.stringify(dtArray);
			$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'delete-multiple-result/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray,"resultType":exam},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
			
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Academic Session</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Course</th> <th width='160'bgcolor='' align=' left  ' valign='top' style='text-align:center;' >Total Mark Score</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Date</th>   <th  width='50' bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th>  </tr>";
			
			
			 
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   

 	   
	    for(i=0;i<data.length;i++)
				{
		 
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].stdId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].academic_session +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +" &nbsp;- &nbsp;" + data[i].course +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mark +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" + data[i].rstId +")' value='" +data[i].rstId +" ' id='" +data[i].rstId +"'  </span><input name='"+ txts.concat(data[i].rstId) +"' id='"+ txts.concat(data[i].rstId) +"' type='hidden' value='"+ data[i].fName +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
			
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
		
	/*	function get_Values(quesId)
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
		
		
		
		
		
		
		
		
		
		
		
		
	
		
		 
		
$(function() {
	
	
	
 
  //LGA START HERE 
 
   
  $("#faculty1").change(function(ev) {
	  ev.preventDefault();
	  
	  
	  
	  document.getElementById('subjects').selectedIndex = 0;
	    document.getElementById('clss').selectedIndex = 0;
	   document.getElementById('terms').selectedIndex = 0;
	  
	    document.getElementById('exp').className="hide_question";
  //document.getElementById('txtYear').value=fullYear;
 
	   
     $.ajax({  
	    type:"POST",
         url:"faculty-Result",
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"session":$("#session").val(),"resultType":exam},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
 
			 var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				 
				for (var i=0;i < data.dpt.length;i++)
				{
					// console.log(data.rstSch[i].schId); 
					 
					option+='<option value ="'+ data.dpt[i].dptId +'">'+data.dpt[i].department
					+'</option>';
					
				 
				}
				
				$("#schools").html(option);
			
            document.getElementById('terms').value="Select";
   document.getElementById('subjects').value="Select";
		// document.getElementById('faculty1').value="Select";
		
		 /*
			if($.trim(role)  =='Super Admin')
			{ */
			
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Academic Session</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Course</th> <th width='160'bgcolor='' align=' left  ' valign='top' style='text-align:center;' >Total Mark Score</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Date</th>   <th  width='50' bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th>  </tr>";
			
			
			/*
			
			}
			if($.trim(role) != 'Super Admin')
			{
				
			
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >School</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Class</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Term</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Subject</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Total Mark Score</th>  </tr>";
			}
			 
			 */
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	 
	 /*  
	   if($.trim(role) == 'Super Admin')
			{ */
				
	  // for (i=0;i < data.query.length;i++)
	  $.each(data['query'],function(key,val)
				{
			 
				 
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + val.stdId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.fName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.academic_session +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.cosId +" &nbsp;- &nbsp;" + val.course +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.mark +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td >  <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" + val.rstId +")' value='" +val.rstId +" ' id='" +val.rstId +"'  </span><input name='"+ txts.concat(val.rstId) +"' id='"+ txts.concat(val.rstId) +"' type='hidden' value='"+ val.fName +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
				 
				//}
			})
			
			
		/*	
		if($.trim(role) != 'Super Admin')
			{
	   for (i=0;i < data.query.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data.query[i].studentId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data.query[i].fname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data.query[i].midname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data.query[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data.query[i].school +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data.query[i].class +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data.query[i].term +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data.query[i].subject +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data.query[i].totalMark +"</span></td ></tr> "
				 
				 
				}
			}	
			*/
				
				$("#tbl").append(option); 
					document.getElementById('paginate').className="hide_question";
					
					 var ctr=data.query.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }
			
			
			
			
			
         },
		  error: function(data,  errorThrown) {
        //this is going to happen when you send something different from a 200 OK HTTP
       
	   var errors
	  errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  $("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
  
  
  
  
  
  
  
  //SCHOOL START HERE
  
  
  
  $("#schools").change(function(ev) {
	  ev.preventDefault();
	  
	  document.getElementById('exp').className="hide_question";
	  
     $.ajax({  
	    type:"POST",
         url:"faculty-department-result",
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"dptId":$("#schools").val(),"session":$("#session").val(),"resultType":exam},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
  	 
		/*	if($.trim(role) == 'Super Admin')
			{	 */
			
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Academic Session</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Course</th> <th width='160'bgcolor='' align=' left  ' valign='top' style='text-align:center;' >Total Mark Score</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Date</th>   <th  width='50' bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th>  </tr>";
			 
			
		/*	
			}
			
			
			
			
			if($.trim(role) != 'Super Admin')
			{	 
			
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >School</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Class</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Term</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Subject</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Total Mark Score</th> </tr>";
			 
			}
			*/
			 
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  
	  /* 
	   if($.trim(role) == 'Super Admin')
			{	 
	   for (i=0;i < data.length;i++)
				{
					*/
				
				// $.each(data['query'],function(key,val)
				 
				 
				 for(i=0;i < data.length;i++)
				{
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].stdId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].academic_session +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +" &nbsp;- &nbsp;" + data[i].course +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mark +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" + data[i].rstId +")' value='" +data[i].rstId +" ' id='" +data[i].rstId +"'  </span><input name='"+ txts.concat(data[i].rstId) +"' id='"+ txts.concat(data[i].rstId) +"' type='hidden' value='"+ data[i].fName +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
					 
				 
				}
			 
				
				
			
			/*	
			  if($.trim(role) != 'Super Admin')
			{	 
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].studentId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].school +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].class +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].term +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].subject +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].totalMark +"</span></td >  </td ></tr>"
					 
				 
				}
			}	
				
				*/
				
				
				$("#tbl").append(option); 
					document.getElementById('paginate').className="hide_question";
					
					 document.getElementById('clss').disabled=false;
					 var ctr=data.query.length;
					 if(ctr==0)
					 {
					    alert('Data not Found');
		              }
			
			
			
			
			
         },
		  error: function(data,  errorThrown) {
        //this is going to happen when you send something different from a 200 OK HTTP
       
	   var errors
	  errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  $("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
  
  
  //CLASS START HERE
  
 $("#clss").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  document.getElementById('exp').className="hide_question";
	  if($("#clss").val() == "Selcet")
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
         url:'search-level-result',
         data:{"_token":$('#signup-token').val(),"levId":$("#clss").val(),"falId":$("#faculty1").val(),"dptId":$("#schools").val(),"session":$("#session").val(),"resultType":exam},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   // if($.trim(role) == 'Super Admin')
			//{	 
	   
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Academic Session</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Course</th> <th width='160'bgcolor='' align=' left  ' valign='top' style='text-align:center;' >Total Mark Score</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Date</th>   <th  width='50' bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th>  </tr>";
 
			/*}
			
			
			 if($.trim(role) != 'Super Admin')
			{	 
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >School</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Class</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Term</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Subject</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Total Mark Score</th>  </tr>";
 
			}
			*/
       
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  /* 
	   if($.trim(role) == 'Super Admin')
			{	 
	   */
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].stdId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].academic_session +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +" &nbsp;- &nbsp;" + data[i].course +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mark +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" + data[i].rstId +")' value='" +data[i].rstId +" ' id='" +data[i].rstId +"'  </span><input name='"+ txts.concat(data[i].rstId) +"' id='"+ txts.concat(data[i].rstId) +"' type='hidden' value='"+ data[i].fName +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
				 
				}
				/*}
				
				
		if($.trim(role) != 'Super Admin')
			{	 
	   
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].studentId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].school +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].class +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].term +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].subject +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].totalMark +"</span></td > </tr> "
				 
				}
				}		
				
				*/
				
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
	 document.getElementById('exp').className="hide_question";
	  
	  if($("#terms").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Term Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#clss").val() == "Selcet")
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
         url:'search-level-semester-result',
         data:{"_token":$('#signup-token').val(),"levId":$("#clss").val(),"falId":$("#faculty1").val(),"semId":$("#terms").val(),"dptId":$("#schools").val(),"session":$("#session").val(),"resultType":exam},
		 processData:"false",
         success: function(data) {
   
   
   
   
   
   
    var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				 
				for (var i=0;i < data.course.length;i++)
				{
					// console.log(data.rstSch[i].schId); 
					 
					option+='<option value ="'+ data.course[i].cosId +'">'+data.course[i].course
					+'</option>';
					
				 
				}
				
				$("#subjects").html(option);
   
	   
	/* if($.trim(role) == 'Super Admin')
			{  
			*/
	   
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Academic Session</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Course</th> <th width='160'bgcolor='' align=' left  ' valign='top' style='text-align:center;' >Total Mark Score</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Date</th>   <th  width='50' bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th>  </tr>";
			
			/*}
 
  if($.trim(role) != 'Super Admin')
			{  
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >School</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Class</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Term</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Subject</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Total Mark Score</th>  </tr>";
			}
 
       */
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   /*
	   if($.trim(role) == 'Super Admin')
			{ 
	   */
	   
	  /* for (i=0;i < data.length;i++)
				{ */
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
 $.each(data['query'],function(key,val)
				{
			 
				 
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + val.stdId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.fName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.academic_session +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.cosId +" &nbsp;- &nbsp;" + val.course +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.mark +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td >  <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" + val.rstId +")' value='" +val.rstId +" ' id='" +val.rstId +"'  </span><input name='"+ txts.concat(val.rstId) +"' id='"+ txts.concat(val.rstId) +"' type='hidden' value='"+ val.fName +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"
								 
				})
				
				/*}
				
				
				
				
			if($.trim(role) != 'Super Admin')
			{ 
	   
	   
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].studentId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].school +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].class +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].term +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].subject +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].totalMark +"</span></td > </tr> "
				 
				}
				}
				
				*/
				
				$("#tbl").append(option); 
			    var ctr=data.length;
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
	
	   
	  
	  if($("#terms").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Semester Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	  if($("#clss").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select level Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	 if($("#schools").val() == "Select")
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
         url:'search-level-semester-course-result',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"levId":$("#clss").val(),"semId":$("#terms").val(),"cosId":$("#subjects").val(),"dptId":$("#schools").val(),"session":$("#session").val(),"resultType":exam},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  /* if($.trim(role) == 'Super Admin')
			{ */
	   
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Academic Session</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Course</th> <th width='160'bgcolor='' align=' left  ' valign='top' style='text-align:center;' >Total Mark Score</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Date</th>   <th  width='50' bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th>  </tr>";
 
    /*
			}
			if($.trim(role) != 'Super Admin')
			{ 
	   
 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Student Id</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;  ' >First Name</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Middle Name</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Surname</th> <th width='150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >School</th> <th width='150'bgcolor=' #ffffff' align='  left' valign='top' style='text-align:center;' >Class</th> <th width='150'bgcolor=' #ffffff ' align=' left  ' valign='top' style='text-align:center;' >Term</th> <th width='150'bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Subject</th> <th width='150'bgcolor=' #ffffff ' align='left' valign='top' style='text-align:center;' >Total Mark Score</th>  </tr>";
 
    
			}
   
   */
      
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	  /* 
	   if($.trim(role) == 'Super Admin')
			{  */
	   
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].stdId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].academic_session +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].cosId +" &nbsp;- &nbsp;" + data[i].course +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mark +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox' onClick='get_Values(" + data[i].rstId +")' value='" +data[i].rstId +" ' id='" +data[i].rstId +"'  </span><input name='"+ txts.concat(data[i].rstId) +"' id='"+ txts.concat(data[i].rstId) +"' type='hidden' value='"+ data[i].fName +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>"

				}
				
			/*}
			
				if($.trim(role) != 'Super Admin')
			{ 
	   
	   for (i=0;i < data.length;i++)
				{
				
					//option +='<span>'+data[i].question +':'+data[i].optionA +'</span>';
					
option +="<tr><td align='left'    valign='top' class='table-td' ><span  style='margin:8px; display:block;'>" + data[i].studentId +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].school +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].class +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].term +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].subject +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].totalMark +"</span></td ></tr> "

				} 
				 
				}*/
				
				$("#tbl").append(option); 
				
				document.getElementById('exp').className="show_question";
				
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
			
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 //SUBJECT, CLASS AND TERM SESSION START HERE
 
 
 
 $("#exp").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	
	 
	  
	  if($("#terms").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Semester Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
		
	}  
	  if($("#clss").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Level Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	
	 if($("#schools").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Department Value is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	  if(ctr != 0 )
	  {
		  exit;
	  }
	  
	    
	  
   document.getElementById('subjects').disabled=false;
	    
	  
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'migrate-result',
         data:{"_token":$('#signup-token').val(),"levId":$("#clss").val(),"falId":$("#faculty1").val(),"semId":$("#terms").val(),"dptId":$("#schools").val(),"session":$("#session").val(),"cosId":$("#subjects").val(),"resultType":exam},
		 processData:"false",
         success: function(data) {
  
    alert(data);
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
 
 
 
  
 
 
 
 
});





     </script>
     
@section('css')
 
 
   
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
    
      <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
     
    
     

@stop

 

 @stop





   
