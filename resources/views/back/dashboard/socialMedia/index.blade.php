@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Social Media List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Social Media
                        <button type="submit" class="btn btn-outline btn-success pull-right" data-toggle="modal"
                            data-target="#createSocialMediaModal"><i class="fa fa-plus-circle" aria-hidden="true">Create
                                Social Media </i>
                        </button>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Type</th>
                                    <th>Link</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($social_media as $key => $socialMedia)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $socialMedia->type }}</td>
                                        <td>{{ $socialMedia->link }}</td>
                                        <td><input data-id="{{ $socialMedia->id }}"
                                            onchange="changeStatus({{ $socialMedia->id }}, {{ $socialMedia->status ? 0 : 1 }})"
                                            class="toggle-class" type="checkbox" data-onstyle="success"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-off="InActive" {{ $socialMedia->status ? 'checked' : '' }}>
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
        <div class="modal fade" id="createSocialMediaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Create SocialMedia</h4>
                    </div>
                    <form action="{{ route('socialMedias.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body" id="media">
                            @csrf

                            <div class="form-group">
                                <label for="type">SocialMedia Type:</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="whatsapp">Whatsapp</option>
                                    <option value="google">Google</option>
                                    <option value="gmail">Gmail</option>
                                    <option value="linkedin">LinkedIn</option>
                                    <option value="facebook-messenger">Facebook-messenger</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="link">Link:</label>
                                <input type="url" class="form-control" id="link" name="link" placeholder="Enter the link here">
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
                function changeStatus(id, status) {
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                    url: `socialMedias/changeStatus/${id}/${status}`,
                        success: function(data) {
                            console.log(data.success)
                        }
                    });
                }
        
            </script>
        @endpush
        