@extends('layout/main')

@section('login')

  <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
      <div class="container h-100">
          <div class="row h-100 align-items-center">
              <div class="col-12">
                  <div class="breadcumb-content">
                      <h3 class="breadcumb-title">Login</h3>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <div class="container">
    <div class="login">
      <form method="post">
        {{csrf_field()}}
        <div class="form-group">
          <br>
          <input type="text" name="username" class="form-control" value="" placeholder="Username" required>
          <input type="password" name="password" class="form-control" value="" placeholder="Password" required>
        </div>
        <input type="submit" class="btn btn-success" name="login" value="Login">
      </form>
      <h4>{{session('message')}}</h4><br>
    </div>
  </div>

@endsection

@section('title')
  Login Page
@endsection
