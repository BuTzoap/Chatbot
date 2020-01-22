@extends('layouts.model.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <div class="login100-pic js-tilt" data-tilt>
                                <img src="images/img-01.png" alt="IMG">
                            </div>
            
                            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <span class="login100-form-title">
                                        Welcome to Chatbot
                                </span>
            
                                <div class="wrap-input100 validate-input" >
                                    <input id="email" placeholder="Email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

            
                                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                    <input id="password" placeholder="Password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                </div>
                                
                                <div class="container-login100-form-btn">
                                    <button class="login100-form-btn">
                                            {{ __('Login') }}
                                    </button>
                                </div>
            
                                <div class="text-center p-t-12">
                                    <span class="txt1">
                                        Forgot Your
                                    </span>
                                    @if (Route::has('password.request'))
                                    <a class="txt2" href="{{ route('password.request') }}">
                                            {{ __('Password ?') }}
                                        </a>
                                    @endif
 
                                </div>
            
                                {{-- <div class="text-center p-t-136">
                                    <a class="txt2" href="#">
                                        Create your Account
                                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                    </a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
