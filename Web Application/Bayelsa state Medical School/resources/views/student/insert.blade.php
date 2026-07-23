 
 @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Student Page</span>

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop




@section('content')

 <script src="{{ asset('../js/jquery-3.4.1.js') }}"></script>
 

 
<div id="error-page" style="text-align:center; font-weight:bold;"> </div>
   <div style="width:90%; max-width:795px; height:auto;" >   
   
     <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}"   >
             <label for="gender" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Student Id Mode:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
           
  
    <p>
      <label>
        <input type="radio" name="mode" value="Auto" id="mode_0" onclick="getAuto()" />
       Auto Entry</label>
      &nbsp; &nbsp; &nbsp; &nbsp;
      <label>
        <input type="radio" name="mode" value="Manual" id="mode_1"  checked="checked" onclick="getManual()" />
        Manual Entry</label>
      <br />
    </p>
   <input id="mode" type="hidden"  name="mode" value="Manual" />
                 </div>
                        </div>   
   
   
   
   
                    <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Faculty:* &nbsp;</label>

                <div class="col-md-6" style="margin-top:10px;">
           <select name="faculty" class="faculty" id="faculty">
                               
                            <option  value="Select"> Select</option>
                               
    @foreach($faculty as $rst)
   <option value="{!! trim($rst->falId)!!}"> {!! $rst->faculty !!} </option>
   @endforeach 

                          </select>     
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                      <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Department:* &nbsp;</label>

               <div class="col-md-6" style="margin-top:10px;">
           <select name="dpt" class="dpt" id="dpt">
                               
                               <option  value="Select">Select</option>
                             
                               </select>

                               
                               
                            </div>
                        </div>   
                        
   
   
    <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Program:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
           <select name="program" class="program" id="program">
                               
                               <option  value="Select">Select</option>
                             
                               </select>

                               
                               
                            </div>
                        </div>   
   
   
   
   
    
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px;text-align:right; " >Student Id:* &nbsp;</label>

        <div class="col-md-6" style="margin-top:10px;">
          <input id="txtStudentId" type="text" class="form-control" name="txtStudentId" value="{{ old('txtStudentId') }}" required autofocus autocomplete="off">

                                
                            </div>
                        </div>
   
   
   
   
              
  <div class="form-group{{ $errors->has('optionA') ? ' has-error' : '' }}"  >
          <label for="optionA" class="col-md-4 control-label " style="margin-top:15px; width:200px;text-align:right; " >First Name:* &nbsp;</label>

        <div class="col-md-6" style="margin-top:10px;">
          <input id="optionA" type="text" class="form-control" name="optionA" value="{{ old('optionA') }}" required autofocus autocomplete="off">

                                
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                         
                         <div class="form-group{{ $errors->has('optionB') ? ' has-error' : '' }}" >
     <label for="optionB" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Surname:* &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
      <input id="optionB" type="text" class="form-control" name="optionB" value="{{ old('optionB') }}" required autofocus autocomplete="off">

 
                                
                            </div>
                        </div>  
                        
                        
                        
           
                        
                        
                        
                        
                      <div class="form-group{{ $errors->has('optionC') ? ' has-error' : '' }}"   >
             <label for="optionC" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Middle Name:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="optionC" type="text" class="form-control" name="optionC" value="{{ old('optionC') }}" required autofocus autocomplete="off" >

                              
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                        
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}"   >
             <label for="gender" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Gender:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
           
  
    <p>
      <label>
        <input type="radio" name="gender" value="Male" id="gender_0" onclick="getMale()" />
        Male</label>
      &nbsp; &nbsp; &nbsp; &nbsp;
      <label>
        <input type="radio" name="gender" value="Female" id="gender_1"  onclick="getFemale()" />
        Female</label>
      <br />
    </p>
   <input id="gender" type="hidden"  name="gender" value="" />
                 </div>
                        </div>   
                        
                        
                        
                         

                        
                        
                        
                        
                        
                        
                         <div class="form-group{{ $errors->has('txtAddress') ? ' has-error' : '' }}"   >
             <label for="txtAddress" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Address:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtAddress" type="text" class="form-control" name="txtAddress" value="{{ old('txtAddress') }}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                        
                         <div class="form-group{{ $errors->has('txtPhone') ? ' has-error' : '' }}"   >
             <label for="txtPhone" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Phone No:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtPhone" type="text" class="form-control" name="txtPhone" value="{{ old('txtPhone') }}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>   
                        
                        
                        
                        
                        
                        
                        
                       
                             
   
   <div class="form-group{{ $errors->has('optionD') ? ' has-error' : '' }}"   >
                            <label for="optionD" class="col-md-4 control-label" style="margin-top:15px;width:200px;text-align:right;">Email Address:* &nbsp;</label>

                            <div class="col-md-6" style="margin-top:10px;">
                                <input id="optionD" type="text" class="form-control" name="optionD" value="{{ old('optionD') }}" required autofocus autocomplete="off" >

 
                               
                            </div>
                        </div>   
                        
                        
                          
                         <div class="form-group{{ $errors->has('txtBirth') ? ' has-error' : '' }}"   >
             <label for="txtBirth" class="col-md-4 control-label" style="margin-top:15px; width:200px;text-align:right;">Birth Date:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtBirth" type="text" class="form-control" name="txtBirth" value="{{ old('txtBirth') }}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>     
                          
                          
                        
                         <div  class="show_question" >
              <label for="answer" class="col-md-4 control-label" style="margin-top:15px; width:200px;text-align:right;">State:* &nbsp;</label>
                        <div class="col-md-6" style="margin-top:10px;">
                

                               <select name="term" class="term" id="term">
                               
                               <option  value="Select"> Select</option>
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
                               
                               <option  value="Select"> Select</option>
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
          <input id="txtNextKinName" type="text" class="form-control" name="txtNextKinName" value="{{ old('txtNextKinName') }}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>     
                        
                        
                         <div class="form-group{{ $errors->has('txtNextKinAddress') ? ' has-error' : '' }}"   >
             <label for="txtNextKinAddress" class="col-md-4 control-label" style="margin-top:15px; width:200px;text-align:right;">Next of Kin Address:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtNextKinAddress" type="text" class="form-control" name="txtNextKinAddress" value="{{ old('txtNextKinAddress') }}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>     
                        
                        
                        
                        
                        <div class="form-group{{ $errors->has('txtNextKinPhone') ? ' has-error' : '' }}"   >
             <label for="txtNextKinPhone" class="col-md-4 control-label" style="margin-top:15px;width:200px; text-align:right;">Next of Kin Phone No:* &nbsp;</label>

                 <div class="col-md-6" style="margin-top:10px;">
          <input id="txtNextKinPhone" type="text" class="form-control" name="txtNextKinPhone" value="{{ old('txtNextKinPhone') }}" required autofocus autocomplete="off" >

                               
                               
                            </div>
                        </div>     
   
 
 <div style="clear:both; height:10px;"> </div> 
 



<div  id="nextsubmit" style="width:300px; margin-left:120px; margin-top:40px; text-align:center;  margin-bottom:15px;">    
<input name="butBack" id="butBack" type="button" value="&nbsp;&nbsp;Back &nbsp;&nbsp;" class="but" onClick="window.location.href='../student'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <input name="butSubmit" id="butSubmit" type="submit" value="&nbsp;Submit&nbsp;" class="but" />
 
 
  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}"></div>

 
   </div>
   
   </div>
    <script>
	function getMale()
	{
		var gender = $('#gender_0').val();
		document.getElementById('gender').value=gender;
		
		 
	}
	
	function getFemale()
	{
		var gender = $('#gender_1').val();
		document.getElementById('gender').value=gender;
		 
	}		
	
	
	
	
	
	function getAuto()
	{
		var mode = $('#mode_0').val();
		document.getElementById('mode').value=mode;
		 
		 
		 $("#txtStudentId").prop("readonly",true);
		 
	}
	
	function getManual()
	{
		var mode = $('#mode_1').val();
		
		mode=document.getElementById('mode_1').value;
		
		document.getElementById('mode').value=mode;
		 $("#txtStudentId").prop("readonly",false);
		 
		 document.getElementById("txtStudentId").value="";
	}		
	</script>
   <script>
	 
	 
	 $.ajaxSetup({
		     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  
		});  
		
$(function() {
 
 
 
 
 
 $("#faculty").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  if($("#faculty").val() == "Selcet")
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
         url:'search_prg',
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty").val()},
		 processData:"false",
         success: function(data) {
			 
			 
			 
			
			
			
			 var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				for (i=0;i < data.length;i++)
				//{ 
				//for (var i=0;i < data.rstDpt.length;i++)
				{
					
				 
					
				 option+='<option value ="'+ data[i].dptId +'">'+data[i].department +'</option>';
				}
				
				
				 
				$("#dpt").html(option);
	  
			
			
			
   
	   

	        //$("#lengths").html(ctr); 
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
  
  
  });
  
 
 
 
 
 
  $("#dpt").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  
	  if($("#faculty").val() == "Selcet")
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
         data:{"_token":$('#signup-token').val(),"faculty":$("#faculty").val(),"department":$("#dpt").val()},
		 processData:"false",
         success: function(data) {
  
  
	  
	    var sel="Select";
			 var option='';
			 option ='<option value="">'+sel+'</option>';
			
				for (i=0;i < data.length;i++)
				//{ 
				//for (var i=0;i < data.rstDpt.length;i++)
				{
					
				 
					
				 option+='<option value ="'+ data[i].prgId +'">'+data[i].program +'</option>';
				}
				
				
				 
				$("#program").html(option);
	  
   
   
    
					  
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
 
 
 
 
 
  $("#program").change(function(ev) {
	  ev.preventDefault();
	   var dtArray=[];
	 
	 
	var ctr =0;
	 
	  
	  
	  if($("#faculty").val() == "Selcet")
	{
		
		//document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp;  Select Faculty Value, is required !! &nbsp;</span>';
	  $("#SelectError").html(errors);
		ctr++;
	}  
	
	 
	
	  if(ctr != 0 )
	  {
		  return false;
	  }
	  
	   if(document.getElementById("mode").value == "Manual" )
	  {
		  return false;
	  }
	    
		 if(document.getElementById("mode").value != "Manual" )
	  {
		  document.getElementById('mode').value="Auto";
	  }
	 
	 /* dtArray.push({
			 clsId:$("#clss").val()
			  
			});
			
			 */ 
	 	
//var dataArray= JSON.stringify(dtArray);
	  //console.log(dataArray);
	   dtArray.push({
		     faculty:$("#faculty").val(),
			 department:$("#dpt").val(),
			program:$("#program").val() 
			 
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	   
	  
     $.ajax({ 
	  dataType:"json", 
	    type:"POST",
         url:'search_fal_stdId',
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray}, 
		 processData:"false",
         success: function(data) {
  
  
	  
	     
				
				 
				$("#txtStudentId").html(data.stdId);
				
				    
				  
				document.getElementById("txtStudentId").value=data.stdId
	  
    
   
    
					  
         },
		 error: function(data) {
         
	   console.log('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
 
 
 
  
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
	
	if($("#txtStudentId").val() == "")
	{
         document.getElementById('error-page').style.height="25px";
	
	var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Student Id is required !! &nbsp;</span>';
	  $("#error-page").html(errors);
		ctr++;
	}
	
	if(document.getElementById('faculty').value =='Select')
	{
	 
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Select Faculty  !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
	if(document.getElementById('dpt').value =='Select')
	{
	 
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Select Department  !! &nbsp;</span>';
	  $("#error-page").append(errors);
		ctr++;
	}
	
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
	
	 
	 
	 if(document.getElementById('gender').value =='')
	{
         document.getElementById('error-page').style.height="25px";
	
		var errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; Select Gender  !! &nbsp;</span>';
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
			  prgId:$("#program").val(),
			  txtStudentId:$("#txtStudentId").val(),
			   mode:$("#mode").val(),
			optionA:$("#optionA").val(),
			optionB:$("#optionB").val(),
			optionC:$("#optionC").val(),
			gender:$("#gender").val(), 
			optionD:$("#optionD").val() ,
			txtAddress:$("#txtAddress").val(),
			txtPhone:$("#txtPhone").val(),
			txtBirth:$("#txtBirth").val(),
			txtNextKinName:$("#txtNextKinName").val(),
			txtNextKinPhone:$("#txtNextKinPhone").val(),
			txtNextKinAddress:$("#txtNextKinAddress").val()
			});
			
			  
	 	
var dataArray= JSON.stringify(dtArray);
	  console.log(dataArray); 
	  
     $.ajax({  
	    type:"POST",
         url:"createStudent",
         data:{"_token":$('#signup-token').val(),"dataArray":dataArray},
		  dataType:"JSON",
		 processData:"false",
         success: function(data) {
    var saved= '<span class=rstclass style=color:#2965A0;> &nbsp;&nbsp; Data Successfully Saved &nbsp;</span>';
       $("#error-page").html(saved);
	   alert('Data Successfully Saved');
	  if(data == 'Data Successfully Saved')
	   {
	   document.getElementById('optionA').value='';
	   document.getElementById('optionB').value='';
	   document.getElementById('optionC').value='';
	   document.getElementById('optionD').value='';
	   
	   document.getElementById('txtStudentId').value='';
	     
		  document.getElementById('faculty').value='Select';
		  document.getElementById('dpt').value='Select';
		  document.getElementById('program').value='Select';
		  
		  document.getElementById('cls').value='Select';
		  document.getElementById('term').value='Select';
		  
		 document.getElementById('txtAddress').value='';
	   document.getElementById('txtPhone').value='';
	   document.getElementById('txtBirth').value='';
	   document.getElementById('txtNextKinName').value='';
	   
	    document.getElementById('txtNextKinName').value='';
		 document.getElementById('txtNextKinAddress').value='';
		  document.getElementById('txtNextKinPhone').value='';
		  
		   document.getElementById('mode').value='';
	    } 
	     
			
         },
		 error: function(data) {
         
	   console.log('Data Error');
	   alert('Data Error'); 
	 
	  //errors= '<span class=rstclass style=color:#C63A26;> &nbsp;&nbsp; L.G.A selection Error: &nbsp;</span>';
	  //$("#lgaSelect").append(errors);
	    
	  
    }   
		 
     });
 });
			
 
});
     </script>




 @stop
 
  
@section('css')
 
 <link href="../exam/css/button.css" rel="stylesheet" type="text/css" />
     <link href="../exam/css/style3.css" rel="stylesheet" type="text/css" />
   
@stop

@section('js')


<!--
<script src="../js/jquery-3.4.1.js" ></script>
-->

 
 
 
 
@stop