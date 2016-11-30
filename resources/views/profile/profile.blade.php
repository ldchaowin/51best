@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="headimage">
        <img  class="center-block img-circle img-head"src="/images/default.jpeg" alt="头像" >
    </div>
    <p class="text-center">ldchao</p>
    <p class="text-center">ldchao is a good people.</p>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li role="presentation" class="active"><a href="#home" role="tab" data-toggle="tab">我的榜单</a></li>
        <li role="presentation"><a href="#profile" role="tab" data-toggle="tab">我的元素</a></li>
        <li role="presentation"><a href="#messages" role="tab" data-toggle="tab">收藏的榜单</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">我的榜单</div>
        <div role="tabpanel" class="tab-pane" id="profile">我的元素</div>
        <div role="tabpanel" class="tab-pane" id="messages">收藏的元素</div>

    </div>

</div>


@endsection