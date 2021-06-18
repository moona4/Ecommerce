@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Offers List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Offers

                        <button type="submit" class="btn btn-outline btn-success btn-xs pull-right" data-toggle="modal"
                            data-target="#createOfferModal"><i class="fa fa-plus-circle" aria-hidden="true">Create
                                Offers</i>
                        </button>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Discount</th>
                                    <th>Discount Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $key => $offer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $offer->name }}</td>
                                        <td>{{ $offer->discount }}</td>
                                        <td>{{ $offer->discount_type }}</td>
                                        <td><span
                                                class="badge badge-pill badge-{{ $offer->status ? 'success' : 'warning' }}">{{ $offer->status ? 'Active' : 'Inactive' }}</span>
                                        </td>

                                        <td>
                                            <div class="action_btn">
                                                <a href="{{ route('offers.edit', $offer->id) }}"
                                                    class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>

                                                <button class="btn btn-danger pull-right" onclick="return deleteToast()"
                                                    type="button"><i class="fa fa-trash"></i> Delete</button>
                                                <form class="deleteForm" action="{{ route('offers.destroy', $offer->id) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
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

        <div class="modal fade" id="createOfferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Create Offers</h4>
                    </div>
                    <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="">
                            </div>
                            <div class="form-group">
                                <label for="name">Discount:</label>
                                <input type="text" class="form-control" id="discount" name="discount" value="">
                            </div>

                            <div class="form-group">
                                <label for="name">Discount Type:</label>
                                <select class="form-control" id="discount_type" name="discount_type">
                                    <option value="Fixed">Fixed</option>
                                    <option value="Percentage">Percentage</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        function deleteToast() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085D6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Data has been deleted.',
                        'success'
                    );
                    $('.deleteForm').submit();
                }
            })
        }

    </script>

@endpush
