<?php 

require_once 'bootstrap.php';

$idprodotto  = -1;
if($_GET['type'] == "wishlist"){
    if(isset($_GET["idprod"])){
        $idprodotto = $_GET["idprod"];
    }
    $dbh->deleteFromWishlist($idprodotto, $_SESSION["IDuser"]);
    if(isset($_GET["where"])){
       header('Location: ./prodotto.php?id='.$_GET["idprod"]);
    } else {
        header('Location: ./wishlist.php?id='.$_SESSION["IDuser"]);
    }
}
else if($_GET['type'] == "carrello"){
    if(isset($_GET["idprod"])){
        $idprodotto = $_GET["idprod"];
    }
    $dbh->deleteFromCart($idprodotto, $_SESSION["IDuser"]);
    header('Location: ./carrello.php?id='.$_SESSION["IDuser"]);
}

?>