<?php
// config
$link_limit = 5; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
    <ul class="clearfix">
        共有<span>{{$count}}</span>条
        <li>@if ($paginator->currentPage() == 1) 第一页 @else <a href="{{ $paginator->url(1) }}&keyword={{$title or ""}}">第一页</a> @endif</li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
                $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li>
                    @if ($paginator->currentPage() == $i) {{ $i }} @else <a href="{{ $paginator->url($i) }}&keyword={{$title or ""}}">{{ $i }}</a> @endif
                </li>
            @endif
        @endfor
        <li>
            @if ($paginator->currentPage() == $paginator->lastPage()) 最后一页 @else <a href="{{ $paginator->url($paginator->lastPage())}}&keyword={{$title or ""}}">最后一页</a> @endif
        </li>
        <li>      </li>
    </ul>
@endif