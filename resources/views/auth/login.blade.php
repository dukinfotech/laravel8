@extends('layouts.auth')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
  <form class="login-form" method="POST" action="/login">
  @csrf
  <h4 class="text-center">Login</h4>
    <div class="mb-3">
      <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
      <input type="email" name="email" class="form-control" id="email" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
      <input type="password" name="password" class="form-control" id="password" required>
    </div>
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-primary">Login</button>
      <div>
        <a href="/register">Register</a> / 
        <a href="/">Home</a>
      </div>
    </div>
  </form>
</div>
@endsection