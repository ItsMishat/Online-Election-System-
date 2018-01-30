@extends('layouts.app')
@section('content')
      <style>
      .cform h1 {
            color: black;
            text-align: center;
            border: 5px 5px 5px 5px;
            border-style: solid;
            border-color: ;
            border-width: 5px;
            background-color: #80BF4E;
        } 
      </style>

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
 
@if(!Auth::user()->submitted)
<div class="cform"> 
      <H1>Candidate Nomination Form</H1>
      
      
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <!--form  -->
 <form id="cform" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/cform') }}">
                        {{ csrf_field() }}


                       <!--Upload Image -->
                        
                             <div class="form-group{{ $errors->has('cimage') ? ' has-error' : '' }}">
                            <label for="cimage" class="col-md-4 control-label">Upload Image</label>

                            <div class="col-md-6">
                                <img src= "/uploads/cimage/default.jpg" style="width:200px; height:200px; float:left; margin-right:25px;">
                                <input type= "file" name="cimage">
                                
                                
                               
                                @if ($errors->has('cimage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cimage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     
                       <!--Student ID -->
                        
                              <div class="form-group{{ $errors->has('s_id') ? ' has-error' : '' }}">
                            <label for="s_id" class="col-md-4 control-label">Studednt ID</label>

                            <div class="col-md-6">
                                <input id="s_id" type="text" placeholder="131-35-000" class="form-control" name="s_id" value="{{ Auth::user()->s_id }}" required autofocus>
                              @if ($errors->has('s_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('s_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <!-- position to apply -->

                                           <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">Position to apply</label>

                            <div class="col-md-6">
                               <select class="select form-control" id="select" name="position">
                              <option value="President">
                                          President
                                         </option>
                              <option value="Vice-President">
                                          Vice-President
                                         </option>
                                        </select>
                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <!-- average CGPA until now -->

                        <div class="form-group{{ $errors->has('cgpa') ? ' has-error' : '' }}">
                            <label for="cgpa" class="col-md-4 control-label">Average CGPA until now</label>

                            <div class="col-md-6">
                                     <input name="cgpa" type="radio"  value="3.00&lt;CGPA"/>
                                     CGPA>3.00
                                    <br>
                                     <input name="cgpa" type="radio"   value="3.00&lt;CGPA&lt;3.50"/>
                                     3.00>CGPA>3.50
                                    <br>
                                     <input name="cgpa" type="radio"   value="3.50&lt;CGPA"/>
                                     3.50&lt;CGPA
                                    <br>
                                @if ($errors->has('cgpa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cgpa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      
                       <!--Programming Languages -->
                          <div class="form-group{{ $errors->has('p_language') ? ' has-error' : '' }}">
                            <label for="planguage" class="col-md-4 control-label">Name learned programming languages</label>

                            <div id="language" class="col-md-6">
                               <input type ="text" class="form-control" name= "planguage[]">
                               <input type="button" value="Add" class="pull-right" onClick="addInput('language')">
             
                                @if ($errors->has('planguage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planguage') }}</strong>
                                    </span>
                                @endif
                              </div> 
                                 
                            </div>
<!--Completed projects -->

                        <div class="form-group{{ $errors->has('cproject') ? ' has-error' : '' }}">
                            <label for="cproject" class="col-md-4 control-label">Name of the Completed projects</label>

                            <div id ="cproject" class="col-md-6">
                               <input type ="text" class="form-control" placeholder="Title of the project with details" name="cproject[]">
                               
                               <input type="button" value="Add" class="pull-right" onClick="addInput('cproject')">
                                @if ($errors->has('cproject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cproject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--events -->
    <div class="form-group{{ $errors->has('event') ? ' has-error' : '' }}">
    <label for="event" class="col-md-4 control-label">Seminar/Workshop/Attended Events</label>

    <div id="eventInput" class="col-md-6">
       <input type="text" class="form-control" placeholder="Add name of event Date and venue if possible" name ="event[]">
      
         <input type="button" value="Add" class="pull-right" onClick="addInput('eventInput')">
        @if ($errors->has('event'))
            <span class="help-block">
                <strong>{{ $errors->first('event') }}</strong>
            </span>
        @endif
    
    </div>
    </div>
                              <!--/////////////Reasons -->
        <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
    <label for="reason" class="col-md-4 control-label"> Why do you think you are capable for the position you are applying for?</label>

    <div id="reason" class="col-md-6">
       <input type="text" class="form-control" placeholder="Answer within 200 words" name ="reason">
      
        
        @if ($errors->has('event'))
            <span class="help-block">
                <strong>{{ $errors->first('reason') }}</strong>
            </span>
        @endif
    </div>
    </div>

                        <!--Upload certificates-->
                          <div class="form-group{{ $errors->has('docs') ? ' has-error' : '' }}">
                            <label for="docs" class="col-md-4 control-label">Upload document(s) of certification(if have any)</label>

                            <div class="col-md-6">
                               <input type="file" class="form-control" name="docs">

                               <input type= "hidden" name=_token value = "{{csrf_token()}}">
                               
                                @if ($errors->has('docs'))
                                    <span class="help-block">
                                        <strong>Sorry, Only files with extensions(.pdf,.jpg,.jpeg,.png,.zip) are allowed to upload and can't exceed 4MB </strong>
                                    </span>
                                @endif
                                     
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="apply" type="submit" class="btn btn-primary">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </form>

 </div>
@else
@include('partials.flash')
 <h1 class="alert alert-success">Sorry, you cannot submit any more forms.</h1>
@endif    




  <script>
  //////////// on click textboxes ///////////
    function addInput(divName){
      var counter = 1; 
      var limit = 10;

    if (counter == limit) {
         
           swal({
            title: "Excuse me!",
            text: "You have reached the limit of adding " + counter + " inputs",
            type: "warning",
            confirmButtonText: "Ok"
          });
            }
            else {

                  var newdiv = document.createElement('div');
                  switch(divName){

                  case 'language': 
                                  newdiv.innerHTML = " <br><input type='text' class='form-control' name='planguage[]'>";
                                  counter++;
                                  break;
                  case 'cproject': 
                                  newdiv.innerHTML = " <br><input type='text' class='form-control' name='cproject[]'>";
                                  counter++;
                                  break;
                  case 'eventInput'   :
                                  newdiv.innerHTML = " <br><input type='text' class='form-control' name='event[]'>";
                                  counter++;
                                  break;                
    }
    document.getElementById(divName).appendChild(newdiv);
    }
    }
////////// on submit /////////
/*$("#submit").click(function(){
if (count($errors) > 0) {
  return false;
}
else {
swal({
title: "Bravo!",
text: "Nomination form has been submitted for the Admin approval.",
type: "success",
confirmButtonText: "Ok",
}); 
}  
});*/
</script>
@endsection