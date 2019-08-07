@extends('layouts.app')

@section('content')
    <a href="/pubs/authors" class="btn btn-default">Ga terug naar overzicht</a>
    <h1>{{$author->au_fname}} {{$author->au_lname}}</h1>
    <small>auteursid: {{$author->au_id}}</small>
    <hr>
    <table>
        <tr><td>adres:</td><td>{{$author->address}}</td></tr>
        <tr><td>plaats:</td><td>{{$author->address}}</td></tr>
        <tr><td>telefoon:</td><td>{{$author->phone}}</td></tr>
        <tr><td>staat:</td><td>{{$author->state}}</td></tr>
        <tr><td>contract:</td><td>{{$author->contract}}</td></tr>
    </table>
    <a href="/pubs/authors/{{$author->au_id}}/edit" class="btn btn-default">Wijzig</a>
    {!!Form::open(['action' => ['AuthorsController@destroy', $author->au_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection