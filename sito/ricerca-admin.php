<?php
require_once 'bootstrap-admin.php';

//Base Template
$templateParams["titoloA"] = "KIDZ - Ricerca";

if(isAdminLoggedIn()){
    $templateParams["nomeA"] = "mostra-ricerca-admin.php";
} else {
    $templateParams["nomeA"] = "login-form-admin.php";
}

$id = -1;

if(isset($_GET["cerca"])){
    $id = $_GET["cerca"];
    $templateParams["prodotti"] = $dbh->getEventsAdminBySearch($id);
    $nome = $_GET["cerca"];
}

require 'template/base-admin.php';
?>