@extends('admin.layouts.master')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">




            <!-- Header elements -->

            <div class="row mb-5">



                <div class="col-md">
                    <div class="card mb-4">



                        <div class="col-md-6">
                            <div class="card mb-4">
                                <h5 class="card-header">Edit why choose us card</h5>
                                <div class="card-body">
                                    <form method="POST"
                                        action="{{ route('admin.why-choose-us.update', $whyChooseData->id) }}">
                                        @csrf
                                        @method('PUT')



                                        <div class="mb-3">
                                            <label for="icon" class="form-label">Icon</label>
                                            <input class="form-control" type="text" id="icon" name="icon"
                                                value="{{ $whyChooseData->icon }}">


                                            {{-- TODO: IconPicker --}}



                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input class="form-control" type="text" id="title" name="title"
                                                value="{{ $whyChooseData->title }}">
                                        </div>


                                        <div class="mb-3">
                                            <label for="short_desc" class="form-label">Description</label>
                                            <textarea class="form-control" id="short_desc" name="short_desc" rows="3">{{ $whyChooseData->short_desc }}</textarea>
                                        </div>


                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status"
                                                aria-label="Default select status">

                                                <option @selected($whyChooseData->status === 1) value="1">Active</option>
                                                <option @selected($whyChooseData->status === 0) value="0">Inactive</option>
                                            </select>
                                        </div>


                                        <button class="btn btn-primary btn-section-block waves-effect waves-light"
                                            type="submit">Update</button>
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

            // $(function() {
            //     $('.iconpicker').iconpicker();
            // });
        </script>
    @endsection
