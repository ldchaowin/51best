
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="well well-sm">
        <h3>{{$chart->name}}</h3>
        <span id="chart_id" style="display: none"> {{$chart->id}}</span>
        <hr>
        <p>
            {{$chart->introduction}}
        </p>
    </div>

    <div class="jumbotron element">
        <div class="item">
            <div class="form-group">
                <div class="input-group input-group">
                    <span class="input-group-addon ch_span"> {{ $chart->item_num +1 }}</span>
                    <input type="text" class="form-control ch_input" id="itemName"name="itemName" placeholder="请输入元素名称">
                </div>
            </div>

            <div class="form-group">
                <textarea class="form-control ch_textarea" id="itemIntro"name="itemIntro" rows="3" placeholder="简单介绍下吧?" ></textarea>
            </div>
        </div>
    </div>


    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-default"  id="addItem">添加元素</button>
    </div>


</div>


@push('scripts')
<script src="/js/addItem.js"></script>
@endpush


@endsection