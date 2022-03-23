<h3>Látványosságok</h3>


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
<div class="col-11 mx-auto background">
<?php
foreach($lista as $elem){
 echo'
 <div class="container-fluid">
  <div id="id-'.$elem['tartalom']['id']'." class="carousel slide slider-size mx-auto mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
    '.while($elem['kepek'][['kep']]){
      echo '<button type="button" data-bs-target="#id-'.$elem['tartalom']['id'].'" data-bs-slide-to="'.$elem['tartalom']['id'].'" ></button>';
    }.'
    </div>
    <div class="carousel-inner">
  '. echo $slider_html; .'
      <button class="carousel-control-prev" type="button" data-bs-target="#id-'.$elem['tartalom']['id'].'" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#id-'.$elem['tartalom']['id'].'" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      </button>
    </div>
    </div>
</div>
</div><br>
  
  
';?>
