<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
  <body>
    <h1>Login Page</h1><br>
    <a href="{{route('adminMain.index')}}">Main</a><br>
    <a href="{{route('adminLogin.index')}}">Login</a><br>
    <a href="{{route('adminRegister.index')}}">Register</a><br>
    <form method="post">
      {{csrf_field()}}
      <input type="text" name="username" value="" placeholder="Username"><br>
      <input type="password" name="password" value="" placeholder="Password"><br>
      <input type="submit" name="login" value="Login">
    </form>
    <h4>{{session('message')}}</h4>
  </body>
</html>
