@extends('_layouts.main')

@section('title', 'Szolgáltatásaink')

@section('content')
<section class="pageHead">
  <div class="container">
    <h1 class="page-title">Szolgáltatásaink</h1>
  </div>
</section>

<section class="cards">
  <div class="container">

    @foreach ($services as $service)
      <article class="infoCard">
        <h2 class="infoCard__title">
          {!! $service['title'] !!}
        </h2>

        <div class="infoCard__text">
          {!! $service['content'] !!}
        </div>
      </article>
    @endforeach

  </div>
</section>


<section class="brands">
  <div class="container">
    <h2 class="h2 brand-title">Forgalmazott márkáink</h2>

    <div class="brandGrid">
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/zeiss.svg" alt="ZEISS logó">
      </div>
      <div class="brandGrid__item">
       <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/cooper.svg" alt="CooperVision logó">
      </div>
      <div class="brandGrid__item"> 
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/rudy.svg" alt="Rudy Project logó">
      </div>
      <div class="brandGrid__item">
       <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/silhouette.svg" alt="Silhouette logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/jaguar.svg" alt="Jaguar Eyewear logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/titanflex.svg" alt="Titanflex logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/oakley.svg" alt="Oakley logó">      
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/rayban.svg" alt="Ray-Ban logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/carrera.svg" alt="Carrera logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/hugo.svg" alt="HUGO logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/boss.svg" alt="BOSS logó">
      </div>
      <div class="brandGrid__item">
       <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/tommy.svg" alt="Tommy Hilfiger logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/centro.svg" alt="Centrostyle logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/missoni.svg" alt="Missoni logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/moschino.svg" alt="Moschino logó">
      </div>
      <div class="brandGrid__item">
        <img class=" " src="{{ $page->baseUrl }}/assets/images/brands/ch.svg" alt="Carolina Herrera logó">
      </div>
    </div>
  </div>
</section>
@endsection
