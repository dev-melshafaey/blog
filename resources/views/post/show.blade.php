@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label>Dashboard</label>
                    @if(auth()->user()->type === 1)
                    <a class="btn btn-primary pull-right" href="create">Add new post</a>
                    @endif
                </div>

                <div class="panel-body">                   

                    <div class="row">                       

                        <div class="col-md-12" style="margin-bottom: 10px">
                            <label class="text-primary">{{$post->title}}</label><br>
                            <label class="text-primary">{{$post->created_at}}</label>
                            <p>{!! $post->body !!}</p>
                            @if(auth()->user()->type === 1)
                            <a href="{{$post->id}}/edit" class="btn btn-success">Edit post</a>
                            <button class="btn btn-danger" onclick="deletePost({{$post->id}})">Delete post</button>
                            @endif
                        </div>                                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deletePost(id){
    var r = confirm('Are you sure ?!');
    if (r){
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    }),
            $.ajax({
            url:  id,
                    type: 'post', // replaced from put
                    dataType: "JSON",
                    data: {
                    "_method": 'DELETE', // method and token not needed in data
                    },
                    success: function (response)
                    {
                    if (response){
                    location.href = '/';
                    }
                    },
                    error: function(xhr) {
                    console.log(xhr.responseText); // this line will save you tons of hours while debugging
                    // do something here because of error
                    }
            })
    }
    }
</script>
@endsection
