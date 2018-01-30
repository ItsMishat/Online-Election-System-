@extends('layouts.app')

@section('content')
<style type="text/css">
    #update_form
    {
        display: none;
    }
    img{
        border: 5px solid #fff;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <h1 class="panel-heading text-center">{{$user->name}}'s profile</h1>
                   <div class="row" >

                   <div class="panel-body text-center">
                            <img src= "/uploads/image/{{$user->image}}"  style="width:200px; height:200px;margin-right:25px; border-radius: 20%;">
                            <h3>Student ID: {{$user->s_id}}</h3>
                            <h3>Email: {{$user->email}}</h3>
                            <h3>Date of Birth:{{$user->dob}}</h3>
                            <h3>Created at: {{$user->created_at}}</h3>
                            <button id="update" class="btn-primary">Update Profile</button>
                   </div>  
                    </div>  
            </div>
        </div>
    </div>
</div>

</br>



</br>
<div id="update_form">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class=" panel panel-default">
                <div class="panel-heading"> Update Profile </div>

                <div class="panel-body">
             <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/profile"}}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('cimage') ? ' has-error' : '' }}">
                        <label for="image" class="col-md-4 control-label">Upload Image</label>
                         <div class="col-md-6">
                        <img src= "/uploads/cimage/default.jpg" style="width:200px; height:200px; float:left; margin-right:25px;">
                    <input type= "file" name="image">
                     @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>Sorry, Your image shall be in .jpeg, .jpg, .png or .gif file format and shall not exceed the size of 2MB </strong>
                                    </span>
                     @endif
                    </div>
                   </div>

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
                     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br> 

                 <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob">

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Update Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                <input id="submit" type  = "submit" class="btn btn-primary pull-right" value = "Update"></br>
              
            </form> 
            </div>         
            </div>
            </div>
    </div>    
</div>

<script>
$( "#update" ).click(function() {
  $( "#update_form" ).toggle("slow");
});

$("#submit").click(function(){
  swal({
  title: "Thank you!",
  text: "Your profile has been updated.",
  type: "success",
  confirmButtonText: "Ok",
});  
});
</script>
@endsection
