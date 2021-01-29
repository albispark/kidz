<?php
require_once 'bootstrap-admin.php';

$_SESSION["typeSession"] = "admin";
$templateParams["titoloA"] = "KIDZ- Home Admin";
//Base Template
if(isAdminLoggedIn()){
    $templateParams["prodotti"] = $dbh->getAllProduct();
    $templateParams["nomeA"] = "home-admin.php";
} else {
    $templateParams["nomeA"] = "login-form-admin.php";
}

require 'template/base-admin.php';
?>