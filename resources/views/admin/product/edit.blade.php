@extends('admin.layouts.master')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
            cursor: pointer !important;
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



    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Update slider</h4> --}}



            <!-- Header elements -->

            <div class="row mb-5">







                <div class="col-md-9">
                    <div class="card mb-4">
                        <h5 class="card-header">Edit the product</h5>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('admin.product.update', $product->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @method('PUT')
                                @csrf

                                <div class="col-md-4">
                                    <label for="input1" class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" id="input1"
                                        placeholder="Name" value="{{ $product->name }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="input2" class="form-label">SKU</label>
                                    <input name="sku" type="text" class="form-control" id="input2"
                                        placeholder="SKU" value="{{ $product->sku }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="input2" class="form-label">SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="input2"
                                        placeholder="SEO Title" value="{{ $product->seo_title }}">
                                </div>
                                <div class="col-md-6">

                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" placeholder="Price"
                                            aria-label="Amount (to the nearest dollar)" min="0" name="price"
                                            value="{{ $product->price }}">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <label for="offer_price" class="form-label">Offer Price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" placeholder="Offer Price"
                                            aria-label="Amount (to the nearest dollar)" min="0" name="offer_price"
                                            value="{{ $product->offer_price }}">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Category</label>
                                        <select class="form-select select2-hidden-accessible" id="single-select-field"
                                            data-placeholder="Select a category"
                                            data-select2-id="select2-data-single-select-field" tabindex="-1"
                                            aria-hidden="true"name="category">

                                            <option value="">Select a category</option>
                                            @foreach ($categories as $category)
                                                <option @selected($product->category_id === $category->id) value="{{ $category->id }}">
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                        <select class="form-select" name="status" aria-label="Default select status">

                                            <option @selected($product->status === 1) value="1">Active</option>
                                            <option @selected($product->status === 0) value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Show At Home</label>
                                        <select class="form-select" id="show_at_home" name="show_at_home"
                                            aria-label="Default select status">

                                            <option @selected($product->show_at_home === 1) value="1">Yes</option>
                                            <option @selected($product->show_at_home === 0) value="0">No</option>
                                        </select>
                                    </div>
                                </div>






                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="short_desc" class="form-label">Short Description</label>
                                        <textarea class="form-control" id="short_desc" name="short_desc" rows="3">{!! $product->short_desc !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="long_desc" class="form-label">Details</label>
                                        <textarea id="myeditor" class="form-control" id="" name="long_desc" rows="3">{!! $product->long_desc !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="seo_desc" class="form-label">SEO Description</label>
                                        <textarea class="form-control" id="seo_desc" name="seo_desc" rows="3">{!! $product->seo_desc !!}{{ old('seo_desc') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Image</label>

                                        <div id="imagePreview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose file</label>
                                            <input type="file" name="thumbnail_img" id="imageUpload">
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Edit</button>
                                    </div>
                                </div>
                            </form>
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


            $(document).ready(function() {
                $('.image-preview').css({
                    'background-image': 'url({{ asset($product->thumbnail_img) }})',
                    'background-size': 'cover',
                    'background-position': 'center center',
                })
            })
        </script>
        <script>
            tinymce.init({
                selector: 'textarea#myeditor',
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [{
                        value: 'First.Name',
                        title: 'First Name'
                    },
                    {
                        value: 'Email',
                        title: 'Email'
                    },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                    "See docs to implement AI Assistant")),
            });
        </script>
    @endsection
