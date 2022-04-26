<div class="d-flex">
<div class="container ">
    <div class="welcome-massege mx-auto border border-success">
            <h3>Beküldött látványosság szerkesztése </h3>
    </div>
</div>
</div><br>

<div class="container form">
<form name="frm01" method="post" action="" >
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
    
    <div class="form-group">
      <label class ="form-label h5 float-start ">Település:</label>
      <input class="form-control" style=" margin-bottom:3%"name="telepules_id" value="<?php echo $eredmeny[0]['telepules_nev']?>" title="Melyik településen található" placeholder="települések" required>
      </input>
    </div>
     

      <div class="form-group">
        <input class="form-control" name="nev" type="text" value="<?php echo $eredmeny[0]['latvanyossag_nev']; ?>" title="Megnevezése" placeholder="Látványosság megnevezése" required>
      </div>
      
      <div class="form-group">
        <input class="form-control" name="cim" type="text" value="<?php echo $eredmeny[0]['cim']; ?>" title="Címe (utca, házszám)" placeholder="Látványosság címe (utca, házszám)">
      </div>
      
      <div class="form-group">
        <input class="form-control" name="gps_szelesseg" type="number" step="0.001" value="<?php echo $eredmeny[0]['gps_szelesseg']?>" title="GPS szélességi koordináta" placeholder="GPS szélességi koordináta">
      </div>

      <div class="form-group">
        <input class="form-control" name="gps_hosszusag" type="number" step="0.001" value="<?php echo (isset($eredmeny[0]['gps_hosszusag'])) ? $eredmeny[0]['gps_hosszusag'] : ""?>" title="GPS hosszúsági koordináta" placeholder="GPS hosszúsági koordináta">
      </div>
      
      <div class="form-group">
        <textarea class="form-control mx-auto" style="width:100%; height:230px;" name="leiras" title="Bővebb leírás" placeholder="Bővebb leírás" required ><?php echo $eredmeny[0]['leiras']?></textarea>
      </div>
    
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="pics-delete">
        <?php

          foreach ($eredmeny as $array => $kepek) {
            
            echo '<div class="container">
                    <img src="img/latvanyossagok/'.$kepek['kep'].'" alt="pics" id="pics" >
                    <button type="submit" name="'.$kepek['kep_id'].'" class="btn btn-danger">Törlés</button>
                  </div>';
          }

        ?>
      </div><br>
    </div>
</div>
  

<input type="submit" class="btn " name="modify" value="OK - Módosít">

</div>  
</form>


<?php



//print_r($eredmeny);

?>