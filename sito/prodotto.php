<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "KIDZ - Prodotto";
$templateParams["nome"] = "singolo-prodotto.php";
$templateParams["categorie"] = $dbh->getCategories();


$idprodotto = -1;
if(isset($_GET["id"])){
    $idprodotto = $_GET["id"];
}
$templateParams["prodotto"] = $dbh->getProductById($idprodotto)[0];
if(isUserLoggedIn()){
    $templateParams["check"] = $dbh->isInWishlist($_SESSION["IDuser"], $_GET["id"]);
}

require("template/base.php");

?>