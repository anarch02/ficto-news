<div class="col-md-12 col-lg-4 sidebar">
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

    <div class="sidebar-box">
      <h3 class="heading">{{ __('app.categories') }}</h3>
      <ul class="categories">
        @foreach ($categories as $category)
        <li><a href="{{ route('category', ['locale' => app()->getLocale(), 'slug' => $category->slug]) }}">{{ $category->name }} <span>({{ $category->posts->count() }})</span></a></li>
        @endforeach
      </ul>
    </div>
</div>
