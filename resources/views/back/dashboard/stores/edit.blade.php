@extends('back.layouts.main')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Stores</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

        <form action="{{route('stores.update',  $store->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$store->name}}" readonly>
            </div>

            <div class="form-group">
                <label for="status">Select status</label>
                <select class="form-control" id="status" name="status">
                <option value="0">Pending</option>
                <option value="1">Completed</option>
                </select>
             </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form> 
</div> 

@endsection   
