@extends('adminHome/main')

  @section('pendingPropertyDetail')

    <!-- ##### Listings Content Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Single Listings Slides -->
                    <div class="single-listings-sliders owl-carousel">
                        <!-- Single Slide -->
                        @foreach($picture as $p)
                        <img src="../{{$p->image}}" alt="">
                        @endforeach
                        <!-- Single Slide -->
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="listings-content">
                        <h5>Property Id: {{$property->property_id}}</h5>
                        <h5>Type: {{$property->p_type}}</h5>
                        <h5>Purpose: {{$property->style}}</h5>
                        <h5>Purpose: {{$property->status}}</h5>
                        <h5>Title: {{$property->title}}</h5>
                        <!-- Price -->
                        <div class="list-price">
                            <p>Tk{{$property->property_price}}</p>
                        </div>

                        <p class="location"><img src="../img/icons/location.png" alt="">{{$property->property_area}}</p>
                        <p>{{$property->description}}</p>
                        <!-- Meta -->
                        <div class="property-meta-data d-flex align-items-end">
                            <div class="new-tag">
                                <img src="../img/icons/new.png" alt="">
                            </div>
                            <div class="bathroom">
                                <img src="../img/icons/bathtub.png" alt="">
                                <span>{{$property->bath}}</span>
                            </div>
                            <div class="garage">
                                <img src="../img/icons/bed.png" alt="">
                                <span>{{$property->bed}}</span>
                            </div>
                            <div class="space">
                                <img src="../img/icons/space.png" alt="">
                                <span>{{$property->feet}} sq ft</span>
                            </div>
                        </div>
                        <br><br><br>
                        <h2>Do you want to</h2>

                        <h2> <a href="{{route('adminHome.accept', $property->property_id)}}"> <button type="button" class="btn btn-outline-success" name="button">Accept</button> <a> </h2>
                        <h2> <a href="{{route('adminHome.deny', $property->property_id)}}"> <button type="button" class="btn btn-outline-danger" name="button">Deny</button> <a> </h2>

                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact-realtor-wrapper">
                        <div class="realtor-info">
                            <img src="../users/{{$customer->c_image}}" alt="">
                            <div class="realtor---info">
                                <h2><a href="{{route('adminHome.customerDetail', $customer->username)}}"><button type="button" name="button" class="btn btn-outline-primary">{{$customer->name}}</button> </a> </h2>
                                <p>Realtor</p>
                                <h6><img src="../img/icons/phone-call.png" alt=""> {{$customer->phone}}</h6>
                                <h6><img src="../img/icons/envelope.png" alt=""> {{$customer->email}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listing Maps -->
            <div class="row">
                <div class="col-12">
                    <div class="listings-maps mt-100">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Listings Content Area End ##### -->

  @endsection

  @section('title')
    Pending Property Detail
  @endsection
