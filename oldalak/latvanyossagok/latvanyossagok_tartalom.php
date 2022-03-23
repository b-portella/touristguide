
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
    <div class="col">
      <select class="form-select" name="megye_id" onchange="MegyeChange()">
        <?=$megyek_options?>
      </select>
    </div>
    <div class="col">
      <select class="form-select" name="telepules_id" onchange="LoadHref()">
        <?=$telepulesek_options?>
      </select>
    </div>
    <div class="col-5">
    <input class="form-control"name="keres" type="text" value="<?php if(isset($route->GetParameterek()['keres'])) echo $route->GetParameterek()['keres']; ?>" placeholder="keresés">
    </div>
    <input class="btn col" type="button" value="Keresés" onclick="LoadHref()">
  </div>
</form>

<?php


foreach($lista as $elem){?>
 <div class="col-11 mx-auto background">
 
 <div class="d-flex ">
    <div class="container  ">
        <div class="welcome-massege mx-auto border border-success rounded">
                <h3><?php echo $elem['tartalom']['nev']?></h3>
        </div>
    </div>
</div><h3 style='display:inline-block; '></h3>
 <?php
 //carousel
 echo'
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
  
  echo "<div class='carousel-caption mx-auto'>";
  echo "  <p style='display:inline-block; background: rgba(0, 0, 0, 0.4);'>".$elem['tartalom']['telepules_nev']."</p>
         </div>
      </div>";
	echo "<button type='button' href='#ID".$elem['tartalom']['id']."' data-slide-to='".$image_count."' class='".$active_class."'></button>";
 
}  


     
    echo'  </div>  
    <button class="carousel-control-prev" type="button" href="#ID'.$elem['tartalom']['id'].'" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" href="#ID'.$elem['tartalom']['id'].'" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  
  ';//carousel end

echo '

  <div class="d-flex flex-column">

  <div id="collapse'.$elem['tartalom']['id'].'" class="collapse"><br>
  <div class="container leiras "><p>'. $elem['tartalom']['leiras'].'</p></div>
  </div>
  </div>
  <button  class="btn " data-bs-toggle="collapse" data-bs-target="#collapse'.$elem['tartalom']['id'].'">Leírás</button>
  ';



echo '</div></div><br>';
}

?>

 