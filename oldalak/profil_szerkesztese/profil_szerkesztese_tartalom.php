<div class="d-flex">
    <div class="container ">
        <div class="welcome-massege mx-auto border border-success">
                <h3>Profil</h3>
        </div>
    </div>
</div><br>



<div class=" container form">
<form method="post" action="index.php">
<input type="hidden" name="oldal" value="bejelentkezes">
<input type="hidden" name="muvelet" value="login">
  <?php echo $errors; ?>
    
  
  <div class="row">
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="felhasznalonev" placeholder="Felhasználónév" name="felhasznalonev" >
            <label for="felhasznalonev">Felhasználónév</label>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" id="jelszo" placeholder="Jelszó" name="jelszo" >
            <label for="jelszo">Jelszó</label>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="d-inline-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
          <button type="submit" class="btn" name="felhasznalo_bejelentkezes">Bejelentkezés</button>
      </div>
    </div>
  </div>
 

  </form>
</div>