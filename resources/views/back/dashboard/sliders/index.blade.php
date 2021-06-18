@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">View Sliders</h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         Slider
                         <button type="submit" class="btn btn-outline btn-success btn-xs pull-right" data-toggle="modal" data-target="#createSliderModal"><i class="fa fa-plus-circle" aria-hidden="true">Create Sliders</i>
                         </button>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Slider Title</th>
                                    <th>Image</th>
                                    <th>Slider Type</th>
                                    <th>Expires on</th>
                                    <th>Status</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $key => $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td><img src="{{ asset('public/' . $slider->image) }}" width="70px" height="70px;">
                                        <td>{{ $slider->type }}</td>
                                        <td>{{ $slider->expires_on }}</td>
                                        <td><span
                                                class="badge badge-pill badge-{{ $slider->status ? 'success' : 'warning' }}">{{ $slider->status ? 'Active' : 'Inactive' }}</span>
                                        </td>

                                        <td>
                                            <div class="action_btn">
                                                <a href="{{ route('sliders.edit', $slider->id) }}"
                                                    class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>

                                                <button class="btn btn-danger pull-right" onclick="return deleteToast()"
                                                    type="button"><i class="fa fa-trash"></i> Delete</button>
                                                <form class="deleteForm" action="{{ route('sliders.destroy', $slider->id) }}"
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
        <div class="modal fade" id="createSliderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Create Sliders</h4>
                </div>
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="">
                            </div>
                
                            <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" name="image" id="image">
                            </div>
                
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="Slider">Slider</option>
                                    <option value="Banner">Banner</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Expires on:</label>
                                <input type="date" class="form-control" id="expires_on" name="expires_on" value="">
                            </div>
                
                            <div class="form-group">
                                <label for="status">Select status</label>
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
