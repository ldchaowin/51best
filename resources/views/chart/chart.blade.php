@extends('layouts.app')




@section('content')
<div class="container">
   <div class="well well-sm">
      <h3>{{$chart->name}}</h3>
      <div class="inline-block">
         由{{$chart_owner->name}}创建

         <!-- Go to www.addthis.com/dashboard to customize your tools -->
         <div style="float:right">
            <span>添加元素</span>
            <span>收藏榜单</span>
         </div>
      </div>
      <hr>
      <p>
         {{$chart->introduction}}
      </p>
   </div>

   @for($i = 0 ; $i != count($items); $i++)
      <div class="well well-sm">
         {{$i+1}} {{$items[$i]->name}}
         <p>{{$items[$i]->introduction}}</p>
      </div>
   @endfor






</div>


@endsection