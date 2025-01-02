<section class="site-section pt-5 pb-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="owl-carousel owl-theme home-slider">
            @foreach ($posts as $post)
            <div>
                <a href="{{ route('post', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ $post->image }}'); ">
                    <div class="text half-to-full">
                        @foreach ($post->categories as $category)
                            <span class="category mb-5">{{ $category->name }}</span>
                        @endforeach
                    <div class="post-meta">

                        <span class="author mr-2"><img src="{{ asset('assets/images/person_1.jpg') }}" alt="Ai"> Ai</span>&bullet;
                        <span class="mr-2">{{ date_format($post->created_at, 'D, d M Y') }}</span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> {{ $post->comments->count() }}</span>

                    </div>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($post->content, 100, '...') }}</p>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        </div>
    </div>

</div>
</section>
