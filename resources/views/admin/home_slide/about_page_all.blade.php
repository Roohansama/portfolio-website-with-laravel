@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">ABout Page</h4>
                            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value=" {{ $aboutpage -> id}}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" type="text"
                                            value="{{ $aboutpage->title }}" id="example-text-input">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Subtitle</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="subtitle" type="text"
                                            value="{{ $aboutpage->subtitle }}" id="example-email-input">
                                    </div>
                                </div>
                                <!-- end row -->


                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label"> About image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control d-none" name="home_slide" type="file"
                                            id="image">
                                        <img class="card-img-top img-fluid rounded-circle avatar-xl mt-4"
                                            src="{{ !empty($aboutpage->home_slide) ? url('upload/home_slide/' . $aboutpage->home_slide) : url('upload/no_image.jpg') }}"
                                            onclick="image.click()" id="showImage" alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->


                                <button href="" class="btn btn-primary waves-effect waves-light"
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
