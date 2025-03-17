<header role="banner">
    <div class="top-bar">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-4 social">
            <a href="https://t.me/fictonews"><span class="fa fa-telegram"></span></a>
            <a href="https://t.me/fictonews">Telegram Channel</a>
            </div>

          {{-- <div class="col-4 search-top">
            <!-- <a href="#"><span class="fa fa-search"></span></a> -->
            <form action="#" class="search-top-form">
              <span class="icon fa fa-search"></span>
              <input type="text" id="s" placeholder="Type keyword to search...">
            </form>
          </div> --}}
          <div class="col-4 locale">
            @foreach (config('app.available_locales') as $locale)
                @php
                    $currentRouteName = Route::currentRouteName();
                    $currentParameters = Route::current()?->parameters() ?? [];
                @endphp

                <a href="{{ $currentRouteName ? route($currentRouteName, array_merge($currentParameters, ['locale' => $locale])) : '#' }}"
                    class="@if (app()->getLocale() == $locale) border-indigo-400 @endif text-light">
                    {{ strtoupper($locale) }}
                </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="container logo-wrap">
      <div class="row pt-5">
        <div class="col-12 text-center">
          <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
          <h1 class="site-logo"><a href="{{ route('home', ['locale' => app()->getLocale()]) }}"> FictoNews </a></h1>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-md  navbar-light bg-light">
      <div class="container">


        <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs(route('home', ['locale' => app()->getLocale()])) ? 'active' : '' }}" href="{{ route('home', ['locale' => app()->getLocale()]) }}">{{ __('app.home') }}</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ route('home', ['locale' => app()->getLocale()]) }}" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('app.categories') }}</a>
              <div class="dropdown-menu" aria-labelledby="dropdown05">
                @foreach ($categories as $category)
                <a class="dropdown-item" href="{{ route('category', ['locale' => app()->getLocale(), 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                @endforeach
              </div>

            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs(route('about', ['locale' => app()->getLocale()])) ? 'active' : '' }}" href="{{ route('about', ['locale' => app()->getLocale()]) }}">{{ __('app.about') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs(route('contact', ['locale' => app()->getLocale()])) ? 'active' : '' }}" href="{{ route('contact', ['locale' => app()->getLocale()]) }}">{{ __('app.contact') }}</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </header>
  <!-- END header -->
