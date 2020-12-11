{{-- // ******************************************
// Joan van Duren
// 04-12-2020
// Nieuwe functionaliteit
// ****************************************** --}}
@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de store functie van titles controller
    -->
    {!! Form::open(['action' => 'TitlesController@store', 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('title_id', 'id')}}
            {{Form::text('title_id', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('title', 'titel')}}
            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('type', 'type')}}
            {{Form::text('type', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('pub_id', 'publicatie id')}}
            {{Form::text('pub_id', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('price', 'prijs')}}
            {{Form::text('price', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('advance', 'voorschot')}}
            {{Form::text('advance', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('royalty', 'royalty')}}
            {{Form::text('royalty', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('ytd_sales', 'jaarverkopen')}}
            {{Form::text('ytd_sales', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('notes', 'notities')}}
            {{Form::text('notes', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
    {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
