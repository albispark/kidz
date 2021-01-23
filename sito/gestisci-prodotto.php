<?php
require_once 'bootstrap-admin.php';

if($_GET["action"]!=1){
    $risultato = $dbh->getProductById($_GET["id"]);
    if(count($risultato)==0){
        $templateParams["prodotto"] = null;
    }
    else{
        $templateParams["prodotto"] = $risultato[0];
        $templateParams["catProd"] = $dbh->getProductSubCategories($_GET["id"]);
    }
}
else{
    $templateParams["prodotto"] = getEmptyArticle();
}



$templateParams["categorie"] = $dbh->getSubCategories();

$templateParams["titoloA"] = "Blog TW - Gestisci Articoli";
$templateParams["nomeA"] = "prodotto-form.php";

$templateParams["azione"] = $_GET["action"];

require 'template/base-admin.php';
?>