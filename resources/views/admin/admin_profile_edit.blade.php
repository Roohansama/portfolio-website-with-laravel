@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile</h4>
                            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $edit_data->name }}" id="example-text-input">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="email" type="email"
                                            value="{{ $edit_data->email }}" id="example-email-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="username" type="text"
                                            value="{{ $edit_data->username }}" id="example-email-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Profile Picture</label>
                                    <div class="col-sm-10">
                                        <input class="form-control d-none" name="profile_image" type="file"
                                            id="image">
                                        <img class="card-img-top img-fluid rounded-circle avatar-xl mt-4"
                                            src="{{ !empty($edit_data->profile_image) ? url('upload/admin_images/' . $edit_data->profile_image) : url('upload/no_image.jpg') }}"
                                            onclick="image.click()" id="showImage" alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->


                                <button href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light"
                                    type="submit">Update
                                    Profile</button>

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();

                reader.readAsDataURL(e.target.files['0']);

                reader.onload = function(e) {

                    $('#showImage').attr('src', e.target.result);

                }


            });
        });
    </script>
@endsection
