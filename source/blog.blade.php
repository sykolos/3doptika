@extends('_layouts.main')

@section('content')
<h1>Blog</h1>

<div class="blog-list">

  @foreach ($page->posts as $post)

  <article>
    <h2>{!! $post['title'] !!}</h2>

    @if (!empty($post['featured_image']))
      <img src="{{ $post['featured_image'] }}" alt="">
    @endif

    {!! $post['content'] !!}
  </article>
@endforeach


</div>
@endsection
