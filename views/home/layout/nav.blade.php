<div class="nav2">
    <div class="nav2-t clearfix">
        <ul class="clearfix">
            @foreach ($clothing as $c)
            <li><a href="{{url('list',$c->id)}}">{{$c->name}}</a></li>
                @endforeach
        </ul>

        <ul class="clearfix u2">
            @foreach ($catering as $c)
            <li><a href="{{url('list',$c->id)}}">{{$c->name}}</a></li>
           @endforeach
        </ul>

        <ul class="clearfix u3">
            @foreach ($cosmetology as $c)
            <li><a href="{{url('list',$c->id)}}">{{$c->name}}</a></li>
                @endforeach
        </ul>

        <ul class="clearfix u4">
           @foreach ($home as $h)
            <li><a href="{{url('list',$h->id)}}">{{$h->name}}</a></li>
               @endforeach
        </ul>

        <ul class="clearfix u5">
           @foreach ($teach as $t)
            <li><a href="{{url('list',$t->id)}}">{{$t->name}}</a></li>
               @endforeach
        </ul>
        <ul class="clearfix u6">
           @foreach ($news as $n)
            <li><a href="{{url('list',$n->id)}}">{{$n->name}}</a></li>
               @endforeach
        </ul>
    </div>
</div>