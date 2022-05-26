<x-blog-app>
  <section id="blogLandingSection">
    <div class="container">
      <div class="gridLayout">
        @foreach ($trendBlog as $key=>$trend)
        <div class="blogCard  {{ $key == 0 ? 'activeBlogCard' : '' }}" data-aos="zoom-in">
          <a href="{{ route('blog.view', [$trend->categories[0]->name,$trend->slug]) }}">
            <img src="{{ $trend->thumbnail }}" alt="{{ $trend->title }}" />
            <div class="overlay">
              <p>
                {{ $trend->title }}
              </p>
            </div>
          </a>
        </div>
        @endforeach

      </div>
    </div>
  </section>

  <!-- Blog STORIES STARTS HERE -->
  <section id="blog">
    <div class="container">
      <div class="intro mb-5">
        <h2 data-aos="fade-up">Latest Blogs</h2>
      </div>
      <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-lg-4 px-3 my-3 my-lg-0">
          <a href="{{ route('blog.view', [$blog->categories[0]->name,$blog->slug]) }}">
            <div class="success_card">
              <div class="card_img">
                <img src="{{ $blog->thumbnail }}" alt="" />
              </div>
              <div class="card_text">
                <h3>{{ $blog->title }}</h3>
                <p>
                  {!! str()->substr($blog->short_detail, 0 , 150). '...'!!}
                </p>
                <button>Read More</button>
              </div>
            </div>
          </a>
        </div>
        @endforeach

      </div>

    </div>
  </section>
  <!-- Blog STORIES ENDS HERE -->
</x-blog-app>