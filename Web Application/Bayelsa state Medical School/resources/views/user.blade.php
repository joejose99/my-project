@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop


@section('content')
 
 
  
  <?php 
				 
				$value= $title['title'];
			
			 
				 
				?>
              
@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.register_url', 'reg')) }}" class="navbar-brand">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
            <!-- Logo -->
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>A</b>LT') !!}</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
            @endif
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">

                    <ul class="nav navbar-nav">
                        <li>
                            @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                            @else
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                                <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                    @if(config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>
        </header>

        @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')
                
                
                
                 Dashboard &nbsp; @if($value != '')  <span ><img src="../image/arrow.gif" width="5" height="10" /> </span> @endif &nbsp;{{ $value }}  &nbsp;&nbsp;@if(Session::has('flash_message'))
					<span class="result" style="color:#CF1B16;">{{Session::get('flash_message')}}</span>
						@endif  
                 
                @if (trim($role['role']) =='Super Admin'  || trim($role['role']) == 'Admin')
  
	
              <div style="float:right;">  
              <input name="butInsert" type="button" value="Insert Data" onClick="window.location.href='reg'" class="but">
              
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
               <input name="butEnable" id="butEnable" type="button" value="Enable/Disable"  class="but">
              <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
              </div>
              
              <div id="success" style="width:auto; float:right;"> </div>
              @endif
              </div>
				 

                <div class="panel-body" >
                
                
   

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center" id="tbl"   >
<tr > 
	

 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Name</th> 

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Email</th> 
 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Role</th> 

 
 <?php
  if (trim($role['role']) =='Super Admin'  || trim($role['role']) == 'Admin')
 {
	 ?>
     
     <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Status</th> 

 
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> </strong> </th>
<?php
 }
 ?>
</tr> 
 
@foreach($query as $rst)
                 

<tr>
 <td align='left' bgcolor=''  valign ='top' class="table-td" >
 
 <span  style="margin:8px; display:block;">
{{$rst->name }}
</span>
  </td > 

 <td align='left' bgcolor=''  valign ='top' >
  <span  style="margin:8px; display:block;">
{{ $rst->email}}
</span>


<select name="lst" id="lst" hidden="" >
<option value=""> Select</option>
</select>
 <input name="txt{!! $rst->id !!}" id="txt{!! $rst->id !!}" type="hidden" value="{!! $rst->name !!}">
 
 <input name="txtStatus{!! $rst->id !!}" id="txtStatus{!! $rst->id !!}" type="hidden" value="{!! $rst->status !!}">

  </td > 


<td align='left' bgcolor=''  valign ='top' class="table-td" >
 
 <span  style="margin:8px; display:block;">
{{$rst->role }}
</span>
  </td >
<?php
   if(trim($role['role']) =='Super Admin'  || trim($role['role']) == 'Admin')
  {
	  
	 ?>
     
     <td align='center' bgcolor='#1D4B6D'  valign ='top' >
     <span  style="margin:8px; display:block; color: #ACACAC; ">
  <label for="{!! $rst->id !!}">{{$rst->status }} </label> &nbsp;&nbsp;&nbsp;<input name="{!! $rst->id !!}" type="checkbox"  id="{!! $rst->id !!}" value=" {!! $rst->id !!}" onClick="get_Values('{!! $rst->id !!}')">
</span>
     </td>
 <td align='left' bgcolor='#980905'  valign ='top' >
 
  
                         
 <span  style="margin:8px; display:block; ">
<a class="del" href ="delete_usr/{!! $rst->id !!}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a> 
</span>
 
</td > 
 
<?php  }   ?>
</tr>

	
						
					  
					  
				 
				@endforeach
 </table>				 

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
@stop



@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
 
 
 
@endsection
<script>
 
	
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		}); 
		
		  var txts ="txt";
		 $(function() {

  
 $("#butEnable").click(function(ev) {
	  ev.preventDefault();
 
		  alert('im here');
		 
		  
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


@stop