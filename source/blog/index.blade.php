---
pagination:
  collection: posts
  perPage: 6
---

@extends('_layouts.main')

@section('content')

<section class="pageHead">
  <div class="container">
    <h1 class="page-title">Blog</h1>
  </div>
</section>

<section class="cards">
  <div class="container">

    @forelse ($pagination->items as $post)
      <article class="infoCard infoCard--blog">

      @if ($post->featured_image)
        <div class="infoCard__thumb">
          <img src="{{ $post->featured_image }}" alt="{{ strip_tags($post->title) }}">
        </div>
      @endif

      <h2 class="infoCard__title">
        <a href="/blog/{{ $post->slug }}/">
          {!! $post->title !!}
        </a>
      </h2>

      <span class="infoCard__date">
        {{ \Carbon\Carbon::parse($post->date)->format('Y. m. d.') }}
      </span>

      <div class="infoCard__text">
        {!! $post->excerpt !!}
      </div>

      <a class="infoCard__more" href="/blog/{{ $post->slug }}/">
        Olvasok tovább →
      </a>

    </article>

    @empty
      <div class="empty-state">
        <h2>Még nincs bejegyzés</h2>
        <p>Hamarosan friss tartalommal jelentkezünk.</p>
      </div>
    @endforelse

    {{-- Pagination navigation --}}
    <div class="pagination">
      @if ($pagination->previous)
        <a href="{{ $pagination->previous }}">← Előző oldal</a>
      @endif

      @if ($pagination->next)
        <a href="{{ $pagination->next }}">Következő oldal →</a>
      @endif
    </div>

  </div>
</section>

@endsection
