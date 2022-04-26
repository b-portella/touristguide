<?php
if(isset($_GET['id'])){

    $latvanyossag_id = $_GET['id'];
}
$sql= "SELECT k.id as kep_id, k.kep, l.nev as latvanyossag_nev, l.leiras, l.gps_szelesseg, l.gps_hosszusag, l.cim, l.allapot, t.nev as telepules_nev FROM kepek as k
    INNER JOIN latvanyossagok as l ON k.latvanyossag_id = l.id
    INNER JOIN telepulesek as t ON l.telepules_id = t.id
    WHERE latvanyossag_id = $latvanyossag_id;
    ";
$eredmeny = $kapcs->Select($sql);

if (isset($_POST['modify'])) {
    $uj_nev=$_POST['nev'];
    $uj_cim=$_POST['cim'];
    $uj_gps_szelesseg=$_POST['gps_szelesseg'];
    $uj_gps_hosszusag=$_POST['gps_hosszusag'];
    $uj_leiras=$_POST['leiras'];

    $sql= "UPDATE latvanyossagok SET
            nev='$uj_nev', cim='$uj_cim',
            gps_szelesseg='$uj_gps_szelesseg',
            gps_hosszusag='$uj_gps_hosszusag',
            leiras='$uj_leiras' WHERE id ='$latvanyossag_id'";
    $update= $kapcs->Update($sql);
     
    ?> <script type="text/javascript">
        window.location.href = 'index.php?oldal=latvanyossagok_szerkesztese';
    alert("Sikeres frissítés.");
    </script>
    <?php
}
foreach ($eredmeny as $kepek => $kep) {
    $kep_id =$kep['kep_id'];
    $sql="SELECT kep FROM kepek WHERE id = '$kep_id'";
        $kep_nev=$kapcs->Select($sql);
    if (isset($_POST[$kep_id])){

        
        unlink("img/latvanyossagok/".$kep_nev[0]['kep']);
       

        $sql ="DELETE FROM kepek WHERE id = '$kep_id'";
        $delete=$kapcs->Delete($sql);
            ?><script>
          alert("Sikeres törlés!");
             location.reload();
        </script><?php
        
    }
        
}

?>