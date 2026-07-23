 
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
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Student Transfer</span>
                  
                  <div style="float:right; width:280px; margin-top:-5px; text-align:left;"><label  id="SelectError"> </label>  
                  <input name="butInsert" type="button" value="Go"  id="butSearch" class="but">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="butInsert" value="Transfer" type="button" class="hide_question"  id="butTransfer" ></div>
                  
                  
              

<div id="totSch" style="float:right; margin-top:-5px;margin-right:-12px; width:300px;" >  <input name="txtSearchSt" type="text" id="txtSearchSt" class="searchTextbox" placeholder="Student Id" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Student Id')"  >  </div>


 
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
  <div id="error-page" style="text-align:center; font-weight:bold; color:#F00;"> </div>
<div id="succes" style="text-align:center; margin:20px;"> </div>
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

  
  

 
 </tr> 
 
 
 </table>				 
	 			 
       
         
	    <div id="lengths" style="height:30px;"> </div>
               
             
        </div>
    </div>


<script>
	
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		 
		
		  var txts ="txt";
		  
		  
		 
		 
		
$(function() {
 
  
 $("#faculty1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  
	  $("#succes").html(""); 
	   $("#error-page").html(""); 
	   
	  if($("#faculty1").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
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
	  $("#error-page").html(errors);
		ctr++;
	}  
	  if($("#program1").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
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
	 
	  
	  if($("#faculty").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	  if($("#faculty").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	
	  if(document.getElementById('faculty1')== "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	 if($("#dpt1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	  if($("#program1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Program Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	
	 
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	    
	 
				 
				 document.getElementById("butTransfer").className="show_question";
				  document.getElementById("butTransfer").className="but";
				   
				  
				 
			 
	 
 });
			
 
 
 
 
 
 
 
  $("#butTransfer").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	
	   if(jQuery.trim($("#faculty1").val()) == "Select")
	  //if($("#faculty1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
		
		
	}  
	
	 
	
	    if(jQuery.trim($("#dpt1").val()) == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 
	 
	  if(jQuery.trim($("#dpt1").val()) == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Department Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 
	
	  if(jQuery.trim($("#program1").val()) == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Program Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	if(jQuery.trim($("#program1").val()) == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Program Value is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}  
	
	 
	if($("#txtSearchSt").val() == "")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Student Id  Value is required !! &nbsp;</span>';
		$("#error-page").html(errors);
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
         url:'search_student_fal_dpt_prg_edit',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearchSt").val(),"faculty":$("#faculty1").val(),"department":$("#dpt1").val(),"program":$("#program1").val()},
		 processData:"false",
         success: function(data) {
  
   
	 	 var saved= "<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; "+ data +" &nbsp;</span>";
		
				 $("#succes").html(saved); 
				
				  
				
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
			
 
 
 
 
 
 
 
 //SEARCH STUDENT SECTION START HERE
 
 
  
 
 
 
 
 
 
  $("#butSearch").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	
	   
	var ctr =0;
	
    document.getElementById('faculty1').value='Select';
    document.getElementById('dpt1').value='Select';
	document.getElementById('program1').value='Select';
	
	
	 document.getElementById('faculty1').selectedIndex = 0;
	 document.getElementById('dpt1').selectedIndex = 0;
	
	 document.getElementById('program1').selectedIndex = 0;
	
	
	document.getElementById("butTransfer").className="hide_question";
	
	 $("#succes").html(""); 
	  $("#error-page").html(""); 
      
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search_StId_transfer',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearchSt").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
	   
   var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Student Id</th><th  width='300' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>First Name</th><th  width='300' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Middle Name</th><th width='300' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Surname</th><th width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Address</th><th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Phone No</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th> <th   width='300' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th>  </tr>";
    
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
					
					
					
option +="<tr><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].stdId +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].midName +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].surname +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].address +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].mobileNo +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].email +"</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td >  ";
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



 
