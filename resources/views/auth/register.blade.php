@extends('layouts.master')

@section('title', 'Register Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">

                    <form action="{{ url('/user/register') }}" method="post" class="clearfix">
                        @csrf
                        <legend>Coder Register</legend>

                        {{-- -------- Start of Form Errors -------- --}}
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        {{-- -------- End of Form Errors -------- --}}

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
