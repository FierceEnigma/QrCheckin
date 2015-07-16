@extends('app')
<!-- resources/views/auth/login.blade.php -->

@section('content')



    <div class="col-lg-6 col-md-8 col-sm-10 col-lg-offset-3 col-md-offset-2 col-sm-offset-1">

        @include('errors.credentials')

        <div class="white-breadcrumb">

            <h2  style="margin-bottom: 0px">Login</h2>

            <hr>

        <form class="form" method="POST" action="/login">
            {!! csrf_field() !!}

            <fieldset>

            <div class="form-group">
                <label for="email" >Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password" >Password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="remember">
                <input type="checkbox" name="remember"> Remember Me
                </label>

                <div class="pull-right">
                    <p>No account? <a href="register">Sign-up</a></p>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>

            </fieldset>
        </form>
        </div>
    </div>
@stop