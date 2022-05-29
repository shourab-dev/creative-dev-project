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
          <h3>{{ $course->moto }}</h3>
          <h1>{{ $course->title }}</h1>
          <ul>
            <li>
              কোর্সের মেয়াদ
              <span>{{ $course->duration }}</span>
            </li>
            <li>
              লেকচার
              <span>{{ $course->total_class }}</span>
            </li>
            <li>
              প্রজেক্ট
              <span>{{ $course->projects }}</span>
            </li>
          </ul>
          <p>
            {{ $course->demand }}
          </p>
          <a href="#" class="join_seminar">ফ্রি সেমিনার</a>
        </div>
        <div class="col-lg-7 courseImage">
          @if ($course->iframe)
          <div class="youtubeThumb" data-youtube="https://www.youtube.com/embed/IYlvBww0FRg">
            <img src="https://img.youtube.com/vi/IYlvBww0FRg/0.jpg" alt="" title="Yo yo" />
            <div class="overlay">
              <img src="{{ asset('frontend/image/play-button-icon.webp') }}" alt="icon" />
            </div>
          </div>
          @else
          <img src="{{ $course->image }}" alt="" style="width:100%">
          @endif


        </div>
      </div>
    </div>

  </section>
  <section id="overview">
    <div class="container">
      <div class="course_detail">
        <h2>কোর্স ওভারভিউ</h2>
        <p>{!! $course->detail !!}</p>
      </div>


      <div class="course_module">
        <h2>কোর্স কারিকুলাম</h2>
        <div class="row justify-content-between">
          @foreach ($course->features as $feature)
          <div class="col-lg-6 ">
            <div class="module">
              <h3>{{ $feature->title }}</h3>
              <div class="topics">{!! $feature->details !!}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="softwares">
        <h2>যেসব সফটওয়্যার শেখানো হয়</h2>
        <ul>
          @foreach (json_decode($course->softwares)->software as $software)

          <li>
            <img src="{{ $software }}" alt="">
          </li>
          @endforeach
        </ul>
      </div>
      <div class="marketplaces">
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


  </section>


  @push('frontendCss')
  <link rel="stylesheet" href="{{ asset('frontend/css/courseViewDhaka.css') }}">
  @endpush
  @endif
</x-frontend-app>