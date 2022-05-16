<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creative It</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Courgette&family=DM+Sans:wght@700&family=Encode+Sans:wght@300;400&family=Inter:wght@300;400;500;600;700&family=Manrope:wght@400;600;800&family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&family=Roboto&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}" />
</head>

<body id="scrollBar">
    <!-- PRELOADER  -->
    {{-- <div class="preloader">
        <div class="preloader_cnt">
            <div class="preloader_img">
                <img src="./image/logo.webp" alt="" />
            </div>
            <div class="preloader_text">Creative It</div>
        </div>
    </div> --}}
    <!-- PRELOADER ENDED -->
    <!-- HEADER -->
    <header class="d-lg-block d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 logo">
                    <a href="{{ url('/') }}"><img src="{{ $header['logo'] }}" alt="" /></a>
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
            <img src="{{ $header['logo'] }}" alt="{{ env('APP_NAME') }}" />
        </a>
    </div>
    <nav class="navbar navbar-expand-lg py-3 py-lg-0 creative_navbar">
        <div class="container">
            <a class="navbar-brand d-block d-lg-none" href="#">
                <img src="./image/logo (2).png" alt="" class="img-fluid" style="height: 50px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mycustomNav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navToggler"><i class="bi bi-list"></i></span>
            </button>
            <div class="collapse navbar-collapse p-3 p-lg-0 mt-3 m-lg-0" id="mycustomNav">
                <ul class="navbar-nav d-lg-flex justify-content-lg-between">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="courses.html">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="success.html">Success Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="faculties.html">Our Faculties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Dhaka Branch</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}#seminar">Seminar</a>
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
                        <img src="{{ $footer['logo'] }}" alt="{{ env('APP_NAME') }}" />
                        <h4>{{ env('APP_NAME') }}</h4>
                        <p>{{ $footer['moto'] }}</p>
                    </div>
                </div>
                <div class="col-lg-4 location">
                    <h4>Address</h4>
                    <address>
                        9 No, Kapasgola Road (4th Floor), Chawk Bazar, Telpotti More,
                        Chattogram 4203, Bangladesh
                    </address>
                </div>

                <div class="col-lg-4 contact">
                    <h4>Contact</h4>
                    <p>
                        @foreach (json_decode($header['email'])->email as $email)
                        <a href="mailto:{{ $email }}">{{ $email }}</a>
                        @endforeach
                    </p>
                    @foreach ( json_decode($header['phone'])->phone as $phone)

                    <a href="tel:{{ str($phone)->replace(' ', '')->after('+88') }}">{{ $phone }}</a>

                    @endforeach

                    <ul>
                        <li>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <span class="py-3 d-block"><a href="https://www.facebook.com/FaisalAhmed.Shourab" target="__blank"
                    class="text-dark"><i class="bi bi-heart text-danger"></i> Developed By MD.Shourab</a></span>
            <p>Copyright © 2022 Creative IT Institute Chattogram</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js')}}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js')}}"></script>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ asset('frontend/js/app.js')}}"></script>
    <script></script>
</body>

</html>