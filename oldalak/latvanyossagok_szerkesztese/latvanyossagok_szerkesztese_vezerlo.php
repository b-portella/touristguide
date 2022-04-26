<?php

 $sql= "SELECT * FROM latvanyossagok";
 $latvany_lekerdezes = $kapcs->Select($sql);

 if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if ($_POST['action'] == "delete") {
        $sql="UPDATE latvanyossagok set allapot = 'torolt' WHERE id =".$id ;
        $kapcs->Update($sql);
    }else {
        $sql="UPDATE latvanyossagok set allapot = 'engedelyezett' WHERE id =".$id ;
        $kapcs->Update($sql);
    }   
}
?> 