<x-frontend-app>

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
    <div class="abstract_img">
      <img class="balls" src="{{ asset('frontend/image/abstract_3d_object/balls.webp') }}" alt="balls"
        data-aos="fade-up" data-aos-delay="300" />
      <img class="line" src="{{ asset('frontend/image/abstract_3d_object/line.webp') }}" alt="line" data-aos="fade-up"
        data-aos-delay="300" />
      <img class="line" src="{{ asset('frontend/image/abstract_3d_object/line.webp') }}" alt="line" data-aos-delay="300"
        data-aos="fade-up" />
      <img class="spiral" src="{{ asset('frontend/image/abstract_3d_object/spiral.webp') }}" alt="spiral"
        data-aos-delay="300" data-aos="fade-up" />
      <img class="sprial2" src="{{ asset('frontend/image/abstract_3d_object/spiral2.webp') }}" alt="spiral"
        data-aos="fade-down" data-aos-delay="300" />
    </div>
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

          <button type="button" data-filter=".{{ str()->slug($department->name) }}">{{ $department->name }}</button>
          @endforeach

        </div>
        <div class="filterable_container" data-aos="fade-up">
          <div class="row">
            @foreach ($courses as $course)
            <div class="px-md--3 col-lg-6">
              <div class="mix {{ str()->slug($course->department->name) }} course_card">
                <div class="row mx-0 align-items-stretch">
                  <div class="course_img col-md-5">
                    <img src="{{ $course->thumbnail }}" alt="" />
                  </div>
                  <div class="col-md-7 course_text">
                    <h3 class="text-capitalize">{{ $course->title }}</h3>
                    <p>
                      {!! str()->substr($course->detail, 0 , 185,). '....'!!}
                    </p>
                    <a href="{{ $course->slug }}">View Details</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- COURSES SECTION ENDS -->
  <!-- SEMINAR SECTION STARTS -->
  <section id="seminar">
    <div class="container">
      <div class="seminar_model">
        <div class="card">
          <div class="logo">
            <img src="" alt="" />
          </div>
          <div class="card-header px-2">
            <p class="h5">Join Seminar</p>
            <span class="float-end close__modal position-absolute"><i class="bi bi-x-lg"></i></span>
          </div>
          <div class="card-body">
            <form action="">
              <div class="form-group">
                <label for="name">Name: -</label>
                <input type="text" class="form-control" id="name" />
              </div>
              <div class="form-group">
                <label for="phone">Phone: -</label>
                <input type="number" class="form-control" id="phone" />
              </div>
              <div class="form-group">
                <label for="email">Email: -</label>
                <input type="email" class="form-control" id="email" />
              </div>
              <div class="form-group">
                <label for="course">Select Seminar: -</label>
                <select name="course" id="course" class="form-control">
                  <option value="1">Web Design</option>
                  <option value="2">graphics Design</option>
                  <option value="3">digital Design</option>
                </select>
              </div>
              <div class="form-group">
                <label for="address">Address: -</label>
                <textarea name="address" id="address" class="form-control"></textarea>
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
            <tr>
              <td>Web Design and Development workshop</td>
              <td>25 Apr 2022, Monday</td>
              <td>3.00 pm</td>
              <td>
                <a href="#" data-id="1" class="join__seminar__btn">Join Now</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- SEMINAR SECTION ENDS -->

  <!-- Blog STORIES STARTS HERE -->
  <section id="blog">
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
        <div class="col-lg-4 px-3 my-3 my-lg-0" data-aos="zoom-in-up" data-aos-delay="500">
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
  </section>
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
              <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="phone"
                data-aos="fade-up" data-aos-delay="200" />
              <input type="text" class="form-control" placeholder="Enter Your Email Address" name="email"
                data-aos="fade-up" data-aos-delay="300" />
              <button type="submit" data-aos="fade-up" data-aos-delay="400">
                Submit
              </button>
            </form>
            @if (session()->has('success'))
            <p class="px-2 py-2 my-2" style="background: lightgreen;color: rgb(12, 37, 12);">
              {{ session('success') }}
            </p>
            @endif
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <div class="contact_img" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('frontend/image/abstract_3d_object/contactBG.webp') }}" alt="contact img"
              class="img-fluid" />
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
              <img src="{{ $facility->image }}" alt="{{ $facility->title }}" />
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