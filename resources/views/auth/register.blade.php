@extends('layouts.auth')

@section('content')
<div class="card">
  <div class="card-body register-card-body">
    <p class="login-box-msg">
      <span class="h5">Thông tin đăng ký</span>
      <br><a href="/">Trang chủ</a>
    </p>

    <form action="/register" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Họ và tên" name="name" required value="{{ old('name') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Địa chỉ email" name="email" required value="{{ old('email') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" name="Mật khẩu" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
            <label for="agreeTerms">
              I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- Hoặc -</p>
      <a href="#" class="btn btn-block btn-primary">
        <i class="fab fa-facebook mr-2"></i>
        Sign up using Facebook
      </a>
      <a href="#" class="btn btn-block btn-danger">
        <i class="fab fa-google-plus mr-2"></i>
        Sign up using Google+
      </a>
    </div>

    Đã có tài khoản? <a href="/login" class="text-center">Đăng nhập</a>
  </div>
  <!-- /.form-box -->
</div><!-- /.card -->
@endsection