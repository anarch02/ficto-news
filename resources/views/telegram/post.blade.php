{{ $post->title }}
{{ $post->seo_description }}

{{ route('post', ['locale' => 'ru', 'slug' => $post->slug]) }}
