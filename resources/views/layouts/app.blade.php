<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta -->
    {!! SEOMeta::generate() !!}

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/images/logo/favicon.png') }}">

    <!------- FontAwesome  ------->
    <script src="https://kit.fontawesome.com/bc98e6aa51.js" crossorigin="anonymous"></script>

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans:400,600&amp;display=swap"
        rel="stylesheet">

    <!-- CSS ============================================ -->
    <link rel="stylesheet" href="{{ asset('front/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/magnify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/customize.css') }}">
</head>

<body class="active-light-mode">

    <main class="page-wrapper">

        <header class="rn-header header-default header-left-align header-transparent header-sticky">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-md-6 col-4 position-static">
                        <div class="header-left d-flex">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img class="logo-light" src="{{ asset("front/images/logo/ahs-logo.png") }}" alt="AHS-Mocks">
                                    <img class="logo-dark" src="{{ asset("front/images/logo/ahs-logo.png") }}" alt="AHS-Mocks">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-8">
                        <div class="header-right">

                            <!-- Start Mobile-Menu-Bar -->
                            <div class="mobile-menu-bar ml--5 d-block d-lg-none">
                                <div class="hamberger">
                                    <button class="hamberger-button">
                                        <i class="feather-menu"></i>
                                    </button>
                                </div>
                            </div>

                            <nav class="mainmenu-nav d-none d-lg-block">
                                <ul class="mainmenu">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/#about">About</a></li>
                                    <li><a href="/#pricing">Pricing</a></li>
                                    <li><a href="/#contact">Contact</a></li>
                                    @if(Auth::guard('web')->check())
                                        <li class="has-droupdown has-menu-child-item menu-item-open"><a href="#"> {{ ucfirst( Auth::guard('web')->user()->name ) }} </a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('profile') }}"> Profile </a></li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </ul>
                                        </li>
                                    @elseif(Auth::guard('admin')->check())
                                        <li class="has-droupdown has-menu-child-item menu-item-open"><a href="#"> {{ ucfirst( Auth::guard('admin')->user()->name ) }} </a>
                                            <ul class="submenu">
                                                <li><a href="/admin/dashboard"> Dashboard </a></li>
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="/login">Login</a></li>
                                    @endif
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="popup-mobile-menu">
            <div class="inner">
                <div class="header-top">
                    <div class="logo">
                        <a href="index.html">
                            <img class="logo-light" src="assets/images/logo/logo.png" alt="Corporate Logo">
                            <img class="logo-dark" src="assets/images/logo/logo-dark.png" alt="Corporate Logo">
                        </a>
                    </div>
                    <div class="close-menu">
                        <button class="close-button">
                            <i class="feather-x"></i>
                        </button>
                    </div>
                </div>
                <ul class="mainmenu">
                    <li><a href="/">Home</a></li>
                    <li><a href="contact.html">About</a></li>
                    <li><a href="contact.html">Pricing</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="/register">Register</a></li>
                </ul>
            </div>
        </div>

        @yield('FrontContent')

        <footer class="rn-footer footer-style-default no-border">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="rn-footer-widget">
                                <h4 class="title">Services</h4>
                                <div class="inner">
                                    <ul class="footer-link link-hover">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="portfolio.html">Portfolio</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="service.html">Service</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="rn-footer-widget">
                                <div class="widget-menu-top">
                                    <h4 class="title">Solutions</h4>
                                    <div class="inner">
                                        <ul class="footer-link link-hover">
                                            <li><a href="brand.html">Brand</a></li>
                                            <li><a href="call-to-action.html">call To Action</a></li>
                                            <li><a href="counter.html">Counter</a></li>
                                            <li><a href="service.html">Service</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="rn-footer-widget">
                                <h4 class="title">Company</h4>
                                <div class="inner">
                                    <ul class="footer-link link-hover">
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="tab.html">Tab Styles</a></li>
                                        <li><a href="service.html">Service</a></li>
                                        <li><a href="social-share.html">Social</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="rn-footer-widget">
                                <h4 class="title">Resources</h4>
                                <div class="inner">
                                    <ul class="footer-link link-hover">
                                        <li><a href="team.html">Team</a></li>
                                        <li><a href="testimonial.html">Testimonial</a></li>
                                        <li><a href="service.html">Service</a></li>
                                        <li><a href="timeline.html">Timeline</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="rn-footer-widget">
                                <h4 class="title">Stay With Us.</h4>
                                <div class="inner">
                                    <h6 class="subtitle">2000+ Our clients are subscribe Around the World</h6>
                                    <ul class="social-icon social-default justify-content-start">
                                        <li><a href="https://www.facebook.com/">
                                                <i class="feather-facebook"></i>
                                            </a>
                                        </li>
                                        <li><a href="https://www.twitter.com">
                                                <i class="feather-twitter"></i>
                                            </a>
                                        </li>
                                        <li><a href="https://www.instagram.com/">
                                                <i class="feather-instagram"></i>
                                            </a>
                                        </li>
                                        <li><a href="https://www.linkdin.com/">
                                                <i class="feather-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright-area copyright-style-one no-border">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6  offset-md-6 col-sm-12 col-12">
                            <div class="copyright-right text-center text-lg-end">
                                Powered by
                                    <img src="https://cpapai.com/doob_template_assets/images/BluSky-logo.png" alt="BluSky-logo" width="35">
                                    <a href="http://bluskyint.com">BluSkyInt.Com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    <!-- Start Top To Bottom Area  -->
    <div class="rn-back-top">
        <i class="feather-arrow-up"></i>
    </div>
    <!-- End Top To Bottom Area  -->

    <!--==================== JS ======================== -->
    <script src="{{ asset('front/js/vendor/modernizr.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/waypoint.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/counterup.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/feather.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/sal.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/masonry.js') }}"></script>
    <script src="{{ asset('front/js/vendor/imageloaded.js') }}"></script>
    <script src="{{ asset('front/js/vendor/magnify.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/lightbox.js') }}"></script>
    <script src="{{ asset('front/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/easypie.js') }}"></script>
    <script src="{{ asset('front/js/vendor/text-type.js') }}"></script>
    <script src="{{ asset('front/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('front/js/vendor/jquery-one-page-nav.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('front/js/main.js') }}"></script>

</body>

</html>
