<!-- Carousel-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block d-md-none" src="img/bambino.jpg" alt="TODO"/>
          <img class="d-none d-md-block" src="img/slider1.png" alt="TODO"/>
        </div>

        <div class="carousel-item">
            <img class="d-block d-md-none" src="img/photo59.jpg"  alt="TODO"/>
            <img class="d-none d-md-block" src="img/photo5974085735785018538.jpg" alt="TODO"/>
        </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
</div>

    <!-- Categories -->

    <div class="row p-0 img_width_90">
      <h2 class="mb-4 mt-5 col-12 col-md-12 text-center">L'acquisto giusto per i tuoi bimbi</h2>
      <section class="mb-5 col-12 col-md-4 text-center">
        <img src="img/tipa_natale.png" alt="bimba" >
        <h3 class="font-weight-normal my-1">Bimba</h3>
        <a class="text-primary text-uppercase font-weight-bolder" href="ricerca.php?idsesso=F&nome=Bimba">Vedi altro</a>
      </section>
      <section class="mb-5 col-12 col-md-4 text-center">
        <img src="img/tipo_natale.png" alt="bimbo" >
        <h3 class="font-weight-normal my-1">Bimbo</h3>
        <a class="text-primary text-uppercase font-weight-bolder" href="ricerca.php?idsesso=M&nome=Bimbo">Vedi altro</a>
      </section>
      <section class="mb-5 col-12 col-md-4 text-center">
        <img src="img/novita.png" alt="bimbo e bimba" >
        <h3 class="font-weight-normal my-1">Costumi</h3>
        <a class="text-primary text-uppercase font-weight-bolder" href="categorie.php?id=000000C">Vedi altro</a>
      </section>
    </div>

    <!-- Ghirigori -->

    <div class="row text-center d-none d-md-block mx-0 my-5 py-0 px-3">
      <img class="my-5" src="img/stitch.png"  alt="TODO"/>
    </div>

    <!-- Products -->

    <!-- Title -->
    <section class="pb-5">
      <div class="row py-3 justify-content-center">
        <header>
          <h2>I nostri prodotti</h2>
        </header>
      </div>

      <div class="row img_width_90">
        <div class="col-md-1"></div>
        <div class="row col-md-10 py-4">
            <?php foreach($templateParams["prodotticasuali"] as $prod): ?>
            
                <section class="d-flex flex-column justify-content-between smaller_text col-6 col-md-3 p-0 m-0 mb-4 text-center">
                    <img src="<?php echo UPLOAD_DIR.$prod["immagine"]?>"  alt="Prodotto <?php echo $prod["titolo"]?>">
                    <h3 class="font-weight-normal mt-3"><?php echo $prod["titolo"]?></h3>
                    <a class="text-primary text-uppercase font-weight-bolder" href="prodotto.php?id=<?php echo $prod["IDprodotto"]; ?>">Acquista ora</a>
                </section>
            <?php endforeach;?>
        </div>

        <div class="col-md-1"></div>
      </div>

      <div class="row py-3 justify-content-center">
        <a class="btn btn-primary" href="ricerca.php?idlista=1" role="button">Scopri di più</a>
      </div>

    </section>