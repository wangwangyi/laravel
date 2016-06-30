<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @yield('title')
    <meta name="keywords" content="{{$system->keyword}}">
    <meta name="description" content="{{$system->desc}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/assets/home/css/base.css" type="text/css" rel="stylesheet" />
    <link href="/assets/home/css/index.css" type="text/css" rel="stylesheet" />

    @yield('css')
    <base target="_blank">
</head>
<body>
@yield('head')
<div id="header">
    <div class="top">
        <div class="inner clearfix">
            <p>好315创业网，连锁加盟行业首选诚信平台</p>
            <a href="">首页</a> <a href="">加盟资讯</a> <a href="">加盟问答</a> <a href="">加盟排行榜</a> <a href="">加盟知道</a>
            <div class="fr clearfix"> <a href="">手机网站</a> <a class="a2" href="">商告网致富经</a> <a href="">91创业网</a>
                <ul class="clearfix">
                    <li class="weixin"><a>官方微信</a><img src="/assets/home/images/grey.gif" data-tangram-ori-src="/assets/home/images/grey.gif"></li>
                    <li><a class="a2" href="">加关注</a></li>
                    <li><a class="a3" href="">收听</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-c">
        <div class="inner clearfix">
            <div class="fl logo"><a href="/"><img src="/assets/home/images/grey.gif"  data-tangram-ori-src="/assets/home/images/hao315.jpg"  alt="好315创业网" title="好315创业网"/></a></div>
            <div class="fl text">
                <h2>好315创业网</h2>
                <p>汇聚诚信企业，服务创业人群</p>
            </div>
            <div class="fl search">

                <form class="clearfix" id="form1" method="get" action="/search">
                    <ul>
                        <li class="fw">行业分类选择
                            <div class="clearfix">
                                @foreach ($cates as $cate)
                                    <a href="{{url('list',$cate->id)}}">{{$cate->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                    <input type="text" value="想找什么项目" onfocus="this.value=''" name="keyword" />
                    <input type="submit" value="" />
                </form>

            </div>
            <ul class="fr clearfix">
                @foreach ($adv_right as $a)
                <li>
                    <a href="{{url('zxtc/product',$a->id)}}">
                        <img src="{{$a->brand}}"  data-tangram-ori-src="{{$a->brand}}" alt="{{$a->name}}" title="{{$a->name}}">
                    </a>
                </li>
                    @endforeach
            </ul>
        </div>
    </div>
    <div class="nav">
        <div class="inner">
            <ul class="clearfix">
                <li><a class="first" href="/">首页</a></li>
                @foreach ($cates as $cate)
                <li><a href="{{url('list',$cate->id)}}">{{$cate->name}}</a></li>
                @endforeach
                <li class="last"><img src="/assets/home/images/grey.gif"  data-tangram-ori-src="/assets/home/images/nav-menu.png" /></li>
            </ul>
            <div id="popbox" class="popbox">
                <ul>
                    <li> <strong> <a href="">家居加盟</a></strong> <a href="">厨具加盟</a> <a href="">家居用品</a> <a href="">创意家居</a> <a href="">窗帘布艺</a> </li>
                    <li> <strong><a href="">母婴用品</a></strong> <a href="">母婴用品</a> <a href="">服务加盟</a> <a href="">家政服务</a> <a href="">网络服务</a> </li>
                    <li> <strong><a href="">餐饮加盟</a></strong> <a href="">快餐加盟</a> <a href="">休闲食品</a> <a href="">特色餐饮</a> <a href="">酒水加盟</a> </li>
                    <li> <strong><a href="">建材加盟</a></strong> <a href="">地板加盟</a> <a href="">门窗加盟</a> <a href="">液体壁纸</a> <a href="">致富项目</a> </li>
                    <li> <strong><a href="">婚纱摄影</a></strong> <a href="/">无本创业</a> <a href="">灯饰代理</a> <a href="">玩具加盟</a> <a href="h">美容化妆</a> </li>
                    <li> <strong><a href="">服装加盟</a></strong> <a href="">女装加盟</a> <a href="">男装加盟</a> <a href="">童装加盟</a> <a href="">内衣加盟</a> </li>
                    <li> <strong><a href="">饰品加盟</a></strong> <a href="">民族饰品</a> <a href="">创意饰品</a> <a href="">节庆礼品</a> <a href="">创业点子</a> </li>
                    <li> <strong><a href="">汽车美容</a></strong> <a href="">汽车加盟</a> <a href="">汽车用品</a> <a href="">代步工具</a> <a href="">白领创业</a> </li>
                    <li> <strong><a href="">特色加盟</a></strong> <a href="">户外用品</a> <a href="">办公用品</a> <a href="">养殖加盟</a> <a href="">种植加盟</a> </li>
                    <li> <strong><a href="">美容加盟</a></strong> <a href="">美容护肤</a> <a href="">视力保健</a> <a href="">养生保健</a> <a href="">女性创业</a> </li>
                    <li> <strong><a href="">家居资讯</a></strong> <a href="">家具品牌</a> <a href="">时尚家饰</a> <a href="">卫浴加盟</a> <a href="">床上用品</a> </li>
                    <li> <strong><a href="">设备加盟</a></strong> <a href="">干洗设备</a> <a href="">数码设备</a> <a href="">节能设备</a> <a href="">包装设备</a> </li>
                    <li> <strong><a href="">教育加盟</a></strong> <a href="">英语培训</a> <a href="">网络教育</a> <a href="">教育培训</a> <a href="">致富项目</a> </li>
                    <li> <strong><a href="">儿童乐园</a></strong> <a href="">早教加盟</a> <a href="">玩具加盟</a> <a href="">空气净化</a> <a href="">装修材料</a> </li>
                    <li> <strong><a href="">产后修复</a></strong> <a href="">儿童乐园</a> <a href="">网络教育</a> <a href="">母婴食品</a> <a href="">保健食品</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@yield('content')

@include('home.layout.footer')
<div class="left"> <a href="">

<script src="/assets/home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/assets/home/js/lnjs.js" type="text/javascript"></script>
<script src="/assets/home/js/index-banner.js" type="text/javascript"></script>

@yield('js')
<SCRIPT>
    ;(function(window,undefined) {
        var bd = baidu,
                bdP = bd.page;
        bdP.lazyLoadImage();
    })(window);
</SCRIPT>
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
<script type="text/javascript">uaredirect("/m/");</script>

<script src="/assets/home/js/top_pic2.js" type="text/javascript"></script>

</body>
</html>