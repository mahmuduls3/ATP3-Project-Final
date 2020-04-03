<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>All Customer</title>
  </head>
  <body>
    <h1>All Customers List</h1><br><hr>
    <a href="{{route('adminHome.index')}}">Home</a><br>
    <a href="{{route('adminHome.allCustomer')}}">All Customer</a><br>
    <a href="{{route('adminHome.allProperty')}}">All Property</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <a href="{{route('adminLogout.index')}}">Logout</a>
    <br>
    <table>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Username</th>
        <th>Name</th>
        <th>Type</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Active Posts</th>
        <th>Pending Posts</th>
        <th>Sold Posts</th>
        <th>Total Posts</th>
      </tr>
      @foreach($customer as $c)
      <tr>
        <td>{{$c->customer_id}}</td>
        <td>{{$c->c_image}}</td>
        <td>{{$c->username}}</td>
        <td>{{$c->name}}</td>
        <td>{{$c->type}}</td>
        <td>{{$c->phone}}</td>
        <td>{{$c->email}}</td>
        <td>{{$c->active_posts}}</td>
        <td>{{$c->pending_posts}}</td>
        <td>{{$c->sold_posts}}</td>
        <td>{{$c->total_posts}}</td>
      </tr>
      @endforeach
    </table>

  </body>
</html>
