<?php
    include 'utils/functions.php';

    session_start();
    sec_session_start();
    // Elimina tutti i valori della sessione.
    if(isset($_SESSION["typeSession"])){  
        $type = $_SESSION["typeSession"];
    }
    $_SESSION = array();
    // Recupera i parametri di sessione.
    $params = session_get_cookie_params();
    // Cancella i cookie attuali.
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    // Cancella la sessione.
    session_destroy();
    var_dump($type);
    if($type == "admin"){
        $type = "";
        header('Location: ./index-admin.php');
    } else{
        $type = "";
        header('Location: ./index.php');
    }
?>