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
                        <div class="mb--40 text-start">
                            <h2 class="title">Are you Ready? </h2>
                            <div class="underline-title-left"></div>
                        </div>
                        <p>Wherever you are on your ABOG oral exam preparation journey, we are here for you!</p>
                        <p>If you're starting your preparation and want to tailor your study/prep time to your areas of
                            weakness, AHS experts will help you identify them and tackle each one.
                            If you have prepared and want to sit in the Hot-Seat to assess and improve your performance, AHS
                            will simulate the full exam experience for you.
                        </p>
                        <p>
                            You don't have to dive in dozens of books and endless notes to hammer down things that you
                            already know.
                            You'd rather use all the time and effort to perfect areas of weakness after each Mock Exam
                            Session!
                        </p>
                        <p> We are here to help you crush your oral boards!</p>
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
                                        When you book and pay for your package, you will receive email communication from
                                        our administration team
                                        They will confirm your dates and ask you to
                                        <br>
                                        1- Select your Mock Exam Session area (GYN, OB or Office)
                                        <br>
                                        2- Submit all your lists in the same email conversation for the examiners' reference
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Can I choose all the mock exams in my package to be in one area (OB, GYN or office)?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        Absolutely, the whole purpose of AHS' efficient exam preparation method is to focus
                                        on your areas of weakness, rather than keep throwing piles of information at you
                                        that you probably already know You are a physician in practice fully taking care of
                                        patients, not a student or a resident anymore!
                                        You can elect to have your entire 4,8 or 12 mock exams in either OB, GYN or office.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can I choose to continue all my mock exams with a specific examiner?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        Please send us your requests as soon as you determine this. Our scheduling team will
                                        do every effort to make this possible. However, given that all our experts have
                                        their clinical duties as well as academic responsibilities (All the AHS team are
                                        Assistant/Associate Professors of Ob/Gyn), it might not always be feasible for your
                                        selected dates/times. It's also best to get accustomed to the real exam -- You'll be
                                        examined by six examiners on your big Day!
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
                                        We made the Single/Additional Mock Exam Session option based on candidates'
                                        requests. Problem solved! Add whatever number of Additional Mock Exam Sessions you
                                        want based on availability of dates/times.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($orders->isNotEmpty())
        <div class="rwt-timeline-area rn-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700"
                            data-sal-delay="100">
                            <h2 class="title w-600">Purchased Packages</h2>
                            <div class="underline-title-center"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="rn-timeline-wrapper timeline-style-one position-relative">
                            <div class="timeline-line"></div>
                            @foreach ($orders as $order)
                                <div class="single-timeline mt--40">
                                    <div class="timeline-dot">
                                        <div class="time-line-circle"></div>
                                    </div>
                                    <div class="single-content">
                                        <div class="inner">
                                            <div class="row row--30 align-items-center">
                                                <div class="col-lg-12 mt_md--40 mt_sm--40 order-2 order-lg-1">
                                                    <div class="content">
                                                        <h2 class="title sal-animate" data-sal="slide-up"
                                                            data-sal-duration="700" data-sal-delay="100"> - Your
                                                            <strong>{{ $order->plan->title }}</strong>
                                                        </h2>
                                                        <p class="description sal-animate" data-sal="slide-up"
                                                            data-sal-duration="700" data-sal-delay="200">
                                                            @if ($order->status === '1')
                                                                <i class="fa-solid fa-circle-check text-success mr--5"></i>
                                                                Purchase compelete, you can now book your sessions dates/times here
                                                            @elseif ($order->status === '2')
                                                                <i
                                                                    class="fa-solid fa-circle-exclamation text-warning mr--5"></i>
                                                                This package sessions has expired, <a href="/#packages"
                                                                    class="text-underline color-dark font-weight-bold">purchase
                                                                    new one</a>
                                                            @elseif ($order->status === '3')
                                                                <i class="fa-solid fa-circle-xmark text-danger"></i>
                                                                There's a payment issue
                                                            @endif
                                                        </p>
                                                        @if ($order->status === '1')
                                                            <div class="row row--30">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <div class="working-list">
                                                                        <h5 class="working-title sal-animate mb--5"
                                                                            data-sal="slide-up" data-sal-duration="700"
                                                                            data-sal-delay="300">
                                                                            Required Step:
                                                                        </h5>
                                                                        <p data-sal="slide-up" data-sal-duration="700"
                                                                            data-sal-delay="400" class="sal-animate">
                                                                            Submit your case lists to <a
                                                                                href="mailto:{{ $settings->email }}"
                                                                                class="text-underline color-dark font-weight-bold">{{ $settings->email }}</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="read-morebtn sal-animate" data-sal="slide-up"
                                                                data-sal-duration="700" data-sal-delay="300">
                                                                <a class="btn-default mt-2" target="_blank"
                                                                    href="https://calendar.app.google/EPoyKEdqsfKFZMfo6">
                                                                    Book Your Sessions </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection
