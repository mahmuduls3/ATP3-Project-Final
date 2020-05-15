@extends('adminHome/main')

@section('addUser')
    <form method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="login">
        <div class="form-group">
          <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="Username" required><?php echo $errors->first('username');?>
          <input type="password" name="password" class="form-control" value="" placeholder="Password" required><?php echo $errors->first('password');?>
          <input type="password" name="confirmPassword" class="form-control" value="" placeholder="Confirm Password" required><?php echo $errors->first('confirmPassword');?>
          <select class="form-control" name="type" required>
            <option value="">Type</option>
            <option @if (old('type') == 'admin') selected @endif value="admin">Admin</option>
            <option @if (old('type') == 'moderator') selected @endif value="moderator">Moderator</option>
            <option @if (old('type') == 'employee') selected @endif value="employee">Employee</option>
            <option @if (old('type') == 'customer') selected @endif value="customer">Customer</option>
          </select><?php echo $errors->first('type');?>
          <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required><?php echo $errors->first('email');?>
          <input type="number" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Phone" required><?php echo $errors->first('phone');?>
          <input type="file" class="form-control" name="pic" value="{{old('pic')}}"><?php echo $errors->first('pic');?>
          <button type="submit" class="form-control btn btn-outline-success" name="addUser">Add User</button>
        </div>
      </div>
    </form>
    {{session('message')}}
@endsection

@section('title')
  Add User
@endsection
