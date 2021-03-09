@extends('layouts.master')

@section('title', 'All Roles')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)

                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ url('/postcreator/post/'. $post->id .'/show') }}">{{ $post->title }}</a></td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    @if(Auth::id() == $post->user_id)
                                        <a href="{{ url('/postcreator/post/'. $post->id .'/edit') }}">Edit</a>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
