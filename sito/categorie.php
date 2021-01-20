<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ- Categoria";
$templateParams["nome"] = "singola-categoria.php";
$templateParams["categorie"] = $dbh->getCategories();


$idcategoria = -1;
if(isset($_GET["id"])){
    $idcategoria = $_GET["id"];
}
$templateParams["sottocategorie"] = $dbh->getSubCategories($idcategoria);

require 'template/base.php';
?>