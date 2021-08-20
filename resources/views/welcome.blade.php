@extends('layouts.master')

@section('content')
<table border = 2 class="table table-bordered border-primary">
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>Content</th>
    <th>Posted by</th>
    <th colspan = 3> <center>Actions</center></th>
</tr>


@if(count($data) > 0)
    
        @for ($i = 0; $i < count($data); $i++)
        <tr>
            <td>{{$data[$i]['id']}}</td>
            <td>{{$data[$i]['title']}}</td>
            <td>{{$data[$i]['content']}}</td>
            <td>{{$data[$i]['posted_by']   }}    </td>
            <td>

                <a href="/posts/{{$data[$i]['id']}}" class="btn btn-primary">View</a> 
            
            </td>
                                
            <td>    
                <a href="/posts/{{$data[$i]['id']}}/edit" class="btn btn-info">Edit</a> 
                
            </td>
            <td> 
                 <form action="/posts/{{$data[$i]['id']}}" method="post">
                     @csrf
                     @method('DELETE')
                         <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
            </td>
        </tr>
        @endfor
@endif
</table>
<center><a href="/posts/create" class="btn btn-primary"> Add </a></center>
@stop

