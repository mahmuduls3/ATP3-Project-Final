<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add User</title>
  </head>
  <body>
    <h1>Add User</h1><br><hr>
    <a href="{{route('adminHome.index')}}">Home</a><br>
    <a href="{{route('adminHome.allCustomer')}}">All Customer</a><br>
    <a href="{{route('adminHome.allProperty')}}">All Property</a><br>
    <a href="{{route('adminHome.allMessage')}}">All Message</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <a href="{{route('adminLogout.index')}}">Logout</a>
    <br>
    <form method="post">
      {{csrf_field()}}
      <input type="text" name="username" value="" placeholder="Username" required><br>
      <input type="password" name="password" value="" placeholder="Password" required><br>
      <input type="password" name="confirmPassword" value="" placeholder="Confirm Password" required><br>
      <select class="" name="type" required>
        <option value="">Type</option>
        <option value="admin">Admin</option>
        <option value="moderator">Moderator</option>
        <option value="employee">Employee</option>
        <option value="customer">Customer</option>
      </select><br>
      <input type="email" name="email" value="" placeholder="Email" required><br>
      <input type="number" name="phone" value="" placeholder="Phone" required><br>
      <input type="submit" name="addUser" value="Add User">
    </form>
  </body>
</html>
