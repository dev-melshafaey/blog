@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label>Add new post</label>
                    <a class="btn btn-primary pull-right" href="/home">Back</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['url' => 'post','class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Title: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" >
                            @if ($errors->has('title'))
                            <label class="text-danger">{{ $errors->first('title') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Body: </label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="body" name="body" rows="7"></textarea>
                            @if ($errors->has('body'))
                            <label class="text-danger">{{ $errors->first('body') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
