@extends('layouts.app')

@section('title', $category->name)
@section('seo_description', $category->seo_description)
@section('seo_keywords', implode(', ', $category->seo_keywords))
@section('image', asset('assets/images/img_1.png'))

@section('content')
<section class="site-section pt-5">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-6">
          <h2 class="mb-4">{{ __('app.category') }}: {{ $category->name }}</h2>
        </div>
      </div>
      <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">
          <div class="row mb-5 mt-5">

            <div class="col-md-12">

                @foreach ($posts as $post)
                    <x-post-entry-horzontal :post="$post" :category="$category" />
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
