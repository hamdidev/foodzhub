@extends('admin.layouts.master')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Change Password</h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-4">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.profile')}}"
              ><i class="ti-xs ti ti-users me-1"></i> Profile</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"
              ><i class="ti-xs ti ti-lock me-1"></i> Password</a
            >
          </li>

        </ul>
        <!-- Change Password -->
        <div class="card mb-4">
          <h5 class="card-header">Change Password</h5>
          <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-md-3 form-password-toggle">
                  <label class="form-label" for="currentPassword">Current Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      class="form-control"
                      type="password"
                      name="currentPassword"
                      id="currentPassword"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-md-3 form-password-toggle">
                  <label class="form-label" for="newPassword">New Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      class="form-control"
                      type="password"
                      id="newPassword"
                      name="newPassword"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div>
                </div>

                <div class="mb-3 col-md-3 form-password-toggle">
                  <label class="form-label" for="confirmPassword">Confirm New Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      class="form-control"
                      type="password"
                      name="confirmPassword"
                      id="confirmPassword"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
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
                <div>
                  <button type="submit" class="btn btn-primary me-2">Change password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--/ Change Password -->

      </div>
    </div>
  </div>

@endsection
