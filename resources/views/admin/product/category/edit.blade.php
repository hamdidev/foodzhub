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
                                <h5 class="card-header">Edit category</h5>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.category.update', $categoryData->id) }}">
                                        @csrf
                                        @method('PUT')




                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="{{ @$categoryData->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Show At Home</label>
                                            <select class="form-select" id="show_at-home" name="show_at_home"
                                                aria-label="Default select status">

                                                <option @selected($categoryData->show_at_home === 1) value="1">Yes</option>
                                                <option @selected($categoryData->show_at_home === 0) value="0">No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status"
                                                aria-label="Default select status">

                                                <option @selected($categoryData->status === 1) value="1">Active</option>
                                                <option @selected($categoryData->status === 0) value="0">Inactive</option>
                                            </select>
                                        </div>








                                        <button class="btn btn-primary btn-section-block waves-effect waves-light"
                                            type="submit">Edit</button>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>




            </div>
            <!-- / Content -->




        </div>
    @endsection
