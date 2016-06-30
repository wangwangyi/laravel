
@extends('admin.layouts.app')
@section('title')
    <title>待审核内容</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/assets/xSystem/vendor/daterangepicker/daterangepicker.css">
    @endsection

    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">审核列表</strong> / <small>Audit</small></div>
            </div>

            <hr>

            @include('admin.layouts._msg')
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form" id="form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>

                                <th class="table-id">ID</th>
                                <th class="table-title">标题</th>
                                <th class="table-date am-hide-sm-only">发布日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($articles as $article)
                                <tr data-id="{{$article->id}}">
                                    <td>{{$article->id}}</td>
                                    <td><a href="#">{{$article->name}}</a></td>

                                    <td class="am-hide-sm-only">{{$article->created_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                                   href="/admin/audit/{{$article->id}}/show">
                                                    <span class="am-icon-book"></span> 查看详情
                                                </a>

                                                <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                                   href="/admin/audit/{{$article->id}}/pass">
                                                    <span class="am-icon-unlock"></span> 通过
                                                </a>
                                                <a data-id="{{$article->id}}" class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                                   href="/admin/audit/{{$article->id}}/stop"
                                                    >
                                                     <span class="am-icon-unlock-alt"></span> 不通过
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                           {{-- 共 {{$count}} 条记录--}}
                            <div class="am-fr">
                               {{-- {!! $articles->appends(Request::all())->links() !!}--}}
                            </div>
                        </div>
                        <hr />
                    </form>
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
   <script>
       $(function() {


       });
   </script>



@endsection