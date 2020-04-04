<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Detail Page</title>
  </head>
  <body>
    <a href="{{route('adminHome.index')}}">Home</a><br>
    <a href="{{route('adminHome.allCustomer')}}">All Customer</a><br>
    <a href="{{route('adminHome.allProperty')}}">All Property</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <a href="{{route('adminLogout.index')}}">Logout</a>
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
      <tr>
        <td>Active Posts</td>
        <td><a href="{{route('adminHome.activePosts', $customer->username)}}"> {{$customer->active_posts}}</a></td>
      </tr>
      <tr>
        <td>Pending Posts</td>
        <td><a href="{{route('adminHome.pendingPosts', $customer->username)}}"> {{$customer->pending_posts}}</a></td>
      </tr>
      <tr>
        <td>Sold Posts</td>
        <td><a href="{{route('adminHome.soldPosts', $customer->username)}}"> {{$customer->sold_posts}}</a></td>
      </tr>
      <tr>
        <td>Total Posts</td>
        <td><a href="{{route('adminHome.totalPosts', $customer->username)}}"> {{$customer->total_posts}}</a></td>
      </tr>
    </table>
  </body>
</html>