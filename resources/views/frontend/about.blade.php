<x-frontend-app>
  @push('title')
  About Us -
  @endpush
  <!-- breadcrum section starts -->
  <section class="breadcrum">
    <div class="container">
      <h2>আমাদের সম্পর্কে</h2>
      <p>
        <a href="{{ url('/') }}">হোম</a><i class="bi bi-chevron-right"></i>
        <a href="#" class="active">Creative IT</a>
      </p>
    </div>
  </section>
  <!-- breadcrum section ends -->
  <!-- infor section -->
  <section id="info">
    <div class="container">
      {!! $aboutData->detail !!}

    </div>
  </section>
  <!-- infor section ends-->
  <!-- MISSION SECTION -->
  <section id="missionVission">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <div class="mission">
            <h2>Missions</h2>
            {!! $aboutData->mission !!}
          </div>

          <div class="vission">
            <h2>Vissions</h2>
            {!! $aboutData->vission !!}
          </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block">
          <img src="{{ asset($aboutData->img) }}" alt="About Creative It" loading="lazy" />
        </div>
      </div>
    </div>
  </section>
  <!-- MISSION SECTION ENDS -->
</x-frontend-app>