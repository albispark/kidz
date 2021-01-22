<section class="row text-sm-center m-4">
    <div class="p-0 col-12 col-md-12 text-md-left">
        <div class="col-md-6 float-md-right mt-md-5">
            <h2 class="mb-3 fs-1 font-weight-bold"><?php echo $templateParams["prodotto"]["titolo"];?></h2>
            <p class="m-0"><?php echo $templateParams["prodotto"]["prezzo"];?> €</p>
        </div>
        <div class="p-5 col-md-5 float-md-left">
            <img  src="<?php echo UPLOAD_DIR.$templateParams["prodotto"]["immagine"];?>" alt="TODO">
        </div>
        <div class="col-md-6 float-md-right">     
            <hr class="mt-0"/>
            <p class="font-weight-bold">Dettagli prodotto</p>
            <p><?php echo $templateParams["prodotto"]["descrizione"];?></p>
            <hr/>
            <a class="btn btn-primary mb-4 btn-block" href="#" role="button">Aggiungi al carrello</a>
            <form action="insert.php?type=wishlist&idprod<?php echo $templateParams["prodotto"]["IDprodotto"]?>" method="POST">
            <a class="btn btn-ligth text-primary border b-1 border-primary btn-block" href="#" role="button" type="submit">Aggiungi alla wishlist</a>
            </form>
           
        </div>
    </div>
  </section>