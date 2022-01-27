<?php 
    include 'includes/templates/header.php';
    include 'includes/config/database.php';
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        //VALIDAR QUE EL ID SEA VALIDO
        if (isset($_GET['id'])) {

            $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

            if(!$id) {

                //REDIRECCIONAR ID INVALIDO
                header('Location: index.php');
            }
            

            $query_noticia = "SELECT * FROM noticias WHERE ID_NOTICIA = ${id};";

            $resultado = mysqli_query($db, $query_noticia);

            if($resultado->num_rows === 0) {
                header('Location: /');
            }
            $noticia = mysqli_fetch_assoc($resultado);

        }
    };
    //OBTENER NOTICIA PRINCIPAL
    $query_noticia_principal = "SELECT * FROM noticias LIMIT 1;";

    $resultado = mysqli_query($db, $query_noticia_principal);

    $noticia_principal = mysqli_fetch_assoc($resultado);

    //PUBLICADOS RECIENTEMENTE
    $query_publicados = "SELECT * FROM noticias ORDER BY ID_NOTICIA DESC LIMIT 6;";

    $resultado_publicados = mysqli_query($db, $query_publicados);



?>
<body>
    <section class="hero torneos fondo-hero">
        <div class="overlay">
            <h3>NOTICIAS</h3>
        </div>
    </section>

    <div class="noticias-publicadas">
        <main class="site-noticias">
            <section class="noticia-principal">
                <?php if (isset($noticia)):?>
                    <h3><?php echo $noticia['TITULO_NOTICIA'];?></h3>
                    <img loadiong="lazy" src="imagenes/<?php echo $noticia['IMAGEN_NOTICIA'];?>" alt="imagen noticia"
                        class="imagen-noticia">
                    <h4 class="bold"><?php echo $noticia['EXTRACTO_NOTICIA']?></h4>
                    <?php $texto_noticia = str_replace("\r", "<br>", $noticia['CUERPO_NOTICIA'])?>
                    <p class="texto-noticia"><?php echo $texto_noticia;?></p>
                <?php else :?>
                    <h3><?php echo $noticia_principal['TITULO_NOTICIA'];?></h3>
                    <img loadiong="lazy" src="imagenes/<?php echo $noticia_principal['IMAGEN_NOTICIA'];?>" alt="imagen noticia"
                        class="imagen-noticia">
                    <h4 class="bold"><?php echo $noticia_principal['EXTRACTO_NOTICIA']?></h4>
                    <?php $texto_noticia = str_replace("\r", "<br>", $noticia_principal['CUERPO_NOTICIA'])?>
                    <p class="texto-noticia"><?php echo $texto_noticia;?></p>
                <?php endif;?>
            </section>
            <aside class="noticias-lateral">
                <h3>PUBLICADOS RECIENTEMENTE</h3>
                <ul class="lista-noticias">
                    <?php while($noticia_publicada = mysqli_fetch_assoc($resultado_publicados)):?>
                    <li class="item-noticia">
                        <a href="noticias.php?id=<?php echo $noticia_publicada['ID_NOTICIA'];?>">
                            <img loading="lazy" src="imagenes/<?php echo$noticia_publicada['IMAGEN_SMALL_NOTICIA'];?>" alt="imagen noticia">
                        </a>
                        <div class="informacion-noticia">
                            <h3><?php echo $noticia_publicada['TITULO_NOTICIA'];?></h3>
                            <p><?php echo $noticia_publicada['EXTRACTO_NOTICIA'];?></p>
                            <a href="noticias.php?id=<?php echo $noticia_publicada['ID_NOTICIA'];?>" class="ver-mas">ver mas</a>
                        </div>
                    </li>
                    <?php endwhile;?>
                    <!--.item-noticia-->
                   
                </ul>
            </aside>
        </main>
        <!--.noticias-->
    </div>


<?php 
    require 'includes/templates/footer.php'; //FOOTER
?>
