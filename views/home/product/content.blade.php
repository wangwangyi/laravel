<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <TITLE>{{$product->name}}{{$product->comment}}</TITLE>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/assets/home/css/base.css" type="text/css" rel="stylesheet" />
    <link href="/assets/home/css/text.css" type="text/css" rel="stylesheet" />
    <link href="/assets/home/css/ggy-pc_tool_new.css" type="text/css" rel="stylesheet" />

    <style>
        #imgs img{
            margin-left: 5px;
        }
    </style>
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
    <script type="text/javascript">uaredirect("/wap/byddc/");</script>
    <base target="_blank" />
</head>

<body>
<div id="header">
    <div class="text-nav">
        <div class="inner">
            <ul class="fl clearfix">
                @foreach ($cates as $cate)
                <li><a href="{{url('list',$cate->id)}}">{{$cate->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div><div id="content">
    <div class="mianbao">
        你的位置：<a href="/">首页</a>><a href="/project/diandongche/">{{$product->join}}</a>><a href="/zxtc/index/{{$product->id}}">项目首页</a>
    </div>
    <div class="text-t clearfix">
        <div class="fl">
            <div class="imgbox banner-index-phb">
                <div class="list">
                    @foreach ($product_gallery as $p)
                    <a href=""><img src="{{$p->imgs}}"/></a>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="fr">
            <h2><a href="/project/diandongche/">【{{$product->join}}】 {{$product->name}}</a></h2>
            <p>
                <span>诚信等级</span>
                <img src="/assets/home/images/star.jpg" />
                <img src="/assets/home/images/star.jpg" />
                <img src="/assets/home/images/star.jpg" />
                <img src="/assets/home/images/star.jpg" />
                <img src="/assets/home/images/star.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="/assets/home/images/love.jpg" />38320人关注&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="/assets/home/images/v.jpg" />企业已认证            &nbsp;&nbsp;投资额度:<a href="/money/4">3万-5万</a>
            </p>
            <p><span>合作模式</span>{{$product->model}}</p>
            <div class="btn clearfix">
                <a class="a1 msg open red now" href="###" onclick="myFunction('#gx-item-title_1','11950','17526','13063968536','7557')" target="_self">马上留言</a>
                <input type="hidden"  name="id" value="{{$product->id}}">
                <a class="a2 msg open red" href="###" onclick="myFunction('#gx-item-title_1','11950','17526','13063968536','7557')" target="_self">免费通话</a>
                <a class="a3" href="/cxt.hao315.com/kf/vclient/chat/?websiteid=1136">在线咨询</a>
                <a class="a4" href="/jiameng/byddc/">查看详情</a>
            </div>
            <p><span>公司名称</span><a href="">{{$product->corporate}}</a></p>
            <p><span>项目点评</span>{{$product->comment}}</p>
            <p><span>所在区域</span>{{$product->address}}</p>
            <p><span>项目简介</span>{{$product->desc}}</p>


            <div class="bshare-custom icon-medium"><a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
{{--
            <a class="bshareDiv" href="http://www.bshare.cn/share">分享按钮</a><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=&amp;style=999&amp;img=http%3A%2F%2Fstatic.bshare.cn%2Fimages%2Fbuttons%2Fbox-recommend-zh.gif&amp;w=147&amp;h=21"></script>
--}}

        </div>
    </div>
    <div class="text-b">
        <div class="inner clearfix">
            <div class="fl">
                    @if(substr(Request::getRequestUri(),6,-3) == "index")
                    <h2>{{$product->name}}企业介绍</h2>
                    <p>&nbsp; &nbsp; {!! $product->video !!}</p>
                    @endif
                    @if(substr(Request::getRequestUri(),6,-3) == "project")
                        <h2>{{$product->name}}项目介绍</h2>
                        <p>&nbsp; &nbsp; {!! $product->project !!}</p>
                            @foreach ($product_gallery as $p)
                                <img src="{{$p->imgs}}"/></a>
                            @endforeach
                            <div class="text-img clearfix" id="imgs">
                                @foreach ($product_gallery as $p)
                                    <img src="{{$p->imgs}}" data-bd-imgshare-binded="1"/></a>
                                @endforeach
                            </div>
                    @endif
                    @if(substr(Request::getRequestUri(),6,-3) == "advantages")
                        <h2>{{$product->name}}项目优势</h2>
                        <p>&nbsp; &nbsp; {!! $product->advantages !!}</p>
                            @foreach ($product_gallery as $p)
                                <img src="{{$p->imgs}}"/></a>
                            @endforeach
                            <div class="text-img clearfix" id="imgs">
                                @foreach ($product_gallery as $p)
                                    <img src="{{$p->imgs}}" data-bd-imgshare-binded="1"/></a>
                                @endforeach
                            </div>
                    @endif
                    @if(substr(Request::getRequestUri(),6,-3) == "system")
                        <h2>{{$product->name}}服务体系</h2>
                        <p>&nbsp; &nbsp; {!! $product->system !!}</p>
                            @foreach ($product_gallery as $p)
                                <img src="{{$p->imgs}}"/></a>
                            @endforeach
                    @endif

                    @if(substr(Request::getRequestUri(),6,-3) == "contact")
                        <h2>{{$product->name}}联系我们</h2>
                        <p>&nbsp; &nbsp; {!! $product->system !!}</p>
                            @foreach ($product_gallery as $p)
                                <img src="{{$p->imgs}}"/></a>
                            @endforeach
                    @endif




                <div class="ly">

                    <a name="MessAge"></a>
                    <div class="ly-b">
                        <script>
                            var kid=17526;
                            var nums=7557;
                            var mobile=1;
                            var wid=8;
                            var pcmb=1;
                        </script>

                    </div>
                </div>
            </div>
            <div class="fr">
                <img src="{{$product->img}}" />
                <ul class="fr-nav clearfix">
                    <li><a href="/zxtc/index/{{$product->id}}">项目首页</a></li>
                    <li class="r"><a href="/zxtc/index/{{$product->id}}">项目介绍</a></li>
                    <li><a href="/zxtc/advantages/{{$product->id}}">加盟优势</a></li>
                    <li class="r"><a href="/zxtc/system/{{$product->id}}">服务体系</a></li>
                    <li><a href="/zxtc/project/{{$product->id}}">产品展示</a></li>
                    <li class="r"><a href="/zxtc/project/{{$product->id}}">资质认证</a></li>
                    <li><a href="/text/byddc/question/">加盟问答</a></li>
                    <li class="r"><a href="/zxtc/contact/{{$product->id}}">联系方式</a></li>
                </ul>
                <div class="wyzs-fr">
                    <h3>热门商机排行榜</h3>
                    <ul class="iphb-main iphb1 hot">
                        <?php $i=1 ?>
                        @foreach ($articles as $article)
                        <li class="">
                            <h4 class="clearfix">
                                <div>{{$i++}}</div>
                                <p><a href="{{url('zxtc/product',$article->id)}}">{{$article->comment}}</a></p>

                                <span>23432人关注</span>

                            </h4>
                            <div class="clearfix">
                                <a href="{{url('zxtc/product',$article->id)}}">
                                    <img src="{{$article->thumb}}" /></a>
                                <p>{{mb_substr($article->desc,0,16)}}...<a href="{{url('zxtc/product',$article->id)}}">&nbsp;详情>></a></p>
                            </div>
                        </li>
                            @endforeach
                    </ul>
                </div>

                <div class="wyzs-fr wyzs-fr2">
                    <h3>加盟排行榜</h3>
                    <div id="box">
                        <ul id="u1">

                            @foreach ($articles as $article)
                            <li>
                                <p>商家对<span><a href="{{url('zxtc/product',$article->id)}}">{{$article->name}}</a></span>项目进行评论：</p>
                                <div>
                                    <p><a href="{{url('zxtc/product',$article->id)}}">{{$article->comment}}</a></p>
                                </div>
                            </li>
                                @endforeach


                        </ul>
                        <ul id="u2"></ul>
                    </div>
                </div>

                <div class="wyzs-fr wyzs-fr2">
                    <h3>商机直通车</h3>
                </div>
            </div>        </div>
    </div>
</div>
@include('home.layout.footer')

<div style="left: 616.5px; top: 114.5px; display: none;" class="msse_box">
    <div class="message_top">
        <div class="ms_title"><img src="/assets/home/images/mss_title.jpg"></div>
        <div class="msse_box_off"><a><img src="/assets/home/images/icon_off.gif"></a></div>
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

                <div class="box">
                    <label>验证</label>
                    <h4>
                        <input class="input_1" name="cpt" type="text">
                        <p style="margin-left: 270px;margin-top: -20px;"><img src="{{ url('captcha/mews') }}" onclick="this.src='{{ url('captcha/mews') }}?r='+Math.random();" alt=""></p>

                    </h4>
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <h5>* {{ $error }}</h5>
                        @endforeach
                    @endif
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
<div style="height: 669px; width: 1903px; display: none;" class="over"></div></body>

<script src="/assets/home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/assets/home/js/lnjs.js" type="text/javascript"></script>
<script src="/assets/home/js/index-banner.js" type="text/javascript"></script>
<script src="/assets/home/js/ggy-pc_msg_tool.js" type="text/jscript"></script>

<script>
    $(function(){
        for(var i=1;i<3;i++){
            $('.hot li').eq(0).addClass('one');
            $('.hot li').eq(1).addClass('two');
            $('.hot li').eq(2).addClass('three');
        }
        $(".now").click(function(){
            var id = $(this).next().val();
            $("#now").val(id);
        })
    })


    u2.innerHTML=u1.innerHTML;
    function gundong(){
        if(u2.offsetHeight-box.scrollTop<=2){
            box.scrollTop=0
        }else{
            box.scrollTop++
        }
    }
    var mar=setInterval(gundong,50);
    box.onmouseover=function(){clearInterval(mar)};
    box.onmouseout=function(){mar=setInterval(gundong,50)}
</script>

</html>