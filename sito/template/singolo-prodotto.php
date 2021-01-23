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
            <a class="btn btn-primary mb-4 btn-block" <?php if(isUserLoggedIn()): ?>href="insertProd.php?type=cart&idprod=<?php echo $templateParams["prodotto"]["IDprodotto"];?>" <?php else: ?> href="login.php" <?php endif;?> role="button">Aggiungi al carrello</a>
            <?php if(!empty($templateParams["check"])): ?>
                <a class="btn border-danger text-danger font-weight-normal my-2 btn-block" href="removeProd.php?type=wishlist&where=singprod&idprod=<?php echo $templateParams["prodotto"]["IDprodotto"];?>" role="button">Rimuovi dalla wishlist</a>
            <?php else: ?>
                <form <?php if(isUserLoggedIn()): ?>action="insertProd.php?type=wishlist&idprod=<?php echo $templateParams["prodotto"]["IDprodotto"];?>" <?php else: ?> action="login.php" <?php endif;?>method="POST">
                <button class="btn btn-ligth text-primary border b-1 border-primary btn-block" type="submit">Aggiungi alla wishlist</button>
                </form>
            <?php endif; ?>
           
        </div>
    </div>
  </section>