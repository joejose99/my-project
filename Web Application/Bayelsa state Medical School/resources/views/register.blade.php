@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard  &nbsp;&nbsp;&nbsp;&nbsp;<span class="welcome-heading-page">{{ Auth::user()->name }} </span></h1>  <span class="mainbody" style="margin-left:1px;">Login Profile Page</span>

<meta name="_token" content="{!! csrf_token() !!}"/>
@stop

 
@section('content')



<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            
            
                <div class="panel-heading">Register &nbsp;&nbsp;&nbsp;  
                
                   @if(Session::has('flash_message'))
                   <span class="result" style='color:#2965A0; font-weight:bold; font-family:Verdana, Geneva, sans-serif;'>
					{{Session::get('flash_message')}}
                    
                    </span>
						@endif  
                  
                </div>
                <div class="panel-body">
                     
                     <form class="form-horizontal" role="form" method="POST" action="{{ route('regUsers') }}">
                       {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        <div class="form-group{{ $errors->has('Role') ? ' has-error' : '' }}">
                        
 
  						 <label   class="col-md-4 control-label">Role :</label> 
   							<div class="col-md-6"> 
  							 <select name="role" id="role" class="form-control">
  							 <option  value="">Select </option>
                             
                            
                             @if(Auth::user()->role()->first()->role =='Super Admin')
  							<!-- <option value="Super Admin">Super Admin</option>
   							 <option value="Admin">Admin</option> -->
                              @foreach($user_role as $rst)
   							<option value="{!! trim($rst->id)!!}"> {!! $rst->role !!}</option>
                              
                               
  							 @endforeach 
                             
                             @endif
   								 
   
  
  								 </select>  @if ($errors->has('role'))
                                    <span class="help-block" style="float:right;">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                								 @endif
                					 </div></div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="regs">
                                    Register
                                </button>
                            </div>
                        </div>
                        
                        
                    </form>
                    
                    
                    
 
                    
                    
                    
	  
                </div>
            </div>
        </div>
    </div>
</div>



                    
@endsection


