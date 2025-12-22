<section class="callback" id="visszahivas">
  <div class="container">
    <h2 class="callback__title">Kérje visszahívásunkat!</h2>

    <form class="callback__form" action="#" method="post">
      <div class="formGrid">
        <div class="field">
          <label for="last">Vezetéknév*</label>
          <input id="last" name="last_name" type="text" required>
        </div>

        <div class="field">
          <label for="first">Keresztnév*</label>
          <input id="first" name="first_name" type="text" required>
        </div>

        <div class="field">
          <label for="phone">Telefonszám*</label>
          <input id="phone" name="phone" type="tel" required>
        </div>

        <div class="field">
          <label for="email">Email</label>
          <input id="email" name="email" type="email">
        </div>
      </div>

      <div class="field">
        <label for="service">Melyik szolgáltatásunk érdekli?</label>
        <input id="service" name="service" type="text">
      </div>

      <div class="field">
        <label for="msg">Üzenet</label>
        <textarea id="msg" name="message" rows="6"></textarea>
      </div>

      <label class="consent">
        <input type="checkbox" required>
        <span>Elfogadom az adatkezelési nyilatkozatot*</span>
      </label>

      <div class="callback__actions">
        <button class="btn btn--primary btn--wide" type="submit">Elküldöm</button>
      </div>
    </form>
  </div>
</section>
