<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ- Notifiche";
$templateParams["nome"] = "gestisci-messaggi.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotticasuali"] = $dbh->getRandomProduct(4);

$iduser = -1;
if(isUserLoggedIn()){
    $iduser = $_SESSION["IDuser"];
    $templateParams["notifiche"] = $dbh->getMessages($iduser);
}
else{
    $templateParams["notifiche"] = [];
}

$dbh->setMessagesRead($iduser);

require 'template/base-admin.php';
?>