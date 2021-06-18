@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Customer
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Customer Name</th>
                                    <th>Mobile no.</th>
                                    <th>Customer Address</th>
                                    <th>Gender</th>
                                    <th>Profile Picture</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->display_name }}</td>
                                        <td>{{ $customer->mobile_no }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->gender }}</td>
                                        <td><img src="{{ asset('public/' . $customer->image) }}" width="70px"
                                                height="70px;">
                                        </td>
                                        <td>
                                            <input data-id="{{ $customer->id }}"
                                                onchange="changeStatus({{ $customer->id }}, {{ $customer->status ? 0 : 1 }})"
                                                class="toggle-class" type="checkbox" data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                data-off="InActive" {{ $customer->status ? 'checked' : '' }}>

                                        </td>

                                        <td>
                                            <button type="button" value="{{ $customer->id }}"
                                                class="btn btn-outline btn-success btn getDeliveryAddressBtn"><i
                                                    class="fa fa-map-marker" aria-hidden="true"></i>
                                            </button>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <div class="modal fade" id="deliveryAddressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="padding:5px; color:maroon;" id="myModalLabel">Delivery Details</h4>
                </div>
                <div class="modal-body">
                    <div class="row " style="padding:10px 190px; color:rgb(197, 97, 14); font-size:1.6em">

                        <label id="customerName"></label>

                    </div>
                    <div class="row " id="deliveryAddressesContent" style="padding:10px;">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>


@endsection

@push('custom-scripts')
    <script>
        function changeStatus(id, status) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `customers/changeStatus/${id}/${status}`,
                success: function(data) {
                    console.log(data.success)
                }
            });
        }
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.getDeliveryAddressBtn').click(function() {
                $('#deliveryAddressesContent').html('')
                let customerId = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: `{{ url('dashboard/customers/getDeliveryAddresses') }}/${customerId}`,
                    dataType: 'json'
                }).then(function(responseData) {
                    const {
                        success,
                        data,
                        customer_name
                    } = responseData;
                    if (success) {

                        $('#customerName').text(customer_name)
                        $.each(data, function(index, value) {
                            $('#deliveryAddressesContent').prepend(`
                                        <div class="col-sm-6">
                                        <div style="padding:5px 10px 0px 20px; border-radius:20px; border: 1px solid #CC473F">
                                            <label>Delivery Area: ${value.delivery_area}</label>
                                             <hr style="margin-top:0px; margin-bottom:5px;">

                                            <label>Complete Address: ${value.complete_address}</label>
                                            <hr style="margin-top:0px; margin-bottom:5px;">

                                            <label>Contact No: ${value.contact_no}</label>
                                            <hr style="margin-top:0px; margin-bottom:5px;">          
                                        </div>
                                        </div>
                                    `)
                        });
                        $('#deliveryAddressModal').modal();
                    }
                });
            });


        });

    </script>
@endpush
