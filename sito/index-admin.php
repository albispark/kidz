<?php
require_once 'bootstrap-admin.php';

$templateParams["typeSession"] = "admin";
$templateParams["titoloA"] = "KIDZ- Home Admin";
//Base Template
if(isAdminLoggedIn()){
    $templateParams["nomeA"] = "home-admin.php";
} else {
    $templateParams["nomeA"] = "login-form-admin.php";
}
require 'template/base-admin.php';
?>