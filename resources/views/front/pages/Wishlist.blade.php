@extends('front.layouts.main')
@section('content')

    <section class="account-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="card account-left">
                                <div class="user-profile-header">
                                    <img alt="logo"
                                        src="https://ui-avatars.com/api/?name={{ Auth::guard('customer')->user()->display_name }}">
                                    <h5 class="mb-1 text-secondary"><strong>Hi </strong>
                                        {{ Auth::guard('customer')->user()->first_name }}</h5>
                                    <p>{{ Auth::guard('customer')->user()->mobile_no }}</p>
                                </div>
                                <div class="list-group">
                                    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action"><i
                                            aria-hidden="true" class="mdi mdi-account-outline"></i> My Profile</a>
                                    <a href="{{ route('address') }}" class="list-group-item list-group-item-action"><i
                                            aria-hidden="true" class="mdi mdi-map-marker-circle"></i> My Address</a>
                                    <a href="{{ route('wishlist') }}"
                                        class="list-group-item list-group-item-action active"><i aria-hidden="true"
                                            class="mdi mdi-heart-outline"></i> Wish List </a>
                                    <a href="{{ route('orderlist')}}" class="list-group-item list-group-item-action"><i
                                            aria-hidden="true" class="mdi mdi-format-list-bulleted"></i> Order List</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i
                                            class="mdi mdi-lock"></i>{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('customers.logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card card-body account-right">
                                <div class="widget">
                                    <div class="section-header">
                                        <h5 class="heading-design-h5">
                                            Wishlist
                                        </h5>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <div class="product">
                                                <a href="#">
                                                    <div class="product-header">
                                                        <span class="badge badge-success">50% OFF</span>
                                                        <img alt="" src="img/item/1.jpg" class="img-fluid">
                                                        <span class="veg text-success mdi mdi-circle"></span>
                                                    </div>
                                                    <div class="product-body">
                                                        <h5>Product Title Here</h5>
                                                        <h6><strong><span class="mdi mdi-approval"></span> Available
                                                                in</strong> - 500 gm</h6>
                                                    </div>
                                                    <div class="product-footer">
                                                        <button class="btn btn-secondary btn-sm float-right"
                                                            type="button"><i class="mdi mdi-cart-outline"></i> Add To
                                                            Cart</button>
                                                        <p class="offer-price mb-0">$450.99 <i
                                                                class="mdi mdi-tag-outline"></i><br><span
                                                                class="regular-price">$800.99</span></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <nav>
                                        <ul class="pagination justify-content-center mt-4">
                                            <li class="page-item disabled">
                                                <span class="page-link">Previous</span>
                                            </li>
                                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                                            <li class="page-item active">
                                                <span class="page-link">
                                                    2
                                                    <span class="sr-only">(current)</span>
                                                </span>
                                            </li>
                                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
