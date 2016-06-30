
@extends('admin.layouts.app')
@section('title')
    <title>分类管理</title>
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
                        <a type="button" class="am-btn am-btn-default" href="{{route('admin.category.create')}}">
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
                            <th class="table-title">分类名称</th>
                            <th class="table-date am-hide-sm-only">修改日期</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td class="parent" id="row_{{$category->id}}">{{$category->name}}</td>
                            <td class="am-hide-sm-only">{{$category->updated_at}}</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                           href="{{route('admin.category.edit', $category->id)}}">
                                            <span class="am-icon-pencil-square-o"></span> 编辑
                                        </a>

                                        <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                           href="{{route('admin.category.destroy', $category->id)}}"
                                           data-method="delete"
                                           data-token="{{csrf_token()}}" data-confirm="确认删除吗?">
                                            <span class="am-icon-trash-o"></span> 删除
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @foreach ($category['children'] as $cate)
                            <tr class="child_row_{{$cate->parent_id}}">
                                <td>{{$cate->id}}</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</td>
                                <td class="am-hide-sm-only">{{$cate->updated_at}}</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                               href="{{route('admin.category.edit', $cate->id)}}">
                                                <span class="am-icon-pencil-square-o"></span> 编辑
                                            </a>

                                            <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                               href="{{route('admin.category.destroy', $cate->id)}}"
                                               data-method="delete"
                                               data-token="{{csrf_token()}}" data-confirm="确认删除吗?">
                                                <span class="am-icon-trash-o"></span> 删除
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
            //展开与折叠表格
            $('td.parent').click(function(){   // 获取所谓的父行
                $(this).parent('tr').siblings('.child_'+this.id).toggle();  // 隐藏/显示所谓的子行
            }).click();
        })
    </script>
    @endsection