@extends('back.layouts.main')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Offers</h1>
        </div>
        <!-- /.col-lg-12 -->
    

        <form action="{{route('companyprofile.update',  $companyprofile->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PATCH')
          
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{$companyprofile->name}}">
            </div>
           </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Vat Pan Number <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="vat_pan_no" name="vat_pan_no" value="{{$companyprofile->vat_pan_no}}">
            </div>
           </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Email <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="email" name="email" value="{{$companyprofile->email}}">
            </div>
           </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Address   <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="address" name="address" value="{{$companyprofile->address}}">
            </div>
           </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">phone Number <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{$companyprofile->phone_no}}">
            </div>
           </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Mobile Number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{$companyprofile->mobile_no}}">
            </div>
           </div>
         
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Website <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="website" name="website" value="{{$companyprofile->website}}">
            </div>
           </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Latitude <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{$companyprofile->latitude}}">
            </div>
           </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="name">Longitude <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{$companyprofile->longitude}}">
            </div>
           </div>
             
     
           <hr>
           <div class="footer">
               <button type="submit" class="btn btn-primary">Update</button>
           </div>

        </form> 


@endsection   
