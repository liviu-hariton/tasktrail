@extends('wrapper')

@section('content')
    <section class="login-content">
        <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
                <div class="col-lg-8">
                    <div class="card auth-card">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center auth-content">
                                <div class="col-lg-6 bg-primary content-left">
                                    <div class="p-3">
                                        <img src="{{ secure_asset('assets/images/logo-white-simple.png') }}" alt="TaskTrail">

                                        <p>Log in to blaze your trail with TaskTrail!</p>

                                        <form method="POST" action="{{ route('login') }}">
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
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="password" name="password" id="login-password" class="floating-input form-control" placeholder="Enter your Password" required autocomplete="current-password">
                                                    </div>

                                                    @error('password')
                                                    <div class="validation-invalid-label">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                                                        <label class="custom-control-label control-label-1 text-white" for="remember">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    @if(Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-white float-right">Forgot Password?</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-white">Sign In</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 content-right">
                                    <img src="{{ secure_asset('assets/images/login/01.png') }}" class="img-fluid image-right" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
