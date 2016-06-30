@extends('admin.layouts.app')
        @section('title')
            <title>新增管理员</title>
            @endsection
@section('content')
        <!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">个人资料</strong> / <small>Personal information</small></div>
        </div>

        <hr/>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">


            </div>

            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <form class="am-form am-form-horizontal" action="/admin/setting/do_register" method="post">
                   {!! csrf_field() !!}

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
                        <div class="am-u-sm-9">
                            <input type="text"  name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">邮箱 / Email</label>
                        <div class="am-u-sm-9">
                            <input type="email"  name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <small>{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">密码 / Password</label>
                        <div class="am-u-sm-9">
                            <input type="password"  name="password">

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">管理员类型 /Author</label>
                        <div class="am-u-sm-9">

                            <select data-am-selected="{btnWidth: '50%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                             name="role_id">
                                <option value=""></option>
                                <option value="2">管理员</option>
                                <option value="1">商户</option>
                                <option value="3">自助商户</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="r_id" value="">
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" class="am-btn am-btn-primary">新增</button>
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
@section('js')
    <script>
        $(function(){

        })
    </script>
    @endsection
