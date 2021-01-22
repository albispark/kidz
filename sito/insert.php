<?php 

if($_POST['type'] == "wishlist"){
    if(isset($_GET["id"])){
        $idprodotto = $_POST["id"];
    }
    $dbh->insertInWishlist($idprodotto, $_SESSION["IDuser"]);
}

?>