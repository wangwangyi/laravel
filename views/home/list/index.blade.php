@extends('home.layout.app')

@section('title')
    <title>{{$title->name}}</title>
@endsection

@section('css')
    <link href="/assets/home/css/css.css" type="text/css" rel="stylesheet" />
    <link href="/assets/home/css/ggy-pc_tool_new.css" type="text/css" rel="stylesheet" />
@endsection
@section('content')
    <div id="content">
        <div class="inner">
            @include('home.layout.nav')
            <div class="nav3">
                <div class="clearfix">
                    <p>热门商机</p>
                    <ul class="clearfix">
                        <li class="f"><a >全部</a></li>
                        @foreach ($join as $j)
                        <li>
                            <input type="hidden" name="join" value="">
                            <a href="/list/{{$title->id}}?join={{$j}}">{{$j}}</a>
                        </li>
                            @endforeach
                    </ul>
                </div>

                <div class="clearfix">
                    <p>投资金额</p>
                    <ul class="clearfix">
                        <li class="f"><a >全部</a></li>
                      @foreach ($investment as $i)
                        <li>
                            <input type="hidden" name="investment" value="">
                            <a href="/list/{{$title->id}}?investment={{$i}}">{{$i}}</a>
                        </li>
                          @endforeach
                    </ul>
                </div>
                <div class="clearfix">
                    <p>地域查询</p>
                    <ul class="clearfix">
                        <li class="f"><a >全部</a></li>
                      @foreach ($address as $a)
                        <li>
                            <input type="hidden" name="address" value="">
                            <a href="/list/{{$title->id}}?address={{$a}}">{{$a}}</a>
                        </li>
                          @endforeach
                    </ul>
                </div>

            </div>

            <div class="projectlist">
                <ul class="clearfix" style="width:1230px;">

                    @foreach ($lists as $list)
                    <li > <img src="{{$list->img}}"  data-tangram-ori-src="{{$list->img}}" alt="{{$list->name}}" title="{{$list->name}}"/>
                        <h4><a href="{{url('zxtc/product',$list->id)}}">[{{$list->join}}]</a><a href="">{{$list->name}}</a></h4>
                        <div class="btn clearfix">
                            <a class="a1 msg open red now" href="###" onclick="myFunction('#gx-item-title_1','11300','16767','','9857','4006-315-050转9857')" target="_self">马上留言</a>
                            <input type="hidden" name="id" value="{{$list->id}}">
                            <a class="a2" href="{{url('zxtc/product',$list->id)}}">查看详情</a> </div>
                        <div class="b">关注度：{{$list->count}}&nbsp;&nbsp;</div>

                        <div class="yc">
                            <a href="{{url('zxtc/product',$list->id)}}">
                                <h3>{{$list->name}}</h3>
                                <p>点评：{{$list->comment}}<br>
                                <p>项目简介：{{mb_substr($list->desc,0,60)}}【查看详情】</p>
                            </a> </div>
                    </li>
                        @endforeach

                        @foreach ($children_list as $l)
                            <li > <img src="{{$l->img}}"  data-tangram-ori-src="{{$l->img}}" alt="{{$l->name}}" title="{{$l->name}}"/>
                                <h4><a href="{{url('zxtc/product',$l->id)}}">[{{$l->join}}]</a><a href="">{{$l->name}}</a></h4>
                                <div class="btn clearfix"> <a class="a1 msg open red" href="###" onclick="myFunction('#gx-item-title_1','11300','16767','','9857','4006-315-050转9857')" target="_self">马上留言</a>
                                    <a class="a2" href="{{url('zxtc/product',$l->id)}}">查看详情</a> </div>
                                <div class="b">关注度：{{$l->count}}&nbsp;&nbsp;</div>
                                <div class="yc"> <a href="{{url('zxtc/product',$l->id)}}">
                                        <h3>{{$l->name}}</h3>
                                        <p>点评：{{$l->comment}}<br>
                                        <p>项目简介：{{mb_substr($l->desc,0,60)}}【查看详情】</p>
                                    </a> </div>
                            </li>
                        @endforeach

                </ul>
                <div class="ibk2">
                    <div class="ibk2-nav clearfix">
                        <p class="p1">2016优质加盟品牌精选</p>
                         </div>
                    <div class="ibk2-main">
                        <ul class="clearfix ibk2-list ibk2-list1 js1" style="width:1210px;">
                            @foreach ($best as $b)
                            <li >
                                <a href="{{url('zxtc/product',$b->id)}}"> <img src="{{$b->thumb}}"  data-tangram-ori-src="{{$b->thumb}}" alt="{{$b->name}}" title="{{$b->name}}"/>
                                    <p>{{$b->comment}}</p>
                                </a>
                            </li>
                                @endforeach
                        </ul>

                    </div>
                </div>
            </div>
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
    <div style="height: 669px; width: 1903px; display: none;" class="over"></div>

@endsection

@section('js')
    <script src="/assets/home/js/ggy-pc_msg_tool.js" type="text/jscript"></script>

    <script>
        $(function(){
            $(".now").click(function(){
                var id = $(this).next().val();
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