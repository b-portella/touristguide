<?php
  // lekérdezés
   $user_id=$user->GetId();
  $sql = "SELECT id, felhasznalonev,email,jogosultsag,torolt FROM felhasznalok 
          EXCEPT
          SELECT id, felhasznalonev,email,jogosultsag,torolt FROM felhasznalok WHERE id =".$user_id." ORDER BY felhasznalonev";
  $eredmenyek = $kapcs->Select($sql);
  $jogok="";
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql ="SELECT jogosultsag FROM felhasznalok WHERE id =".$id; 
    $jogok=$kapcs->Select($sql);
    print_r($jogok);
    if($_POST['action'] == "modify"){
    
      if ($jogok[0]['jogosultsag'] == "felhasznalo") {
        $sql="UPDATE felhasznalok SET jogosultsag = 'admin' WHERE id =".$id ;
        $kapcs->Update($sql);
      }else if($jogok[0]['jogosultsag'] == "admin"){
        $sql="UPDATE felhasznalok SET jogosultsag = 'felhasznalo' WHERE id =".$id ;
        $kapcs->Update($sql);
      }  
   }else if ($_POST['action'] == "delete") {
     $sql="UPDATE felhasznalok SET torolt = 'igen' WHERE id =".$id;
     $kapcs->Update($sql);
   }else if ($_POST['action'] == "undelete") {
    $sql="UPDATE felhasznalok SET torolt = 'nem' WHERE id =".$id;
    $kapcs->Update($sql);
  }
  }

?>