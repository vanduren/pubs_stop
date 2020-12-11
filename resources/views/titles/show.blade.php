        {{-- ******************************************
        Joan van Duren
        04-12-2020
        Nieuwe functionaliteit
        ****************************************** --}}
@extends('layouts.app')

@section('content')
    <a href="titles" class="btn btn-default">Ga terug naar overzicht</a>
    <h1>{{$titleFound->title}}</h1>
    <small>titelid: {{$titleFound->title_id}}</small>
    <hr>
    <table>
        <tr><td>type:</td><td>{{$titleFound->type}}</td></tr>
        <tr><td>publicatie id:</td><td>{{$titleFound->pub_id}}</td></tr>
        <tr><td>prijs:</td><td>{{$titleFound->price}}</td></tr>
        <tr><td>voorschot:</td><td>{{$titleFound->advance}}</td></tr>
        <tr><td>royalty:</td><td>{{$titleFound->royalty}}</td></tr>
        <tr><td>jaarverkopen:</td><td>{{$titleFound->ytd_sales}}</td></tr>
        <tr><td>notities:</td><td>{{$titleFound->notes}}</td></tr>
    </table>
    <a href="{{$titleFound->title_id}}/edit" class="btn btn-default">Wijzig</a>
    {!!Form::open(['action' => ['TitlesController@destroy', $titleFound->title_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection
