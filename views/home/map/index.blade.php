
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>网站地图-sitemap</title>
    <base target="_blank">
    <link rel="stylesheet" type="text/css" href="/assets/home/css/map.css" media="all">

</head><body><div style="width: 0px; height: 0px; display: none;">
    <img src="CtripRedirect.aspx" height="0" width="0">
</div>





   <div class="ditu-sitemap clearfix">
        <div class="out-w">
            <div class="cydh-sitemap">

                <div class="hd-sitemap">
                    <div class="lt"><i>◆</i><a href="http://www.hao315.com/">商机首页</a></div>
                    <div class="rt"></div>
                </div>
                <div class="bd-sitemap">
                    <table class="table-sitemap" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr class="item-cate-line">
                            <th class="item-cate-line-th" width="11%"><i>※</i><a href="http://www.hao315.com/">商机首页</a></th>
                            <td class="item-cate-line-td" width="89%"></td>
                        </tr>
                        </tbody></table>
                </div>

                <div class="hd-sitemap">
                    <div class="lt"><i>◆</i>商机分类导航</div>
                    <div class="rt"></div>
                </div>
                <div class="bd-sitemap">
                    <table class="table-sitemap" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                        @foreach ($categories as $category)
                        <tr class="item-cate-line">
                            <th class="item-cate-line-th" width="11%"><i>※</i>{{$category->name}}：</th>

                            <td class="item-cate-line-td" width="89%">
                                @foreach ($category->children as $cate)
                                <a href="{{url('list',$cate->id)}}" target="_blank">{{$cate->name}}</a>|
                                @endforeach
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="hd-sitemap">
                    <div class="lt"><i>◆</i>投资额度</div>
                    <div class="rt"></div>
                </div>
                <div class="bd-sitemap">
                    <table class="table-sitemap" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr class="item-cate-line">
                            <th class="item-cate-line-th" width="11%"><i>※</i>投资额度：</th>
                            <td class="item-cate-line-td" width="89%">
                                @foreach ($investment as $i)
                                    <a href="/list?investment={{$i}}"><input type="hidden" name="investment" value="">{{$i}}</a>|
                                    @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="hd-sitemap">
                    <div class="lt"><i>◆</i>招商地区</div>
                    <div class="rt"></div>
                </div>
                <div class="bd-sitemap">
                    <table class="table-sitemap" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr class="item-cate-line">
                            <th class="item-cate-line-th" width="11%"><i>※</i>招商地区：</th>
                            <td class="item-cate-line-td" width="89%">
                                @foreach ($address as $a)
                                <a href="/list?address={{$a}}"><input type="hidden" name="address" value="">{{$a}}</a>|
                                    @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="hd-sitemap">
                    <div class="lt"><i>◆</i>热门商机</div>
                    <div class="rt"></div>
                </div>
                <div class="bd-sitemap">
                    <table class="table-sitemap" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr class="item-cate-line">
                            <th class="item-cate-line-th" width="11%"><i>※</i>热门商机：</th>
                            <td class="item-cate-line-td" width="89%">
                                @foreach ($cates as $c)
                                <a href="{{url('list',$c->id)}}">{{$c->name}}</a>|
                                    @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="hd-sitemap">
                    <div class="lt"><i>◆</i>最新商机</div>
                    <div class="rt"></div>
                </div>
                <div class="bd-sitemap">
                    <table class="table-sitemap" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr class="item-cate-line">
                            <th class="item-cate-line-th" width="11%"><i>※</i>最新商机：</th>
                            <td class="item-cate-line-td" width="89%">
                                @foreach ($new_article as $n)
                                <a href="{{url('zxtc/product',$n->id)}}">{{$n->name}}</a>|
                                    @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="hd-sitemap">
                    <div class="lt"><i>◆</i>火爆商机</div>
                    <div class="rt"></div>
                </div>
                <div class="bd-sitemap">
                    <table class="table-sitemap" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr class="item-cate-line">
                            <th class="item-cate-line-th" width="11%"><i>※</i>火爆商机：</th>
                            <td class="item-cate-line-td" width="89%">
                                @foreach ($hot_article as $h)
                                <a href="{{url('zxtc/product',$h->id)}}">{{$h->name}}</a>|
                                    @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <div class="footer">
        <div class="hd">
            <div class="ft-nav container">
                <a href="/about/1/关于我们">关于我们</a>
                <a href="/about/3/招贤纳士">招贤纳士</a>
                <a href="/about/4/法律声明">法律声明</a>
                <a href="/about/2/联系我们">联系我们</a>
                <a href="/map">网站地图</a>
            </div>
        </div>
        <div class="bd container">
            <div class="ft-logo"><img src="/assets/home/images/grey.gif" data-tangram-ori-src="/assets/home/images/grey.gif"></div>
            <div class="ft-txt">
                <p>全国免费咨询热线： 010-51955003 传真：010-51955002 媒体合作：13521339919 <a href="/"><img src="/assets/home/images/grey.gif" data-tangram-ori-src="/assets/home/images/grey.gif" alt=""></a></p>
                CopyRight (c) 2015-2024  All right reserved.<br>版权所有：{{$system->company}}<br>ICP备案号：{{$system->icp}}1
            </div>

        </div>
    </div>
    <div class="bottom_2012_3 hui">
        <p>友情链接</p>
        @foreach ($flinks as $f)
        <a href="{{$f->url}}">{{$f->name}}</a>&nbsp;|&nbsp;
            @endforeach

    </div>
</body>
</html>