@extends('adminHome/main')

@section('feedback')

    <form method="post">
      {{csrf_field()}}
      <div class="form-group row">
        <div class="col-xs-2 mr-3">
          <input type="text" name="from" class="form-control" value="{{old('from')}}" placeholder="Messages From">
        </div>
        <div class="col-xs-2 mr-3">
          <input type="text" name="to" class="form-control" value="{{old('to')}}" placeholder="Messages To">
        </div>
        <div class="col-xs-2 mr-3">
          <input type="text" name="msg" class="form-control" value="{{old('msg')}}" placeholder="Messages">
        </div>
        <div class="col-xs-2 mr-3">
          <select class="form-control" name="orderby">
            <option  @if (old('orderby') == 'most_recent') selected @endif value="most_recent">Most Recent</option>
            <option  @if (old('orderby') == 'most_previous') selected @endif value="most_previous">Most Previous</option>
          </select>
        </div>
        <div class="col-xs-2">
          <button type="submit" class="form-control btn btn-outline-success" name="search">Search</button>
        </div>
      </div>
    </form>
    <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Message Id</th>
          <th>From</th>
          <th>To</th>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
      @foreach($message as $m)
      <tbody>
        <tr>
          <th>{{$m->message_id}}</th>
          <td><a href="{{route('adminHome.customerDetail', $m->from)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$m->from}}</button> </a></td>
          <td><a href="{{route('adminHome.customerDetail', $m->to)}}"><button type="button" class="btn btn-outline-primary" name="button">{{$m->to}}</button> </a></td>
          <td>{{$m->msg}}</td>
          <td>{{$m->msg_date}}</td>
        </tr>
      </tbody>
      @endforeach
    </table>
@endsection

@section('title')
  Customer Feedback
@endsection
