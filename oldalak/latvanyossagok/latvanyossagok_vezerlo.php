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
$feltetel = "WHERE 1 ";
if ($megye_id > 0) {
  $feltetel.=" AND m.id ='$megye_id' ";
}
if ($telepules_id > 0) {
  $feltetel.=" AND t.id ='$telepules_id' ";
}
if (isset($parameterek['keres']) != "") {

    $keres = $parameterek['keres'];
    $feltetel.= " AND l.nev LIKE '%$keres%'";
 
}

  $sql = "SELECT l.id,l.nev,t.nev as telepules_nev, m.nev as megye_nev 
  FROM latvanyossagok as l 
  INNER JOIN telepulesek as t ON t.id = l.telepules_id
  INNER JOIN megyek as m on m.id = t.megye_id
  $feltetel AND l.allapot = 'engedelyezett'
  ORDER BY l.nev";

$adatsorok = $kapcs->Select($sql);
$lista = array();

foreach($adatsorok as $sor){
  $latvanyossag_id = $sor['id'];
  $sql="select kep from kepek where latvanyossag_id = '$latvanyossag_id' limit 3 ";
  $kepek = $kapcs->Select($sql);
  $lista[] = array('tartalom' =>$sor, 'kepek' => $kepek );
}

$image_count = 0;
$button_html = '';		
$slider_html = '';
$slider_pic='';
while( $lista){	
	$active_class = '';			
	if(!$image_count) {
		$active_class = 'active';					
		$image_count = 1;
	}	
	$image_count++;
	// slider image html
    
	$slider_html.= '<div class="carousel-item '. $active_class.'">';
    $slider_html.= '<img src="img/latvanyossagok/'.$lista['kepek']['kep'].'" alt="'.$lista['tartalom']['id'].'.jpg" class="d-block w-100">';
    $slider_html.= "<div class='carousel-caption mx-auto'><h3 style='display:inline-block; background: rgba(0, 0, 0, 0.4);'>".$lista['tartalom']['nev']."</h3><br>";
$slider_html.= "<p style='display:inline-block; background: rgba(0, 0, 0, 0.4);'>".$lista['tartalom']['telepules_nev']."</p></div></div>";
	// Button html
	$button_html.= "<button type='button' data-bs-target='#demo' data-slide-to='".$image_count."' class='".$active_class."'></button>";
    
}
?>

