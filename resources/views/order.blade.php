@extends('layouts.app')

@section('FrontContent')


    <!---- Header ----->
    <div class="slider-perosonal-portfolio height-350 bg-overlay slider-bg-image bg_image--23" data-black-overlay="1">
        <div class="container">
            <div class="row row--30 align-items-center">
                <div class="col-12">
                    <div class="inner text-center">
                        <h1 class="title"> <span class="theme-gradient">{{ $plan->title }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----- Payment Form ------>
    <div class="rn-section-gap">
        <div class="container">
            <div class="row row--30">
                <div class="col-lg-8 col-md-6 col-12">

                    <section class="payment-form dark">
                        <div class="container">
                            <form method="POST" action="{{ route('order.proceed', $plan->slug) }}"
                                class="contact-form-1 rwt-dynamic-form" id="contact-form">

                                @csrf


                                {{--
                                    <div class="card-details">
                                        <h3 class="title">Credit Card Details</h3>
                                        <div class="row">
                                            <div class="form-group col-sm-7">
                                                <label for="card-holder">Card Holder</label>
                                                <input id="card-holder" type="text" class="form-control"
                                                    placeholder="Card Holder" aria-label="Card Holder"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div class="form-group col-sm-5">
                                                <label for="">Expiration Date</label>
                                                <div class="input-group expiration-date">
                                                    <input type="text" class="form-control" placeholder="MM"
                                                        aria-label="MM" aria-describedby="basic-addon1">
                                                    <span class="date-separator">/</span>
                                                    <input type="text" class="form-control" placeholder="YY"
                                                        aria-label="YY" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-8">
                                                <label for="card-number">Card Number</label>
                                                <input id="card-number" type="text" class="form-control"
                                                    placeholder="Card Number" aria-label="Card Holder"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="cvc">CVC</label>
                                                <input id="cvc" type="text" class="form-control"
                                                    placeholder="CVC" aria-label="Card Holder"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <button type="submit" id="submit" class="btn-default btn-large rn-btn w-100">
                                                    <i class="fa-solid fa-money-bill"></i>
                                                    Proceed
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                --}}

                                <div class="card-details">
                                    <h3 class="title d-flex align-items-center">
                                        <div>
                                            <img src="{{ asset('front/images/zelle-app.png') }}" alt="zelle-app"
                                                class="mr--10" width="50">
                                        </div>
                                        <div>
                                            Pay With Zelle®
                                        </div>
                                    </h3>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="our-recipient-name">Our Recipient Name</label>
                                            <input id="our-recipient-name" type="text" class="form-control"
                                                placeholder="AHS Hot-Seat" aria-label="Card Holder" disabled
                                                aria-describedby="basic-addon1">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="our-mail"> Our Mail </label>
                                            <input id="our-mail" type="text" class="form-control"
                                                placeholder="pay@ashmocks.com" aria-label="Card Holder" disabled
                                                aria-describedby="basic-addon1">
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label for="client-mail">Your Mail</label>
                                            <input id="client-mail" type="text" class="form-control" autofocus
                                                placeholder="Enter your Bank Mail..." aria-label="Card Holder"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="amount"> Amount </label>
                                            <input id="amount" type="text" class="form-control"
                                                placeholder="${{ $plan->price }}" aria-label="Card Holder" disabled
                                                aria-describedby="basic-addon1">
                                        </div>
                                        <div class="form-group col-12 text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }} required />
                                                <label class="form-check-label" for="remember">
                                                    Yes, I have Send ${{ $plan->price }} to AHS Hot-Seat Wallet
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <button type="submit" id="submit"
                                                class="btn-default btn-large rn-btn w-100">
                                                <i class="fa-solid fa-money-bill"></i>
                                                Proceed
                                            </button>
                                        </div>
                                        <p class="text-start pt-3">
                                            Faced any problem with Zelle App?
                                            <a class="btn btn-link p-0" target="_blank"
                                                href="https://www.youtube.com/watch?v=FhL1HKUOStM"> See how to Use Zelle
                                                App</a>
                                        </p>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </section>

                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="rn-pricing @if ($plan->recommended === '1') active @endif ">

                        @if ($plan->recommended === '1')
                            <div class="flag">
                                <strong>Recommended</strong>
                            </div>
                        @endif
                        <div class="pricing-table-inner">
                            <div class="pricing-header">
                                <h4 class="title"> {{ $plan->title }} </h4>
                                <div class="pricing">
                                    <div class="price-wrapper old-price">
                                        <span class="currency">$</span>
                                        <span class="price"> {{ $plan->old_price }} </span>
                                    </div>
                                    <div class="price-wrapper discounted-price">
                                        <span class="currency">$</span>
                                        <span class="price"> {{ $plan->price }} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-body">
                                {!! $plan->content !!}
                            </div>
                            <div class="pricing-footer">
                                <a class="btn-default btn-border" href="{{ route('order.index', $plan->slug) }}"> <i
                                        class="fa-solid fa-money-bill"></i> Purchase </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
