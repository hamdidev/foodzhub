@extends('admin.layouts.master')
@section('admin')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Categories</h4>



            <!-- Header elements -->

            <div class="row mb-5">

                <div class="w-100"></div>

                <div class="col-md">
                    <div class="card mb-4">
                        <div class="card-header header-elements">


                            <div class="card-header-elements ms-auto">
                                <a href="{{ route('admin.category.create') }}"
                                    class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="tf-icon ti ti-plus ti-xs me-1"></span>Create new
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>




            </div>
            <!--/ Header elements -->


        </div>
        <!-- / Content -->




    </div>
@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
