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
    <form method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="text" name="username" value="{{old('username')}}" placeholder="Username" required><?php echo $errors->first('username');?><br>
      <input type="password" name="password" value="" placeholder="Password" required><?php echo $errors->first('password');?><br>
      <input type="password" name="confirmPassword" value="" placeholder="Confirm Password" required><?php echo $errors->first('confirmPassword');?><br>
      <select class="" name="type" required>
        <option value="">Type</option>
        <option @if (old('type') == 'admin') selected @endif value="admin">Admin</option>
        <option @if (old('type') == 'moderator') selected @endif value="moderator">Moderator</option>
        <option @if (old('type') == 'employee') selected @endif value="employee">Employee</option>
        <option @if (old('type') == 'customer') selected @endif value="customer">Customer</option>
      </select><?php echo $errors->first('type');?><br>
      <input type="email" name="email" value="{{old('email')}}" placeholder="Email" required><?php echo $errors->first('email');?><br>
      <input type="number" name="phone" value="{{old('phone')}}" placeholder="Phone" required><?php echo $errors->first('phone');?><br>
      <input type="file" name="pic" value="{{old('pic')}}"><?php echo $errors->first('pic');?><br>
      <input type="submit" name="addUser" value="Add User">
    </form>
    {{session('message')}}

  </body>
</html>
