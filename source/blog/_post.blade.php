@extends('_layouts.main')

@section('meta')
  <title>{{ $page->meta_title ?? strip_tags($page->title) }}</title>
  <meta name="description" content="{{ $page->meta_description ?? strip_tags($page->excerpt) }}">

  <link rel="canonical" href="{{ $page->url }}">

  {{-- OpenGraph --}}
  <meta property="og:type" content="article">
  <meta property="og:title" content="{{ strip_tags($page->title) }}">
  <meta property="og:description" content="{{ strip_tags($page->excerpt) }}">
  <meta property="og:url" content="{{ $page->url }}">
  @if ($page->featured_image)
    <meta property="og:image" content="{{ $page->featured_image }}">
  @endif

  {{-- Twitter --}}
  <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
<article class="blog-post">

  <h1>{!! $page->title !!}</h1>

  <div class="post-meta">
    <span class="date">{{ $page->date }}</span>
    <span class="author">{{ $page->author }}</span>
  </div>

  @if (!empty($page->tags))
    <ul class="blog-tags">
      @foreach ($page->tags as $tag)
        <li>{{ $tag }}</li>
      @endforeach
    </ul>
  @endif

  @if ($page->featured_image)
    <img src="{{ $page->featured_image }}" alt="{{ strip_tags($page->title) }}">
  @endif

  <div class="post-content">
    {!! $page->content !!}
  </div>

</article>
@endsection
