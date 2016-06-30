@extends('admin.layouts.app')
@section('title')
    <title>{{$article->title}}</title>
@endsection
@section('css')
    <link rel="stylesheet" href="/assets/xSystem/vendor/markdown/css/editormd.min.css"/>
    <link rel="stylesheet" href="/assets/xSystem/vendor/webupload/dist/webuploader.css" />
    <link rel="stylesheet" type="text/css" href="/assets/xSystem/vendor/webupload/style.css" />


@endsection
@section('content')
    <div class="admin-content">

        @include('admin.layouts._msg')
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">内容修改</strong> /
                <small>Edit Article</small>
            </div>
        </div>


        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <form class="am-form" action="/admin/article/consumer_update/{{$article->id}}" method="post">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}
                    <input type="hidden" value="0"  name="status">
                    <div class="am-tabs am-margin" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">通用信息</a></li>
                            @role('self')
                            <li><a href="#tab2">自助</a></li>
                            @endrole
                            <li><a href="#tab3">项目图库</a></li>
                            <li><a href="#tab4">内容</a></li>
                        </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                                @role('admin')
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        所属分类
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">

                                        <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                                name="category_id">
                                            <option value=""></option>
                                            @foreach ($categories as $category)
                                                <optgroup label="{{$category->name}}">
                                                    @foreach ($category->children as $c)
                                                        <option value="{{$c->id}}" @if ($c->id == $article->category_id) selected @endif>
                                                            {{$c->name}}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        划分总类
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <select id="cate"  data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                                name="c_id">
                                            <option value=""></option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" @if ($category->id == $article->c_id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        所属用户
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">

                                        <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                                name="user_id">
                                            <option value=""></option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}" @if($user->id == $article->user_id) selected @endif>
                                                    {{$user->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        模版地址
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">

                                        <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                                name="url">
                                            <option value=""></option>
                                            @foreach ($types as $type)
                                                @if(!empty($type['children']))
                                                    <optgroup label="{{$type['name']}}">
                                                        @endif
                                                        @foreach ($type['children'] as $t)
                                                            <option value="{{$type['name']}}/{{$t['name']}}">
                                                                {{$t['name']}}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        定义模版宽度
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" value="{{$article->width}}"  name="width">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>
                                @endrole


                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        项目名称
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="name" value="{{$article->name}}">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        加盟类型
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="join" value="{{$article->join}}"  placeholder="例如：XXX加盟">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        缩略图
                                    </div>

                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <div class="am-form-group am-form-file new_thumb">
                                            <button type="button" class="am-btn am-btn-secondary am-btn-sm">
                                                <i class="am-icon-cloud-upload" id="loading"></i> 上传新的缩略图
                                            </button>
                                            <input type="file" id="thumb_upload">
                                        </div>

                                        <div class="select_thumb">
                                            <button type="button" class="am-btn am-btn-success am-btn-sm" id="ck_thumb_upload">
                                                <i class="am-icon-search-plus" id="loading"></i> 选择已存在的缩略图
                                            </button>
                                            <input type="hidden" name="thumb" value="{{$article->thumb}}">
                                        </div>

                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />

                                        <div>
                                            <img src="{{$article->thumb}}" id="img_show" style="max-height: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        封面图
                                    </div>

                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <div class="am-form-group am-form-file new_thumb">
                                            <button type="button" class="am-btn am-btn-secondary am-btn-sm">
                                                <i class="am-icon-cloud-upload" id="banner_loading"></i> 上传新的封面图
                                            </button>
                                            <input type="file" id="banner_upload">
                                            <input type="hidden" name="img" value="{{$article->img}}">
                                        </div>


                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />

                                        <div>
                                            <img src="{{$article->img}}" id="banner_img_show" style="max-height: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        商标
                                    </div>

                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <div class="am-form-group am-form-file new_thumb">
                                            <button type="button" class="am-btn am-btn-secondary am-btn-sm">
                                                <i class="am-icon-cloud-upload" id="brand_loading"></i> 上传新的商标
                                            </button>
                                            <input type="file" id="banner_upload">
                                            <input type="hidden" name="brand" value="{{$article->brand}}">
                                        </div>


                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />

                                        <div>
                                            <img src="{{$article->brand}}" id="brand_img_show" style="max-height: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        投资额度
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="investment" value="{{$article->investment}}">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        所在区域
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="address" value="{{$article->address}}">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>


                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        合作模式
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="model" value="{{$article->model}}">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        公司名称
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="corporate" value="{{$article->corporate}}">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        项目点评
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="corporate" value="{{$article->corporate}}">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6"></div>
                                </div>


                                <div class="am-g am-margin-top sort">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        项目简介
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <textarea rows="6" name="desc">{{$article->desc}}</textarea>
                                    </div>
                                </div>


                                @role('admin')
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        上架
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="1" name="is_onsale" @if($article->is_onsale == 1) checked @endif> 是
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="0" name="is_onsale" @if($article->is_onsale == 0) checked @endif> 否
                                        </label>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        加入推荐
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <div class="am-btn-group" data-am-button="">

                                            <label class="am-btn am-btn-default am-btn-xs am-round @if($article->is_top == 1) am-active @endif">
                                                <input type="checkbox" name="is_top" value="1" @if($article->is_top == 1) checked @endif> 置顶
                                            </label>
                                            <label class="am-btn am-btn-default am-btn-xs am-round @if($article->is_recommend == 1) am-active @endif">
                                                <input type="checkbox" name="is_recommend" value="1" @if($article->is_recommend == 1) checked @endif> 推荐
                                            </label>
                                            <label class="am-btn am-btn-default am-btn-xs am-round @if($article->is_hot == 1) am-active @endif">
                                                <input type="checkbox" name="is_hot" value="1" @if($article->is_hot == 1) checked @endif> 热门
                                            </label>
                                            <label class="am-btn am-btn-default am-btn-xs am-round @if($article->is_new == 1) am-active @endif">
                                                <input type="checkbox" name="is_new" value="1" @if($article->is_new == 1) checked @endif> 新上
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endrole


                            </div>

                            <div class="am-tab-panel am-fade" id="tab2">
                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-12 am-u-md-12">
                                        <div id="markdown">
                                            <textarea rows="10" name="approve" style="display:none;">{{$article->approve}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="am-tab-panel am-fade" id="tab3">

                                <ul data-am-widget="gallery"
                                    class="am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-6 am-gallery-imgbordered xGallery"
                                    data-am-gallery="{ pureview: true }">

                                    @foreach($article->galleries as $gallery)
                                        <li>
                                            <div class="am-gallery-item">
                                                <a href="{{$gallery->imgs}}" class="">
                                                    <img src="{{$gallery->imgs}}"/>
                                                </a>
                                                <div class="file-panel">
                                                    <span class="cancel" data-id="{{$gallery->id}}">删除</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <div id="uploader">
                                    <div class="queueList">
                                        <div id="dndArea" class="placeholder">
                                            <div id="filePicker"></div>
                                            <p>或将照片拖到这里，单次最多可选300张</p>
                                        </div>
                                    </div>
                                    <div class="statusBar" style="display:none;">
                                        <div class="progress">
                                            <span class="text">0%</span>
                                            <span class="percentage"></span>
                                        </div>
                                        <div class="info"></div>
                                        <div class="btns">
                                            <div id="filePicker2"></div>
                                            <div class="uploadBtn">开始上传</div>
                                        </div>
                                    </div>

                                    <div id="imgs"></div>
                                </div>
                            </div>

                            <div class="am-tab-panel am-fade" id="tab4">

                                <div class="am-g am-margin-top sort">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        企业介绍
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <textarea rows="10" name="video" id="editor_id">{{$article->video}}</textarea>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top sort">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        项目介绍
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <textarea rows="10" name="project">{{$article->project}}</textarea>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top sort">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        项目优势
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <textarea rows="10" name="advantages">{{$article->advantages}}</textarea>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top sort">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        服务体系
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <textarea rows="10" name="system">{{$article->system}}</textarea>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top sort">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        联系我们
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <textarea rows="10" name="contact">{{$article->contact}}</textarea>
                                    </div>
                                </div>


                            </div>
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
    <script src="/assets/xSystem/js/jquery.html5-fileupload.js"></script>
    <script src="/assets/xSystem/js/upload.js"></script>
    <script src="/assets/xSystem/js/banner_upload.js"></script>
    <script src="/assets/xSystem/js/brand_upload.js"></script>
    <script src="/assets/xSystem/vendor/ckfinder/ckfinder.js"></script>
    <script src="/assets/xSystem/js/ck_upload.js"></script>

    <script src="/assets/xSystem/vendor/markdown/editormd.min.js"></script>
    <script src="/assets/xSystem/js/editormd_config.js"></script>

    <script src="/assets/kindeditor/kindeditor-min.js"></script>
    <script src="/assets/kindeditor/lang/zh_CN.js"></script>

    <script type="text/javascript" src="/assets/xSystem/vendor/webupload/dist/webuploader.js"></script>
    <script type="text/javascript" src="/assets/xSystem/vendor/webupload/upload.js"></script>


    <script>
        $(function(){
            $(".am-gallery-item").hover(function () {
                $(this).children('.file-panel').fadeIn(300);
            }, function () {
                $(this).children('.file-panel').fadeOut(300);
            });

            $(".cancel").click(function () {

                var _this = $(this);
                $.ajax({
                    type: "delete",
                    url: "/admin/article/destroy_gallery",
                    data: {gallery_id: _this.data('id')},
                    success: function () {
                        _this.parents("li").remove();
                    }
                });


            });

            KindEditor.ready(function (K) {
                window.editor = K.create('#editor_id');
            });
        })
    </script>
@endsection