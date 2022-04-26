
 <div class="d-flex ">
    <div class="container  ">
        <div class="welcome-massege mx-auto border border-success ">
        <h3>Látványosságok</h3>
        </div>
    </div>
</div>


<form name="frm01" method="get" onsubmit="return false">
  <input type="hidden" name="oldal" value="<?=$route->GetOldal()?>">
  <input type="hidden" name="muvelet" value="lista">
  <input type="hidden" name="lap" value="<?=$route->GetLap()?>">
   <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3 mb-2">
      <select class="form-select" name="megye_id" onchange="MegyeChange()">
        <?=$megyek_options?>
      </select>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 mb-2">
      <select class="form-select" name="telepules_id" onchange="LoadHref()">
        <?=$telepulesek_options?>
      </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 mb-2">
    <input class="form-control"name="keres" type="text" value="<?php if(isset($route->GetParameterek()['keres'])) echo $route->GetParameterek()['keres']; ?>" placeholder="keresés">
    </div>
    <input class="btn col-xs-12 col-sm-12 col-md-2 mb-2" type="button" value="Keresés" onclick="LoadHref()">
  </div>
</form>

<?php


foreach($lista as $elem){?>
 <div class="col-11 mx-auto background">
  
 
 <div class="d-flex ">
    <div class="container-fluid">
      <div class=" col-10 welcome-massege mx-auto border border-success rounded">
              <h3><?php echo $elem['tartalom']['nev']?></h3>
      </div>
    </div> 
</div><br>



 <?php
 //carousel
 /**/echo'
 <div class="container-fluid">
    
    <div id="ID'.$elem['tartalom']['id'].'>" class="carousel slide slider-size mx-auto mb-5" data-bs-ride="carousel">';

    echo' <div class="carousel-inner">';
    $image_count = 0;
    
foreach ($elem['kepek'] as $pics) {	

  $active_class = '';
  if(!$image_count) {
    $active_class = 'active';					
    $image_count = 1;
  }	
  $image_count++;
  		
	echo'<div class="carousel-item '. $active_class.'">';
  
  echo '  <img src="img/latvanyossagok/'.$pics['kep'].'" alt="kep.jpg" class="d-block w-100">';
  
  echo "<div class='carousel-caption'>";
  echo "  <p style='display:inline-block; background: rgba(0, 0, 0, 0.4);'>".$elem['tartalom']['telepules_nev']."</p>
         </div>
      </div>";
	echo "<button type='button' data-bs-target='#ID".$elem['tartalom']['id']."' data-slide-to='".$image_count."' class='".$active_class."'></button>";
 
}  


     
    echo'  </div>  
    <button class="carousel-control-prev" type="button" data-bs-target="#ID'.$elem['tartalom']['id'].'" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#ID'.$elem['tartalom']['id'].'" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  
  ';//carousel end/**/

echo '

  <div class="d-flex flex-column">

  <div id="collapse'.$elem['tartalom']['id'].'" class="collapse"><br>
  <div class="container leiras "><p>'. $elem['tartalom']['leiras'].'</p></div>
  </div>
  </div>
  <div class="d-flex flex-row-reverse">
  <button  class="btn col-2 me-4 " data-bs-toggle="collapse" data-bs-target="#collapse'.$elem['tartalom']['id'].'">Leírás</button>';
  if ($user->IsLogin()) {
   
  echo '<button  class="btn col-2 me-4 ms-4" onclick="ListahozAd('.$elem['tartalom']['id'].')" >Listához ad</button>
  
  <select id="lista'.$elem['tartalom']['id'].'" class="form-select">
  
  </div>';

  echo '<option value="" disabled selected>Tervezéseid</option>';

  foreach ($utiterv_nevek as $utiterv_nev) {
   echo '<option value="'.$utiterv_nev["nev"].'">'.$utiterv_nev["nev"].'</option>';
  }
  echo '</select>
  ';
}

echo '</div></div><br>';
}

?>

 <script>
   function ListahozAd($id){
     var id = $id
    var lista = document.getElementById('lista'+id).value; 
    $.ajax({
        type: "POST",
        url: "index.php?oldal=latvanyossagok",
        data:  {
            id: $id,
            lista: lista,
        }
     })
     .done(function() {
       alert("Hozzáadva listához!")
         location.reload();
        });
   }
 </script>