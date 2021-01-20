<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ - Ricerca";
$templateParams["nome"] = "mostra-ricerca.php";
$templateParams["categorie"] = $dbh->getCategories();


$id = -1;

if(isset($_GET["idcat"])){
    $id = $_GET["idcat"];
    $templateParams["lista"] = $dbh->getSearchById($id);
    $nome = $_GET["nome"];
} else if (isset($_GET["idlista"])){
    $templateParams["lista"] = $dbh->getAllProduct();
    $nome = "...";
} else if(isset($_GET["idsesso"])){
    $id = $_GET["idsesso"];
    $templateParams["lista"] = $dbh->getGenderProduct($id);
    $nome = $_GET["nome"];
} else if(isset($_GET["cerca"])){
    $id = $_GET["cerca"];
    $templateParams["lista"] = $dbh->getEventsBySearch($id);
    $nome = $_GET["cerca"];
}

require 'template/base.php';
?>