@extends('layouts.master')

@section('title', 'Single Post')

@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="well">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $post->title }}</h3>
                    </div>
                    <div class="panel-body">
                        {{ $post->content }}
                    </div>
                </div>

                @foreach($post->comments as $comment)
                    <p class="alert alert-warning">{{ $comment->content }}</p>
                @endforeach

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Insert Your Comment</h3>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('status'))
                            <p class="alert alert-success">{{ Session::get('status') }}</p>
                        @endif
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        <form action="{{ url('/comment/create') }}" method="post">
                            @csrf
                            <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                            <textarea name="content" rows="3" class="form-control"></textarea>
                            <button class="btn btn-primary" style="margin-top: 5px;">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
