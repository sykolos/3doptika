@extends('_layouts.main')

@section('title', 'Fóoldal')

@section('content')

  {{-- HERO --}}
  <section class="hero">

  <div class="hero__bg">
  <video
  class="heroVideo"
  autoplay
  muted
  loop
  playsinline
  preload="metadata"
  poster="/assets/images/3doptika_front.jpg"
>
  <source src="/assets/vid/hero-final.mp4" type="video/mp4">
</video>

</div>


  <div class="hero__overlay"></div>

  <div class="container hero__inner">
    <div class="hero__card">
      <h1>Ahol a látás<br>élménnyé válik</h1>

      <a class="btn btn--outline" href="#bemutatkozas">
        tovább
        <span class="btn__icon" aria-hidden="true">
          <img src="{{ $page->baseUrl }}/assets/images/icons/down_arrow.svg"
              alt=""
              width="16"
              height="16">
        </span>
      </a>
    </div>
  </div>

</section>



  {{-- BEMUTATKOZÁS --}}
  <section class="about" id="bemutatkozas">
    <div class="container about__grid">
      
      <div class="about__media">
        <img src="{{ $page->baseUrl }}/assets/images/index/home-portrait-min.jpg" alt="3D Optika csapat">
      </div>

      <div class="about__text">
        <h2 class="h2">Bemutatkozás</h2>
        <p>
          Böröcz Mari vagyok, több mint 40 éve dolgozom a szakmában optikus-látszerészként, és 1993 óta optometristaként is segítem pácienseimet. 2013-ban alapítottuk meg a 3D Optikát fiammal, Böröcz Attilával, aki a Semmelweis Egyetemen szerzett diplomát optometrista szakon.
        </p>
        <p>
          Egy kis, 40 négyzetméteres üzletből indultunk, ma pedig már egy modern, belvárosi optikai szalonban várjuk Önöket felkészült, tapasztalt csapatunkkal.
        </p>
        <p>   
          Legyen szó látásvizsgálatról, szemüvegkészítésről vagy kontaktlencse-illesztésről, nálunk biztos kezekben van látása.
        </p>
        <p>
          Látogasson el hozzánk személyesen, és tapasztalja meg, milyen az, amikor a szakértelem és az emberi törődés találkozik!
        </p>
      </div>
    </div>
  </section>


  {{-- MIÉRT VÁLASSZA --}}
  <section class="reasons">
    <div class="container">
      <h2 class="h2">Miért válassza a 3D Optikát?</h2>
      </div>
    <div class="container reasons__grid">
      <div class="reasons__left">
        

        <ul class="checklist">
          <li>
            <span class="checklist__icon" aria-hidden="true"></span>
            <div>
              <strong>Precíz látásvizsgálat</strong><br>
              Legmodernebb eszközökkel, pontos mérés és korrekció.
            </div>
          </li>
          <li>
            <span class="checklist__icon" aria-hidden="true"></span>
            <div>
              <strong>Szakértői konzultáció</strong><br>
              Magasan képzett optometristáink segítenek dönteni.
            </div>
          </li>
          <li>
            <span class="checklist__icon" aria-hidden="true"></span>
            <div>
              <strong>Személyre szabott megoldások</strong><br>
              Életmódhoz és stílushoz illeszkedő optikai ajánlások.
            </div>
          </li>
          <li>
            <span class="checklist__icon" aria-hidden="true"></span>
            <div>
              <strong>Családias hangulat</strong><br>
              Barátságos, otthonos környezetben várjuk Önt.
            </div>
          </li>
          <li>
            <span class="checklist__icon" aria-hidden="true"></span>
            <div>
              <strong>Szemüveg igazítás és tanácsok</strong><br>
              Megtanítjuk a helyes viselést, ápolást, törlést.
            </div>
          </li>
          <li>
            <span class="checklist__icon" aria-hidden="true"></span>
            <div>
              <strong>Szemüvegkészítés helyben</strong><br>
              Saját műhelyünkben készítjük el szemüvegét.
            </div>
          </li>
          <li>
            <span class="checklist__icon" aria-hidden="true"></span>
            <div>
              <strong>Kisszerviz a helyszínen</strong><br>
              Elhasználódott otthoni szemüvegkeret csere.
            </div>
          </li>
          <li>
            <span class="checklist__icon" aria-hidden="true"></span>
            <div>
              <strong>Egyedi kollekció</strong><br>
              Szemüvegkereteinket gondosan, egyesével válogatjuk.
            </div>
          </li>
        </ul>

        <a class="btn btn--primary" href="#visszahivas">
          visszahívást kérek
            <img src="/assets/images/icons/phone-outline.svg" alt="">
        </a>
      </div>

      {{-- <div class="reasons__right" style="--reasons-bg:url('{{ $page->baseUrl }}/assets/images/index/shop-interrieur-min.jpg');"> --}}
      </div>
    </div>
  </section>


  {{-- SZOLGÁLTATÁSAINK --}}
  <section class="services" id="szolgaltatasok">
    <div class="container">
      <h2 class="h2">Szolgáltatásaink</h2>

      <div class="service-list">
        @foreach ($page->services as $service)
          <a
            class="service-item"
            href="/services/#{{ $service['slug'] ?? '' }}"
          >
            <span class="service-item__text">
              {{ $service['title'] }}
            </span>

            <span class="service-item__go" aria-hidden="true">
              <svg width="30" height="30" viewBox="0 0 24 24" fill="none">
                <path d="M9 18l6-6-6-6"
                      stroke="#043E6C"
                      stroke-width="1"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>
              </svg>
            </span>
          </a>
        @endforeach
      </div>
    </div>
  </section>
  


  {{-- RÓLUNK MONDTÁK --}}

 <section class="testimonials">
  <div class="container">
    <h2 class="h2 testimonials__title">Rólunk mondták</h2>


    <div class="testimonial-card">

      <button class="t-nav t-nav__left" type="button" aria-label="Előző">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none">
          <path d="M15 18l-6-6 6-6"
                stroke="#043E6C"
                stroke-width="1"
                stroke-linecap="round"
                stroke-linejoin="round"/>
        </svg>
      </button>

      {{-- SLIDES --}}
      @foreach ($page->testimonials as $index => $item)
      <div
        class="testimonial-card__content{{ $index === 0 ? ' is-active' : '' }}"
        data-slide="{{ $index }}">
        <div class="testimonial-card__text">
          {!! $item['text'] !!}
        </div>

        @if (!empty($item['author']))
          <div class="testimonial-card__name">
            {{ $item['author'] }}
          </div>
        @endif
      </div>
    @endforeach

    {{-- DOTS--}}
    <div class="dots" aria-label="Lapozás">
      @foreach ($page->testimonials as $index => $_)
        <span
          class="dot{{ $index === 0 ? ' dot--active' : '' }}"
          data-dot="{{ $index }}"
        ></span>
      @endforeach
    </div>

      <button class="t-nav t-nav__right" type="button" aria-label="Következő">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none">
          <path d="M9 18l6-6-6-6"
                stroke="#043E6C"
                stroke-width="1"
                stroke-linecap="round"
                stroke-linejoin="round"/>
        </svg>
      </button>

    </div>
  </div>
</section>




@endsection

@section('script_tags')
<script type="application/ld+json">
@php
echo json_encode([
  "@context" => "https://schema.org",
  "@type" => "OpticalStore",
  "name" => "3D Optika",
  "url" => "https://3doptika.hu",
  "telephone" => "+36304285041",
  "address" => [
      "@type" => "PostalAddress",
      "streetAddress" => "Dr. Csányi László krt. 42.",
      "addressLocality" => "Vác",
      "postalCode" => "2600",
      "addressCountry" => "HU"
  ],
  "openingHours" => "Mo-Fr 09:00-17:30",
  "sameAs" => [
      "https://maps.app.goo.gl/fCmHAjTPPhfJQ98j6"
  ],
  "hasOfferCatalog" => [
      "@type" => "OfferCatalog",
      "name" => "Szolgáltatások",
      "itemListElement" => array_map(function($service) {
          return [
              "@type" => "Offer",
              "itemOffered" => [
                  "@type" => "Service",
                  "name" => strip_tags($service->title ?? ''),
                  "description" => strip_tags($service->content ?? ''),
              ]
          ];
      }, (array) $page->services)
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp
</script>
@endsection


