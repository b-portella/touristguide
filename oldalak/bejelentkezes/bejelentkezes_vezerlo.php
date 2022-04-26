<?php
$errors = "";
switch($route->GetMuvelet())
{
  case 'login':
     
    $felhasznalonev = mysqli_real_escape_string($kapcs->db, $_POST['felhasznalonev']);
    $jelszo = mysqli_real_escape_string($kapcs->db, $_POST['jelszo']);
  
    if (empty($felhasznalonev)) {
        $errors.= "A felhasználónevet kötelező megadni<br>";
    }
    if (empty($jelszo)) {
      $errors.= "A jelszót kötelező megadni<br>";
    }
  
    if ($errors == "") {
        $jelszo = md5($jelszo);

        $query = "SELECT * FROM felhasznalok WHERE felhasznalonev='$felhasznalonev' AND jelszo='$jelszo'";
        
        $eredmeny=$kapcs->Select($query);
        
      if (count($eredmeny) == 1){
         
        if ($eredmeny[0]['torolt'] == "igen") {
          $errors.= "A felhasználó törölve lett!";
          
        }
        if ($eredmeny[0]['torolt'] == "nem" ) {
          $eredmeny = $eredmeny[0];
          $user->Login($eredmeny['id'],$felhasznalonev,$eredmeny['email'],$eredmeny['jogosultsag']);
          header("location: index.php");
          

        } 
      }
        if (count($eredmeny) == 0){
          $errors.=  "A felhasználónév vagy a jelszó nem helyes<br>";
        }
    }
    
    break;
}

?>