<?php
  $sql = "SELECT *  FROM kepek
   INNER JOIN latvanyossagok  as l ON l.id = kepek.latvanyossag_id
  WHERE l.allapot ='engedelyezett'";
  $osszes_lekerdezese = $kapcs->Select($sql);

 

 
?> 