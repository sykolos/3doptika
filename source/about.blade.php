@extends('_layouts.main')

@section('title', 'Rólunk')

@section('content')

<section class="aboutPage">
  <div class="container">
    <h1 class="page-title">Rólunk</h1>

    <div class="aboutIntro">
      <div class="aboutIntro__media">
        <img
          class="aboutIntro__img"
          src="{{ $page->baseUrl }}/assets/images/team/Mari-Ati-min.jpg"
          alt="A 3D Optika csapata az üzletben"
          loading="lazy"
        >
      </div>

      <div class="aboutIntro__text">
        <p>
          Böröcz Mari vagyok, több mint 40 éve dolgozom a szakmában optikus–látszerészként,
          1993-tól felsőfokú optometristaként segítem pácienseinket.
        </p>

        <p>
          2013-ban megalapítottuk a 3D Optikát fiammal, Böröcz Attilával, aki a Semmelweis Egyetemen
          szerzett diplomát optometrista szakon.
        </p>

        <p>
          Egy kis 40 m2-es üzletben kezdtünk nagy lelkesedéssel, amiből ma egy belvárosi optikai szalon lett,
          ahol felkészült, tapasztalt szakemberekkel várjuk kedves ügyfeleinket.
        </p>

        <p class="aboutIntro__highlight">
          Látogasson el hozzánk személyesen, és tapasztalja meg, milyen az, amikor a szakértelem
          és az emberi törődés találkozik!
        </p>
      </div>
    </div>
  </div>
</section>


<section class="team">
  <div class="container">
    <h2 class="h2">Csapatunk</h2>

    <div class="teamGrid">

      <article class="teamCard">
        <img
          class="teamCard__img"
          src="{{ $page->baseUrl }}/assets/images/team/Anya-min.jpg"
          alt="Mari – optometrista-látszerész"
          loading="lazy"
        >
        <div class="teamCard__name">Mari</div>
        <div class="teamCard__role">Optometrista-látszerész</div>
      </article>

      <article class="teamCard">
        <img
          class="teamCard__img"
          src="{{ $page->baseUrl }}/assets/images/team/Ati-min.jpg"
          alt="Attila – optometrista-kontaktológus"
          loading="lazy"
        >
        <div class="teamCard__name">Attila</div>
        <div class="teamCard__role">Optometrista-kontaktológus</div>
      </article>

      <article class="teamCard">
        <img
          class="teamCard__img"
          src="{{ $page->baseUrl }}/assets/images/team/Fanni-min.jpg"
          alt="Fanni – optikus"
          loading="lazy"
        >
        <div class="teamCard__name">Fanni</div>
        <div class="teamCard__role">Optikus</div>
      </article>

      <article class="teamCard">
        <img
          class="teamCard__img"
          src="{{ $page->baseUrl }}/assets/images/team/Bobe-min.jpg"
          alt="Böbe – optikus"
          loading="lazy"
        >
        <div class="teamCard__name">Böbe</div>
        <div class="teamCard__role">Optikus</div>
      </article>

      <article class="teamCard">
        <img
          class="teamCard__img"
          src="{{ $page->baseUrl }}/assets/images/team/Agi-min.jpg"
          alt="Ági – optikus"
          loading="lazy"
        >
        <div class="teamCard__name">Ági</div>
        <div class="teamCard__role">Optikus</div>
      </article>

    </div>
  </div>
</section>

@endsection
