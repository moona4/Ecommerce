@extends('back.layouts.main')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profile</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Profile
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                      <table class="table table-bordered table-condensed table-hovered">
                        <tbody>
                          <tr>
                            <th>Name</th>
                            <td>{{ $user->display_name }}</td>
                          </tr>
                          <tr>
                          <th>Username</th>
                          <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                          <th>Mobile no.</th>
                          <td>{{ $user->mobile_no }}</td>
                        </tr>
                        <tr>
                          <th>Address</th>
                          <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                          <th>Gender</th>
                          <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td><span
                            class="badge badge-pill badge-{{ $user->status ? 'success' : 'danger' }}">{{ $user->status ? 'Active' : 'Suspended' }}</span></td>
                          </tr>
                      </tbody></table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection