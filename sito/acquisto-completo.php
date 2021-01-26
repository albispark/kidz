<?php
    require_once 'bootstrap.php';

    $templateParams["titolo"] = "KIDZ- Grazie per l'acquisto";
    $templateParams["nome"] = "acquisto-completato.php";
    $templateParams["categorie"] = $dbh->getCategories();

    $_SESSION["notiftype"]=2;
    include("processa-notifiche.php");

    require 'template/base.php';
?>