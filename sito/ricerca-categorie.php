<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ - Ricerca";
$templateParams["nome"] = "mostra-ricerca.php";
$templateParams["categorie"] = $dbh->getCategories();

$idcat = -1;
if(isset($_GET["id"])){
    $idcat = $_GET["id"];
}
$templateParams["lista"] = $dbh->getSearchById($idcat);
$nome = $_GET["nome"];

require 'template/base.php';
?>