@extends('_layouts.main')

@section('title', 'Szolgáltatásaink')

@section('content')
<section class="pageHead">
  <div class="container">
    <h1 class="page-title">Szolgáltatásaink</h1>
  </div>
</section>

{{-- <section class="cards">
  <div class="container">

    <article class="infoCard">
      <h2 class="infoCard__title">Optometrista látásvizsgálat – Polatest</h2>
      <p class="infoCard__text">
        Az országban csak pár helyen elérhető ez a csúcstechnológiás látásvizsgálat, amely a LÁTÁST ÉLMÉNNYÉ VARÁZSOLJA!
        A Polatest egy speciális vizsgálati módszer, ahol az optimális dioptrián kívül felmérjük a két szem együttműködését, a szemmozgató izmok egyensúlyát.
      </p>
      <p class="infoCard__text">
        Ezen aszimmetrikus működésből adódhat vegetatív idegrendszeri fáradás, és a látó emberek esetében is.
        Olyan látásvizsgálatban lesz része, ami felülmúlja a hagyományos látásvizsgálatot.
      </p>
    </article>

    <article class="infoCard">
      <h2 class="infoCard__title">Zeiss™ iProfiler Plus – Szemének vizuális lenyomata</h2>
      <p class="infoCard__text">
        A Zeiss csúcstechnológiás mérőrendszerével részletes, személyre szabott „vizuális profilt” készítünk a szemről, amelyet lencsetervezéskor használunk.
      </p>
    </article>

    <article class="infoCard">
      <h2 class="infoCard__title">Kontaktlencse-vizsgálat és illesztés</h2>
      <p class="infoCard__text">
        Segítünk kiválasztani szemének és életmódjának leginkább megfelelő kontaktlencse típust, megtanítjuk helyes használatát.
      </p>
    </article>

    <article class="infoCard">
      <h2 class="infoCard__title">Glaukóma (zöldhályog) szűrés</h2>
      <p class="infoCard__text">
        Érintésmentes szemnyomásmérés. A zöldhályog korai felismerése kulcsfontosságú a látás megőrzése érdekében.
        Korszerű, non-kontakt szemnyomásmérő készülékkel gyorsan és fájdalommentesen szűrjük a kockázatot.
      </p>
    </article>

    <article class="infoCard">
      <h2 class="infoCard__title">Fundusfotó – Szemfenékvizsgálat</h2>
      <p class="infoCard__text">
        A szemfenék állapota fontos információkat árul el a szem egészségéről. Digitális fényképezéssel korai stádiumban észlelhetők az olyan elváltozások,
        mint a cukorbetegség vagy magas vérnyomáshoz kapcsolódó problémák.
      </p>
    </article>

    <article class="infoCard">
      <h2 class="infoCard__title">Zeiss Visufit 1000 – 3D technológia a tökéletes lencsékhez</h2>
      <p class="infoCard__text">
        A Zeiss Visufit 1000 egy forradalmi 3D-s mérőrendszer, amely 45 000 mérési pont alapján határozza meg a szemüveglencse egyedi paramétereit.
        Ez a technológia biztosítja, hogy a szemüveglencse nemcsak éles, hanem ergonomikus, komfortos is legyen.
      </p>
    </article>

    <article class="infoCard">
      <h2 class="infoCard__title">Gyengénlátók segítése – Speciális nagyítók és eszközök</h2>
      <p class="infoCard__text">
        Azok számára, akiknél a hagyományos korrekció nem elegendő, különféle optikai segédeszközöket kínálunk, mint például nagyítók és speciális szemüvegek,
        amelyek segítik a mindennapi életet.
      </p>
    </article>

  </div>
</section> --}}
<section class="cards">
  <div class="container">

    @foreach ($page->services as $service)
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
