<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Detail Page</title>
  </head>
  <body>
    <a href="{{route('adminMain.index')}}">Main</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <br>
    <table>
      <tr>
        <td>Customer Image</td>
        <td>{{$customer->c_image}}</td>
      </tr>
      <tr>
        <td>Customer Id:</td>
        <td>{{$customer->customer_id}}</td>
      </tr>
      <tr>
        <td>Username:</td>
        <td>{{$customer->username}}</td>
      </tr>
      <tr>
        <td>Name:</td>
        <td>{{$customer->name}}</td>
      </tr>
      <tr>
        <td>Type:</td>
        <td>{{$customer->type}}</td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td>{{$customer->phone}}</td>
      </tr>
      <tr>
        <td>Email:</td>
        <td>{{$customer->email}}</td>
      </tr>
    </table>
  </body>
</html>
