@extends('admin.layouts.master')
@section('admin')
    <style>
        /* 1.14 Image Preview */
        .image-preview,
        #callback-preview {
            width: 250px;
            height: 250px;
            border: 2px dashed #ddd;
            border-radius: 3px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
        }

        .image-preview input,
        #callback-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        .image-preview label,
        #callback-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 150px;
            height: 50px;
            font-size: 12px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Update slider</h4> --}}



            <!-- Header elements -->

            <div class="row mb-5">



                <div class="col-md">
                    <div class="card mb-4">



                        <div class="col-md-6">
                            <div class="card mb-4">
                                <h5 class="card-header">Create Slider</h5>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.slider.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <div id="imagePreview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose file</label>
                                                <input type="file" name="image" id="imageUpload">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="offer" class="form-label">Offer</label>
                                            <input type="text" class="form-control" id="offer" name="offer">
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input class="form-control" type="text" id="title" name="title">
                                        </div>
                                        <div class="mb-3">
                                            <label for="subtitle" class="form-label">Subtitle</label>
                                            <input class="form-control" type="text" id="subtitle" name="subtitle">
                                        </div>

                                        <div class="mb-3">
                                            <label for="short_desc" class="form-label">Description</label>
                                            <textarea class="form-control" id="short_desc" name="short_desc" rows="3"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="button_link" class="form-label">Button Link</label>
                                            <input class="form-control" type="text" id="button_link" name="button_link">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status"
                                                aria-label="Default select status">

                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>


                                        <button class="btn btn-primary btn-section-block waves-effect waves-light"
                                            type="submit">Create</button>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>




            </div>
            <!-- / Content -->




        </div>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });
        </script>
    @endsection
