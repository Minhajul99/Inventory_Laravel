@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body ">

                            <h3 class="card-title">Change Password</h3>

                            @if (count($errors))

                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show" role="alert">{{$error}}</p>

                            @endforeach

                            @endif
                            <form method="POST" action="{{route('update.password')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="currentpassword" name="currentpassword" >
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="newpassword" name="newpassword" >
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" >
                                    </div>
                                </div>
                                <!-- end row -->

                               <div class=" d-flex justify-content-end">
                                <input type="submit" value="Change Password" class="btn btn-primary">
                               </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
