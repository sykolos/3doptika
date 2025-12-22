@extends('_layouts.main')

@section('title', 'Kapcsolat')

@section('content')

<section class="contactPage">
  <div class="container">
    <h1 class="contactPage__title">Kapcsolat</h1>

    <div class="contactTop">
      <div class="contactInfo" aria-label="Kapcsolati adatok">
        <div class="contactInfo__row">
          <span class="contactInfo__icon" aria-hidden="true">📍</span>
          <div class="contactInfo__text">
            2600 Vác,<br>
            Dr. Csányi László körút 42.
          </div>
        </div>

        <div class="contactInfo__row">
          <span class="contactInfo__icon" aria-hidden="true">✉️</span>
          <div class="contactInfo__text">
            <a class="contactInfo__link" href="mailto:info@3doptika.hu">info@3doptika.hu</a>
          </div>
        </div>

        <div class="contactInfo__row">
          <span class="contactInfo__icon" aria-hidden="true">📞</span>
          <div class="contactInfo__text">
            <a class="contactInfo__link" href="tel:+36304285041">+36 30 428 50 41</a>
          </div>
        </div>
      </div>

      {{-- MAP PLACEHOLDER – később csere Google Maps iframe-re --}}
      <div class="mapBox" aria-label="Térkép">
        <div class="mapBox__placeholder">
          <div class="mapBox__pin" aria-hidden="true"></div>
          <div class="mapBox__text">
            Google térkép hamarosan
          </div>
        </div>

        {{-- Később:
        <iframe class="mapBox__iframe"
          src="GOOGLE_MAPS_IFRAME_URL"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
        --}}
      </div>
    </div>
  </div>
</section>


<section class="contactHero" style="--contact-bg:url('{{ $page->baseUrl }}/assets/images/contact/hero.jpg');">
  <div class="container contactHero__inner">
    <div class="hoursCard" aria-label="Nyitvatartás">
      <h2 class="hoursCard__title">Nyitvatartás</h2>

      <div class="hoursGrid">
        <div class="hoursRow"><span>hétfő:</span><strong>zárva</strong></div>
        <div class="hoursRow"><span>kedd:</span><strong>9:00–17:30</strong></div>
        <div class="hoursRow"><span>szerda:</span><strong>9:00–17:30</strong></div>
        <div class="hoursRow"><span>csütörtök:</span><strong>9:00–17:30</strong></div>
        <div class="hoursRow"><span>péntek:</span><strong>9:00–17:30</strong></div>
        <div class="hoursRow"><span>szombat:</span><strong>8–12</strong></div>
        <div class="hoursRow"><span>vasárnap:</span><strong>zárva</strong></div>
      </div>
    </div>
  </div>
</section>


<section class="cardPay">
  <div class="container">
    <h2 class="cardPay__title">Kártyás fizetési lehetőség!</h2>

    <p class="cardPay__lead">Egészségpénztári kártyás elfogadóhely:</p>
    <ul class="cardPay__list">
      <li>OTP</li>
      <li>Prémium</li>
      <li>MBH</li>
      <li>Patika / Új Pillér</li>
    </ul>

    <p class="cardPay__note">Az összes többi egészségpénztárnak számlát állítunk ki!</p>
  </div>
</section>

@endsection
