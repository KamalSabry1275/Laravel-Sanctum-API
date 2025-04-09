@extends('user.master')
@section('title','Login')
@section('contain')
<h1>LOGIN</h1>
<form action="{{ Route('auth.loginHandle') }}" method="POST" align="center">
    @csrf
    <div class="mb-3 row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="inputEmail" name="email">
            @error('email')
                <small class="form-text text-muted">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" >
            @error('password')
                <small class="form-text text-muted">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Login</button>
    </div>
</form>
@endsection
