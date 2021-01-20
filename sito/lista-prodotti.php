<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ- Prodotti";
$templateParams["nome"] = "mostra-ricerca.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["lista"] = $dbh->getAllProduct();
$nome = "...";
require 'template/base.php';
?>