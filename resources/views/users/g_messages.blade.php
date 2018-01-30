@extends('layouts.app')

@section('content')
<style type="text/css">
    table{text-align: middle;}

th {background-color: #4CAF50;color: white;text-align: middle;
border-left:1px solid #ddd;}

tr:nth-child(even){background-color: #f2f2f2;}

td{height: 100px;width:justify;border-bottom: 1px solid #ddd;border-left:1px solid #ddd;}
</style>
    <div class = "col-md-6 col-md-offset-3">
        <h5>And we have {{$g_messages->count()}} messages in this page</h5>

        
            <table class="table">
            <tr>
                <th>Name of Guest</th>
                <th> E-mail Address</th>
                <th>Message</th>
            </tr>
            @foreach($g_messages as $message)
            <tr>
                <td>{{$message->g_name}}</td>
                <td>{{$message->g_email}}</td>
                <td>{{$message->message}}</td>
            </tr>
            @endforeach 
            </table>
             
            {{$g_messages->links() }}        

</div>
@endsection 