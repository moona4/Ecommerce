@extends('back.layouts.main')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">First Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $user->first_name }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Last Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $user->last_name }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Username<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="mobile">Mobile no<span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="mobile_no" name="mobile_no"
                            value="{{ $user->mobile_no }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="gender">Gender <span class="text-danger">*</span></label><br />
                        <label>
                            <input type="radio" id="gender" name="gender" value="Male"
                                {{ $user->gender == 'male' ? 'checked' : '' }}> Male
                        </label>

                        <label><input type="radio" id="gender" name="gender" value="Female"
                                {{ $user->gender == 'female' ? 'checked' : '' }}> Female
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $user->status ? '' : 'selected' }}>Suspended</option>
                        </select>
                    </div>
                </div>
            </div>


            <hr>
            <div class="footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


@endsection
