@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de update functie van authors controller
    -->
    {!! Form::open(['action' => ['AuthorsController@update', $author->au_id], 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('au_id', 'id')}}
            {{Form::text('au_id', $author->au_id, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('au_fname', 'naam')}}
                {{Form::text('au_fname', $author->au_fname, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('au_lname', 'achternaam')}}
            {{Form::text('au_lname', $author->au_lname, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('phone', 'telefoon')}}
            {{Form::text('phone', $author->phone, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('address', 'adres')}}
            {{Form::text('address', $author->address, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('city', 'woonplaats')}}
            {{Form::text('city', $author->city, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('state', 'staat')}}
            {{Form::text('state', $author->state, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('zip', 'postcode')}}
            {{Form::text('zip', $author->zip, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('nationality', 'nationaliteit')}}
            {{Form::text('nationality', $author->nationality, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('contract', 'contract')}}
            {{Form::checkbox('contract', null, $author->contract)}}
        </div>        <!-- Een hidden form element om een PUT actie te spoofen
        Hierdoor kunnen we de ROUTE PUT gebruiken (zie  'php artisan route: list')
        -->
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
