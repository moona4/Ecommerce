@extends('front.layouts.main')
@section('content')
    <section class="checkout-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="checkout-step">
                        <div class="accordion" id="accordionExample">
                            <div class="card checkout-step-two">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button">
                                            <span class="number">1</span> Delivery Address
                                        </button>
                                    </h5>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="required">
                                                    <label class="control-label"> Name <span
                                                            class="required">*</span></label>
                                                    <input class="form-control border-form-control" name="name" value=""
                                                        id="name" placeholder="Gurdeep" type="text">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="required">
                                                    <label class="control-label">Phone <span
                                                            class="required">*</span></label>
                                                    <input class="form-control border-form-control" name="contact_no"
                                                        id="contact_no" value="" placeholder="987654320" type="number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="required">
                                                    <label class="control-label">City <span
                                                            class="required">*</span></label>
                                                    <select class="select2 form-control border-form-control"
                                                        name="delivery_area" id="delivery_area">
                                                        <option value="">Select City</option>
                                                        <option value="Butwal">Butwal</option>
                                                        <option value="AX">Kathmandu </option>
                                                        <option value="AL">Pokhara</option>
                                                        <option value="DZ">Biratnager</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="required">
                                                    <label class="control-label">Latitude <span
                                                            class="required">*</span></label>
                                                    <input class="form-control border-form-control" name="latitude"
                                                        id="latitude" value=""  type="number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="required">
                                                    <label class="control-label">Longitude <span
                                                            class="required">*</span></label>
                                                    <input class="form-control border-form-control" name="longitude"
                                                        id="longitude" value=""  type="number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="required">
                                                    <label class="control-label">Shipping Address <span
                                                            class="required">*</span></label>
                                                    <textarea class="form-control border-form-control"
                                                        name="complete_address" id="complete_address"></textarea>
                                                    <small class="text-danger">Please provide the number and
                                                        street.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <div class="required">
                                                    <label class="control-label">Delivery Instructions<span
                                                            class="required">*</span></label>
                                                    <textarea class="form-control border-form-control"
                                                        name="delivery_instructions" id="delivery_instructions"></textarea>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <button type="button" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                                            class="btn btn-secondary mb-2 btn-lg" id="delivery_address"
                                            disabled>NEXT</button>
                                    </div>
                                </div>

                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            <span class="number">2</span> Payment
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">


                                        <button id="checkoutBtn" type="button" type="button" data-toggle="collapse"
                                            data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour"
                                            class="btn btn-secondary mb-2 btn-lg">Cash On
                                            Delivery</button>

                                    </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                            <span class="number">3</span> Order Complete
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapsefour" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="col-lg-10 col-md-10 mx-auto order-done">
                                                <i class="mdi mdi-check-circle-outline text-secondary"></i>
                                                <h4 class="text-success">Congrats! Your Order has been Placed..</h4>

                                            </div>
                                            <div class="text-center">
                                                <a href="{{ url('/') }}"><button type="submit"
                                                        class="btn btn-secondary mb-2 btn-lg">Continue Carving</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header">My Cart</h5>
                        <div class="card-body pt-0 pr-0 pl-0 pb-0 fetchCartItems">
                            <div style="padding:20px 80px; color:maroon; font-size:1.5em">
                                Empty Cart
                            </div>
                        </div>
                    </div>
                    <div class="cart-sidebar-footer">
                        <div class="cart-store-details">
                            <p>Gross Amount <strong class="float-right grossAmount"></strong></p>
                            <input type="hidden" class="grossAmt" value="">
                            <p>Discount <strong class="float-right text-danger discount"></strong></p>
                            <input type="hidden" class="discont">
                            <h6>Net Amount <strong class="float-right text-danger netAmount"></strong></h6>
                            <input type="hidden" class="netAmt">
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="section-padding bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="feature-box">
                        <i class="mdi mdi-truck-fast"></i>
                        <h6>Free & Next Day Delivery</h6>
                        <p>Lorem ipsum dolor sit amet, cons...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="feature-box">
                        <i class="mdi mdi-basket"></i>
                        <h6>100% Satisfaction Guarantee</h6>
                        <p>Rorem Ipsum Dolor sit amet, cons...</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="feature-box">
                        <i class="mdi mdi-tag-heart"></i>
                        <h6>Great Daily Deals Discount</h6>
                        <p>Sorem Ipsum Dolor sit amet, Cons...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('custom-scripts')
    <script>
        $(function() {
            if (cartItems.length == 0) {
                window.open(`{{ URL('/') }}`, '_SELF');
            }
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getLocation);
            } else {
                console.log('Geolocation is not supported by this browser.');
            }

            function getLocation(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                $("#latitude").val(latitude);
                $("#longitude").val(longitude);
              
                // console.log(latitude);
                // console.log(longitude);
            }

            $(document).on('change',
                '#name, #contact_no, #delivery_area, #complete_address, #delivery_instructions',

                function() {
                    if ($('#name').val() == '' || $('#contact_no').val() == '' || $('#delivery_area').val() ==
                        '' ||
                        $('#complete_address').val() == '' || $('delivery_instructions').val() == '') {

                        $("#delivery_address").prop("disabled", true);
                    } else {
                        $("#delivery_address").prop("disabled", false);
                    }

                });
            $('#checkoutBtn').click(function() {
                // var form = $('#checkoutForm').FormData[0];;
                var formData = new FormData();
                // console.log($('#checkoutForm').serialize());


                let delivery_address = {
                    contact_no: $("#contact_no").val(),
                    delivery_area: $("#delivery_area").val(),
                    complete_address: $("#complete_address").val(),
                    delivery_instructions: $("#delivery_instructions").val()

                }
                if (delivery_address.contact_no == '' || delivery_address.delivery_area == '' ||
                    delivery_address.complete_address == '' || delivery_address.delivery_instructions == ''
                ) {

                    return;
                }

                let order_items = JSON.parse(localStorage.getItem('cartItems'));

                $.each(order_items, function(index, value) {
                    delete value.image;
                    delete value.name;
                    value['amount'] = value.quantity * value.price
                });


                let order = {
                    customer_id: {{ Auth::guard('customer')->user()->id }},
                    gross_amount: $(".grossAmt").val(),
                    discount: $(".discont").val(),
                    net_amount: $(".netAmt").val(),
                    order_items,
                    delivery_address

                }
                $.ajax({
                    method: 'POST',
                    url: `{{ route('checkout.store') }}`,
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        order
                    },
                    success: function(data) {
                        console.log(data.success)
                    }

                });

            });

        });

    </script>
@endpush
