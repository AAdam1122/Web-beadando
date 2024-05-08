<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center">
      <form style="color: black;" action="?oldal=belep" method="post">
        <fieldset>
          <legend style="color: black;">Bejelentkezés</legend>
          <br>
          <input type="text" name="felhasznalo" class="form-control" placeholder="Felhasználó" required><br><br>
          <input type="password" name="jelszo" class="form-control" placeholder="Jelszó" required><br><br>
          <input type="submit" name="belepes" class="btn btn-primary" value="Belépés">
        </fieldset>
      </form>
    </div>
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-md-6 text-center">
      <h3 style="color: black;">Regisztrálja magát, ha még nem felhasználó!</h3>
      <form style="color: black;" action="?oldal=regisztral" method="post">
        <fieldset>
          <legend style="color: black;">Regisztráció</legend>
          <br>
          <input type="text" name="vezeteknev" class="form-control" placeholder="Vezetéknév" required><br><br>
          <input type="text" name="utonev" class="form-control" placeholder="Utónév" required><br><br>
          <input type="text" name="felhasznalo" class="form-control" placeholder="Felhasználói név" required><br><br>
          <input type="password" name="jelszo" class="form-control" placeholder="Jelszó" required><br><br>
          <input type="submit" name="regisztracio" class="btn btn-success" value="Regisztráció">
        </fieldset>
      </form>
    </div>
  </div>
</div>
