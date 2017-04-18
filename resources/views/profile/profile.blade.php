@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="headimage">
        <img  class="center-block img-circle img-head"src="/images/default.png" alt="头像" >
    </div>
    <p class="text-center">{{ Auth::user()->name }}</p>
    <hr>

    <a href="/profile/myChart" class="btn btn-default btn-lg btn-block">我的榜单</a>
    <a href="/profile/myItem" class="btn btn-default btn-lg btn-block">我的元素</a>
    <a href="/profile/myLike" class="btn btn-default btn-lg btn-block">收藏的榜单</a>

</div>


@endsection