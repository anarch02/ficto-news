@extends('layouts.app')

@section('title', __('seo.title.home'))
@section('seo_description', __('seo.description.home'))
@section('seo_keywords', __('seo.keywords.home'))
@section('image', asset('assets/images/img_1.png'))

@section('content')
<section class="site-section pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="owl-carousel owl-theme home-slider">
            <div>
              <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset('assets/images/img_1.png') }}'); ">
                <div class="text half-to-full">
                  <span class="category mb-5">Food</span>
                  <div class="post-meta">

                    <span class="author mr-2"><img src="{{ asset('assets/images/person_1.jpg') }}" alt="Colorlib"> Colorlib</span>&bullet;
                    <span class="mr-2">March 15, 2018 </span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                  </div>
                  <h3>How to Find the Video Games of Your Youth</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                </div>
              </a>
            </div>
            <div>
              <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset('assets/images/img_2.jpg') }}'); ">
                <div class="text half-to-full">
                  <span class="category mb-5">Travel</span>
                  <div class="post-meta">

                    <span class="author mr-2"><img src="{{ asset('assets/images/person_1.jpg') }}" alt="Colorlib"> Colorlib</span>&bullet;
                    <span class="mr-2">March 15, 2018 </span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                  </div>
                  <h3>How to Find the Video Games of Your Youth</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                </div>
              </a>
            </div>
            <div>
              <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset('assets/images/img_3.jpg') }}'); ">
                <div class="text half-to-full">
                  <span class="category mb-5">Sports</span>
                  <div class="post-meta">

                    <span class="author mr-2"><img src="{{ asset('assets/images/person_1.jpg') }}" alt="Colorlib"> Colorlib</span>&bullet;
                    <span class="mr-2">March 15, 2018 </span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                  </div>
                  <h3>How to Find the Video Games of Your Youth</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>

    </div>


  </section>
  <!-- END section -->

  <section class="site-section py-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="mb-4">{{ __('app.latest_posts') }}</h2>
        </div>
      </div>
      <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">
          <div class="row">
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
          </div>

          {{ $posts->links('pagination::bootstrap-4') }}





        </div>

        <!-- END main-content -->

        <x-sidebar />

      </div>
    </div>
  </section>
@endsection
