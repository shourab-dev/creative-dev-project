<x-frontend-app>
  @push('title')
  {{ $course->title }} -
  @endpush
  @if ($homeCustomize->course_stle == 'ctg')
  <section class="breadcrum">
    <h2>Course Details</h2>
    <p>
      <a href="{{ url('/') }}">Home</a>
      <i class="bi bi-chevron-right"></i>
      <a class="active text-capitalize" href="#">{{ str()->after(request()->url(),'course/') }}</a>
    </p>
  </section>
  <section id="courseView">
    <div class="container">
      <h1 class="courseHeading">{{ $course->title }}</h1>
      @if ($course->iframe)
      <div class="video_container">
        <iframe src="{{ $course->iframe }}?autoplay=1" title="Web Design with Creative It" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          loading="lazy" allowfullscreen="true"></iframe>
      </div>
      @else

      <div class="img_container ">
        <img src="{{ $course->image }}" alt="{{ $course->title }}" />
      </div>
      @endif
      <div class="aboutCourse">
        <h3>About Course</h3>
        <p>
          {!! $course->detail !!}
        </p>
      </div>
      @if (count($course->features)> 0)

      <div class="courseFeatures">
        <h3>Course Features</h3>
        <div class="row justify-content-lg-evenly">
          @foreach ($course->features as $feature)
          <div class="col-lg-4">
            <div class="featureCard">
              <div class="card_header">
                @if ($feature->feature_image)
                <img src="{{ $feature->feature_image }}" alt="{{ $feature->title }}" />

                @endif
                <h4>{{ $feature->title }}</h4>
              </div>
              <div class="card_body">
                {!! $feature->details !!}
              </div>
              <div class="button_container">
                <span class="featured_btn">Read More</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif
      <div class="row">
        <div class="marketPlace col-lg-7">
          <h3>Market Place</h3>
          <div class="row align-items-center">
            @foreach (json_decode($course->marketplace)->marketPlace as $marketPlace)
            <div class="col-6 mb-5 mb-lg-0 col-md-4 col-lg-3">
              <img src="{{ $marketPlace }}" alt="market places" />
            </div>
            @endforeach


          </div>
        </div>
        <div class="softwares col-lg-5">
          <h3>SoftWares</h3>
          <div class="row align-items-center">
            @foreach (json_decode($course->softwares)->software as $software)
            <div class="col-6 mb-5 mb-lg-0 col-md-4 col-lg-3">
              <img src="{{ $software }}" alt="Softwares" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="prerequisites">
        <h3>Prerequisites</h3>
        <p>
          {{ $course->basic }}
        </p>
      </div>
      <div class="career">
        <h3>Career Opportunity</h3>
        {!! $course->carrer !!}
        <a href="{{ url('/') }}#seminar" target="__blank" class="joinSeminar">Join Seminar</a>
      </div>
    </div>
  </section>
  @elseif ($homeCustomize->course_stle == 'dhaka')
  <section id="front" style="background: url({{ asset('frontend/image/course_viewBGHero.webp') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 courseDetails">
          <h3 data-aos="fade-up" data-aos-duration="300">{{ $course->moto }}</h3>
          <h1 data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">{{ $course->title }}</h1>
          <ul>
            <li data-aos="zoom-in" data-aos-duration="400" data-aos-delay="200">
              কোর্সের মেয়াদ
              <span>{{ $course->duration }}</span>
            </li>
            <li data-aos="zoom-in" data-aos-duration="600" data-aos-delay="300">
              লেকচার
              <span>{{ $course->total_class }}</span>
            </li>
            <li data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">
              প্রজেক্ট
              <span>{{ $course->projects }}</span>
            </li>
          </ul>
          <p data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">
            {{ $course->demand }}
          </p>
          <a href="{{ url('/') }}#seminar" class="join_seminar" data-aos="fade-up" data-aos-duration="400"
            data-aos-delay="200">ফ্রি
            সেমিনার</a>
        </div>
        <div class="col-lg-7 courseImage">
          @if ($course->iframe)
          <div data-aos="fade-left" data-aos-duration="400" data-aos-delay="200" class="youtubeThumb"
            data-youtube="https://www.youtube.com/embed/IYlvBww0FRg">
            <img src="https://img.youtube.com/vi/IYlvBww0FRg/0.jpg" alt="" title="Yo yo" />
            <div class="overlay">
              <img src="{{ asset('frontend/image/play-button-icon.webp') }}" alt="icon" />
            </div>
          </div>
          @else
          <img data-aos="fade-left" data-aos-duration="400" data-aos-delay="200" src="{{ $course->image }}" alt=""
            style="width:100%">
          @endif


        </div>
      </div>
    </div>

  </section>
  <section id="overview">
    <div class="container">
      <div class="sideBarArea">
        <div class="leftSideBar">
          <div class="course_detail">
            <h2 data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">কোর্স ওভারভিউ</h2>
            <div data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">
              <p>{!! $course->detail !!}</p>
            </div>
          </div>
          <div class="course_module">
            <h2 data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">কোর্স কারিকুলাম</h2>
            <div class="row justify-content-between">
              @foreach ($course->features as $feature)
              <div class="col-lg-6 " data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">
                <div class="module">
                  <h3>{{ $feature->title }}</h3>
                  <div class="topics">{!! $feature->details !!}</div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="softwares" data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">
            <h2>যেসব সফটওয়্যার শেখানো হয়</h2>
            <ul>
              @foreach (json_decode($course->softwares)->software as $software)
              <li>
                <img src="{{ $software }}" alt="">
              </li>
              @endforeach
            </ul>
          </div>
          <div class="marketplaces" data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">
            <h2>যেসব মার্কেটপ্লেস শেখানো হয়</h2>
            <ul>
              @foreach (json_decode($course->marketplace)->marketPlace as $marketPlace)
              <li>
                <img src="{{ $marketPlace }}" alt="">
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="rightSideBar">
          <h3 data-aos="fade-down" data-aos-duration="400" data-aos-delay="200">অন্যান্য কোর্স সমূহ </h3>
          <hr>
          @forelse ($relatedCourses as $relate)

          <div class="px-2" data-aos="fade-left" data-aos-duration="400" data-aos-delay="200">
            <a href="{{ route('course.view', $relate->slug) }}">
              <div class="course_card">
                <div class="course_img">
                  <img src="{{ $relate->thumbnail }}" alt="{{ $relate->title }}">
                </div>
                <div class="course_detail">
                  <h3>{{ $relate->title }}</h3>
                  <p>ক্লাস সংখ্যা {{ $relate->total_class }}</p>
                  <h4>কোর্সের মেয়াদ {{ $relate->duration }}</h4>
                </div>
            </a>
          </div>

        </div>
        @empty
        <p>nothing found</p>
        @endforelse
      </div>
    </div>
    </div>


  </section>


  @push('frontendCss')
  <link rel="stylesheet" href="{{ asset('frontend/css/courseViewDhaka.css') }}">
  @endpush
  @endif
</x-frontend-app>