
@extends('admin.layouts.app')
@section('title')
    <title>广告管理</title>
    @endsection
    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">分类</strong> / <small>Category</small></div>
            </div>

            <hr>
            @include('admin.layouts._msg')
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a type="button" class="am-btn am-btn-default" href="{{route('admin.adv.create')}}">
                                <span class="am-icon-plus"></span> 新增
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">广告名称</th>
                                <th class="table-title">广告位置</th>
                                <th class="table-date am-hide-sm-only">发布日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($advs as $adv)
                                <tr>
                                    <td>{{$adv->id}}</td>
                                    <td>{{$adv->name}}</td>
                                    <td>{{$adv->place->name}}</td>
                                    <td class="am-hide-sm-only">{{$adv->created_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                                   href="{{route('admin.adv.edit', $adv->id)}}">
                                                    <span class="am-icon-pencil-square-o"></span> 编辑
                                                </a>

                                                <a data-id="{{$adv->id}}" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del">
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
            $(".del").click(function(){
                var _this = $(this);
                $.ajax({
                    type: "delete",
                    url: "/admin/adv/delete",
                    data: {adv_id: _this.data('id')},
                    success: function () {
                        _this.parent().parent().parent().parent().fadeOut(600);
                    }
                })
            })
        })
    </script>
@endsection