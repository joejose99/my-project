 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Lecturer Page</span>

<meta name="_token" content="{!! csrf_token() !!}"/>
@stop

 
@section('content')

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 

 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>
   <div style="width:90%; max-width:795px; height:auto;" >              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px;text-align:right; " >First Name:* &nbsp;</label>

        <div class="col-md-6" style="margin-top:10px;">
          <input id="optionA" type="text" class="form-control" name="optionA" value="{!!$query[0]->fName!!}" required autofocus autocomplete="off">

                                
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                         
                         <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Surname:* &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
      <input id="optionB" type="text" class="form-control" name="optionB" value="{!!$query[0]->surname!!}" required autofocus autocomplete="off">

 
                                
                            </div>
                        </div>  
                        
                        
                        
           
                        
                        
                        
                        
                      <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Middle Name:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="optionC" type="text" class="form-control" name="optionC" value="{!!$query[0]->midName!!}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>   
                        
                        
                         <div class="form-group{{ $errors->has('txtAddress') ? ' has-error' : '' }}"   >
             <label for="txtAddress" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Address:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtAddress" type="text" class="form-control" name="txtAddress" value="{!!$query[0]->address!!}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                        
                         <div class="form-group{{ $errors->has('txtPhone') ? ' has-error' : '' }}"   >
             <label for="txtPhone" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Phone No:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtPhone" type="text" class="form-control" name="txtPhone" value="{!!$query[0]->mobileNo!!}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                        
                        
                        
                       
                             
   
   <div class="form-group{{ $errors->has('optionD') ? ' has-error' : '' }}"   >
                            <label for="optionD" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Email Address:* &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
                                <input id="optionD" type="text" class="form-control" name="optionD" value="{!!$query[0]->email!!}" required autofocus autocomplete="off" >

 
 <input id="id" type="hidden" class="form-control" name="id" value="{!!$query[0]->lcrId !!}" required autofocus autocomplete="off" >
                               
                            </div>
                        </div>   
                        
                        
                          
                         <div class="form-group{{ $errors->has('txtBirth') ? ' has-error' : '' }}"   >
             <label for="txtBirth" class="col-md-4 control-label" style="margin-top:15px; width:200px;text-align:right;">Birth Date:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtBirth" type="text" class="form-control" name="txtBirth" value="{!!$query[0]->dateOfBirth!!}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>     
                          
                          
                        
                         <div  class="show_question" >
              <label for="answer" class="col-md-4 control-label" style="margin-top:15px; width:200px;text-align:right;">State:* &nbsp;</label>
                        <div class="col-md-6" style="margin-top:10px;">
                

                               <select name="term" class="term" id="term">
                               
                                <option  value="{!!$query[0]->state!!}"> {!!$query[0]->state!!}</option>
                               <option  value="Abia"> Abia</option>
                               <option  value="Adamawa"> Adamawa</option>
                               <option  value="Akwa Ibom"> Akwa Ibom</option>
                               <option  value="Anambra"> Anambra</option>
                               <option  value="Bauchi"> Bauchi</option>
                               <option  value="Bayelsa"> Bayelsa</option>
                               <option  value="Benue"> Benue</option>
                               
                               <option  value="Borno"> Borno</option>
                               <option  value="Cross River"> Cross River</option>
                               <option  value="Delta"> Delta</option>
                               <option  value="Ebonyi"> Ebonyi</option>
                               <option  value="Edo"> Edo</option>
                               <option  value="Ekiti"> Ekiti</option>
                               <option  value="Enugu"> Enugu</option>
                               <option  value="Imo"> Imo</option>
                               <option  value="Gombe"> Gombe</option>
                               <option  value="Jigawa"> Jigawa</option>
                               <option  value="Kaduna"> Kaduna</option>
                               <option  value="Kano"> Kano</option>
                               <option  value="Kastina"> Kastina</option>
                               <option  value="kebbi"> Kebbi</option>
                               <option  value="Kogi"> Kogi</option>
                               <option  value="Kwara"> Kwara</option>
                               <option  value="Lagos"> Lagos</option>
                               <option  value="Nasarawa">Nasarawa</option> 
                               
                              
                              
                               <option  value="Niger">Niger</option> 
                               
                               <option  value="Ogun">Ogun</option> 
                               <option  value="Ondo">Ondo</option> 
                               <option  value="Osun">Osun</option> 
                               <option  value="Oyo">Oyo</option> 
                               <option  value="Plateau">Plateau</option> 
                               <option  value="Rivers">Rivers</option> 
                               <option  value="Sokoto">Sokoto</option> 
                               <option  value="Taraba">Taraba</option> 
                               <option  value="Yobe">Yobe</option> 
                               <option  value="Zamfara">Zamfara</option> 
                               <option  value="Nasarawa">Nasarawa</option>  
                               </select>



                                
                                 
                            </div>
                        </div>      

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div  class="show_question" >
              <label for="answer" class="col-md-4 control-label" style="margin-top:15px; width:200px;text-align:right;">L.G.A:* &nbsp;</label>
                        <div class="col-md-6" style="margin-top:10px;">
                

                               <select name="cls" class="cls" id="cls">
                               
                                <option  value="{!!$query[0]->LGA!!}"> {!!$query[0]->LGA!!}</option>
                               <option  value="Aniocha North"> Aniocha North</option>
                               <option  value="Aniocha South"> Aniocha South</option>
                               <option  value="Bomadi"> Bomadi</option>
                               <option  value="Burutu"> Burutu</option>
                               <option  value="Ethiope East"> Ethiope East</option>
                               <option  value="Ethiope West"> Ethiope West</option>
                               <option  value="Ika North East"> Ika North East</option>
                               <option  value="Ika South"> Ika South</option>
                               <option  value="Isoko North"> Isoko North</option>
                               <option  value="Isoko South"> Isoko South</option>
                               <option  value="Ndokwa East"> Ndokwa East</option>
                               <option  value="Ndokwa West"> Ndokwa West</option>
                               <option  value="Okpe"> Okpe</option>
                               <option  value="Oshimili North"> Oshimili North</option>
                               <option  value="Oshimili South"> Oshimili South</option>
                               <option  value="Patani"> Patani</option>
                               <option  value="Sapele"> Sapele</option>
                               <option  value="Udu"> Udu</option>
                               <option  value="Ughelli North"> Ughelli North</option>
                               <option  value="Ughelli South"> Ughelli South</option>
                               <option  value="Ukwani"> Ukwani</option>
                               <option  value="Ovwie"> Ovwie</option>
                               <option  value="Warri North"> Warri North</option>
                               <option  value="Warri South"> Warri South</option>
                               <option  value="warri South West"> warri South West</option> 
                               
                               
                               </select>



                                
                                 
                            </div>
                        </div>      
                        
                         
                           
   
   
   
   
    <div class="form-group{{ $errors->has('txtNextKinName') ? ' has-error' : '' }}"   >
             <label for="txtNextKinName" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Next of Kin:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtNextKinName" type="text" class="form-control" name="txtNextKinName" value="{!!$query[0]->nextOfKin!!}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>     
                        
                        
                         <div class="form-group{{ $errors->has('txtNextKinAddress') ? ' has-error' : '' }}"   >
             <label for="txtNextKinAddress" class="col-md-4 control-label" style="margin-top:15px; width:200px;text-align:right;">Next of Kin Address:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtNextKinAddress" type="text" class="form-control" name="txtNextKinAddress" value="{!!$query[0]->nextOfKinAddress!!}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>     
                        
                        
                        
                        
                        <div class="form-group{{ $errors->has('txtNextKinPhone') ? ' has-error' : '' }}"   >
             <label for="txtNextKinPhone" class="col-md-4 control-label" style="margin-top:15px;width:200px; text-align:right;">Next of Kin Phone No:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtNextKinPhone" type="text" class="form-control" name="txtNextKinPhone" value="{!!$query[0]->nextOfKinMobile!!}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>     
   
   
   
   <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px; text-align:right;">Department:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
           <select name="dpt" class="mnu" id="dpt">
                               <option  value="{!!$query[0]->dptId!!}">{!!$query[0]->department!!} </option> 
                             
                                @foreach($dpt as $st)
   <option value="{!! trim($st->dptId )!!}"> {!! $st->department !!} </option>
   @endforeach 

             </select>                  
                               
                            </div>
                        </div>   
                        
                        
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../lecturer'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <input name="butSubmit" id="butSubmit" type="submit" value="&nbsp;Edit&nbsp;" class="but" />
 
 
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"></div>

 
   </div>
   
   </div>


@section('css')

 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />

@stop

@section('js')
 
@stop

 
 
 
 
 
   
   
  <script>
	 
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
		
$(function() {
 
  
 $("#butSubmit").click(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	  
	 
	 /* var cls = $("#cls").val();
	  var term = $("#term").val();
		var subject=$("#subject").val();
		var details=$("#details").val();
		
		var optionA=$("#optionA").val();
		
		 var optionB=$("#optionB").val();
		  var optionC=$("#optionC").val(); 
		  var optionD=$("#optionD").val();
		 var answer=$("#answer").val();
		 var  mark =$("#mark").val();
	*/
	var ctr =0;
	
/*	$('#form1').validate({ // initialize the plugin
        rules: {
            mark: {
                required: true,
                integer: true
            } 
        }
    });*/
	
	  
	 
	  
	
	
	$("#error-page").html("");
	document.getElementById('error-page').style.height="auto";
	if($("#optionA").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; First Name is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	
	if(document.getElementById('optionB').value =="")
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Surname is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	if(document.getElementById('optionC').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Middle Name  is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	 
	
	 if(document.getElementById('txtAddress').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Address  is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	   
	   
	    if(document.getElementById('txtPhone').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Phone No  is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	} 
	
	 var mk = $("#txtPhone").val();
	// alert(parseInt(mk));
	 var mkInt=parseInt(mk);
	  if(isNaN(mkInt) && $("#txtPhone").val() !='')
	   {
		   var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Enter Number for Phone No !! &nbsp;</span>';
	  $("#error-page").append(errors);
	  
	  ctr++;
	   }
	   
	
	
	 if(document.getElementById('optionD').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Email  is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	
	 if(document.getElementById('txtBirth').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Birth Date  is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	 
	 if(document.getElementById('cls').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select L.G.A !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	
	 if(document.getElementById('term').value =='Select')
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Select State !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	
	 if(document.getElementById('txtNextKinName').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Next Of Kin Name  is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	 if(document.getElementById('txtNextKinAddress').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Next Of Kin Address  is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	
	if(document.getElementById('txtNextKinPhone').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Next Of Kin Phone No  is required !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	
	 var mk = $("#txtNextKinPhone").val();
	// alert(parseInt(mk));
	 var mkInt=parseInt(mk);
	  if(isNaN(mkInt) && $("#txtNextKinPhone").val() !='')
	   {
		   var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Please Enter Number for Phone No !! &nbsp;</span>';
	  $("#error-page").append(errors);
	  
	  ctr++;
	   }
	
	
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	  dtArray.push({
		   term:$("#term").val(),
			 cls:$("#cls").val(),
			 dptId:$("#dpt").val(),
			optionA:$("#optionA").val(),
			optionB:$("#optionB").val(),
			optionC:$("#optionC").val(),
			optionD:$("#optionD").val() ,
			txtAddress:$("#txtAddress").val(),
			txtPhone:$("#txtPhone").val(),
			txtBirth:$("#txtBirth").val(),
			txtNextKinName:$("#txtNextKinName").val(),
			txtNextKinPhone:$("#txtNextKinPhone").val(),
			txtNextKinAddress:$("#txtNextKinAddress").val(),
			id:$("#id").val()
			});
			
	  
	   
	  
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'/editLecturer/{{$query[0]->lcrId}}',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		 processData:"false",
         success: function(data) {
   var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successefully Saved &nbsp;</span>';
       $("#error-page").html(saved);
	 console.log(data.success);
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
   
   
   
  @stop
 

 



 


 
 
 
      

</body>
</html>
 