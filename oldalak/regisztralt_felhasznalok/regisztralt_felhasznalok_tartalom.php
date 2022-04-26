<div class="container">
    <table class="table table-hover mt-5 text-center">
        <thead>
            <th>Id</th>
            <th>Felhasználónév</th>
            <th>Email</th>
            <th>Jogosultság</th>
            <th>Törölt?</th>
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
                    echo "<td>".$row["torolt"]."</td>";
                    echo "<td>";
                    echo '<button type="button" onclick="modify('.$row["id"].')" class="btn btn-success" name="delete'.$row['id'].'">';if($row["jogosultsag"] =="admin"){echo 'Módosítás felhasználóra';}else{echo 'Módosítás adminra';}
                    echo '</button>';
                    echo "</td>";
                    if($row['torolt']=='nem'){
                    echo "<td>";
                    echo '<button type="button" onclick="delete1('.$row["id"].')" class="btn btn-danger" name="delete'.$row['id'].'">Törlés</button>';
                    echo "</td>";}
                    if($row['torolt']=='igen'){
                        echo "<td>";
                        echo '<button type="button" onclick="undelete1('.$row["id"].')" class="btn btn-warning" name="undelete'.$row['id'].'">Visszavonás</button>';
                        echo "</td>";}
                    "</tr>";
                }
            ?>
            
        </tbody>
    </table>
</div>
<script>
     function delete1($id){
      $.ajax({
        type: "POST",
        url: "index.php?oldal=regisztralt_felhasznalok",
        data:  {
            id: $id,
            action: 'delete'
        } }).done(function(data) {
         alert( "Felhasználó törölve");
         location.reload();
        });
      
  }
  function undelete1($id){
      $.ajax({
        type: "POST",
        url: "index.php?oldal=regisztralt_felhasznalok",
        data:  {
            id: $id,
            action: 'undelete'
        } }).done(function(data) {
         alert( "Felhasználó törlése visszavonva");
         location.reload();
        });
      
  }

        function modify($id){
      $.ajax({
        type: "POST",
        url: "index.php?oldal=regisztralt_felhasznalok",
        data:  {
            id: $id,
            action: 'modify'
        } }).done(function(data) {
         alert( "Felhasználó jogosultság módosítva!");
         location.reload();
        });
      
  }
</script>