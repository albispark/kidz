<?php
require_once 'bootstrap-admin.php';

if(isset($_POST["email"]) && isset($_POST["pwd"])){
    $templateParams["errorelogin"] = "";
    $user = $dbh->getUserByEmail($_POST["email"]);
    if(!empty($user)){
        $password = hash('sha512', $_POST["pwd"].$user["salt"]);
    }
    $login_result = $dbh->checkLoginAdmin($_POST["email"], $password);
    if(count($login_result)==0){
        $templateParams["errorelogin"] = "Errore! Username o password non corretti";
    }
    else{
         $templateParams["errorelogin"] = "";
        registerLoggedAdmin($login_result[0]);
    }
}
$_SESSION["typeSession"] = "admin";
if(isAdminLoggedIn()){
    $templateParams["titoloA"] = "KIDZ - AreaUtente";
    $templateParams["nomeA"] = "areautente-admin.php";
}
else{
    $templateParams["titoloA"] = "Blog TW - Login";
    $templateParams["nomeA"] = "login-form-admin.php";
}

require 'template/base-admin.php';
?>