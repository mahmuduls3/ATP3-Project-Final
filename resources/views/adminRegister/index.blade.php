<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
  </head>
  <body>
    <h1>Registration Page</h1><br>
    <a href="{{route('adminMain.index')}}">Main</a><br>
    <a href="{{route('adminLogin.index')}}">Login</a><br>
    <a href="{{route('adminRegister.index')}}">Register</a><br>
    <form method="post">
      {{csrf_field()}}
      <input type="text" name="username" value="" placeholder="Username"><br>
      <input type="password" name="password" value="" placeholder="Password"><br>
      <input type="password" name="password" value="" placeholder="Password"><br>
      <input type="email" name="email" value="" placeholder="Email"><br>
      <input type="number" name="phone" value="" placeholder="Phone"><br>
      <input type="submit" name="register" value="Register">
    </form>
  </body>
</html>