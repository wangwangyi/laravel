@extends('admin.layouts.app')
@section('title')
    <title>管理员列表</title>
    @endsection
    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">管理员列表</strong> / <small>author</small></div>
            </div>

            @include('admin.layouts._msg')
            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-striped am-table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>注册日期</th>
                            <th>管理员类型</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td><a href="#">{{$user->created_at}}</a></td>
                            <td><span class="am-badge am-badge-success">
                                    @if ($user->role_user['role_id'] == 2) 管理员 @elseif ($user->role_user['role_id'] == 1) 商户 @elseif ($user->role_user['role_id'] == 3) 自助商户 @endif
                                </span></td>
                            <td>
                                <div class="am-dropdown" data-am-dropdown>
                                    <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                       href="/admin/setting/del_user/{{$user->id}}"
                                       data-method="delete"
                                       data-token="{{csrf_token()}}" data-confirm="确定要删除吗！">
                                        <span class="am-icon-trash-o"></span> 删除
                                    </a>
                                </div>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="am-cf">
                        共 {{$count}} 条记录
                        <div class="am-fr">
                            {!! $users->links() !!}
                        </div>
                    </div>
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