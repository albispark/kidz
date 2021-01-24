<section class="p-0 mb-2 mt-2">
</section>

<div class="row mb-4 mt-3 mx-0 px-0 text-center align-items-center">
<div class="col-md-1 col-0"></div>
    <!-- Search bar -->
    <div class="row col-md-10 col-12">
        <label class="label_search_bar" for="cerca_d">Cerca</label>
        <form class="w-100 d-inline" action="ricerca.php" method="GET">
        <input class="form-control rounded-pill py-0 border" type="search" id="cerca_d" placeholder="Cerca" aria-label="Cerca" name="cerca"/>
        </form>
    </div>
    <div class="col-md-1 col-0"></div>
</div>
<div class="row p-0 justify-content-center">
    <a class="btn btn-primary btn-lg font-weight-normal my-2" href="gestisci-prodotto.php?action=1" role="button">Inserisci prodotto</a>
</div>
<div class="row mt-md-2 mt-sm-0 mx-0 text-center align-items-center">
    <div class="col-md-1 col-0"></div>
        <div class="row col-md-10 col-12">
            <?php foreach($templateParams["lista"] as $prod): ?>

                <section class="col-md-3 col-6 border p-2 p-md-3">
                    <div class="product p-0 m-0 text-center px-1 my-2">
                        <img src="<?php echo UPLOAD_DIR.$prod["immagine"];?>" alt="<?php echo $prod["titolo"];?>">
                    </div>
                        <h2 class="font-weight-bold mb-2 mt-3"><?php echo $prod["titolo"];?></h2>
                        <h3 class="font-weight-light my-2"><?php echo $prod["prezzo"];?> €</h3>
                    </a>
                    <a class="btn btn-secondary font-weight-normal my-2" href="gestisci-prodotto.php?id=<?php echo $prod["IDprodotto"];?>&action=2" role="button">Modifica</a>
                    <a class="btn border-danger text-danger font-weight-normal my-2" href="gestisci-prodotto.php?id=<?php echo $prod["IDprodotto"];?>&action=3" role="button">Rimuovi</a>
                </section>
            <?php endforeach;?>
        </div>
    <div class="col-md-1 col-0"></div>        
</div>