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


@if(count($posts) > 0)
    
        @for ($i = 0; $i < count($posts); $i++)
        <tr>
            <td>{{$posts[$i]['id']}}</td>
            <td>{{$posts[$i]['title']}}</td>
            <td>{{$posts[$i]['content']}}</td>
            <td>{{$posts[$i]['posted_by']}}</td>
            <td>

                <a href="/posts/{{$posts[$i]['id']}}" class="btn btn-primary">View</a> 
            
            </td>
                                
            <td>    
                <a href="/posts/{{$posts[$i]['id']}}/edit" class="btn btn-info">Edit</a> 
                
            </td>
            <td> 
                 <form action="/posts/{{$posts[$i]['id']}}" method="post">
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

