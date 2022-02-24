<?php
  $parameterek = $route->GetParameterek();
  $megye_id = isset($parameterek['megye_id']) ? (int)$parameterek['megye_id'] : 0;
  $megyek_options = $kapcs->StrOptionsTable('megyek', 'id', 'nev', $megye_id, "---Összes megye---");

  $telepules_id = isset($parameterek['telepules_id']) ? (int)$parameterek['telepules_id'] : 0;
  if($megye_id == 0) // nincs kiválasztott megye_id
  {
    $telepulesek_options = $kapcs->StrOptionsTable('telepulesek', 'id', 'nev', $telepules_id, "---Összes település---");
  }
  else
  {
    $megye_nev = $kapcs->IndexOf('megyek', 'id', $megye_id, 'nev');
    $sql = "select id, nev 
            from telepulesek 
            where megye_id='$megye_id' 
            order by nev, id";
    $telepulesek_options = $kapcs->StrOptionsSql($sql, 'id', 'nev', $telepules_id, '---'.$megye_nev.'  összes települése---');
  }

  switch($route->GetMuvelet())
  {
    default:
      break;
  }

  $sql = "SELECT l.id,l.nev,t.nev as telepules_nev, m.nev as megye_nev 
  FROM latvanyossagok as l 
  INNER JOIN telepulesek as t ON t.id = l.telepules_id
  INNER JOIN megyek as m on m.id = t.megye_id
  ORDER BY l.nev";

$adatsorok = $kapcs->Select($sql);
$lista = array();

foreach($adatsorok as $sor){
  $latvanyossag_id = $sor['id'];
  $sql="select kep from kepek where latvanyossag_id = '$latvanyossag_id' limit 3 ";
  $kepek = $kapcs->Select($sql);
  $lista[] = array('tartalom' =>$sor, 'kepek' => $kepek );
}




?>
