<?php
if(isset($_GET['id'])){

$latvanyossag_id = $_GET['id'];
}
$sql= "SELECT k.id as kep_id, k.kep as kep_nev FROM kepek as k
INNER JOIN latvanyossagok as l ON k.latvanyossag_id = l.id
WHERE latvanyossag_id = $latvanyossag_id;
";
$result=$kapcs->Select($sql);
?>