@extends('layouts.app')

@section('content')
   
<style type="text/css">
h1{ 
 border: 2px solid #FFF;
  box-shadow: 0 3px 3px rgba(0, 0, 0, 0.5);
}
table{
  border: 1px dotted black;
  border-collapse: collapse;
}

td{
  border-bottom: 1px solid #ddd;
  text-align: center;
  height: 50px;
  width: 250px;
}
tr:hover {background-color: #f5f5f5;}
</style>
  <div class="pull-left">
                 <a href="/welcome" ><i class="fa fa-arrow-left fa-5x"></i></a> 
              </div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row">
             
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <h1 align ="center">Vote</h1>
                <h1 align ="center">Vice-President</h1>
                <label>Last day to vote:</label><h2>30th of May, 2017 </h2>
 <!-- Display the countdown timer in an element -->
 <div><label>You have remaining:</label><h2 id="demo"></h2></div> 

                @if(!Auth::user()->voted)
                <form method="post" >
                 {{ csrf_field() }}
                   <table>
                      <tr>
                      <td>Choose</td>
                      <td>Student-ID</td>
                      <td>Name</td>
                      <td>Motivation</td>
                      </tr>
                      @foreach($candidates as $candidates)
                      <tr>
                      <td><input type="radio" name="Candidates_ID" value ="{{$candidates->s_id}}"></td>
                      <td>{{$candidates->s_id}}</td>
                      <td><img src="/uploads/cimage/{{ $candidates->cimage}}" style="width:200px; height:200px;">
                      </td>
                      <td>
                      {{$candidates->reason}}
                      </td>
                      </tr>
                      @endforeach
                    </table>
                    </br>
                    <button id="submit" type="submit" class="btn-primary pull-right">Confirm Vote</button>
                </form>
                @else
             <div class="alert alert-danger">
                    <ul>
                        Sorry, you can not vote anymore! 
                    </ul>
                </div>
            @endif  
            </div>
        </div>
        
    </div>
</div>


<!-- div container table -->                   
<script type="text/javascript">
  $("#submit").click(function(){
  swal({
  title: "Thank you!",
  text: "Your vote has been submitted for the selected candidate.",
  type: "success",
  confirmButtonText: "Ok",
});  
});  
</script>

<!-- Stopwatch countdown timer -->
<script>
// Set the date we're counting down to
var countDownDate = new Date("May 30, 2017 23:59:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endsection