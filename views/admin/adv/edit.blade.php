@extends('admin.layouts.app')

@section('title')
    <title>修改广告</title>
@endsection

@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">修改广告</strong> /
                <small>Edit Adv</small>
            </div>
        </div>

        @include('admin.layouts._msg')

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <form class="am-form" action="{{ route('admin.adv.update',$adv->id) }}" method="post">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            位置
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                    name="place_id">
                                <option value="0">请选择</option>
                                @foreach ($places as $place)
                                    <option value="{{ $place->id }}" @if ($adv->place_id == $place->id) selected @endif>
                                        {{ $place->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            所属商铺
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                    name="article_id">
                                <option value="0">请选择</option>
                                @foreach ($articles as $article)
                                    <option value="{{ $article->id }}" @if ($adv->article_id == $article->id) selected @endif>
                                        {{ $article->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            广告名称
                        </div>
                        <div class="am-u-sm-8 am-u-md-4">
                            <input type="text" class="am-input-sm" name="name" value="{{$adv->name}}">
                        </div>
                        <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
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
                                <input type="hidden" name="thumb" value="{{$adv->thumb}}">
                            </div>

                            <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />

                            <div>
                                <img src="{{$adv->thumb}}" id="img_show" style="max-height: 200px;">
                            </div>
                        </div>
                    </div>

                    <div class="am-g am-margin-top sort">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            广告简介
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <textarea rows="6" name="desc"></textarea>
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            是否显示
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <label class="am-radio-inline">
                                <input type="radio" value="1" name="is_show" checked> 是
                            </label>
                            <label class="am-radio-inline">
                                <input type="radio" value="0" name="is_show"> 否
                            </label>
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



    {{--<script src="/assets/xSystem/vendor/ckfinder/ckfinder.js"></script>
    <script src="/assets/xSystem/js/ck_upload.js"></script>

    <script src="/assets/xSystem/vendor/markdown/editormd.min.js"></script>
    <script src="/assets/xSystem/js/editormd_config.js"></script>--}}

@endsection