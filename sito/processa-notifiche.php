<?php
require_once 'bootstrap.php';

switch($_SESSION["notiftype"]){
    //manda notifica di benvenuto
    case 1: 
        $dbh->notificaBenveuto($_SESSION["IDuser"]);
        header("location: index.php");
    break;
    //notifica di acquisto prodotti
    case 2:
        $codice = substr(strval(uniqid(mt_rand(1, mt_getrandmax()))), 0, 7);
        $date = getdate();
        $msg = $date["mday"].'-'.$date["mon"].'-'.$date["year"].': L ordine #'.$codice.' è stato effettuato. Stiamo preparando la spedizione.';
        $dbh->creaNotificaAcquisto($codice, $msg);
        $dbh->notificaAcquisto($_SESSION["IDuser"], $codice);
    break;
    default:
 }

?>