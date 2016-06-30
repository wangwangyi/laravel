@extends('admin.layouts.app')
@section('title')
    <title>登陆日志</title>
    @endsection
    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">登陆日志</strong> / <small>Log</small></div>
            </div>

            <hr/>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
                </div>

                <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                    @include('admin.layouts._msg')
                </div>
                <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

                </div>
            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© {{$time}} {{$company->company}}.</p>
        </footer>

    </div>
    <!-- content end -->
@endsection