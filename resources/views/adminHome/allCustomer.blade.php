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
    <form method="post">
      {{csrf_field()}}
      <h3>Search Customer</h3>
      <input type="text" name="username" value="" placeholder="Username">
      <input type="text" name="name" value="" placeholder="Name">
      <input type="number" name="phone" value="" placeholder="Phone">
      <input type="text" name="email" value="" placeholder="Email">
      <select class="" name="type">
        <option value="">Type</option>
        <option value="admin">Admin</option>
        <option value="moderator">Moderator</option>
        <option value="employee">Employee</option>
        <option value="customer">Customer</option>
      </select>
      <select class="" name="orderby">
        <option value="active_posts_l_h">Active Posts Low To High</option>
        <option value="active_posts_h_l">Active Posts High To Low</option>
        <option value="pending_posts_l_h">Pending Posts Low To High</option>
        <option value="pending_posts_h_l">Pending Posts High To Low</option>
        <option value="sold_posts_l_h">Sold Posts Low To High</option>
        <option value="sold_posts_h_l">Sold Posts High To Low</option>
        <option value="total_posts_l_h">Total Posts Low To High</option>
        <option value="total_posts_h_l">Total Posts High To Low</option>
      </select>
      <input type="submit" name="search" value="Search">
    </form>
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
        <td> <a href="{{route('adminHome.customerDetail', $c->username)}}">{{$c->username}}</a> </td>
        <td>{{$c->name}}</td>
        <td>{{$c->type}}</td>
        <td>{{$c->phone}}</td>
        <td>{{$c->email}}</td>
        <td><a href="{{route('adminHome.activePosts', $c->username)}}"> {{$c->active_posts}}</a></td>
        <td><a href="{{route('adminHome.pendingPosts', $c->username)}}"> {{$c->pending_posts}}</a></td>
        <td><a href="{{route('adminHome.soldPosts', $c->username)}}"> {{$c->sold_posts}}</a></td>
        <td><a href="{{route('adminHome.totalPosts', $c->username)}}"> {{$c->total_posts}}</a></td>
      </tr>
      @endforeach
    </table>

  </body>
</html>
