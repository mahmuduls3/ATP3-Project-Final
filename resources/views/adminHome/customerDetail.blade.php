@extends('adminHome/main')

@section('customerDetail')

    <table class="table table-striped">
      <tr>
        <td>Customer Image</td>
        <td><img src="/users/{{$customer->c_image}}" alt="" width="150"> </td>
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
        <td><a href="{{route('adminHome.activePosts', $customer->username)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$customer->active_posts}}</button> </a></td>
      </tr>
      <tr>
        <td>Pending Posts</td>
        <td><a href="{{route('adminHome.pendingPosts', $customer->username)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$customer->pending_posts}}</button> </a></td>
      </tr>
      <tr>
        <td>Sold Posts</td>
        <td><a href="{{route('adminHome.soldPosts', $customer->username)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$customer->sold_posts}}</button> </a></td>
      </tr>
      <tr>
        <td>Total Posts</td>
        <td><a href="{{route('adminHome.totalPosts', $customer->username)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$customer->total_posts}}</button> </a></td>
      </tr>
    </table>
    <hr>
    <div class="text-center">
      <h3>Customer's Messages To</h3>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Message Id</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Message</th>
          <th scope="col">Message Date</th>
        </tr>
      </thead>
      @foreach($message as $m)
      <tbody>
        <tr>
          <th>{{$m->message_id}}</th>
          <td>{{$m->from}}</td>
          <td><a href="{{route('adminHome.customerDetail', $m->to)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$m->to}}</button></a></td>
          <td>{{$m->msg}}</td>
          <td>{{$m->msg_date}}</td>
        </tr>
      </tbody>
      @endforeach
    </table>
    <hr>
    <div class="text-center">
      <h3>Customer's Messages From</h3>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Message Id</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Message</th>
          <th scope="col">Message Date</th>
        </tr>
      </thead>
      @foreach($messageFrom as $m)
      <tbody>
        <tr>
          <th>{{$m->message_id}}</th>
          <td><a href="{{route('adminHome.customerDetail', $m->to)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$m->from}}</button></a></td>
          <td>{{$m->to}}</td>
          <td>{{$m->msg}}</td>
          <td>{{$m->msg_date}}</td>
        </tr>
      </tbody>
      @endforeach
    </table>
@endsection

@section('title')
  Customer Detail
@endsection
