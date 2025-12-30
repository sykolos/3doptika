@extends('_layouts.main')

@section('content')
<section class="faqPage">
  <div class="container">
  <h1 class="page-title">Gyakran ismételt kérdések</h1>

  <div class="faqList">
    @foreach($page->faq as $item)
  <details class="faqItem">
    <summary class="faqItem__q">
      <span>{{ $item['q'] }}</span>
      <span class="faqItem__icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M6 9l6 6 6-6"
                    stroke="#043E6C"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
            </span>
      </span>
    </summary>
    <div class="faqItem__a">{{ $item['a'] }}</div>
  </details>
@endforeach

  </div>
  </div>
</section>
@endsection
