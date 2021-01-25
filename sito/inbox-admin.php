<?php
require_once 'bootstrap-admin.php';

//Base Template
$templateParams["titoloA"] = "KIDZ - Notifiche";
$templateParams["nomeA"] = "gestisci-messaggi.php";

$idadmin = -1;
if(isAdminLoggedIn()){
    $idadmin = $_SESSION["IDadmin"];
    $templateParams["notifiche"] = $dbh->getMessages($idadmin);
}
else{
    $templateParams["notifiche"] = [];
}

$dbh->setMessagesRead($idadmin);

require 'template/base-admin.php';
?>