<footer class="site-footer">
        <div class="contenido-footer contenedor">
            <ul class="informacion-footer">
                <li class="logo">
                    <a href="/">
                        <picture>
                            <source srcset="/build/img/logo-baires.avif" type="image/avif">
                            <source srcset="/build/img/logo-baires.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/logo-baires.webp" alt="" class="logo-footer">
                        </picture>
                    </a>
                </li>
                <li class="numero">
                    <picture>
                        <source srcset="/build/img/telefono.avif" type="image/avif">
                        <source srcset="/build/img/telefono.webp" type="image/webp">
                        <img loading="lazy" src="/build/img/telefono.png" alt="icono telefono">
                    </picture>
                     <p>15 38 47 75 12</p>
                </li>
                <li class="email">handballBaires@gmail.com</li>
                <li class="redes-sociales-footer">
                    <a href="#">
                        <picture>
                            <source srcset="/build/img/twitter.avif" type="image/avif">
                            <source srcset="/build/img/twitter.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/twitter.png" alt="icono red social">
                        </picture>
                    </a>
                    <a href="#">
                        <picture>
                            <source srcset="/build/img/instagram.avif" type="image/avif">
                            <source srcset="/build/img/instagram.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/instagram.png" alt="icono red social">
                        </picture>
                    </a>
                    <a href="#">
                        <picture>
                            <source srcset="/build/img/facebook.avif" type="image/avif">
                            <source srcset="/build/img/facebook.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/facebook.png" alt="icono red social">
                        </picture>
                    </a>
                    <a href="#">
                        <picture>
                            <source srcset="/build/img/youtube.avif" type="image/avif">
                            <source srcset="/build/img/youtube.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/youtube.png" alt="icono red social">
                        </picture>
                    </a>
                </li>
            </ul>
        </div>
        <?php 
        $pagina = $_SERVER['PHP_SELF'];
        
        echo $pagina;
    ?>
    </footer>
    
    <script src="/build/js/slider.js"> </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
    <script src="/build/js/mapa.js"></script>
    <script src="build/js/app.js"></script>
 
</body>

</php>