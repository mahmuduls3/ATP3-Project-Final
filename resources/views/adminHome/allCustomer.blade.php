@extends('adminHome/main')

@section('allCustomer')
    <form method="post">
      {{csrf_field()}}
      <div class="text-center">
        <h3>Search Customer</h3>
      </div>
      <div class="form-group row">
        <div class="col-xs-2 mr-3">
          <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="Username">
        </div>
        <div class="col-xs-2 mr-3">
          <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name">
        </div>
        <div class="col-xs-2 mr-3">
          <input type="number" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Phone">
        </div>
        <div class="col-xs-2 mr-3">
          <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
        </div>
        <div class="col-xs-2 mr-3">
          <select name="type" class="form-control mr-5">
            <option value="">Type</option>
            <option @if (old('type') == 'admin') selected @endif value="admin">Admin</option>
            <option @if (old('type') == 'moderator') selected @endif value="moderator">Moderator</option>
            <option @if (old('type') == 'employee') selected @endif value="employee">Employee</option>
            <option @if (old('type') == 'customer') selected @endif value="customer">Customer</option>
          </select>
        </div>
        <div class="col-xs-2 mr-3">
          <select name="orderby" class="form-control mr-5">
            <option @if (old('orderby') == 'active_posts_l_h') selected @endif value="active_posts_l_h">Active Posts Low To High</option>
            <option @if (old('orderby') == 'active_posts_h_l') selected @endif value="active_posts_h_l">Active Posts High To Low</option>
            <option @if (old('orderby') == 'pending_posts_l_h') selected @endif value="pending_posts_l_h">Pending Posts Low To High</option>
            <option @if (old('orderby') == 'pending_posts_h_l') selected @endif value="pending_posts_h_l">Pending Posts High To Low</option>
            <option @if (old('orderby') == 'sold_posts_l_h') selected @endif value="sold_posts_l_h">Sold Posts Low To High</option>
            <option @if (old('orderby') == 'sold_posts_h_l') selected @endif value="sold_posts_h_l">Sold Posts High To Low</option>
            <option @if (old('orderby') == 'total_posts_l_h') selected @endif value="total_posts_l_h">Total Posts Low To High</option>
            <option @if (old('orderby') == 'total_posts_h_l') selected @endif value="total_posts_h_l">Total Posts High To Low</option>
          </select>
        </div>
        <div class="col-xs-2">
          <button  type="submit" class="form-control btn btn-outline-success" name="search" value="Search">Search</button>
        </div>
      </div>

    </form>
    <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Image</th>
          <th scope="col">Username</th>
          <th scope="col">Name</th>
          <th scope="col">Type</th>
          <th scope="col">Phone</th>
          <th scope="col">Email</th>
          <th scope="col">Active Posts</th>
          <th scope="col">Pending Posts</th>
          <th scope="col">Sold Posts</th>
          <th scope="col">Total Posts</th>
        </tr>
      </thead>
      @foreach($customer as $c)
      <tbody>
        <tr>
          <th scope="col">{{$c->customer_id}}</th>
          <td><img src="/users/{{$c->c_image}}" alt="" width="150"></td>
          <td> <a href="{{route('adminHome.customerDetail', $c->username)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$c->username}}</button> </a> </td>
          <td>{{$c->name}}</td>
          <td>{{$c->type}}</td>
          <td>{{$c->phone}}</td>
          <td>{{$c->email}}</td>
          <td><a href="{{route('adminHome.activePosts', $c->username)}}"> <button type="button" class="btn btn-outline-primary" name="button">{{$c->active_posts}}</button></a></td>
          <td><a href="{{route('adminHome.pendingPosts', $c->username)}}"> <button type="button" class="btn btn-outline-primary" name="button">{{$c->pending_posts}}</button></a></td>
          <td><a href="{{route('adminHome.soldPosts', $c->username)}}"> <button type="button" class="btn btn-outline-primary" name="button">{{$c->sold_posts}}</button></a></td>
          <td><a href="{{route('adminHome.totalPosts', $c->username)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$c->total_posts}}</button> </a></td>
        </tr>
      </tbody>
      @endforeach
    </table>
@endsection

@section('title')
  All Customers
@endsection
