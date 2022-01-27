<?php 

include 'app.php';

function incluirTemplate ( $nombre ) {
    
    include TEMPLATE_URL  . "/{$nombre}.php";

}



function isAuth( ) : bool {

    session_start();
    $auth = $_SESSION['login'];
    
    if ($auth) {
        return true;
    }
    return false;
}