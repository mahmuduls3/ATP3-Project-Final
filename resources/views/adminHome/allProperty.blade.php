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
    <a href="{{route('adminHome.feedback')}}">Customer Feedback</a><br>
    <a href="{{ URL::previous() }}">Back</a><br>
    <a href="{{route('adminLogout.index')}}">Logout</a>
    <br>
    <form method="post">
      {{csrf_field()}}
      <h3>Search Property</h3>
      <input type="text" name="title" value="{{old('title')}}" placeholder="Title">
      <input type="text" name="location" value="{{old('location')}}" placeholder="Location">
      <select name="type">
        <option value="">Type</option>
        <option @if (old('type') == 'apartment') selected @endif value="apartment">Apartment</option>
        <option @if (old('type') == 'flat') selected @endif value="flat">Flat</option>
        <option @if (old('type') == 'house') selected @endif value="house">House</option>
        <option @if (old('type') == 'room') selected @endif value="room">Room</option>
        <option @if (old('type') == 'shop') selected @endif value="shop">Shop</option>
      </select>
      <select name="purpose">
        <option value="">Purpose</option>
        <option @if (old('purpose') == 'rent') selected @endif value="rent">Rent</option>
        <option @if (old('purpose') == 'sell') selected @endif value="sell">Sell</option>
      </select>
      <select name="status">
        <option value="">Status</option>
        <option @if (old('status') == 'allowed') selected @endif value="allowed">Allowed</option>
        <option @if (old('status') == 'sold') selected @endif value="sold">Sold</option>
        <option @if (old('status') == 'pending') selected @endif value="pending">Pending</option>
        <option @if (old('status') == 'featured') selected @endif value="featured">Featured</option>
        <option @if (old('status') == 'denied') selected @endif value="denied">Denied</option>
      </select>
      <select name="bed">
        <option value="">Bed</option>
        <option @if (old('bed') == '1') selected @endif value="1">1</option>
        <option @if (old('bed') == '2') selected @endif value="2">2</option>
        <option @if (old('bed') == '3') selected @endif value="3">3</option>
        <option @if (old('bed') == '4') selected @endif value="4">4</option>
        <option @if (old('bed') == '5') selected @endif value="5">5</option>
        <option @if (old('bed') == '6') selected @endif value="6">6</option>
      </select>
      <select name="bath">
        <option value="">Bath</option>
        <option @if (old('bath') == '1') selected @endif value="1">1</option>
        <option @if (old('bath') == '2') selected @endif value="2">2</option>
        <option @if (old('bath') == '3') selected @endif value="3">3</option>
        <option @if (old('bath') == '4') selected @endif value="4">4</option>
        <option @if (old('bath') == '5') selected @endif value="5">5</option>
        <option @if (old('bath') == '6') selected @endif value="6">6</option>
      </select>
      <select name="floor">
        <option value="">Floor</option>
        <option @if (old('floor') == '1') selected @endif value="1">1</option>
        <option @if (old('floor') == '2') selected @endif value="2">2</option>
        <option @if (old('floor') == '3') selected @endif value="3">3</option>
        <option @if (old('floor') == '4') selected @endif value="4">4</option>
        <option @if (old('floor') == '5') selected @endif value="5">5</option>
        <option @if (old('floor') == '6') selected @endif value="6">6</option>
        <option @if (old('floor') == '7') selected @endif value="7">7</option>
        <option @if (old('floor') == '8') selected @endif value="8">8</option>
        <option @if (old('floor') == '9') selected @endif value="9">9</option>
        <option @if (old('floor') == '10') selected @endif value="10">10</option>
        <option @if (old('floor') == '11') selected @endif value="11">11</option>
        <option @if (old('floor') == '12') selected @endif value="12">12</option>
        <option @if (old('floor') == '13') selected @endif value="13">13</option>
        <option @if (old('floor') == '14') selected @endif value="14">14</option>
        <option @if (old('floor') == '15') selected @endif value="15">15</option>
      </select>
      <input type="number" name="sq_ft_from" value="{{old('sq_ft_from')}}" placeholder="Sq Ft From">
      <input type="number" name="sq_ft_to" value="{{old('sq_ft_to')}}" placeholder="Sq Ft To">
      <input type="number" name="price_from" value="{{old('price_from')}}" placeholder="Price From">
      <input type="number" name="price_to" value="{{old('price_to')}}" placeholder="Price To">
      <select name="orderby">
        <option value="">Order By</option>
        <option @if (old('orderby') == 'most_recent') selected @endif value="most_recent">Most recent</option>
        <option @if (old('orderby') == 'most_previous') selected @endif value="most_previous">Most previous</option>
        <option @if (old('orderby') == 'price_h_l') selected @endif value="price_h_l">Price high to low</option>
        <option @if (old('orderby') == 'price_l_h') selected @endif value="price_l_h">Price low to high</option>
        <option @if (old('orderby') == 'feet_h_l') selected @endif value="feet_h_l">Sq ft high to low</option>
        <option @if (old('orderby') == 'feet_l_h') selected @endif value="feet_l_h">Sq ft low to high</option>
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
