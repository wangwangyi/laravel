
@extends('admin.layouts.app')
@section('title')
    <title>留言管理</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/assets/xSystem/vendor/daterangepicker/daterangepicker.css">
    @endsection

    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">留言</strong> / <small>Comment</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" class="am-btn am-btn-default" id="destroy_checked"><span class="am-icon-trash-o"></span> 多选删除</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-12">
                    <form class="am-form-inline" role="form" method="get">

                        <div class="am-form-group">
                            <input type="text" name="username" class="am-form-field am-input-sm" placeholder="用户名" value="{{ Request::input('username') }}">
                        </div>

                        <div class="am-form-group">
                            <input type="text" name="tel" class="am-form-field am-input-sm" placeholder="手机号码" value="{{ Request::input('tel') }}">
                        </div>

                        <div class="am-form-group">
                            <input type="text" name="qq" class="am-form-field am-input-sm" placeholder="QQ号" value="{{ Request::input('qq') }}">
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
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox" id="CheckedAll"/></th>
                                <th class="table-id">ID</th>
                                <th class="table-author am-hide-sm-only">用户名</th>
                                <th class="table-type">手机号码</th>
                                <th class="table-title">留言内容</th>
                                <th class="table-date am-hide-sm-only">留言日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($comments as $comment)
                                <tr data-id="{{$comment->id}}">
                                    <td><input type="checkbox" type="checkbox" value="{{$comment->id}}" class="checked_id"
                                               name="checked_id[]"/></td>
                                    <td>{{$comment->id}}</td>
                                    <td><a href="#">{{$comment->username}}</a></td>
                                    <td class="am-hide-sm-only">{{$comment->tel}}</td>
                                    <td class="am-hide-sm-only">{{substr($comment->content,0,30)}}</td>
                                    <td class="am-hide-sm-only">{{$comment->created_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                                   href="{{route('admin.comment.show', $comment->id)}}">
                                                    <span class="am-icon-pencil-square-o"></span> 查看
                                                </a>

                                                <a data-id="{{$comment->id}}" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del">
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
                                {!! $comments->appends(Request::all())->links() !!}
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
        $(function(){
            //全选,反选
            $("#CheckedAll").click(function () {
                $(':checkbox').prop("checked", this.checked);
            });

            $(".del").click(function(){
                var _this = $(this);
                $.ajax({
                    type: "delete",
                    url: "/admin/comment/delete",
                    data: {comment_id: _this.data('id')},
                    success: function () {
                        _this.parent().parent().parent().parent().fadeOut(600);
                    }
                })
            })


            //删除所选
            $('#destroy_checked').click(function () {
                var length = $(".checked_id:checked").length;
                if (length == 0) {
                    alert("您必须至少选中一条!");
                    return false;
                }

                var checked_id = $(".checked_id:checked").serialize();

                $.ajax({
                    type: "DELETE",
                    url: "/admin/comment/destroy_checked",
                    data: checked_id,
                    success: function () {
                        location.href = location.href;
                    }
                });
            });


        })

    </script>
@endsection