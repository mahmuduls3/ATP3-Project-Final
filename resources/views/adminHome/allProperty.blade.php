@extends('adminHome/main')

@section('allProperty')
    <form method="post">
      {{csrf_field()}}
      <h3>Search Property</h3>
      <div class="form-group row">
        <div class="col-xs-2 mr-3">
          <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Title">
        </div>
        <div class="col-xs-2 mr-3">
          <input type="text" name="location" class="form-control" value="{{old('location')}}" placeholder="Location">
        </div>
        <div class="col-xs-2 mr-3">
          <select name="type" class="form-control mr-5">
            <option value="">Type</option>
            <option @if (old('type') == 'apartment') selected @endif value="apartment">Apartment</option>
            <option @if (old('type') == 'flat') selected @endif value="flat">Flat</option>
            <option @if (old('type') == 'house') selected @endif value="house">House</option>
            <option @if (old('type') == 'room') selected @endif value="room">Room</option>
            <option @if (old('type') == 'shop') selected @endif value="shop">Shop</option>
          </select>
        </div>
        <div class="col-xs-2 mr-3">
          <select name="purpose" class="form-control mr-3">
            <option value="">Purpose</option>
            <option @if (old('purpose') == 'rent') selected @endif value="rent">Rent</option>
            <option @if (old('purpose') == 'sell') selected @endif value="sell">Sell</option>
          </select>
        </div>
        <div class="col-xs-2 mr-3">
          <select name="status" class="form-control mr-3">
            <option value="">Status</option>
            <option @if (old('status') == 'allowed') selected @endif value="allowed">Allowed</option>
            <option @if (old('status') == 'sold') selected @endif value="sold">Sold</option>
            <option @if (old('status') == 'pending') selected @endif value="pending">Pending</option>
            <option @if (old('status') == 'featured') selected @endif value="featured">Featured</option>
            <option @if (old('status') == 'denied') selected @endif value="denied">Denied</option>
          </select>
        </div>
        <div class="col-xs-2 mr-3">
          <select name="bed" class="form-control mr-3">
            <option value="">Bed</option>
            <option @if (old('bed') == '1') selected @endif value="1">1</option>
            <option @if (old('bed') == '2') selected @endif value="2">2</option>
            <option @if (old('bed') == '3') selected @endif value="3">3</option>
            <option @if (old('bed') == '4') selected @endif value="4">4</option>
            <option @if (old('bed') == '5') selected @endif value="5">5</option>
            <option @if (old('bed') == '6') selected @endif value="6">6</option>
          </select>
        </div>
        <div class="col-xs-2 mr-3">
          <select name="bath" class="form-control mr-3">
            <option value="">Bath</option>
            <option @if (old('bath') == '1') selected @endif value="1">1</option>
            <option @if (old('bath') == '2') selected @endif value="2">2</option>
            <option @if (old('bath') == '3') selected @endif value="3">3</option>
            <option @if (old('bath') == '4') selected @endif value="4">4</option>
            <option @if (old('bath') == '5') selected @endif value="5">5</option>
            <option @if (old('bath') == '6') selected @endif value="6">6</option>
          </select>
        </div>
        <div class="col-xs-2 mr-3">
          <select name="floor" class="form-control mr-3">
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
        </div>
        <div class="col-xs-1 mr-3">
          <input type="number" class="form-control" name="sq_ft_from" value="{{old('sq_ft_from')}}" placeholder="Sq Ft From">
        </div>
        <div class="col-xs-1 mr-3">
          <input type="number" class="form-control" name="sq_ft_to" value="{{old('sq_ft_to')}}" placeholder="Sq Ft To">
        </div>
        <div class="col-xs-1 mr-3">
          <input type="number" class="form-control" name="price_from" value="{{old('price_from')}}" placeholder="Price From">
        </div>
        <div class="col-xs-1">
          <input type="number" class="form-control" name="price_to" value="{{old('price_to')}}" placeholder="Price To">
        </div>
        <div class="col-xs-4 mr-3 pr-5">
          <select name="orderby"  class="form-control mr-5 pr-5">
            <option value="">Order By</option>
            <option @if (old('orderby') == 'most_recent') selected @endif value="most_recent">Most recent</option>
            <option @if (old('orderby') == 'most_previous') selected @endif value="most_previous">Most previous</option>
            <option @if (old('orderby') == 'price_h_l') selected @endif value="price_h_l">Price high to low</option>
            <option @if (old('orderby') == 'price_l_h') selected @endif value="price_l_h">Price low to high</option>
            <option @if (old('orderby') == 'feet_h_l') selected @endif value="feet_h_l">Sq ft high to low</option>
            <option @if (old('orderby') == 'feet_l_h') selected @endif value="feet_l_h">Sq ft low to high</option>
          </select>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-outline-success" name="search">Search</button><br><br><br>
      </div>
    </form>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Location</th>
          <th scope="col">Type</th>
          <th scope="col">Purpose</th>
          <th scope="col">Bed</th>
          <th scope="col">Bath</th>
          <th scope="col">SQ FT</th>
          <th scope="col">Floor</th>
          <th scope="col">Status</th>
          <th scope="col">No. Of Clicks</th>
          <th scope="col">Posted Date</th>
          <th scope="col">Posted By</th>
        </tr>
      </thead>
      @foreach($property as $p)
      <tbody>
        <tr>
          <th scope="col">{{$p->property_id}}</th>
          <td><a href="{{route('adminHome.propertyDetail', $p->property_id)}}">{{$p->title}}</a></td>
          <td>{{$p->property_price}}</td>
          <td>{{$p->property_area}}</td>
          <td>{{$p->p_type}}</td>
          <td>{{$p->style}}</td>
          <td>{{$p->bed}}</td>
          <td>{{$p->bath}}</td>
          <td>{{$p->feet}}</td>
          <td>{{$p->floor}}</td>
          <td>{{$p->status}}</td>
          <td>{{$p->no_of_clicks}}</td>
          <td>{{$p->date}}</td>
          <td><a href="{{route('adminHome.customerDetail', $p->username)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$p->username}}</button> </a> </td>
        </tr>
      </tbody>
      @endforeach
    </table>

@endsection

@section('title')
  All Property
@endsection
