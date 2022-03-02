<?php
  // lekérdezés
  $sql = "SELECT id, felhasznalonev,email,jogosultsag FROM felhasznalok ORDER BY felhasznalonev";
  $eredmenyek = $kapcs->Select($sql);
?>