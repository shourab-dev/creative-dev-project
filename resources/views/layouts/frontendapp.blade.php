<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Develop your professional &amp; personal skills through Creative IT Institute. We provide Graphic Design, Web &amp; Software, Digital Marketing, Networking, Film &amp; Media, Robotics &amp; Automation Training etc affordable price. Call + 880 162 4666000">
    <meta property="og:image" content="{{ asset('frontend/image/logo.webp') }}">
    <link rel="canonical" href="{{ config('app.url') }}" />
    <title> @stack('title') {{ config('app.name') }} - Best Leading It Institute in Bangladesh</title>
    <meta name="keywords"
        content="@stack('keyword') best institute, it institute, web design, graphics design, professional course, digital marketing, basic computer course, creative it, creative it institute" />
    <link rel="icon" type="image/png" sizes="32x32" href="http://127.0.0.1:8000/frontend/image/fab_icon.png">


    {{--
    <link
        href="https://fonts.googleapis.com/css2?family=Courgette&family=DM+Sans:wght@700&family=Encode+Sans:wght@300;400&family=Inter:wght@300;400;500;600;700&family=Manrope:wght@400;600;800&family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&family=Roboto&display=swap"
        rel="stylesheet" /> --}}

    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" />
    @stack('frontendCss')
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}" />
</head>

<body id="scrollBar">

    <!-- HEADER -->
    <header class="d-lg-block d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 logo">
                    <a href="{{ url('/') }}"><img src="{{ asset($header['logo'])  }}" alt="" /></a>
                </div>
                <div class="col-lg-7">
                    <div class="row align-items-center">
                        <div class="header_contact col-6 d-flex align-items-center">
                            <span>
                                <i class="bi bi-telephone-fill"></i>
                            </span>
                            @if (count(json_decode($header['phone'])->phone) > 0)
                            <ul>

                                @foreach ( json_decode($header['phone'])->phone as $phone)
                                <li>
                                    <a href="tel:{{ str($phone)->replace(' ', '')->after('+88') }}">{{ $phone }}</a>
                                </li>
                                @endforeach

                            </ul>
                            @endif

                        </div>
                        <div class="header_contact col-6 d-flex align-items-center">
                            <span>
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <ul>
                                @foreach (json_decode($header['email'])->email as $email)
                                <li>
                                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER ENDS -->

    <!-- NAVBAR SECTION -->
    <div class="fixedLogo text-center py-3 d-none">
        <a href="{{ url('/') }}">
            <img src="{{ asset($header['logo']) }}" alt="{{ config('app.name') }}" />
        </a>
    </div>
    <nav class="navbar navbar-expand-lg py-3 py-lg-0 creative_navbar">
        <div class="container">
            <a class="navbar-brand d-block d-lg-none" href="#">
                <img src="{{ asset($header['logo']) }}" alt="" class="img-fluid" style="height: 50px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mycustomNav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navToggler"><i class="bi bi-list"></i></span>
            </button>
            <div class="collapse navbar-collapse p-3 p-lg-0 mt-3 m-lg-0" id="mycustomNav">
                <ul class="navbar-nav d-lg-flex justify-content-lg-between">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('/') }}">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('about') }}">আমাদের সম্পর্কে</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.success.story') ? 'active' : '' }}"
                            aria-current="page" href="{{ route('frontend.success.story') }}">সাফল্যের গল্প</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('faculties.view') ? 'active' : '' }}"
                            aria-current="page" href="{{ route('faculties.view') }}">আমাদের মেন্টরস</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('blog') }}">ব্লগস</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">যোগাযোগ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}#seminar">ফ্রি সেমিনার</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR SECTION ENDS -->
    <main>
        {{ $slot }}
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo">
                        <img src="{{ asset($footer['logo']) }}" alt="{{ config('app.name') }}" />
                        <h4>{{ config('app.name') }}</h4>
                        <p>{{ $footer['moto'] }}</p>
                    </div>
                </div>
                <div class="col-lg-4 location">
                    <h4>আমাদের ঠিকানা</h4>
                    <address>
                        {{ $footer['address'] }}
                    </address>
                </div>

                <div class="col-lg-4 contact">
                    <h4>যোগাযোগ করুন</h4>
                    <p>
                        @foreach (json_decode($header['email'])->email as $email)
                        <a href="mailto:{{ $email }}">{{ $email }}</a>
                        @endforeach
                    </p>
                    @foreach ( json_decode($header['phone'])->phone as $phone)

                    <a href="tel:{{ str($phone)->replace(' ', '')->after('+88') }}">{{ $phone }}</a>

                    @endforeach

                    <ul>
                        @forelse ($socialLinks as $socialLink)
                        <li>
                            <a href="{{ $socialLink->link }}" target="__blank"><i
                                    class="{{ $socialLink->icon }}"></i></a>
                        </li>
                        @empty
                        <li>No Link is available right now</li>
                        @endforelse

                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <span class="py-3 d-block">
                <a href="{{ $portfolio->link }}" target="__blank" class="text-dark">
                    {!! $portfolio->text !!}
                </a></span>
            <p>{{ $footer['copyright'] }}</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js')}}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js')}}"></script>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ asset('frontend/js/app.js')}}"></script>
    @stack('frontendJs')
</body>

</html>