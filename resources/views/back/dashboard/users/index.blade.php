@extends('back.layouts.main')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Mobile no.</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{$loop ->iteration}}</td>
                                        <td>{{$user->display_name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile_no}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->gender}}</td>
                                        
                                        <td><span class="badge badge-pill badge-{{$user->status ? 'success' : 'danger'}}">{{$user->status ? 'Active': 'Suspended'}}</span></td>
                                            
                                        <td>
                                            <div class="action_btn">

                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                               
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
@endsection