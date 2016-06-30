<div class="piaofu clearfix" style="right: 1px;">
    <div style="background-position: 0% 76px;">金牌推荐</div>
    <ul>
        @foreach ($advs as $adv)
            <li>
                <a href="{{url('zxtc/product',$adv->id)}}">
                    <img src="{{$adv->brand}}" data-tangram-ori-src="{{$adv->brand}}">
                    <p>{{$adv->name}}</p>
                </a>
            </li>
        @endforeach
    </ul>
</div>