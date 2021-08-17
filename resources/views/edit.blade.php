@extends('layouts.master')

@section('content')
<form action="/posts/{{$post['id']}}" method="POST">
@csrf
@method('PUT')

    <table class="table table-striped">
        <tr>
            <td>title</td>
            <td><input type="text" name="title" value="{{$post['title']}}"></td>
        </tr>

        <tr>
            <td>content</td>
            <td><input type="text" name="content" value="{{$post['content']}}"></td>
        </tr>

        <tr>
            <td>posted by</td>
            <td><input type="text" name="posted_by" value="{{$post['posted_by']}}"></td>
        </tr>

        <tr>
            <td> <input type="submit" value="Add"> </td>
        </tr>
    </table>
</form>
@stop