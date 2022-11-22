@extends('layouts.app')

@section('FrontContent')


<div class="main-content">

    <div class="rwt-contact-area rn-section-gap">
        <div class="container mt--80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">Login Form</span></h4>
                        <h2 class="title w-600">Welcome Back</h2>
                        <div class="underline-title-center"></div>

                    </div>
                </div>
            </div>
            <div class="row mt--40 row--15">
                <div class="col-lg-6 offset-lg-3">
                    <form method="POST" action="{{ route('login') }}" class="contact-form-1 rwt-dynamic-form text-center" id="contact-form">

                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Type Your Email Address..." required autocomplete="nope" autofocus>
                            @error('email')
                                <small class="text-danger" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Type Your Password..." required autocomplete="new-password">
                            @error('password')
                                <small class="text-danger" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 text-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                {{-- <div class="col-12 text-center mt--10">
                                    <div id="info-btn">
                                        <div class="info">
                                            <i class="fa-solid fa-circle-info color-primary"></i>
                                            <span class="extra-info">
                                                Have any issues with login? mail us at <a href="mailto:info@ahsmocks.com" class="text-underline color-primary"> info@ahsmocks.com </a>
                                            </span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <button name="submit" type="submit" id="submit" class="btn-default btn-large rn-btn">
                            <span>Login Now</span>
                        </button>
                    </form>
                    <p class="text-start pt-5">
                        Don't Have an account?
                        <a class="btn btn-link p-0" href="{{ route("register") }}"> Create an account</a>
                        it takes less than minute
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
