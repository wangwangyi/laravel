<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>{{$about->title}}</title>

    <link rel="stylesheet" type="text/css" href="/assets/home/css/about.css" media="all">
</head>
<body>

<div class="hdwrap">
    <div class="hdflash f_list" style="overflow: hidden; height: 214px;">
        <div class="flashlist">
            <div style="display: none;" class="f_out">
                <a><img src="/assets/home/images/banner_1.jpg" height="178" width="990"></a>
            </div>
            <div style="display: block; opacity: 0.210359;" class="f_out">
                <a><img src="/assets/home/images/banner_2.jpg" height="178" width="990"></a>
            </div>
            <div style="display: none;" class="f_out">
                <a><img src="/assets/home/images/banner_3.jpg" height="178" width="990"></a>
            </div>
        </div>
        <div class="flash_tab">
            <div class="tabs f_tabs" style="width: 110px;">
                <ul>
                    <li class="f_tab opdiv">
                        <a title="诚信，创业者的原则。"></a>
                    </li>
                    <li class="f_tab noopdiv">
                        <a title="勤奋，创业者的基础。"></a>
                    </li>
                    <li class="f_tab opdiv">
                        <a title="智慧，创业者的灵魂。"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 代码 结束 -->
<div id="about_us">
    <div class="A_left">
        <h2><span></span></h2>
        <ul>
            @foreach ($abouts as $a)
            <li><a href="/about/{{$a->id}}/{{$a->title}}" class="@if($a->title == $about->title) active @endif">{{$a->title}}</a></li>
           @endforeach
        </ul>
    </div>
    <div class="A_right">
        <h3><span></span>{{$about->title}}</h3>
        <div class="A_U_content">

            <div class="arcon">
                <p>
                    <br>
                </p>
                <div class="arcon">
                   {!! $about->content !!}
                </div>
                <p>
                    <br>
                </p>
                <p>
                    <br>
                </p>
            </div>
            <p>
                <br>
            </p>    	</div>
    </div>
</div>




<div id="bottom">
    <div class="risk">
        <p>
            <a href="/">首页</a>|
            <a href="/about/1/关于我们" rel="nofollow">关于我们</a>|
            <a href="/about/4/法律声明" rel="nofollow">联系我们</a>|
            <a href="/about/2/联系我们" rel="nofollow">法律声明</a>
        </p>
        <div class="caution">
            <p class="login" style="font-family: Arial,Helvetica;">
                CopyRight (c) 2015-2024 All right reserved.<br>版权所有：{{$system->company}}<br>ICP备案号：{{$system->icp}}
            </p>
        </div>
    </div>

</div>


</body>
</html>
