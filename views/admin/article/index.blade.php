
@extends('admin.layouts.app')
@section('title')
    <title>内容管理</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/assets/xSystem/vendor/daterangepicker/daterangepicker.css">
   @endsection

    @section('content')
            <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">店铺列表</strong> / <small>List</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a type="button" class="am-btn am-btn-default" href="{{route('admin.article.create')}}">
                                <span class="am-icon-plus"></span> 新增
                            </a>
                            <button type="button" class="am-btn am-btn-default" id="destroy_checked"><span class="am-icon-trash-o"></span> 多选删除</button>
                        </div>
                    </div>
                </div>
            </div>


                <div class="am-g">
                    <div class="am-u-sm-12 am-u-md-12">
                        <form class="am-form-inline" role="form" method="get">

                            <div class="am-form-group">
                                <input type="text" name="name" class="am-form-field am-input-sm" placeholder="店名" value="{{ Request::input('name') }}">
                            </div>

                            <div class="am-form-group">
                                <select data-am-selected="{btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                        name="category_id">
                                    <optgroup label="请选择">
                                        <option value="-1">所有分类</option>
                                    </optgroup>
                                    @foreach ($filter_categories as $category)
                                        <optgroup label="{{$category->name}}">
                                            @foreach ($category->children as $c)
                                                <option value="{{$c->id}}" @if($c->id == Request::input('category_id')) selected @endif>
                                                    {{$c->name}}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <div class="am-form-group">
                                <div class="am-btn-group" data-am-button="">
                                    <label class="am-btn am-btn-default am-btn-sm am-radius @if(Request::input('is_top') == 1) am-active @endif">
                                        <input type="checkbox" name="is_top" value="1" @if(Request::input('is_top') == 1) checked @endif> 置顶
                                    </label>
                                    <label class="am-btn am-btn-default am-btn-sm am-radius @if(Request::input('is_recommend') == 1) am-active @endif">
                                        <input type="checkbox" name="is_recommend" value="1" @if(Request::input('is_recommend') == 1) checked @endif> 推荐
                                    </label>
                                    <label class="am-btn am-btn-default am-btn-sm am-radius @if(Request::input('is_hot') == 1) am-active @endif">
                                        <input type="checkbox" name="is_hot" value="1" @if(Request::input('is_hot') == 1) checked @endif> 热销
                                    </label>
                                    <label class="am-btn am-btn-default am-btn-sm am-radius @if(Request::input('is_new') == 1) am-active @endif">
                                        <input type="checkbox" name="is_new" value="1" @if(Request::input('is_new') == 1) checked @endif> 新品
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <select data-am-selected="{btnSize: 'sm'}" name="is_onsale" id="">
                                    <option value="-1" @if(Request::input('is_onsale') == '-1') selected @endif>上架状态</option>
                                    <option value="1" @if(Request::input('is_onsale') == '1') selected @endif>上架</option>
                                    <option value="0" @if(Request::input('is_onsale') == '0') selected @endif>下架</option>
                                </select>
                            </div>

                            <div class="am-form-group">
                                <input type="text" id="created_at" placeholder="选择时间日期" name="created_at"
                                       value="{{ Request::input('created_at') }}" class="am-form-field am-input-sm"/>
                            </div>

                                <button class="am-btn am-btn-default" type="submit">搜索</button>
                            </form>
                        </div>
                    </div>

            @include('admin.layouts._msg')
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox" id="CheckedAll"/></th>
                                <th class="table-id">ID</th>
                                <th class="table-title">标题</th>
                                <th class="table-type">所属分类</th>
                                <th class="table-author am-hide-sm-only">店主</th>
                                <th class="am-hide-sm-only">上架</th>
                                <th class="am-hide-sm-only">置顶</th>
                                <th class="am-hide-sm-only">推荐</th>
                                <th class="am-hide-sm-only">热销</th>
                                <th class="am-hide-sm-only">新品</th>
                                <th class="am-hide-sm-only">图片</th>
                                <th class="am-hide-sm-only">着重</th>
                                <th class="table-date am-hide-sm-only">修改日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($articles as $article)
                            <tr data-id="{{$article->id}}">
                                <td><input type="checkbox" type="checkbox" value="{{$article->id}}" class="checked_id"
                                           name="checked_id[]"/></td>
                                <td>{{$article->id}}</td>
                                <td><a href="#">{{$article->name}}</a></td>
                                <td>{{$article->category->name}}</td>
                                <td class="am-hide-sm-only">{{$article->user->name}}</td>
                                @foreach (array('is_onsale', 'is_top', 'is_recommend', 'is_hot', 'is_new','is_img','is_important') as $attr)
                                    <td class="am-hide-sm-only">
                                        {!! is_something($attr, $article) !!}
                                    </td>
                                @endforeach
                                <td class="am-hide-sm-only">{{$article->updated_at}}</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                               href="{{route('admin.article.edit', $article->id)}}">
                                                <span class="am-icon-pencil-square-o"></span> 编辑
                                            </a>


                                            <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                               href="{{route('admin.article.destroy', $article->id)}}"
                                               data-method="delete"
                                               data-token="{{csrf_token()}}" data-confirm="您删除的内容将会进入回收站！">
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
                                  {!! $articles->appends(Request::all())->links() !!}
                            </div>
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
    <script src="/assets/xSystem/vendor/daterangepicker/moment.js"></script>
    <script src="/assets/xSystem/vendor/moment/locale/zh-cn.js"></script>
    <script src="/assets/xSystem/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/assets/xSystem/js/daterange_config.js"></script>
    <script>
        $(function(){
            //全选,反选
            $("#CheckedAll").click(function () {
                $(':checkbox').prop("checked", this.checked);
            });


            //删除所选
            $('#destroy_checked').click(function () {
                var length = $(".checked_id:checked").length;
                if (length == 0) {
                    alert("您必须至少选中一条!");
                    return false;
                }

                var checked_id = $(".checked_id:checked").serialize();

                $.ajax({
                    type: "DELETE",
                    url: "/admin/article/destroy_checked",
                    data: checked_id,
                    success: function () {
                        location.href = location.href;
                    }
                });
            });


            //是否...
            $(".is_something").click(function () {
                var _this = $(this);
                var data = {
                    id: _this.parents("tr").data('id'),
                    attr: _this.data('attr')
                }

                $.ajax({
                    type: "PATCH",
                    url: "/admin/article/is_something",
                    data: data,
                    success: function (data) {
                        if (_this.hasClass('am-icon-close')) {
                            _this.removeClass('am-icon-close').addClass('am-icon-check');
                        } else {
                            _this.removeClass('am-icon-check').addClass('am-icon-close');
                        }
                    }
                });
            });
        })

    </script>
    @endsection