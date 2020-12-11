@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de store functie van authors controller
    -->
    {!! Form::open(['action' => 'AuthorsController@store', 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('au_id', 'id')}}
            {{Form::text('au_id', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('au_fname', 'voornaam')}}
            {{Form::text('au_fname', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('au_lname', 'achternaam')}}
            {{Form::text('au_lname', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('phone', 'telefoon')}}
            {{Form::text('phone', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('address', 'adres')}}
            {{Form::text('address', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('city', 'woonplaats')}}
            {{Form::text('city', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('state', 'staat')}}
            {{Form::text('state', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('zip', 'postcode')}}
            {{Form::text('zip', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('nationality', 'nationaliteit')}}
            {{Form::text('nationality', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('contract', 'contract')}}
            {{Form::checkbox('contract')}}
        </div>
    {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
