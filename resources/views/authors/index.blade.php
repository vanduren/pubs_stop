@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($authors)>0)
        @foreach($authors as $author)
            <div class="well well-sm">
                <a href="/pubs/authors/{{$author->au_id}}">{{$author->au_fname}} {{$author->au_lname}}</a>
            </div>
        @endforeach
        {{$authors->links()}}
    @else
        <p>Geen auteurs</p>
    @endif
@endsection