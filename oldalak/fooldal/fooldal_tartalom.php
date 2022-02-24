<div class="d-flex">
    <div class="container ">
        <div class="welcome-massege mx-auto border border-success">
                <h3>Üdvözlünk a TouristGuide oldalán! </h3>
        </div>
    </div>
</div><br>

<div class="welcome-background">
<div class="container-fluid">
  
<!-- Carousel -->
<div id="demo" class="carousel slide slider-size mx-auto mb-5" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
 <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">

  <?php echo $slider_html; ?>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</div>
</div>
</div>