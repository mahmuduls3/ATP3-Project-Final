<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>All Property</title>
  </head>
  <body>
    <h1>All Property List</h1><br><hr>
    <a href="{{route('adminHome.index')}}">Home</a>
    <a href="{{route('adminHome.allCustomer')}}">All Customer</a><br>
    <a href="{{route('adminHome.allProperty')}}">All Property</a><br>
    <a href="{{ URL::previous() }}">Back</a>
    <a href="{{route('adminLogout.index')}}">Logout</a>
    <br>
    <table>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Price</th>
        <th>Location</th>
        <th>Type</th>
        <th>Purpose</th>
        <th>Bed</th>
        <th>Bath</th>
        <th>SQ FT</th>
        <th>Floor</th>
        <th>Description</th>
        <th>Status</th>
        <th>No. Of Clicks</th>
        <th>Posted Date</th>
        <th>Posted By</th>
      </tr>
      @foreach($property as $p)
      <tr>
        <td>{{$p->property_id}}</td>
        <td>{{$p->title}}</td>
        <td>{{$p->property_price}}</td>
        <td>{{$p->property_area}}</td>
        <td>{{$p->p_type}}</td>
        <td>{{$p->style}}</td>
        <td>{{$p->bed}}</td>
        <td>{{$p->bath}}</td>
        <td>{{$p->feet}}</td>
        <td>{{$p->floor}}</td>
        <td>{{$p->description}}</td>
        <td>{{$p->status}}</td>
        <td>{{$p->no_of_clicks}}</td>
        <td>{{$p->date}}</td>
        <td>{{$p->username}}</td>
      </tr>
      @endforeach
    </table>

  </body>
</html>
