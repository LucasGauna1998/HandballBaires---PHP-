<?php 


function conectarDB () :mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'handballbaires');


    if(!$db) {
        echo "La conexion no se pudo realziar";
        exit;
    }

    return $db;
}

$db = conectarDB();