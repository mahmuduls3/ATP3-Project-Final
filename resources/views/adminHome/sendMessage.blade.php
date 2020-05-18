@extends('adminHome/main')

@section('sendMessage')

    <div class="row justify-content-center">
      <div class="col-auto">
        <form method="post">
          <table class="table table-striped table-responsive">
            {{csrf_field()}}
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
              <td>Message</td>
              <td><textarea name="message" rows="4" cols="40"></textarea> </td>
            </tr>
          </table>
          <button type="submit" class="btn btn-outline-success" name="button">Send Message</button>
        </form>
      </div>
    </div>

@endsection

@section('title')
  Send Message
@endsection
