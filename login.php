<?php 
    //IMPORTAR CONEXIÓN
    include 'includes/config/database.php';

    $errores = [];
    
    //VALIDAR QUE LOS DATOS
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //SANITIZAR LOS DATOS DEL USUARIO
        $email = mysqli_real_escape_string( $db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string($db, filter_var($_POST['password'], FILTER_SANITIZE_STRING));

        if(!$email){
            $errores[] = 'El email es obligatorio';
        }

        if(strlen($password) < 8){
            $errores[] = 'La contraseña debe tener al menos 8 caracteres';
        }

      
        //CONSULTAR DB EN CASO DE 0 ERRORES

        if(empty($errores)) {

            $query_usuario = "SELECT * FROM usuarios WHERE email = '${email}';";
        
            $resultado = mysqli_query($db, $query_usuario);


            


            if($resultado->num_rows){
                $usuario = mysqli_fetch_assoc($resultado);

                //VALIDAR PASSWORD
                $auth = password_verify($password, $usuario['password']);

                if($auth){
                    //Login Correcto
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['login'] = true;

                    header('Location: /admin');

                }else {
                    //Contraseña Invalida
                    $errores[] = 'El password es incorrecto';
                }

            }else {
                $errores[] = 'El usuario no existe';
            }
        }

    }

    
    
?>

<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | HandballBaires</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <div class="contenido-login">
        <div class="formulario-login">
            <form method="POST">
                <div class="errores">
                    <?php foreach($errores as $error):?>
                        <p class="alerta error"><?php echo $error;?></p>
                    <?php endforeach;?>
                </div>
                <picture>
                    <source srcset="/build/img/logo-baires.avif" type="image/avif">
                    <source srcset="/build/img/logo-baires.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/logo-baires.webp" alt="" class="logotipo">
                </picture>

                <h4>iniciar  Sesion</h4>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : '';?>"required>

                <label for="contraseña">contraseña</label>
                <input type="password" id="contraseña" name="password" placeholder="Contraseña" required>

                <input  class="btn success" type="submit" value="INCIAR SESIÓN">
            </form>
        </div>
    </div>
</body>
</php>