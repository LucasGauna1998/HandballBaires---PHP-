<?php 
    
    include 'includes/funciones.php';
    
    include 'includes/config/database.php';

    //OBTIENE LAS ULTIMAS TRES NOTICIAS PUBLICADAS
    $query_slider = "SELECT * FROM noticias ORDER BY ID_NOTICIA DESC LIMIT 3;";

    $resultado = mysqli_query($db, $query_slider);
    
    incluirTemplate('header');
?>
    <div class="slider hero">
        <div class="contenido-slider" id="slider">
           <?php while($slider_imagenes = mysqli_fetch_assoc($resultado)):?> 
            <div class="slider-img">
                <a href="noticias.php?id=<?php echo $slider_imagenes['ID_NOTICIA'];?>">
                    <img loading="lazy" src="imagenes/<?php echo $slider_imagenes['IMAGEN_NOTICIA'];?>" alt="imagen slider">
                    <p class="slider-texto"><?php echo $slider_imagenes['TITULO_NOTICIA'];?></p>
                </a>
            </div><!--.slider-img--->
           <?php endwhile;?>
        </div><!--.contenido-slider-->
        <div class="indicators">
            <div class="slider-btn right" id="right">&#62;</div>
            <div class="slider-btn left" id="left">&#60;</div>
        </div>
    </div><!--.slider -->
    <main class="seccion-principal contenedor">
        <div class="principal-contenido">
            <section class="noticias">
                <h3>Noticias</h3>
                <?php 
                    $limite = 12; //LIMITE DE NOTICIAS
                    include 'includes/templates/noticias.php'; //NOTICIAS
                ?>
            </section><!--.noticias-->
            <aside class="barra-lateral">
                <div class="tweets">
                    <a data-tweet-limit="3"class="twitter-timeline" href="https://twitter.com/handball_baires?ref_src=twsrc%5Etfw">Tweets by handball_baires</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </aside><!--.barra-lateral -->
        </div><!--.contenido-seccion--principal -->
    </main><!--.seccion-principal -->

    <section class="contacto">
        <div class="grid-contacto">
            <article class="contacto--informacion">
                <div class="informacion">
                    <!-- <img src="/src/img/fondo-contacto.jpg" alt="foto contacto" class="fondo-contacto"> -->
                    <h3>CONTACTO</h3>
                    <P>ESCRIBENOS</P>
                    <P>LLAMANOS</P>
                </div>
            </article>
            <article class="contacto--ubicacion">
                <h3>UBICACIÓN</h3>
                <P>CLUB NUEVA GENERACIÓN</P>
                <P>Quintino Bocayuya 1241, CABA</P>
                <div class="contenedor-mapa">
                    <div class="map" id="map">

                    </div>
                </div>
            </article>
            <article class="contacto--video">
                <video loop muted autoplay>
                    <source src="/build/videos/video-index.mp4" type="video/mp4">
                </video>
            </article>
            <article class="contacto--redes-sociales">
                <h3>SEGUÍNOS</h3>
                <ul class="redes-sociales">
                    <li class="social-media">
                        <picture>
                            <source srcset="/build/img/twitter.avif" type="image/avif">
                            <source srcset="/build/img/twitter.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/twitter.png" alt="social media">
                        </picture>
                    </li>
                    <li class="social-media">
                        <picture>
                            <source srcset="/build/img/instagram.avif" type="image/avif">
                            <source srcset="/build/img/instagram.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/instagram.png" alt="social media">
                        </picture>
                    </li>
                    <li class="social-media">
                        <picture>
                            <source srcset="/build/img/facebook.avif" type="image/avif">
                            <source srcset="/build/img/facebook.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/facebook.png" alt="social media">
                        </picture>
                    </li>
                    <li class="social-media">
                        <picture>
                            <source srcset="/build/img/youtube.avif" type="image/avif">
                            <source srcset="/build/img/youtube.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/youtube.png" alt="social media">
                        </picture>
                    </li>
                    <li class="social-media tiktok">
                        <picture>
                            <source srcset="/build/img/tiktok.avif" type="image/avif">
                            <source srcset="/build/img/tiktok.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/tiktok.png" alt="social media">
                        </picture>
                    </li>
                    <li class="social-media">
                        <picture>
                            <source srcset="/build/img/twitch.avif" type="image/avif">
                            <source srcset="/build/img/twitch.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/twitch.png" alt="social media">
                        </picture>
                    </li>
                </ul>
            </article>
        </div>
    </section><!--.contacto --->
    <section class="sponsors">
        <div class="contenido-sponsors contenedor">
            <h3>SPONSORS</h3>
            <ul class="lista-sponsors">
                <li class="sponsor">
                    <picture>
                        <source srcset="/build/img/sponsors/LOGO GO7 FONDO BLANCO.avif" type="image/avif">
                        <source srcset="/build/img/sponsors/LOGO GO7 FONDO BLANCO.webp" type="image/webp">
                        <img loading="lazy" src="build/img/sponsors/LOGO GO7 FONDO BLANCO.jpg" alt="logo sponsor">
                    </picture>
                </li>
                <li class="sponsor">
                    <picture>
                        <source srcset="build/img/sponsors/LOGO HAKEN GOLD FONDO BLANCO.avif" type="image/avif">
                        <source srcset="build/img/sponsors/LOGO HAKEN GOLD FONDO BLANCO.webp" type="image/webp">
                        <img loading="lazy" src="build/img/sponsors/LOGO HAKEN GOLD FONDO BLANCO.jpg" alt="logo sponsor">
                    </picture>
                </li>
                <li class="sponsor">
                    <picture>
                        <source srcset="/build/img/sponsors/LOGO TCD.avif" type="image/avif">
                        <source srcset="/build/img/sponsors/LOGO TCD.webp" type="image/webp">
                        <img loading="lazy" src="/build/img/sponsors/LOGO TCD.jpg" alt="logo sponsor">
                    </picture>
                </li>
                <li class="sponsor">
                    <picture>
                        <source srcset="/build/img/sponsors/LOGO CAB PERMISIONES.avif" type="image/avif">
                        <source srcset="/build/img/sponsors/LOGO CAB PERMISIONES.webp" type="image/webp">
                        <img loading="lazy" src="/build/img/sponsors/LOGO CAB PERMISIONES.png" alt="logo sponsor">
                    </picture>
                </li>
                <li class="sponsor">
                    <picture>
                        <source srcset="/build/img/sponsors/LOGO LUDIS JOYAS.avif" type="image/avif">
                        <source srcset="/build/img/sponsors/LOGO LUDIS JOYAS.webp" type="image/webp">
                        <img loading="lazy" src="/build/img/sponsors/LOGO LUDIS JOYAS.png" alt="logo sponsor">
                    </picture>
                </li>
                <li class="sponsor">
                    <picture>
                        <source srcset="/build/img/sponsors/LOGO HANDBALL CONNECT.avif" type="image/avif">
                        <source srcset="/build/img/sponsors/LOGO HANDBALL CONNECT.webp" type="image/webp">
                        <img loading="lazy" src="/build/img/sponsors/LOGO HANDBALL CONNECT.jpg" alt="logo sponsor">
                    </picture>
                </li>
            </ul>
        </div>
    </section><!--.sponsors-->

 <?php 
    $slider = true;
    $mapa = true;
    incluirTemplate('footer');
 ?>