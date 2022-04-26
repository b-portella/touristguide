<div class="d-flex ">
    <div class="container  ">
        <div class="welcome-massege mx-auto border border-success ">
        <h3>Képek</h3>
        </div>
    </div>
</div><br>

<div class="photo-gallery">
    <div class="container">
        <div class="row photos">
            <?php

            foreach ($result as $kepek) {
                   
            echo    '<div class="col-sm-6 col-md-4 col-lg-3 item"><a href="img/latvanyossagok/'.$kepek["kep_nev"].'" data-lightbox="photos"><img    class="img-fluid" src="img/latvanyossagok/'.$kepek["kep_nev"].'"></a></div>';
                
            }
               
            ?>
        </div>  
        <button class="btn float-end mb-3 " onclick="history.back()">Vissza</button>
     </div>
  </div><br>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>