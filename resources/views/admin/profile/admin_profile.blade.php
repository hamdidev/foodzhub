@extends('admin.layouts.master')

@section('admin')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Admin Profile</h4>

        <div class="row">
          <div class="col-md-6">

            <form id="formAccountSettings" method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
            @csrf

                    <div class="card mb-4">

                        <h5 class="card-header">Profile Details</h5>
                        <!-- Account -->
                        <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                        src="{{(!empty($adminProfile->avatar)) ? url('uploads/admin_images/'.$adminProfile->avatar) : url('uploads/no_image.jpg')}}"
                        alt="user-avatar"
                        class="d-block w-px-100 h-px-100 rounded"
                        id="uploadedAvatar"

                        />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input
                                    type="file"
                                    id="upload"
                                    class="account-file-input"
                                    hidden
                                    name="avatar"
                                    accept="image/png, image/jpeg"
                                />
                                </label>

                                <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                            </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{$adminProfile->name}}"
                                    autofocus
                                />
                                </div>
                                <div class="mb-3 col-md-4">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control" type="text" name="username" id="username" value="{{$adminProfile->username}}" />
                                </div>
                                <div class="mb-3 col-md-4">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="email"
                                    name="email"
                                    value="{{$adminProfile->email}}"
                                    placeholder="john.doe@example.com"
                                />
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">Position</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="position"
                                    name="position"
                                    value="{{$adminProfile->position}}"
                                />
                                </div>
                                <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    {{-- <span class="input-group-text">US (+1)</span> --}}
                                    <input
                                    type="text"
                                    id="phoneNumber"
                                    name="phone"
                                    class="form-control"
                                    placeholder="202 555 0111"
                                    value="{{$adminProfile->phone}}"
                                    />
                                </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                value="{{$adminProfile->address}}"

                                placeholder="Address" />
                                </div>

                                <div class="mb-3 col-md-6">
                                <label for="zipCode" class="form-label">Zip Code</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="zipCode"
                                    name="zip_code"
                                    placeholder="231465"
                                    maxlength="6"
                                value="{{$adminProfile->zip_code}}"

                                />
                                </div>


                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            </div>
                            </div>
                            <!-- /Account -->
                        </div>
            </form>

        </div>
          <div class="col-md-6">

            <div class="card mb-4">
              <h5 class="card-header">Change Password</h5>
              <!-- Account -->
              <div class="card-body">

              </div>
              <hr class="my-0" />
              <div class="card-body">
                <form id="formAccountSettings" method="post" action="{{route('admin.change.password')}}">
                @csrf

                  <div class="row">
                    <div class="mb-3 col-md-4 form-password-toggle">
                        <label class="form-label" for="currentPassword">Current Password</label>
                        <div class="input-group input-group-merge">
                          <input
                          type="password"
                          name="current_password"
                          id="currentPassword"
                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          class="form-control @error("current_password") is-invalid @enderror"/>
                          <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        <div>
                            @error("current_password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>

                    </div>
                    <div class="mb-3 col-md-4 form-password-toggle">
                        <label class="form-label" for="newPassword">New Password</label>
                        <div class="input-group input-group-merge">
                          <input
                          type="password"
                          id="newPassword"
                          name="new_password"
                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          class="form-control @error("new_password") is-invalid @enderror"
                          />
                          <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        <div>
                            @error("new_password")
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                      </div>
                      <div class="mb-3 col-md-4 form-password-toggle">
                        <label class="form-label" for="confirmPassword">Confirm New Password</label>
                        <div class="input-group input-group-merge">
                          <input

                          type="password"
                          name="password_confirmation"
                          id="confirmPassword"
                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          class="form-control"
                          />

                        </div>
                      </div>
                      <div class="col-12 mb-4">
                        <h6>Password Requirements:</h6>
                        <ul class="ps-3 mb-0">
                          <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                          <li class="mb-1">At least one lowercase character</li>
                          <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                      </div>





                  </div>
                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Change password</button>
                  </div>
                </form>
              </div>
              <!-- /Account -->
            </div>

          </div>

      </div>

    <!-- / Content -->



    <div class="content-backdrop fade"></div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
        $('#upload').change(function(e){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadedAvatar').attr('src',e.target.result)

            }

            reader.readAsDataURL(e.target.files[0])


        })
    })

  </script>
@endsection
