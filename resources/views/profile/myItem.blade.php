@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="list-group">
            @foreach($items as $item)
                <a>
                    <h4 class="list-group-item-heading">{{ $item->name }}</h4>
                    <p class="list-group-item-text">{{ $item->introduction }}</p>
                </a>

            @endforeach
        </div>

        {{$items->render()}}

    </div>



@endsection