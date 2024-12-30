<footer class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4">
          <h3>{{ __('app.about') }}</h3>
          <p class="mb-4">
            <img src="{{ asset('assets/images/img_1.png') }}" alt="Image placeholder" class="img-fluid">
          </p>

          <p>Welcome to <strong>FictoNews</strong> – a unique news portal where fictional stories come to life through the power of artificial intelligence. <a href="{{ route('about') }}">Read More</a></p>
        </div>
        <div class="col-md-6 ml-auto">
          <div class="row">
            <div class="col-md-7">
              <h3>{{ __('app.latest_posts') }}</h3>
              <div class="post-entry-sidebar">
                <ul>
                  @foreach ($posts as $post)
                  <li>
                    <a href="">
                      <img src="{{ $post->image }}" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>{{ $post->title }}</h4>
                        <div class="post-meta">
                          <span class="mr-2">{{ date_format($post->created_at, 'D, d M Y') }} </span> &bullet;
                          <span class="ml-2"><span class="fa fa-comments"></span> {{ $post->comments->count() }}</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-4">

              <div class="mb-5">
                <h3>{{ __('app.quick_links') }}</h3>
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                    <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
              </div>

              <div class="mb-5">
                <h3>{{ __('app.social') }}</h3>
                <ul class="list-unstyled footer-social">
                  <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                  <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                  <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                  <li><a href="#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                  <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                  <li><a href="#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="small">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy; <script data-cfasync="true" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- END footer -->
