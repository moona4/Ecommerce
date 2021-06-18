@extends('front.layouts.main')

@section('content')
    <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('index')}}"><strong><span class="mdi mdi-home"></span> Home</strong></a>
                     <span class="mdi mdi-chevron-right"></span> <a href="{{route('categories')}}">Categories</a>

                </div>
            </div>
        </div>
    </section>

    <section class="shop-single section-padding pt-3">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="shop-detail-left">

                        <div class="favourite-icon">
                            <a class="fav-btn" title="" data-placement="bottom" data-toggle="tooltip" href="#"
                                data-original-title="59% OFF"><i class="mdi mdi-tag-outline"></i></a>
                        </div>
                        <div id="sync1" class="owl-carousel">
                            <div class="item"><img alt="" src="{{ asset('public/' . $categories->image) }}" class="img-fluid img-center" style="height:450px; width:450px;"></div>
                        </div>

                        <div id="sync2" class="owl-carousel">

                            <div class="item"><img class="img-fluid" src="" alt="" ></div>

                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="shop-detail-right">
                        <span class="badge badge-success">50% OFF</span>
                        <h2><strong>{{$categories->name}}</strong></h2>

                        {{-- <h6><strong><span class="mdi mdi-approval"></span> Available
                                in</strong> - 500 gm</h6> --}}

                        {{-- <a href="checkout.html"><button type="button"
                                class="btn btn-secondary btn-lg"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                        </a>  --}}

                        <div class="short-description">

                            <h5>
                                Quick Overview
                                <p class="float-right">No of items: <span class="badge badge-success"></span></p>
                            </h5>
                            <p><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b> Nam fringilla augue nec est
                                tristique auctor. Donec non est at libero vulputate rutrum.
                            </p>
                            <p class="mb-0"> Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada
                                tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                hiMenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse
                                aliquet urna pretium eros convallis interdum.</p>

                        </div>
                        <h6 class="mb-3 mt-4">Why order from Aayokhana?</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <i class="mdi mdi-truck-fast"></i>
                                    <h6 class="text-info">Free Delivery</h6>
                                    <p>Lorem ipsum dolor...</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <i class="mdi mdi-basket"></i>
                                    <h6 class="text-info">100% Guarantee</h6>
                                    <p>Rorem Ipsum Dolor sit...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="product-items-slider section-padding bg-white border-top">
        <div class="container">
            <div class="section-header">
                <h5 class="heading-design-h5">Best Offers View <span class="badge badge-primary">20% OFF</span>
                    <a class="float-right text-secondary" href="shop.html">View All</a>
                </h5>
            </div>

            <div class="owl-carousel owl-carousel-featured">
                @foreach ($cuisines as $key => $cuisine)

                    <div class="item">
                        <div class="product">
                            <a href="single.html">
                                <div class="product-header">
                                    <span class="badge badge-success">50% OFF</span>
                                    <img class="img-fluid" src="{{ asset('public/' . $cuisine->image) }}" alt="">
                                    <span class="veg text-success mdi mdi-circle"></span>
                                </div>
                                <div class="product-body">
                                    <h5>{{ $cuisine->name }}</h5><br/>
                                    {{-- <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6> --}}
                                </div>
                                <div class="product-footer">
                                    <button type="button" class="btn btn-secondary btn-sm float-right"><i
                                            class="mdi mdi-cart-outline"></i>
                                        Add To Cart</button>
                                    <p class="offer-price mb-0">{{ $cuisine->price }} <i
                                            class="mdi mdi-tag-outline"></i><br><span class="regular-price">Rs.
                                            {{ $cuisine->price + 99 }}</span></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </section>



@endsection
