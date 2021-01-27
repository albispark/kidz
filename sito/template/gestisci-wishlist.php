<!-- Wishlist label -->
<div class="row m-0 p-0">
    <div class="col-md-1 col-0"></div>
    <div class="text-left text-md-center col-12 m-0 p-0">
        <h2 class="mx-md-0 mx-3 mt-5 mb-3">Wishlist</h2>
    </div>
    <div class="col-md-1 col-0"></div>
</div>

<!-- PRODOTTI -->
<div class="row mt-1 mx-0 text-center align-items-center">
    <div class="col-md-1 col-0"></div>
    <div class="row col-md-10 col-12">
    <?php foreach($templateParams["prodotti"] as $prod): ?>
        <section class="d-flex flex-column justify-content-between col-md-3 col-6 border p-2 p-md-3">
            <div class="product mt-1">
                <img src="<?php echo UPLOAD_DIR.$prod["immagine"];?>" alt="<?php echo $prod["titolo"];?>">
                <div class="overlay">
                    <a class="product_label rounded font-weight-normal" href="prodotto.php?id=<?php echo $prod["IDprodotto"];?>">Scopri di più</a>
                </div>
            </div>
            <a class="smaller_text ricerca_a" href="prodotto.php?id=<?php echo $prod["IDprodotto"];?>">
                <h2 class="font-weight-bold mb-2 mt-3"><?php echo $prod["titolo"];?></h2>
                <h3 class="font-weight-light my-2"><?php echo $prod["prezzo"];?> €</h3>
            </a>
            <div>
                <a class="btn btn-primary font-weight-normal my-2" <?php if(isUserLoggedIn()): ?>href="insertProd.php?type=carrello&idprod=<?php echo $prod["IDprodotto"];?>" <?php else: ?> href="login.php" <?php endif;?> role="button">Aggiungi al carrello</a>
                <br/>
                <a class="btn border-danger text-danger font-weight-normal my-2" href="removeProd.php?type=wishlist&idprod=<?php echo $prod["IDprodotto"];?>" role="button">Rimuovi</a>
            </div>
        </section>
    <?php endforeach;?>
    </div>

    <div class="col-md-1 col-0"></div>

</div>

<!-- Button "Continua lo shopping" -->
<div class="row justify-content-center mt-5 mb-4">
    <a class="btn btn-primary font-weight-normal text-center" href="lista-prodotti.php" role="button">Continua lo shopping</a>
</div>