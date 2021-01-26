<?php
require_once 'bootstrap-admin.php';

//Base Template
$templateParams["titoloA"] = "KIDZ - Notifiche";
$templateParams["nomeA"] = "gestisci-messaggi.php";

$idadmin = -1;
if(isAdminLoggedIn()){
    $idadmin = $_SESSION["IDadmin"];
    $templateParams["notifiche"] = $dbh->getReadMessages($idadmin);
    $templateParams["notificheUnread"] = $dbh->getUnreadMessages($idadmin);
}
else{
    $templateParams["notifiche"] = [];
    $templateParams["notificheUnread"] = [];
}

$dbh->setMessagesRead($idadmin);

require 'template/base-admin.php';
?>