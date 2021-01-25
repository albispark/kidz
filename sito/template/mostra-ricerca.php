<section class="p-0 mb-2 mt-2">
    <div class="row p-3 m-0 justify-content-center smaller_text">
        <header>
             <h2>Risultati di ricerca per '<?php echo $nome?>'</h2>
        </header>
    </div>
</section>

<div class="row mt-md-2 mt-sm-0 mx-0 text-center align-items-center">
    <div class="col-md-1 col-0"></div>
        <div class="row col-md-10 col-12">
            <?php foreach($templateParams["lista"] as $prod): ?>

                <section class="col-md-3 col-6 border p-2 p-md-3">
                    <div class="product p-0 m-0 text-center px-1 my-2">
                        <img src="<?php echo UPLOAD_DIR.$prod["immagine"];?>" alt="<?php echo $prod["titolo"];?>">
                        <div class="overlay">
                            <a class="product_label rounded font-weight-normal" href="prodotto.php?id=<?php echo $prod["IDprodotto"];?>">Scopri di più</a>
                        </div>
                    </div>
                    <a class="smaller_text ricerca_a" href="prodotto.php?id=<?php echo $prod["IDprodotto"];?>">
                        <h2 class="font-weight-bold mb-2 mt-3"><?php echo $prod["titolo"];?></h2>
                        <h3 class="font-weight-light my-2"><?php echo $prod["prezzo"];?> €</h3>
                    </a>
                    <a class="btn btn-primary font-weight-normal my-2" <?php if(isUserLoggedIn()): ?>href="insertProd.php?type=carrello&idprod=<?php echo $prod["IDprodotto"];?>" <?php else: ?> href="login.php" <?php endif;?> role="button">Aggiungi al carrello</a>
                </section>
            <?php endforeach;?>
        </div>

<div class="col-md-1 col-0"></div>        
</div>