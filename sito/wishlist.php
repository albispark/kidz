<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ- Categoria";
$templateParams["nome"] = "gestisci-wishlist.php";
$templateParams["categorie"] = $dbh->getCategories();


$iduser = -1;
if(isset($_GET["id"])){
    $iduser = $_GET["id"];
}
$templateParams["prodotti"] = $dbh->getWishlistProducts($iduser);

require 'template/base.php';
?>