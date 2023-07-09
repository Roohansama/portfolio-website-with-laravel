@extends('admin.admin-master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <center>
                        <img class="card-img-top img-fluid rounded-circle avatar-xl mt-4"
                            src="{{ !empty($admin_data->profile_image) ? url('upload/admin_images/' . $admin_data->profile_image) : url('upload/no_image.jpg') }}"
                            alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name: {{ $admin_data->name }}</h4>
                            <hr>
                            <h4 class="card-title">Email: {{ $admin_data->email }}</h4>
                            <hr>
                            <h4 class="card-title">User name: {{ $admin_data->username }}</h4>
                            <hr>

                            <a href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
