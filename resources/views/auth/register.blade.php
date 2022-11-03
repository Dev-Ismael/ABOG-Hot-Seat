@extends('layouts.app')

@section('FrontContent')

<div class="main-content">

    <div class="rwt-contact-area rn-section-gap">
        <div class="container mt--80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">Register Form</span></h4>
                        <h2 class="title w-600 mb--20">Create your personal account on AHS</h2>
                        <div class="underline-title-center"></div>

                    </div>
                </div>
            </div>
            <div class="row mt--40 row--15">
                <div class="col-lg-6 offset-lg-3">
                    <form method="POST" action="{{ route('register') }}" class="contact-form-1 rwt-dynamic-form text-center" id="contact-form">

                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Type Your First Name..." required autocomplete="nope" autofocus>
                                    @error('first_name')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Type Your Last Name..." required autocomplete="nope" autofocus>
                                    @error('last_name')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Type Your Username..." required autocomplete="nope" autofocus>
                            @error('name')
                                <small class="text-danger" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

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
                            <input id="password" type="password" class="form-control" name="password_confirmation" placeholder="Type Password Again..." required autocomplete="new-password">
                        </div>


                        <button name="submit" type="submit" id="submit" class="btn-default btn-large rn-btn">
                            <span> Regiser Now </span>
                        </button>


                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
