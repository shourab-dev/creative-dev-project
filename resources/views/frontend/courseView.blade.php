<x-frontend-app>
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
                <img src="{{ $feature->feature_image }}" alt="{{ $feature->title }}" />
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
</x-frontend-app>