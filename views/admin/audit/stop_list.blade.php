
@extends('admin.layouts.app')
@section('title')
    <title>未通过审核</title>
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
    <script src="/assets/xSystem/vendor/daterangepicker/moment.js"></script>
    <script src="/assets/xSystem/vendor/moment/locale/zh-cn.js"></script>
    <script src="/assets/xSystem/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/assets/xSystem/js/daterange_config.js"></script>
    <script>
        $(function(){
            //全选,反选
            $("#CheckedAll").click(function () {
                $(':checkbox').prop("checked", this.checked);
            });


            $("#delete").click(function(){
                var length = $('.select_id:checked').length;
                if (length == 0) {
                    alert('您必须至少选择一条记录');
                    return false;
                }

                var values = $("#form").serialize();

                $.ajax({
                    type: "DELETE",
                    data: values,
                    url: "/admin/trash/select_del",
//                    dataType: "json",
                    success: function (data) {
                        location.href = location.href;
                    }
                });
            })

            $("#restore").click(function(){
                var length = $('.select_id:checked').length;
                if (length == 0) {
                    alert('您必须至少选择一条记录');
                    return false;
                }

                var values = $("#form").serialize();

                $.ajax({
                    type: "GET",
                    data: values,
                    url: "/admin/trash/select_restore",
//                    dataType: "json",
                    success: function (data) {
                        location.href = location.href;
                    }
                });
            })


        })

    </script>
@endsection