<?php
  function KepetCsatol($id, $n)
  {
    global $kapcs;
    $kep='kep'.$n;
    if($_FILES[$kep]['name']!="" && $_FILES[$kep]['error']==0)
    {
      $tmp = $_FILES[$kep]['tmp_name'];
      $ext = pathinfo($_FILES[$kep]['name'], PATHINFO_EXTENSION);
      $dir = "img/latvanyossagok/";
      $fnev = str_pad((string)$id, 8, "0", STR_PAD_LEFT); 
      $fnev = $fnev."-000$n.".$ext;
      if(move_uploaded_file($tmp,$dir.$fnev))
      {
        $sql="insert into kepek (latvanyossag_id, kep) values ('$id', '$fnev')";
        $kapcs->Insert($sql);
      }
    }
  }


$telepules_id ="";
  switch($route->GetMuvelet())
  {
    case 'uj':
      $telepules_id = $_POST['telepules_id'];
      $nev = $_POST['nev'];
      $leiras = $_POST['leiras'];
      $cim = $_POST['cim'];
      $gps_szelesseg = $_POST['gps_szelesseg']; 
      $gps_hosszusag = $_POST['gps_hosszusag'];
      if($user->IsAdmin())
      {
        $allapot = 'engedelyezett';
        $info = 'Látványosság beküldése sikeresen megtörtént! A rendszerben már látható is!';
      }
      else
      {        
        $allapot = 'uj';
        $info = 'Látványosság beküldése sikeresen megtörtént! Addig nem látszik a rendszerben, amíg az adminisztrátor nem ellenőrzi, és aztán jóvá kell azt hagynia!';
      }
      
      $sql="insert into latvanyossagok (nev, leiras, gps_szelesseg, gps_hosszusag, cim, telepules_id, allapot) values ('$nev', '$leiras', '$gps_szelesseg', '$gps_hosszusag', '$cim', '$telepules_id', '$allapot')";
      $id=$kapcs->Insert($sql);
      
      KepetCsatol($id,1);
      KepetCsatol($id,2);
      KepetCsatol($id,3);
      KepetCsatol($id,4);
      KepetCsatol($id,5);

      $_SESSION['info_msg'] = $info;
      
      $route->Go($route->GetOldal());     
      break;
    default:
      break;
  }
  
  $telepulesek_options = '<option value="" disabled selected >Válassz települést</option>'.$kapcs->StrOptionsTable('telepulesek', 'id', 'nev', $telepules_id, false);
?>