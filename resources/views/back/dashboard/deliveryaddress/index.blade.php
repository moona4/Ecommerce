@extends('back.layouts.main')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Delivery Addresses List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Delivery Addresses
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Customer Name</th>
                                        <th>Delivery Area</th>
                                        <th>Complete Address</th>
                                        <th>Contact No</th>
                                        <th> Status</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($delivery_address as $key => $address)
                                    <tr>
                                        <td>{{$loop ->iteration}}</td>
                                        <td>{{$address->customer->display_name}}</td>
                                        <td>{{$address->delivery_area}}</td>
                                        <td>{{$address->complete_address}}</td>
                                        <td>{{$address->contact_no}}</td>
                                        <td><span class="badge badge-pill badge-{{$address->status ? 'success' : 'warning'}}">{{ $address->status ? 'Active': 'Inactive'}}</span></td>

                                       
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
@endsection