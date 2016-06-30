
<div id="footer">
    <div class="list-pptj clearfix">
        <div><img src="/assets/home/images/list-pptj.jpg"  data-tangram-ori-src="/assets/home/images/list-pptj.jpg" /></div>
        <ul class="clearfix">

            @foreach ($brands as $b)
                @if (!empty($b->brand))
                <li><a href="{{url('zxtc/product',$b->category_id)}}"><img src="{{$b->brand}}"  data-tangram-ori-src="{{$b->brand}}" alt="{{$b->name}}" title="{{$b->name}}"/></a></li>
                @endif
                    @endforeach
        </ul>
    </div>
    <div class="link clearfix">
        <ul class="clearfix">
            <li>友情链接：</li>
            @foreach ($flinks as $flink)
            <li><a href="{{$flink->url}}">{{$flink->name}}</a></li>
                @endforeach
        </ul>
    </div>
    <div class="foot-t">
        <div class="inner clearfix">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="/about/1/关于我们">关于好创业网</a></dd>
                <dd><a href="/about/4/法律声明">法律声明</a></dd>
                <dd><a href="/about/2/联系我们">联系我们</a></dd>
                <dd><a href="/map">网站地图</a></dd>
                <dd><a href="">发展历程</a></dd>
            </dl>
            <ul>
                <li><a href="">搜索优化服务</a></li>
                <li><a href="">企业建站服务</a></li>
                <li><a href="">搜索竞价推广</a></li>
                <li><a href="">联展平台推广</a></li>
                <li><a href="">搜索地标广告</a></li>
            </ul>
            <ul>
                <li><a href="">加盟动态</a></li>
                <li><a href="">成交播报</a></li>
                <li><a href="">网络展会</a></li>
                <li><a href="">行业资讯</a></li>
                <li><a href="">数据报告</a></li>
            </ul>
            <ul>
                <li><a href="">营销培训</a></li>
                <li><a href="">搜索竞价</a></li>
                <li><a href="">搜索优化</a></li>
                <li><a href="">建站服务</a></li>
                <li><a href="">品牌推广</a></li>
            </ul>
            <div class="guanzhu">
                <p>一键分享</p>
                <ul>
                    <li><a href="" target="_blank">新浪微博</a></li>
                    <li><a href="" target="_blank">QQ空间</a></li>
                    <li><a href="" target="_blank">人人小站</a></li>
                    <li><a href="" target="_blank">豆瓣小组</a></li>
                </ul>
            </div>
            <div class="weixin">
                <p>微信扫一扫</p>
                <img src=""  data-tangram-ori-src="" />
                <div>每天汇聚上百万</div>
            </div>
            <div class="weixin">
                <p>投资者招商信息</p>
                <img src=""  data-tangram-ori-src="" />
                <div>丰富的招商信息</div>
            </div>
        </div>
    </div>
    <div class="foot-b">
        <div class="inner">
            <ul class="clearfix">
                <li><a href="/about/1/关于我们">关于好创业网</a></li>
                <li><a href="/about/3/招贤纳士">招贤纳士</a></li>
                <li><a href="/about/4/法律声明">法律声明</a></li>
                <li><a href="/about/2/联系我们">联系我们</a></li>
                <li><a href="/map">网站地图</a></li>
                <li><a href="">发展历程</a></li>
                <li><a href="">诚信通下载</a></li>
            </ul>
            <p> CopyRight (c) 2015-2024 hao315.com All right reserved.<br>
                技术支持：{{$system->company}}<br>
                ICP备案号：{{$system->icp}} </p>
            <div><img src=""  data-tangram-ori-src="" /></div>
        </div>
    </div>
</div>