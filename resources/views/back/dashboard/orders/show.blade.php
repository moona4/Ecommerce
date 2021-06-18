@extends('back.layouts.main')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order List</h1>

                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-lg" href="{{route('orders.index')}}">Back</a>
                    </div>
                </div>
            </div>
            
            <!-- /.col-lg-12 -->
        </div>

         

        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Store</th>       
                    </tr>
                </thead>
                <tbody>
                @foreach($order_items as $key => $item)
                    <tr>
                        <td>{{$loop ->iteration}}</td>
                        <td>{{$item->product_name}}</td>

                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->store_name}}</td>
                       </tr>
                @endforeach    
                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>

       
    </div>

@endsection
