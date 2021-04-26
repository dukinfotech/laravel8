@extends('layouts.auth')

@section('content')
<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">
      <span class="h5">Thông tin đăng nhập</span>
      <br><a href="/">Trang chủ</a>
    </p>

    <form action="/login" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div class="icheck-primary">
          <input type="checkbox" id="remember">
          <label for="remember">
            Remember Me
          </label>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
      </div>
    </form>

    <div class="social-auth-links text-center mb-3">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-primary">
        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
      </a>
      <a href="#" class="btn btn-block btn-danger">
        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
      </a>
    </div>
    <!-- /.social-auth-links -->

    <!-- <p class="mb-1">
      <a href="forgot-password.html">I forgot my password</a>
    </p> -->
    <p class="mb-0">
      <a href="/register" class="text-center">Đăng ký</a>
    </p>
  </div>
  <!-- /.login-card-body -->
</div>
@endsection