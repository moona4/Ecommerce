@extends('back.layouts.main')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Offers</h1>
        </div>
        <!-- /.col-lg-12 -->
    

        <form action="{{route('offers.update',  $offer->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PATCH')
          
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{$offer->name}}">
            </div>
           </div>
             
           <div class="col-sm-6">
            <div class="form-group">
                <label for="discount">Discount <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="discount" name="discount" value="{{$offer->discount}}">
            </div>
           </div>
            
           <div class="col-sm-6">
            <div class="form-group">
                <label for="type">Type <span class="text-danger">*</span></label>
                <select class="form-control" id="discount_type" name="discount_type">
                    <option value="Fixed" {{ $offer->discount_type? 'selected' : '' }}>Fixed</option>
                    <option value="Percentage" {{ $offer->discount_type ? '' : 'selected' }}>Percentage</option>
                </select>
            </div>
           </div>

           <div class="col-sm-6">
            <div class="form-group">
                <label for="status">Status <span class="text-danger">*</span></label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ $offer->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $offer->status ? '' : 'selected' }}>Inactive</option>
                </select>
            </div>
           </div>
        </div>  
     
           <hr>
           <div class="footer">
               <button type="submit" class="btn btn-primary">Update</button>
           </div>

        </form> 


@endsection   
