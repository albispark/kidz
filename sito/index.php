<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "KIDZ- Home";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotticasuali"] = $dbh->getRandomProduct(4);
$iduser = -1;
if(isset($_SESSION["IDuser"])){
    $iduser = $_SESSION["IDuser"];
    $templateParams["notifiche"] = $dbh->getMessages($iduser);
}
$templateParams["notifiche"] = [];
/*$templateParams["notifiche"] = array('titolo' => 'Nessuna notifica', 'messaggio' => '');*/



//Home Template
//$templateParams["articoli"] = $dbh->getPosts(2);

require 'template/base.php';
?>