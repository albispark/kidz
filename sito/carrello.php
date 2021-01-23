<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ - Carrello";
$templateParams["nome"] = "gestisci-carrello.php";
$templateParams["categorie"] = $dbh->getCategories();


$iduser = -1;
if(isset($_GET["id"])){
    $iduser = $_GET["id"];
}
$templateParams["prodotti"] = $dbh->getCartProducts($iduser);

require 'template/base.php';

?>