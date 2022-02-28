<?php
   //return;
  
  echo '<hr>';

  echo 'user-id: '.$user->GetLogin().'<br>';
  echo 'user-login: '.$user->GetLogin().'<br>';
  echo 'user-jogosultsag: '.$user->GetJogosultsag().'<br>';
  echo 'user login-e: '.($user->IsLogin()?'igen':'nem').'<br>';
  echo 'user admin-e: '.($user->IsAdmin()?'igen':'nem').'<br>';

  echo 'oldal: '.$route->GetOldal().'<br>';
  echo 'muvelet: '.$route->GetMuvelet().'<br>';
  echo 'parameterek: '.print_r($route->GetParameterek(),true).'<br>';

  echo 'vezerlo.php: '.$route->GetFNevVezerlo().'<br>';
  echo 'tartalom.php: '.$route->GetFNevTartalom().'<br>';

  $n=count($_GET);
  echo "<br>GET (hossz: $n): ";
  print_r($_GET);

  $n=count($_POST);
  echo "<br>POST (hossz: $n): ";
  print_r($_POST);

  $n=count($_REQUEST);
  echo "<br>REQUEST (hossz: $n): ";
  print_r($_REQUEST);

  echo "<br>SERVER[QUERY_STRING]: ";
  print_r($_SERVER['QUERY_STRING']);

  echo "<br>SESSION: ";
  print_r($_SESSION);

  echo "<br>FILES: ";
  print_r($_FILES);

  print_r($egyezo_jelszo_lekerdezes[0]);
 

?>