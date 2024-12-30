@extends('layouts.app')

@section('title', __('seo.title.about'))
@section('seo_description', __('seo.description.about'))
@section('seo_keywords', __('seo.keywords.about'))
@section('image', asset('assets/images/img_6.png'))

@section('content')
<section class="site-section pt-5">
    <div class="container">

      <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">

          <div class="row">
            <div class="col-md-12">
              <h2 class="mb-4">{{ __('about.title') }}</h2>
              <p class="mb-5"><img src="{{ asset('assets/images/img_6.png') }}" alt="Image placeholder" class="img-fluid"></p>
              {!! __('about.content') !!}
            </div>
          </div>

          <div class="row mb-5 mt-5">
            <div class="col-md-12 mb-5">
              <h2>{{ __('app.latest_posts') }}</h2>
            </div>
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <x-post-entry-horzontal :post="$post" />

                @endforeach
            </div>
          </div>

          {{ $posts->links('pagination::bootstrap-4') }}

        </div>

        <!-- END main-content -->

        <x-sidebar />

      </div>
    </div>
  </section>
@endsection
