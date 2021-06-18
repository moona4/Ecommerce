@extends('back.layouts.main')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Orders
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th> Customer Name</th>
                                        <th>Order no.</th>
                                        <th>Gross Amount</th>
                                        <th>Discount</th>
                                        <th>Net Amount</th>
                                        <th>Payment Status </th>
                                        <th>Status</th> 
                                        <th>Action</th>   
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{$loop ->iteration}}</td>
                                        <td>{{$order->customer->display_name}}</td>
                                        <td>{{$order->order_no}}</td>
                                        <td>{{$order->gross_amount}}</td>
                                        <td>{{$order->discount}}</td>
                                        <td>{{$order->net_amount}}</td>
                                        <td><span class="badge badge-pill badge-{{$order->payment_status ? 'success' : 'warning'}}">{{ $order->payment_status ? 'Approved': 'Pending'}}</span></td>

                                        <td><span class="badge badge-pill badge-{{$order->status ===1? 'primary' : ($order->status ===2 ? 'success' : ($order->status ===3 ? 'warning':($order->status ===4 ? 'default':'danger')))}}"> {{ $order->status ===1 ? 'Delivered': ($order->status===2 ? 'Approved' :($order->status=== 3? 'Pending':($order->status=== 4? 'New':'Declined'))) }}</span></td>
                                       <td>
                                        <div class="action_btn">

                                            <a href="{{ route('orders.show', $order->id) }}"
                                                class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                           
                                        </div>
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
</div>
@endsection