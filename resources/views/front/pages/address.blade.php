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
                                    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action"><i
                                            aria-hidden="true" class="mdi mdi-account-outline"></i> My Profile </a>
                                    <a href="{{ route('deliveryAddress') }}"
                                        class="list-group-item list-group-item-action active"><i aria-hidden="true"
                                            class="mdi mdi-map-marker-circle"></i> My Address</a>
                                    <a href="{{ route('orderlist') }}" class="list-group-item list-group-item-action"><i
                                            aria-hidden="true" class="mdi mdi-format-list-bulleted"></i> Order List</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
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
                                        <h4 class="font-weight-bold mt-0 mb-3">Contact Addresses</h4>

                                    </div>
                                    <form>
                                        <div class="row">

                                            @foreach ($deliveryAddresses as $key => $deliveryAddress)
                                                <div class="col-sm-6">
                                                    <div class="card offer-card shadow-sm mb-4 border-0">
                                                        <div class="card-body">
                                                            <div class="mr-3 pull-left"><i
                                                                    class="fa fa-{{ $deliveryAddress->icon_name }} fa-3x"></i>
                                                            </div>
                                                            <h6 class="mb-1 text-secondary">
                                                                {{ $deliveryAddress->nickname }}
                                                            </h6>
                                                            <p class="card-text mb-1 "
                                                                style="font-size:14px; color:black; padding-left:50px">

                                                                {{ $deliveryAddress->delivery_area }}<br>

                                                                {{ $deliveryAddress->complete_address }}<br>
                                                                {{ $deliveryAddress->contact_no }}

                                                                <hr>
                                                                <button type="button"
                                                                    class="btn btn-outline-primary btn-sm editAddressbtn"
                                                                    data-toggle="modal" data-target="#editDeliveryAddress"
                                                                    value={{ $deliveryAddress->id }}><i
                                                                        class=" fa fa-pencil"></i> Edit</button>
                                                                        <a
                                                href="{{ route('address.destroy', $deliveryAddress->id) }}"
                                                class="btn btn-outline-danger btn-sm"> <i
                                                class=" fa fa-trash"></i> Delete</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
    <div class="modal fade" id="editDeliveryAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Delivery Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data" id="addressForm">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Delivery Area</span></label>
                                    <input class="form-control border-form-control" name="delivery_area" id="delivery_area"
                                        value="" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> Complete Address</span></label>
                                    <input class="form-control border-form-control" name="complete_address"
                                        id="complete_address" value="" placeholder="" type="text">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Phone</span></label>
                                    <input class="form-control border-form-control" name="contact_no" id="contact_no"
                                        value="" placeholder="" type="text">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $(document).on("click", '.editAddressbtn', function() {
                id = $(this).val();
                $.ajax({
                    method: 'get',
                    url: `profile/editAddress/${id}`,
                    success: function(data) {
                        var delivery_area = data.delivery_area;
                        var contact_no = data.contact_no;
                        var complete_address = data.complete_address;
                        $("#delivery_area").val(delivery_area);
                        $("#complete_address").val(complete_address);
                        $("#contact_no").val(contact_no);
                        var url = `{{ url('updateAddress/${id}') }}`;
                        $('#addressForm').attr('action', url);
                    }

                });
            });
        });

    </script>

    {{-- <script>
$(document).ready(function() {
            $(document).on("click", '#deleteAddress', function() {
                id = $(this).val();
                alert(id)
                $.ajax({
                    method: 'get',
                    url: `deketeAddress/${id}`,
                    success: function(data) {
                       location.reload();
                    }

                });        
            });
        });
    </script> --}}
@endpush
