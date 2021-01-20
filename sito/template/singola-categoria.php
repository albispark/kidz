

<h2 class="text-center text-left mt-3 mb-3 mx-3"><?php echo $templateParams["sottocategorie"][0]["nomec"]; ?></h2>

<div class="row col-12 justify-content-center text-white mt-md-3 mb-md-5 mx-0 p-0">
    <div class="col-md-3 p-0 m-0"></div>
    <div class="col-md-6 col-sm-12">
            <?php foreach($templateParams["sottocategorie"] as $sub): ?>
                <a class="cat_a"  href="ricerca-categorie.php?id=<?php echo $sub["IDsottocategoria"];?>&nome=<?php echo $sub["nomesubc"]?>">
                    <div class="col-12 d-flex justify-content-center font-weight-bold m-0 p-4 border cat">
                        
                            <?php echo $sub["nomesubc"]?>
                        
                    </div>
            </a>
            <?php endforeach; ?>
    </div>
    <div class="col-md-3 p-0 m-0 "></div>
</div>
   
