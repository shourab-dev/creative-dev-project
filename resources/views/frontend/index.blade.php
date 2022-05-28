<x-frontend-app>
  @push('title')
  Home -
  @endpush
  {{-- PROMO MODAL --}}
  @if ($customize->promo_modal == true)
  @push('frontendCss')
  <style>
    /* PROMO MODAL DESIGN */
    #promoModal {
      position: fixed;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 99999999999999;
      display: grid;
      place-items: center;
    }

    #promoModal .promo_modal_cnt {
      width: 100%;
      max-width: 600px;
      position: relative;
    }

    #promoModal .promo_modal_cnt img {
      width: 100%;
    }

    #promoModal .promoModalClose {
      width: 40px;
      height: 40px;
      line-height: 40px;
      text-align: center;
      cursor: pointer;
      background-color: rgb(194, 5, 5);
      color: white;
      font-size: 1.5rem;
      display: inline-block;
      position: absolute;
      top: 0px;
      left: calc(100% - 40px);
    }

    /* PROMO MODAL DESIGN END*/
  </style>
  @endpush
  <div id="promoModal">
    <div class="promo_modal_cnt">
      <img src="{{ $customize->modal_img }}" alt="PROMO MODAL IMAGE">
      <span class="promoModalClose">
        <i class="bi bi-x-lg"></i>
      </span>
    </div>
  </div>
  @endif
  {{-- PROMO MODAL --}}
  {{-- PRELOADER --}}
  @if ($customize->preloader == 1)
  <div class="preloader">
    <div class="preloader_cnt">
      <div class="preloader_img">
        <img src="{{ $footer['logo'] }}" alt="" />
      </div>
      <div class="preloader_text">Creative It</div>
    </div>
  </div>
  @endif

  {{-- PRELOADER ENDS --}}



  @if (session()->has('success'))
  <div class="toast show position-fixed shadow-lg" style="bottom: 4rem; right:3rem; z-index:99" role="alert"
    aria-live="assertive" aria-atomic="true">
    <div class="toast-header flex justify-content-between pe-4">
      <img src="{{ asset('frontend/image/logo-toast.webp') }}" alt="">
      <button type="button" class="btn-close " data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body bg-white">
      <div class="row align-items-center">
        <div class="col-2" style="font-size:2.8rem; color:#00e961">
          <i class="bi bi-check-circle-fill"></i>
        </div>
        <div class="col-9">
          {!! session('success') !!}
        </div>
      </div>
    </div>
  </div>

  @endif
  <!-- BANNER SECTION  -->
  @if (count($banners) > 0)
  <section id="banner">
    <div class="banner_slider">
      @foreach ($banners as $banner)

      <div class="slider_cnt" style="background-image: url({{ $banner->image }})">
        <div class="container">
          <div class="banner_cnt col-lg-5 d-none d-lg-block">
            <h2>{{@ $banner->title }}</h2>
            <p>{{ @$banner->detail }}</p>
            @if ($banner->button)
            <a href="{{ @$banner->link }}">{{@ $banner->button }}</a>
            @endif
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </section>
  @endif
  <!-- BANNER SECTION END -->
  <!-- ABOUT SECTION STARTS -->
  <section id="about">
    {{-- <div class="abstract_img">
      <img class="balls" loading="lazy" src="{{ asset('frontend/image/abstract_3d_object/balls.webp') }}" alt="balls"
        data-aos="fade-up" data-aos-delay="300" />
      <img class="line" loading="lazy" src="{{ asset('frontend/image/abstract_3d_object/line.webp') }}" alt="line"
        data-aos="fade-up" data-aos-delay="300" />
      <img class="line" loading="lazy" src="{{ asset('frontend/image/abstract_3d_object/line.webp') }}" alt="line"
        data-aos-delay="300" data-aos="fade-up" />
      <img class="spiral" loading="lazy" src="{{ asset('frontend/image/abstract_3d_object/spiral.webp') }}" alt="spiral"
        data-aos-delay="300" data-aos="fade-up" />
      <img class="sprial2" loading="lazy" src="{{ asset('frontend/image/abstract_3d_object/spiral2.webp') }}"
        alt="spiral" data-aos="fade-down" data-aos-delay="300" />
    </div> --}}
    <div class="container">
      <h1>
        Welcome to <span>Creative IT Institute</span>: Where IT Leaders are
        Created
      </h1>
      <p data-aos="fade-up">
        Creative IT Institute, one of the leading IT training institutes in
        Bangladesh offers the best training opportunities. It has been
        playing a vital role to eradicate the unemployment problem since
        2008. Enriched with quality training this institute has never failed
        to help the individuals to reveal their talents making harmony
        between creativity and IT. No matter what is your background, we are
        offering 30 courses for you conducted by experienced trainers to
        advance your skills.
      </p>
      <p data-aos="fade-up">
        CIT has tremendously well-decorated two campuses with upgraded
        equipment. Our students are very much happy with our culture,
        environment and outstanding training method. We are passionate about
        providing good service to our students. Thus, the students of this
        institute turn out to be successful marketers and establish their
        careers in various companies as well. We dedicatedly provide
        flexible training options such as online training, 24/7 support,
        lifetime post-training support, job placement and so on. We always
        maintain the standards of excellence which are visible on
        <a href="https://www.facebook.com/CITI.Chattogram">Facebook Reviews</a>
        and <a href="shorturl.at/elJNU">Google Reviews.</a>
      </p>
    </div>
  </section>
  <!-- ABOUT SECTION END -->
  <!-- COURSES SECTION STARTS -->
  @if (count($courses) > 0)
  <section id="courses">
    <div class="animated__human">
      <img src="{{ asset('frontend/image/abstract_3d_object/human.webp') }}" alt="human" />
    </div>
    <div class="container">
      <div class="intro">
        <h2 data-aos="fade-up" class="heading">Our Courses</h2>
        <p class="text-center" data-aos="fade-up" data-aos-delay="200">
          Explore Our Courses
        </p>
      </div>
      <div class="course_filter">
        <div class="filter_buttons">
          <button type="button" data-filter="all">All</button>
          @foreach ($departments as $department)

          <button type="button" data-filter=".{{ str()->slug($department->name) }}">{{
            str()->headline($department->name) }}</button>
          @endforeach

        </div>
        <div class="filterable_container" data-aos="fade-up">
          <div class="row">
            @foreach ($courses as $course)
            @if ($course->department != null)

            <div class="px-md--3 col-lg-6">
              <div class="mix {{ str()->slug($course->department->name) }} course_card">
                <div class="row mx-0 align-items-stretch">
                  <div class="course_img col-md-5">
                    <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}" loading="lazy" />
                  </div>
                  <div class="col-md-7 course_text">
                    <h3 class="text-capitalize">{{ $course->title }}</h3>
                    <p>
                      {!! str()->substr($course->detail, 0 , 150,). '....'!!}
                    </p>
                    <a href="{{ route('course.view', $course->slug) }}">View Details</a>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- COURSES SECTION ENDS -->
  <!-- SEMINAR SECTION STARTS -->
  @if (count($seminars) > 0)

  <section id="seminar">
    <div class="container">
      <div class="seminar_model">
        <div class="card">
          <div class="logo">
            <img src="{{ $footer['logo'] }}" loading="lazy" alt="" />
          </div>
          <div class="card-header px-2">
            <p class="h5">Join Seminar</p>
            <span class="float-end close__modal position-absolute"><i class="bi bi-x-lg"></i></span>
          </div>
          <div class="card-body">
            <form action="{{ route('seminar.join') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Name: -</label>
                <input required type="text" class="form-control" id="name" name="name" />
              </div>
              <div class="form-group">
                <label for="phone">Phone: -</label>
                <input required type="number" class="form-control" id="phone" name="phone" />
              </div>
              <div class="form-group">
                <label for="email">Email: -</label>
                <input required type="email" class="form-control" id="email" name="email" />
              </div>
              <div class="form-group">
                <label for="course">Select Seminar: -</label>
                <select name="seminar_id" id="course" class="form-control">
                  @foreach ($seminars as $seminar)
                  <option value="{{ $seminar->id }}">{{ $seminar->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="address">Address: -</label>
                <textarea required name="address" id="address" class="form-control"></textarea>
              </div>
              <button>Join Seminar</button>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="intro">
          <h2 class="heading" data-aos="fade-up">Still Confused Join</h2>
          <p data-aos="fade-up" data-aos-delay="150">
            Join Our Free Seminars & Workshops !
          </p>
        </div>

        <div data-aos-delay="300" data-aos="fade-up" class="table_container table-responsive-lg">
          <table class="table" valign="center">
            <tr>
              <th>Topic</th>
              <th>Date</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
            @foreach ($seminars as $seminar)
            <tr>
              <td>{{ $seminar->name }}</td>
              <td>{{ Carbon\Carbon::parse($seminar->date)->format('d M Y, D') }}</td>
              <td>{{ Carbon\Carbon::parse($seminar->time)->format('g:i A') }}</td>
              <td>
                <a style="cursor: pointer" data-id="{{ $seminar->id }}" class="join__seminar__btn">Join Now</a>
              </td>
            </tr>
            @endforeach

          </table>
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- SEMINAR SECTION ENDS -->

  <!-- Blog STORIES STARTS HERE -->
  {{-- <section id="blog">
    <div class="container">
      <div class="intro mb-5">
        <h2 data-aos="fade-up">Our Blogs</h2>
        <p data-aos="fade-up" data-aos-delay="200">Road To Success</p>
      </div>
      <div class="row">
        <div class="col-lg-4 px-3 my-3 my-lg-0" data-aos="zoom-in-up" data-aos-delay="400">
          <a href="blogView.html">
            <div class="success_card">
              <div class="card_img">
                <img src="./image/feature_card_img.webp" alt="" loading="lazy" />
              </div>
              <div class="card_text">
                <h3>Feature BLog Title</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Alias quasi, non rerum suscipit vero accusantium impedit
                  architecto quibusdam nostrum magni id, odio quae qui iure
                  facere itaque illum dolorum aut....
                </p>
                <button>Read More</button>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 px-3 my-3 my-lg-0" data-aos="zoom-in-up" data-aos-delay="500">
          <a href="blogView.html">
            <div class="success_card">
              <div class="card_img">
                <img src="./image/feature_card_img.webp" alt="" loading="lazy" />
              </div>
              <div class="card_text">
                <h3>Feature BLog Title</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Alias quasi, non rerum suscipit vero accusantium impedit
                  architecto quibusdam nostrum magni id, odio quae qui iure
                  facere itaque illum dolorum aut....
                </p>
                <button>Read More</button>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 px-3 my-3 my-lg-0" data-aos="zoom-in-up" data-aos-delay="600">
          <a href="blogView.html">
            <div class="success_card">
              <div class="card_img">
                <img src="./image/feature_card_img.webp" alt="" />
              </div>
              <div class="card_text">
                <h3>Feature BLog Title</h3>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Alias quasi, non rerum suscipit vero accusantium impedit
                  architecto quibusdam nostrum magni id, odio quae qui iure
                  facere itaque illum dolorum aut....
                </p>
                <button>Read More</button>
              </div>
            </div>
          </a>
        </div>
      </div>
      <a href="#" class="view__more">View More <i class="bi bi-caret-right"></i></a>
    </div>
  </section> --}}
  <!-- Blog STORIES ENDS HERE -->
  <!-- CONTACT SECTION STARTS HERE -->
  <section id="contact">
    <div class="container">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-5 order-2 order-lg-1">
          <div class="contact_form">
            <h2 class="mt-4 my-lg-0">
              Get A Free <br />
              <span>Counselling</span>
            </h2>
            <form action="{{ route('counciling.save') }}" method="POST">
              @csrf
              <input type="text" class="form-control" placeholder="Enter Your Name" name="name" data-aos="fade-up" />
              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="phone"
                data-aos="fade-up" data-aos-delay="200" />
              @error('phone')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <input type="text" class="form-control" placeholder="Enter Your Email Address" name="email"
                data-aos="fade-up" data-aos-delay="300" />
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <button type="submit" data-aos="fade-up" data-aos-delay="400">
                Submit
              </button>
            </form>

          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <div class="contact_img" data-aos="fade-right" data-aos-delay="100">
            <img loading="lazy" src="{{ asset('frontend/image/abstract_3d_object/contactBG.webp') }}" alt="contact img"
              class="img-fluid" loading="lazy" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTACT SECTION  ENDS -->
  <!-- OUR FACILITIES SECTION STARTS -->
  @if (count($facilities) > 0)

  <section id="facilities">
    <div class="container">
      <div class="intro mb-5">
        <h2 data-aos="fade-up">Our Facilities</h2>
        <p data-aos="fade-up" data-aos-delay="300">
          Explore the weapons of Latest Information Technology!
        </p>
      </div>
      <div class="facilities_cards" data-aos="fade-up">
        <div class="row">
          @foreach ($facilities as $facility)
          <div class="col-lg-4 col-md-6 text-center text-lg-start">
            <div class="facility_card">
              <img src="{{ $facility->image }}" alt="{{ $facility->title }}" loading="lazy" />
              <h3>{{ $facility->title }}</h3>
              <p>
                {{ $facility->detail }}
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- OUR FACILITIES SECTION ENDS -->
</x-frontend-app>