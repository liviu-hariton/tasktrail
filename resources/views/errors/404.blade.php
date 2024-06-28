@extends('wrapper')

@section('content')
    <div class="container">
        <div class="row no-gutters height-self-center">
            <div class="col-sm-12 text-center align-self-center">
                <div class="iq-error position-relative">
                    <img src="{{ secure_asset('assets/images/logo.png') }}" class="img-fluid iq-error-img" alt="">
                    <h2 class="mb-0 mt-4">Oops! Looks like you are lost!</h2>
                    <p>The page is you are looking for is not available.</p>
                    <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="{{ route('dashboard') }}"><i class="ri-home-4-line"></i>Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
