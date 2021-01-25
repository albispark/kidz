<?php
    require_once 'bootstrap.php';

    $templateParams["titolo"] = "KIDZ- Grazie per l'acquisto";
    $templateParams["nome"] = "acquisto-completato.php";
    $templateParams["categorie"] = $dbh->getCategories();

    require 'template/base.php';
?>