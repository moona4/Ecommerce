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
                                    <span
                                        class="badge badge-success">{{ Auth::guard('customer')->user()->reward_point }}</span>
                                </div>
                                <div class="list-group">
                                    <a href="{{ route('profile') }}"
                                        class="list-group-item list-group-item-action active"><i aria-hidden="true"
                                            class="mdi mdi-account-outline"></i> My Profile</a>
                                    <a href="{{ route('deliveryAddress') }}"
                                        class="list-group-item list-group-item-action"><i aria-hidden="true"
                                            class="mdi mdi-map-marker-circle"></i> My Address</a>
                                    <a href="{{ route('orderlist') }}" class="list-group-item list-group-item-action"><i
                                            aria-hidden="true" class="mdi mdi-format-list-bulleted"></i> Order List</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logoutCustomer').submit();"><i
                                            class="mdi mdi-lock"></i>{{ __('Logout') }}
                                    </a>
                                    <form id="logoutCustomer" action="{{ route('customers.logout') }}" method="POST"
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
                                            My Profile
                                        </h5>
                                    </div>
                                    <form action="{{ route('customer-profile.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name <span
                                                            class="required">*</span></label>
                                                    <input class="form-control border-form-control"
                                                        value="{{ Auth::guard('customer')->user()->first_name }}"
                                                        placeholder="First Name"name="first_name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name <span
                                                            class="required">*</span></label>
                                                    <input class="form-control border-form-control"
                                                        value="{{ Auth::guard('customer')->user()->last_name }}"
                                                        placeholder="Last Name" name="last_name" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone <span
                                                            class="required">*</span></label>
                                                    <input class="form-control border-form-control"
                                                        value="{{ Auth::guard('customer')->user()->mobile_no }}"
                                                        placeholder="+977 " name="mobile_no" disabled type="number">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email Address <span
                                                            class="required">*</span></label>
                                                    <input class="form-control border-form-control "
                                                        value="{{ Auth::guard('customer')->user()->email }}"
                                                        placeholder="iamosahan@gmail.com" type="email" name="email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Address <span
                                                            class="required">*</span></label>
                                                    <textarea
                                                        class="form-control border-form-control" name="address">{{ Auth::guard('customer')->user()->address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <button type="button" class="btn btn-danger btn-lg"> Cancel </button>
                                                <button type="submit" class="btn btn-success btn-lg"> Save Changes </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
