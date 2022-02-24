<h3>Látványosságok</h3>

<form name="frm01" method="get" onsubmit="return false">
  <input type="hidden" name="oldal" value="<?=$route->GetOldal()?>">
  <input type="hidden" name="muvelet" value="lista">
  <input type="hidden" name="lap" value="<?=$route->GetLap()?>">
  <select name="megye_id" onchange="MegyeChange()">
    <?=$megyek_options?>
  </select>
  <select name="telepules_id" onchange="LoadHref()">
    <?=$telepulesek_options?>
  </select>
  <input name="keres" type="text" value="<?php if(isset($route->GetParameterek()['keres'])) echo $route->GetParameterek()['keres']; ?>" placeholder="keresés">
  <input type="button" value="Keres" onclick="LoadHref()">
</form>



 









<?php
foreach($lista as $elem){
  echo $elem['tartalom']['id'].'<br>';
  echo $elem['tartalom']['nev'].'<br>';
  echo $elem['tartalom']['telepules_nev'].'<br>';
  echo $elem['tartalom']['megye_nev'].'<br>';
 
  
  foreach($elem['kepek'] as $kep){

    echo '<img src="img/latvanyossagok/'.$kep['kep'].'"><br>';

  }
}
print_r($lista);
?>