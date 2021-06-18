@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Product
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Category</th>
                                    <th>Store</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->store->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><img src="{{ asset('public/' . $product->image) }}" width="70px" height="70px;">
                                        </td>
                                        <td><input data-id="{{ $product->id }}"
                                            onchange="changeStatus({{ $product->id }}, {{ $product->status ? 0 : 1 }})"
                                            class="toggle-class" type="checkbox" data-onstyle="success"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-off="InActive" {{ $product->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <div class="action_btn">

                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
                                               
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
    
    @push('custom-scripts')
    <script>
        function changeStatus(id, status) {
            $.ajax({
                type: "GET",
                dataType: "json",
            url: `products/changeStatus/${id}/${status}`,
                success: function(data) {
                    console.log(data.success)
                }
            });
        }

    </script>
@endpush
