@extends('layouts.app', ['class' => 'bg-default'])

@section('content')



    <div class="header bg-gradient-white py-7 py-lg-8">


        <div class="container">
        @include('admin.slider.slider')
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
<<<<<<< HEAD
                        <h1 class="text-white">{{ __('SILDER DE TONY') }}</h1>
=======

>>>>>>> 07a6dbfc387ef401ee44b811b1e95040f2ad9f7b
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>


    </div>


   <!--  <div class="container mt--10 pb-5"></div> -->
@endsection
