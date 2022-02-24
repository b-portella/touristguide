<div class="d-flex">
    <div class="container ">
        <div class="welcome-massege mx-auto border border-success">
                <h3>Kapcsolat </h3>
        </div>
    </div>
</div><br>

<?php echo $alert; ?>

<div class="container form">
            
            <form data-attr="kapcs-form" method="post">
            
                <h3>Üzenj nekünk!</h3>
               <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <input type="text" name="txtVezNev" class="form-control" placeholder="Vezetéknév *" value="" required/>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="txtKerNev" class="form-control" placeholder="Keresztnév *" value="" required />
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" name="txtEmail" class="form-control" placeholder="Email *" value="" required/>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <textarea name="txtMsg" class="form-control" placeholder="Üzeneted *" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-groupmt mt-3">
                    <input type="submit" name="btnSubmit" class="btn btn-outline-dark" value="Küldés" />
                </div>
            </form>
</div>