@extends('front.layouts.main')

@section('content')
    <section class="carousel-slider-main text-center border-top border-bottom bg-white">
        <div class="owl-carousel owl-carousel-slider">
            @foreach ($sliders as $key => $slider)
                <div class="item">
                    <a href="#"><img class="img-fluid" src="{{ asset('public/' . $slider->image) }}" alt="First slide"
                            style="height:398px; width:1159px"></a>
                </div>

            @endforeach
        </div>
    </section>

    <section class="top-category section-padding">
        <div class="container">
            <div class="owl-carousel owl-carousel-category">
                @foreach ($categories as $key => $category)
                    <div class="item">
                        <div class="category-item">
                            <a href="{{ route('categoryWiseFood', $category->slug) }}">
                                <img class="img-fluid" src="{{ asset('public/' . $category->image) }}" alt="">
                                <h6>{{ $category->name }}</h6>
                                <p>{{ $category->no_of_items }} Items</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="section-header">
                <h5 class="heading-design-h5">Popular Cuisines 
                    <a class="float-right text-secondary" href="{{ route('products') }}">View All</a>
                </h5>
            </div>
            <div class="row no-gutters">
                @foreach ($popularCuisines as $key => $popularCuisine)
                    <div class="col-md-3">

                        <div class="product">
                            <a href="{{ route('products') }}">
                                <div class="product-header">
                                    <img class="img-fluid" src="{{ asset('public/' . $popularCuisine->image) }}" alt=""
                                        height="150px" width="150px">
                                    <span class="veg text-success mdi mdi-circle"></span>
                                </div>
                                <div class="product-body">
                                    <h5>{{ $popularCuisine->name }}</h5><br />
                                </div>
                            </a>
                            <div class="product-footer">

                                <button type="button" onclick="showToast()" data-id="{{ $popularCuisine->id }}"
                                    data-storeid="{{ $popularCuisine->store_id }}"
                                    data-itemname="{{ $popularCuisine->name }}"
                                    data-itemprice="{{ $popularCuisine->price }}"
                                    data-itemimage="{{ $popularCuisine->image }}"
                                    class="btn btn-secondary btn-sm float-right addToCart"><i
                                        class="mdi mdi-cart-outline"></i>
                                    Add To Cart</button>

                                <p class="offer-price mb-0">Rs. {{ $popularCuisine->price }}</p>
                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="offer-product">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <a href="#"><img class="img-fluid" src="{{ asset('public/front/img/add1.jpg') }}" alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="#"><img class="img-fluid" src="{{ asset('public/front/img/add2.jpg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="owl-carousel owl-carousel-featured">
                @foreach ($randomCuisines as $key => $randomCuisine)
                    <div class="item">
                        <div class="product">
                            <a href="#">
                                <div class="product-header">
                                    <img class="img-fluid" src="{{ asset('public/' . $randomCuisine->image) }}" alt=""
                                        height="150px" width="150px">
                                    <span class="veg text-success mdi mdi-circle"></span>
                                </div>
                                <div class="product-body">
                                    <h5>{{ $randomCuisine->name }} </h5><br />
                                </div>
                            </a>
                            <div class="product-footer">
                                <button type="button" onclick="showToast()" data-id="{{ $randomCuisine->id }}"
                                    data-storeid="{{ $randomCuisine->store_id }}"
                                    data-itemname="{{ $randomCuisine->name }}"
                                    data-itemprice="{{ $randomCuisine->price }}"
                                    data-itemimage="{{ $randomCuisine->image }}"
                                    class="btn btn-secondary btn-sm float-right addToCart"><i
                                        class="mdi mdi-cart-outline"></i>
                                    Add To Cart</button>
                                <p class="offer-price mb-0">Rs. {{ $randomCuisine->price }} <i
                                        class="mdi mdi-tag-outline"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="section-header">
                
                    <a class="float-right text-secondary" href="{{ route('products') }}">View All</a>
                </h5>
            </div>
            <div class="row no-gutters">
                @foreach ($cuisines as $key => $cuisine)
                    <div class="col-md-3">

                        <div class="product">
                            <a href="{{ route('products') }}">
                                <div class="product-header">

                                    <img class="img-fluid" src="{{ asset('public/' . $cuisine->image) }}" alt="">
                                    <span class="veg text-success mdi mdi-circle"></span>
                                </div>
                                <div class="product-body">
                                    <h5>{{ $cuisine->name }}</h5><br />
                                    {{-- <h6><strong><span class="mdi mdi-approval"></span>
                                            Available in</strong> - 500 gm</h6> --}}
                                </div>
                            </a>
                            <div class="product-footer">
                                <button type="button" data-id="{{ $cuisine->id }}"
                                    data-storeid="{{ $cuisine->store_id }}" data-itemname="{{ $cuisine->name }}"
                                    data-itemprice="{{ $cuisine->price }}" data-itemimage="{{ $cuisine->image }}"
                                    class="btn btn-secondary btn-sm float-right addToCart"><i
                                        class="mdi mdi-cart-outline"></i>
                                    Add To Cart</button>
                                <p class="offer-price mb-0">RS.{{ $cuisine->price }}</p>
                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
