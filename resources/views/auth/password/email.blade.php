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
                                        <h2 class="mb-2 text-white">Forgot Password?</h2>
                                        <p>Enter your email address and we'll send you a link to reset your password</p>

                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="email" name="email" id="login-email" value="{{ old('email') }}" class="floating-input form-control" placeholder="Enter your email address" required autocomplete="email" autofocus>

                                                        @error('email')
                                                        <div class="help-block text-warning">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-white">Send Password Reset Link</button>
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
