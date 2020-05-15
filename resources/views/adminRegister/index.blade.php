@extends('layout/main')

@section('registration')
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Registration</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
      <div class="login">
        <form method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <input type="text" name="username" class="form-control" value="" placeholder="Username" required>
            <input type="password" name="password" class="form-control" value="" placeholder="Password" required>
            <input type="password" name="confirmPassword" class="form-control" value="" placeholder="Confirm Password" required>
            <input type="email" name="email" class="form-control" value="" placeholder="Email" required>
            <input type="number" name="phone" class="form-control" value="" placeholder="Phone" required>
            <input type="submit" name="register" class="btn btn-success" value="Register">
          </div>
        </form>
      </div>
    </div>
    <br><br>


@endsection

@section('title')
  Registration Page
@endsection
