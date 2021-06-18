@extends('back.layouts.main')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Review List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Reviews
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th> Product Name</th>
                                        <th> Customer Name</th>
                                        <th>Rating </th>    
                                        <th> Summary</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $key => $review)
                                    <tr>
                                        <td>{{$loop ->iteration}}</td>
                                        <td>{{$review->product->name}}</td>
                                        <td>{{$review->customer->display_name}}</td>
                                         <td>{{$review->rating}} </td> 
                                         <td> {{$review->rating_summary}}</td> 
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

