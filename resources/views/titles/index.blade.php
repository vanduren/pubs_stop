@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($titles)>0)
        @foreach($titles as $titel)
            <div class="well well-sm">
                <a href="titles/{{$titel->title_id}}">{{$titel->title}}</a>
            </div>
        @endforeach
        {{$titles->links()}}
    @else
        <p>Geen titels</p>
    @endif
@endsection
