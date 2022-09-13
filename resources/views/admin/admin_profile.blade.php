@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="card"> <br> <br>
                        <center>
                            {{-- <img class="rounded-circle avatar-lg" src="{{asset('images/admin_img/'.$adminData->image)}}" --}}
                            <img class="rounded-circle avatar-lg"
                                src="{{ !empty($adminData->image) ? url('images/admin_img/' . $adminData->image) : url('images/admin_img/user.png') }}"
                                alt="Card image cap">
                        </center>
                        <div class="card-body mx-5 my-3">
                            <h4 class="card-title"> <b>Name :</b> {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title"> <b>User Name :</b> {{ $adminData->username }}</h4>
                            <hr>
                            <h4 class="card-title"> <b>Email :</b> {{ $adminData->email }}</h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}"
                                class="btn btn-primary btn-rounded waves-effect waves-light">Edit Profile</a>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

            </div>
        </div>
    @endsection
