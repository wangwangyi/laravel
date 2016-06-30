@extends('admin.layouts.app')
@section('title')
    <title>邮件列表</title>
    @endsection
    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">邮件列表</strong> / <small>Email</small></div>
            </div>

            <div class="am-g">

                <div class="am-u-md-9">
                    <div class="am-panel am-panel-default">
                        <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-3'}">最近消息<span class="am-icon-chevron-down am-fr"></span></div>
                        <div class="am-panel-bd am-collapse am-in am-cf" id="collapse-panel-3">
                            <ul class="am-comments-list admin-content-comment">
                                @foreach ($info as $i)
                                <li class="am-comment">
                                    <a href="#"><img src="/admin.jpg" alt="" class="am-comment-avatar" width="48" height="48"></a>
                                    <div class="am-comment-main">
                                        <header class="am-comment-hd">
                                            <div class="am-comment-meta"><a href="#" class="am-comment-author">回复！</a> <time>{{$i->created_at}}</time></div>
                                        </header>
                                        <div class="am-comment-bd"><p>{{$i->content}}</p>
                                            <div class="am-cf">
                                                <div class="am-fr">
                                                    <button data-id="{{$i->id}}" type="button" class="am-btn am-btn-default am-btn-xs del">删除</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                            </ul>

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

@section('js')
    <script>
        $(function() {
            $('#doc-prompt-toggle').on('click', function() {
                $('#my-prompt').modal({
                    relatedTarget: this,
                });
                $(".sub").click(function(){
                    $("form").submit();
                })
            });

            $(".del").click(function(){
                var id = $(this).data("id");
                //alert(id);
                var _this = $(this);
                $.ajax({
                    type: "delete",
                    url: "/admin/info/delete",
                    data: {email_id: _this.data('id')},
                    success: function () {
                        _this.parent().parent().parent().parent().parent().fadeOut(600);
                    }
                })
            })


        });
    </script>
    @endsection