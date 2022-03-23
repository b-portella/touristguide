<div class="d-flex">
    <div class="container ">
        <div class="welcome-massege mx-auto border border-success">
                <h3>Beküldött Látványosságok </h3>
        </div>
    </div>
</div><br>
    <?php
            echo '<div class="row">';
            foreach ($osszes_lekerdezese as $row) {
                echo '
                <div class="container col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card h-100 background" style="color:white;">
                                <div class="card-header"><h4>'. $row['nev'].'</h4>
                                </div>
                            <div class="card-body d-flex flex-column">

                                <div id="collapse'.$row['id'].'" class="collapse"><br>
                                    <div class="container" id="collapsebg">'. $row['leiras'].'</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button  class="btn float-start" data-bs-toggle="collapse" data-bs-target="#collapse'.$row['id'].'">Leírás</button>
                                <button  onclick="myAjax('.$row['id'].')" id="delete-button" class="btn float-end deletebtn" name="delete'.$row['id'].'"><i class="bi bi-trash"></i></button>
                                <button type="submit" id="check-button" class="btn float-end checkbtn"  name="accept'.$row['id'].'"><i class="bi bi-check-lg"></i></button>
                            </div>
                        </div>
                </div>
                
                ';
            }
            echo '</div>';  
    ?>
    <script>

function myAjax(id) {
      $.ajax({
           type: "POST",
           url: 'latvanyossagok_szerkesztese/admin.php',
           data:{action:'call_this'},
           success:function(html) {
             alert(html);
           }

      });
 }
    

    </script>


