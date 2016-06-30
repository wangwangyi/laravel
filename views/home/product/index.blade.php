

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <TITLE>{{$product->name}}</TITLE>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="亿足袜业,亿足袜业加盟,亿足袜业投资开店,亿足袜业加盟好项目,亿足袜业致富信息">
    <meta name="description" content="亿足袜业适合人群均可投资创业,仅需视规模而定投资金额,亿足袜业加盟好项目,亿足袜业致富信息,亿足袜业网站为您投资开店提供最有价值的参考依据.">
    <link rel="stylesheet" type="text/css" href="/assets/home/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/home/css/ly.css">
    <script>
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
    <script type="text/javascript">uaredirect("/wap/jiameng/yizuwaye/");</script>
    <base target="_blank"/>
</head>
<body style=" background:url(/assets/home/images/bj.jpg);height:100%;width:100%;" >
<div class="adshead">
    <div class="container_1" style="width:{{$product->width}}px">
        <div class="navbar">
            <div class="afl">
                <a href="/" class="adslogo" title="好315创业网"><img src="/assets/home/images/hao315.gif" alt="好315创业网"></a>
            </div>
            <div class="afr">
                <div class="rtbox">
                    <ul class="navs">
                        <li class="active"> <a href="/">首页</a> </li>
                        @foreach ($cates as $cate)
                        <li><em></em><a href="{{url('list',$cate->id)}}">{{$cate->name}}</a></li>
                            @endforeach
                    </ul>
                </div>
                <div class="rtbox">
                    <div class="adssoso_form">
                        <form id="form" method="get" action="/search">
                            <input class="so_input" type="q" onblur="if(this.value=='') this.value = this.defaultValue;" onfocus="this.value='';" value="想找什么项目？" name="keyword">
                            <input class="so_input_btn" title="搜商机" type="submit" value="">
                        </form>
                    </div>
                    <div class="navword">

                        <dl>
                            <dt>热门：</dt>
                            @foreach ($hot_p as $h)
                            <dd><a href="">{{$h->comment}}</a></dd>
                                @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="topadsitems">
            <div class="ibk2-main1">
                <ul class="clearfix">

                    @foreach ($hot_p as $h)
                    <li  style="width:108px">
                        <a href="{{url('list',$h->id)}}">
                            <img src="{{$h->thumb}}" alt="{{$h->comment}}" title="{{$h->comment}}"  width="108px">
                            <p style="background-color: rgb(255, 255, 255); color: rgb(153, 153, 153); background-position: initial initial; background-repeat: initial initial;">{{$h->name}}</p>
                        </a>
                    </li>
                        @endforeach


                </ul>
            </div>
        </div>
        <div class="ggy_dh" style="position:relative;">
            <div class="mz_huang gg_mc"><a href="">{{$product->name}}</a></div>
            <dl class="mz_bai">
                <dt class="hover"><a href="/zxtc/index/{{$product->id}}" ></a></dt>
                <dd>
                    <a href="/zxtc/project/{{$product->id}}" >企业介绍</a>
                </dd>
                <dd>
                    <a href="/zxtc/project/{{$product->id}}" >资质认证</a>
                </dd>
                <dd>
                    <a href="/zxtc/project/{{$product->id}}" >产品展示</a>
                </dd>
                <dd>
                    <a href="/zxtc/advantages/{{$product->id}}" >项目优势</a>
                </dd>
                <dd>
                    <a href="/zxtc/system/{{$product->id}}" >服务体系</a>
                </dd>

            </dl>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


@if (empty($product->approve))
<div style="margin:0 auto;height:100%;">
{{--@include ("templates.$product->url.index")--}}

    <iframe id="main" src="/templates/{{$product->url}}/index.html" style="width:100%;height:100%;" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
</div>
@elseif (!empty($product->approve))
    {{$product->approve}}
    @endif

<div style="width:{{$product->width}}px;height:500px;text-align:center; margin:0px auto;margin-top: -30px; background:#FFF; padding-bottom:60px;">
    <a name="MessAge"></a>

    <!--留言板-->
    <div id="liuyan" class="liuyan inner" style="margin: auto; height: 490px;">
        <div class="tit">感兴趣请在此留言，立即获取免费项目资料！</div>
        <div class="liuyan-c clearfix">
            <div class="hujiao fli">
                <div class="hujiao-m" style="margin: auto;">
                    <div class="hujiao-bk hujiao1">
                        <p class="t">抓住商机，立即与项目官方免费通话</p>
                        <p class="f12">请输入<span>您自己的</span>电话号码</p>
<form>
<input class="input_text" id="tels" placeholder="在此输入您的手机或电话" type="text">
                            <div class="tj"><input id="nums" value="" type="button"></div>

                            <p>无需话费，立即沟通！</p></form><div class="ts"><h4>温馨提示：</h4>
                            <p>请填写真实信息，我们会把有价值的经营理念传递给您，让您早日实现创业梦想！</p></div></div></div>
                <div class="hujiao-call true"><h3>免费电话回呼</h3>
                    <div class="fk fk-true">呼叫成功</div><div class="call call-true">
                        <h4>请保持线路畅通，3秒后即可接通</h4><p class="value">12314</p>
                        <div class="clearfix"><p>请您耐心等待！</p><span>返回</span></div></div>
                    <div class="ts"><h4>温馨提示：</h4><p>此次通话您的电话处于接听状态，无需承担任何费用。</p></div></div>
                <div class="hujiao-call flase">
                    <h3>免费电话回呼</h3><div class="fk fk-flase">呼叫失败</div>
                    <div class="call call-flase"><h4>出错了，您输入的电话号码有误！</h4>
                        <p class="value">12314</p><div class="clearfix"><p>请您重新输入！</p>
                            <span>返回</span></div></div><div class="ts"><h4>温馨提示：</h4>
                        <p>此次通话您的电话处于接听状态，无需承担任何费用。</p></div></div>
            </div>
            <div class="liuyan-m fr">
                <form name="guestbook_form" action="{{ route('list.store') }}" method="post">
                    {!! csrf_field() !!}
                    <input name="article_id" value="{{$product->id}}" type="hidden">
                    <div class="clearfix"><p><i>*</i>姓名：</p>
                        <input class="name" id="username" name="username" placeholder="请输入您的姓名" type="text">
                       </div><div class="clearfix">
                        <p><i>*</i>手机：</p>
                        <input class="number" id="mobile" name="tel" placeholder="请输入您的手机号码或座机" type="text">

                        <div class="th"><i>3秒</i>免费申请资料</div>

                    </div>
                    <div class="clearfix">
                        <p><i>*</i>验证：</p>
                        <p><input type="text" name="code" id="captcha"></p>
                        <p style="margin-left: 200px;"><img src="{{ url('captcha/mews') }}" onclick="this.src='{{ url('captcha/mews') }}?r='+Math.random();" alt=""></p>
                        <span class="code" style="display:none;">* 请输入正确的验证码！</span>
                        {{-- @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <span>* {{ $error }}</span>
                            @endforeach
                        @endif--}}

                    </div>

                    <div class="clearfix">
                        <p><i>*</i>留言：</p>
                        <textarea id="contents" name="content" placeholder="我想加盟，请来电话告诉我具体细节"></textarea>
                        <dl style="width:250px;" class="fast">
                            <dt>快捷留言<span></span></dt>
                            <dd>请问我这个地方有加盟商了吗？</dd>
                            <dd>我想加盟，请来电话告诉我具体细节!</dd>
                            <dd>请问我这个地方有加盟商了吗？</dd><dd>请问贵公司哪里有样板店或直营店？</dd>
                            <dd>我加盟后，您们还会提供哪些服务？</dd>
                        </dl>
                    </div>
                    <div class="clearfix tj">

                        <input value="提交留言"  type="button" id="sub">
                    </div><p class="b">*声明：本网站将对您的信息严格保密，绝不外泄！</p></form>
            </div>
        </div>
    </div>
    <!--/留言板-->
    <script>
        var kid=17184;
        var nums=7198;
        var mobile=1;
        var wid=8;
        var pcmb=1;
    </script>
    <div style="text-align:center; line-height:25px;">
        CopyRight (c) 2015-2024  All right reserved.<br>技术支持：众信天成信息技术有限公司
    </div>
</div>
<script src="/assets/home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>
    $(function(){
        $(".fast dd").click(function(){
            var txt = $(this).text();
            $("#contents").text(txt);
        })

        $("#captcha").blur(function()
        {
            var info ={
                code: $(this).val(),
            };

            $.ajax({
                type: "POST",
                url: "/check",
                data: info,
                success: function (result, status, xhr) {
                   console.log(result);
                    if(status = "0")
                    {
                        $(".code").show();
                        $("#sub").click(function(){
                            $("form").submit();
                        })
                    }
                }
            });
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    })


    var kid=17184;
    var nums=7198;
    var wid=8;
    var pcmb=1;


</script>

</body>

</html>
