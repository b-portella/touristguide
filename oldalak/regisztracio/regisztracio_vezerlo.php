<?php
$errors = "";
switch($route->GetMuvelet())
{
  case 'registration':
     
    $felhasznalonev = mysqli_real_escape_string($kapcs->db, $_POST['felhasznalonev']);
    $email = mysqli_real_escape_string($kapcs->db, $_POST['email']);
    $jelszo = mysqli_real_escape_string($kapcs->db, $_POST['jelszo']);
    $jelszo2 = mysqli_real_escape_string($kapcs->db, $_POST['jelszo2']);
  
    if (empty($felhasznalonev)) {
        $errors.= "A felhasználónevet kötelező megadni<br>";
    }
    if (empty($email)) {
        $errors.= "Az email címet kötelező megadni<br>";
    }
    if (empty($jelszo)) {
      $errors.= "A jelszót kötelező megadni<br>";
    }if (empty($jelszo2)) {
        $errors.= "A jelszó megerősítését kötelező megadni<br>";
    }
    if ($jelszo != $jelszo2) {
        $errors.= "A jelszó nem egyezik<br>";
    }
  
    if ($errors == "") {
        $jelszo = md5($jelszo);

        $query = "insert into felhasznalok ( felhasznalonev,jelszo, email, jogosultsag, torolt, torolt_felhasznalonev)
         values ('$felhasznalonev','$jelszo','$email','felhasznalo','nem', null)";
        
        $eredmeny=$kapcs->Insert($query);
        if ($eredmeny === false){
            $errors.="Sikertelen regisztráció! (Foglalt felhasználónév)";
        }else{
            $user->Login($eredmeny,$felhasznalonev,$email,'felhasznalo');
            header('index.php');
        }

        
    }
    
    break;
}

?>