<section class="callback" id="visszahivas">
  <div class="container">
    <h2 class="callback__title">Kérje visszahívásunkat!</h2>

    <form class="callback__form" action="/api/quote/send.php" method="post">
      <div class="formGrid">
        <div class="field">
          <input id="last" name="last_name" type="text" placeholder="Vezetéknév*" required>
        </div>

        <div class="field">
          <input id="first" name="first_name" type="text" placeholder="Keresztnév*" required>
        </div>

        <div class="field">
          <input id="phone" name="phone" type="tel" placeholder="Telefonszám*" required>
        </div>

        <div class="field">
          <input id="email" name="email" type="email" placeholder="Email">
        </div>
      </div>

      <div class="field">
        <input id="service" name="service" type="text" placeholder="Melyik szolgáltatásunk érdekli?">
      </div>

      <div class="field">
        <textarea id="msg" name="message" rows="6" placeholder="Üzenet"></textarea>
      </div>

      <label class="consent">
        <input type="checkbox" name="consent" value="1" required>
        <span>Elfogadom az 
          <a href="/assets/pdf/Adatkezelesi_tajekoztato_3DOptika.pdf" type="application/pdf" target="_blank">
  adatkezelési tájékoztatót*
</a></span>
      </label>

      <div class="callback__actions">
        <button class="btn btn--primary btn--wide" type="submit">Elküldöm</button>
      </div>
    </form>
  </div>
</section>
