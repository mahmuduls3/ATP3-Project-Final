<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit User</title>
  </head>
  <body>
    <h1>Edit User</h1><br><hr>
    <a href="{{route('adminHome.index')}}">Home</a><br>
    <a href="{{route('adminHome.allCustomer')}}">All Customer</a><br>
    <a href="{{route('adminHome.allProperty')}}">All Property</a><br>
    <a href="{{route('adminHome.allMessage')}}">All Message</a><br>
    <a href="{{route('adminHome.feedback')}}">Customer Feedback</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <a href="{{route('adminLogout.index')}}">Logout</a>
    <br>
    <form method="post">
      {{csrf_field()}}
      <table>
        <tr>
          <td>User Image</td>
          <td><img src="/users/{{$customer->c_image}}" alt="" width="150"></td>
        </tr>
        <tr>
          <td>User Id</td>
          <td><input type="text" name="customer_id" value="{{$customer->customer_id}}" readonly></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type="text" name="username" value="{{$customer->username}}" readonly></td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input type="text" name="name" value="{{$customer->name}}"></td>
        </tr>
        <tr>
          <td>Type</td>
          <td>
            <select class="" name="type">
              <option @if ($customer->type == 'admin') selected @endif value="admin"> Admin </option>
              <option @if ($customer->type == 'moderator') selected @endif value="moderator"> Moderator </option>
              <option @if ($customer->type == 'employee') selected @endif value="employee"> Employee </option>
              <option @if ($customer->type == 'customer') selected @endif value="customer"> Customer </option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><input type="number" name="phone" value="{{$customer->phone}}"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="email" value="{{$customer->email}}"></td>
        </tr>
      </table>
      <h4>Are you sure want to edit?</h4>
      <input type="submit" name="edit" value="Edit">
    </form>
  </body>
</html>
