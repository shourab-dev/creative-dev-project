<x-frontend-app>
  @push('title')
  Success Stories -
  @endpush
  <section class="breadcrum">
    <h2>Freelancing Success Stories</h2>
    <p>
      <a href="{{ url('/') }}">Home</a>
      <i class="bi bi-chevron-right"></i>
      <a class="active" href="#">Success Stories</a>
    </p>
  </section>
  <section id="stories">
    <div class="container">
      <p>
        {{ $storyDetail->detail }}
      </p>

      <div class="successVideos">
        <div class="row justify-content-center">
          @forelse ($successStories as $successStory)
          <div class="col-lg-5 my-3 col-md-6">
            <div class="youtubeThumb" data-youtube="{{ $successStory->iframe }}">
              <img src="https://img.youtube.com/vi/{{ $successStory->iframe_img }}/0.jpg" alt="" title="Yo yo" />
              <div class="overlay">
                <img src="{{ asset('frontend/image/play-button-icon.webp') }}" alt="icon" />
              </div>
            </div>
          </div>
          @empty
          <p>No Stories Found!</p>
          @endforelse


        </div>
      </div>
    </div>
  </section>
</x-frontend-app>