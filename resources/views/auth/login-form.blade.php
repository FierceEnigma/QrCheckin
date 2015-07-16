
<form class="navbar-form form-inline" method="POST" action="/login">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="email" class="sr-only">Email</label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail">
    </div>

    <div class="form-group">
        <label for="password" class="sr-only">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Password">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">Login</button>
    </div>
</form>
