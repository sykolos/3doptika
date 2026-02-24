@extends('_layouts.main')

@section('title', 'Kapcsolat')

@section('content')

<section class="contactPage">
  <div class="container">
    <h1 class="page-title">Kapcsolat</h1>

    <div class="contactTop">
      <div class="contactInfo" aria-label="Kapcsolati adatok">
  <div class="contactInfo__row">
    <span class="contactInfo__icon" aria-hidden="true">
      <img src="/assets/images/icons/map.svg" alt="">
    </span>
    <div class="contactInfo__text">
      2600 Vác,<br>
      Dr. Csányi László körút 42.
    </div>
  </div>

  <div class="contactInfo__row">
    <span class="contactInfo__icon" aria-hidden="true">
      <img src="/assets/images/icons/email.svg" alt="">
    </span>
    <div class="contactInfo__text">
      <a class="contactInfo__link" href="mailto:info@3doptika.hu">
        info@3doptika.hu
      </a>
    </div>
  </div>
  <div class="contactInfo__row">
    <span class="contactInfo__icon" aria-hidden="true">
      <img src="/assets/images/icons/phone.svg" alt="">
    </span>
    <div class="contactInfo__text">
      <a class="contactInfo__link" href="tel:+36304285041">
        +36 30 428 50 41
      </a>
    </div>
  </div>
</div>

      <div class="mapBox" aria-label="Térkép">
        

        <iframe
         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.9022584803333!2d19.13003587682589!3d47.77978437600183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47402a6008edf783%3A0x33f391e7aec97938!2s3D%20Optika!5e1!3m2!1sen!2shu!4v1767029131430!5m2!1sen!2shu" 
         style="border:0;" allowfullscreen=""
         loading="lazy"
         referrerpolicy="no-referrer-when-downgrade"></iframe>
        
      </div>
    </div>
  </div>
</section>


<section class="contactHero" style="--contact-bg:url('{{ $page->baseUrl }}/assets/images/3doptika_front.jpg');">
  <div class="container contactHero__inner">
    <div class="hoursCard" aria-label="Nyitvatartás">
      <h2 class="h2">Nyitvatartás</h2>

      <div class="hoursGrid">
        <div class="hoursRow"><span>hétfő:</span>zárva</div>
        <div class="hoursRow"><span>kedd:</span>9:00–17:30</div>
        <div class="hoursRow"><span>szerda:</span>9:00–17:30</div>
        <div class="hoursRow"><span>csütörtök:</span>9:00–17:30</div>
        <div class="hoursRow"><span>péntek:</span>9:00–17:30</div>
        <div class="hoursRow"><span>szombat:</span>8:00–12:00</div>
        <div class="hoursRow"><span>vasárnap:</span>zárva</div>
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
      <li>(MBH) Gondoskodás</li>
      <li>Patika / Új Pillér</li>
      <li class="cardPay__note">Az összes többi egészségpénztárnak számlát állítunk ki!</li>
    </ul>
  </div>
</section>

<section class="docs_links">
  <div class="container">
    <h2 class="docs_links__title">Hasznos dokumentumok</h2>

    <ul class="docs_links__list">
      <li>
        <a href="/assets/pdf/Impresszum_3DOptika.pdf" type="application/pdf" target="_blank">
          Impresszum
        </a>
      </li>
      <li>
        <a href="/assets/pdf/Adatkezelesi_tajekoztato_3DOptika.pdf" type="application/pdf" target="_blank">
          Adatkezelési tájékoztató
        </a>
      </li>
    </ul>
  </div>
</section>

@endsection

@section('script_tags')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Kapcsolat – 3D Optika",
  "url": "https://3doptika.hu/kapcsolat"
}
</script>
@endsection
