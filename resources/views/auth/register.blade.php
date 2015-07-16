@extends('app')

@section('content')

    <!-- resources/views/auth/register.blade.php -->


    <div class="col-lg-6 col-lg-offset-3">


       <div class="white-breadcrumb">
            <h2 style="margin-bottom: 0px">Register</h2>

            <hr>

        <form class="form" method="POST" action="/register">
            {!! csrf_field() !!}

            <fieldset>

            <div class="form-group">

                <label for="company">Company Name</label>
                <input class="form-control" type="text" name="company" value="{{ old('company') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input class="form-control" type="password" name="password_confirmation">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>

            </fieldset>
        </form>
       </div>
    </div>

@stop