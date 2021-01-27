<?php 

require_once 'bootstrap.php';

$idprodotto  = -1;
if($_GET['type'] == "wishlist"){
    if(isset($_GET["idprod"])){
        $idprodotto = $_GET["idprod"];
    }
    $dbh->insertInWishlist($idprodotto, $_SESSION["IDuser"]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else if($_GET['type'] == "carrello"){
    if(isset($_GET["idprod"])){
        $idprodotto = $_GET["idprod"];
    }
    $dbh->insertInCart($idprodotto, $_SESSION["IDuser"]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>