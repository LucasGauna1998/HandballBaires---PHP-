<?php 
    include '../includes/config/database.php';
    include '../includes/funciones.php';

    $auth = isAuth();

    if(!$auth) {
        header('Location: ../index.php');
    }

    

    incluirTemplate('header_admin');
    

    $registro = $_GET['registro'] ?? null;

    $query = 'SELECT * FROM  noticias;';


    $noticias = mysqli_query( $db, $query );

    // Eliminar Registro

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $ID_NOTICIA = filter_var($_POST['id'], FILTER_VALIDATE_INT);

        //Eliminar imagenes del servidor

        $query = "SELECT IMAGEN_NOTICIA, IMAGEN_SMALL_NOTICIA FROM noticias WHERE ID_NOTICIA = ${ID_NOTICIA};";
    
        $consulta_imagenes = mysqli_query($db, $query);

        $imagenes = mysqli_fetch_assoc($consulta_imagenes);

        $imagen_grande = $imagenes['IMAGEN_NOTICIA'];

        $imagen_pequeña = $imagenes['IMAGEN_SMALL_NOTICIA'];

        unlink('../imagenes/' . $imagen_grande);
        unlink('../imagenes/' . $imagen_pequeña);
       

        //Eliminar registro de la DB    
        $queryDelete = "DELETE FROM noticias WHERE ID_NOTICIA = ${ID_NOTICIA};";

        $resultado = mysqli_query($db, $queryDelete);

        if($resultado){
            header('Location: /admin?registro=eliminado');
            
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
                <h4>Noticias Publicadas</h4>
                <?php if($registro === 'creado'):?>
                    <p class="exito alerta">Noticia Creada Exitosamente</p>
                <?php elseif($registro === 'actualizado'):?>
                    <p class="exito alerta">Noticia Actualizada Exitosamente</p>
                <?php endif;?>
                <?php if($registro === 'eliminado'):?>
                    <p class="alerta error">Noticia Eliminada Exitosamente</p>
                <?php endif;?>
                <a href="añadir.php" class="btn-añadir success">AÑADIR NOTICIA</a>
                <div class="noticias-panel">
                    <?php while($noticia = mysqli_fetch_assoc($noticias)):?>
                    <div class="noticia-panel"> 
                        <img src="/imagenes/<?php echo $noticia['IMAGEN_SMALL_NOTICIA'];?>" alt="imagen noticia">
                        <div class="informacion-noticia">
                            <h3 class="noticia-titulo"><?php echo $noticia['TITULO_NOTICIA'];?></h3>
   
                            <p class="noticia-extracto"><?php echo ($noticia['EXTRACTO_NOTICIA']);?></p>

                           <div class="crud-noticias">
                            <form action="#" method="POST">
                                <input type="hidden" name="id" value="<?php echo $noticia['ID_NOTICIA'];?>">
                                <input type="submit" class="btn  delete" value="ELIMINAR">
                            </form>
                            <a href="/admin/actualizar.php?id=<?php echo $noticia['ID_NOTICIA'];?>" class="btn warning">ACTUALIZAR</a>
                           </div>
                        </div>
                    </div><!--noticia-->
                    <?php endwhile;?>
                   
                    
                </div>
            </section>
        </div>
        <?php mysqli_close($db);?>
</body>
