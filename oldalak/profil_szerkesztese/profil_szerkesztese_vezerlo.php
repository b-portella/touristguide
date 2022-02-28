<?php
$errors = "";
$info="";


$id=$user->GetId();
$query=mysqli_query($kapcs->db,"SELECT * FROM felhasznalok where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
    
  
   if(isset($_POST['profil_update'])) {
    $uj_felhasznalonev = mysqli_real_escape_string($kapcs->db, $_POST['felhasznalonev']);
    $uj_jelszo = mysqli_real_escape_string($kapcs->db, $_POST['jelszo_uj']);
    $jelnlegi_jelszo=mysqli_real_escape_string($kapcs->db,$_POST['jelszo_most']);
    $jelenlegi_felhasznalonev = $row['felhasznalonev'];
        $uj_jelszo = md5($uj_jelszo);
        $jelnlegi_jelszo=md5($jelnlegi_jelszo);

        $sql = "SELECT jelszo FROM felhasznalok WHERE felhasznalonev=$jelenlegi_felhasznalonev";
        $egyezo_jelszo_lekerdezes=$kapcs->Select($sql);
        print_r($egyezo_jelszo_lekerdezes['jelszo']);
        
        if ($egyezo_jelszo_lekerdezes['jelszo'] == $jelnlegi_jelszo){
        $user_id=$user->GetId();
        if ($jelenlegi)
        $query = "UPDATE felhasznalok SET jelszo='$uj_jelszo',felhasznalonev='$uj_felhasznalonev' where id='$user_id'";
        
        $result = mysqli_query($kapcs->db, $query) or die(mysqli_error($kapcs->db));

        $user->Logout(1,'Teszt1','teszt1@teszt.hu','felhasznalo');
        ?> <script type="text/javascript">
    alert("Update Successfull.");
    </script>
    <?php 
        $user->Login($id,$uj_felhasznalonev,$row['email'],$row['jogosultsag']);
        header("Refresh:0");}else {$errors="Helytelen jelszó!";}
        } 

        
   
        
    


?>