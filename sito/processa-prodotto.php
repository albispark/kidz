<?php
require_once 'bootstrap-admin.php';

if($_POST["action"] == 1){

    //Inserisco
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
            array_push($categorie_inserite, $categoria);
        }
    }

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine_ins"]);
    if($result != 0){
        $imgarticolo = $msg;
        $dbh->insertProduct($idprod, $titolo, $descrizione, $prezzo, $quantita, $taglia, $sesso, $eta, $imgarticolo);
            foreach($categorie_inserite as $categoria){
                $ris = $dbh->insertCategoryOfProduct($idprod, $categoria["IDsottocategoria"]);
            }
        
    }
}

if($_POST["action"] == 2){
    
    $idprod = $_POST["IDprodotto"];
    $titolo = $_POST["titolo"];
    $descrizione = $_POST["descrizione"];
    $prezzo = $_POST["prezzo"];
    $quantita = $_POST["quantita_scorta"];
    $taglia = $_POST["taglia"];
    $sesso = $_POST["sesso"];
    $eta = $_POST["eta"];


    if($_FILES["immagine_ins"]["name"] != NULL){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine_ins"]);
        $imgarticolo =$msg;
        echo "cuapo";
    }
    else{
        $imgarticolo = $_POST["oldimg"];
    }

    $dbh->updateProduct($idprod, $titolo, $descrizione, $prezzo, $quantita, $taglia, $sesso, $eta, $imgarticolo);

    $categorie = $dbh->getSubCategories();
    $categorie_inserite = array();

    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["IDsottocategoria"]])){
            array_push($categorie_inserite, $categoria["IDsottocategoria"]);
        }
    }

    $categoriev = $dbh->getProductSubCategories($idprod);
    $categorievecchie = array();
    foreach($categoriev as $val){
        $categorievecchie[] = $val["IDsottocategoria"];
    }
    $categoriedaeliminare = array_diff($categorievecchie, $categorie_inserite);
    foreach($categoriedaeliminare as $categoria){
        $ris = $dbh->deleteCategoriesOfProduct($idprod);
    }

    $categoriedainserire = array_diff($categorie_inserite, $categorievecchie);
    foreach($categoriedainserire as $categoria){
        $ris = $dbh->insertCategoryOfProduct($idprod, $categoria);
    }
}

header("location: index-admin.php");

?>