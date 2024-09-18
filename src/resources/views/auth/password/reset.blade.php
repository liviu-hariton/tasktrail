@extends('wrapper')

@section('content')
    <section class="login-content">
        <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
                <div class="col-lg-8">
                    @include('components.general.header-alerts')

                    <div class="card auth-card">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center auth-content">
                                <div class="col-lg-6 bg-primary content-left">
                                    <div class="p-3">
                                        <h2 class="mb-2 text-white">Your new password</h2>
                                        <p>Enter your email address and your new password</p>

                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $token }}">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="email" id="login-email" name="email" class="floating-input form-control" value="{{ $email ?? old('email') }}" placeholder="Enter your email address" required autocomplete="email">

                                                        @error('email')
                                                        <div class="validation-invalid-label">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="password" class="floating-input form-control" id="password-s" name="password" required autocomplete="new-password" placeholder="Your strong new password" autofocus>

                                                        @error('password')
                                                        <div class="validation-invalid-label">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="password" class="floating-input form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your new strong password">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-white">Update password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 content-right">
                                    <img src="{{ secure_asset('assets/images/login/01.png') }}" class="img-fluid image-right" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="mt-5 mb-0 text-center">
                        Remembered your password? <a href="{{ route('login') }}">Login Here</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
