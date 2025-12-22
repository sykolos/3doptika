@extends('_layouts.main')

@section('title', 'GYIK')

@section('content')

<section class="faqPage">
  <div class="container">
    <h1 class="faqPage__title">GYIK</h1>

    <div class="faqList">

      <details class="faqItem">
        <summary class="faqItem__q">
          Mennyi időt vesz igénybe egy látásvizsgálat?
          <span class="faqItem__icon" aria-hidden="true"></span>
        </summary>
        <div class="faqItem__a">
          Általában 20–40 perc, attól függően, hogy milyen vizsgálatot végzünk (dioptria, szemmozgás, polatest, kontaktlencse-illesztés).
          Ha új szemüveget választ, érdemes extra idővel számolni.
        </div>
      </details>

      <details class="faqItem">
        <summary class="faqItem__q">
          Kell időpontot foglalni?
          <span class="faqItem__icon" aria-hidden="true"></span>
        </summary>
        <div class="faqItem__a">
          Javasolt, mert így biztosan Önre tudunk koncentrálni és nincs várakozás. Időpontot telefonon vagy a visszahívás kérő űrlapon is tud kérni.
        </div>
      </details>

      <details class="faqItem">
        <summary class="faqItem__q">
          Mit hozzak magammal a vizsgálatra?
          <span class="faqItem__icon" aria-hidden="true"></span>
        </summary>
        <div class="faqItem__a">
          Ha van: a jelenlegi szemüvegét, korábbi receptet / leletet, kontaktlencséjét és annak adatait.
          Gyógyszerlistát is érdemes hozni, ha releváns.
        </div>
      </details>

      <details class="faqItem">
        <summary class="faqItem__q">
          Kontaktlencsét is lehet illeszteni?
          <span class="faqItem__icon" aria-hidden="true"></span>
        </summary>
        <div class="faqItem__a">
          Igen. Kontaktlencse-vizsgálatot és illesztést is végzünk, megtanítjuk a helyes használatot, ápolást, és segítünk a megfelelő típus kiválasztásában.
        </div>
      </details>

      <details class="faqItem">
        <summary class="faqItem__q">
          Mennyi idő alatt készül el a szemüveg?
          <span class="faqItem__icon" aria-hidden="true"></span>
        </summary>
        <div class="faqItem__a">
          Lencsétől és kerettől függ, általában pár munkanap. Speciális lencsék esetén hosszabb lehet.
          A pontos átvételi időt a rendeléskor egyeztetjük.
        </div>
      </details>

      <details class="faqItem">
        <summary class="faqItem__q">
          Van garancia és utólagos igazítás?
          <span class="faqItem__icon" aria-hidden="true"></span>
        </summary>
        <div class="faqItem__a">
          Igen, a szemüveg beállítását, igazítását és alapvető tanácsadást az átadás után is segítjük.
          Garanciális feltételek terméktől függnek – rendeléskor részletesen elmondjuk.
        </div>
      </details>

      <details class="faqItem">
        <summary class="faqItem__q">
          Egészségpénztári kártyát elfogadtok?
          <span class="faqItem__icon" aria-hidden="true"></span>
        </summary>
        <div class="faqItem__a">
          Igen, több egészségpénztári kártyát is elfogadunk. Ha az Ön pénztára nem szerepel a listában, számlát tudunk kiállítani.
        </div>
      </details>

    </div>
  </div>
</section>

@endsection
