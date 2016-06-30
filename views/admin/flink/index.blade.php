@extends('admin.layouts.app')

@section('title')
    <title>友情链接</title>
@endsection
@section('css')

@endsection

@section('content')
    <div class="admin-content">


        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">友情链接</strong> /
                <small>List</small>
            </div>
        </div>
        @include('admin.layouts._msg')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a type="button" class="am-btn am-btn-default" href="{{route('admin.flink.create')}}">
                            <span class="am-icon-plus"></span> 新增
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-9">
                <table class="am-table am-table-bordered am-table-radius am-table-striped">
                    <thead>
                    <tr>
                        <th>网站名称</th>
                        <th>网址</th>
                        <th>创建时间</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($flinks as $flink)
                    <tr>
                        <td contenteditable data-id="{{$flink->id}}" class="name">{{$flink->name}}</td>
                        <td contenteditable data-id="{{$flink->id}}" class="url">{{$flink->url}}</td>
                        <td>{{$flink->created_at}}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a data-id="{{$flink->id}}" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del">
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
                        {!! $flinks->links() !!}
                    </div>
                </div>
                </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $(".url").blur(function(){
                var info = {
                    id: $(this).data("id"),
                    url: $(this).text()
                }
                console.log(info);
                $.ajax({
                    type: "PATCH",
                    data: info,
                    url: "/admin/flink/url",
                });
            })


            $(".name").blur(function(){
                var info = {
                    id: $(this).data("id"),
                    name: $(this).text()
                }
                console.log(info);
                $.ajax({
                    type: "PATCH",
                    data: info,
                    url: "/admin/flink/name",
                });
            })

            $(".del").click(function(){
                var _this = $(this);
                $.ajax({
                    type: "delete",
                    url: "/admin/flink/delete",
                    data: {flink_id: _this.data('id')},
                    success: function () {
                        _this.parent().parent().parent().parent().fadeOut(600);
                    }
                })
            })


            })
    </script>
    @endsection