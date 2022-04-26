<form name="frm01" action=" " method="post">

<div class="row">
    <div class="d-flex">
      <div class ="col">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="felhasznalonev" placeholder="Lista neve" name="utiterv_nev" required>
            <label for="felhasznalonev">Lista neve</label>
        </div>
      </div>
    <div class=" mb-3 mt-3">
        <div class ="col">
            <button type="submit" class="btn ms-5 me-3 pt-3 pb-3" name="lista_letrehozas">Lista létrehozása</button>
        </div>
    </div>
    </div>
  </div>
</form> 
<div class="container">
  <?php
  
    foreach ($lista_result as $listak) {
  echo "<div class='background'>
  <button class='btn deletebtn float-start' title='Törlés' onclick='Torol(". $listak['id']." )'><i class='bi bi-trash'></i></button>";
      echo "<h2>".$listak['nev']."</h2>"
    
  ?>
    <table class="table table-hover mt-5 text-center">
        <thead>
          <th></th>
          <th></th>
          <th>Látványosság megnevezése</th>
          <th>Cím</th>
          <th>Koordináták</th>
          <th>Sorrend</th>
        </thead>
        <tbody>
             <?php
                $sql= "SELECT l.nev, l.cim,l.gps_szelesseg, l.gps_hosszusag,u.id, u.sorrend
                FROM utiterv_elemei as u
                INNER JOIN latvanyossagok as l ON latvanyossag_id = l.id
                WHERE u.utiterv_id =".$listak['id']."
                ORDER BY sorrend ASC";
                $result=$kapcs->Select($sql);
                foreach ($result as $row) {
                    echo "<tr>";  
                    echo "<td><button class='btn modifybtn' onclick=Lefele(".$listak['id'].",".$row["sorrend"].")><i class='bi bi-caret-down-square'></i></button></td>";
                    echo "<td><button class='btn modifybtn' onclick=Felfele(".$listak['id'].",".$row["sorrend"].")><i class='bi bi-caret-up-square'></i></button></td>";         
                    echo "<td>".$row["nev"]."</td>";
                    echo "<td>".$row["cim"]."</td>";
                    echo "<td>".$row["gps_szelesseg"]." ".$row["gps_hosszusag"]."</td>";
                    echo "<td>".$row["sorrend"]."</td>";
                   "</tr>";
                }
            ?> 
            
        </tbody>
    </table>
    
  </div><br>
    <?php
    }
  ?>
</div>
<script>
   function Lefele($lista_id, $sorszam){
    $.ajax({
        type: "POST",
        url: "index.php?oldal=tervezeseim",
        data:  {
          lista_id: $lista_id,
            sorszam: $sorszam,
            hova: "le"
        }
     })
     .done(function() {
         location.reload();
        });
   }

   function Felfele($lista_id, $sorszam){
    $.ajax({
        type: "POST",
        url: "index.php?oldal=tervezeseim",
        data:  {
            lista_id: $lista_id,
            sorszam: $sorszam,
            hova:"fel"
        }
     })
     .done(function() {
         location.reload();
        });
   }

   function Torol($id){
   let conf = confirm("Biztosan törlöd?")
   if (conf) {

    $.ajax({
        type: "POST",
        url: "index.php?oldal=tervezeseim",
        data:  {
            torol_id: $id,
        }
     }).done(function() {
         location.reload();
         alert('Sikeres törlés');
        });
      }
    }
 </script>
