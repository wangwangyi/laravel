<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('title')
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="" />
    <link rel="stylesheet" href="/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="/assets/xSystem/css/xSystem.css">
    <link rel='stylesheet' href='/assets/xSystem/vendor/nprogress/nprogress.css'/>
    @yield('css')
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，目前暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>{{$company->title}}</strong> <small>后台管理系统</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            @ability('owner,self','edit-user,self')
            <li><a href="/admin/info"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">{{ count(\App\Models\Email::where("user_id",$admin->id)->with('article')->get()) }}</span></a></li>
            @endability
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="{{ url('/tease.me/logout') }}"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">


                <li><a href="/admin"><span class="am-icon-home"></span> 首页</a></li>

                @role('admin')
                <li><a href="/admin/category"><span class="am-icon-table"></span> 分类管理</a></li>
                @endrole
                @role('admin')
                <li><a href="/admin/article"><span class="am-icon-pencil-square-o"></span> 内容管理</a></li>
                <li><a href="/admin/audit/audit"><span class="am-icon-eye"></span> 待审核内容 <span class="am-badge am-badge-warning">{{ count(\App\Models\Article::pending()->get()) }}</span></a></li>
                <li><a href="/admin/audit/stop_list"><span class="am-icon-bomb"></span> 未通过内容 <span class="am-badge am-badge-warning">{{ count(\App\Models\Article::rejected()->get()) }}</span></a></li>
                @endrole
                @ability('owner,self','edit-user,self')
                <li><a href="/admin/article/consumer"><span class="am-icon-pencil-square-o"></span> 内容管理(用户组)</a></li>
                @endability
                <li class="admin-parent">
                    <a class="am-cf am-collapsed" data-am-collapse="{target: '#collapse-nav-next'}"><i class="am-icon-cog am-icon-spin"></i> 系统管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub {{$_set or ''}}" id="collapse-nav-next">
                        <li><a href="/admin/setting/change_password"><span class="am-icon-pencil"></span>修改账号密码</a></li>
                        @role('admin')
                        <li><a href="/admin/setting/author"><span class="am-icon-user-md"></span> 管理员列表</a></li>
                        @endrole
                        @role('admin')
                        <li><a href="/admin/setting/create"><span class="am-icon-user-plus"></span> 新增管理员账号</a></li>
                        @endrole
                        @role('admin')
                        <li><a href="/admin/setting/config"><span class="am-icon-briefcase"></span> 站点信息</a></li>
                        @endrole
                        <li><a href="/admin/setting/cache"><i class="am-icon-refresh am-icon-spin"></i> 清除缓存</a></li>
                    </ul>
                </li>
                @role('admin')
                <li><a href="/system/log-viewer" class="am-cf"><span class="am-success am-icon-shield"></span> 日志<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                @endrole
                @ability('owner,self','edit-user,self')
                <li><a href="/admin/comment"><span class="am-icon-pencil"></span> 留言管理(用户组)</a></li>
                @endability
                @role('admin')
                <li><a href="/admin/trash"><span class="am-icon-trash-o"></span> 回收站</a></li>
                <li class="admin-parent">
                    <a class="am-cf am-collapsed" data-am-collapse="{target: '#collapse-nav-last'}"><span class="am-icon-sun-o"></span>关于我们 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub {{$_about or ''}}" id="collapse-nav-last">
                        <li><a href="/admin/about/1"><span class="am-icon-group"></span>关于我们</a></li>
                        <li><a href="/admin/about/2"><span class="am-icon-comment"></span> 联系我们</a></li>
                        <li><a href="/admin/about/3"><span class="am-icon-envira"></span> 招贤纳士</a></li>
                        <li><a href="/admin/about/4"><span class="am-icon-anchor"></span> 法律声明</a></li>
                    </ul>
                </li>
                <li><a href="/admin/comment/all_comment"><span class="am-icon-pencil"></span> 留言管理</a></li>
                <li><a href="/admin/adv"><span class="am-icon-chrome"></span> 广告管理</a></li>
                <li><a href="/admin/flink"><span class="am-icon-edge"></span> 友情链接</a></li>
                @endrole
                <li><a href="{{ url('/tease.me/logout') }}"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告</p>
                    <p>时光静好，与君语；细水流年，与君同。</p>
                </div>
            </div>

        </div>
    </div>
    <!-- sidebar end -->

    @yield('content')

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

{{--<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->--}}


<script src="/assets/js/jquery.min.js"></script>
<script src='/assets/xSystem/vendor/nprogress/nprogress.js'></script>
<script src="/assets/js/amazeui.min.js"></script>
<script src="/assets/js/app.js"></script>
<script src="/assets/xSystem/js/laravel.js"></script>
<script src="/assets/xSystem/js/xSystem.js"></script>
@yield('js')
</body>
</html>
