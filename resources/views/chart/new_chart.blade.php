

@extends('layouts.app')

@section('head')
    <meta name="ch_auth_id" content="{{ Auth::user()->id }}">
@endsection

@section('content')
    <div class="container">
        <h2 class="page-header">新建榜单</h2>

        <div class="jumbotron">
            <div class="chart">

                <div class="form-group">
                    <input type="text" class="form-control ch_input" id="charName"  placeholder="请输入榜单名称">
                </div>
                <div class="form-group">
                    <textarea class="form-control ch_textarea" id="charIntro" rows="3" placeholder="简单介绍下吧?" ></textarea>
                </div>
            </div>
        </div>


        @for( $i = 0; $i != 3; $i++)
            <div class="jumbotron">
                <div class="item">
                    <div class="form-group">
                        <div class="input-group input-group">
                            <span class="input-group-addon ch_span"> {{ $i+1 }}</span>
                            <input type="text" class="form-control ch_input" name="itemName" placeholder="请输入元素名称">
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control ch_textarea" name="itemIntro" rows="3" placeholder="简单介绍下吧?" ></textarea>
                    </div>
                </div>
            </div>
        @endfor


        <button class="btn btn-success btn-block" type="submit" id="releaseChart">发布榜单</button>

        <br>


    </div>


    @push('scripts')
    <script src="/js/newchart.js"></script>
    @endpush

@endsection


