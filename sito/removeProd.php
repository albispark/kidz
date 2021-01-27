<?php 

require_once 'bootstrap.php';

$idprodotto  = -1;
if($_GET['type'] == "wishlist"){
    if(isset($_GET["idprod"])){
        $idprodotto = $_GET["idprod"];
    }
    $dbh->deleteFromWishlist($idprodotto, $_SESSION["IDuser"]);
    if(isset($_GET["where"])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
else if($_GET['type'] == "carrello"){
    if(isset($_GET["idprod"])){
        $idprodotto = $_GET["idprod"];
    }
    $dbh->deleteFromCart($idprodotto, $_SESSION["IDuser"]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>