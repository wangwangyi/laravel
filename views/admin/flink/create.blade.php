@extends('admin.layouts.app')

@section('title')
    <title>新增友情链接</title>
@endsection
@section('css')

@endsection

@section('content')
    <div class="admin-content">

        @include('admin.layouts._msg')
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增友情链接</strong> /
                <small>Create A New Flink</small>
            </div>
        </div>


        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">
                <form class="am-form" action="{{ route('admin.flink.store') }}" method="post">
                    {!! csrf_field() !!}

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            名称
                        </div>
                        <div class="am-u-sm-8 am-u-md-4">
                            <input type="text" class="am-input-sm" name="name">
                        </div>
                        <div class="am-hide-sm-only am-u-md-6"></div>
                    </div>


                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            链接
                        </div>
                        <div class="am-u-sm-8 am-u-md-4">
                            <input type="url" class="am-input-sm" name="url">
                        </div>
                        <div class="am-hide-sm-only am-u-md-6"></div>
                    </div>



                    <div class="am-margin-top">
                        <button type="submit" class="am-btn am-btn-primary am-radius">提交保存</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection