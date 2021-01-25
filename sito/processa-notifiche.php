<?php
require_once 'bootstrap.php';

switch($_POST["type"]){
    case 1: 
        $dbh->notificaBenveuto($_SESSIONE["IDuser"]);
    break;
    default:
 }

header("location: index.php");

?>