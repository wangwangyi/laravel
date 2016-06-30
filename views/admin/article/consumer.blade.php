
@extends('admin.layouts.app')
@section('title')
    <title>我的商铺</title>
@endsection



    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">店铺列表</strong> / <small>List</small></div>
            </div>

            <hr>


            @include('admin.layouts._msg')
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
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
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td><a href="#">{{$article->name}}</a></td>
                                    <td>{{$article->category->name}}</td>
                                    <td class="am-hide-sm-only">{{$article->user->name}}</td>
                                    <td class="am-hide-sm-only">{{$article->updated_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                                   href="/admin/article/{{$article->id}}/show">
                                                    <span class="am-icon-pencil-square-o"></span> 编辑
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr />
                    </form>
                </div>

            </div>
        </div>


    </div>
    <!-- content end -->
@endsection
