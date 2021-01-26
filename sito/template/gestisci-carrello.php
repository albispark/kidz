<?php 
$somma = 0;
foreach($templateParams["numeroProdottiCarello"] as $prod){
  $somma = $somma + $prod["quantita"] * $prod["prezzo"];
}
$lprod = array();
?>

<div class="row py-3 m-0 justify-content-center d-sm-block d-md-none">
    <div class="2em">
      <h2 class="text-center m-2">Totale ordine: ..,.. €</h2>
      <a class="btn btn-primary my-2 btn-block" href="#" role="button">Procedi al pagamento</a>
    </div>
  </div>

  <div class="row p-1 m-3 justify-content-center">
    <header>
      <h2>Carrello</h2>
    </header>
  </div>

  <div class="row col-12 py-3 m-0 justify-content-center">
    <div class="col-sm-1"></div>
    <div class="row col-sm-10 col-md-12">
      
      <!-- Items -->
      <div class="col-sm-12 col-md-8">
        <?php foreach( $templateParams["prodotti"] as $prod): ?>
        <div class="row border-bottom">
          <div class="col-6 product p-0 m-0 text-center px-4 my-2">
            <img src="<?php echo UPLOAD_DIR.$prod["immagine"];?>" alt="<?php echo UPLOAD_DIR.$prod["titolo"];?>">
                <div class="overlay">
                <a class="product_label rounded font-weight-normal" href="prodotto.php?id=<?php echo $prod["IDprodotto"]; ?>">Scopri di più</a>
            </div>
          </div>
          <div class="col-6 p-0 m-0 px-4 smaller_text">
            <h3 class="my-3 font-weight-bold"><?php echo $prod["titolo"]; ?></h3>
            <p class="d-none d-md-block"><?php echo $prod["descrizione"]; ?></p>
            <footer class="text-right">
              <p><?php echo $prod["prezzo"]; ?>€</p>

              <!-- Quantity selector -->
              <?php $id =$prod['IDprodotto']; $p = $prod['prezzo'] ?>
              <button class="btn btn-primary btn-sm" onclick='meno("<?php echo $prod["prezzo"];?>","<?php echo $prod["IDprodotto"]; ?>")'>-</button>
              <?php $currentval = $prod["IDprodotto"];?>
              <span id="numero_<?php echo $prod["IDprodotto"]; ?>" class="mx-3">1</span>
              <button class="btn btn-primary btn-sm" id = "aggiungi" onclick='aggiungi("<?php echo $prod["prezzo"];?>","<?php echo $prod["IDprodotto"]; ?>")'>+</button>
              <a class="btn border-danger text-danger font-weight-normal my-2 ml-2" href="removeProd.php?type=carrello&idprod=<?php echo $prod["IDprodotto"];?>" role="button">Rimuovi</a>
            </footer>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Summary -->
      <div class="col-sm-12 my-5 col-md-4">
        <h3 class="m-0 p-3 border">Dettagli d'ordine</h3>
        <p class="m-0 p-3 border">Totale parziale: <span class="tot"><?php echo $somma?></span>.00€</p>
        <p class="m-0 p-3 border">Spedizione: GRATIS</p>
        <p class="m-0 p-3 border">TOTALE: <span class="tot"><?php echo $somma?></span>.00€</p>
        <a class="btn btn-primary rounded-0 mb-2 btn-block" href="acquisto-completo.php" role="button">Acquista</a>
      </div>

    </div>
    <div class="col-sm-1"></div>
  </div>


<script>

function meno(p,idp) {
    var res = "numero_".concat(idp);
    var somma = <?php echo json_encode($somma) ?>;
    let n = $('#' + res).text();
    if(parseInt(n)-1 >= 1){
        n = parseInt(n)-1;
        $('#' + res).text(n);
        somma = somma + (n*p);
        $(".tot").text(somma);
    }
}

function aggiungi(p,idp) {
  var res = "numero_".concat(idp);
  var somma = <?php echo json_encode($somma) ?>;
  let n = $('#' + res).text();
    if(parseInt(n)+1 <= 5){
        n = parseInt(n)+1;
        $('#' + res).text(n);
        somma = somma + (n*p);
        $(".tot").text(somma);
    }
}

</script>