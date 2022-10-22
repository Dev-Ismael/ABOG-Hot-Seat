@extends('layouts.app')

@section('FrontContent')



    <div class="slider-perosonal-portfolio height-550 slider-bg-image bg-image11" data-black-overlay="1">
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
                        <h2 class="title">Unique Mission <br>
                            <span class="header-caption">
                                <span class="cd-headline clip is-full-width">
                                    <span class="cd-words-wrapper" style="width: 129.019px; overflow: hidden;">
                                        <b class="theme-gradient is-hidden">Finance.</b>
                                        <b class="theme-gradient is-hidden">Consulting.</b>
                                        <b class="theme-gradient is-visible">Agency.</b>
                                    </span>
                                </span>
                            </span>
                        </h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia quaerat dolore laboriosam
                            ea minus dignissimos, laudantium odit officia soluta, et deleniti fugit deserunt saepe,
                            velit sapiente obcaecati? Vitae, iusto delectus?</p>
                        <p>Consectetur adipisicing elit. Quia quaerat dolore laboriosam ea minus dignissimos,
                            laudantium odit officia soluta, et deleniti fugit deserunt saepe, velit sapiente
                            obcaecati? Vitae, iusto delectus?</p>
                        {{-- <div class="read-more-btn mt--50"><a class="btn-default btn-icon"
                                href="index-business-consulting-2.html">Learn More <i
                                    class="icon feather-arrow-right"></i></a></div> --}}
                    </div>
                </div>
                <div class="col-lg-6 mt_md--30 mt_sm--30">
                    <div class="rn-accordion-style accordion sal-animate" data-sal="slide-up" data-sal-duration="800">
                        <div class="accordion" id="accordionExamplea">
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        What is Doob ? How does it work?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        You can run doob easily. First You'll need to have node and npm on your
                                        machine. So Please open your command prompt then check your node.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How can I get the customer support?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        After purchasing the product need you any support you can be share with
                                        us with sending mail to rainbowit10@gmail.com.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can I get update regularly and For how long do I get updates?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        Yes, We will get update the Trydo. And you can get it any time. Next
                                        time we will comes with more feature.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How can I run doob html template?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExamplea" style="">
                                    <div class="accordion-body card-body">
                                        You can run doob easily. First You'll need to have node and npm on your
                                        machine. So Please open your command prompt then check your node -v and
                                        npm -v Version.
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
            <div class="row row--0 align-items-center content-wrapper">
                <div class="col-lg-8 col-md-8">
                    <div class="inner">
                        <div class="content text-left">
                            <div class="logo">
                                <a href="index.html">
                                    <img class="logo-light" src="assets/images/logo/logo.png" alt="Corporate Logo">
                                    <img class="logo-dark" src="assets/images/logo/logo-dark.png" alt="Corporate Logo">
                                </a>
                            </div>
                            <p class="subtitle sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">If you want to create a corporate template you can purshace now
                                our doob
                                template.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                    <div class="call-to-btn text-left mt_sm--20 text-lg-right">
                        <a class="btn-default" href="https://themeforest.net/checkout/from_item/34133466?license=regular">Appointment Section
                            <i class="feather-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
