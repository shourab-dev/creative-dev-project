<x-frontend-app>
  <section class="breadcrum">
    <h2>Our Faculties</h2>
    <p>
      <a href="{{ url('/') }}">Home</a>
      <i class="bi bi-chevron-right"></i>
      <a class="active" href="#">Faculties</a>
    </p>
  </section>

  <!-- COURSES SECTION STARTS -->
  <section id="faculties">
    <div class="container">
      <div class="faculties_filter">
        <div class="filter_buttons">
          <button type="button" data-filter="all">All</button>
          @foreach ($departments as $dp)
          <button type="button" data-filter=".{{ str()->slug($dp->name) }}">{{ str()->headline($dp->name) }}</button>
          @endforeach

        </div>
        <div class="filterable_container" data-aos="fade-up">
          @foreach ($faculties as $faculty)
          @if (count($faculty->department) > 0)

          <div class="mix @foreach ($faculty->department as $facultydp)
            {{ str()->slug($facultydp->name) }}
          @endforeach">
            <div class="faculty_card" data-aos="fade-up">
              <div class="row justify-content-center">
                <div class="faculty_img col-md-4">
                  <img src="{{ $faculty->img }}" alt="{{ $faculty->name }}" loading="lazy" />
                </div>
                <div class="faculty_detail col-md-6">
                  <h2 class="mt-3 mt-md-0">{{ $faculty->name }}</h2>
                  <span class="designation mb-4">{{ $faculty->designation }}</span>
                  <div class="row">
                    <div class="col-md-6 specialize">
                      <h4>Specialized Area</h4>
                      @foreach (json_decode($faculty->speciality) as $speciality)

                      <p>{{$speciality }}</p>
                      @endforeach
                    </div>
                    <div class="col-md-6 education">
                      <h4>Education</h4>
                      @foreach (json_decode($faculty->education) as $education)
                      <p>{{ $education }}</p>
                      @endforeach
                    </div>
                    <div class="marketplace">
                      <h4>Working Marketplaces</h4>
                      @foreach (json_decode($faculty->marketplace)->marketPlace as $marketplace)
                      <img loading="lazy" src="{{ $marketplace }}" alt="Freelanding Marketplace" />
                      @endforeach

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach

        </div>
        {{ $faculties->links() }}
      </div>
    </div>
  </section>
  <!-- COURSES SECTION ENDS -->
</x-frontend-app>