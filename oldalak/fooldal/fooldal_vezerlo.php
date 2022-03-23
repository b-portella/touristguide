<?php 

$sql = "SELECT k.id, k.kep, l.nev as latvanyossag_nev,
         t.nev as telepules_nev 
         FROM kepek as k
         INNER JOIN latvanyossagok as l ON l.id = k.latvanyossag_id
         INNER JOIN telepulesek as t ON t.id = l.telepules_id
         ORDER BY RAND() 
         LIMIT 5";

$resultset = mysqli_query($kapcs->db, $sql) or die("database error:". mysqli_error($kapcs));
$image_count = 0;
$button_html = '';		
$slider_html = '';
$slider_pic='';
while( $rows = mysqli_fetch_assoc($resultset)){	
	$active_class = '';			
	if(!$image_count) {
		$active_class = 'active';					
		$image_count = 1;
	}	
	$image_count++;
	// slider image html
    
	$slider_html.= '<div class="carousel-item '. $active_class.'">';
    $slider_html.= '<img src="img/latvanyossagok/'.$rows['kep'].'" alt="1.jpg" class="d-block w-100">';
    $slider_html.= "<div class='carousel-caption mx-auto'><h3 style='display:inline-block; background: rgba(0, 0, 0, 0.4);'>".$rows['latvanyossag_nev']."</h3><br>";
$slider_html.= "<p style='display:inline-block; background: rgba(0, 0, 0, 0.4);'>".$rows['telepules_nev']."</p></div></div>";
	// Button html
	$button_html.= "<button type='button' data-bs-target='#demo' data-slide-to='".$image_count."' class='".$active_class."'></button>";
    
}
?>