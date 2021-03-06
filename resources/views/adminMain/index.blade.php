<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Main Page</title>
  </head>
  <body>
    <h1>Welcome to property management system</h1><br>
    <a href="{{route('adminMain.index')}}">Main</a><br>
    <a href="{{route('adminLogin.index')}}">Login</a><br>
    <a href="{{route('adminRegister.index')}}">Register</a><br>
    <h3>Featured property</h3>
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
        <th>No. Of Clicks</th>
        <th>Posted Date</th>
        <th>Posted By</th>
      </tr>
      @foreach($property as $p)
      <tr>
        <td>{{$p->property_id}}</td>
        <td><a href="{{route('adminMain.propertyDetail', $p->property_id)}}">{{$p->title}}</a></td>
        <td>{{$p->property_price}}</td>
        <td>{{$p->property_area}}</td>
        <td>{{$p->p_type}}</td>
        <td>{{$p->style}}</td>
        <td>{{$p->bed}}</td>
        <td>{{$p->bath}}</td>
        <td>{{$p->feet}}</td>
        <td>{{$p->floor}}</td>
        <td>{{$p->description}}</td>
        <td>{{$p->no_of_clicks}}</td>
        <td>{{$p->date}}</td>
        <td><a href="{{route('adminMain.customerDetail', $p->username)}}">{{$p->username}}</a> </td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
