@extends('admin.layouts.master')
@section('admin')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Why Choose Us</h4>



            <!-- Header elements -->
            <div class="row mb-5">

                <div class="w-100"></div>
                {{--
                <div class="col-md">
                    <div class="card mb-4">
                        <div class="card-header header-elements">


                            <div class="card-header-elements ms-auto">

                            </div>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6 mb-4 mb-md-2">

                    <div class="accordion mt-3" id="accordionExample">
                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
                                    Why Choose Us Section Titles..
                                </button>
                            </h2>

                            <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample"
                                style="">
                                <div class="accordion-body">
                                    <form method="POST" action="{{ route('admin.why-choose-title.update') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="top-title">Top Title</label>
                                            <input name="why_choose_top_title" type="text" class="form-control"
                                                value="{{ @$titles['why_choose_top_title'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="main-title">Main Title</label>
                                            <input name="why_choose_main_title" type="text" class="form-control"
                                                value="{{ @$titles['why_choose_main_title'] }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="subtitle">Subtitle</label>
                                            <input name="why_choose_sub_title" type="text" class="form-control"
                                                value="{{ @$titles['why_choose_sub_title'] }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>




            </div>

            <div class="row mb-5">

                <div class="w-100"></div>

                <div class="col-md">
                    <div class="card mb-4">
                        <div class="card-header header-elements">

                            <p>All items</p>
                            <div class="card-header-elements ms-auto">
                                <a href="{{ route('admin.why-choose-us.create') }}"
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
