<?php
    //datos cliente
    $cliente = "handaballbaires@gmail.com";
    $subject = "Archivos adjuntos";


    //Correo de  
    $from = stripslashes($_POST['nombre']  ." ". $_POST['apellido']);
 

    // Caputrar los datos enviados por POST desde el formulario del usuario
    $email = $_REQUEST['email'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $telefono = $_REQUEST['telefono'];
    $nombre_equipo = $_REQUEST['nombre_equipo'];
  
    //Obtener los datos el archivo subido
    $archivo_excel = $_FILES['lista_fe'];
    $name_excel = $archivo_excel['name'];
    $archivo_size = $archivo_excel['size'];

    //Cuerpo del mensajes
    $message = "Nombre Completo: " . $nombre . " " . $apellido . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Telefono: " . $telefono . "\n";
    $message .= "Nombre del Equipo: " . $nombre_equipo;

    //Encabezado del mensaje
    $header = "From: ${from}";

    mail($cliente, $subject, $message, $header);
    


   
    //LEER el archivo y codificar el contenido para armar el cuerpo del email
    // $handle = fopen($archivo_excel, "r");
    // $content = fread($handle, $archivo_size);

    // fclose($handle);




?>