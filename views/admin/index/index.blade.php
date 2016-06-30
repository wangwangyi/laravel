@extends('admin.layouts.app')
@section('title')
<title>后台首页</title>
@endsection
@section('content')
<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding">
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home am-icon-lg">首页</a></li>
            </ol>
        </div>

        <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
            <li><a href="javascript:void(0);" class="am-text-danger"><span class="am-icon-btn am-icon-television"></span><br/>招商<br/>{{ \App\Models\Article::count() }}</a></li>
            <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-archive"></span><br/>分类<br/>{{ \App\Models\Category::count() }}</a></li>
            <li><a href="/admin/setting/clear_cache" class="am-text-danger"><i class="am-icon-btn am-icon-refresh am-icon-spin"></i><br/>清除缓存<br/></a></li>
            <li><a href="javascript:void(0);" class="am-text-secondary"><span class="am-icon-btn am-icon-edge"></span><br/>广告位<br/>{{ \App\Models\Adv::count() }}</a></li>
        </ul>

        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>

        <div class="am-g">
            <div class="am-u-sm-6">
                <div id="top" style="width:700px;height:500px;"></div>
            </div>

            <div class="am-u-sm-6">
                <div id="sales_amount" style="width: 700px;height:500px;"></div>
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
@section('js')
    <script src="/assets/xSystem/js/visual/echarts.js"></script>
    <script src="/assets/xSystem/js/visual/macarons.js"></script>
    <script src="/assets/xSystem/js/visual/top.js"></script>
    <script src="/assets/xSystem/js/visual/sales_amount.js"></script>

    @endsection
