<?php
    require_once 'bootstrap.php';

    $templateParams["titolo"] = "KIDZ- Grazie per l'acquisto";
    $templateParams["nome"] = "acquisto-completato.php";
    $templateParams["categorie"] = $dbh->getCategories();

    $prodottiCarrello = $dbh->getCartProducts($_SESSION["IDuser"]);
    foreach($prodottiCarrello as $prod){
        $dbh->deleteProductFromCart($_SESSION["IDuser"],$prod["IDprodotto"]);
    }

    $_SESSION["notiftype"]=2;
    include("processa-notifiche.php");

    require 'template/base.php';
?>