@extends('layouts.app')

@section('FrontContent')


    <div class="slider-perosonal-portfolio height-550 bg-overlay slider-bg-image bg_image--15" data-black-overlay="1">
        <div class="container">
            <div class="row row--30 align-items-center">
                <div class="col-12">
                    <div class="inner text-center">
                        <h1 class="title">Hi! <br> <span class="theme-gradient">{{ Auth::user()->name }}</span></h1>
                        {{-- <div class="button-group mt--30"><a class="btn-default round btn-border btn-large" href="personal-portfolio.html">Contact Me</a></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="rn-company-mission-are rn-section-gap">
        <div class="container">
            <div class="row row--30">
                <div class="col-lg-6">
                    <div class="mission-title sal-animate" data-sal="slide-up" data-sal-duration="800">
                        <h2 class="title">Are you Ready? </h2>
                        <p>Wherever you are on your ABOG Oral Exam preparation Journey, we are here for you!</p>
                        <p>If you're starting your preparation and want to tailor your study/prep time to your areas of weakness, AHS experts will help you identify them and tackle each one.
                            If you have prepared and want to sit in the Hot-Seat to assess and improve your performance, AHS will simulate the Full exam experience for you.
                        </p>
                        <p>
                            You don't have to dive in dozens of books and endless notes to hammer down things that YOU ALREADY KNOW.
                            You'd rather use all the time and effort to PERFECT AREAS OF WEAKNESS after each Mock Exam Session!
                        </p>
                        <p> We are here to help you Crush Your Oral Boards!</p>
                        <p>
                            Sincerely, <br>
                            AHS Team
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mt_md--30 mt_sm--30">
                    <div class="rn-accordion-style accordion sal-animate" data-sal="slide-up" data-sal-duration="800">
                        <div class="accordion" id="accordionExamplea">
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        How do I send AHS my lists?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        When you book and pay for your package, you will receive email communication from our administration team
                                        They will confirm your dates and ask you to <br>
                                        1-Select your Mock Exam Session area (GYN, OB or Office)
                                        2- Submit all your lists in the same email conversation for the examiners' reference
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Can i choose all the mock exams in my package to be in one area (OB, GYN or office)?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        Absolutely, the whole purpose of AHS' efficient exam preparation method is to focus on your areas of weakness, rather than keep throwing piles of information at you that you probably already know You are a physician in practice fully taking care of patients, not a student or a resident anymore!
                                        You can elect to have your entire 4,8 or 12 mock exams in either OB, GYN or office.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can i choose to continue all my mock exams with a specific examiner?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        Please send us your requests as soon as you determine this. Our scheduling team will do every effort to make this possible. However, given that all our experts have their clinical duties as well as academic responsibilities (All the AHS team are Assistant/Associate Professors of Ob/Gyn), it might not always be feasible for your selected dates/times. It's also best to get accustomed to the real exam -- You'll be examined by six examiners on your big Day!
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How can I book Additional Mock Exam sessions rather than another full package?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        We made the Single/Additional Mock Exam Session option based on candidates' requests. Problem solved! Add whatever number of Additional Mock Exam Sessions you want based on availability of dates/times.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="rn-callto-action clltoaction-style-default style-7">
        <div class="container">
            @foreach ( $orders  as $order )
                <div class="row row--0 align-items-center content-wrapper">
                    <div class="col-lg-9 col-md-9">
                        <div class="inner">
                            <div class="content text-left">
                                <div class="logo">
                                    <a href="index.html">
                                        <img class="logo-light" src="{{ asset('front/images/logo/ahs-logo.png') }}" width="80" alt="ABOG-Hot-Seat">
                                        <img class="logo-dark" src="{{ asset('front/images/logo/ahs-logo.png') }}" width="80" alt="ABOG-Hot-Seat">
                                    </a>
                                </div>
                                <p class="subtitle sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                                    @if ( $order->status === '1' )
                                        You have purchased the <strong>{{ $order->plan->title }}.</strong>  You can book your session time slots here
                                    @elseif ( $order->status === '2' )
                                        You have purchased the <strong>{{ $order->plan->title }}.</strong>  But there's an issue at the payment transfer
                                    @else
                                        Your {{ $order->plan->title }} has reached for limits of sessions
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                        <div class="call-to-btn text-left mt_sm--20 text-lg-right">
                            @if ( $order->status === '1' )
                                <a class="btn-default mt-2" target="_blank" href="https://calendar.app.google/tx46i3biL9xdHrHG9"> Book Your Sessions
                                    <i class="feather-arrow-right"></i>
                                </a>
                            @elseif ( $order->status === '2' )
                                <i class="fa-solid fa-circle-xmark text-danger fa-4x"></i>
                            @else
                                <i class="fa-solid fa-circle-check text-success fa-4x"></i>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
