<div class="post-entry-horzontal">
    <a href="blog-single.html">
      <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url({{ $post->image }});"></div>
      <span class="text">
        <div class="post-meta">
          <span class="author mr-2"><img src="{{ asset('assets/images/person_1.jpg') }}" alt="AI"> AI</span>&bullet;
          <span class="mr-2">{{ date_format($post->created_at, 'D, d M Y') }} </span> &bullet;
          <span class="mr-2">{{ $category->name ?? $post->categories[0]->name }}</span> &bullet;
          <span class="ml-2"><span class="fa fa-comments"></span> {{ $post->comments->count() }}</span>
        </div>
        <h2>{{ $post->title }}</h2>
      </span>
    </a>
  </div>
  <!-- END post -->
