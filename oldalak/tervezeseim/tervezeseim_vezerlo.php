<?php
$felhasznalo_id=$user->GetId();

$sql = "SELECT id, nev FROM utiterv WHERE felhasznalo_id =".$felhasznalo_id;
$lista_result=$kapcs->Select($sql);



if (isset($_POST['lista_letrehozas'])) {
   $sql="INSERT INTO utiterv (nev,felhasznalo_id)
        VALUES ('".$_POST['utiterv_nev']."', ".$felhasznalo_id.")";
    $insert=$kapcs->Insert($sql);
    $page = 'index.php?oldal=tervezeseim';
header('Location: '.$page, true, 303);
exit;
}
 if (isset($_POST['lista_id'])){
     $lista_id = $_POST['lista_id'];
     $sorszam = $_POST['sorszam'];
     if ($_POST['hova'] == "fel") {
        $sorszam2 = $sorszam-1;
     }else if ($_POST['hova'] == "le") {
        $sorszam2 = $sorszam+1;
     }
     
     $sql="UPDATE
     utiterv_elemei t1 INNER JOIN utiterv_elemei t2
     ON (t1.sorrend, t2.sorrend) IN ((".$sorszam.",".$sorszam2."),(".$sorszam2.",".$sorszam."))
   SET
     t1.latvanyossag_id = t2.latvanyossag_id
     WHERE t1.utiterv_id =".$lista_id." AND t2.utiterv_id = ".$lista_id;
     $update=$kapcs->Update($sql);
 }
 if (isset($_POST['torol_id'])) {
     $torol_id = $_POST['torol_id'];
     $sql = "DELETE FROM `utiterv_elemei` WHERE utiterv_id =".$torol_id; 
     $delete_utiterv_elem=$kapcs->Delete($sql);
     $sql = "DELETE FROM `utiterv` WHERE id =".$torol_id; 
     $delete_utiterv=$kapcs->Delete($sql);
 }
?>
   
   