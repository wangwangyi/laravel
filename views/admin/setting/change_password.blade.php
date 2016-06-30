@extends('admin.layouts.app')
@section('title')
    <title>修改密码</title>
    @endsection
    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">修改密码</strong> / <small>Change Password</small></div>
            </div>

            <hr/>

            <div class="am-g">
              <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8"></div>

                <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                    @include('admin.layouts._msg')
                </div>


                <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                    <form class="am-form am-form-horizontal" action="/admin/setting/change_password" method="post">
                        {!! method_field('patch') !!}
                        {!! csrf_field() !!}
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">密码 / Old_password</label>
                            <div class="am-u-sm-9">
                                <input type="password"  placeholder="请输入原始密码" name="old_password">
                                <small>输入你的原始密码。</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">新密码 / New_password</label>
                            <div class="am-u-sm-9">
                                <input type="password"  placeholder="请输入你的新密码" name="password">
                                <small>新密码你懂得...</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">新密码 / New_password</label>
                            <div class="am-u-sm-9">
                                <input type="password"  placeholder="请再次输入你的新密码" name="password_confirmation">
                            </div>
                        </div>


                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                            </div>
                        </div>
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