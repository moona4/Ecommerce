@extends('back.layouts.main')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sliders</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

        <form action="{{route('sliders.update',  $slider->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PATCH')

            <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$slider->title}}">
            </div>

            <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
                <label for="image">Old Image:</label>
                <img src="{{ asset('public/' . $slider->image) }}" width="70px" height="70px;">
                <input type="hidden" class="form-control" name="oldimage" value="{{$slider->image}}" id="oldimage">
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
                <input type="date" class="form-control" id="expires_on" name="expires_on" value="{{ date('Y-m-d', strtotime($slider->expires_on))}}">
            </div>

            <div class="form-group">
                <label for="status">Select status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{$slider->status?'selected':''}}>Active</option>
                    <option value="0" {{$slider->status?'':'selected'}}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form> 
</div> 

@endsection   
