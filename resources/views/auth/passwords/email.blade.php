@extends('layouts.app')

@section('FrontContent')




<div class="main-content">

    <div class="rwt-contact-area rn-section-gap">
        <div class="container mt--80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <h2 class="title w-600">Reset Password</h2>
                        <div class="underline-title-center"></div>
                    </div>
                </div>
            </div>
            <div class="row mt--40 row--15">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" class="contact-form-1 rwt-dynamic-form text-center" id="contact-form">
                            @csrf

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Type Your Email Address ..." required autocomplete="nope">
                                @error('email')
                                    <small class="text-danger" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <button name="submit" type="submit" id="submit" class="btn-default btn-large rn-btn">
                                <span>Send Password Reset Link</span>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
