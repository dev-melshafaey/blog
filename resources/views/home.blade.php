@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label>Dashboard</label>
                    @if(auth()->user()->type === 1)
                    <a class="btn btn-primary pull-right" href="post/create">Add new post</a>
                    @endif
                </div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">

                        @foreach($posts as $post)
                        <div class="col-md-12" style="margin-bottom: 10px">
                            <label class="text-primary">{{$post->title}}</label>
                            <p>{!! str_limit($post->body,200) !!}</p>
                            <a href="post/{{$post->id}}" class="btn btn-default pull-right">read more</a>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
