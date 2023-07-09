@extends('admin.admin-master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                    <p> {{ $error }}</p>
                                @endforeach
                            @endif



                            <h4 class="card-title">Change Password </h4>
                            <form method="post" action="{{ route('update.password') }}">
                                @csrf


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="oldpassword" type="password" id="oldpassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">new Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="newpassword" type="password" id="newpassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="confirmpassword" type="password"
                                            id="confirmpassword">
                                    </div>
                                </div>


                                <button class="btn btn-primary waves-effect waves-light" type="submit">Update
                                    Password</button>

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
