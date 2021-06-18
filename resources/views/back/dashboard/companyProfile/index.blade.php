@extends('back.layouts.main')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Company Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Profile
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>  Name</th>
                                        <th> Pan-Vat Number</th>
                                        <th>Email </th>    
                                        <th> Address</th>
                                        <th>Phone Number</th>
                                        <th>Mobile Number</th>
                                        <th>Website</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            @foreach($companyProfiles as $key => $companyProfile)
                                    <tr>
                                        <td>{{$loop ->iteration}}</td>
                                        <td>{{$companyProfile->name}}</td>
                                        <td>{{$companyProfile->pan_vat_no}}</td>
                                         <td>{{$companyProfile->email}} </td> 
                                         <td> {{$companyProfile->address}}</td> 
                                         <td>{{$companyProfile->phone_no}}</td>
                                         <td>{{$companyProfile->mobile_no}}</td>
                                         <td>{{$companyProfile->website}}</td>
                                         <td>{{$companyProfile->latitude}}</td>
                                         <td>{{$companyProfile->longitude}}</td>
                                         <td>
                                            <div class="action_btn">

                                                <a href="{{ route('companyprofile.edit', $companyProfile->id) }}"
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

