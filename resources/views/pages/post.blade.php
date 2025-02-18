@extends('layouts.app')

@section('title', $post->title)
{{-- @section('seo_description', $post->seo_description) --}}
{{-- @section('seo_keywords', implode(', ', $post->seo_keywords)) --}}
@section('image', $post->image)

@section('content')
<section class="site-section py-lg">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">
          {{-- <img src="{{ $post->image }}" alt="Image" class="img-fluid mb-5"> --}}
           <div class="post-meta">
                      <span class="author mr-2"><img src="{{ asset('assets/images/person_1.jpg') }}" alt="Rakhmatjnov Ai" class="mr-2"> Rakhmatjnov Ai</span>&bullet;
                      <span class="mr-2">{{ date_format($post->created_at, 'D, d M Y') }} </span> &bullet;
                      <span class="ml-2"><span class="fa fa-comments"></span> {{ $post->comments->count() }}</span>
                    </div>
          @foreach ($post->categories as $category)
          <a class="category mb-5" href="{{ route('category', ['locale' => app()->getLocale(), 'slug' => $category->slug]) }}">{{ $category->name }}</a>
          @endforeach

          <div class="post-content-body">
            {!! $post->content !!}
          </div>


          <div class="pt-5">
            <p>{{ __('app.categories') }}:  {!! $post->categories->map(fn($category) => '<a href="' . route('category', ['locale' => app()->getLocale(), 'slug' => $category->slug]) . '">' . e($category->name) . '</a>')->implode(', ') !!}
          </div>


          <div class="pt-5">
            <h3 class="mb-5">{{ $post->comments->count() }} {{ __('app.comments') }}</h3>

            <ul class="comment-list">
              @foreach ($post->comments as $comment)
              <li class="comment">
                <div class="vcard">
                  <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>{{ $comment->name }}</h3>
                  <div class="meta">{{ date_format($comment->created_at, 'D, d M Y') }}</div>
                  <p>{{ $comment->text }}</p>
                </div>
              </li>
              @endforeach
            </ul>

            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">{{ __('app.leave_a_comment') }}</h3>
              <form action="{{ route('post.comment', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" method="POST" class="p-5 bg-light">
                @csrf
                <div class="form-group">
                  <label for="name">{{ __('comment.name') }} *</label>
                  @error('name')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input type="text" class="form-control @error('name') alert-danger @enderror" name="name" id="name">
                </div>
                <div class="form-group">
                  <label for="email">{{ __('comment.email') }} *</label>
                  @error('email')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input type="email" class="form-control @error('email') alert-danger @enderror" id="email" name="email">
                </div>

                <div class="form-group">
                  <label for="message">{{ __('comment.leave_comment') }}</label>
                  @error('text')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <textarea name="text" id="message" cols="30" rows="10" class="form-control @error('text') alert-danger @enderror"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary">
                </div>

              </form>
            </div>
          </div>

        </div>

        <x-sidebar />

      </div>
    </div>
  </section>

@endsection
