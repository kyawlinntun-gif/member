@extends('layouts.master')

@section('title', 'Login Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">
                    <form action="{{ url('/user/login') }}" method="post" class="clearfix">
                        @csrf
                        <legend>Coder Register</legend>

                        {{-- -------- Start of Form Errors -------- --}}
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        {{-- -------- End of Form Errors -------- --}}

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remember">
                                Remember
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
