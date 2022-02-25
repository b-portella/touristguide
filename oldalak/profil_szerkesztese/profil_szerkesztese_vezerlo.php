<?php
$errors = "";
$info="";

$id=$user->GetId();
$query=mysqli_query($kapcs->db,"SELECT * FROM felhasznalok where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
    
  
   if(isset($_POST['profil_update'])) {
    $uj_felhasznalonev = mysqli_real_escape_string($kapcs->db, $_POST['felhasznalonev']);
    $uj_jelszo = mysqli_real_escape_string($kapcs->db, $_POST['jelszo']);
        
        $uj_jelszo = md5($uj_jelszo);
        $user_id=$user->GetId();
        $query = "UPDATE felhasznalok SET jelszo='$uj_jelszo',felhasznalonev='$uj_felhasznalonev' where id='$user_id'";
        
        $result = mysqli_query($kapcs->db, $query) or die(mysqli_error($kapcs->db));

        $user->Logout(1,'Teszt1','teszt1@teszt.hu','felhasznalo');
        ?> <script type="text/javascript">
    alert("Update Successfull.");
    </script>
    <?php 
        $user->Login($id,$uj_felhasznalonev,$row['email'],$row['jogosultsag']);
        header("Refresh:0");
        
   
        
    
}

?>