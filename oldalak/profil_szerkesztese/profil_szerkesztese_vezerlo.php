<?php
$errors = "";
$info="";
switch($route->GetMuvelet())
{
  case 'profil_update':
     
    $uj_felhasznalonev = mysqli_real_escape_string($kapcs->db, $_POST['felhasznalonev']);
    $uj_jelszo = mysqli_real_escape_string($kapcs->db, $_POST['jelszo']);
  
    if ($errors == "") {
        if (!$uj_jelszo="" && !$uj_felhasznalonev=""){
        $uj_jelszo = md5($uj_jelszo);
        $user_id=$user->GetId();
        $query = "UPDATE felhasznalok SET felhasznalonev='$uj_felhasznalonev',jelszo='$uj_jelszo' where id='$user_id'";
        
        $eredmeny=$kapcs->Update($query);

        }else{$info="Nincs mit frissíteni!";} 
        
        if ($eredmeny) {
          $info = "<p>Sikeresen frissítetted</p>";

        }else {
          $errors.=  "Sikertelen frissítés";
        }
    }
    
    break;
}

?>