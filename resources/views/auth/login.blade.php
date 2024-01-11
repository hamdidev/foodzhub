


@extends('frontend.layouts.master')
@section('content')


 <!--=============================
        BREADCRUMB START
    ==============================-->
    {{-- <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>sign in</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">sign in</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        SIGNIN START
    ==========================-->
    <section class="fp__signin" style="background: url(images/login_bg.jpg);">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>sign in to continue</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="input_type">Email/Username</label>
                                            <input class="form-control" type="text" placeholder="Email/Username" id="input_type" name="input_type" value="{{old("input_type")}}">
                                        </div>

                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password" name="password">

                                        </div>
                                        {{-- @error("password")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror --}}
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput fp__login_check_area">
                                            <div class="form-check">
                                                <input for="remember_me" class="form-check-input" type="checkbox" value=""
                                                    id="remember_me" name="remember">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remeber Me
                                                </label>
                                            </div>
                                            <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="or"><span>or</span></p>
                            {{-- <ul class="d-flex">
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul> --}}
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
                            <p class="create_account">Dont’t have an aceount ? <a href="{{ route('register') }}">Create Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGNIN END
    ==========================-->

@endsection
