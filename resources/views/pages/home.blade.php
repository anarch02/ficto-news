@extends('layouts.app')

@section('title', __('seo.title.home'))
@section('seo_description', __('seo.description.home'))
@section('seo_keywords', __('seo.keywords.home'))
@section('image', asset('assets/images/img_1.png'))

@section('content')
    <x-hero />

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

        <x-sidebar />

      </div>
    </div>
  </section>
@endsection
