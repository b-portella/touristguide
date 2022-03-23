<?php

include "index.php";

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $torles= mysqli_query($connection,"DELETE FROM `felhasznalok` WHERE `id`='$id'");
    
    die();
}

$select="SELECT * FROM felhasznalok";
$query=mysqli_query($connection, $select);

?>
<div class="container">
    <table class="table table-hover mt-5 text-center">
        <thead>
            <th>Id</th>
            <th>Felhasználónév</th>
            <th>Email</th>
            <th>Jogosultság</th>
            <th>Módosítás</th>
            <th>Törlés</th>
        </thead>
        <tbody>
            <?php
                foreach ($eredmenyek as $row) {
                    echo "<tr>";           
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["felhasznalonev"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["jogosultsag"]."</td>";
                    echo '<td><input type="button" button class="btn btn-primary" name="update" value="Módosítás" function=update></td>';
                    echo '<td><input type="button" button class="btn btn-danger" name="delete" value="Törlés" action="torles"></td>';
                    "</tr>";
                }
            ?>
            
        </tbody>
    </table>
</div>