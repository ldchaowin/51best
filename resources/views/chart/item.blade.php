@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="well well-sm">
            <h3>{{$chart->name}}</h3>
        </div>
        <div class="well well-sm">
            <a>{{$item->ranking}}{{$item->name}}</a>
            <p>{{$item->introduction}}</p>
        </div>

    </div>
@endsection