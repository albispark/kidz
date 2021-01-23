<?php
require_once 'bootstrap-admin.php';

    //Inserisco
    var_dump($_POST["IDprodotto"]);
    $idprod = $_POST["IDprodotto"];
    $titolo = $_POST["titolo"];
    $descrizione = $_POST["descrizione"];
    $prezzo = $_POST["prezzo"];
    $quantita = $_POST["quantita_scorta"];
    $taglia = $_POST["taglia"];
    $sesso = $_POST["sesso"];
    $eta = $_POST["eta"];
    $categorie = $dbh->getSubCategories();
    $categorie_inserite = array();

    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["IDsottocategoria"]])){
            array_push($categorie_inserite, $categoria["IDsottocategoria"]);
        }
    }

    //list($result, $msg) = uploadImage(UPLOAD_DIR, $_POST["immagine_ins"]);
    $result = 1;
    if($result != 0){
        $imgarticolo = $_POST["immagine_ins"];
        $dbh->insertProduct($idprod, $titolo, $descrizione, $prezzo, $quantita, $taglia, $sesso, $eta, $imgarticolo);
            foreach($categorie_inserite as $categoria){
                $ris = $dbh->insertCategoryOfProduct($idprod, $categoria["IDsottocategoria"]);
            }
            $msg = "Inserimento completato correttamente!";
 
            $msg = "Errore in inserimento!";
        
    }
    //header("location: index-admin.php");


?>