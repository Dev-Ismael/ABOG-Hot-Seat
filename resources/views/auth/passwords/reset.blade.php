@extends('layouts.app')

@section('FrontContent')
    <div class="main-content">

        <div class="rwt-contact-area rn-section-gap">
            <div class="container mt--80">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700"
                            data-sal-delay="100">
                            <h2 class="title w-600">Reset Password</h2>
                            <div class="underline-title-center"></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-6 offset-lg-3">

                        <form method="POST" action="{{ route('password.update') }}"
                            class="contact-form-1 rwt-dynamic-form text-center" id="contact-form">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row d-none">
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required placeholder="Type Password..." autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ">
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Confirm Password..." required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group text-center">
                                    <button name="submit" type="submit" id="submit"
                                        class="btn-default btn-large rn-btn">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
