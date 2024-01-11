


@extends('frontend.layouts.master')
@section('content')



  <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>sign up</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">sign up</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        SIGN UP START
    ==========================-->
    <section class="fp__signup" style="background: url(images/login_bg.jpg);">
        <div class="fp__signup_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class=" container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Join us today!</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="name">Name</label>
                                            <input name="name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="username">Username</label>
                                            <input name="username" type="text" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="email">email</label>
                                            <input name="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password">password</label>
                                            <input name="password" type="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password_confirmation">confirm password</label>
                                            <input name="password_confirmation" type="password" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">Sign up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="or"><span>or</span></p>
                            <div class="d-flex w-100"><a href="/auth/google/redirect">
                                <div class="g-sign-in-button">
                                  <div class="content-wrapper">
                                    <div class="logo-wrapper">
                                      <img src="https://developers.google.com/identity/images/g-logo.png">
                                    </div>
                                    <span class="text-container">
                                      <span>Sign in with Google</span>
                                    </span>
                                  </div>
                                </div>
                              </a></div>
                            <p class="create_account">Already a member ? <a href="{{route('login')}}">login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGN UP END
    ==========================-->

@endsection
