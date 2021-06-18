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
                                        class="list-group-item list-group-item-action"><i aria-hidden="true"
                                            class="mdi mdi-map-marker-circle"></i> My Address</a>
                                    <a href="{{ route('orderlist') }}" class="list-group-item list-group-item-action active"><i
                                            aria-hidden="true" class="mdi mdi-format-list-bulleted" ></i> Order List</a>
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
                        {{-- <div class="col-md-8">
                            <div class="card card-body account-right">
                                <div class="widget">
                                    <div class="section-header">
                                        <h4 class="font-weight-bold mt-0 mb-3">Order List</h4>

                                    </div> --}}
                        {{-- <form>
                                        <div class="row">

                                            @foreach ($orders as $key => $order)
                                                <div class="col-sm-12">
                                                    <div class="card offer-card shadow-sm mb-4 border-0">
                                                        <div class="card-body">
                                                            <div style="padding: 5px 10px 0px 20px; border-radius:10px; border:1px solid #800000;">
                                                            <p class="card-text mb-1 "
                                                                style="font-size:14px; color:black; padding-left:50px">
                                                                <span
                                                                class="badge badge-pill badge-{{ $order->status === 1 ? 'primary' : ($order->status === 2 ? 'success' : ($order->status === 3 ? 'warning' : ($order->status === 4 ? 'default' : 'danger'))) }}" style="margin-left:-50px;">{{ $order->status === 1 ? 'Delivered' : ($order->status === 2 ? 'Approved' : ($order->status === 3 ? 'Pending' : ($order->status === 4 ? 'New' : 'Declined'))) }}</span>
                                                                <span class="float-right">{{ $order->ordered_at}}</span><br>
                                                            
                                                                    Order Number:<br>
                                                             {{ $order->order_no}}
                                                              
                                                              {{ $countOrders}}
                                                              

                                                               
                                                             <span class="float-right">   Total Amount:</div>
                                                            <span class="float-right">  RS. {{ $order->gross_amount}}</span>
                                                           
                                                        </div>
                                                                
                                                            
                                                           
                                                                </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                            
                                    </form> --}}
                        <div class="col-md-8">
                            <div class="card card-body account-right">
                                <div class="widget">
                                    <div class="section-header">
                                        <h5 class="heading-design-h5">
                                            Order List
                                        </h5>
                                    </div>
                                    <div class="order-list-tabel-main table-responsive">
                                        <table class="datatabel table table-striped table-bordered order-list-tabel"
                                            width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Order Number</th>
                                                    <th>Ordered at</th>
                                                    <th>Status</th>
                                                    <th>Total Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $key => $order)
                                                    <tr>

                                                        <td>{{ $order->order_no }}</td>
                                                        <td>{{ $order->ordered_at }}</td>
                                                        <td><span
                                                                class="badge badge-pill badge-{{ $order->status === 1 ? 'primary' : ($order->status === 2 ? 'success' : ($order->status === 3 ? 'warning' : ($order->status === 4 ? 'warning':($order->status === 5 ? 'info' : 'danger')))) }}">{{ $order->status === 1 ? 'Dispatch' : ($order->status === 2 ? 'on the way' : ($order->status === 3 ? 'preparing' : ($order->status === 4 ? 'pending' : ($order->status === 5 ? 'new': 'Declined'))))}}</span>
                                                        </td>
                                                        <td>RS. {{ $order->gross_amount }}</td>
                                                        <td>
                                                            {{-- <td><button type="button" value="{{ $order->id }}"
                                            class="btn btn-outline btn-success"><i
                                                class="fa fa-map-marker" aria-hidden="true"></i>
                                        </button> --}}
                                                            <button type="button" value="{{ $order->id }}"
                                                                class="btn btn-success getOrderItemsBtn" data-toggle="modal"
                                                                data-target="#orderedItemsModal"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i>

                                                            </button>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <div class="modal fade" id="orderedItemsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="orderedItemsContent" style="padding:10px;">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.getOrderItemsBtn').click(function() {
                $('#orderedItemsContent').html('')

                let orderId = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: `{{ url('getOrderItems') }}/${orderId}`,
                    dataType: 'json'
                }).then(function(responseData) {
                    const {
                        success,
                        data
                    } = responseData;
                    if (data.length == 0) {
                        $('#orderedItemsContent').html(`
                        <h4 style="margin-left:225px;">Empty</h4>
                        `)
                        return;
                    }
                    $('#orderedItemsContent').prepend(`               
                                    <div class="col-sm-12">
                                        <div class="card">
                                        <div class="card-body"  style="height:20px; margin-bottom:10px; margin-top:-13px">
                                        <div class="row">
                                        <div class="col-sm-3">
                                            <b>Item Name:</b>
                                            </div>
                                            <div class="col-sm-3">
                                            <b>Quantity:</b>
                                            </div>
                                            <div class="col-sm-3">
                                            <b>Rate:</b>
                                            </div>
                                            <div class="col-sm-3">
                                            <b>Amount:</b>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                             `)
                    $.each(data, function(index, value) {

                        $('#orderedItemsContent').append(`               
                                    <div class="col-sm-12">
                                        <div class="card">
                                        <div class="card-body" style="height:20px; margin-bottom:10px; margin-top:-13px">
                                        <div class="row">
                                        <div class="col-sm-3">
                                          
                                            <p class="card-text">${value.name}</</p>
                                            </div>
                                            <div class="col-sm-3">
                                       
                                            <p class="card-text" style="text-align:center;">${value.quantity}<p>
                                            </div>
                                            <div class="col-sm-3">
                                           
                                            <p class="card-text">Rs. ${value.price}<p>
                                            </div>
                                            <div class="col-sm-3">
                                        
                                            <p class="card-text">Rs. ${value.amount}<p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                             `)
                    });
                    $('#orderedItemsModal').modal();
                });
            });
        });

    </script>
@endpush
