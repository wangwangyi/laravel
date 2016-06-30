@extends('home.layout.app')

@section('title')
    <title>{{$title}}-搜索结果</title>
@endsection

@section('css')
    <link href="/assets/home/css/css.css" type="text/css" rel="stylesheet" />
    <link href="/assets/home/css/ggy-pc_tool_new.css" type="text/css" rel="stylesheet" />
   {{-- <link rel="stylesheet" href="/assets/xSystem/css/xSystem.css">--}}
@endsection
@section('content')

<div id="content">
    <div class="inner">
        @include('home.layout.nav')

        <div class="list-main clearfix">
            <div class="fl">
                <div class="mianbao">
                    <p>你现在所在的位置：<a href="/">首页</a>&gt;{{$title}}</p>
                </div>
                <ul>
                    @foreach ($articles as $article)
                    <li>
                        <h2><a href="{{url('zxtc/product',$article->id)}}">{{$article->title}}</a><a href="{{url('zxtc/product',$article->id)}}">{{$article->name}}</a></h2>
                        <div class="clearfix">
                            <a href="{{url('zxtc/product',$article->id)}}">
                                <img src="{{$article->thumb}}" alt="{{$article->name}}" title="{{$article->name}}">
                                <p>{{$article->name}}</p>
                            </a>
                            <div>
                                <p>项目优势：{{$article->comment}}&nbsp;&nbsp;&nbsp;投资额度：<a href="/money/4/">{{$article->investment}}</a></p>
                                <p>公司名称：<a href="{{url('zxtc/product',$article->id)}}">{{$article->corporate}}</a></p>
                                <p>项目简介：{{mb_substr($article->desc,0,120)}}</p>
                                <ul class="clearfix">
                                    <li>
                                        <a class="a1 msg open red com" onclick="myFunction('#gx-item-title_1','7340','6053','','9384','4006-315-050转9384')" target="_self">马上留言</a>
                                        <input name="id" value="{{$article->id}}"  type="hidden">
                                    </li>
                                    <li><a class="a2" href="http://www10.53kf.com/webCompany.php?arg=10047109&amp;style=1">在线咨询</a></li>
                                    <li><a class="a3" href="{{url('zxtc/product',$article->id)}}">查看详情</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                   @endforeach
                </ul>

{{--
                    <div class="am-cf">
                        <div class="am-fr" style="margin-left: 500px;">
                            {!! $articles->appends(Request::all())->links() !!}
                        </div>
                    </div>--}}
                <div class="fanye">
                    @include('home.layout.page', ['paginator' => $articles])
                    {{--<ul class="clearfix">

                        <li><a href="/serch?q=%E8%BD%A6&amp;">第一页</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=1">上一页</a></li>
                        <li>1</li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=2">2</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=3">3</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=4">4</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=5">5</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=6">6</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=7">7</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=8">8</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=9">9</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=2">下一页</a></li>
                        <li><a href="/serch?q=%E8%BD%A6&amp;page=61">最后一页</a></li>

                    </ul>--}}
                </div>


            </div>
            <div style="left: 616.5px; top: 114.5px; display: none;" class="msse_box">
                <div class="message_top">
                    <div class="ms_title"><img src="/assets/home/images/mss_title.jpg"  data-tangram-ori-src="/assets/home/images/mss_title.jpg"></div>
                    <div class="msse_box_off"><a><img src="/assets/home/images/icon_off.gif"  data-tangram-ori-src="/assets/home/1images/icon_off.gif"></a></div>
                </div>
                <!--<div class="x_name">您所关注的项目：<tt>项目名称</tt></div>-->

                <div class="message_con">
                    <form method="post" action="{{ route('list.store') }}" onsubmit="return check(this)" target="_self">
                        {!! csrf_field() !!}
                        <input id="now" name="article_id"  value="" type="hidden">
                        <div class="msg">
                            <div class="box">
                                <label>姓名</label>
                                <h4>
                                    <input class="input_1" tabindex="6" name="username" type="text">
                                </h4>
                                <h5>请输入真实姓名</h5>
                            </div>
                            <div class="box">
                                <label>电话</label>
                                <h4>
                                    <input class="input_1" name="tel" type="text">
                                </h4>
                                <h5>请填写手机号码</h5>
                            </div>

                            <div class="box ly_box">
                                <label>留言</label>
                                <div class="liuyan_1">
                                    <textarea id="msg" class="text" name="content" cols="" rows=""></textarea>
                                </div>
                            </div>
                            <div class="box submit">
                                <label></label>
                                <input class="but" id="sub_bt" name="" value="提交留言" type="submit">
                            </div>
                        </div>

                        <!--end msg-->
                    </form>
                    <div class="tell">
                        <div class="tel">
                            <div class="tel_t_1"><span>免费呼叫电话</span>
                                <div class="tel_off"></div>
                            </div>
                            <div class="tel_t_2">无需话费<span style="color:#F00">免费</span>沟通<br>
                                请输入您自己的电话号码</div>
                            <div class="tel_t_3">
                                <div id="tb_res" style="display:block;">
                                    <input name="nums" id="nums" value="" type="hidden">
            <span>
            <input value="" id="num_box" class="te_in" name="callerNum" type="text">
            </span> </div>
                                <div id="tb_msg"> </div>
                                <div class="tel_num">
                                    <dl>
                                        <dd>1</dd>
                                        <dd>2</dd>
                                        <dd>3</dd>
                                        <dd>4</dd>
                                        <dd>5</dd>
                                        <dd>6</dd>
                                        <dd>7</dd>
                                        <dd>8</dd>
                                        <dd>9</dd>
                                        <dd>-</dd>
                                        <dd>0</dd>
                                        <dt>DEL</dt>
                                    </dl>
                                </div>
          <span>
          <input class="te_bt" onclick="tel()" type="submit" value="与企业免费通话">
          </span> </div>
                        </div>
                    </div>
                    <!--end tel-->
                    <div class="kehunums"> <em>如果您对此项目感兴趣，请拨打我们的免费咨询热线：</em> <span id="callname"></span> </div>
                </div>
            </div>
            <div style="height: 669px; width: 1903px; display: none;" class="over"></div>
            <iframe frameborder="0" height="2230" allowtransparency="true" marginheight="0" marginwidth="0" noresize="" scrolling="no" src="http://www.shangwudidai.com/right.html" width="208"></iframe>
        </div>
    </div>
</div>
    @endsection


@section('js')
    <script src="/assets/home/js/ggy-pc_msg_tool.js" type="text/jscript"></script>

    <script>
        $(function(){
            $(".com").click(function(){
                var id = $(this).next().val();
               // alert(id);
                $("#now").val(id);
            })
        })

        function uaredirect(murl){
            try {
                if(document.getElementById("bdmark") != null){
                    return;
                }
                var urlhash = window.location.hash;
                if (!urlhash.match("fromapp")){
                    if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad|Windows Phone|adr|AliyunOS)/i))) {
                        location.replace(murl);
                    }
                }
            } catch(err){}
        }
    </script>
@endsection