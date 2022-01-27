<?php 

   include '../includes/funciones.php';
   include '../includes/config/database.php';

   
     $auth = isAuth();

     if(!$auth) {
         header('Location: ../index.php');
     }

   incluirTemplate('header_admin');
   $errores = [];
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        

        $TITULO_NOTICIA = filter_var($_POST['TITULO_NOTICIA'], FILTER_SANITIZE_STRING);
        $EXTRACTO_NOTICIA = filter_var($_POST['EXTRACTO_NOTICIA'], FILTER_SANITIZE_STRING);
        $IMAGEN_NOTICIA = $_FILES['IMAGEN_NOTICIA'];
        $IMAGEN_SMALL_NOTICIA = $_FILES['IMAGEN_SMALL_NOTICIA'];
        $CUERPO_NOTICIA = filter_var($_POST['CUERPO_NOTICIA'], FILTER_SANITIZE_STRING);
        $FECHA_NOTICIA = date('Y-m-d');

        if ( !$TITULO_NOTICIA ) {
            $errores[] = "Debes añadir un Titulo";
        }

        if ( !$EXTRACTO_NOTICIA ) {
            $errores[] = "Debes añadir un extracto";
        }
        if ( !$TITULO_NOTICIA ) {
            $errores[] = "Debes añadir un titulo";
        }
        if ( strlen($CUERPO_NOTICIA) < 200){
            $errores[] = "El cuerpo de la noticia debe tener al menos 50 caracteres";
        }

        if(!$IMAGEN_NOTICIA['name']){
            $errores[] = 'La imagen de la portada es obligatoria';
        }
        
        if(!$IMAGEN_SMALL_NOTICIA['name']){
            $errores[] = 'La imagen pequeña es obligatoria';
        }

        // TAMAÑO DE IMAGEN 160KB
        $medida = 10000*100;
        if( $IMAGEN_NOTICIA['size'] > $medida) {
            $errores[] = 'La imagen no puede ser mayor a 200KB';
        }

        if( $IMAGEN_SMALL_NOTICIA['size'] > $medida) {
            $errores[] = 'La imagen no puede ser mayor a 200KB';
        }
        $carpetaImagenes = '../imagenes/';
        if(!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        $imagenGrande = md5(uniqid ( rand(), true )) . ".jpg";
        move_uploaded_file($IMAGEN_NOTICIA['tmp_name'], $carpetaImagenes .$imagenGrande);

        $imagenPequeña = md5(uniqid ( rand(), true )) . ".jpg";
        move_uploaded_file($IMAGEN_SMALL_NOTICIA['tmp_name'], $carpetaImagenes . $imagenPequeña);

        $query = "INSERT INTO noticias (TITULO_NOTICIA, EXTRACTO_NOTICIA, IMAGEN_NOTICIA, IMAGEN_SMALL_NOTICIA, CUERPO_NOTICIA, FECHA_NOTICIA)";

        $query .= "VALUES ('$TITULO_NOTICIA','$EXTRACTO_NOTICIA', '$imagenGrande', '$imagenPequeña', '$CUERPO_NOTICIA', '$FECHA_NOTICIA');";


       

        if(empty($errores)){
            $resultado = mysqli_query( $db, $query );
            header('LOCATION: /admin?registro=creado');

        }
   }
?>

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
                <h4>Añadir Noticia</h4>
                <form method="POST" action="" class="formulario-añadir" enctype="multipart/form-data">
                       <div class="campos">
                        <div class="campo">
                            <label for="titulo">Titulo De la noticia</label>
                            <input value="<?php echo isset($TITULO_NOTICIA) ? $TITULO_NOTICIA : '';?>" type="text" name="TITULO_NOTICIA" id="TITULO_NOTICIA" placeholder="Titulo De la Noticia">
                        </div>
                        
                        <div class="campo">
                            <label for="copete">Copete De la noticia</label>
                            <input value="<?php echo isset($EXTRACTO_NOTICIA) ? $EXTRACTO_NOTICIA : '';?>" type="text" name="EXTRACTO_NOTICIA" id="EXTRACTO_NOTICIA" placeholder="Copete De la Noticia">
                        </div>
                        
                        <div class="campo">
                            <label for="imagen noticia">Imagen(Grande)</label>
                            <input type="file" name="IMAGEN_NOTICIA" id="IMAGEN_NOTICIA" accept="image/jpeg, image/png">
                        </div>
                        
                        <div class="campo">
                            <label for="imagen muestra">Imagen(Pequeña)</label>
                            <input type="file" name="IMAGEN_SMALL_NOTICIA" id="IMAGEN_SMALL_NOTICIA" accept="image/jpeg, image/png">
                        </div>
                        <div class="errores">
                            <?php  foreach($errores as $error):?>
                                <p class="alerta error"><?php echo $error;?></p>
                            <?php endforeach;?>
                        </div>

                       </div>
                       
                        
                        <div class="lateral-formulario">
                            <div class="campo">
                                <label for="contenido">Cuerpo De la noticia</label>
                                <textarea  name="CUERPO_NOTICIA" id="CUERPO_NOTICIA"><?php echo isset($CUERPO_NOTICIA) ? $CUERPO_NOTICIA : ''?></textarea>
                            </div>
                            
    
                            <input type="submit" value="Añadir noticia" class="btn success">
                        </div>
                </form>
            </section>
        </div>
</body>
</php>