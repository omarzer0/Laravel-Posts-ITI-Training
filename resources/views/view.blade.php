@extends('layouts.master')

@section('content')

<ul class="list-group">
    <li class="list-group-item">{{$post['id']}}</li>
    <li class="list-group-item">{{$post['title']}}</li>
    <li class="list-group-item">{{$post['content']}}</li>
    <li class="list-group-item">{{$post['posted_by']}}</li>
</ul>
@stop