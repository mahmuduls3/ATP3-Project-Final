@extends('adminHome/main')

@section('index')

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
          <th scope="col">Action</th>
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
          <td><a href="{{route('adminHome.customerDetail', $p->username)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$p->username}}</button></a> </td>
          <td>
            <a href="{{route('adminHome.accept', $p->property_id)}}"><button type="button" class="btn btn-outline-success mb-3" name="button">Accept</button> </a>
            <a href="{{route('adminHome.deny', $p->property_id)}}"><button type="button" class="btn btn-outline-danger" name="button">Deny</button> </a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
@endsection

@section('title')
  All Pending Properties
@endsection
