@extends('home.layout.app')

@section('title')
    <title>首页</title>
@endsection
@section('css')
    <style>
        #ys{
            width:1250px;
        }
        #ys li{
            margin-top: 10px;
        }
        #zj{
            width:1250px;
        }
        #zj li{
            margin-top: 10px;
        }
        .k{
            width:1210px;
        }


    </style>
    @endsection

    @section('head')
            <!--头部广告开始 -->
    <div style="MARGIN: 0px auto; WIDTH: 1200px;" id=js_ads_banner_top>
        <a href="">
            @foreach ($adv6 as $a)
                <IMG  src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" width=1200 height="300">
            @endforeach
        </a>
    </div>
    <!--<div style="MARGIN: 0px auto; WIDTH: 1190px; DISPLAY: none;" id=js_ads_banner_top_slide><IMG src='images/grey.gif' data-tangram-ori-src="images/banner_s.jpg" width=1190 height="50" border="0" usemap="#Map"></div>-->
    <div style="MARGIN: 0px auto; WIDTH: 1200px; display:none;" id="js_ads_banner_top_slide">
        <a href="">
            @foreach ($adv66 as $a)
                <IMG  src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}"width=1200 height="50" border="0" usemap="#Map">
            @endforeach
            <map name="Map" id="Map">
                <area shape="rect" coords="902,11,1005,39" href="#" />
            </map>
        </a>
    </div>
    <!-- 头部广告结束-->
@endsection

@section('content')
    <div id="content">
        <div class="inner">
            @include('home.layout.nav')
            <div class="ibk1 clearfix">
                <div class="fl">
                    <div class="img-list" style="width:900px;">
                        <ul class="clearfix">
                            @foreach ($b_articles as $b)
                                <li>
                                    <a href="{{url('zxtc/product',$b->id)}}">
                                        <img src="{{$b->thumb}}"  data-tangram-ori-src="{{$b->thumb}}"   alt="{{$b->name}}" title="{{$b->name}}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="logo-list1" style="width:900px;">
                        <ul class="clearfix">
                            <li class="f">
                                <p>热门榜单</p>
                            </li>
                            @foreach ($hot as $h)
                                <li>
                                    <a href="{{url('zxtc/product',$h->id)}}">
                                        <img src="{{$h->brand}}"  data-tangram-ori-src="{{$h->brand}}" alt="{{$h->name}}" title="{{$h->name}}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="fr">
                    <div class="imgbox banner-index-phb">
                        <div class="list">
                            {{--区域一轮播--}}
                            @foreach ($adv1 as $a)
                                <a href="{{url('zxtc/product',$a->article_id)}}">
                                    <img src="{{$a->thumb}}" data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibk1 clearfix" >
                <div class="fl" style="width:890px;">
                    <ul class="clearfix itext-list">

                        {{--中间1--}}
                        @foreach ($best as $o)
                            <li class="@if ($o->is_img == 1) i @endif">
                                <a class="@if ($o->is_important == 1) red @endif" href="{{url('zxtc/product',$o->id)}}">
                                    @if (!$o->is_img == 1)
                                        {{$o->comment}}
                                    @endif
                                    @if ($o->is_img == 1)
                                        <img src="{{$o->thumb}}"  data-tangram-ori-src="{{$o->thumb}}" alt="{{$o->name}}" title="{{$o->name}}"/>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="fr" style="width:310px;">
                    <div class="iphb-list">
                        <h3 class="clearfix">
                            <p>品牌加盟排行榜</p>
                            <a href="">全部榜单>></a></h3>
                        <div class="clearfix p_list" >
                            <ul class="iphb-nav">
                                @foreach ($cate_list as $c)
                                    <li>
                                        <a class="" name=".iphb{{$c->id}}">{{$c->name}}</a>
                                    </li>
                                @endforeach
                            </ul>

                            @foreach ($cate_list as $c)
                                <ul class="hot iphb-main iphb{{$c->id}}">
                                    <?php $mm=1 ?>
                                    @foreach ($c->list as $l)
                                        <li class="">
                                            <h4 class="clearfix">
                                                <div>{{$mm++}}</div>
                                                <p><a href="{{url('zxtc/product',$l->id)}}">{{$l->comment}}</a></p>
                                                <span>{{$c->count}}人关注</span> </h4>
                                            <div class="clearfix">
                                                <a href="{{url('zxtc/product',$l->id)}}">
                                                    <img src="{{$l->thumb}}"  data-tangram-ori-src="{{$l->thumb}}" alt="{{$l->name}}" title="{{$l->name}}"/>
                                                </a>
                                                <p>{!! subtext($l->desc,16)!!}<a href="{{url('zxtc/product',$l->id)}}">&nbsp;详情>></a></p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach

                        </div>
                        <ul class="clearfix u1" style="height:230px;width:300px;">
                            @foreach ($bb as $b)
                                @if (!empty($b->brand))
                                    <li class="">
                                        <a href="{{url('zxtc/product',$b->id)}}">
                                            <img src="{{$b->brand}}" data-tangram-ori-src="{{$b->brand}}" alt="{{$b->name}}" title="{{$b->name}}"/>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="img-list img-list2" id="zj">
                <ul class="clearfix">
                    @foreach ($onsale as $o)
                        <li>
                            <a href="{{url('zxtc/product',$o->id)}}">
                                <img src="{{$o->thumb}}"  data-tangram-ori-src="{{$o->thumb}}" alt="{{$o->name}}" title="{{$o->name}}"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            {{--中间2--}}
            <div class="ibk1 clearfix">
                <div class="fl" style="width:890px;">
                    <ul class="clearfix itext-list">
                        @foreach ($cen as $c)
                            <li class="@if ($c->is_img == 1) i @endif">
                                <a class="@if ($c->is_important == 1) red @endif" href="{{url('zxtc/product',$c->id)}}">
                                    @if (!$c->is_img == 1)
                                        {{$c->comment}}
                                    @endif
                                    @if ($c->is_img == 1)
                                        <img src="{{$c->thumb}}"  data-tangram-ori-src="{{$c->thumb}}" alt="{{$c->name}}" title="{{$c->name}}"/>
                                    @endif
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="fr">
                    <div class="fxb" id="fx">
                        <h3>投资风向标</h3>
                        <div class="clearfix d1">
                            <p>投资</p>
                            <ul class="clearfix">
                                @foreach ($cosmetology as $c)
                                    <li><a href="{{url('list',$c->id)}}">{{$c->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clearfix d2">
                            <p>招商</p>
                            <ul class="clearfix">
                                @foreach ($catering as $c)
                                    <li><a href="{{url('list',$c->id)}}">{{$c->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clearfix d3">
                            <p>创业</p>
                            <ul class="clearfix">
                                @foreach ($clothing as $c)
                                    <li><a href="{{url('list',$c->id)}}">{{$c->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clearfix d4">
                            <p>商机</p>
                            <ul class="clearfix">
                                @foreach ($foods as $f)
                                    <li><a href="{{url('list',$f->id)}}">{{$f->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="clearfix d5">
                            <p>品牌</p>
                            <ul class="clearfix">
                                @foreach ($teach as $t)
                                    <li><a href="{{url('list',$t->id)}}">{{$t->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clearfix d6">
                            <p>热点</p>
                            <ul class="clearfix">
                                @foreach ($news as $n)
                                    <li><a href="{{url('list',$c->id)}}">{{$n->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="wyzs">
                        <h3>最新专题</h3>
                        <ul class="clearfix">
                            <li class="l1"><a href="">【都菓茶饮】四季火热,风靡全球！！！</a></li>
                            <li class="l2"><a href="">投资回本速度快的项目，您还在观望吗？</a></li>
                            <li class="l3"><a href="">韩式炭火养生烤肉优选品牌</a></li>
                        </ul>
                    </div>
                    <div class="wyzs">
                        <h3 class="blue">最新加盟宝典</h3>
                        <ul class="clearfix">
                            <li class="l4"><a href="">致爱丽丝茶饮怎么样？加盟真的能赚钱么？</a></li>
                            <li class="l5"><a href="">光芒厨房垃圾处理器加盟，发家致富好项目！</a></li>
                            <li class="l6"><a href="">加盟有没有优惠政策？多久可以回本？</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--中间3-->

            <div class="img-list img-list2">
                <ul class="clearfix" id="ys">
                    @foreach ($b_last as $b)
                        <li>
                            <a href="{{url('zxtc/product',$b->id)}}">
                                <img src="{{$b->thumb}}" data-tangram-ori-src="{{$b->thumb}}" alt="{{$b->name}}" title="{{$b->name}}"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <div class="ibk2">
                <div class="ibk2-nav ibk22-nav clearfix">
                    <p class="p1">2016优质加盟品牌精选</p>
                    <ul class="clearfix">
                        <li><a class=".ibk2-list1" name="239px" href="###" target="_self">知名品牌</a></li>
                        <li><a class=".ibk2-list2" name="355px" href="###" target="_self">热门品牌</a></li>
                        <li><a class=".ibk2-list3" name="471px" href="###" target="_self">小本创业</a></li>
                        <li><a class=".ibk2-list4" name="587px" href="###" target="_self">女性创业</a></li>
                        <li><a class=".ibk2-list5" name="703px" href="###" target="_self">兼职创业</a></li>
                        <li><a class=".ibk2-list6" name="819px" href="###" target="_self" >农村创业</a></li>
                        <li class="last"> <a href="">儿童乐园,360度保姆式扶持,财富无</a> </li>
                    </ul>
                    <span></span> </div>
                <div class="ibk2-main k">
                    <ul class="clearfix ibk2-list ibk2-list1 js1">
                        @foreach ($bests as $b)
                            <li>
                                <a href="{{url('zxtc/product',$b->id)}}">
                                    <img src="{{$b->thumb}}"  data-tangram-ori-src="{{$b->thumb}}" alt="{{$b->name}}" title="{{$b->name}}"/>
                                    <p>{{$b->comment}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="clearfix ibk2-list ibk2-list2">
                        @foreach ($hot as $h)
                            <li>
                                <a href="{{url('zxtc/product',$h->id)}}">
                                    <img src="{{$h->thumb}}"  data-tangram-ori-src="{{$h->thumb}}" alt="{{$h->name}}" title="{{$h->name}}"/>
                                    <p>{{$h->comment}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="clearfix ibk2-list ibk2-list3">
                        @foreach ($bb as $b)
                            <li>
                                <a href="{{url('zxtc/product',$b->id)}}">
                                    <img src="{{$b->thumb}}"  data-tangram-ori-src="{{$b->thumb}}" alt="{{$b->name}}" title="{{$b->name}}"/>
                                    <p>{{$b->comment}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="clearfix ibk2-list ibk2-list4">
                        @foreach ($beauty as $b)
                            <li>
                                <a href="{{url('zxtc/product',$b->id)}}">
                                    <img src="{{$b->thumb}}"  data-tangram-ori-src="{{$b->thumb}}" alt="{{$b->name}}" title="{{$b->name}}"/>
                                    <p>{{$b->comment}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="clearfix ibk2-list ibk2-list5">
                        @foreach ($onsale as $o)
                            <li>
                                <a href="{{url('zxtc/product',$o->id)}}">
                                    <img src="{{$o->thumb}}"  data-tangram-ori-src="{{$o->thumb}}" alt="{{$o->name}}" title="{{$o->name}}"/>
                                    <p>{{$o->comment}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="clearfix ibk2-list ibk2-list6">
                        @foreach ($new as $n)
                            <li>
                                <a href="{{url('zxtc/product',$n->id)}}">
                                    <img src="{{$n->thumb}}"  data-tangram-ori-src="{{$n->thumb}}" alt="{{$n->name}}" title="{{$n->name}}"/>
                                    <p>{{$n->comment}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="ibk2 ibk2-2">
                <div class="ibk2-nav clearfix">
                    <p class="p2">服装加盟<span>饰品鞋包</span></p>
                    <ul class="clearfix">
                        <li><a href="{{url('list',1)}}">童装加盟</a></li>
                        <li><a href="{{url('list',17)}}">服装加盟</a></li>
                        <li><a href="{{url('list',14)}}">品牌男装</a></li>
                        <li><a href="{{url('list',18)}}">内衣加盟</a></li>
                        <li><a href="{{url('list',13)}}">潮流女装</a></li>
                        <li><a href="{{url('list',51)}}">时尚女鞋</a></li>
                        <li class="last"> <a href="">海伦百纳银饰 潮流前线备受追捧</a> </li>
                    </ul>
                    <span></span> </div>
                <div class="ibk2-main clearfix">
                    <ul class="clearfix ibk2-list ibk2-list1 fl" style="width:905px;">
                        @foreach ($clothings as $c)
                            <li>
                                <a href="{{url('zxtc/product',$c->id)}}">
                                    <img src="{{$c->thumb}}"  data-tangram-ori-src="{{$c->thumb}}" alt="{{$c->name}}" title="{{$c->name}}"/>
                                    <p>{{$c->comment}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="fr">
                        <div class="imgbox banner-index-phb banner-index-phb2">

                            {{--区域二轮播--}}
                            <div class="list">
                                @foreach ($adv2 as $a)
                                    <a href="{{url('zxtc/product',$a->id)}}"><img src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}"/></a>
                                @endforeach
                            </div>
                        </div>

                        {{--区域二普通--}}
                        @foreach ($adv22 as $a)
                            <a href="{{url('zxtc/product',$a->id)}}"><img src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}"/></a>
                        @endforeach
                        <div class="wyzs2">
                            <h3>我要招商</h3>
                            <ul class="iphb-main iphb1 re">
                                <?php $i=1 ?>
                                @foreach ($recruit as $r)
                                    <li >
                                        <h4 class="clearfix">
                                            <div>{{$i++}}</div>
                                            <p><a href="{{url('zxtc/product',$r->id)}}">{{$r->comment}}</a></p>
                                            <span>{{$r->count}}人关注</span> </h4>
                                        <div class="clearfix">
                                            <a href="{{url('zxtc/product',$r->id)}}">
                                                <img src="{{$r->thumb}}"  data-tangram-ori-src="{{$r->thumb}}" alt="{{$r->name}}" title="name"/>
                                            </a>
                                            <p>{!! subtext($r->desc,16) !!}...<a href="{{url('zxtc/product',$r->id)}}">&nbsp;详情>></a></p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibk2">
                <div class="ibk2-nav ibk22-nav clearfix">
                    <p class="p3">餐饮加盟<span>美食小吃</span></p>
                    <ul class="clearfix" id="clothing">
                        @foreach ($foods as $food)
                            <li><a class=".ibk2-list{{$food->id}}" name="239px" href="###" target="_self">{{$food->name}}</a></li>
                        @endforeach
                        {{--<li><a class=".ibk2-list2" name="355px" href="###" target="_self">火锅加盟</a></li>
                        <li><a class=".ibk2-list3" name="471px" href="###" target="_self">冰淇淋加盟</a></li>
                        <li><a class=".ibk2-list4" name="587px" href="###" target="_self">烧烤加盟</a></li>
                        <li><a class=".ibk2-list5" name="703px" href="###" target="_self">饮品加盟</a></li>
                        <li><a class=".ibk2-list6" name="819px" href="###" target="_self">甜品加盟</a></li>--}}
                        <li class="last"> <a href="">初客牛排十大支持,堂食+外卖双拳</a> </li>
                    </ul>
                    <span></span> </div>
                <div class="ibk2-main k" id="clothings">
                    @foreach ($foods as $food)
                        <ul class="clearfix ibk2-list ibk2-list{{$food->id}}">
                            @foreach ($food->list as $f)
                                <li>
                                    <a href="{{url('zxtc/product',$f->id)}}">
                                        <img src="{{$f->thumb}}"  data-tangram-ori-src="{{$f->thumb}}" alt="{{$f->name}}" title="{{$f->name}}"/>
                                        <p>{{$f->comment}}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach

                </div>
            </div>
            <div class="ibk2 ibk2-2">
                <div class="ibk2-nav clearfix">
                    <p class="p4">家居用品 墙艺 灯饰</p>
                    <ul class="clearfix">
                        <li><a href="{{url('list',46)}}">墙艺</a></li>
                        <li><a href="{{url('list',43)}}">灯饰加工</a></li>
                        <li><a href="{{url('list',52)}}">厨卫加盟</a></li>
                        <li><a href="{{url('list',44)}}">建材加盟</a></li>
                        <li><a href="{{url('list',53)}}">干洗</a></li>
                        <li><a href="{{url('list',50)}}">家电</a></li>
                        <li class="last"> <a href="">怡品饰家创意家居,万余款单品稳赚</a> </li>
                    </ul>
                    <span></span>
                </div>
                <div class="ibk2-main clearfix">
                    <ul class="clearfix ibk2-list ibk2-list1 fl" style="width:905px;">
                        @foreach ($homes as $h)
                            <li>
                                <a href="{{url('zxtc/product',$h->id)}}"> <img src="{{$h->thumb}}"  data-tangram-ori-src="{{$h->thumb}}" alt="{{$h->name}}" title="{{$h->name}}"/>
                                    <p>{{$h->comment}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="fr">
                        <div class="imgbox banner-index-phb banner-index-phb2">
                            {{--区域三轮播--}}
                            <div class="list">
                                @foreach ($adv3 as $a)

                                    <a href="{{url('zxtc/product',$a->id)}}">
                                        <img src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}" />
                                    </a>
                                @endforeach
                            </div> </div>
                        {{--区域三普通--}}
                        @foreach ($adv33 as $a)
                            <a href="{{url('zxtc/product',$a->id)}}">
                                <img src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}"/>
                            </a>
                        @endforeach
                        <div class="wyzs2">
                            <h3>我要招商</h3>

                            <ul class="iphb-main iphb1 r">
                                <?php $num=1 ?>
                                @foreach ($recruit as $r)
                                    <li class="">
                                        <h4 class="clearfix">
                                            <div>{{$num++}}</div>
                                            <p><a href="{{url('zxtc/product',$r->id)}}">{{$r->comment}}</a></p>
                                            <span>{{$r->count}}人关注</span> </h4>
                                        <div class="clearfix">
                                            <a href="{{url('zxtc/product',$r->id)}}">
                                                <img src="{{$r->thumb}}"  data-tangram-ori-src="{{$r->thumb}}" alt="{{$r->name}}" title="{{$r->name}}"/></a>
                                            <p>{!! subtext($r->desc,16) !!}...<a href="{{url('zxtc/product',$r->id)}}">&nbsp;详情>></a></p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="ibk2">
                    <div class="ibk2-nav clearfix">
                        <p class="p5">养生美容<span>面膜化妆品</span></p>
                        <ul class="clearfix">
                            <li><a href="{{url('list',56)}}">产后修复</a></li>
                            <li><a href="{{url('list',48)}}">化妆品</a></li>
                            <li><a href="{{url('list',41)}}">养生保健</a></li>
                            <li><a href="{{url('list',25)}}">儿童乐园</a></li>
                            <li><a href="{{url('list',54)}}">玩具加盟</a></li>
                            <li><a href="{{url('list',55)}}">自拍影像</a></li>
                            <li class="last"> <a href="">爱沐空间,韩国化妆品专卖店赚疯了</a> </li>
                        </ul>
                        <span></span> </div>
                    <div class="ibk2-main k">
                        <ul class="clearfix ibk2-list ibk2-list1 js1">
                            @foreach ($beauty as $b)
                                <li >
                                    <a href="{{url('zxtc/product',$b->id)}}"> <img src="{{$b->thumb}}"  data-tangram-ori-src="{{$b->thumb}}" alt="{{$b->name}}" title="{{$b->name}}"/>
                                        <p>{{$b->comment}}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="ibk2 ibk2-2">
                    <div class="ibk2-nav clearfix">
                        <p class="p6">汽车服务<span>汽车丨电动车</span></p>
                        <ul class="clearfix">
                            <li><a href="{{url('list',57)}}">汽车用品</a></li>
                            <li><a href="{{url('list',58)}}">电动汽车</a></li>
                            <li><a href="{{url('list',59)}}">自行车店</a></li>
                            <li><a href="{{url('list',60)}}">童车加盟</a></li>
                            <li><a href="{{url('list',61)}}">独轮车店</a></li>
                            <li><a href="{{url('list',62)}}">汽车服务</a></li>
                            <li class="last"> <a href="#{{url('zxtc/product',10)}}">特福莱专业化汽车维修,快马加鞭闯</a> </li>
                        </ul>
                        <span></span> </div>
                    <div class="ibk2-main clearfix">
                        <ul class="clearfix ibk2-list ibk2-list1 fl" style="width:905px;">
                            @foreach ($car as $c)
                                <li>
                                    <a href="{{url('zxtc/product',$b->id)}}"> <img src="{{$c->thumb}}"  data-tangram-ori-src="{{$c->thumb}}" alt="{{$c->name}}" title="{{$c->name}}"/>
                                        <p>{{$c->comment}}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="fr">
                            <div class="imgbox banner-index-phb banner-index-phb2">
                                <div class="list">
                                    {{--区域四轮播--}}
                                    @foreach ($adv4 as $a)
                                        <a href="{{url('zxtc/product',$a->id)}}">
                                            <img src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}"/>
                                        </a>
                                    @endforeach
                                </div>
                            </div>                       {{-- 区域四普通--}}
                            @foreach ($adv44 as $a)
                                <a href="{{url('zxtc/product',$a->id)}}">
                                    <img src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}"/>
                                </a>
                            @endforeach
                            <div class="wyzs2">
                                <h3>我要招商</h3>
                                <ul class="iphb-main iphb1 recr">
                                    <?php $z=1 ?>
                                    @foreach ($recruit as $r)
                                        <li class="">
                                            <h4 class="clearfix">
                                                <div>{{$z++}}</div>
                                                <p><a href="{{url('zxtc/product',$r->id)}}">{{$r->comment}}</a></p>
                                                <span>{{$r->count}}人关注</span> </h4>
                                            <div class="clearfix">
                                                <a href="{{url('zxtc/product',$r->id)}}">
                                                    <img src="{{$r->thumb}}"  data-tangram-ori-src="{{$r->thumb}}" alt="{{$r->name}}" title="{{$r->name}}"/>
                                                </a>
                                                <p>{!! subtext($r->desc,16) !!}......<a href="{{url('zxtc/product',$r->id)}}">&nbsp;详情>></a></p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="ibk2">
                        <div class="ibk2-nav clearfix">
                            <p class="p7">网店加盟<span>分销丨微商</span></p>
                            <ul class="clearfix">
                                <li><a href="{{url('list',63)}}">手机美容</a></li>
                                <li><a href="{{url('list',64)}}">网络商城</a></li>
                                <li><a href="{{url('list',65)}}">微信营销</a></li>
                                <li><a href="{{url('list',67)}}">移动支付</a></li>
                                <li><a href="{{url('list',67)}}">手机防水</a></li>
                                <li><a href="{{url('list',68)}}">手机pos机</a></li>
                                <li class="last"> <a href="{{url('zxtc/product',26)}}">元创国际,免费铺货,一台电脑,在家</a> </li>
                            </ul>
                            <span></span> </div>
                        <div class="ibk2-main k">
                            <ul class="clearfix ibk2-list ibk2-list1 js1">
                                @foreach ($shop as $s)
                                    <li>
                                        <a href="{{url('zxtc/product',$s->id)}}">
                                            <img src="{{$s->thumb}}"  data-tangram-ori-src="{{$s->thumb}}" alt="{{$s->name}}" title="{{$s->name}}"/>
                                            <p>{{$s->comment}}</p>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="ibk2 ibk2-2">
                        <div class="ibk2-nav clearfix">
                            <p class="p8">新锐连锁<span>分销丨微商</span></p>
                            <ul class="clearfix">
                                <li><a href="{{url('list',69)}}">天麻种植</a></li>
                                <li><a href="{{url('list',70)}}">土元养殖</a></li>
                                <li><a href="{{url('list',71)}}">铁皮石斛</a></li>
                                <li><a href="{{url('list',72)}}">虫草种植</a></li>
                                <li><a href="{{url('list',73)}}">农村致富</a></li>
                                <li><a href="{{url('list',74)}}">节能环保</a></li>
                                <li class="last"> <a href="#kaijiaolonghbjx/">橡胶颗粒回收 节能环保 轻松赚钱</a> </li>
                            </ul>
                            <span></span> </div>
                        <div class="ibk2-main clearfix">
                            <ul class="clearfix ibk2-list ibk2-list1 fl" style="width:905px;">
                                @foreach ($new as $n)
                                    <li>
                                        <a href="{{url('zxtc/product',$n->id)}}"> <img src="{{$n->thumb}}"  data-tangram-ori-src="{{$n->thumb}}" alt="{{$n->name}}" title="{{$n->name}}"/>
                                            <p>{{$n->comment}}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="fr">
                                <div class="imgbox banner-index-phb banner-index-phb2">
                                    <div class="list">
                                        {{-- 区域轮播五--}}
                                        @foreach ($adv5 as $a)
                                            <a href="{{url('zxtc/product',$a->id)}}">
                                                <img src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}"/>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>                        {{-- 区域五普通--}}
                                @foreach ($adv55 as $a)
                                    <a href="{{url('zxtc/product',$a->id)}}">
                                        <img src="{{$a->thumb}}"  data-tangram-ori-src="{{$a->thumb}}" alt="{{$a->name}}" title="{{$a->name}}"/>
                                    </a>
                                @endforeach
                                <div class="wyzs2">
                                    <h3>我要招商</h3>
                                    <ul class="iphb-main iphb1 rec">
                                        <?php $m=1 ?>
                                        @foreach ($recruit as $r)
                                            <li class="">
                                                <h4 class="clearfix">
                                                    <div>{{$m++}}</div>
                                                    <p><a href="{{url('zxtc/product',$r->id)}}">{{$r->comment}}</a></p>
                                                    <span>{{$r->count}}人关注</span> </h4>
                                                <div class="clearfix">
                                                    <a href="{{url('zxtc/product',$r->id)}}">
                                                        <img src="{{$r->thumb}}"  data-tangram-ori-src="{{$r->thumb}}" alt="{{$r->name}}" title="{{$r->name}}"/>
                                                    </a>
                                                    <p>{!! subtext($r->desc,16) !!}...<a href="{{url('zxtc/product',$r->id)}}">&nbsp;详情>></a></p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="ibk2">
                            <div class="ibk2-nav clearfix">
                                <p class="p9">环保加盟<span>机械设备</span></p>
                                <ul class="clearfix">
                                    <li><a href="{{url('list',76)}}">机械设备</a></li>
                                    <li><a href="{{url('list',77)}}">环保机械</a></li>
                                    <li><a href="{{url('list',78)}}">食品机械</a></li>
                                    <li><a href="{{url('list',79)}}">塑料机械</a></li>
                                    <li><a href="{{url('list',80)}}">机械加盟</a></li>
                                    <li><a href="{{url('list',81)}}">机械设备</a></li>
                                    <li class="last"> <a href="#kaijiaolonghbjx/">橡胶颗粒回收 节能环保 轻松赚钱</a> </li>
                                </ul>
                                <span></span> </div>
                            <div class="ibk2-main k">
                                <ul class="clearfix ibk2-list ibk2-list1 js1">
                                    @foreach ($protect as $p)
                                        <li>
                                            <a href="{{url('zxtc/product',$p->id)}}"> <img src="{{$p->thumb}}"  data-tangram-ori-src="{{$p->thumb}}" alt="{{$p->name}}" title="{{$p->name}}"/>
                                                <p>{{$p->comment}}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="ibk2">
                            <div class="ibk2-main2 clearfix">
                                <div class="fl l">
                                    <div class="t clearfix">
                                        <div class="fl l">
                                            <p class="p10">热门项目</p>
                                            <div>
                                                <dl>
                                                    <dt>
                                                    <p>推荐<img src="/assets/home/images/grey.gif"  data-tangram-ori-src="/assets/home/images/jiao1.png" /></p>
                                                    <img src="/assets/home/images/grey.gif"  data-tangram-ori-src="/assets/home/images/jiao2.jpg" /></dt>
                                                    @foreach ($b_last as $b)
                                                        <dd class="clearfix"><a href="{{url('zxtc/product',$b->id)}}">{{$b->name}}</a><span>{{$b->investment}}</span></dd>
                                                    @endforeach
                                                </dl>
                                                <dl>
                                                    <dt>
                                                    <p>火爆<img src="/assets/home/images/grey.gif"  data-tangram-ori-src="/assets/home/images/jiao1.png" /></p>
                                                    <img src="/assets/home/images/grey.gif"  data-tangram-ori-src="/assets/home/images/jiao2.jpg" /></dt>
                                                    @foreach ($hot as $h)
                                                        <dd class="clearfix"><a href="{{url('zxtc/product',$h->id)}}">{{$h->name}}</a><span>{{$h->investment}}</span></dd>
                                                    @endforeach
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="fr r">
                                        </div>
                                    </div>

                                    <div class="ibk2-link2">
                                        <h3><strong>重点品牌推荐</strong></h3>
                                        <dl class="clearfix">
                                            @foreach ($bests as $b)
                                                <dd><a href="{{url('zxtc/product',$h->id)}}">{{$b->name}}</a></dd>
                                            @endforeach
                                        </dl>
                                    </div>
                                </div>
                                <div class="fr">
                                    <div class="wyzs wyzs2 wyzs3 wyzs4">
                                        <h3>我要招商</h3>
                                        {{-- 24条--}}
                                        <p><a href="">雅丝怡化妆品微商加盟有什么优惠政策么？</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@include('home.layout.adv')

@section('js')
    <script src="/assets/home/js/lazyload.js"></script>
    <script src="/assets/home/js/r.js"></script>
    <script>
        $(function(){

        })
    </script>
@endsection


