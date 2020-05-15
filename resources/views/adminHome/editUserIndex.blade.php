@extends('adminHome/main')

@section('editUser')
    <form method="post">
      {{csrf_field()}}

      <div class="row justify-content-center">
        <div class="col-auto">
          <table class="table table-striped table-responsive">
              <tr>
                <td>User Image</td>
                <td><img src="/users/{{$customer->c_image}}" alt="" width="150"></td>
              </tr>
            <tr>
              <td>User Id</td>
              <td><input type="text" class="form-control" name="customer_id" value="{{$customer->customer_id}}" readonly></td>
            </tr>
            <tr>
              <td>Username</td>
              <td><input type="text" class="form-control" name="username" value="{{$customer->username}}" readonly></td>
            </tr>
            <tr>
              <td>Name</td>
              <td><input type="text" class="form-control" name="name" value="{{$customer->name}}"></td>
            </tr>
            <tr>
              <td>Type</td>
              <td>
                <select class="form-control" name="type">
                  <option @if ($customer->type == 'admin') selected @endif value="admin"> Admin </option>
                  <option @if ($customer->type == 'moderator') selected @endif value="moderator"> Moderator </option>
                  <option @if ($customer->type == 'employee') selected @endif value="employee"> Employee </option>
                  <option @if ($customer->type == 'customer') selected @endif value="customer"> Customer </option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><input type="number" class="form-control" name="phone" value="{{$customer->phone}}"></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><input type="email" class="form-control" name="email" value="{{$customer->email}}"></td>
            </tr>
          </table>
          <h4>Are you sure want to edit?</h4>
          <button type="submit" class="form-control btn btn-outline-danger" name="edit">Confirm Edit</button>
        </table>
      </div>
    </div>

    </form>
@endsection

@section('title')
  Edit User
@endsection
