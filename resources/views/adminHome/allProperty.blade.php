<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>All Property</title>
  </head>
  <body>
    <h1>All Property List</h1><br><hr>
    <a href="{{route('adminHome.index')}}">Home</a><br>
    <a href="{{route('adminHome.allCustomer')}}">All Customer</a><br>
    <a href="{{route('adminHome.allProperty')}}">All Property</a><br>
    <a href="{{route('adminHome.allMessage')}}">All Message</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <a href="{{route('adminLogout.index')}}">Logout</a>
    <br>
    <form method="post">
      {{csrf_field()}}
      <h3>Search Property</h3>
      <input type="text" name="title" value="" placeholder="Title">
      <input type="text" name="location" value="" placeholder="Location">
      <select name="type">
        <option value="">Type</option>
        <option value="apartment">Apartment</option>
        <option value="flat">Flat</option>
        <option value="house">House</option>
        <option value="room">Room</option>
        <option value="shop">Shop</option>
      </select>
      <select name="purpose">
        <option value="">Purpose</option>
        <option value="rent">Rent</option>
        <option value="sell">Sell</option>
      </select>
      <select name="status">
        <option value="">Status</option>
        <option value="allowed">Allowed</option>
        <option value="sold">Sold</option>
        <option value="pending">Pending</option>
        <option value="featured">Featured</option>
        <option value="denied">Denied</option>
      </select>
      <select name="bed">
        <option value="">Bed</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
      <select name="bath">
        <option value="">Bath</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
      <select name="floor">
        <option value="">Floor</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
      </select>
      <input type="number" name="sq_ft_from" value="" placeholder="Sq Ft From">
      <input type="number" name="sq_ft_to" value="" placeholder="Sq Ft To">
      <input type="number" name="price_from" value="" placeholder="Price From">
      <input type="number" name="price_to" value="" placeholder="Price To">
      <select name="orderby">
        <option value="">Order By</option>
        <option value="most_recent">Most recent</option>
        <option value="most_previous">Most previous</option>
        <option value="price_h_l">Price high to low</option>
        <option value="price_l_h">Price low to high</option>
        <option value="feet_h_l">Sq ft high to low</option>
        <option value="feet_l_h">Sq ft low to high</option>
      </select>
      <input type="submit" name="search" value="Search">
    </form>
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
        <td><a href="{{route('adminHome.propertyDetail', $p->property_id)}}">{{$p->title}}</a></td>
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
        <td><a href="{{route('adminHome.customerDetail', $p->username)}}">{{$p->username}}</a> </td>
      </tr>
      @endforeach
    </table>

  </body>
</html>
