<?php 
            $prod = $templateParams["prodotto"]; 
            $azione = getAction($templateParams["azione"])
?>

<div class="row justify-content-center mt-3">
        <h2>Gestisci prodotto</h2>
    </div>
    <div class="row col-12 col-md-12 p-0 justify-content-center">
        <div class="col-1 col-md-3"></div>
        <div class="add_product col-10 col-md-6 p-4">
          <form action="processa-prodotto.php" class="was-validated insert" method="POST">
            <div class="form-group">
              <label for="cod">Codice:</label>
              <input type="text" class="form-control" placeholder="" name="IDprodotto" id="IDprodotto" value="<?php echo $prod["IDprodotto"]; ?>" required>
            </div>
            <div class="form-group">
              <label for="title">Titolo:</label>
              <input type="text" class="form-control" placeholder="" id="titolo" name="titolo"  value="<?php echo $prod["titolo"]; ?>"required>
            </div>
            <div class="form-group">
                <label for="descr">Descrizione:</label> <br>
                <textarea class="form-control" rows="5" id="descrizione" name="descrizione" value="<?php echo $prod["descrizione"]; ?>"required></textarea>
            </div>
            <div class="form-group">
                <label for="prezzo">Prezzo:</label>
                <input type="text" class="form-control" placeholder="" id="prezzo" name="prezzo"  value="<?php echo $prod["prezzo"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="qt">Quantità:</label>
                <input type="text" class="form-control" placeholder="" id="quantita_scorta" name="quantita_scorta"  value="<?php echo $prod["quantita_scorta"]; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="taglia">Taglia:</label>
                <input type="text" class="form-control" placeholder="" id="taglia" name="taglia"  value="<?php echo $prod["taglia"]; ?>"required>
            </div>

            <div class="form-group">
                <label for="eta">Età:</label>
                <input type="text" class="form-control" placeholder="" id="eta" name="eta"  value="<?php echo $prod["eta"]; ?>"required>
            </div>

            <div class="form-group">
              <label for="eta">Sesso (F-femmina, M-maschio, U-unisex):</label>
              <input type="text" class="form-control" placeholder="" id="sesso" name="sesso"  value="<?php echo $prod["sesso"]; ?>"required>
            </div>
                    
            <div class="form-check mb-2 p-0">
              <label>Categoria:</label>
              <?php foreach($templateParams["categorie"] as $categoria): ?>
                <div class="check_categoria">
                        <input class="mr-2" type="checkbox" id="<?php echo $categoria["IDcategoria"]; ?>" name="categoria_<?php echo $categoria["IDcategoria"]; ?>"/>
                        <label for="<?php echo $categoria["IDcategoria"]; ?>"><?php echo $categoria["nome"]; ?></label>
                        
                </div>
              <?php endforeach; ?>
            </div>

            <div class="form-group">
                <label for="immagine_ins">Immagine:</label>
                <?php if($templateParams["azione"] != 3): ?>
                    <input type="file" id="immagine_ins" name="immagine_ins" required/>
                <?php endif; ?>
                <?php if($templateParams["azione"]!=1): ?>
                    <img src="<?php echo UPLOAD_DIR.$prod["immagine"]; ?>" alt="" />
                <?php endif; ?>
            </div>

            <div class="dropdown-divider"></div>
            <div class="row justify-content-center">
              
              <button type="submit" class="btn btn-primary mr-3"><?php echo $azione?></button>
              <a class="btn btn-primary "href="index-admin.php">Annulla</a>
            </div>

            
            <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>" />
          </form>
        </div>
        <div class="col-1 col-md-3"></div>
    </div>
