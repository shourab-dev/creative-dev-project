<x-blog-app>


  <section id="blogView">
    <div class="container">

      <div class="blog_img">
        <div class="img" style="background-image: url({{ $blog->img }});">
        </div>
        <div class="overlay">
          @foreach ($blog->categories as $category)

          <span class="tag"><i class="bi bi-tag-fill"></i> {{ $category->name }}</span>
          @endforeach
          <h1>{{ str()->headline($blog->title) }}</h1>
          <p>by Creative IT Blog | {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</p>
        </div>
      </div>
      <div class="blog_component">
        <div class="blog_detail">
          {!! $blog->detail !!}
        </div>
        <aside>
          <h4>Search Here</h4>
          <div class="search">
            <form action="" method="POST">
              <input type="text" placeholder="Type Here">
              <button>Search</button>
            </form>
          </div>
          <div class="related_blog">
            @foreach ($relatedBLog as $relate)
            <div class="blog_post">
              <a href="{{ route('blog.view', [$relate->categories[0]->name,$relate->slug]) }}">
                <img src="{{ $relate->thumbnail }}" alt="">
                <h4>{{ $relate->title }}</h4>
              </a>
            </div>

            @endforeach
          </div>

        </aside>
      </div>



    </div>
  </section>
</x-blog-app>