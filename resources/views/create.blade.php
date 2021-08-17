@extends('layouts.master')

@section('content')
<form action="/posts" method="POST">
@csrf
    <table class="table table-striped">
        <tr>
            <td>title</td>
            <td><input type="text" name="title"></td>
        </tr>

        <tr>
            <td>content</td>
            <td><input type="text" name="content"></td>
        </tr>

        <tr>
            <td>posted by</td>
            <td><input type="text" name="posted_by"></td>
        </tr>

        <tr>
            <td> <input type="submit" value="Add"> </td>
        </tr>
    </table>
</form>
@stop