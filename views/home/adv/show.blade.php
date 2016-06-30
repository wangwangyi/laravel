@extends('home.layout.app')

@section('title')
    <title>详情</title>
@endsection


@section('content')
    <ul class="am-list am-list-static">
        <li>项目年限：{{$article->term}}</li>
    </ul>

    @include("templates.$article->url.index")

@endsection
