@extends('layout/main')
    <!-- ##### Hero Area Start ##### -->
  @section('index')
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your home</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your dream house</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero3.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your perfect house</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                            <p>Search for your home</p>
                        </div>
                        <!-- Search Form -->
                        <form action="{{route('adminWebsite.searchListings')}}" method="post" id="advanceSearch">
                            <div class="row">
                              {{csrf_field()}}
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <input type="input" class="form-control" value="{{old('title')}}" name="title" placeholder="Title">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <input type="input" class="form-control" value="{{old('location')}}" name="location" placeholder="Location">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <select class="form-control" id="catagories" name="type">
                                          <option value="">Type</option>
                                          <option @if (old('type') == 'apartment') selected @endif value="apartment">Apartment</option>
                                          <option @if (old('type') == 'flat') selected @endif value="flat">Flat</option>
                                          <option @if (old('type') == 'house') selected @endif value="house">House</option>
                                          <option @if (old('type') == 'room') selected @endif value="room">Room</option>
                                          <option @if (old('type') == 'shop') selected @endif value="shop">Shop</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <select name="purpose" class="form-control" id="offers">
                                          <option value="">Purpose</option>
                                          <option @if (old('purpose') == 'rent') selected @endif value="rent">Rent</option>
                                          <option @if (old('purpose') == 'sell') selected @endif value="sell">Sell</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select name="status" class="form-control" id="listings">
                                          <option value="">Status</option>
                                          <option @if (old('status') == 'allowed') selected @endif value="allowed">Allowed</option>
                                          <option @if (old('status') == 'sold') selected @endif value="sold">Sold</option>
                                          <option @if (old('status') == 'pending') selected @endif value="pending">Pending</option>
                                          <option @if (old('status') == 'featured') selected @endif value="featured">Featured</option>
                                          <option @if (old('status') == 'denied') selected @endif value="denied">Denied</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <select name="bed" class="form-control" id="bedrooms">
                                          <option value="">Bed</option>
                                          <option @if (old('bed') == '1') selected @endif value="1">1</option>
                                          <option @if (old('bed') == '2') selected @endif value="2">2</option>
                                          <option @if (old('bed') == '3') selected @endif value="3">3</option>
                                          <option @if (old('bed') == '4') selected @endif value="4">4</option>
                                          <option @if (old('bed') == '5') selected @endif value="5">5</option>
                                          <option @if (old('bed') == '6') selected @endif value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select name="bath" class="form-control" id="bathrooms">
                                            <option value="">Bath</option>
                                            <option @if (old('bath') == '1') selected @endif value="1">1</option>
                                            <option @if (old('bath') == '2') selected @endif value="2">2</option>
                                            <option @if (old('bath') == '3') selected @endif value="3">3</option>
                                            <option @if (old('bath') == '4') selected @endif value="4">4</option>
                                            <option @if (old('bath') == '5') selected @endif value="5">5</option>
                                            <option @if (old('bath') == '6') selected @endif value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                      <select name="floor" class="form-control" id="bathrooms">
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
                                </div>

                                <div class="col-12 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="sq_ft_from" value="{{old('sq_ft_from')}}" placeholder="Sq Ft From">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="sq_ft_to" value="{{old('sq_ft_to')}}" placeholder="Sq Ft To">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="price_from" value="{{old('price_from')}}" placeholder="Price From">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="price_to" value="{{old('price_to')}}" placeholder="Price To">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select name="orderby"  class="form-control" id="orderby">
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

                                <!-- Submit -->
                                <div class="col-12 d-flex justify-content-between align-items-end">
                                    <!-- More Filter -->
                                    <div class="more-filter">
                                        <a href="#" id="moreFilter"></a>
                                    </div>
                                    <!-- Submit -->
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn south-btn">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Advance Search Area End ##### -->

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Featured Properties</h2>
                        <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                    </div>
                </div>
            </div>

            <div class="row">
              @foreach($property as $p)
                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="img/bg-img/feature1.jpg" alt="">

                            <div class="tag">
                                <span>For {{$p->style}}</span>
                            </div>
                            <div class="list-price">
                                <p>Tk{{$p->property_price}}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5><a href="{{route('adminWebsite.singleListings', $p->property_id)}}">{{$p->title}}</a></h5>
                            <p class="location"><img src="img/icons/location.png" alt="">{{$p->property_area}}</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="img/icons/bathtub.png" alt="">
                                    <span>{{$p->bath}}</span>
                                </div>
                                <div class="garage">
                                    <img src="img/icons/bed.png" alt="">
                                    <span>{{$p->bed}}</span>
                                </div>
                                <div class="space">
                                    <img src="img/icons/space.png" alt="">
                                    <span>{{$p->feet}} sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ##### Call To Action Area Start ##### -->
    <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/cta.jpg)">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="300ms">Are you looking for a place to rent?</h2>
                        <h6 class="wow fadeInUp" data-wow-delay="400ms">Suspendisse dictum enim sit amet libero malesuada feugiat.</h6>
                        <a href="#" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    <section class="south-testimonials-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                        <h2>Client testimonials</h2>
                        <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonials Area End ##### -->

    <!-- ##### Editor Area Start ##### -->
    <section class="south-editor-area d-flex align-items-center">
        <!-- Editor Content -->
        <div class="editor-content-area">
            <!-- Section Heading -->
            <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                <img src="img/icons/prize.png" alt="">
                <h2>jeremy Scott</h2>
                <p>Realtor</p>
            </div>
            <p class="wow fadeInUp" data-wow-delay="500ms">Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.</p>
            <div class="address wow fadeInUp" data-wow-delay="750ms">
                <h6><img src="img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                <h6><img src="img/icons/envelope.png" alt=""> office@template.com</h6>
            </div>
            <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
                <img src="img/core-img/signature.png" alt="">
            </div>
        </div>

        <!-- Editor Thumbnail -->
        <div class="editor-thumbnail">
            <img src="img/bg-img/editor.jpg" alt="">
        </div>
    </section>
    <!-- ##### Editor Area End ##### -->
  @endsection

  @section('title')
    Property Rental Management System | Home
  @endsection
