@extends('layouts.master')

@section('title', 'Create Category')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">
                    <form action="{{ url('/postcreator/post/'.$post->id.'/edit') }}" method="post">
                        <legend>Edit A Post</legend>

                        {{-- -------- Start of Success Info -------- --}}
                        @if(Session::has('status'))
                            <p class="alert alert-success">{{ Session::get('status') }}</p>
                        @endif
                        {{-- -------- End of Success Info -------- --}}

                        {{-- -------- Start of Errors -------- --}}
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        {{-- -------- End of Errors -------- --}}

                        {{-- -------- Start of Error Info -------- --}}
                        @if(Session::has('error'))
                            <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif
                        {{-- -------- End of Error Info -------- --}}

                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option>-- Choose --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if($post->category_id == $category->id)
                                            selected="selected"
                                        @endif
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" rows="3"
                                      class="form-control">{{ $post->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
