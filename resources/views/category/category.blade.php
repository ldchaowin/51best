@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="categoryList">
            @foreach($categories as $category)
            <div class="col-md-3 category">
                <h4>{{$category->name}}</h4>
            </div>
            @endforeach
        </div>
    </div>




@endsection