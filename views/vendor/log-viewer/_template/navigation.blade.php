<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/admin" class="navbar-brand">
                <i class="fa fa-fw fa-book"></i> 众信天成
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{ Route::is('log-viewer::dashboard') ? 'active' : '' }}">
                <a href="{{ route('log-viewer::dashboard') }}">
                    <i class="fa fa-dashboard"></i> 控制面板
                </a>
            </li>
            <li class="{{ Route::is('log-viewer::logs.list') ? 'active' : '' }}">
                <a href="{{ route('log-viewer::logs.list') }}">
                    <i class="fa fa-archive"></i> 日志
                </a>
            </li>
        </ul>
    </div>
</nav>