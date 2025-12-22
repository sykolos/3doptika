@extends('_layouts.main')

@section('title', 'Szolgáltatásaink')

@section('content')
<section class="pageHead">
  <div class="container">
    <h1 class="pageHead__title">Szolgáltatásaink</h1>
  </div>
</section>

<section class="cards">
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
</section>

<section class="brands">
  <div class="container">
    <h2 class="brands__title">Forgalmazott márkáink</h2>

    <div class="brandGrid">
      {{-- Tipp: tedd a logókat ide: source/assets/images/brands/ --}}
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/zeiss.png" alt="ZEISS logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/coopervision.png" alt="CooperVision logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/rudy-project.png" alt="Rudy Project logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/silhouette.png" alt="Silhouette logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/jaguar.png" alt="Jaguar Eyewear logó">

      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/titanflex.png" alt="Titanflex logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/oakley.png" alt="Oakley logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/ray-ban.png" alt="Ray-Ban logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/carrera.png" alt="Carrera logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/hugo.png" alt="HUGO logó">

      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/boss.png" alt="BOSS logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/tommy-hilfiger.png" alt="Tommy Hilfiger logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/centrostyle.png" alt="Centrostyle logó">

      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/missoni.png" alt="Missoni logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/moschino.png" alt="Moschino logó">
      <img class="brandGrid__img" src="{{ $page->baseUrl }}/assets/images/brands/carolina-herrera.png" alt="Carolina Herrera logó">
    </div>
  </div>
</section>
@endsection
