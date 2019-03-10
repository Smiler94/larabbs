@extends('layouts.app')

@section('title', isset($category) ? $category->name : '话题列表' )

@section('content')
<div class="row">
    <div class="col-lg-9 col-md-9 topic-list">

        @if( isset($category) )
            <div class="alert alert-info" role="alert">
                {{ $category->name }} : {{ $category->description }}
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-pills">
                    <li class="active" role="presentation"><a href="#">最后回复</a></li>
                    <li role="presentation"><a href="#">最新发布</a></li>
                </ul>
            </div>

            <div class="panel-body">
                @include('topics._topics_list', ['topics' => $topics])

                {!! $topics->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 sidebar">
        @include('topics._sidebar')
    </div>
</div>

@endsection