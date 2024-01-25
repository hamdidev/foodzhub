@extends('admin.layouts.master')
@section('admin')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Settings</h4>



            <!-- Header elements -->

            <div class="row mb-5">
                <div class="col-md-8">
                    <h6 class="text-muted">Vertical</h6>
                    <div class="nav-align-left nav-tabs-shadow mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-left-gs" aria-controls="navs-left-home" aria-selected="false"
                                    tabindex="-1">
                                    General Settings
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-left-profile" aria-controls="navs-left-profile"
                                    aria-selected="true">
                                    Profile
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-left-messages" aria-controls="navs-left-messages"
                                    aria-selected="false" tabindex="-1">
                                    Messages
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-left-gs" role="tabpanel">
                                <div>
                                    <div class="card">
                                        <div class="card-body border">
                                            <form method="POST" action="{{ route('admin.general-settings.update') }}"
                                                class="row g-3">
                                                @method('PUT')
                                                @csrf




                                                <div class="col-md-6">

                                                    <label for="name" class="form-label">Site Name</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="site_name"
                                                            value="{{ config('settings.site_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlSelect1"
                                                            class="form-label">Currency</label>
                                                        <select class="form-select select2-hidden-accessible"
                                                            id="single-select-field" data-placeholder="Select a currency"
                                                            data-select2-id="select2-data-single-select-field"
                                                            tabindex="-1" aria-hidden="true" name="default_currency">


                                                            <option value="">Select a currency</option>
                                                            @foreach (config('currencies.currency_list') as $currency)
                                                                <option @selected(config('settings.default_currency') === $currency)
                                                                    value="{{ $currency }}">
                                                                    {{ $currency }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <label for="name" class="form-label">Currency Symbol</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="currency_icon"
                                                            value="{{ config('settings.currency_icon') }}">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlSelect1" class="form-label">Currency
                                                            Icon Position</label>
                                                        <select class="form-select" name="icon_position"
                                                            aria-label="Default select status">

                                                            <option @selected(config('settings.icon_position') === 'left') value="left">Left
                                                            </option>
                                                            <option @selected(config('settings.icon_position') === 'right') value="right">Right
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                                        <button type="submit"
                                                            class="btn btn-primary px-4 waves-effect waves-light">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="navs-left-profile" role="tabpanel">
                                <p>
                                    Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy
                                    oat cake ice
                                    cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread.
                                    Pastry ice cream
                                    cheesecake fruitcake.
                                </p>
                                <p class="mb-0">
                                    Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie
                                    tiramisu halvah
                                    cotton candy liquorice caramels.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="navs-left-messages" role="tabpanel">
                                <p>
                                    Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans
                                    macaroon gummies
                                    cupcake gummi bears cake chocolate.
                                </p>
                                <p class="mb-0">
                                    Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie
                                    brownie cake. Sweet
                                    roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert
                                    dessert. Pudding jelly
                                    jelly-o tart brownie jelly.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <!--/ Header elements -->


        </div>
        <!-- / Content -->




    </div>
@endsection
