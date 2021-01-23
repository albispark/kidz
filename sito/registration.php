<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "KIDZ - Registrazione";
$templateParams["nome"] = "registration-form.php";
$templateParams["categorie"] = $dbh->getCategories();

if(isset($_POST["email"]) && isset($_POST["psw"])){
      // Recupero la password criptata dal form di inserimento.
      $password = $_POST['psw'];
      $email = $_POST['email'];
      
      if(!empty($dbh->getUserByEmail($email))) {
         $templateParams["failure"] = 'La registrazione non è andata a buon fine. Esiste già un account con questa email';
      } else {
         if(strlen($_POST["psw"])>=8) {
            /*// Crea una chiave casuale
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            // Crea una password usando la chiave appena creata.
            $password = hash('sha512', $password.$random_salt);*/
            //inserisco utente nel db
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $codice = substr(strval(uniqid(mt_rand(1, mt_getrandmax()))), 0, 7);
            $result = $dbh->insertUser($codice, $nome, $cognome, $email, $password);
            if($result) {
                $login_result = $dbh->checkLogin($_POST["email"], $_POST["psw"]); 
                registerLoggedUser($login_result[0]);
                header('Location: ./');
            } else {
               $templateParams["failure"] = "La registrazione non è andata a buon fine.";
            }
         } else {
            $templateParams["failure"] = "Registrazione fallita. La password deve essere di almeno 8 caratteri";
         }
      }
}

require 'template/base.php';
?>