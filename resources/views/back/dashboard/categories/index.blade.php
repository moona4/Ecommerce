@extends('back.layouts.main')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Categories
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th> Name</th>
                                        <th> Image</th>
                                        <th> Action</th>     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key => $category)
                                    <tr>
                                        <td>{{$loop ->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><img src="{{ asset('public/' . $category->image) }}" width="70px" height="70px;">
                                        </td>
                                       
                                        
                                        <td>  
                                            <div class="action_btn">
                                              <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
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