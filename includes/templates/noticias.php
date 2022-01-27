<?php 


    //CONEXION PROVIENE DESDE INDEX.PHP
    
    //Consulta
    $queryNoticias = "SELECT * FROM noticias LIMIT ${limite};";
    //Consulta a la DB
    $resultado = mysqli_query($db, $queryNoticias);


?>
            <div class="grid-noticias">
                    <?php while( $noticia = mysqli_fetch_assoc($resultado) ):?>
                    <article class="noticia"> 
                        <a href="noticias.php?id=<?php echo $noticia['ID_NOTICIA'];?>">
                            <img loading="lazy" src="imagenes/<?php echo $noticia['IMAGEN_SMALL_NOTICIA'];?>" class="noticia-img"  alt="imagen noticia">
                            <p class="titulo-noticia"><?php echo $noticia['TITULO_NOTICIA'];?></p>
                        </a>
                    </article><!--.noticia-->
                    <?php endwhile;?>

                </div><!--.grid-noticias-->