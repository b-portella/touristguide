<?php
  ob_start();
  error_reporting(E_ALL^E_NOTICE);
  session_start();

  // konfigurációs adatok
  require_once "config.php";

  // MyAdatbazis osztály
  require_once "adatbazis.php";
  $kapcs = new MyAdatbazis();
  $kapcs->Connect();
  $menu = $kapcs->GetMenus();

  // MyUser osztály
  require_once "user.php";
  $user = new MyUser();

  // MyRouter osztály
  require_once "router.php";
  $route = new MyRouter('oldalak','vezerlo','tartalom');

  // direkt url használatának figyelése
  $new_page = $kapcs->IsPageAllRight($route->GetOldal(), $user->IsLogin(), $user->IsAdmin());
  if($new_page != "")
  {
      $route->Go($new_page);
  }

  // betöltendő oldalhoz tartozó vezérlő lefuttatása
  if(file_exists($route->GetFNevVezerlo())) 
  {
    include $route->GetFNevVezerlo();
  } 
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <base href="<?=ROOT?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/stilus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="js/fuggvenyek.js"></script>
    <?=$route->LinkJavaScript()?>
    <title>TOURISTGUIDE</title>
</head>
<body>

  <div class="container-fluid">
    <?php
    include "tag_header.php";
    include "menu.php";
    
    // adott oldalhoz tartozó tartalom megjelenítése
    if(file_exists($route->GetFNevTartalom())) 
    {
      include $route->GetFNevTartalom();
    } 
    else
    {
      include '404.php';
    } 
 
    include "tag_footer.php";

    if(file_exists("var_dump.php"))
      include "var_dump.php";
    ?>
  </div>

</body>
</html>

<?php
  $kapcs->Close();
  ob_end_flush();
 
?> 