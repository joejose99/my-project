 
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
                
                
                   <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Program Course</span>
                  
                  <div style="float:right; width:290px; margin-top:-5px; text-align:right;">  <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='insert-Program-Course'" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="delete" value="Multiple Delete" type="button" class="delete"  id="multiDel"></div>
                  
                  
             <div id="totSch" style="float:right; margin-top:-5px; width:56%; text-align:center;">  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search Course Code" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Course Code')"  ></div>

 


 
</div>
              
              <div style="text-align:center; margin-top:10px;">
              
              
              &nbsp;&nbsp;
             <div style=" margin-left:10px; float:left;">
             
             
              <select class="mnu" name="faculty1" id="faculty1"> 
             
              
               
                               
                				<option  value="Select"> Select Faculty</option>
                                @foreach($faculty as $st)
   <option value="{!! trim($st->falId )!!}"> {!! $st->faculty !!} </option>
   @endforeach 
                               
                               
                               </select>
             &nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp; <select class="mnu" name="dpt1" id="dpt1"> 
             
              
               
                               
                				<option  value="Select" > Select Department</option>
                                 
                               
                               
                               </select>
                                 
      
      
      &nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp; <select class="mnu" name="cls1" id="cls1"> 
             
              
               
                               
                				<option  value="Select"> Select Level</option>
                                @foreach($level as $st)
   <option value="{!! trim($st->levId )!!}"> {!! $st->level !!} </option>
   @endforeach 
                               
                               
                               </select>
                               
                               
                               
                                &nbsp;&nbsp;&nbsp;&nbsp; 
               &nbsp;&nbsp; <select class="mnu" name="term1" id="term1"> 
             
              
               
                               
                				<option  value="Select"> Select Semester</option>
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
       
            
   <div id="success-page" style="text-align:center; font-weight:bold;"> </div>
 

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl"  >
<tr > 
	
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Code</th> 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Title </th> 
 
 <th width='120'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Unit</th> 
  
 
  <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Course Mode</th> 

  
 <th width='120'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Registered Date</th> 

  
 

<th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

  <th width='50'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;"></th> 

 
 </tr> 
 
@foreach($query as $rst)
                 
	 
   

 


 

 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 <a   href="#popup1"  onclick="getCourseDetails({{ $rst->prcId }})">
  {!!$rst->cosId!!}  
  </a>
</span>

 <select name="lst" id="lst" hidden=""  > </select>

 <input name="txt{!! $rst->prcId !!}" id="txt{!! $rst->prcId !!}" type="hidden" value="{!!$rst->course!!}" /></td >
<input name="txtDetails{!! $rst->prcId !!}" id="txtDetails{!! $rst->prcId !!}" type="hidden" value="{!!$rst->courseDetails!!}" />
<input name="txtCosId{!! $rst->prcId !!}" id="txtCosId{!! $rst->prcId !!}" type="hidden" value="{!!$rst->cosId!!}" />
  </td > 
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 {!!$rst->course!!}  
</span>

 
  </td > 
  
  <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
  {!!$rst->courseUnit!!}  
</span>

 
  </td > 

   
 
 
  
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
 

<select  id="lstcode{!!$rst->prcId!!}" class='mnu' onchange="getPrgCourse({!!$rst->prcId!!})" ><option  value='{!!$rst->courseMode!!}'> {!!$rst->courseMode!!} </option> <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> 
</span>
 
</td>   
  
  
  
 
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->created_at!!}
</span>
 
</td>   

  
   <!--
   <a href ='editCourse/{{ $rst->prcId }}' class='update'>Edit</a>
   -->

 
  
    <td align='left' bgcolor='#980905'  valign ='top' ><span  style="margin:8px; display:block;"> <a href ='#' class="del"onclick="destroy({{ $rst->prcId }})">Delete</a> </span>
    </td >

  
<td align='center' bgcolor='#980905'  valign ='top' class="table-td" ><span  style="margin:8px; display:block;">
      <input name="input" type="checkbox" value=" {!! $rst->prcId !!}" onclick="get_Values('{!! $rst->prcId !!}')" />
    </span></td >
 
</tr>
   
	
						
					  
					  
				 
				@endforeach
                
                 <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"> 
 </table>				 
	 			 
       <div style="text-align:center;" id="paginate"> {{ $query->links() }}  </div>    
         
	    <div id="lengths" style="height:30px;"> </div>
               
         
         
         
         
         <div id="popup1" class="overlay">
	<div class="popup">
		<h2 id="prg"> </h2> 
         
		<a class="close" href="#">&times;</a>
        
		<div class="content" id="contents" >
			<!-- Thank to pop me out of that button, but now i'm done so you can close this window. -->


    
  
 
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
		
		 var lstcode ='lstcode';
		
		  var txts ="txt";
		  
		  var txtDetails='txtDetails';
			var	txtCosId='txtCosId';
		  
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
         url:'delete_multiple-program-course/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course </th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>  <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					txtDetails
					txtCosId
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].prcId +")'>" + data[i].cosId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(data[i].prcId) +"' class='mnu' onChange='getPrgCourse("+data[i].prcId+")'><option  value='" + data[i].courseMode +"'> " + data[i].courseMode +" </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prcId +")' value='" +data[i].prcId +" ' id='" +data[i].prcId +"'  </span><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'><input name='"+ txtDetails.concat(data[i].prcId) +"' id='"+ txtDetails.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].courseDetails+"'><input name='"+ txtCosId.concat(data[i].prcId) +"' id='"+ txtCosId.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].cosId	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
							 
					  
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
         url:'delete-program-course/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course </th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>  <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    var ctr=0
	  var cnt =data.length;
	  
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].prcId +")'>" + data[i].cosId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(data[i].prcId) +"' class='mnu' onChange='getPrgCourse("+data[i].prcId+")'><option  value='" + data[i].courseMode +"'> " + data[i].courseMode +" </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prcId +")' value='" +data[i].prcId +" ' id='" +data[i].prcId +"'  </span><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'><input name='"+ txtDetails.concat(data[i].prcId) +"' id='"+ txtDetails.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].courseDetails+"'><input name='"+ txtCosId.concat(data[i].prcId) +"' id='"+ txtCosId.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].cosId	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
					
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
  
 
		
		
		
		
		
	function getPrgCourse(quesId)	
	{
		
		var dtArray=[];
		
		
		 var lstcode ='lstcode';
		    txt='txt';
		var schs= txt.concat(quesId);
		
		 var lstcodes=lstcode.concat(quesId);
		
		
		
		var schss= document.getElementById(schs).value;
		
		 
		  
		 var mod = document.getElementById(lstcodes).value;
		 
		 
		 
		 var edit=confirm("Are you sure you want to Edit this item ?"+'\n' +schss);
		//var delMultiple=confirm('Are you sure you want to delete these ?'+'\n' +question);
		 
		 
		  
	if(edit)	
	{ 
		 
		
		 dtArray.push({ 
			   courseMode:mod,
			   prcId:quesId
			  
			});
			
			 
	 	
 var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray); 
		
		
		$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'/edit-Program-Course/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 		
		  
		  
		 
 
		
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course </th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>  <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
   $("#tb1").html(table);
   
     
    
	    
	   var option="";  
	   var i=0;
	     for (i=0;i < data.length;i++)
				  {
	     
		 		 
				
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].prcId +")'>" + data[i].cosId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(data[i].prcId) +"' class='mnu' onChange='getPrgCourse("+data[i].prcId+")'><option  value='" + data[i].courseMode +"'> " + data[i].courseMode +" </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prcId +")' value='" +data[i].prcId +" ' id='" +data[i].prcId +"'  </span><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'><input name='"+ txtDetails.concat(data[i].prcId) +"' id='"+ txtDetails.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].courseDetails+"'><input name='"+ txtCosId.concat(data[i].prcId) +"' id='"+ txtCosId.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].cosId	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
				 
				 
				}
				
				$("#tb1").append(option); 
		var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; '+ data +' &nbsp;</span>';
		
		$("#success-page").html(saved); 
		
		     //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	    
	  
    }   
		 
     });
  
	}}
			
		
		
		
		
		
		
		
		
		
		
	function getCourseDetails(quesId)	
	{
		
		  var cosId ='txtCosId'; 
		 var txtDetails ='txtDetails';
		    
		var txtDetailss= txtDetails.concat(quesId);
		
		var cosIds= cosId.concat(quesId);
		
		 
		  var details = document.getElementById(txtDetailss).value;
		  
		   var courseId = document.getElementById(cosIds).value;
		 
		  $("#contents").html('<h3>'+ courseId +'  Course Description</h3>'); 
		 $("#contents").append(details); 
		
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
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty  !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	 document.getElementById('cls1').selectedIndex = 0;
	    document.getElementById('term1').selectedIndex = 0;
	
	  if(ctr != 0 )
	  {
		  exit;
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
         url:'search-program-course-fal',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
    var sel="Select Department";
			 var option='';
			 option ='<option value="Select">'+sel+'</option>';
			
			
				for (var i=0;i < data.rstDpt.length;i++)
				{
				 
					
				 option+='<option value ="'+ data.rstDpt[i].dptId +'">'+data.rstDpt[i].department +'</option>';
				}
				
				
				 
				 $("#dpt1").html(option);
	  
	   
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title</th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>  <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   
	    
		 
	  var option="";  
	   
	    // for(i=0; i< data.length;i++)
		
				 // {
					  
				 $.each(data['query'],function(key,val)
				{
			 
			
			  
					
option +="<tr> <td align='left'  valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ val.prcId +")'>" + val.cosId +"</a> </span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.course +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ val.courseUnit   +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(val.prcId) +"' class='mnu' onChange='getPrgCourse("+val.prcId+")'><option  value='" + val.courseMode +"'> " + val.courseMode +" </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ val.prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +val.prcId +")' value='" +val.prcId +" ' id='" +val.prcId +"'  </span><input name='"+ txts.concat(val.prcId) +"' id='"+ txts.concat(val.prcId) +"' type='hidden' value='"+ val.course	 +"'><input name='"+ txtDetails.concat(val.prcId) +"' id='"+ txtDetails.concat(val.prcId) +"' type='hidden' value='"+ val.courseDetails+"'><input name='"+ txtCosId.concat(val.prcId) +"' id='"+ txtCosId.concat(val.prcId) +"' type='hidden' value='"+ val.cosId	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
						 
			 
			 
			  
				 
					});	
				
				 $("#tbl").append(option); 
					document.getElementById('paginate').className="hide_question";
					
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
         url:'search-program-course-fal-dpt',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"dptId":$("#dpt1").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title</th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>  <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].prcId +")'>" + data[i].cosId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(data[i].prcId) +"' class='mnu' onChange='getPrgCourse("+data[i].prcId+")'><option  value='" + data[i].courseMode +"'> " + data[i].courseMode +" </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prcId +")' value='" +data[i].prcId +" ' id='" +data[i].prcId +"'  </span><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'><input name='"+ txtDetails.concat(data[i].prcId) +"' id='"+ txtDetails.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].courseDetails+"'><input name='"+ txtCosId.concat(data[i].prcId) +"' id='"+ txtCosId.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].cosId	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
				 
				 
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
         url:'search-program-course-level',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"dptId":$("#dpt1").val(),"levId":$("#cls1").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title </th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>  <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].prcId +")'>" + data[i].cosId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(data[i].prcId) +"' class='mnu' onChange='getPrgCourse("+data[i].prcId+")'><option  value='" + data[i].courseMode +"'> " + data[i].courseMode +" </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prcId +")' value='" +data[i].prcId +" ' id='" +data[i].prcId +"'  </span><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'><input name='"+ txtDetails.concat(data[i].prcId) +"' id='"+ txtDetails.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].courseDetails+"'><input name='"+ txtCosId.concat(data[i].prcId) +"' id='"+ txtCosId.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].cosId	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
				 
				 
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
         url:'search-program-course-semester',
         data:{"_token":$('#signup-token').val(),"falId":$("#faculty1").val(),"dptId":$("#dpt1").val(),"levId":$("#cls1").val(),"semId":$("#term1").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title</th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>  <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].prcId +")'>" + data[i].cosId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(data[i].prcId) +"' class='mnu' onChange='getPrgCourse("+data[i].prcId+")'><option  value='" + data[i].courseMode +"'> " + data[i].courseMode +" </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prcId +")' value='" +data[i].prcId +" ' id='" +data[i].prcId +"'  </span><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'><input name='"+ txtDetails.concat(data[i].prcId) +"' id='"+ txtDetails.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].courseDetails+"'><input name='"+ txtCosId.concat(data[i].prcId) +"' id='"+ txtCosId.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].cosId	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
				 
				 
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
			
 
 
 
 /*
 $("<link/>",{
 rel:"stylesheet",
 type:"text/css",
 href:"../exam/css/popup.css",
 }).appendTo("head");
 
 */
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
         url:'search-program-course-text',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='150' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Course Code</th><th  width='150' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Course Title</th><th width='120' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Course Unit</th>  <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Course Mode</th> <th   width='120' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th> <th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
			 	
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'> <a   href='#popup1' onclick='getCourseDetails("+ data[i].prcId +")'>" + data[i].cosId +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].course +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   "+ data[i].courseUnit   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><select  id='" + lstcode.concat(data[i].prcId) +"' class='mnu' onChange='getPrgCourse("+data[i].prcId+")'><option  value='" + data[i].courseMode +"'> " + data[i].courseMode +" </option>  <option  value='Core Course'> Core Course</option><option  value='Ancillary Course'> Ancillary Course</option> <option  value='G.S. Course'> G.S. Course</option> </select> </span></td >  <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td > <td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prcId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prcId +")' value='" +data[i].prcId +" ' id='" +data[i].prcId +"'  </span><input name='"+ txts.concat(data[i].prcId) +"' id='"+ txts.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].course	 +"'><input name='"+ txtDetails.concat(data[i].prcId) +"' id='"+ txtDetails.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].courseDetails+"'><input name='"+ txtCosId.concat(data[i].prcId) +"' id='"+ txtCosId.concat(data[i].prcId) +"' type='hidden' value='"+ data[i].cosId	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
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



 
