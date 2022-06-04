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
  @if (count($blogs) > 0)

  <section id="blog">
    <div class="container">
      <div class="intro mb-5">
        <h2 data-aos="fade-up">{{ request()->routeIs('blog.search.view') ? 'Search Results' : 'Latest Blogs' }}</h2>
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
  @endif
  <!-- Blog STORIES ENDS HERE -->
  <!-- Category Wise blog -->
  @if (count($categoryWiseBlog) > 0)


  @foreach ($categoryWiseBlog as $category)


  <section id="blog">
    <div class="container">
      <div class="intro mb-5">
        <h2 data-aos="fade-up">{{ $category->name }}</h2>
      </div>
      <div class="row">
        @foreach ($category->posts as $blog)
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
      @if (count($categoryWiseBlog) != 1)
      <a href="{{ route('blog.category.view', $category->name) }}" class="btn__read_more">Load More</a>
      @endif

    </div>
  </section>
  @endforeach
  @endif
  <!-- Category Wise blog ENDS HERE -->
</x-blog-app>