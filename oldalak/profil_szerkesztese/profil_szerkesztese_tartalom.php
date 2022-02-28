<div class="d-flex">
    <div class="container ">
        <div class="welcome-massege mx-auto border border-success">
                <h3> <?php echo $row['felhasznalonev']?> profilja</h3>
        </div>
    </div>
</div><br>



<div class=" container form">
<form method="post" action="">

  <?php echo $errors;
        echo $info; ?>
    
   
  <div class="row">
  
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="mb-3 mt-3">
        <label class="float-start" for="felhasznalonev">Felhasználónév frissítése:</label>
            <input type="text" class="form-control" id="felhasznalonev" placeholder="Felhasználónév" value="<?php echo $row['felhasznalonev']; ?>" name="felhasznalonev" >
           
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="mb-3 mt-3">
        <label class="float-start" for="password_now">Jelenlegi jelszó:</label>
            <input type="password" class="form-control" id="jelszo_uj" placeholder="Jelenlegi jelszó" name="jelszo_most" >
            
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="d-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
        <div class="mb-3 mt-3">
        <label class="float-start" for="password">Új jelszó:</label>
            <input type="password" class="form-control" id="jelszo_uj" placeholder="Új jelszó" name="jelszo_uj" >
            
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="d-inline-flex justify-content-center">
      <div class ="col-12 col-md-9 col-lg-7">
          <button type="submit" class="btn" name="profil_update">Frissít</button>
      </div>
    </div>
  </div>
 

  </form>
</div>
