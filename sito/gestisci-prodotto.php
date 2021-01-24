<?php
require_once 'bootstrap-admin.php';

if($_GET["action"] == 2){
    $risultato = $dbh->getProductById($_GET["id"]);
    if(count($risultato)==0){
        $templateParams["prodotto"] = null;
    }
    else{
        $templateParams["prodotto"] = $risultato[0];
        $templateParams["catProd"] = $dbh->getProductSubCategories($_GET["id"]);
        $categorievecchie = array();
        foreach($templateParams["catProd"] as $val){
            $categorievecchie[] = $val["IDsottocategoria"];
        }
    }
}

if($_GET["action"] == 1){
    $templateParams["prodotto"] = getEmptyArticle();
}

if($_GET["action"]==3){
    $idprod = $_GET["id"];
    $dbh->deleteCategoriesOfProduct($idprod);
    $dbh->deleteProduct($idprod);
    header("location: index-admin.php");
}


$templateParams["categorie"] = $dbh->getSubCategories();
$templateParams["titoloA"] = "KIDZ - Gestisci Articoli";
$templateParams["nomeA"] = "prodotto-form.php";

$templateParams["azione"] = $_GET["action"];

require 'template/base-admin.php';
?>