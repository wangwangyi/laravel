
@extends('admin.layouts.app')
@section('title')
    <title>内容回收站</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/assets/xSystem/vendor/daterangepicker/daterangepicker.css">
    @endsection

    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">回收站列表</strong> / <small>Trash</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" class="am-btn am-btn-default" id="delete"><span class="am-icon-trash-o"></span> 多选删除</button>
                            <button type="button" class="am-btn am-btn-default" id="restore"><span class="am-icon-upload"></span> 多选还原</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-12">
                    <form class="am-form-inline" role="form" method="get">

                        <div class="am-form-group">
                            <input type="text" name="name" class="am-form-field am-input-sm" placeholder="店名" value="{{ Request::input('name') }}">
                        </div>

                        <div class="am-form-group">
                            <input type="text" id="created_at" placeholder="选择时间日期" name="created_at"
                                   value="{{ Request::input('created_at') }}" class="am-form-field am-input-sm"/>
                        </div>

                        <button class="am-btn am-btn-default" type="submit">搜索</button>
                    </form>
                </div>
            </div>





            @include('admin.layouts._msg')
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form" id="form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox" id="CheckedAll"/></th>
                                <th class="table-id">ID</th>
                                <th class="table-title">标题</th>
                                <th class="table-type">所属分类</th>
                                <th class="table-author am-hide-sm-only">店主</th>
                                <th class="table-date am-hide-sm-only">修改日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($articles as $article)
                                <tr data-id="{{$article->id}}">
                                    <td><input type="checkbox" type="checkbox" value="{{$article->id}}" class="select_id"
                                               name="select_id[]"/></td>
                                    <td>{{$article->id}}</td>
                                    <td><a href="#">{{$article->name}}</a></td>
                                    <td>{{$article->category->name}}</td>
                                    <td class="am-hide-sm-only">{{$article->user->name}}</td>

                                    <td class="am-hide-sm-only">{{$article->updated_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                                   href="/admin/trash/{{$article->id}}/restore">
                                                    <span class="am-icon-upload"></span> 还原
                                                </a>

                                                <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                                   href="/admin/trash/{{ $article->id}}/forceDelete"
                                                   data-method="delete"
                                                   data-token="{{csrf_token()}}" data-confirm="确认删除吗?">
                                                    <span class="am-icon-trash-o"></span> 删除
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 {{$count}} 条记录
                            <div class="am-fr">
                                {!! $articles->appends(Request::all())->links() !!}
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