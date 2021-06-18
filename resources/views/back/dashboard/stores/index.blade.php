@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Store List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Stores
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th> Name</th>
                                    <th> Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $key => $store)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $store->name }}</td>
                                        <td>
                                            <input data-id="{{ $store->id }}"
                                                onchange="changeStatus({{ $store->id }}, {{ $store->status ? 0 : 1 }})"
                                                class="toggle-class" type="checkbox" data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                data-off="InActive" {{ $store->status ? 'checked' : '' }}>

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
                url: `stores/changeStatus/${id}/${status}`,
                success: function(data) {
                    console.log(data.success)
                }
            });
        }

    </script>
@endpush
