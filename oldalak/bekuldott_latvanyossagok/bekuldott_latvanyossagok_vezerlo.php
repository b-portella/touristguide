<?php
$felhasznalo_id = $user->GetId();
$sql = "SELECT * FROM `latvanyossagok` WHERE felhasznalo_id = ".$felhasznalo_id." AND allapot != 'torolt'";
$result=$kapcs->Select($sql);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if ($_POST['action'] == "delete") {
        $sql="UPDATE latvanyossagok set allapot = 'torolt' WHERE id =".$id ;
        $kapcs->Update($sql);
    }
}
?>