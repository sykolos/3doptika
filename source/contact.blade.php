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
        {{-- <div class="mapBox__placeholder">
          <div class="mapBox__pin" aria-hidden="true"></div>
          <div class="mapBox__text">
            Google térkép hamarosan
          </div>
        </div> --}}

        <iframe
         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.9022584803333!2d19.13003587682589!3d47.77978437600183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47402a6008edf783%3A0x33f391e7aec97938!2s3D%20Optika!5e1!3m2!1sen!2shu!4v1767029131430!5m2!1sen!2shu" 
         style="border:0;" allowfullscreen=""
         loading="lazy"
         referrerpolicy="no-referrer-when-downgrade"></iframe>
        
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
