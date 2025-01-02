<div class="col-md-6">
    <a href="{{ route('post', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
      <img src="{{ $post->image }}" alt="Image placeholder">
      <div class="blog-content-body">
        <div class="post-meta">
          <span class="author mr-2"><img src="{{ asset('assets/images/person_1.jpg') }}" alt="AI"> AI</span>&bullet;
          <span class="mr-2">{{ date_format($post->created_at, 'D, d M Y') }} </span> &bullet;
          <span class="ml-2"><span class="fa fa-comments"></span> {{ $post->comments->count() }}</span>
        </div>
        <h2>{{ $post->title }}</h2>
      </div>
    </a>
  </div>
