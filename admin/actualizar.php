<?php 

    include '../includes/funciones.php';
     $auth = isAuth();

     if(!$auth) {
         header('Location: ../index.php');
     }

    $errores = [];
    include '../includes/config/database.php';
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('location: /admin');
        exit;
    }
    // CONSULTA DE LA DB SOBRE LA NOTICIA QUE VAMOS A ACTUALIZAR
    $query = "SELECT * FROM noticias WHERE ID_NOTICIA = {$id}";

    $resultado = mysqli_query($db, $query);

    $noticias = mysqli_fetch_assoc($resultado);
    // VARIABLES PROVENIENTES DE LA BASE DE DATOS
    $TITULO_NOTICIA = $noticias['TITULO_NOTICIA'];
    $EXTRACTO_NOTICIA = $noticias['EXTRACTO_NOTICIA'];
    $IMAGEN_NOTICIA_DB =$noticias['IMAGEN_NOTICIA'];
    $IMAGEN_SMALL_NOTICIA_DB =$noticias['IMAGEN_SMALL_NOTICIA'];
    $CUERPO_NOTICIA = $noticias['CUERPO_NOTICIA'];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $carpetaImagenes = '../imagenes/';
        // VALIDAR LAS VARIABLES Y SANITIZARLAS
         
        $TITULO_NOTICIA =mysqli_real_escape_string($db, $_POST['TITULO_NOTICIA']);
        $EXTRACTO_NOTICIA =mysqli_real_escape_string($db, $_POST['EXTRACTO_NOTICIA']);
        $CUERPO_NOTICIA =mysqli_real_escape_string($db, $_POST['CUERPO_NOTICIA']);


        $IMAGEN_NOTICIA = $_FILES['IMAGEN_NOTICIA'];
        $IMAGEN_SMALL_NOTICIA = $_FILES['IMAGEN_SMALL_NOTICIA'];

       


        if(!$TITULO_NOTICIA) {
            $errores[] = 'El titulo es obligatorio';
        }
        if(!$EXTRACTO_NOTICIA) {
            $errores[] = 'El extracto es obligatorio';
        }
        if(!$CUERPO_NOTICIA) {
            $errores[] = 'El cuerpo es obligatorio';
        }

        // TAMAÑO IMAGEN
        $medida = 1000 * 1000;

        // VALIDAR QUE AMBAS IMAGENES NO SEAN PESADAS
        if($IMAGEN_NOTICIA['size'] > $medida) {
            $errores[] = 'La imagen es muy Pesada';
        }

        if($IMAGEN_SMALL_NOTICIA['size'] > $medida) {
            $errores[] = 'La imagen es muy Pesada';
        }
        

        // VALIDAR SI NO HAY NUEVA IMAGEN
        if(!$IMAGEN_NOTICIA['name']){
            $IMAGEN_NOTICIA = $IMAGEN_NOTICIA_DB;
        }else {
            // ELIMINAR LA IMAGEN ANTERIOR DEL SERVIDOR
            unlink($carpetaImagenes . $IMAGEN_NOTICIA_DB);
            $imagen_grande = md5( uniqid( rand(), true ) ). '.jpg';
            move_uploaded_file($IMAGEN_NOTICIA['tmp_name'], $carpetaImagenes . $imagen_grande);
            $IMAGEN_NOTICIA = $imagen_grande;
        }
        // VALIDAR SI NO HAY NUEVA IMAGEN
        if(!$IMAGEN_SMALL_NOTICIA['name']){
            $IMAGEN_SMALL_NOTICIA = $IMAGEN_SMALL_NOTICIA_DB;
            
            
        }else {
            // ELIMINAR LA IMAGEN ANTERIOR DEL SERVIDOR
            unlink($carpetaImagenes . $IMAGEN_SMALL_NOTICIA_DB);
            $imagen_pequeña = md5( uniqid( rand(), true ) ) . '.jgp';
            move_uploaded_file($IMAGEN_SMALL_NOTICIA['tmp_name'], $carpetaImagenes . $imagen_pequeña);
            $IMAGEN_SMALL_NOTICIA = $imagen_pequeña;

        }
        

        // EN CASO DE QUE NO HAYAN ERRORES PASA LA VALIDACION
        if(empty($errores)) {
            $queryUpdate = "UPDATE noticias SET TITULO_NOTICIA = '${TITULO_NOTICIA}', EXTRACTO_NOTICIA = '${EXTRACTO_NOTICIA}',"; 
            $queryUpdate .= "IMAGEN_NOTICIA = '${IMAGEN_NOTICIA}', IMAGEN_SMALL_NOTICIA = '${IMAGEN_SMALL_NOTICIA}', ";
            $queryUpdate .= "CUERPO_NOTICIA = '${CUERPO_NOTICIA}' WHERE ID_NOTICIA = ${id};"; 
            
            $resultado = mysqli_query($db, $queryUpdate);

            if($resultado) {
                header('Location: /admin?registro=actualizado');
                exit;
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
    <link rel="stylesheet" href="/build/css/app.css" />
    <title>Dashboard | Handballbaires</title>
</head>
<body>
        <header class="header-dashboard">
            <a href="/" class="logo">
                <picture>
                    <source srcset="/build/img/logo-baires.avif" type="image/avif">
                    <source srcset="/build/img/logo-baires.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/logo-baires.webp" alt="" class="logotipo">
                </picture>
            </a>
            <div class="cerrar-sesion">
                <a href="login.php">Cerrar Sesión</a>
            </div>
        </header>

        <div class="contenedor-dashboard">

            <div class="menu-lateral">
                <h4>ADMIN</h4>
                <ul>
                    <li><a href="#">EQUIPOS</a></li>
                    <li><a href="index.php">NOTICIAS</a></li>
                    <li><a href="#">EVENTOS</a></li>
                    <li><a href="#">POSICIONES</a></li>
                </ul>
            </div>
            <section class="publicaciones">
                <h4>Actualizar Noticia</h4>
                <form action="#" class="formulario-añadir" method="POST" enctype="multipart/form-data">
                       <div class="campos">
                            <div class="campo">
                                <label for="titulo">Titulo De la noticia</label>
                                <input type="text" name="TITULO_NOTICIA" id="titulo" placeholder="Titulo De la Noticia" value="<?php echo $TITULO_NOTICIA;?>">
                            </div>
                            
                            <div class="campo">
                                <label for="copete">Copete De la noticia</label>
                                <input type="text" name="EXTRACTO_NOTICIA" id="copete" placeholder="Copete De la Noticia" value="<?php echo $EXTRACTO_NOTICIA;?>">
                            </div>
                            
                            <div class="campo">
                                <label for="imagen noticia">Imagen(Grande)</label>
                                <input type="file" name="IMAGEN_NOTICIA" accept="image/jpg, image/png">
                            </div>

                            <div class="campo">
                                <img src="/imagenes/<?php echo $IMAGEN_NOTICIA_DB;?>" alt="Imagen noticia" class="imagen-actualizar">
                            </div>
                            
                            <div class="campo">
                                <label for="imagen muestra">Imagen(Pequeña)</label>
                                <input type="file" name="IMAGEN_SMALL_NOTICIA" accept="image/jpg, image/png">
                            </div>

                            <div class="campo">
                                <img src="/imagenes/<?php echo $IMAGEN_SMALL_NOTICIA_DB;?>" alt="Imagen noticia" class="imagen-actualizar">
                            </div>

                       </div><!--.campos -->
                        
                        <div class="lateral-formulario">
                            <div class="campo">
                                <label for="contenido">Cuerpo De la noticia</label>
                                <textarea name="CUERPO_NOTICIA" id="contenido"><?php echo $CUERPO_NOTICIA;?></textarea>
                            </div>
    
                            <input type="submit" value="Actualizar noticia" class="btn success">
                            <div class="errores">
                                <?php  foreach($errores as $error):?>
                                    <p class="alerta error"><?php echo $error;?></p>
                                <?php endforeach;?>
                            </div>
                        </div><!--.lateral-formulario -->

                </form>
            </section>
        </div>
</body>
</php>