
 @extends('layouts.app')
  <?php 
				 
				$value= $title['title'];
			
				 
				?>
              
@section('content')

<div class="container">
    <div class="row">
        
            <div class="panel panel-default">
                <div class="panel-heading">
                
                
                Dashboard &nbsp; @if($value != '') <span ><img src="../../image/arrow.gif" width="5" height="10" /> </span> @endif &nbsp;{{ $value }} 
              <div style="float:right;"> <a href="insert">Insert Data</a> </div></div>

                <div class="panel-body" >
                
      <div style="  text-align:center;" > 
     <span style="margin-left:7px; color:#4E6A9E; font-weight:bold;">
                         @if(Session::has('flash_message'))
					{{Session::get('flash_message')}}
						@endif  
                         </span>
                        </div>

  <table width="98%" bgcolor="#FFFFFF"   border=" "  cellpadding="2" cellspacing="2"  align="center"   >
<tr > 
	

 
 <th width=''bgcolor='#ffffff' align='left' valign='top' style="text-align:center;">Details</th> 

 
 <th width='150'bgcolor='#ffffff' align='left' valign='top' style="text-align:center;" >Title</th> 
 

 
 <th width='70'bgcolor='#ffffff' align='left' valign='top'   scope='col'style="text-align:center;"> Update</th> 

 
 <th  width='70'bgcolor='#ffffff' align='left'  valign='top' style="text-align:center;"><strong> Delete</strong> </th>
</tr> 
 
@foreach($home as $rst)
                 
					 
					   @if($value == 'home')
					  
						  
					

<tr>
 <td align='left' bgcolor='#ffffff'  valign ='top' class="table-td" >
 <span  style="margin:8px; display:block;">
{!!$rst->details !!}
</span>
  </td > 

 <td align='left' bgcolor='#ffffff'  valign ='top' >
  <span  style="margin:8px; display:block;">
{!! $rst->title !!}
</span>
  </td > 




  

 

 <td align='left' bgcolor='#ffffff'  valign ='top' >
 <span  style="margin:8px; display:block;">
<a href ='edit/{{ $rst->id }}' class='topnav_admin'>Update</a> </span></td > 



 <td align='left' bgcolor='#ffffff'  valign ='top' >
 <span  style="margin:8px; display:block;">
<a href ='delete/{{ $rst->id }}' onclick="return confirm('Are you sure you want to delete this item?');">Delete</a> 


</span> </td > 
</tr>
   
	
						
					  
					  
				@endif
				@endforeach
 </table>				 
	 			 
       <div style="text-align:center;"> {{ $home->links() }}  </div>         
	   </div>
                
             
        </div>
    </div>
</div>
@endsection


