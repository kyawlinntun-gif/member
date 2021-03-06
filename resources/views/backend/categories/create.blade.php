@extends('layouts.master')

@section('title', 'Create Category')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">
                    <form action="{{ url('/admin/categories/create') }}" method="post">
                        <legend>Create A Category</legend>

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

                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Category Name" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
