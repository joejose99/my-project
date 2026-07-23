 
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

<script language='javascript'>
function showPopupPage(popUpPage)
{  
	 
	window.open(popUpPage,'window',"top=500,left=500, width=4000,height=4000,toobar=0,scrollbars=0,location=0,statusbar=0,titlebar=0,menubar=0,resizable=0,fullscreen=yes");
}

 
//height=screen.availHeight,width=screen.availWidth
</script>






    
        
            <div class="panel panel-default">
                <div class="panel-heading">
                
                
                  <span ><img src="../../image/arrow.gif" width="5" height="10" />&nbsp&nbsp;Exam Time Table </span> 
            
             
              <div style="float:right; width:76%; margin-top:-5px; text-align:right; margin-right:70px;"> 
              
              
              
              <span class="hide_question" id="spUnpublish">
                             <input name="butUnpublish" type="button" value="Unpublish"  id="butUnpublish" class="but">
                             </span>
    &nbsp;&nbsp;&nbsp;&nbsp;

              
            <span class="hide_question" id="spPub" >
               <input name="butPublish" type="button" value="Publish"  id="butPublish" class="but">
               
               </span>
    &nbsp;&nbsp;&nbsp;&nbsp;
 
   
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
              
              <input name="butInsert" type="button" value="Set Up Exam"  onClick="showPopupPage('{{route('setExam')}}')" class="but">
              
              
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
                
             
              
              </div>
                  
              <!--    
             <div id="totSch" style="float:right; margin-top:-5px; width:50%; text-align:center;" class="hide_question">  <input name="txtsearch" type="text" id="txtSearch" class="searchTextbox" placeholder="Search Course" onkeypress="return isNumberKey(event) " onblur="if(this.value=='') 
this.value='';" onfocus="if(this.value=='Search Question')"  >  


 

</div> -->
              
              </div>
              
              <div style="text-align:center; margin-top:15px;">
              
              
              
    
    
    
     </div>
                

               
                
     <div class="panel-body" >
           <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">     
           
   
  <!--  
  /* 
   
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js'></script>

 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css' />

*/
-->
 
  
 
    
    
     
    
    <link rel='stylesheet' href='../calendar/fullcalendar.min.css' />
 


 
   



<h3>Exam Time Table</h3>

<div id='calendar' >
{!! $calendar_details->calendar() !!}


</div>
 
 
                 
	
    
    
    




  
    
    
    
    				 


         
	    <div id="lengths" style="height:30px;"> </div>
               
             
             
             
             
             
             
         
         
          
    
             
             
   

     
             
        </div>
    </div>
 








 
     
 @section('css')
 
 
   
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
    
     <link href="../exam/css/style.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
    <link href="../exam/css/popup.css" rel="stylesheet" type="text/css" />
    
    
     

@stop

@section('js')
  <script src="{{ asset('../calendar/moment.min.js') }}"></script>
  <script src="{{ asset('../calendar/fullcalendar.min.js') }}"></script>
    
 
 
{!! $calendar_details->script() !!}
@stop

 @stop



   
