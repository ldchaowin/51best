@extends('layouts.app')




@section('content')
<div class="container">
   <div class="well well-sm">
      <h3>{{$chart->name}}</h3>
      <span id="chart_id" style="display: none"> {{$chart->id}}</span>
      <div class="inline-block">
         榜主:{{$chart_owner->name}}

         <!-- Go to www.addthis.com/dashboard to customize your tools -->
         <div style="float:right">

         @if(  $isLiked == false )
               <button  id="like" type="button" class="btn btn-primary btn-xs like">收藏</button>
         @else
               <button  id="like" type="button" class="btn btn-primary btn-xs like">已收藏</button>

         @endif
               <button id="addElement" class="btn btn-default btn-xs">添加元素</button>


         </div>
      </div>
      <hr>
      <p>
         {{$chart->introduction}}
      </p>
   </div>


   @for($i = 0 ; $i != count($items); $i++)
      <div class="well well-sm">
         <a href="{{ URL::to('chart/'.$chart->id.'/'.$items[$i]->id) }}">{{$i+1}} {{$items[$i]->name}}</a>
         <p>{{$items[$i]->introduction}}</p>
      </div>
   @endfor



</div>



@push('scripts')
<script src="/js/showChart.js"></script>
@endpush




@endsection