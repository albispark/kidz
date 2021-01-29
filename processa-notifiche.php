<?php
require_once 'bootstrap.php';

switch($_SESSION["notiftype"]){
    //manda notifica di benvenuto
    case 1: 
        //NOTIFICA A UTENTE
        $dbh->notificaBenveuto($_SESSION["IDuser"]);

        //NOTIFICA AD ADMIN
        
        $codice = substr(strval(uniqid(mt_rand(1, mt_getrandmax()))), 0, 7);
        $u = count($dbh->getNumberOfSubscriber());
        $msg = 'Un nuovo utente si è iscritto al sito. Gli utenti totali sono: '.strval($u);
        $dbh->creaNotificaIscritti($codice,$msg);
        $admin = $dbh->getAdmin();
        foreach($admin as $a){
            $dbh->notificaAcquisto($a["IDuser"],$codice);
        }
        header("location: index.php");
    break;
    //notifica di acquisto prodotti
    case 2:
        //NOTIFICA A UTENTE
        $codice = substr(strval(uniqid(mt_rand(1, mt_getrandmax()))), 0, 7);
        $date = getdate();
        $msg = $date["mday"].'-'.$date["mon"].'-'.$date["year"].': L ordine #'.$codice.' è stato effettuato. Stiamo preparando la spedizione.';
        $dbh->creaNotificaAcquisto($codice, $msg);
        $dbh->notificaAcquisto($_SESSION["IDuser"], $codice);

        //NOTIFICA AD ADMIN
        $codice2 = substr(strval(uniqid(mt_rand(1, mt_getrandmax()))), 0, 7);
        $msg2 = "L'utente ".$_SESSION["IDuser"]." ha effettuato un acquisto in data ".$date["mday"].'-'.$date["mon"].'-'.$date["year"];
        $dbh->creaNotificaAcquisto($codice2, $msg2);
         $admin = $dbh->getAdmin();
        foreach($admin as $a){
            $dbh->notificaAcquisto($a["IDuser"],$codice2);
        }
    break;
    default:
 }

?>