@extends('layouts.master')

@section('title', 'Admin Page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">

                    {{-- -------- Start of Users -------- --}}
                    <h3>Edit Users</h3>
                    <a href="{{ url('/admin/users') }}">
                        <button class="btn btn-primary">Edit User</button>
                    </a>
                    <a href="{{ url('/admin/roles/create') }}">
                        <button class="btn btn-primary">Add Roles</button>
                    </a>
                    {{-- -------- End of Users -------- --}}

                    {{-- -------- Start of Categories -------- --}}
                    <h3>Categories</h3>
                    <a href="{{ url('/admin/categories') }}">
                        <button class="btn btn-primary">View Categories</button>
                    </a>
                    <a href="{{ url('/admin/categories/create') }}">
                        <button class="btn btn-primary">Add Category</button>
                    </a>
                    {{-- -------- End of Categories -------- --}}

                    {{-- -------- Start of Posts -------- --}}
                    <h3>Posts</h3>
                    <a href="#">
                        <button class="btn btn-primary">View All Posts</button>
                    </a>
                    <a href="#">
                        <button class="btn btn-primary">Add Posts</button>
                    </a>
                    {{-- -------- End of Posts -------- --}}

                </div>
            </div>
        </div>
    </div>

@endsection
