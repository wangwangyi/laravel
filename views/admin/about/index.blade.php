@extends('admin.layouts.app')

@section('title')
    <title>{{$about->title}}</title>
@endsection

@section('content')
    <div class="admin-content">

        @include('admin.layouts._msg')
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">{{$about->title}}</strong> /
            </div>
        </div>


        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">


                <form class="am-form" action="/admin/about/update/{{$about->id}}" method="post">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}
                    <div class="am-tabs am-margin" data-am-tabs>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        标题
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="title" value="{{$about->title}}">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>


                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        内容
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-6">
                                        <textarea rows="20" name="content" id="editor_id">{{$about->content}}</textarea>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>

                            </div>


                    <div class="am-margin">
                        <button type="submit" class="am-btn am-btn-primary am-radius">提交保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js')


    <script src="/assets/kindeditor/kindeditor-min.js"></script>
    <script src="/assets/kindeditor/lang/zh_CN.js"></script>



    <script>
        $(function(){
            KindEditor.ready(function (K) {
                window.editor = K.create('#editor_id');
            });

        })
    </script>
@endsection