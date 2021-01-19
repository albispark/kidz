<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ- Home";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotticasuali"] = $dbh->getRandomProduct(4);
//Home Template
//$templateParams["articoli"] = $dbh->getPosts(2);

require 'template/base.php';
?>