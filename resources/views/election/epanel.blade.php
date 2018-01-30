@extends('layouts.app')

@section('content')
<style type="text/css">
table{text-align: middle;}

th {background-color: #4CAF50;color: white;text-align: middle;
border-left:1px solid #ddd;}

tr:nth-child(even){background-color: #f2f2f2;}

td{height: 100px;width:justify;border-bottom: 1px solid #ddd;border-left:1px solid #ddd;}
h1{
  border: 2px solid #FFF;
  box-shadow: 0 3px 3px rgba(0, 0, 0, 0.5);
}
#panel{
box-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
}
</style>  
        <!-- create election -->

        </br>

    @if (count($candidates) < 2)
    <div class="alert alert-danger">
     <!--    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> -->
      Sorry, you shall have at least two eligible candidates to declare an election.
    </div>
    @endif
      <div class="container">
          <div class="row">
            <div class="panel">
              <h1 class=" text-center panel-heading alert-success">Create an Election</h1>
              <div class="panel-body">
                
        <form class="form-horizontal" role="form" method="POST">
        {{ csrf_field() }}
             <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                <label for="post" class="col-md-4 control-label">Election for the post</label>
                  <div class="col-md-6">
                                <select class="select form-control" id="select" name="position">
                                   <option value="President">
                                    President
                                   </option>
                                   <option value="Vice-President">
                                    Vice-President
                                   </option>
                                </select>
                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                <div class="form-group{{ $errors->has('nomination') ? ' has-error' : '' }}">
                <label for="nomination" class="col-md-4 control-label">Nominations are</label>
                  <div class="col-md-6">
                      <!-- <input id="nomination" type="text" class="form-control" value="{{ old('id') }}" required autofocus> -->
                    @foreach($candidates as $cons)
                    <span class="form-control">{{$cons->s_id}}</span>
                    @endforeach
                                @if ($errors->has('nomination'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomination') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group{{ $errors->has('begins_at') ? ' has-error' : '' }}">
                <label for="begins_at" class="col-md-4 control-label">Election begins at</label>
                  <div class="col-md-6">
                      <input id="begins_at" name="begins_at" type="datetime-local" class="form-control">

                                @if ($errors->has('begins_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('begins_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      <div class="form-group{{ $errors->has('ends_at') ? ' has-error' : '' }}">
                <label for="ends_at" class="col-md-4 control-label">Ends at</label>
                  <div class="col-md-6">
                      <input id="ends_at" type="datetime-local" name="ends_at" class="form-control">

                                @if ($errors->has('ends_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ends_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Create Election
                                </button>
                            </div>

        </form></br></br>
              </div>
            </div>
          </div>
        </div>


        <div class="container">
          <div class="row">
            <div class="panel">
              <h1 class=" text-center panel-heading alert-success">Ongoing Election</h1>
              @foreach($elections as $election)
              <div id="panel" class="panel-body">
                  <div class="col-md-6">
                  <label for="election_id" class="col-md-4 ">Election ID</label>
                  <span class="text-center">{{$election->id}}</span>
                  </div>

                 
                    <div class="col-md-6">
                    <label for="candidates" class="col-md-4 ">Candidates are</label> 
                  @foreach($candidates as $cans)
                  <span class="text-center">{{$cons->s_id}}</span></br>
                  @endforeach
                  </div>
                    
                  
                  <div class="col-md-6">
                  <label for="begins_at" class="col-md-4 ">Begins at</label>
                  <span class="text-center">{{$election->begins_at}}</span>
                  </div>

                  
                  <div class="col-md-6">
                  <label for="Ends_at" class="col-md-4">Ends at</label>
                  <span class="text-center">{{$election->ends_at}}</span>
                  </div>
               </div> 
              @endforeach
            </div>
          </div>
        </div>
@endsection
