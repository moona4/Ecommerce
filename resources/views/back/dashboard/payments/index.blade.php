@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Payment List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Payment
                        <button type="submit" class="btn btn-outline btn-success pull-right" data-toggle="modal"
                            data-target="#createPaymentModal"><i class="fa fa-plus-circle" aria-hidden="true"> Create
                                Payment</i>
                        </button>
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="paymenttable">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $key => $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->type }}</td>
                                        <td>
                                            <img src="{{ asset('public/' . $payment->image) }}" width="30px" height="30px"
                                                alt="{{ $payment->type }}">
                                        </td>
                                        <td><input data-id="{{ $payment->id }}"
                                                onchange="changeStatus({{ $payment->id }}, {{ $payment->status ? 0 : 1 }})"
                                                class="toggle-class" type="checkbox" data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                data-off="InActive" {{ $payment->status ? 'checked' : '' }}>
                                        </td>
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
        <div class="modal fade" id="createPaymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Create Payment</h4>
                    </div>
                    <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf

                            <div class="form-group">
                                <label for="payment_type">Payment Type:</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="fonepay">Fonepay</option>
                                    <option value="khalti">Khalti</option>
                                    <option value="e-sewa">E-sewa</option>
                                    <option value="card">Card</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        function changeStatus(id, status) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `payments/changeStatus/${id}/${status}`,
                success: function(data) {
                    console.log(data.success)
                }
            });
        }

    </script>
@endpush
