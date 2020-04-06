<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>All Message</title>
  </head>
  <body>
    <h1>All Messages List</h1><br><hr>
    <a href="{{route('adminHome.index')}}">Home</a><br>
    <a href="{{route('adminHome.allCustomer')}}">All Customer</a><br>
    <a href="{{route('adminHome.allProperty')}}">All Property</a><br>
    <a href="{{route('adminHome.allMessage')}}">All Message</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <a href="{{route('adminLogout.index')}}">Logout</a>
    <br>
    <form method="post">
      {{csrf_field()}}
      <h3>Search Message</h3>
      <input type="text" name="from" value="" placeholder="Messages From">
      <input type="text" name="to" value="" placeholder="Messages To">
      <input type="text" name="msg" value="" placeholder="Messages">
      <select class="" name="orderby">
        <option value="most_recent">Most Recent</option>
        <option value="most_previous">Most Previous</option>
      </select>
      <input type="submit" name="search" value="Search">
    </form>
    <br>
    <table>
      <tr>
        <th>Message Id</th>
        <th>From</th>
        <th>To</th>
        <th>Message</th>
        <th>Date</th>
      </tr>
      @foreach($message as $m)
      <tr>
        <td>{{$m->message_id}}</td>
        <td><a href="{{route('adminHome.customerDetail', $m->from)}}">{{$m->from}}</a></td>
        <td><a href="{{route('adminHome.customerDetail', $m->to)}}">{{$m->to}}</a></td>
        <td>{{$m->msg}}</td>
        <td>{{$m->msg_date}}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
