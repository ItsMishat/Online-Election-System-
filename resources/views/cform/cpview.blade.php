@extends('layouts.app')

@section('content')

 
   <div class="container panel-heading">
     <h3 align="middle">Candidate Forms for the position of President</h3>
       <h5 align="middle">Total {{$cforms->total()}} forms for the position of president</h5>
   </div>
          
<style type="text/css">
table{text-align: middle;}

th {background-color: #4CAF50;color: white;text-align: middle;
border-left:1px solid #ddd;}

tr:nth-child(even){background-color: #f2f2f2;}

td{height: 100px;width:justify;border-bottom: 1px solid #ddd;border-left:1px solid #ddd;}
.scrollToTop{
  padding:10px; 
  text-align:center; 
  background: #E7B2B2;
  font-weight: bold;
  color: #444;
  text-decoration: none;
  position:fixed;
  top:75px;
  right:40px;
  display: none;
}
.scrollToTop:hover{
  text-decoration:none;
}
</style>

        <div class="container">
        <div>
        <h3 align="center" class="alert-success">And we already have {{$candidates->count()}} eligible candidates </h3>
           @unless($candidates->count())
              <h1>There are no candidates for this position until now!</h1>
              @else 
              <table>
                <thead>
                  <th  font-weight="bold"> Student-ID</th>
                  <th  font-weight="bold"> CGPA</th>
                  <th  font-weight="bold"> Avatar</th>
                  <th  font-weight="bold"> Learned Programming Languages</th>
                  <th  font-weight="bold"> Completed Projects</th>
                  <th  font-weight="bold"> Attended events with details</th>
                  <th  font-weight="bold"> Motivation</th>
                  <th  font-weight="bold"> Uploaded file</th>
                  <th  font-weight="bold"> Form submitted at</th>
                </thead>

                @foreach($candidates as $candidates)               
                <tr>  
                <td>{{$candidates->s_id}}</td>
                <td>{{$candidates->cgpa}}</td>
                <td><img src="/uploads/cimage/{{ $candidates->cimage}}" style="width:200px; height:200px;"></td>
                <td>{{$candidates->planguage}}</td> 
                <td>{{$candidates->cproject}}</td>
                <td>{{$candidates->event}}</td>
                <td>{{$candidates->reason}}</td>
                <td><a href="../uploads/docs/{{$candidates->docs}}">{{$candidates->docs}}</a></td>
                <td>{{$candidates->created_at}}</td>
                </tr>
                @endforeach
              </table>
              @endunless  
        </div>

        </div></br></br>



<div class="container">
<div class="row">
<div class="panel">
<div class="panel-heading text-center alert-success">Applicants</div>
    <div class="form">
</br>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <form id="cforms" method="post">
             {{ csrf_field() }}             
              @unless($cforms->count())
              <h1>There are no forms submitted yet!</h1>
              @else 
              <table>
                <thead>
                  <th  font-weight="bold"> Select</th>
                  <th  font-weight="bold"> Student-ID</th>
                  <th  font-weight="bold"> CGPA</th>
                  <th  font-weight="bold"> Avatar</th>
                  <th  font-weight="bold"> Learned Programming Languages</th>
                  <th  font-weight="bold"> Completed Projects</th>
                  <th  font-weight="bold"> Attended events with details</th>
                  <th  font-weight="bold"> Motivation</th>
                  <th  font-weight="bold"> Uploaded file</th>
                  <th  font-weight="bold"> Form submitted at</th>
                </thead>

                @foreach($cforms as $candidates)                 
                <tr>  
                <td>
                <input type="checkbox" id="checkbox" name="Candidates_ID" value= "{{$candidates->s_id}}">
                </td>
                <td>{{$candidates->s_id}}</td>
                <td>{{$candidates->cgpa}}</td>
                <td><img src="/uploads/cimage/{{ $candidates->cimage}}" style="width:200px; height:200px;"></td>
                <td>{{$candidates->planguage}}</td> 
                <td>{{$candidates->cproject}}</td>
                <td>{{$candidates->event}}</td>
                <td>{{$candidates->reason}}</td>
                <td><a href="../uploads/docs/{{$candidates->docs}}">{{$candidates->docs}}</a></td>
                <td>{{$candidates->created_at}}</td>
                </tr>
                @endforeach
              </table></br>

                <h3 id="log1">
                </h3>
                <h3 id="log2" class="alert-success">
                </h3>
                </br>
                <button form="cforms" type="submit"  class="btn btn-success btn-md pull-right" title="submit">Submit</button> 
              {{$cforms->links()}}
             @endunless
      </form>

</div>
  
</div>
<a href="#" class="scrollToTop">Scroll To Top</a>
</div> 
</div>
<br>

<script type="text/javascript">

///////////To limit the number of selections among candidates/////////
$('input[type=checkbox]').click(function(e){
if ($('input[type=checkbox]:checked').length > 1) {
$(this).prop('checked', false)
swal({
  title: "Sorry!",
  text: "You can not select more than one candidate at a time.",
  type: "warning",
  confirmButtonText: "Ok",
});
}
});

//////////To show the checked candidates/////////////
$('input[type=checkbox]' ).on( "click", function() {
    var checked, checkedValues = new Array();
    checked = $("input[type=checkbox]:checked");
    var checkedValues = checked.map(function(i) { return $(this).val() }).get();

  $( "#log1" ).html(  " Checked" + " " + checked.length + " " + "forms" );

      if (checked.length) {
        var str = checkedValues.join();
        $("#log2").html( "You have selected candidates having Student-ID:" + " </br> " + str +  " </br> ");
         }
        else {
            $("#log2").html("No Values");
        }
});
/////////////To prevent submitting the form if no candidate is selected/////////

$("button").on("click", function(){
  var checked = $("input[type=checkbox]:checked");

   if(checked.length < 1)
  {
    swal({
      title: "Error!",
      text: "You must select a candidate to submit the form",
      type: "warning",
      confirmButtonText: "Ok",
    });
    return false;
  }
});

/////////// scroll ////////
$(document).ready(function(){
  
  //Check to see if the window is top if not then display button
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });
  
  //Click event to scroll to top
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  }); 
});
///////////////onsubmit/////////

      $("button").on("submit",function() {
              swal({
                  title: "Thank you!",
                  text: "Candidates have been succesfully added",
                  type: "success",
                  confirmButtonText: "Ok",
                });  
            });
</script>
@endsection 
 
 