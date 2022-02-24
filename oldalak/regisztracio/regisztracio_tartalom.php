<div class="d-flex">
    <div class="container ">
        <div class="welcome-massege mx-auto border border-success">
        <h3>Regisztráció</h3>

        </div>
    </div>
</div><br>



<div class=" container form">

<form method="post" action="index.php">
<input type="hidden" name="oldal" value="regisztracio">
<input type="hidden" name="muvelet" value="registration">
  <?php echo $errors; ?>
   
  
  <div class="row">
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="felhasznalonev" placeholder="Felhasználónév" name="felhasznalonev" required>
            <label for="felhasznalonev">Felhasználónév</label>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="form-floating mb-3 mt-3">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            <label for="email">Email</label>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" id="jelszo" placeholder="Jelszó" name="jelszo" required>
            <label for="jelszo">Jelszó</label>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" id="jelszo2" placeholder="Jelszó újra" name="jelszo2" required>
            <label for="jelszo2">Jelszó újra</label>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="d-inline-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
          <button type="submit" class="btn" name="felhasznalo_regisztracio">Regisztráció</button>
      </div>
    </div>
  </div>
 

  </form>
</div>