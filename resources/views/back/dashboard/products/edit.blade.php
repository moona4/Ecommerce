@extends('back.layouts.main')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Category <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $product->category->name }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Store <span class="text-danger">*</span></label>
                        <input type ="text" value="{{$product->store->name}}" class="form-control" readonly>
                    </div>
                    

                    <div class="form-group">
                        <label for="price">Price <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Type </label>
                        <select class="form-control" id="type" name="type">
                            <option value="veg" {{ $product->status ? 'selected' : '' }}>Veg</option>
                            <option value="non-veg" {{ $product->status ? '' : 'selected' }}>Non-veg</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="image">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Old Image <span class="text-danger">*</span></label>
                        <img src="{{ asset('public/' . $product->image) }}" width="70px" height="70px;">
                        <input type="hidden" class="form-control" name="oldimage" value="{{$product->image}}" id="oldimage">
                        </div> 
                    
                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $product->status ? '' : 'selected' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
