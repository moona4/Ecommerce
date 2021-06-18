@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">FAQs List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        FAQs

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $key => $faq)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faq->name }}</td>
                                        <td>{{ $faq->email }}</td>
                                        <td>{{ $faq->mobile_no }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->answer }}</td>
                                        <td><input data-id="{{ $faq->id }}"
                                                onchange="changeStatus({{ $faq->id }}, {{ $faq->status ? 0 : 1 }})"
                                                class="toggle-class" type="checkbox" data-onstyle="success"
                                                data-offstyle="warning" data-toggle="toggle" data-on="Approved"
                                                data-off="Pending" {{ $faq->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger pull-right" onclick="return deleteToast()"
                                                type="button"><i class="fa fa-trash"></i> Delete</button>
                                            <form class="deleteForm" action="{{ route('faqs.destroy', $faq->id) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                            </form>
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
                url: `faq/changeStatus/${id}/${status}`,
                success: function(data) {
                    console.log(data.success)
                }
            });
        }
    
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
