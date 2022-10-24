@extends('layouts.app')

@section('FrontContent')



    <!-- Start Slider Area  -->
    <div class="rwt-testimonial-area  slider-style-4  slider-activation slider-dot rn-slick-dot rn-slick-arrow">
        <div class="single-rn-slider slider-bg-image bg-overlay bg_image bg_image--6 height-950 d-flex align-items-center">
            <div class="container">
                <div class="row row--30 align-items-center">
                    <div class="order-2 order-lg-1 col-lg-7">
                        <div class="inner text-left">
                            <h1 class="title">Digital Agency.</h1>
                            <p class="description">We help our clients succeed by creating brand identities, digital
                                experiences, and print materials.</p>
                            <div class="button-group mt--30"><a class="btn-default" target="_blank" href="#">PURCHASE
                                    NOW</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-rn-slider height-950 slider-bg-image bg-overlay bg_image bg_image--14 height-950 d-flex align-items-center">
            <div class="container">
                <div class="row row--30 align-items-center">
                    <div class="order-2 order-lg-1 col-lg-7">
                        <div class="inner text-left">
                            <h1 class="title">Creative Agency.</h1>
                            <p class="description">We help our clients succeed by creating brand identities,
                                digital
                                experiences, and print materials.</p>
                            <div class="button-group mt--30"><a class="btn-default" target="_blank" href="#">PURCHASE
                                    NOW</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-rn-slider height-950 slider-bg-image bg-overlay bg_image bg_image--15 height-950 d-flex align-items-center">
            <div class="container">
                <div class="row row--30 align-items-center">
                    <div class="order-2 order-lg-1 col-lg-7">
                        <div class="inner text-left">
                            <h1 class="title">Startup Agency.</h1>
                            <p class="description">We help our clients succeed by creating brand identities,
                                digital
                                experiences, and print materials.</p>
                            <div class="button-group mt--30"><a class="btn-default" target="_blank" href="#">PURCHASE
                                    NOW</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area  -->


    <!-- Start About Area  -->
    <div class="rwt-about-area rn-section-gap">
        <div class="container">
            <div class="row row--30 align-items-center">
                <div class="col-lg-5">
                    <div class="thumbnail" data-sal="slide-right" data-sal-duration="800">
                        <img class="w-100" src="assets/images/about/about-1.png" alt="About Images">
                    </div>
                </div>
                <div class="col-lg-7 mt_md--40 mt_sm--40">
                    <div class="content" data-sal="slide-left" data-sal-duration="800">
                        <div class="section-title">
                            <h2 class="title">Unique Business <br>
                                <span class="header-caption">
                                    <span class="cd-headline clip is-full-width">
                                        <span class="cd-words-wrapper">
                                            <b class="is-visible theme-gradient">Finance.</b>
                                            <b class="is-hidden theme-gradient">Consulting.</b>
                                            <b class="is-hidden theme-gradient">Agency.</b>
                                        </span>
                                    </span>
                                </span>
                            </h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                at the coast of the Semantics, a large language ocean. They live in Bookmarksgrove
                                right at the coast of the Semantics, a large language ocean.</p>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia. It is a paradisematic country, in which roasted parts of sentences. A
                                small river named Duden flows by their place and supplies it with the necessary
                                regelialia. It is a paradisematic country, in which roasted parts of sentences </p>
                            <div class="read-more-btn mt--40">
                                <a class="btn-default" href="#">
                                    <span>More About Us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area  -->


    <!-- Start Pricing Area  -->
    <div class="rwt-pricing-area rn-section-gap">
        <div class="wrapper plr--100 plr_md--15 plr_sm--15">
            <div class="row mb_sm--0">
                <div class="col-lg-12">
                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="400"
                        data-sal-delay="150">
                        <h4 class="subtitle "><span class="theme-gradient">Pricing</span></h4>
                        <h2 class="title w-600 mb--20"> Packages Pricing.</h2>
                    </div>
                </div>
            </div>
            <div class="row row--15">
                @foreach ( $plans as $plan )
                    <div class="col-lg-4 col-md-6 col-12 mt--80">
                        <div class="rn-pricing style-2
                            @if( $plan->recommended === '1' )
                                active
                            @endif
                        ">
                            <div class="pricing-table-inner">
                                <div class="pricing-header">
                                    <h4 class="title"> {{ $plan->title }} </h4>
                                    <div class="pricing">
                                        <div class="price-wrapper">
                                            <span class="currency">$</span>
                                            <span class="price"> {{ $plan->price }} </span>
                                        </div>
                                        <span class="subtitle"> ${{ $plan->old_price }} </span>
                                    </div>
                                </div>
                                <div class="pricing-body">
                                    {!! $plan->content !!}
                                </div>
                                <div class="pricing-footer">
                                    <a class="btn-default btn-border" href="{{ route("register") }}">Purchase Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Pricing Area  -->




    <!-- Strat Timeline Area -->
    <div class="rwt-timeline-area rn-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700"
                        data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">Timeline</span></h4>
                        <h2 class="title w-600 mb--20">Working Process.</h2>
                        <p class="description b1">We help our clients succeed by creating brand identities, <br>
                            digital experiences, and print materials.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mt--50">
                    <div class="timeline-style-two bg-color-blackest">
                        <div class="row row--0">
                            <div class="col-lg-3 col-md-3 rn-timeline-single dark-line">
                                <div class="rn-timeline">
                                    <h6 class="title sal-animate" data-sal="slide-up" data-sal-duration="400"
                                        data-sal-delay="200">Knowledge</h6>
                                    <div class="progress-line">
                                        <div class="line-inner"></div>
                                    </div>
                                    <div class="progress-dot">
                                        <div class="dot-level">
                                            <div class="dot-inner"></div>
                                        </div>
                                    </div>
                                    <p class="description sal-animate" data-sal="slide-up" data-sal-duration="400"
                                        data-sal-delay="300">Present all available features in Essentials.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 rn-timeline-single dark-line">
                                <div class="rn-timeline">
                                    <h6 class="title sal-animate" data-sal="slide-up" data-sal-duration="400"
                                        data-sal-delay="200">Working</h6>
                                    <div class="progress-line">
                                        <div class="line-inner"></div>
                                    </div>
                                    <div class="progress-dot">
                                        <div class="dot-level">
                                            <div class="dot-inner"></div>
                                        </div>
                                    </div>
                                    <p class="description sal-animate" data-sal="slide-up" data-sal-duration="400"
                                        data-sal-delay="300">All Feature available features in Essentials.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 rn-timeline-single dark-line">
                                <div class="rn-timeline">
                                    <h6 class="title sal-animate" data-sal="slide-up" data-sal-duration="400"
                                        data-sal-delay="200">Solution</h6>
                                    <div class="progress-line">
                                        <div class="line-inner"></div>
                                    </div>
                                    <div class="progress-dot">
                                        <div class="dot-level">
                                            <div class="dot-inner"></div>
                                        </div>
                                    </div>
                                    <p class="description sal-animate" data-sal="slide-up" data-sal-duration="400"
                                        data-sal-delay="300">Popular Feature available features in Essentials.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 rn-timeline-single dark-line">
                                <div class="rn-timeline">
                                    <h6 class="title sal-animate" data-sal="slide-up" data-sal-duration="400"
                                        data-sal-delay="200">Process</h6>
                                    <div class="progress-line">
                                        <div class="line-inner"></div>
                                    </div>
                                    <div class="progress-dot">
                                        <div class="dot-level">
                                            <div class="dot-inner"></div>
                                        </div>
                                    </div>
                                    <p class="description sal-animate" data-sal="slide-up" data-sal-duration="400"
                                        data-sal-delay="300">Latest Feature available features in Essentials.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Timeline Area -->





    <!---Strat Contact Area --->
    <div class="rwt-contact-area rn-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb--40">
                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700"
                        data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">Contact Form</span></h4>
                        <h2 class="title w-600 mb--20">Our Contact Address Here.</h2>
                    </div>
                </div>
            </div>

            <div class="row mt--40 row--15">
                <div class="col-lg-7">
                    <form class="contact-form-1 rwt-dynamic-form" id="contact-form" action="{{ route("send-messege") }}" method="POST" >

                        @csrf

                        <!------ name ------>
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Your Name..." value="{{ old("name") }}" minlength="8" maxlength="100" required/>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}.</div>
                            @enderror
                        </div>

                        <!------ phone ------>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" placeholder="Your Phone Number..." value="{{ old("phone") }}"  minlength="8" maxlength="100" required/>
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}.</div>
                            @enderror
                        </div>

                        <!------ email ------>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Your Email Address..." value="{{ old("email") }}"  minlength="8" maxlength="100" required/>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}.</div>
                            @enderror
                        </div>

                        <!------ subject ------>
                        <div class="form-group">
                            <input type="text" name="subject" id="subject" placeholder="Your Subject..." value="{{ old("subject") }}"  minlength="8" maxlength="100" required/>
                            @error('subject')
                                <div class="invalid-feedback d-block">{{ $message }}.</div>
                            @enderror
                        </div>

                        <!------ body ------>
                        <div class="form-group">
                            <textarea name="body" id="body" placeholder="Your Message..." required>{{ old("body") }}</textarea>
                            @error('body')
                                <div class="invalid-feedback d-block">{{ $message }}.</div>
                            @enderror
                        </div>

                        <!------ Submit Btn ------>
                        <div class="form-group">
                            <button type="submit" id="submit" class="btn-default btn-large rn-btn">
                                <span>Submit Now</span>
                            </button>
                        </div>

                    </form>
                </div>
                <div class="col-lg-5 mt_md--30 mt_sm--30">
                    <div class="google-map-style-1">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14554259.179133086!2d-105.54385245388013!3d37.49334218664659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1630777307491!5m2!1sen!2sbd"
                            width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---End Contact Area --->





@endsection
