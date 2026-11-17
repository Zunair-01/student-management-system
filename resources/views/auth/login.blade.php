@extends('layouts.app')
@section('title', 'Admin Login')
@section('content')
<div class="row justify-content-center py-5"><div class="col-md-6 col-lg-4">
  <div class="card shadow-sm"><div class="card-body p-4">
    <h1 class="h3 mb-1">Admin login</h1><p class="text-secondary mb-4">Sign in to manage the portal.</p>
    <form method="POST" action="{{ route('login.store') }}">@csrf
      <div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus></div>
      <div class="mb-3"><label class="form-label">Password</label><input class="form-control" type="password" name="password" required></div>
      <div class="form-check mb-3"><input class="form-check-input" type="checkbox" name="remember" value="1" id="remember"><label class="form-check-label" for="remember">Remember me</label></div>
      <button class="btn btn-primary w-100">Sign in</button>
    </form>
    <p class="small text-secondary mt-3 mb-0">Demo: admin@example.com / password</p>
  </div></div>
</div></div>
@endsection
