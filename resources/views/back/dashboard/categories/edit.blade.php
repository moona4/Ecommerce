@extends('back.layouts.main')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

        <form action="{{route('categories.update',  $category->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PATCH')

            <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" readonly>
            </div>

            <div class="form-group">
            <label for="image">Image <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
                <label for="image">Old Image  <span class="text-danger">*</span></label>
                <img src="{{ asset('public/' . $category->image) }}" width="70px" height="70px;">
                <input type="hidden" class="form-control" name="oldimage" value="{{$category->image}}" id="oldimage">
                </div> 

            <button type="submit" class="btn btn-primary">Update</button>
        </form> 
</div> 

@endsection   
