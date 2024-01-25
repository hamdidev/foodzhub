@extends('admin.layouts.master')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .thumb {
            margin: 5px;
            /* Adjust the margin value as needed */
        }
    </style>

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div>
                <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">Go back</a>
            </div>
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Product's Options ({{ $product->name }})
            </h4>



            <!-- Header elements -->

            <div class="row">



                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Create sizes</h5>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('admin.product-size.store') }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf




                                <div class="col-md-6">

                                    <label for="price" class="form-label">Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="Price"
                                            aria-label="Amount (to the nearest dollar)" min="0" name="price"
                                            value="">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit"
                                            class="btn btn-primary px-4 waves-effect waves-light">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>






                    {{-- Sizes --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="card-datatable table-responsive pt-0">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <div class="row">
                                        {{-- <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                        name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="form-select">
                                        <option value="7">7</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div> --}}
                                        {{-- <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="form-control" placeholder=""
                                        aria-controls="DataTables_Table_0"></label></div>
                        </div> --}}
                                    </div>
                                    <table class="datatables-basic table dataTable no-footer dtr-column"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                        style="width: 1280px;">
                                        <thead>
                                            <tr>

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Name: activate to sort column ascending">No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Name: activate to sort column ascending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Name: activate to sort column ascending">Price</th>



                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 161px;" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sizes as $size)
                                                <tr class="odd">

                                                    <td>{{ ++$loop->index }}</td>
                                                    <td>{{ $size->name }}</td>
                                                    <td>{{ currencyPosition($size->price) }}</td>
                                                    <td>
                                                        <a href='{{ route('admin.product-size.destroy', $size->id) }}'
                                                            class='btn btn-danger delete-item ms-2'><i
                                                                class='fas fa-trash'></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (count($sizes) === 0)
                                                <td valign="top" colspan="3" class="dataTables_empty">No variants
                                                    found!
                                                </td>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                aria-live="polite">
                                                Showing 0 to 0 of 0 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="DataTables_Table_0_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="DataTables_Table_0_previous"><a href="#"
                                                            aria-controls="DataTables_Table_0" data-dt-idx="0"
                                                            tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item next disabled"
                                                        id="DataTables_Table_0_next">
                                                        <a href="#" aria-controls="DataTables_Table_0"
                                                            data-dt-idx="1" tabindex="0" class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Options --}}

                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Create options</h5>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('admin.product-option.store') }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf




                                <div class="col-md-6">

                                    <label for="price" class="form-label">Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="Price"
                                            aria-label="Amount (to the nearest dollar)" min="0" name="price"
                                            value="">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit"
                                            class="btn btn-primary px-4 waves-effect waves-light">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>







                    <!--/ Header elements -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-datatable table-responsive pt-0">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <div class="row">
                                        {{-- <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                        name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="form-select">
                                        <option value="7">7</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div> --}}
                                        {{-- <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="form-control" placeholder=""
                                        aria-controls="DataTables_Table_0"></label></div>
                        </div> --}}
                                    </div>
                                    <table class="datatables-basic table dataTable no-footer dtr-column"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                        style="width: 1280px;">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Name: activate to sort column ascending">No.</th>

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Name: activate to sort column ascending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Name: activate to sort column ascending">Price</th>



                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 161px;" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($options as $option)
                                                <tr class="odd">

                                                    <td>{{ ++$loop->index }}</td>
                                                    <td>{{ $option->name }}</td>
                                                    <td>{{ currencyPosition($option->price) }}</td>
                                                    <td>
                                                        <a href='{{ route('admin.product-option.destroy', $option->id) }}'
                                                            class='btn btn-danger delete-item ms-2'><i
                                                                class='fas fa-trash'></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (count($options) === 0)
                                                <td valign="top" colspan="3" class="dataTables_empty">No options
                                                    found!
                                                </td>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                aria-live="polite">
                                                Showing 0 to 0 of 0 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="DataTables_Table_0_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="DataTables_Table_0_previous"><a href="#"
                                                            aria-controls="DataTables_Table_0" data-dt-idx="0"
                                                            tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item next disabled"
                                                        id="DataTables_Table_0_next">
                                                        <a href="#" aria-controls="DataTables_Table_0"
                                                            data-dt-idx="1" tabindex="0" class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>






            </div>

        </div>
        <!-- / Content -->




    </div>
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
