<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box search-form-wrap">
      <form action="#" class="search-form">
        <div class="form-group">
          <span class="icon fa fa-search"></span>
          <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
        </div>
      </form>
    </div>
    <!-- END sidebar-box -->
    <div class="sidebar-box">
        <div class="bio text-center">
          <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image Placeholder" class="img-fluid">
          <div class="bio-body">
            <h2>{{ __('bio.name') }}</h2>
            <p>{{ __('bio.about') }}</p>
          </div>
        </div>
      </div>

    <div class="sidebar-box">
      <div class="bio text-center">
        <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image Placeholder" class="img-fluid">
        <div class="bio-body">
          <h2>{{ __('bio.name_2') }}</h2>
          <p>{{ __('bio.about_2') }}</p>
          <p><a href="https://rakhmatjonov.uz/about" target="blank" class="btn btn-primary btn-sm rounded">{{ __('bio.read_bio') }}</a></p>
          <p class="social">
            <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
            <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
            <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
            <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
          </p>
        </div>
      </div>
    </div>

    <!-- END sidebar-box -->
    {{-- <div class="sidebar-box">
      <h3 class="heading">Popular Posts</h3>
      <div class="post-entry-sidebar">
        <ul>
          <li>
            <a href="">
              <img src="{{ asset('assets/images/img_2.jpg') }}" alt="Image placeholder" class="mr-4">
              <div class="text">
                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                <div class="post-meta">
                  <span class="mr-2">March 15, 2018 </span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="">
              <img src="{{ asset('assets/images/img_4.jpg') }}" alt="Image placeholder" class="mr-4">
              <div class="text">
                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                <div class="post-meta">
                  <span class="mr-2">March 15, 2018 </span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="">
              <img src="{{ asset('assets/images/img_12.jpg') }}" alt="Image placeholder" class="mr-4">
              <div class="text">
                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                <div class="post-meta">
                  <span class="mr-2">March 15, 2018 </span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- END sidebar-box --> --}}

    <div class="sidebar-box">
      <h3 class="heading">{{ __('app.categories') }}</h3>
      <ul class="categories">
        @foreach ($categories as $category)
        <li><a href="{{ route('category', ['locale' => app()->getLocale(), 'slug' => $category->slug]) }}">{{ $category->name }} <span>({{ $category->posts->count() }})</span></a></li>
        @endforeach
      </ul>
    </div>
    <!-- END sidebar-box -->
