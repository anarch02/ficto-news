@extends('layouts.app')

@section('title', __('seo.title.contact'))
@section('seo_description', __('seo.description.contact'))
@section('seo_keywords', __('seo.keywords.contact'))
@section('image', asset('assets/images/img_1.png'))

@section('content')
<section class="site-section">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-6">
          <h1>{{ __('contact.title') }}</h1>
          @if (session('message'))
            <div class="alert alert-success">
                {{ __('contact.messages.'.session('message')) }}
            </div>
          @endif
        </div>
      </div>
      <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">

        <form action="{{ route('contact.message') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="name">{{ __('contact.name') }}</label>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" id="name" name="name" class="form-control @error('name')
                        alert-danger
                    @enderror" value="{{ old('name') }}">
                </div>

                <div class="col-md-12 form-group">
                    <label for="phone">{{ __('contact.phone') }}</label>
                    @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" id="phone" name="phone" class="form-control @error('phone')
                        alert-danger
                    @enderror" value="{{ old('phone') }}">
                </div>
                <div class="col-md-12 form-group">
                    <label for="email">{{ __('contact.email') }}</label>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="email" id="email" name="email" class="form-control @error('phone')
                            alert-danger
                    @enderror" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                <label for="message">{{ __('contact.message') }}</label>
                @error('message')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea name="message" id="message" class="form-control @error('message')
                            alert-danger
                    @enderror" cols="30" rows="8">{{ old('message') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                <input type="submit" value="{{ __('contact.send_message') }}" class="btn btn-primary">
                </div>
            </div>
        </form>


        </div>

        <!-- END main-content -->

        <x-sidebar />

      </div>
    </div>
  </section>
@endsection
