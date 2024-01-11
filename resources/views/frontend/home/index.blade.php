    @extends('frontend.layouts.master')
    @section('content')
        <!--=============================
            BANNER START
        ==============================-->
        @include('frontend.home.components.slider')
        <!--=============================
            BANNER END
        ==============================-->
        <!--=============================
            WHY CHOOSE START
            ==============================-->
        @include('frontend.home.components.chooseus')

        <!--=============================
            WHY CHOOSE END
        ==============================-->
        @include('frontend.home.components.offer')


        <!--=============================
            OFFER ITEM START
        ==============================-->


        <!-- CART POPUT START -->
        @include('frontend.home.components.cart')

        <!-- CART POPUT END -->
        <!--=============================


        <!--=============================
            MENU ITEM START
        ==============================-->
        @include('frontend.home.components.menu')

        <!--=============================
            MENU ITEM END
        ==============================-->


        <!--=============================
            ADD SLIDER START
        ==============================-->
        {{-- @include('frontend.home.components.slider') --}}

        <!--=============================
            ADD SLIDER END
        ==============================-->


        <!--=============================
            TEAM START
        ==============================-->
        @include('frontend.home.components.team')

        <!--=============================
            TEAM END
        ==============================-->


        <!--=============================
            DOWNLOAD APP START
        ==============================-->
        @include('frontend.home.components.download')

        <!--=============================
            DOWNLOAD APP END
        ==============================-->


        <!--=============================
           TESTIMONIAL  START
        ==============================-->
        @include('frontend.home.components.testimonials')

        <!--=============================
            TESTIMONIAL END
        ==============================-->


        <!--=============================
            COUNTER START
        ==============================-->
        @include('frontend.home.components.counter')

        <!--=============================
            COUNTER END
        ==============================-->


        <!--=============================
            BLOG 2 START
        ==============================-->
        @include('frontend.home.components.blog')

        <!--=============================
            BLOG 2 END
        ==============================-->
    @endsection
