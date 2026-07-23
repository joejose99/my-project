 
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
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Channel's Report</span>
                  
                  <div style="float:right; width:290px; margin-top:-5px; text-align:right;"><label  id="SelectError"> </label>  <input name="butInsert" type="button" value="Export Data"  class="but"> </div>
                  
                  
             <div id="totSch" style="float:right; margin-top:-5px;width:55%; text-align:center;" >  <input name="txtsearch" type="text" id="txtSearch"  disabled="disabled" class="searchTextbox" placeholder="Search Name" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Department')"  >  </div>


 
</div>
              
              <div style="text-align:center; margin-top:10px;">
              
              
              &nbsp;&nbsp;
             <div style=" margin-left:10px; float:left;" class="mainbody">
             
             
              <select class="mnu" name="faculty1" id="faculty1"> 
             
              
               
                               
                				<option  value="Select"> Select State</option>
                                
   <option value="" </option>
   
                               
                               
                               </select>
             &nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp; <select class="select" name="dpt1" id="dpt1"> 
             
              
               
                               
                				<option  value="Select" > Select LGA</option>
                                 
                               
                               
                               </select>
                                 
      
      
      &nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp; <select class="mnu" name="cls1" id="cls1"> 
             
              
               
                               
                				<option  value="Select"> Select Channel</option>
                                
   <option value="" </option>
  
                               
                               
                               </select>
                               
                               
                               
                                &nbsp;&nbsp;&nbsp;&nbsp; 
               &nbsp;&nbsp; <select class="mnu" name="term1" id="term1"> 
             
              
               
                               
                				<option  value="Select"> Select Store Category</option>
                                 
                               
                               
                               </select>
                               
                           &nbsp;&nbsp;&nbsp;&nbsp;    <label  id="SelectError"> </label>
    </div></div>
                

               
                
     <div class="panel-body" >
           <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
           <div style="  text-align:center;" > 
     <span style="margin-left:7px; color:#4E6A9E; font-weight:bold;">
                         
             </span>
       </div>          
  

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"  id="tbl" class="mainbody" >
<tr > 
	
 
 <th width='120'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Name</th> 
 
 <th width='90'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Location</th>  


<th width='90'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Open Stock</th> 

<th width='90'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Dettol Soap</th>  
 
 <th width='90'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Dettol ASL</th> 

  

 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Harpic</th> 
 
 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Mortein</th>
 
 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Jik</th>  
 
 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Airwick</th> 
 
 <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Veet</th> 
  <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Durex Rack on till</th> 
   <th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Price</th> 
 

<th width='60'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Promotion Compliance</th> 

  <th width='50'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Date</th> 

 
 </tr> 
 
@foreach($query as $rst)
                 
	 
    <tr   >
     
  
  <td align='left'    valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
  <a   href="#popup1"  onclick="getCourseDetails({{ $rst->chl_Id }})">
{!!$rst->fname!!}
</a>
</span>

 
  </td > 
<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
   
{!!$rst->cityName!!}&nbsp;/ &nbsp; {!!$rst->location!!} 

 
</span>

 
  </td > 


<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!! $rst->openStock!!}
</span>

  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"> 
<select name="lst" id="lst" hidden=""  > </select>

 <input name="txt{!! $rst->chl_Id !!}" id="txt{!! $rst->chl_Id !!}" type="hidden" value="{!! $rst->location !!}" /></td >
      
      <input name="txtDetails{!! $rst->chl_Id !!}" id="txtDetails{!! $rst->chl_Id !!}" type="hidden" value="{!!$rst->premise!!}" />
<input name="txtCosId{!! $rst->chl_Id !!}" id="txtCosId{!! $rst->chl_Id !!}" type="hidden" value="{!!$rst->fname!!}" />

<input name="txtImage{!! $rst->chl_Id !!}" id="txtImage{!! $rst->chl_Id !!}" type="hidden" value="{!!$rst->tag_image!!}" />

 </td > 


<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->dettolSoap!!} %
</span>
 
</td> 


 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->dettolASL!!} %
</span>
 
</td> 
 
 
 
  
 
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->harpic!!} %
</span>
 
</td> 



<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->mortein!!} %
</span>
 
</td>   


<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->jik!!} %
</span>
 
</td>   
<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->airwick!!} %
</span>
 
</td>   
<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->veet!!} %
</span>
 
</td>   
<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->durexRack!!}
</span>
 
</td>   
<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->price!!}
</span>
 
</td>   


<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->promotion!!}
</span>
 
</td>   
  
<td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->created_at!!}
</span>
 
</td>   
  
   

 
   
 
</tr>
   
	
						
					  
					  
				 
				@endforeach
 </table>				 
	 			 
       <div style="text-align:center;" id="paginate"> {{ $query->links() }}  </div>    
         
	    <div id="lengths" style="height:30px;"> </div>
               
            
            
            
            
            
            
         <div id="popup1" class="overlay">
	<div class="popup">
		<h2 id="prg"> </h2> 
         
		<a class="close" href="#">&times;</a>
        
		<div class="content" id="contents" style="max-height:400px; max-width:950px; overflow-y:scroll; " >
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
		
         url:'delete_multiple_program/quesId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			 
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='250' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Program</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Program Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Program Leader</th><th   width='90' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    
	   
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
					
if(data[i].fName != 'NA')
					{ 
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ data[i].prgId +")'>" + data[i].program +"</a></span></td > <td align='left'      valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName   +"  "+ data[i].surname   +"</span></td > <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +data[i].prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prgId +")' value='" +data[i].prgId +" ' id='" +data[i].prgId +"'</span><input name='"+ txts.concat(data[i].prgId) +"' id='"+ txts.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program +"'><input name='"+ txtDetails.concat(data[i].prgId) +"' id='"+ txtDetails.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].details+"'><input name='"+ txtCosId.concat(data[i].prgId) +"' id='"+ txtCosId.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program	 +"'><select name='lst' id='lst' hidden=''  ></select> </td ></tr>";
							 //console.log('Searching Data'); 
		 }
		 
		else
					{ 
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   <a   href='#popup1' onclick='getCourseDetails("+ data[i].prgId +")'>" + data[i].program +"</a> </span></td > <td align='left'   valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +' &nbsp;&nbsp;&nbsp;&nbsp;'   +"</span></td > <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +data[i].prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prgId +")' value='" +data[i].prgId +" ' id='" +data[i].prgId +"'  </span><input name='"+ txts.concat(data[i].prgId) +"' id='"+ txts.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program +"'> <input name='"+ txtDetails.concat(data[i].prgId) +"' id='"+ txtDetails.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].details+"'><input name='"+ txtCosId.concat(data[i].prgId) +"' id='"+ txtCosId.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
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
         url:'delete_program/quesId',
         data:{"_token":$('#signup-token').val(),"quesId":quesId},
		 processData:"false",
         success: function(data) {
			 
			 alert('Data Deleted');
			   
			   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='250' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Program</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Program Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Program Leader</th><th   width='90' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   var option="";  
	   var i=0;
	   
	    var ctr=0
	  var cnt =data.length;
	  
	   for (i=0;i < data.length;i++)
				{
		  
			 	 
					
					
if(data[i].fName != 'NA')
					{ 
					
					
option +="<tr> <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ data[i].prgId +")'>" + data[i].program +"</a></span></td > <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName   +"  "+ data[i].surname   +"</span></td > <td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +data[i].prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prgId +")' value='" +data[i].prgId +" ' id='" +data[i].prgId +"'</span><input name='"+ txts.concat(data[i].prgId) +"' id='"+ txts.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program +"'><input name='"+ txtDetails.concat(data[i].prgId) +"' id='"+ txtDetails.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].details+"'><input name='"+ txtCosId.concat(data[i].prgId) +"' id='"+ txtCosId.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program	 +"'><select name='lst' id='lst' hidden=''  ></select> </td ></tr>";
							 //console.log('Searching Data'); 
		 }
		 
		else
					{ 
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   <a   href='#popup1' onclick='getCourseDetails("+ data[i].prgId +")'>" + data[i].program +"</a> </span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +' &nbsp;&nbsp;&nbsp;&nbsp;'   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +data[i].prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prgId +")' value='" +data[i].prgId +" ' id='" +data[i].prgId +"'  </span><input name='"+ txts.concat(data[i].prgId) +"' id='"+ txts.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program +"'> <input name='"+ txtDetails.concat(data[i].prgId) +"' id='"+ txtDetails.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].details+"'><input name='"+ txtCosId.concat(data[i].prgId) +"' id='"+ txtCosId.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
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
  
 
 
 
 
 
 
 function getCourseDetails(quesId)	
	{
		
		  var cosId ='txtCosId'; 
		  var txts='txt';
		 var txtDetails ='txtDetails';
		    var txtImg ='txtImage';
		var txtDetailss= txtDetails.concat(quesId);
		
		var txtss= txts.concat(quesId);
		var txtImage=txtImg.concat(quesId);
		
		var cosIds= cosId.concat(quesId);
		
		var txtLocation =document.getElementById(txtss).value;
		 
		  var details = document.getElementById(txtDetailss).value;
		 
		   var images = document.getElementById(txtImage).value;
		   
		    
		   var images_img ="<img id='id1' src='"+images+"'>"
		
		   var courseId = document.getElementById(cosIds).value;
		 
		  $("#contents").html("<span style='text-align: left; font-family: Tahoma, Arial, sans-serif;color: #3C8DBC; margin: 80px 0;'><h4> Business Picture Taking By: &nbsp;"+ courseId +" Location: &nbsp;"+ txtLocation +" </h4><br> </span>"); 
		 $("#contents").append(images_img); 
		
		     //$("#lengths").html(ctr); 
         
  
	}
 
 
 

 
 
 
		 
		
$(function() {
 
  
 $("#faculty1").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	  document.getElementById('txtSearch').value='';
	 
	var ctr =0;
	 
	  
	  if($("#faculty1").val() == "Select")
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
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty1").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
			
			
			 var sel="Select";
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
					option+='<option value ="'+val.dptId +'">'+ val.department+'</option>';
					 
				});
				
				 
				$("#dpt1").html(option);
	  
			
			
			
  
  // console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	   
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='250' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Program</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Program Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Program Leader</th><th   width='90' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
	   
	    
		 
	  var option="";  
	   
	    // for(i=0; i< data.length;i++)
		$.each(data['query'],function(key,val)
				{
				  
				
			 
if(val.fName != 'NA')
					{ 
			 
					


option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ val.prgId +")'>" + val.program +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.fName   +"  "+ val.surname   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +val.prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ val.prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +val.prgId +")' value='" +val.prgId +" ' id='" +val.prgId +"'</span><input name='"+ txts.concat(val.prgId) +"' id='"+ txts.concat(val.prgId) +"' type='hidden' value='"+ val.program +"'><input name='"+ txtDetails.concat(val.prgId) +"' id='"+ txtDetails.concat(val.prgId) +"' type='hidden' value='"+ val.details+"'><input name='"+ txtCosId.concat(val.prgId) +"' id='"+ txtCosId.concat(val.prgId) +"' type='hidden' value='"+ val.program	 +"'><select name='lst' id='lst' hidden=''  ></select> </td ></tr>";

						 
		}	 
			 
	else
	{ 
			 
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ val.prgId +")'>" + val.program +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.fName   +"  "+ val.surname   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + val.created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +val.prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ val.prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +val.prgId +")' value='" +val.prgId +" ' id='" +val.prgId +"'</span><input name='"+ txts.concat(val.prgId) +"' id='"+ txts.concat(val.prgId) +"' type='hidden' value='"+ val.program +"'><input name='"+ txtDetails.concat(val.prgId) +"' id='"+ txtDetails.concat(val.prgId) +"' type='hidden' value='"+ val.details+"'><input name='"+ txtCosId.concat(val.prgId) +"' id='"+ txtCosId.concat(val.prgId) +"' type='hidden' value='"+ val.program	 +"'><select name='lst' id='lst' hidden=''  ></select> </td ></tr>";
						 
		}	 
			 		  
				  
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
	 
	  
	  
	  if($("#faculty1").val() == "Select")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value, is required !! &nbsp;</span>';
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
         url:'search_faculty_dpt',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty1").val(),"department":$("#dpt1").val()},
		 processData:"false",
         success: function(data) {
  
  // console.log('success');
    //console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	  
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='250' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Program</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Program Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Program Leader</th><th   width='90' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
					
					if(data[i].fName != 'NA')
					{ 
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ data[i].prgId +")'>" + data[i].program +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +  '&nbsp;&nbsp;&nbsp;&nbsp;'   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +data[i].prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prgId +")' value='" +data[i].prgId +" ' id='" +data[i].prgId +"'</span><input name='"+ txts.concat(data[i].prgId) +"' id='"+ txts.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program +"'><input name='"+ txtDetails.concat(data[i].prgId) +"' id='"+ txtDetails.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].details+"'><input name='"+ txtCosId.concat(data[i].prgId) +"' id='"+ txtCosId.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program	 +"'><select name='lst' id='lst' hidden=''  ></select> </td ></tr>";
							 //console.log('Searching Data'); 
		 }
		 
		else
					{ 
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   <a   href='#popup1' onclick='getCourseDetails("+ data[i].prgId +")'>" + data[i].program +"</a> </span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +' &nbsp;&nbsp;&nbsp;&nbsp;'   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +data[i].prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prgId +")' value='" +data[i].prgId +" ' id='" +data[i].prgId +"'  </span><input name='"+ txts.concat(data[i].prgId) +"' id='"+ txts.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program +"'> <input name='"+ txtDetails.concat(data[i].prgId) +"' id='"+ txtDetails.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].details+"'><input name='"+ txtCosId.concat(data[i].prgId) +"' id='"+ txtCosId.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
							 //console.log('Searching Data'); 
		 }
		 
				 
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
	
    document.getElementById('dpt1').value='Select';
   // document.getElementById('faculty1').value='Select';
      
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search_department_prog',
         data:{"_token":$('#signup-token').val(),"search":$("#txtSearch").val()},
		 processData:"false",
         success: function(data) {
  
   //console.log('success');
   // console.log(data[0].question);
	//console.log(data[0].optionA);
	  //console.log(data.success);
	   //$("#tablesuccess").append('&nbsp;Successfuly Executed');
	    
	   
var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr ><th  width='250' bgcolor='#ffffff' align='left' valign='top' style='text-align:center;'>Program</th><th  width='' bgcolor='#ffffff ' align='left' valign='top' style='text-align:center;'>Program Details</th><th width='150' bgcolor='#ffffff' align='left' valign='top' style='  text-align:center;'>Program Leader</th><th   width='90' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Registered Date</th> <th width='60'bgcolor='#ffffff ' align='left' valign='top'   scope='col'style='text-align:center;  '> </th><th  width='60'bgcolor=' #ffffff ' align='left'  valign='top'style='  text-align:center;  '><strong> </strong> </th><th  width='50'bgcolor=' #ffffff ' align='left'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
    
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
					
					if(data[i].fName != 'NA')
					{ 
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'><a   href='#popup1' onclick='getCourseDetails("+ data[i].prgId +")'>" + data[i].program +"</a></span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].fName   +"  "+ data[i].surname   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +data[i].prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prgId +")' value='" +data[i].prgId +" ' id='" +data[i].prgId +"'</span><input name='"+ txts.concat(data[i].prgId) +"' id='"+ txts.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program +"'><input name='"+ txtDetails.concat(data[i].prgId) +"' id='"+ txtDetails.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].details+"'><input name='"+ txtCosId.concat(data[i].prgId) +"' id='"+ txtCosId.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program	 +"'><select name='lst' id='lst' hidden=''  ></select> </td ></tr>";
							 //console.log('Searching Data'); 
		 }
		 
		else
					{ 
					
					
option +="<tr> <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>   <a   href='#popup1' onclick='getCourseDetails("+ data[i].prgId +")'>" + data[i].program +"</a> </span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].details.substring(0,50) +"..</span></td ><td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" +' &nbsp;&nbsp;&nbsp;&nbsp;'   +"</span></td > <td align='left'    valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].created_at +"</span></td ><td align='left' bgcolor= #1D4B6D   valign='top' class='table-td'><span  style='margin:8px; display:block;'><a href ='editProgram/ " +data[i].prgId +" ' class='update'>Edit</a> </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].prgId +" )'>Delete</a>  </span></td ><td align='center' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <input name='' type='checkbox'  onClick='get_Values(" +data[i].prgId +")' value='" +data[i].prgId +" ' id='" +data[i].prgId +"'  </span><input name='"+ txts.concat(data[i].prgId) +"' id='"+ txts.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program +"'> <input name='"+ txtDetails.concat(data[i].prgId) +"' id='"+ txtDetails.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].details+"'><input name='"+ txtCosId.concat(data[i].prgId) +"' id='"+ txtCosId.concat(data[i].prgId) +"' type='hidden' value='"+ data[i].program	 +"'><select name='lst' id='lst' hidden=''  ></select></td ></tr>";
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
    <link href="../exam/css/popup.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
 
@stop

 @stop



 
