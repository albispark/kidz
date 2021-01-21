<?php
require_once 'bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["pwd"])){
    $templateParams["errorelogin"] = "";
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["pwd"]);
    if(count($login_result)==0){
        $templateParams["errorelogin"] = "Errore! Username o password non corretti";
    }
    else{
         $templateParams["errorelogin"] = "";
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Blog TW - AreaUtente";
    $templateParams["nome"] = "areautente.php";
}
else{
    $templateParams["titolo"] = "Blog TW - Login";
    $templateParams["nome"] = "login-form.php";
}

$templateParams["categorie"] = $dbh->getCategories();



require 'template/base.php';
?>