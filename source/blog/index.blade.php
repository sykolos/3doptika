@extends('_layouts.main')

@section('content')
<h1>Blog</h1>

<div class="blog-list">
@foreach ($posts as $post)
  <article class="blog-card">

    <a href="/blog/{{ $post->slug }}/">
      @if ($post->featured_image)
        <img src="{{ $post->featured_image }}" alt="{{ strip_tags($post->title) }}">
      @endif

      <h2>{!! $post->title !!}</h2>
    </a>

    @if (!empty($post->tags))
      <ul class="blog-tags">
        @foreach ($post->tags as $tag)
          <li>{{ $tag }}</li>
        @endforeach
      </ul>
    @endif

    <div class="blog-excerpt">
      {!! $post->excerpt !!}
    </div>

    <a class="read-more" href="/blog/{{ $post->slug }}/">

      Olvasok tovább →
    </a>

  </article>
@endforeach
</div>
@endsection
