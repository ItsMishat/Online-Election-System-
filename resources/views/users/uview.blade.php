
@extends('layouts.app')

@section('content')
<div class= "row">
    <div class = "col-md-6 col-md-offset-3">
        <h3>{{ $users->total()}} total users</h3>
        <h5>And we have {{$users->count()}} users in this page</h5>
        <ul class = "list-group">

        @foreach($users as $user)
            <li class ="list-group-item" style ="margin-top:30px" >
                    <span>
                    {{$user->name}}
                    </span> 
                                <span class="pull-right clearfix ">
                                Joined at: {{$user-> created_at}} 
                                </span>

            </li>
            @endforeach 
            {{$users->links() }}        
            </ul>
    </div>
</div>
@endsection 