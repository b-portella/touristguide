<div class="d-flex">
    <div class="container ">
        <div class="welcome-massege mx-auto border border-success">
                <h3>Új látványosság beküldése </h3>
        </div>
    </div>
</div><br>

              

<div class="container form">
  <form name="frm01" id="form" method="post" action="index.php" enctype="multipart/form-data" onsubmit="return true">
    <input type="hidden" name="oldal" value="<?=$route->GetOldal()?>">
    <input type="hidden" name="muvelet" value="uj">
    <input type="hidden" name="lap" value="<?=$route->GetLap()?>">
    
    <div id="messages" class="hide" role="alert">
    <div id="messages_content"></div>
    </div>
    



      <div class="form-group">
        <label class ="form-label h5 float-start ">Település:</label>
        <select class="form-select" style=" margin-bottom:3%"name="telepules_id" title="Melyik településen található" placeholder="települések" required>
        <?=$telepulesek_options?> 
        </select>
      </div>
      <div class="row">
        <div class="col-md-6">
        
         

          <div class="form-group">
            <input class="form-control" name="nev" type="text" value="<?php if(isset($route->GetParameterek()['nev'])) echo $route->GetParameterek()['nev']; ?>" title="Megnevezése" placeholder="Látványosság megnevezése" required>
          </div>
          
          <div class="form-group">
            <input class="form-control" name="cim" type="text" value="<?php if(isset($route->GetParameterek()['cim'])) echo $route->GetParameterek()['cim']; ?>" title="Címe (utca, házszám)" placeholder="Látványosság címe (utca, házszám)">
          </div>
          
          <div class="form-group">
            <input class="form-control" name="gps_szelesseg" type="number" step="0.001" value="<?php if(isset($route->GetParameterek()['gps_szelesseg'])) echo $route->GetParameterek()['gps_szelesseg']; ?>" title="GPS szélességi koordináta" placeholder="GPS szélességi koordináta">
          </div>

          <div class="form-group">
            <input class="form-control" name="gps_hosszusag" type="number" step="0.001" value="<?php if(isset($route->GetParameterek()['gps_hosszusag'])) echo $route->GetParameterek()['gps_hosszusag']; ?>" title="GPS hosszúsági koordináta" placeholder="GPS hosszúsági koordináta">
          </div>
          
          <div class="form-group">
            <textarea class="form-control mx-auto" style="width:100% height:150px;" name="leiras" title="Bővebb leírás" placeholder="Bővebb leírás" required style="width : 600px; height:400px;"><?php if(isset($route->GetParameterek()['leiras'])) echo $route->GetParameterek()['leiras']; ?></textarea>
          </div>
        
        </div>
        
        <div class="col-md-6 ">

          <input type="file" class="form-control" name="kep1" accept="image/jpeg/png" title="Látványosság 1.képe" placeholder="Látványosság 1.képe">  
          
          <input type="file" class="form-control" name="kep2" accept="image/jpeg/png" title="Látványosság 2.képe" placeholder="Látványosság 2.képe">  
          
          <input type="file" class="form-control" name="kep3" accept="image/jpeg/png" title="Látványosság 3.képe" placeholder="Látványosság 3.képe">  
          
          <input type="file" class="form-control" name="kep4" accept="image/jpeg/png" title="Látványosság 4.képe" placeholder="Látványosság 4.képe">  
          
          <input type="file" class="form-control" name="kep5" accept="image/jpeg/png" title="Látványosság 5.képe" placeholder="Látványosság 5.képe">  
          
          

        </div>
      </div>
  
    <input type="submit" class="btn " value="OK - Beküld">
  
</div>  
  </form>


<script>
  document.frm01.telepules_id.selectedIndex=-1;
  $('#form').submit(function(e) {
                $('#messages').removeClass('hide').addClass('alert alert-success alert-dismissible').slideDown().show();
                $('#messages_content').html('<?php echo'<p>'.$_SESSION['info_msg'].'</p>'?>');
                $('#modal').modal('show');
                e.preventDefault();
            });
</script>