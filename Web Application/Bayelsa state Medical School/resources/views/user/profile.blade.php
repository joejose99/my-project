 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop


@section('content')
<section class="content" >
  <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />  


                @yield('content')
                
<!--
<div class="container">
    <div class="row"> 
        <div class="col-md-8 col-md-offset-2">-->
            <div class="panel panel-default">
                <div class="panel-heading" >
                
                
                Dashboard &nbsp;  <span ><img src="../image/arrow.gif" width="5" height="10" /> </span>   &nbsp;Login Profile   &nbsp;&nbsp;@if(Session::has('flash_message'))
					<span class="result" style="color:#CF1B16;">{{Session::get('flash_message')}}</span>
						@endif  
                 
                
  
	
              <div style="float:right;">  
               
               
               
              <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
              </div>
              
              <div id="success" style="width:auto; float:right;"> </div>
              
              </div>
				 

                <div class="panel-body"  >
                
                
   

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center" id="tbl"  >
<tr > 
	

 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Name</th> 

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Email</th> 
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Role</th> 

 
  
     
     <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Status</th> 

 
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
 
</tr> 
 
 
                 

<tr>
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 
 <span  style="margin:8px; display:block;">
{{ Auth::user()->name }}
</span>
  </td > 

 <td align='left' bgcolor=''  valign ='top' >
  <span  style="margin:8px; display:block;">
{{ Auth::user()->email }}
</span>


<select name="lst" id="lst" hidden="" >
<option value=""> Select</option>
</select>
 <input name="txt{{ Auth::user()->id }}" id="txt{{ Auth::user()->id }}" type="hidden" value="{{ Auth::user()->name }}">
 
 
  </td > 


<td align='left' bgcolor=''  valign ='top' class="table-td" >
 
 <span  style="margin:8px; display:block;">
{{ Auth::user()->role }}
</span>
  </td >
 
     
    <td align='left' bgcolor=''  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
  {{ Auth::user()->status }}    
 </span>
     </td>
  <td align='center' bgcolor='#1D4B6D'  valign ='top' >
     <span  style="margin:8px; display:block; color: #ACACAC; ">
<a class="del" href ="editProfile/{{ Auth::user()->id }}" onclick="return confirm('Are you sure you want to Edit this item?');">Edit</a> 
</span>
 
</td > 
 
 </tr>

	
						
					  
					  
				 
				 
 </table>				 
	 			<!-- 
                </div>
                
            </div>
        </div> -->
    </div>
</div>
 



          
            <!-- /.content -->


@section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style.css" rel="stylesheet" type="text/css" />
   
@stop

@section('js')
 <script src="{{ asset('../js/app.js') }}"></script>
 
 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
@stop





<script>
 
	
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		  var txts ="txt";
		 $(function() {

  
 $("#butEnable").click(function(ev) {
	  ev.preventDefault();
 
		  
		 
		  
			var selectValues="";
			var dtArray=[];
			var question="";
			var txt="txt";
			var txts="";
			var txtStatus="";
			$("#lst option[value='']").remove();
			 
			$("#lst option").each(function()
			{
				 txt="txt";
				  txts="txtStatus";
				 selectValues=$(this).text();
				 
				// alert(selectValues);
				
				txt= '#'+txt.concat(selectValues);
				 txts = '#'+txts.concat(selectValues);  
                 // alert(txts);
				  
				question += $(txt).val() +'\n';
				  
				// alert(question);
				 
			txtStatus =$(txts).val();
			
			 //alert('Status: ' +txtStatus);
			
			dtArray.push({
			 quesId:selectValues });
			txt="";
				 selectValues="";
			});
			
			 
			if(question=="")
			{
				alert('Select Check Box to Enable/Disable');
				exit;
			}
			//alert('Do you want to delete this? '+'\n' +question );
			
			if(txtStatus =='Enable')
			{
				var delMultiple=confirm('Are you sure you want to Disable  these ?  '+'\n' +question);
			}
			
			if(txtStatus !='Enable')
			{
				var delMultiple=confirm('Are you sure you want to Enable  these ?  '+'\n' +question);
			}
			
			
		 
	if(delMultiple)
	{	
			 
			  
			var quesId=1;
			
			var dataArray= JSON.stringify(dtArray);
			$.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'insertUsr',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray,"status":txtStatus},
		 processData:"false",
         success: function(data) {
			 
			 //alert('Data Enabled/Disabled');
	  var option="";  
	   var i=0;
 
 txtStatus='txtStatus';
 txt='txt';
			 
 $("#success").html('<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successfully Saved &nbsp;</span>');
			 
			 var table="<table width='98%' bgcolor='#FFFFFF ' cellpadding='2' cellspacing='2'  align='center' id='+ tbl +'<tr > <th bgcolor='#ffffff ' align='left' valign='top' style=' text-align:center;' width='150' >Name</th> <th   width='150' bgcolor='#ffffff ' align='left' valign='top' style='  text-align:center;'>Email</th><th width='  150'bgcolor='#ffffff' align='left' valign='top' style='text-align:center;' >Role</th>    <th width='150'bgcolor='#ffffff ' align='center' valign='top'   scope='col'style='text-align:center;  '>Status </th>  <th  width='70  'bgcolor=' #ffffff ' align='center'  valign='  top  ' style='  text-align:center;  '><strong> </strong> </th></tr>";
   
   $("#tbl").html(table);
   
   
  	 for(i=0;i<data.length;i++)
	{
		  	  					
option +="<tr><td align='left'     valign='top' class='table-td' ><span  style='margin:8px; 	display:block;'>" + data[i].name +"</span></td ><td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block;'>" + data[i].email +"</span></td ><td align='left'     valign='top' class='table-td'><span  style='margin:8px; display:block; '>"+ data[i].role +"</span></td > <td align='center' bgcolor= #1D4B6D   valign='top' class='table-td'> <span  style='margin:8px; display:block; color: #ACACAC;'> <label for='" +  data[i].id  +"'>" + data[i].status +" </label>&nbsp;&nbsp;&nbsp;<input name='' type='checkbox'  onClick='get_Values(" +data[i].id +")' value='" +data[i].id +" ' id='" +data[i].id +"'  </span><input name='"+ txtStatus.concat(data[i].id) +"' id='"+ txtStatus.concat(data[i].id) +"' type='hidden' value='"+ data[i].status +"'><input name='"+ txt.concat(data[i].id) +"' id='"+ txt.concat(data[i].id) +"' type='hidden' value='"+ data[i].name +"'><select name='lst' id='lst' hidden=''  > <option value=''> Select</option></select>  </span></td ><td align='left' bgcolor= #980905   valign='top'class='table-td'><span  style='margin:8px; display:block;'> <a href ='#'  class= 'del'  onClick='destroy("+ data[i].id +" )'>Delete</a>  </span></td >";
		
		 
			
}
				
				$("#tbl").append(option); 
			  
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
				
				 
				  document.getElementById("lst").options.add(opt);
				  
				   
				   //lst.options.add(opt)
				   
				   // alert('im in');
				 
			 //for(var i=0;i < lst.options.length; i++)
			  for(var i=0;i <  document.getElementById("lst").options.length; i++)
			 {
				   
				   
				 //if(lst.options[i].value != quesId)
				  if(document.getElementById('lst').options[i].value != quesId)
				 {
				   //alert('inside For loop Add ' + lst.options[i].value);
				 
			      	//lst.options.add(opt);
					document.getElementById("lst").options.add(opt);
			        opt.text=quesId;
			      	opt.value=quesId;
				 }
			 }
			
			
			}
			
			
			if(document.getElementById(txt).checked ==false)
			{
				 
				 
			 //for(var i=0;i < lst.options.length; i++)
			 for(var i=0;i <  document.getElementById("lst").options.length; i++)
			 {
				 // alert('inside For loop Remove ' + lst.options[i].value)
				 
				 //if(lst.options[i].value == quesId)
				 if(document.getElementById('lst').options[i].value != quesId)
				 {
				  
					lst.remove(i);
					break;
				 }
			 }
			
			
			}
			
			
			
		}
</script>




<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
@stop