@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="list-group">
            @foreach($charts as $chart)
                <a href="/chart/{{$chart->id}}" class="list-group-item">
                    <h4 class="list-group-item-heading">{{ $chart->name }}</h4>
                    <p class="list-group-item-text">{{ $chart->introduction }}</p>
                </a>
            @endforeach
        </div>


        {{$charts->render()}}
    </div>



@endsection