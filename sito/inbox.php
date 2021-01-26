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
    $templateParams["notifiche"] = $dbh->getReadMessages($iduser);
    $templateParams["notificheUnread"] = $dbh->getUnreadMessages($iduser);
}
else{
    $templateParams["notifiche"] = [];
    $templateParams["notificheUnread"] = [];
}

$dbh->setMessagesRead($iduser);

require 'template/base.php';
?>