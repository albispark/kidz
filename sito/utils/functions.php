<?php

function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn(){
    return !empty($_SESSION['IDuser']);
}


function isAdminLoggedIn(){
    return !empty($_SESSION['IDadmin']);
}


function registerLoggedAdmin($user){
    $_SESSION["IDadmin"] = $user["IDuser"];
    $_SESSION["emailA"] = $user["email"];
    $_SESSION["nomeA"] = $user["nome"];
}


function registerLoggedUser($user){
    $_SESSION["IDuser"] = $user["IDuser"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
}


function sec_session_start() {
    $session_name = 'sec_session_id'; // Imposta un nome di sessione
    $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
    $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
    ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
    $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
    session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
    session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
}

?>