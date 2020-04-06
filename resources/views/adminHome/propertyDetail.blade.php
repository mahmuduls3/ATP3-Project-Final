<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Property Detail Page</title>
  </head>
  <body>
    <a href="{{route('adminHome.index')}}">Home</a><br>
    <a href="{{route('adminHome.allCustomer')}}">All Customer</a><br>
    <a href="{{route('adminHome.allProperty')}}">All Property</a><br>
    <a href="{{route('adminHome.allMessage')}}">All Message</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <a href="{{route('adminLogout.index')}}">Logout</a>
    <br>
    <table>
      <tr>
        <td>Property Id:</td>
        <td>{{$property->property_id}}</td>
      </tr>
      <tr>
        <td> Title:</td>
        <td> {{$property->title}} </td>
      </tr>
      <tr>
        <td>Location:</td>
        <td>{{$property->property_area}}</td>
      </tr>
      <tr>
        <td>Price:</td>
        <td>{{$property->property_price}}</td>
      </tr>
      <tr>
        <td>Type:</td>
        <td>{{$property->p_type}}</td>
      </tr>
      <tr>
        <td>Purpose:</td>
        <td>{{$property->style}}</td>
      </tr>
      <tr>
        <td>Bed:</td>
        <td>{{$property->bed}}</td>
      </tr>
      <tr>
        <td>Bath:</td>
        <td>{{$property->bath}}</td>
      </tr>
      <tr>
        <td>Floor:</td>
        <td>{{$property->floor}}</td>
      </tr>
      <tr>
        <td>Sq Ft:</td>
        <td>{{$property->feet}}</td>
      </tr>
      <tr>
        <td>Description:</td>
        <td>{{$property->description}}</td>
      </tr>
      <tr>
        <td>Status:</td>
        <td>{{$property->status}}</td>
      </tr>
      <tr>
        <td>No. Of Clicks:</td>
        <td>{{$property->no_of_clicks}}</td>
      </tr>
      <tr>
        <td>Date:</td>
        <td>{{$property->date}}</td>
      </tr>
      <tr>
        <td>Posted By:</td>
        <td> <a href="{{route('adminHome.customerDetail', $property->username)}}">{{$property->username}}</a> </td>
      </tr>
    </table>
  </body>
</html>
